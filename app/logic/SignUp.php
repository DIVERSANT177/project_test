<?php

class SignUp
{
    public function getTableName(): string
    {
        return "users";
    }

    /**
     * @return string[]
     */
    public function getFields(): array
    {
        return [
            "login" => "string",
            "password" => "string",
            "name" => "string",
        ];
    }
}