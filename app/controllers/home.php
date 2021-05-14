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





// newsletters page
$router->post('newsletters', function() {

// sql connection
$mysqli = new mysqli(server, username, password, dbname); if ($mysqli -> connect_errno) { echo "Failed to connect to MySQL: " . $mysqli -> connect_error; exit(); }  else { }

// sql query
$query = "INSERT INTO `newsletters` (`id`, `name`, `email`, `created_at`) VALUES (NULL, '".$_POST['name']."', '".$_POST['email']."', current_timestamp())";
$data = $mysqli->query($query);

// print_r($mysqli);

header('Location: '.root.'newsletters/success');
$mysqli -> close();

});

// post page
$router->get('newsletters/success', function() {

$title ="Newsletters";
$body = views."newsletters.php";
include template;

});






// post page
$router->get('(.*)', function() {

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