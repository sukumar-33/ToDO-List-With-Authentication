<?php

    declare(strict_types=1);

    function give_messages(){
        if(isset($_SESSION["errors_login"])){
            $errors = $_SESSION["errors_login"];

            foreach($errors as $error){
                echo "<br>";
                echo "<h2 style=text-align:center;color:red;>$error</h2>";
                echo "<br>";
            }
            unset($_SESSION["errors_login"]);
        }else if(isset($_SESSION["errors_signup"])){
            $errors = $_SESSION["errors_signup"];

            foreach($errors as $error){
                echo "<br>";
                echo "<h2 style=text-align:center;color:red;>$error</h2>";
                echo "<br>";
            }
            unset($_SESSION["errors_signup"]);
        }else if(isset($_SESSION["signup_success"])){
            $info = $_SESSION["signup_success"];
            echo "<br>";
            echo "<h2 style=text-align:center;color:green;>$info</h2>";
            echo "<br>";
             unset($_SESSION["signup_success"]);   
        }
        else if(isset($_SESSION["task_list"])){
            echo "<link rel='stylesheet' type='text/css' href='styles/table.css'>";
            echo "<table>";
            $lists = $_SESSION["task_list"];
            echo "<thead>
                <tr>
                    <th>SI.NO</th>
                    <th>Task</th>
                    <th>Action</th>
                </tr>
            </thead>";
            $count = 1;
            foreach ($lists as $list) {
                $delete_id = $list['id'];
                echo "<tbody>
                    <tr>
                        <td>" . $count . "</td>
                        <td>" . $list['task'] . "</td>
                        <td>
                            <button class='delete-btn'><a href='delete.php?id=$delete_id'>Delete</a>
                            </button>
                        </td>
                    </tr>
                </tbody>";
                $count += 1;
                
            }
            echo "</table>";
            unset($_SESSION["task_list"]);   
        }   
       
    }