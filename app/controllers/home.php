<?php

// main homepage
$router->get('/', function() {
include "app/db.php";
$data = $mysqli->query("SELECT * FROM posts ORDER BY id DESC LIMIT 27");
$title = $app->home_title;;
$body = views."home.php";
include template;
});

// newsletters subsriber page
$router->post('newsletters', function() {
include "app/db.php";
$data = $mysqli->query("INSERT INTO `newsletters` (`id`, `name`, `email`, `created_at`) VALUES (NULL, '".$_POST['name']."', '".$_POST['email']."', current_timestamp())");
// redirect to success newsletters page
header('Location: '.root.'newsletters/success');
});

// post page
$router->get('newsletters/success', function() {
$title ="Newsletters";
$body = views."newsletters.php";
include template;
});

// post page
$router->get('(.*)', function() {
include "app/db.php";
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$uri = $uri_segments[2];
$data = $mysqli->query("SELECT * FROM `posts` WHERE `slug` LIKE '".$uri."'");

$title ="Post";
$body = views."post.php";
include template;
$mysqli -> close();

});