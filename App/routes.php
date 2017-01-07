<?php

$app->get('/', 'FabianGO\\Controllers\\WebController:HomePage')->setName('homepage');
$app->get('/blog/{slug}', 'FabianGO\\Controllers\\WebController:BlogPage')->setName('blog_page');