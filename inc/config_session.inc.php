<?php

    ini_set('session_use_only_cookies',1);
    ini_set('session_use_strict_mode',1);

    session_set_cookie_params([
        'lifetime' => 1800,
        'path' => '/',
        'domain' => 'localhost',
        'secure' => true,
        'httponly' => true
    ]);

    session_start();

    if(!isset($_SESSION["last_generation"])){
        session_regenerate_id();
    }else{
        $interval = 60 * 30;
        //In the following line we used a formula for caluculating the interval
        //This formula gives the time difference between the current time() and last generated current time()
        //If the difference is greater than $interval , we must regenerate our id.
        if(time() - $_SESSION["last_generation"] >= $interval){
            session_regenerate_id();
        }
    }
    function regerate_session_id(){
        session_regenerate_id();
        $_SESSION["last_regeneration"] = time();
    }
?>
