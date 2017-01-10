<?php

$app->get('/', 'FabianGO\\Controllers\\WebController:HomePage')->setName('homepage');
$app->get('/blog/{slug}', 'FabianGO\\Controllers\\WebController:BlogPage')->setName('blog_page');

$app->group('/cms', function() {
    $this->get('', '\\FabianGO\\Controllers\\CMSController:OverviewPage')->setName('cms_overview');
})->add(new \FabianGO\Middleware\CookieAuthentication());