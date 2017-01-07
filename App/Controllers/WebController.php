<?php

namespace FabianGO\Controllers;

use \FabianGO\Factories\BlogFactory;
use \Slim\Http\Request;
use \Slim\Http\Response;

class WebController extends BaseController
{
    /**
     * Renders homepage
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function HomePage(Request $request, Response $response, array $args)
    {
        /** @var BlogFactory $blogFactory */
        $blogFactory = $this->container->get('BlogFactory');
        $blogs = $blogFactory->getLatestBlogs(5);

        $params = [
            'blogs' => $blogs
        ];

        return $this->view->render($response, 'Web/homepage.twig', $params);
    }

    /**
     * Renders blog page
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function BlogPage(Request $request, Response $response, array $args)
    {
        /** @var BlogFactory $blogFactory */
        $blogFactory = $this->container->get('BlogFactory');
        $blog = $blogFactory->bySlug($args['slug']);

        $params = [
            'blog' => $blog
        ];

        return $this->view->render($response, 'Web/blogpage.twig', $params);
    }
}