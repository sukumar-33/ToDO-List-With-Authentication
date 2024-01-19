<?php


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $fname = $_POST["firstname"];
        $sname = $_POST["secondname"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $repwd = $_POST["repwd"];
        try{
            require_once "db.inc.php";
            require_once "controller.inc.php";
            $errors = [];
            if(check_is_empty_signup($fname , $sname , $email , $pwd , $repwd)){
                $errors["empty_field"] = "Fill in the All Details";
            }
            if(is_email_not_valid($email)){
                $errors["Invalid_email"] = "Entered Email is Incorrect";
            }
            if(!is_password_same($pwd , $repwd)){
                $errors["password_mismatch"] = "Password Not Same";
            }
            if(is_email_registered($pdo , $email)){
                $errors["registered_email"] = "Entered Email is  Registered! Go to Log in";
            }

            require_once "config_session.inc.php";

            if($errors){
                $_SESSION["errors_signup"] = $errors;
                header("Location: ../signup.php");
                die();
            }else{
                store_data($pdo , $fname , $sname , $email , $pwd , $repwd);
                $_SESSION["signup_success"] = "SignUp Successful . Go to Login Page";
                header("Location: ../signup.php");
                die();
            }


        }catch(PDOException $e){
            echo "Connection Failed" . $e->getMessage();
            header("Location: ../signup.php");
        }

    }else{
        header("Location: ../signup.php");
    }


?>