<?php

// main homepage
$router->get('/', function() {

$mysqli = new mysqli(server, username, password, dbname);

// Check connection
if ($mysqli -> connect_errno) {
echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
exit();
}  else { }

$query = "SELECT * FROM posts ORDER BY id DESC LIMIT 27";
$data = $mysqli->query($query);

$title ="Homepage";
$body = views."home.php";
include template;

$mysqli -> close();

});

// post page
$router->get('/(.*)', function() {

$mysqli = new mysqli(server, username, password, dbname);

// Check connection
if ($mysqli -> connect_errno) {
echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
exit();
}  else { }

$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$uri = $uri_segments[2];

$query = "SELECT * FROM `posts` WHERE `slug` LIKE '".$uri."'";
$data = $mysqli->query($query);

$title ="Post";
$body = views."post.php";
include template;
$mysqli -> close();

});