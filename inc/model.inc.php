<?php


    declare(strict_types=1);

    function check_email_occurrence(object $pdo , string $email){
        $query = "SELECT email from peoples WHERE email=:email;";

        $statement = $pdo->prepare($query);
        $statement->bindParam(":email" , $email);
        $statement->execute();

        $result = $statement -> fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function valid_data(object $pdo , string $email , string $pwd){
        $query = "SELECT email from peoples WHERE email=:email AND pwd=:pwd;";

        $statement = $pdo->prepare($query);
        $statement->bindParam(":email" , $email);
        $statement->bindParam(":pwd" , $pwd);

        $statement->execute();

        $result = $statement -> fetch(PDO::FETCH_ASSOC);
        return $result;

    }
    function add_task_db(object $pdo, string $email, string $task) {
        $query = "INSERT INTO tasks (email, task) VALUES (:email, :task);";
    
        $statement = $pdo->prepare($query);
        $statement->bindParam(":email", $email); 
        $statement->bindParam(":task", $task); 
        $statement->execute();
    }
    
    function get_task_array_fromdb(object $pdo , string $email){
        $query = "SELECT * FROM tasks WHERE email=:email;";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":email", $email); 
        $statement->execute();
        
        $result = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $result[] = [
                'id' => $row['id'],
                'task' => $row['task'],
            ];
        }
        
        return $result;
    }
    function delete_task_fromdb(object $pdo , int $id){
        $query = "DELETE FROM tasks where id=:id;";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":id", $id); 
        $statement->execute();
    }
    function store_data_in_db(object $pdo ,string $fname , string $sname , string $email , string $pwd , string $repwd){
        $query = "INSERT INTO peoples (firstname , secondname , email , pwd , repwd) VALUES (:fname ,:sname , :email ,:pwd , :repwd);";

        $statement = $pdo -> prepare($query);

        $statement->bindParam(":fname" , $fname);
        $statement->bindParam(":sname" , $sname);
        $statement->bindParam(":email" , $email);
        $statement->bindParam(":pwd" , $pwd);
        $statement->bindParam(":repwd" , $repwd);

        $statement->execute();

    }