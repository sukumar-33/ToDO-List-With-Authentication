<?php
    $server = "mysql:host=localhost;dbname=myfirstdatabase";
    $dbname = "root";
    $password = "2345";

    try{
        $pdo = new PDO($server , $dbname , $password);
        $pdo->setAttribute(PDO:: ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); 
    }catch(PDOException $e){
        echo "Connection Failed" . $e->get_message();
    }
?>