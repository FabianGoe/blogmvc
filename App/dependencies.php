<?php

$container = $app->getContainer();

/**
 * Adds monolog for logging
 *
 * @param \Slim\Container $container
 *
 * @return \Monolog\Logger
 */
$container['logger'] = function($container) {
    $settings = $container->get('settings');

    $logger = new Monolog\Logger($settings['logger']['name']);
    $level = ($settings['logger']['debug'] == true) ? Monolog\Logger::DEBUG : Monolog\Logger::INFO;
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['logger']['path'], $level));
    $logger->pushProcessor(new \Monolog\Processor\IntrospectionProcessor(Monolog\Logger::WARNING));

    return $logger;
};

/**
 * Adds pdo for database connections
 *
 * @todo: make datasource interface to reduce dependency on PDO
 *
 * @param \Slim\Container $container
 *
 * @return PDO
 */
$container['pdo'] = function($container) {
    $settings = $container->get('settings');

    $dns = 'mysql:dbname='.$settings['db']['name'].';host='.$settings['db']['host'];
    $pdo = new \PDO($dns, $settings['db']['user'], $settings['db']['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $pdo;
};

/**
 * Adds flash messaging for delayed messaging across subsequent requests
 *
 * @return \Slim\Flash\Messages
 */
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

/**
 * Adds Twig for template rendering
 *
 * @param \Slim\Container $container
 *
 * @return \Slim\Views\Twig
 */
$container['view'] = function($container) {
    $view = new \Slim\Views\Twig(__DIR__.'/Views');
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    $view->addExtension(new Knlv\Slim\Views\TwigMessages($container->get('flash')));

    return $view;
};

/**
 * Set up notFoundHandler to render custom 404 page
 *
 * @param \Slim\Container $container
 * @return Closure
 */
$container['notFoundHandler'] = function ($container) {
    return function (\Slim\Http\Request $request, \Slim\Http\Response $response) use ($container) {
        return $container['view']->render($response->withStatus(404), '404.twig');
    };
};

/**
 * Set up errorHandler to render custom 500 page
 *
 * @param \Slim\Container $container
 *
 * @return Closure
 */
$container['errorHandler'] = function ($container) {
    return function (\Slim\Http\Request $request, \Slim\Http\Response $response, \Exception $exception) use ($container) {
        $container->get('logger')->error($exception->getMessage());

        return $container['view']->render($response->withStatus(500), '500.twig');
    };
};

/**
 * Add BlogFactory to retrieve blog models
 *
 * @param \Slim\Container $container
 *
 * @return \FabianGO\Factories\BlogFactory
 */
$container['BlogFactory'] = function($container) {
    return new \FabianGO\Factories\BlogFactory($container);
};

/**
 * Set dependencies for WebController class
 *
 * @param \Slim\Container $container
 *
 * @return \FabianGO\Controllers\WebController
 */
$container['FabianGO\Controllers\WebController'] = function($container) {
    return new \FabianGO\Controllers\WebController($container);
};
