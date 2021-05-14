<?php

// main homepage
$router->get(admin.'dashboard', function() {
$title ="Homepage";
$body = admin_views."home.php";
$home_nav = "active";
include admin_template;
});

// buttons page
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
$body = admin_views."xcrud.php";
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


// buttons page
$router->get(admin.'buttons', function() {
$title ="Buttons";
$body = admin_views."buttons.php";
$buttons_nav = "active";
include admin_template;
});

// inputs page
$router->get(admin.'settings', function() {
$title ="Settings";
$body = admin_views."settings.php";
$settings_nav = "active";
include admin_template;
});

// tables page
$router->get(admin.'tables', function() {
$title ="Tables";
$body = admin_views."tables.php";
$tables_nav = "active";
include admin_template;
});