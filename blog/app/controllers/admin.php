<?php

// admin login
$router->get('logout', function() {
session_destroy();
header("Location: ".root."");
});

// admin login page
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

// admin login session check starting --- >
if (isset($_SESSION['admin_login']) == 1 ) {
// admin dashboard
$router->get(admin.'dashboard', function() {
include "app/db.php";
$title ="Dashboard";
$body = admin_views."dashboard.php";
$home_nav = "active";
include admin_template;
});

// posts page
$router->get(admin.'posts', function() {
include "app/db.php";
include('app/vendor/xcrud/xcrud.php');
$xcrud = Xcrud::get_instance();
$xcrud->table('posts');
$xcrud->order_by('id','desc');
$xcrud->unset_view();
$xcrud->unset_edit();
$xcrud->unset_add();
$xcrud->unset_csv();
$xcrud->column_class('img', 'zoom_img');
$xcrud->button(root.'post/{slug}','view','icon-search','',array('target'=>'_blank'));
$xcrud->button(root.'admin/post/{id}','edit','icon-pencil','',array('target'=>'_blank'));

// $xcrud->change_type('img', 'image', false, array( 'path' => '../uploads/gallery' ));

$xcrud->columns('id,title,status,hits,created_at');
$xcrud->unset_title();
$title ="Blog Posts";
$body = admin_views."posts.php";
$posts_nav = "active";
include admin_template;
});

// pages
$router->get(admin.'categories', function() {
include "app/db.php";
include('app/vendor/xcrud/xcrud.php');
$xcrud = Xcrud::get_instance();
$xcrud->table('categories');
$xcrud->order_by('id','desc');
$xcrud->columns('id,title,slug');
$xcrud->unset_title();
$title ="Categories";
$body = admin_views."xcrud.php";
$categories_nav = "active";
include admin_template;
});

// users pages
$router->get(admin.'users', function() {
include "app/db.php";
include('app/vendor/xcrud/xcrud.php');
$xcrud = Xcrud::get_instance();
$xcrud->table('users');
$xcrud->order_by('id','desc');
$xcrud->columns('id,full_name,email');
$xcrud->unset_title();
$title ="Users";
$body = admin_views."xcrud.php";
$users_nav = "active";
include admin_template;
});

// draft pages
$router->get(admin.'traffic', function() {
include "app/db.php";
include('app/vendor/xcrud/xcrud.php');
$xcrud = Xcrud::get_instance();
$xcrud->table('traffic');
// $xcrud->where('status =', 0);
$xcrud->order_by('visits','desc');
$xcrud->unset_view();
$xcrud->unset_remove();
$xcrud->unset_csv();
$xcrud->columns('id,code,country,visits');
$xcrud->unset_title();
$title ="Traffic";
$body = admin_views."xcrud.php";
$traffic_nav = "active";
include admin_template;
});

// draft pages
$router->get(admin.'draft', function() {
include "app/db.php";
include('app/vendor/xcrud/xcrud.php');
$xcrud = Xcrud::get_instance();
$xcrud->table('posts');
$xcrud->where('status =', 0);
$xcrud->order_by('id','desc');
$xcrud->unset_view();
$xcrud->unset_edit();
$xcrud->unset_add();
$xcrud->unset_csv();
$xcrud->button(root.'post/{slug}','view','icon-search','',array('target'=>'_blank'));
$xcrud->button(root.'admin/post/{id}','edit','icon-pencil','',array('target'=>'_blank'));
$xcrud->columns('id,title,status,hits,created_at');
$xcrud->unset_title();
$title ="Draft";
$body = admin_views."xcrud.php";
$draft_nav = "active";
include admin_template;
});

// pages
$router->get(admin.'pages', function() {
include "app/db.php";
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
include "app/db.php";
include('app/vendor/xcrud/xcrud.php');
$xcrud = Xcrud::get_instance();
$xcrud->table('newsletters');
$xcrud->order_by('id','desc');
$xcrud->columns('id');
$xcrud->columns('name');
$xcrud->columns('email');
$xcrud->columns('created_at');
$xcrud->unset_title();
$title ="Newsletter";
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

// logo upload function
if (!empty($_FILES["logo"]["name"])) {
$logo_temp_name = $_FILES["logo"]["tmp_name"];
$img            = "logo.png";
$target_path    = "uploads/global/".$img;
if(move_uploaded_file($logo_temp_name, $target_path)) {};
};

// favicon upload function
if (!empty($_FILES["favicon"]["name"])) {
$favicon_name   = $_FILES["favicon"]["tmp_name"];
$img            = "favicon.png";
$ftarget_path   = "uploads/global/".$img;
if(move_uploaded_file($favicon_name, $ftarget_path)) {};
};

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
instagram_url = '".$_POST['instagram_url']."',
theme_color = '".$_POST['theme_color']."',
header_code = '".$_POST['header_code']."',
footer_code = '".$_POST['footer_code']."'
WHERE id = 1";

if ($mysqli->query($sql) === TRUE) {
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Pragma: no-cache');
header("Refresh:2; ".root."admin/settings");
echo "<style>body{font-family:calibri}</style>Updating...";
} else { echo "Error updating record: " . $mysqli->error; }

});

// profile page
$router->get(admin.'profile', function() {
include "app/db.php";
$title ="Profile";
$body = admin_views."profile.php";
$profile_nav = "active";
include admin_template;
});

// settings update
$router->post('admin/users', function() {
include "app/db.php";

// logo upload function
if (!empty($_FILES["user_img"]["name"])) {
$logo_temp_name = $_FILES["user_img"]["tmp_name"];
$img            = $_SESSION['user_id'].".jpg";
$target_path    = "uploads/users/".$img;
if(move_uploaded_file($logo_temp_name, $target_path)) {};
};

// conver password to md5
if (isset($_POST['password'])){ $password = md5($_POST['password']); }

// sql query to update columns
$sql = "
UPDATE users SET
full_name = '".$_POST['full_name']."',
email = '".$_POST['email']."',
password = '".$password."'
WHERE id = ".$_SESSION['user_id']."";

if ($mysqli->query($sql) === TRUE) {
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Pragma: no-cache');
header("Refresh:2; ".root."admin/profile");
echo "<style>body{font-family:calibri}</style>Updating...";
} else { echo "Error updating record: " . $mysqli->error; }
});


// add post page
$router->get(admin.'post/add', function() {
include "app/db.php";
$title ="Add Post";
$body = admin_views."post.php";
$posts_nav = "active";
include admin_template;
});

// add post page
$router->post(admin.'post/add', function() {
include "app/db.php";

// image upload function
if (!empty($_FILES["file"]["name"])) {
$file_name      = $_FILES["file"]["name"];
$temp_name      = $_FILES["file"]["tmp_name"];
$imgtype        = $_FILES["file"]["type"];
$ext            = pathinfo($file_name, PATHINFO_EXTENSION);
$img            = date("d-m-Y") . "-" . time() . "." . $ext;
$target_path    = "uploads/posts/".$img;

// move file with rename to di
if(move_uploaded_file($temp_name, $target_path)) {
//
}else{ exit("Error While uploading image on the server"); } }

// array to sting for keywords
if (isset($_POST['keywords'])) { $keywords = implode (", ", $_POST['keywords']); } else { $keywords = ""; }

// check type of post to run mysql query
if ($_POST['post_type'] == "update") {

// sql query to update post
$sql = "
UPDATE posts SET
user_id = '".$_SESSION['user_id']."',
category_id = '".$_POST['category_id']."',
title = '".$_POST['title']."',
slug = '".$_POST['slug']."',
img = '".$img."',
content = '".$_POST['content']."',
created_at = '".$_POST['date_time']."',
keywords = '".$keywords."'
WHERE id = '".$_POST['post_id']."'";

} else {

// sql query to insert new post
$sql = "
INSERT INTO posts
(user_id,
category_id,
title,
slug,
img,
content,
created_at,
keywords)
VALUES (
'".$_SESSION['user_id']."',
'".$_POST['category_id']."',
'".$_POST['title']."',
'".strtolower($_POST['slug'])."',
'".$img."',
'".$_POST['content']."',
'".$_POST['date_time']."',
'".$keywords."')
";
}

if ($mysqli->query($sql) === TRUE) { header("Location: ".root."admin/posts"); } else { echo "Error updating record: " . $mysqli->error; }
});

// view to modify post
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
$body = admin_views."post.php";
$posts_nav = "active";
include admin_template;

}}

});

}; // admin login session check ending --- >