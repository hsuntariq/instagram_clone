<?php
    session_start();
    include './config.php';
    if(isset($_SESSION['user_check'])){
        header("Location: $hostname/homePage.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './assets/boot_css.php' ?>
    <title>Instagram</title>
    <style>
        .img{
            position: relative;
        }
        .img img{
           
        }
        .imgs img{
            position: absolute;
            right:12%;
            top: 3.5%;
            transition: all 0.9s;
        }

        ::placeholder{
            font-size: 0.7rem;
            color: gray!important;
        }
    </style>
</head>
<body>
    
    <div class="container mt-5">
        <div class="row col-lg-7 m-auto align-items-center">
            <div class="col-lg-6">
                <div class="img">
                    <img width="100%" src="https://static.cdninstagram.com/images/instagram/xig/homepage/phones/home-phones.png?__makehaste_cache_breaker=HOgRclNOosk" alt="">
                    <div class="imgs">
                        <img class="anim" width="55%" src="./assets/images/screenshot1.png" alt="">
                        <img class="anim" width="55%" src="./assets/images/screenshot2.png" alt="">
                        <img class="anim" width="55%" src="./assets/images/screenshot3.png" alt="">
                        <img class="anim" width="55%" src="./assets/images/screenshot4.png" alt="">
                    </div>
                </div>
                    
            </div>
            <div class="col-lg-6 ">
                <form action="./log_user.php" method="POST" class='border p-5 col-lg-10'>
                    <img class="d-block m-auto" width="200px" src="https://www.vectorlogo.zone/logos/instagram/instagram-wordmark.svg" alt="">
                    <input type="text" name="credential" placeholder="Phone number,username or email" class='form-control rounded-1 py-1 my-1'>
                    <input type="password" name="password" placeholder="Password" class='form-control rounded-1 py-1 my-1'>
                    <?php
                        if(isset($_SESSION['invalid'])){
                    ?>
                        <p class="text-danger invalid fw-bolder">
                            <?php echo $_SESSION['invalid'] ?>
                        </p>
                    <?php
                        }
                    ?>
                    <button class="btn btn-info w-100 my-1">
                        Log in
                    </button>
                </form>
                <div class="sign-up text-center border p-3 my-3 col-lg-10">
                    <p style="font-size:0.9rem" class='my-0'>Don't have an account <a href="./signup.php" class="text-info  text-decoration-none">
                        Sign Up
                    </a>
                    </p>
                </div>
            </div>
            </div>
    </div>


    <?php include './assets/boot_js.php' ?>
    <script>
        let imgs =document.querySelectorAll('.anim')
        let count = 0;
        setInterval(()=>{
            count++
            if(count > imgs.length - 1){
                count = 0
            }
            imgs.forEach((img)=>{
                img.style.opacity = '0'
            })
            imgs[count].style.opacity = '1'
        },2000)
        let dup =document.querySelector('.invalid');
        setTimeout(() => {
            dup.style.display = 'none'
        }, 2000);

    </script>
    <?php
        unset($_SESSION['invalid']);
    ?>

</body>
</html>