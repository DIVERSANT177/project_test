<?php

$route = $_SERVER["REQUEST_URI"];

$template = 'resources/views/';

if($route == "/"){
    include $template . "index.php";
}else if ($route == "/admin/signUp"){
    include $template . "admin/signUp.php";
} else if($route == "/admin/signIn"){
    include $template . "admin/signIn.php";
}


/*include "DB.php";
include "actions/AdminActions.php";
include "logic/Admin.php";*/



/*include "app/DB.php";

$db = DB::Connection();

$query = $db->prepare("SELECT * FROM users");
$query->execute();
$result = $query->fetchAll();
var_dump($result);*/