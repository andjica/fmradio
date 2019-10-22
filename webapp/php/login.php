<?php

    session_start();
    if(isset($_POST['login']))
    {

        require_once "../config/connection.php";
       
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $password = md5($pass);

        try{
            $query = "SELECT * FROM users WHERE email=:email AND password=:password";
            $st = $connection->prepare($query);
            $st->bindParam(":email",$email);
            $st->bindParam(":password",$password);
    
            $st->execute();
    
            $user = $st->fetch();
    
            if($user) {
                $_SESSION['user'] = $user; //Pravljenje sesije koja u sebi sadrzi usera
                header("Location: ../admin.php");
                
            } else {
                $_SESSION['error'] = "Pogresan email ili password.";
                header("Location: ../statuscode.php");
            }
        }
        catch(PDOException $ex)
        {
            return header("Location: ../statuscode.php");
        }
       
    
    }
?>