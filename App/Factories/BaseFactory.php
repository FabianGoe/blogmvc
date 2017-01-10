<?php

namespace FabianGO\Factories;


abstract class BaseFactory
{
    /** @var array */
    protected $settings = [];

    /** @var null|\Monolog\Logger */
    protected $logger = null;

    /** @var null|\PDO */
    protected $pdo = null;

    /**
     * BaseController Constructor
     * Sets dependencies in class variables for easier access
     *
     * ModelFactory constructor.
     * @param \Slim\Container $container
     */
    public function __construct($container)
    {
        $this->settings = $container->get('settings');
        $this->logger = $container->get('logger');
        $this->pdo = $container->get('pdo');
    }

    /**
     * Required create method
     *
     * @param array $params
     */
    abstract function create(array $params);

    /**
     * Required edit method
     *
     * @param $blog
     * @param array $params
     */
    abstract function edit($blog, array $params);
}