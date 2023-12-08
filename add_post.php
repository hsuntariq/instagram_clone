<?php 
    session_start();
    include './config.php';
    // get the current logged in user's id
    $id = $_SESSION['id'];
    // get the data
    $caption = $_POST['caption'];
    $location = $_POST['location'];
    //  for the database
    $fileName = $_FILES['post']['name'];
    // for the server
    $tmp_name = $_FILES['post']['tmp_name'];
    // insert into local folder
    move_uploaded_file($tmp_name, './posts/' . $fileName);
    // insert into database
    $insert = "INSERT INTO posts (caption,location,image,user_id) VALUES ('{$caption}','{$location}','{$fileName}',$id)";
    mysqli_query($connection,$insert);
    $_SESSION['post_done'] = 'Post uploaded successfully!!!';

    header("Location: $hostname/homePage.php");
?>