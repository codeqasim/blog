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
$_SESSION['admin_login'] = true;
$_SESSION['admin_email'] = $_POST['email'];
header("Location: ".root."admin/dashboard");
} else {

$title ="Login";
include admin_views."login.php";
echo "<script>alert('Email or password incorrect')</script>";
}

});

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
$xcrud->columns('id');
$xcrud->columns('title');
$xcrud->columns('status');
$xcrud->columns('hits');
$xcrud->columns('created_at');
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

$router->post('admin/settings', function() {
include "app/db.php";

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

if ($mysqli->query($sql) === TRUE) {
    header("Location: ".root."admin/settings");

} else {
    echo "Error updating record: " . $mysqli->error;
}


// $mysqli->query("UPDATE * FROM settings WHERE id = 1 site_url=1")->fetch_object();


$_POST['site_url'];


});

// tables page
$router->get(admin.'tables', function() {
$title ="Tables";
$body = admin_views."tables.php";
$tables_nav = "active";
include admin_template;
});