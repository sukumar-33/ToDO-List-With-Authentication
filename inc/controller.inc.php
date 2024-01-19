<?php


    declare(strict_types=1);
    require_once "model.inc.php";
    function check_is_empty(string $email , string $pwd){
        if(empty($email) || empty($pwd)){
            return true;
        }
        return false;
    }
    function is_email_not_valid(string $email){
        if(!filter_var($email , FILTER_DEFAULT)){
            return true;
        }
        return false;;
    }
    function check_is_empty_signup(string $fname , string $sname , string $email , string $pwd , string $repwd){
        if(empty($fname) || empty($sname) || empty($email) || empty($pwd) || empty($repwd)){
            return true;
        }
        return false;
    }
    function is_email_registered(object $pdo , string $email){
        if(check_email_occurrence( $pdo ,  $email)){
            return true;
        }
        return false;
    }
    function delete_task(object $pdo , int $id){
        delete_task_fromdb($pdo , $id);
    }
    function add_task(object $pdo , string $email , string $task){
        add_task_db($pdo , $email , $task);
    }
    function get_task_array(object $pdo , string $email){
        $results = get_task_array_fromdb($pdo , $email);
        return $results;
    }
    function store_data(object $pdo ,string $fname , string $sname , string $email , string $pwd , string $repwd){
        store_data_in_db($pdo , $fname ,  $sname ,  $email ,  $pwd ,  $repwd);
    }
    function is_correct_login(object $pdo , string $email , string $pwd){
        if(valid_data($pdo , $email , $pwd)){
            return true;
        }
        return false;
    }
    function is_password_same(string $pwd , string $repwd){
        if($pwd === $repwd){
            return true;
        }
        return false;
    }
?>