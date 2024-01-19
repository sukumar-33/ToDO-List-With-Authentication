<?php


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        try{
            require_once "db.inc.php";
            require_once "controller.inc.php";

            $errors = [];
            if(check_is_empty($email , $pwd)){
                $errors["empty_field"] = "Fill in the All Details";
            }
            if(is_email_not_valid($email)){
                $errors["Invalid_email"] = "Entered Email is Incorrect";
            }
            if(!is_email_registered($pdo , $email)){
                $errors["registered_email"] = "Entered Email is Not Registered Sign Up First";
            }
            if(!is_correct_login($pdo , $email , $pwd)){
                $errors["not_matching"] = "Email or Password is Incorrect";
            }
            require_once "config_session.inc.php";
            if($errors){
                $_SESSION["errors_login"] = $errors;
                header("Location: ../login.php");
                die();
            }else{
                $_SESSION["email"] = $email;
                header("Location: ../index.php");
                die();
            }


        }catch(PDOException $e){
            echo "Connection Failed" . $e->getMessage();
            header("Location: ../login.php");
        }

    }else{
        header("Location: ../login.php");
    }


?>