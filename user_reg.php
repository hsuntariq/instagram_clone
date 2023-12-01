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

    $result = mysqli_query($connection,$insert);
    if($result){
        $_SESSION['success_reg'] = 'Welcome ' . $user_name;
        $_SESSION['user_check'] = $user_name;
        header("Location: $hostname/homePage.php");     
    }else{
        $_SESSION['error_reg'] = 'An Error Occured';
        header("Location: $hostname/signup.php");
    }
    
    ?>