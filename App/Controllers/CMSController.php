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
}