<?php

namespace FabianGO\Controllers;

class BaseController
{
    /** @var \Slim\Container null  */
    protected $container = null;

    /** @var array */
    protected $settings = [];

    /** @var null|\Monolog\Logger */
    protected $logger = null;

    /** @var null|\PDO */
    protected $pdo = null;

    /** @var null|\Slim\Views\Twig */
    protected $view = null;

    /**
     * BaseController Constructor
     *
     * Sets dependencies in class variables for easier access
     *
     * @param \Slim\Container $container
     */
    public function __construct($container)
    {
        $this->container = $container;
        $this->settings = $container->get('settings');
        $this->logger = $container->get('logger');
        $this->pdo = $container->get('pdo');
        $this->view = $container->get('view');
    }
}