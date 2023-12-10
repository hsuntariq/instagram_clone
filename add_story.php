<?php
session_start();
    include './config.php';
    $caption = $_POST['caption'];
    $fileName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $id=$_SESSION['id']; 
    // insert images in the local folder
    move_uploaded_file($tmpName, './stories/' . $fileName);
    $insert = "INSERT INTO stories (caption,image,user_id) VALUES ('{$caption}','{$fileName}',$id)";
    $result = mysqli_query($connection,$insert);
    
    $_SESSION['story_uploaded'] = 'Story Uploaded Successfully!';
    header("Location: $hostname/homePage.php");

?>