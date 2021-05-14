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
$xcrud->limit(25);
$xcrud->columns('id');
$xcrud->columns('title');
$xcrud->columns('status');
$xcrud->columns('hits');
$xcrud->columns('created_at');
$xcrud->unset_title();


$title ="Posts";
$body = admin_views."posts.php";
$posts_nav = "active";
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
$router->get(admin.'inputs', function() {
$title ="Inputs";
$body = admin_views."inputs.php";
$inputs_nav = "active";
include admin_template;
});

// tables page
$router->get(admin.'tables', function() {
$title ="Tables";
$body = admin_views."tables.php";
$tables_nav = "active";
include admin_template;
});