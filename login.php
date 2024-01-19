<?php
    require_once "header.php";
    require_once "inc/view.inc.php";
    require_once "inc/config_session.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <h1>Log In</h1>
    <br>
    <form action="inc/login.inc.php" method="post">
        
        <label for="email"><b>E-Mail</b></label>
        <input type="email" placeholder="Enter E-Mail" name="email" >

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pwd" >

        <button type="submit">Login</button>
    </form>
    <?php
        give_messages();
    ?>
</body>
</html>