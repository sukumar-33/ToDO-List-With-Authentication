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
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles/signup.css">
</head>
<body>
<form action="inc/signup.inc.php" method="POST">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="text"><b>FirstName</b></label>
    <input type="text" placeholder="Enter First Name" name="firstname" >

    <label for="text"><b>SecondName</b></label>
    <input type="text" placeholder="Enter Second Name" name="secondname" >

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" >

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" >

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="repwd" >

    <button>Sign Up</button>
  </div>
</form>
<?php
        give_messages();
?>

</body>
</html>