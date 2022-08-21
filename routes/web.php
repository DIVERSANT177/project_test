<?php

$route = $_SERVER["REQUEST_URI"];

$template = 'resources/views/';

if($route == "/"){
    include $template . "index.php";
}else if ($route == "/admin/signUp"){
    include "app/DB.php";
    include "app/actions/AdminActions.php";
    include "app/logic/SignUp.php";
    include $template . "admin/signUp.php";
} else if($route == "/admin/signIn"){
    include $template . "admin/signIn.php";
}


/*include "DB.php";
include "actions/AdminActions.php";
include "logic/SignUp.php";*/



/*include "app/DB.php";

$db = DB::Connection();

$query = $db->prepare("SELECT * FROM users");
$query->execute();
$result = $query->fetchAll();
var_dump($result);*/