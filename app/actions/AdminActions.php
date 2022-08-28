<?php

namespace app\actions;

use app\logic\Admin;

class AdminActions
{
    private static $error = "";

    public static function getFields()
    {
        $user = new Admin();
        if($_SERVER['REQUEST_URI'] == "/admin/signUp")
            return $user->getFieldsSignUp();
        elseif ($_SERVER['REQUEST_URI'] == "/admin/signIn")
            return $user->getFieldsSignIn();
    }

    public static function signUp()
    {
        if($_SERVER['REQUEST_METHOD'] != "POST" || !isset($_POST['signUp'])){
            return;
        }
        self::isEmptyFields();
        self::validateEmail();
        self::validatePassword();

        if(self::$error == ""){
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user = new Admin();
            foreach ($_POST as $key => $value)
            {
                $_POST[$key] = htmlspecialchars($value);
            }
            $user->setData();
            return $user->signUp();
        } else {
            return self::$error;
        }
    }

    public static function signIn()
    {
        if($_SERVER['REQUEST_METHOD'] != "POST" || !isset($_POST['signIn'])){
            return;
        }
        self::isEmptyFields();
        self::validateEmail();
        self::validatePassword();
    }

    public static function isEmptyFields()
    {
        foreach (self::getFields() as $field => $value)
        {
            if($_POST[$field] == ""){
                self::$error .= "Поле '$field' не заполнено <br>";
            }
        }
    }

    public static function validateEmail()
    {
        if(filter_var($_POST['login'], FILTER_VALIDATE_EMAIL) === false){
            self::$error .= "Введен невалидный Email <br>";
        }
    }

    public static function validatePassword()
    {
        $uppercase = preg_match('@[A-Z]@', $_POST['password']);
        $lowercase = preg_match('@[a-z]@', $_POST['password']);
        $number = preg_match('@\d@', $_POST['password']);
        $specialChars = preg_match('@\W@', $_POST['password']);
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['password']) < 6){
            self::$error .= "Пароль должен быть длиной не менее 6 символов и в нем должны присутствовать заглавные и прописные 
            буквы, цифры и специальные символы";
        }
    }


    /*public static function defend($arr){
        $filter = array("<", ">","="," (",")",";","/");
        foreach ($arr as $key => $value)
        {
            $arr['$key'] = str_replace($filter, "|", $value);
        }
        return $arr;
    }*/


}