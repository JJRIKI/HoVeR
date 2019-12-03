<?php

    session_start();
    $error = '';

    

    $input_email = $_POST['email'];
    $input_pass = $_POST['password'];

    $db_connection = pg_connect("host=bminer-apps port=5444 dbname=compliance user=compliance password=cs1230");

    $email = 'SELECT email FROM c_users WHERE email=? AND password=? LIMIT 1'; 
    $pass = 'SELECT password FROM c_users';

    $email_check = pg_query($email) or die('Error message: ' . pg_last_error());
    $pass_check = pg_query($pass) or die('Error message: ' . preg_last_error());



    if ($input_email = $email_check and $input_pass = $pass_check) 
        header("Location: ../home_page/index.html");    
    else 
        $error = "Invalid email or Password"
        

?>