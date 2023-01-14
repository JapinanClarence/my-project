<?php
include "../database/dbh.class.php";
class Signup extends Dbh
{
    protected function setUser($fullName, $username, $email, $password)
    {
              //queries the database
        $query = "INSERT INTO users (user_fullName, user_email, user_name, user_password) VALUE(?, ?, ?, ?)";
        //encrypt password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        //execute the prepared statement
        $stmt = $this->connect()->prepare($query);
        if (!$stmt->execute([$fullName, $email, $username, $hashedPassword])) {
            $stmt = null;
            header("location:../signup?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }
    protected function checkUser($username, $email)
    {
        //queries the database
        $query = "SELECT * FROM users WHERE user_name = ? OR user_email = ?";
        $stmt = $this->connect()->prepare($query);
        //execute the prepared statement
        if (!$stmt->execute([$username, $email])) {
            $stmt = null;
            header("location:../signup?error=stmtfailed");
            exit();
        }
        //checks the database if username existed and returns false
        $resultCheck = true;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        return $resultCheck;
    }
}
