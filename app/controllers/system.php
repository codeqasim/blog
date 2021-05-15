<?php

// main homepage
$router->get('flush', function() {

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
});