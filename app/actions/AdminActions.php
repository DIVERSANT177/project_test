<?php

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
        }
    }

    public static function signUp(){
        $_POST = self::defend($_POST);
        if($_SERVER['REQUEST_METHOD'] != "POST" || !isset($_POST['signUp'])){
            return;
        }
        foreach (self::getFields() as $field => $value)
        {
            if($_POST[$field] == ""){
                self::$error .= "Поле '$field' не заполнено <br>";
            }
        }
        if(self::$error == ""){
            $signUp = new SignUp();

            return $signUp->signUpUser();
        } else {
            return self::$error;
        }

    }

    public static function defend($arr){
        $filter = array("<", ">","="," (",")",";","/");
        foreach ($arr as $key => $value)
        {
            $arr['$key'] = str_replace($filter, "|", $value);
        }
    }


}