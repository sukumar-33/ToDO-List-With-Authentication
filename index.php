<?php
    
    require_once "inc/view.inc.php";
    require_once "inc/config_session.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/table.css">
</head>
<body>
        
     <div class="heading">
                <h2 style="font-style: 'Hervetica';">ToDo List Application</h2>
                <button><a href="login.php">Log out</a></button>
    </div>
    <form method="post" action="inc/index.inc.php" class="input_form">
            <input type="text" name="task" class="task_input">
            <button type="submit" name="submit" id="add_btn" class="add_btn">
                Add Task
            </button>
    </form>
    <?php
        require_once "inc/db.inc.php";
        require_once "inc/config_session.inc.php";
        require_once "inc/controller.inc.php";
        $email = $_SESSION["email"];
        $task_arr = get_task_array($pdo , $email);
        if(count($task_arr) > 0){
            $_SESSION["task_list"] = $task_arr;
            give_messages();
        }else{
            echo "<br>";
            echo "<h2 style=text-align:center;>Your Task list is empty</h2>";
        }
   ?>

</body>
</html>