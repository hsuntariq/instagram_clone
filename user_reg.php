<?php
    session_start();
    include './config.php';
    // get the values from the form
    $number = $_POST['m_number'];
    $f_name = $_POST['f_name'];
    $user_name = $_POST['username'];
    $pass = $_POST['password'];
    $insert = "INSERT INTO `users`(`m_number`, `f_name`, `username`, `password`) VALUES ($number,'{$f_name}','{$user_name}','{$pass}')";

    // execute the query

    try{
        $result = mysqli_query($connection,$insert);
        if($result){
            $_SESSION['id'] = mysqli_insert_id($connection);
            $_SESSION['success_reg'] = 'Welcome ' . $user_name;
            $_SESSION['user_check'] = $user_name;
            header("Location: $hostname/homePage.php");     
        }
    }catch(mysqli_sql_exception $e){
        if($e->getCode() == 1062){
            $_SESSION['dup_user'] = 'Username already exists/taken';
            header("Location: $hostname/signup.php");
        }
    }

    
    
    ?>