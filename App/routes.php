<?php

$app->get('/', 'FabianGO\\Controllers\\WebController:HomePage')->setName('homepage');
$app->get('/blog/{slug}', 'FabianGO\\Controllers\\WebController:BlogPage')->setName('blog_page');

$app->group('/cms', function() {
    $this->get('', '\\FabianGO\\Controllers\\CMSController:OverviewPage')->setName('cms_overview');
    $this->get('/blog/create', '\\FabianGO\\Controllers\\CMSController:CreateBlogPage')->setName('cms_blog_create');
    $this->post('/blog/create', '\\FabianGO\\Controllers\\CMSController:HandleCreateBlogPage')->setName('cms_blog_create_handle');
})->add(new \FabianGO\Middleware\CookieAuthentication());