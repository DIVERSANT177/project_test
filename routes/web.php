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