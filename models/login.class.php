<?php
require '../database/dbh.class.php';
class Login extends Dbh
{
    protected function getUser($username, $password)
    {
        //queries the database
        $query = "SELECT * FROM users WHERE user_name = ? OR user_email = ?";
        
        //execute the prepared statement
        $stmt = $this->connect()->prepare($query);
        if (!$stmt->execute([$username, $password])) {
            $stmt = null;
            header("location:../login?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location:../login?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $pwdHashed[0]['user_password']);
        if ($checkPassword == false) {
            $stmt = null;
            header("location:../login?error=wrongpassword");
            exit();
        }
        elseif($checkPassword == true){
            $query = "SELECT * FROM users WHERE user_name = ? OR user_email = ? AND user_password = ?";
            $stmt = $this->connect()->prepare($query);

            if (!$stmt->execute([$username, $username, $password])) {
                $stmt = null;
                header("location:../login?error=stmtfailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location:../login?error=usernotfound");
                exit();
            }
            
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]['user_id'];
            $_SESSION["username"] = $user[0]['user_name'];
        }
        $stmt = null;
    }
   
}
