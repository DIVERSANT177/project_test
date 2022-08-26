<?php

namespace app\logic;

use app\DB;


class SignUp
{
    private $errors;
    private $data;

    public function setData()
    {
        $this->data = $_POST;
    }

    public function getTableName(): string
    {
        return "users";
    }

    public function getFields(): array
    {
        return [
            "login" => "string",
            "password" => "string",
            "name" => "string",
        ];
    }

    public function signUpUser()
    {
        $query = "INSERT INTO " . $this->getTableName() . " (";
        $keys = array_keys($this->getFields());
        foreach ($keys as $key){
            $query .= "$key, ";
        }
        $query = rtrim($query, ', ');
        $query .= ') VALUES (';
        foreach($keys as $key){
            $query .= ":$key, ";
        }
        $query = rtrim($query, ', ');
        $query .= ')';
        $query = DB::prepare($query);
        foreach ($keys as $key){
            $query->bindValue(":$key", $this->data[$key]);
        }
        if(!$query->execute()){
            return "При добавлении произошла ошибка";
        }
        header('Location: /');
    }
}