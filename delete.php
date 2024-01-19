<?php
     require_once "inc/db.inc.php";
     require_once "inc/config_session.inc.php";
     require_once "inc/controller.inc.php";

     if(isset($_GET["id"])){
        delete_task($pdo , $_GET["id"]);
        header("Location: index.php");
        die();
     }
?>