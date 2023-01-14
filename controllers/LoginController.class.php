<?php
include "../models/login.class.php";
class LoginController extends Login{
    //class properties
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    //class method
    public function loginUser(){
        if($this->emptyUsername() == false && $this->emptyPassword() == false){
            //echo "username field required"
            header("location:../login?error=emptyinput");
            exit();
        }
        if($this->emptyUsername() == false){
            //echo "username field required"
            header("location:../login?error=usernamefieldrequired");
            exit();
        }
        if($this->emptyPassword() == false){
            //echo "password field required"
            header("location:../login?error=passwordfieldrequired");
            exit();
        }
        $this->getUser($this->username, $this->password);
    }
    // error handlers
    private function emptyUsername(){
        $result = true;
        if(empty($this->username)){
            $result = false;
        }
        return $result;
    }
    private function emptyPassword(){
        $result = true;
        if(empty($this->password)){
            $result = false;
        }
        return $result;
    }
    
}