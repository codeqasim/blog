<?php

// main homepage
$router->get('/', function() {
$title ="Homepage";
$body = views."home.php";
include template;
});

// post page
$router->get('/(.*)', function() {
$title ="Post";
$body = views."post.php";
include template;
});