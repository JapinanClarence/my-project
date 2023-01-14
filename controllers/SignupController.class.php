<?php
include "../models/signup.class.php";
class SignupController extends Signup{

    private $fullName;
    private $email;
    private $username;
    private $password;

    public function __construct($fullName, $email, $username, $password)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }
    public function signupUser(){
        if($this->emptyInput() == false){
            //echo "invalid inpuT!"
            header("location:../signup?error=emptyinput");
            exit();
        }
        if($this->invalidUsername() == false){
            //echo "invalid username!"
            header("location:../signup?error=invalidusername");
            exit();
        }
        if($this->invalidEmail() == false){
            //echo "invalid email!"
            header("location:../signup?error=invalidemail");
            exit();
        }
        if($this->usernameTaken() == false){
            //echo "username or email taken!"
            header("location:../signup?error=usernametaken");
            exit();
        }
        $this->setUser($this->fullName, $this->username, $this->email, $this->password);
    }
    // error handlers
    private function emptyInput(){
        $result = true;
        if(empty($this->fullName) || empty($this->email) || empty($this->username) || empty($this->password)){
            $result = false;
        }
        return $result;
    }
    private function invalidUsername(){
        $result = true;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
            $result = false;
        }
    
        return $result;
    }
    private function invalidEmail(){
        $result = true;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }

        return $result;
    }
    private function usernameTaken(){
        $result = true;
        if(!$this->checkUser($this->username, $this->email)){
            $result = false;
        }

        return $result;
    }
}