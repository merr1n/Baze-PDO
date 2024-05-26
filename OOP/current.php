<?php
class User{
    protected $email;
    protected $mesaj;
    public function __construct(){
        $this->mesaj='Currently logged in as ';
        $this->email='';
    }
    public function show_user(){
        echo $this->mesaj;
        echo $this->email;
    }
    public function set_mail($var){
        $this->email=$var;
    }
}