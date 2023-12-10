<?php
    session_start();
    include './config.php';
    $page = $_SERVER['HTTP_REFERER'];
    // get the values from the form
    // user id
    $id = $_SESSION['id'];
    $post_id = $_POST['post_id'];
    $comment = $_POST['comment'];
    $insert = "INSERT INTO comments (comment,post_id,user_id) VALUES ('{$comment}',$post_id,$id)";
    mysqli_query($connection,$insert);
    header("Location: $page");
?>
