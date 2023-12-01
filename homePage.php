<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './assets/boot_css.php' ?>

    <title>Home</title>
    <style>
        .flash{
            background: linear-gradient(to right, #E31484,#FE7504,#B903EB);
            width: max-content;
            position: fixed;
            right: 0;
            top: 0;
            transition: all 0.9s;
        }
    </style>
</head>
<body>
        <?php
            include './config.php';
            if(!isset($_SESSION['user_check'])){
                header("Location: $hostname/login.php");
            }

            if(isset($_SESSION['success_reg'])){
                echo "<div class='flash px-3 py-2 text-white'>
                    <div class='d-flex align-items-center gap-3'>
                        <div>
                        <img width='50px' src='https://png.pngtree.com/png-clipart/20230401/original/pngtree-three-dimensional-instagram-icon-png-image_9015419.png'>
                        </div>
                        <div>
                        {$_SESSION['success_reg']} 
                        </div>
                        </div>
                </div>";
            }
        ?>

            <h1>This is the homepage</h1>
            <a href="./logout.php" class="btn btn-danger">
                Logout
            </a>
            <script>
                let flash =document.querySelector('.flash');
                setTimeout(() => {
                    flash.style.transform = 'translateX(100%)'
                }, 4000);
            </script>


                <?php
                    unset($_SESSION['success_reg']);
                ?>


</body>
</html>