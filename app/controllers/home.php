<?php

// main homepage
$router->get('/', function() {
include "app/db.php";
$data = $mysqli->query("SELECT * FROM posts ORDER BY id DESC LIMIT 27");

// meta information
$meta_title = $app->home_title;
$meta_desc = $app->description;
$meta_keywords = $app->keywords;
$meta_url = root;
$meta_img = root."uploads/global/media.jpg";
$meta_time = "2021-05-09T16:46:15.000Z";
$meta_writer = "Qasim Hussain";

$title = $app->home_title;
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
include "app/db.php";
$title ="Newsletters";
$body = views."newsletters.php";
include template;
});

// main homepage
$router->get('install', function() {

// Do not modify anything under this line :)
    class db {
    var $dbhost;
    var $dbuser;
    var $dbpassword;
    var $dbname;
    var $query;
        function connect() {
            $this->db = new mysqli($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname);
            mysqli_set_charset($this->db,"utf8");
        }
        function __construct() {
            $this->dbhost = server;
            $this->dbuser = username;
            $this->dbpassword = password;
            $this->dbname = dbname;
        }
    }
    $con = new db;
    $con->connect();
   // $res = $con->db->query("SELECT * FROM pt_accounts");
     $sql= file_get_contents('db.sql');
     foreach (explode(";\n", $sql) as $sql)
       {
         $sql = trim($sql);
           if($sql)
               {
                $con->db->query($sql);
               }
      }
      echo "<p>Installation Completed</p>";
});

// post page
$router->get('(.*)', function() {
include "app/db.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url_end = array_slice(explode('/', rtrim($uri, '/')), -1)[0];
$data = $mysqli->query("SELECT * FROM `posts` WHERE `slug` LIKE '".$url_end."'");
$title ="Post";
$body = views."post.php";
include template;
$mysqli -> close();
});