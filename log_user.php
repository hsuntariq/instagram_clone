<?php
    session_start();
    include './config.php';
    $credential= $_POST['credential'];
    $pass = $_POST['password'];

    $select = "SELECT * FROM users WHERE (username = '{$credential}' OR m_number = '{$credential}') AND password = '{$pass}'";
    $result = mysqli_query($connection,$select);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['user_check'] = '';
        $_SESSION['welcome'] = 'Welcome ' . $row['username'];
        header("Location: $hostname/homePage.php");

    }else{
        $_SESSION['invalid'] = 'Invalid Credentials';
        header("Location: $hostname/login.php");
    }

?>