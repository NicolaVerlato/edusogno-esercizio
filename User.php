<?php

class User{
    public $name;
    public $last_name;
    public $email;
    public $password;

    public function __construct($_name, $_last_name, $_email, $_password){
        $this->name = $_name;
        $this->last_name = $_last_name;
        $this->email = $_email;
        $this->password = $_password;
    }
}
?>