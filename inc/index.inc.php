<?php


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once "config_session.inc.php";
        $task = $_POST["task"];
        $email = $_SESSION["email"];
        try{
            require_once "db.inc.php";
            require_once "controller.inc.php";
            
            if(!empty($task)){
                add_task($pdo , $email , $task);
                $task_arr = get_task_array($pdo , $email);
                $_SESSION["task_list"] = $task_arr;
                header("Location: ../index.php");
                die();
            }

        }catch(PDOException $e){
            echo "Connection Failed" . $e->getMessage();
            header("Location: ../index.php");
            die();
        }
    } else{
        echo "Connection Failed";
        header("Location: ../index.php");
        die();
    }




?>