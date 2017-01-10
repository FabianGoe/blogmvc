<?php

namespace FabianGO\Controllers;

use \FabianGO\Factories\BlogFactory;
use \Slim\Http\Request;
use \Slim\Http\Response;

class CMSController extends BaseController
{
    /**
     * Renders overview page listing all blogs published on the site
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function OverviewPage(Request $request, Response $response, array $args)
    {
        /** @var BlogFactory $blogFactory */
        $blogFactory = $this->container->get('BlogFactory');
        $blogs = $blogFactory->getAll();

        $params = [
            'blogs' => $blogs
        ];

        return $this->view->render($response, 'CMS/overview.twig', $params);
    }

    /**
     * Renders blog creation form
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function CreateBlogPage(Request $request, Response $response, array $args)
    {
        $params = [
            'user_input' => []
        ];

        return $this->view->render($response, 'CMS/create_blog.twig', $params);
    }

    /**
     * Handles post of blog creation form
     *
     * @todo: input sanitation
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     *
     * @return \Psr\Http\Message\ResponseInterface|Response
     */
    public function HandleCreateBlogPage(Request $request, Response $response, array $args)
    {
        /** @var BlogFactory $blogFactory */
        $blogFactory = $this->container->get('BlogFactory');
        $userInput   = $request->getParsedBody();

        try {
            $blog = $blogFactory->create($userInput);
        } catch (\InvalidArgumentException $e) {
            $this->flash->addMessage('error', $e->getMessage());
            $params = [
                'user_input' => $userInput
            ];

            return $this->view->render($response, 'CMS/create_blog.twig', $params);
        }

        $this->flash->addMessage('success', 'Blog ' . $blog->getTitle() . ' created');

        return $response->withRedirect('/cms');
    }
}