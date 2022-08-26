<?php

namespace app\actions;

use app\logic\SignUp;

class AdminActions
{
    private static $error = "";

    public static function getFields()
    {
        if($_SERVER['REQUEST_URI'] == "/admin/signUp"){
            $signUp = new SignUp();
            return $signUp->getFields();
        } elseif ($_SERVER['REQUEST_URI'] == "/admin/signIn"){
            $signIn = new SignIn();
            return $signIn->getFields();
        } else
        return;
    }

    public static function signUp(){
        if($_SERVER['REQUEST_METHOD'] != "POST" || !isset($_POST['signUp'])){
            return;
        }
        self::isEmptyFields();
        self::validateEmail();
        self::validatePassword();

        if(self::$error == ""){
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $signUp = new SignUp();
            foreach ($_POST as $key => $value)
            {
                $_POST[$key] = htmlspecialchars($value);
            }
            $signUp->setData();
            return $signUp->signUpUser();
        } else {
            return self::$error;
        }

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
            self::$error .= "Введен невалидный Email <be>";
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