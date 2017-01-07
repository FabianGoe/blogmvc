<?php

mb_internal_encoding('UTF-8');
mb_http_input('UTF-8');

session_start();

require_once(__DIR__.'/../vendor/autoload.php');

$settings = require_once(__DIR__.'/../App/Config/settings.php');

$app = new \Slim\App($settings);

require_once(__DIR__.'/../App/dependencies.php');

require_once(__DIR__.'/../App/routes.php');

$app->run();

