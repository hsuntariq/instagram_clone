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
        ::placeholder {
            font-size: 0.7rem;
            color: gray !important;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="col-lg-4 m-auto ">
            <form action="./user_reg.php" method="POST" class='border p-4 col-lg-10'>
                <img class="d-block m-auto" width="100%"
                    src="https://www.vectorlogo.zone/logos/instagram/instagram-wordmark.svg" alt="">
                <p class="text-secondary fw-medium text-center">
                    Sign up to see photos and videos from your friends.
                </p>
                <input type="text" name="m_number" placeholder="Mobile number" class='form-control rounded-1 py-1 my-1'>
                <input type="text" name="f_name" placeholder="Full Name" class='form-control rounded-1 py-1 my-1'>
                <input type="text" name="username" placeholder="Username" class='form-control rounded-1 py-1 my-1'>
                <?php
                    if(isset($_SESSION['dup_user'])){
                ?>
                    <p class="text-danger dup fw-bolder">
                        <?php echo $_SESSION['dup_user'] ?>
                    </p>
                <?php
                    }
                ?>

                <input type="password" name="password" placeholder="Password" class='form-control rounded-1 py-1 my-1'>
                <p style='font-size:0.7rem' class="text-secondary text-center">
                    People who use our service may have uploaded your contact information to Instagram. Learn More</p>
                <p style='font-size:0.7rem' class="text-secondary text-center">

                    By signing up, you agree to our Terms , Privacy Policy and Cookies Policy .</p>

                <button class="btn btn-info w-100 my-1 text-white">
                    Log in
                </button>
            </form>
            <div class="sign-up text-center border p-3 my-3 col-lg-10">
                <p style="font-size:0.9rem" class='my-0'>Have an account? <a href="./login.php"
                        class="text-info text-decoration-none">
                        Log in
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script>
        let dup =document.querySelector('.dup');
        setTimeout(() => {
            dup.style.display = 'none'
        }, 2000);
    </script>

    <?php
        unset($_SESSION['dup_user']);
    ?>

</body>

</html>