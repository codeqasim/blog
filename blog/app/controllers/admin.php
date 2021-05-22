<?php

// admin login
$router->get('logout', function() {
session_destroy();
header("Location: ".root."");
});

$router->get('admin', function() {
include "app/db.php";

$title ="Login";
include admin_views."login.php";
});

// admin login
$router->post('admin', function() {
include "app/db.php";

//Username and Password sent from Form
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);
$password = md5($password);
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$query = mysqli_query($mysqli, $sql);
$res=mysqli_num_rows($query);

if($res == 1) {
$user_id = $mysqli->query('SELECT * FROM users WHERE email = "'.$email.'"')->fetch_object();
$_SESSION['admin_login'] = true;
$_SESSION['admin_email'] = $_POST['email'];
$_SESSION['user_id'] = $user_id->id;

//c$_SESSION['user_id'] = ;
header("Location: ".root."admin/dashboard");
} else {

$title ="Login";
include admin_views."login.php";
echo "<script>alert('Email or password incorrect')</script>";
} });

if (isset($_SESSION['admin_login']) == 1 ) {
// admin dashboard
$router->get(admin.'dashboard', function() {
$title ="Homepage";
$body = admin_views."home.php";
$home_nav = "active";
include admin_template;
}); }

// posts page
$router->get(admin.'posts', function() {
include('app/vendor/xcrud/xcrud.php');
$xcrud = Xcrud::get_instance();
$xcrud->table('posts');
$xcrud->order_by('id','desc');
$xcrud->unset_view();
$xcrud->unset_edit();

$xcrud->column_class('img', 'zoom_img');
$xcrud->column_class('img', 'zoom_img');

$xcrud->button(root.'post/{slug}','view','icon-search','',array('target'=>'_blank'));
$xcrud->button(root.'admin/post/{id}','edit','icon-pencil','',array('target'=>'_blank'));

// $xcrud->change_type('img', 'image', false, array( 'path' => '../uploads/gallery' ));

$xcrud->columns('id,title,status,hits,created_at');

$xcrud->unset_title();
$title ="Blog Posts";
$body = admin_views."post.php";
$posts_nav = "active";
include admin_template;
});

// pages
$router->get(admin.'pages', function() {
include('app/vendor/xcrud/xcrud.php');
$xcrud = Xcrud::get_instance();
$xcrud->table('pages');
$xcrud->order_by('id','desc');
$xcrud->columns('id');
$xcrud->columns('title');
$xcrud->columns('status');
$xcrud->columns('created_at');
$xcrud->unset_title();
$title ="Pages";
$body = admin_views."xcrud.php";
$pages_nav = "active";
include admin_template;
});

// newsletter
$router->get(admin.'newsletters', function() {
include('app/vendor/xcrud/xcrud.php');
$xcrud = Xcrud::get_instance();
$xcrud->table('newsletters');
$xcrud->order_by('id','desc');
$xcrud->columns('id');
$xcrud->columns('name');
$xcrud->columns('email');
$xcrud->columns('created_at');
$xcrud->unset_title();
$title ="Pages";
$body = admin_views."xcrud.php";
$newsletters_nav = "active";
include admin_template;
});

// inputs page
$router->get(admin.'settings', function() {
include "app/db.php";
$title ="Settings";
$body = admin_views."settings.php";
$settings_nav = "active";
include admin_template;
});

// settings update
$router->post('admin/settings', function() {
include "app/db.php";

// sql query to update columns
$sql = "
UPDATE settings SET
site_url = '".$_POST['site_url']."',
app_name = '".$_POST['app_name']."',
description = '".$_POST['description']."',
keywords = '".$_POST['keywords']."',
facebook_url = '".$_POST['facebook_url']."',
twitter_url = '".$_POST['twitter_url']."',
whatsapp_url = '".$_POST['whatsapp_url']."',
pinterest_url = '".$_POST['pinterest_url']."',
linkedin_url = '".$_POST['linkedin_url']."',
instagram_url = '".$_POST['instagram_url']."'
WHERE id = 1";

if ($mysqli->query($sql) === TRUE) { header("Location: ".root."admin/settings");
} else { echo "Error updating record: " . $mysqli->error; }

});

// add post page
$router->get(admin.'post/add', function() {
include "app/db.php";
$title ="Add Post";
$body = admin_views."post_manage.php";
$posts_nav = "active";
include admin_template;
});

// add post page
$router->post(admin.'post/add', function() {
include "app/db.php";
include "app/post_img.php";

echo $_POST['keywords'];
die;

// img veriable name for db
$img = $_FILES["file"]["name"];

// sql query to update columns
$sql = "
INSERT INTO posts
(user_id,
category_id,
title,
slug,
img,
content,
keywords)
VALUES (
'".$_SESSION['user_id']."',
'".$_POST['category_id']."',
'".$_POST['title']."',
'".$_POST['slug']."',
'".$img."',
'".$_POST['content']."'),
'".$_POST['keywords']."')
";

if ($mysqli->query($sql) === TRUE) { header("Location: ".root."admin/posts");
} else { echo "Error updating record: " . $mysqli->error; }

});

$router->get('admin/post/(.*)', function() {

include "app/db.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url_end = array_slice(explode('/', rtrim($uri, '/')), -1)[0];
$data = $mysqli->query("SELECT * FROM `posts` WHERE `id` LIKE '".$url_end."'");

if ($data->num_rows > 0) { foreach($data as $post) {
// meta information
$post_title = substr(strip_tags($post['content']), 0, 160);
$date=date_create($post['created_at']); $post_date = date_format($date,"Y-m-d")."T".date_format($date,"H:i:s");

$title ="Post Manage";
$body = admin_views."post_manage.php";
$posts_nav = "active";
include admin_template;


}}

});