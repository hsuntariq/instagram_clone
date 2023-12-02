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
        .flash {
            background: linear-gradient(to right, #E31484, #FE7504, #B903EB);
            width: max-content;
            position: fixed;
            right: 0;
            top: 0;
            transition: all 0.9s;
        }
        .story-image{
            width: 60px;
            height: 60px;
            border-radius: 50%;

        }
        .story-image img{
            width: 100%;
            object-fit: cover;
            height: 100%;
            border-radius: 50%
        }
        .story::-webkit-scrollbar{
            height: 3px !important;
        }
        .story::-webkit-scrollbar-thumb{
            height: 3px;
            background: lightgray;
        }

        .story{
            background: #fff;
            margin-top: 1rem;
            border-radius: 10px 10px 0 0;
            padding: 0.5rem;
        }

    </style>
</head>

<body>

    <?php
            include './config.php';
            if(!isset($_SESSION['user_check'])){
                header("Location: $hostname/login.php");
            }

            if(isset($_SESSION['welcome'])){
                echo "<div class='flash px-3 py-2 text-white'>
                    <div class='d-flex align-items-center gap-2'>
                        <div>
                        <img width='50px' src='https://png.pngtree.com/png-clipart/20230401/original/pngtree-three-dimensional-instagram-icon-png-image_9015419.png'>
                        </div>
                        <div>
                        {$_SESSION['welcome']} 
                        </div>
                        </div>
                </div>";
            }
           

           
            if(isset($_SESSION['success_reg'])){
                echo "<div class='flash px-3 py-2 text-white'>
                    <div class='d-flex align-items-center gap-2'>
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



    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 border border-right-secondary text-capitalize p-3" style='height:100vh'>
                <img width="100px" src="https://www.vectorlogo.zone/logos/instagram/instagram-wordmark.svg" alt="">
                <div class="mt-5 icons d-flex flex-column fs-5 gap-4" style=''>

                    <a href="#" class="d-flex text-dark gap-2 text-decoration-none">
                        <div class="icons">
                            <i class="bi bi-house-door-fill"></i>
                        </div>
                        <div class="text">
                            Home
                        </div>
                    </a>
                    <a href="#" class="d-flex text-dark gap-2 text-decoration-none">
                        <div class="icons">
                            <i class="bi bi-search"></i> </div>
                        <div class="text">
                            Explore
                        </div>
                    </a>
                    <a href="#" class="d-flex text-dark gap-2 text-decoration-none">
                        <div class="icons">
                            <i class="bi bi-chat-dots"></i> </div>
                        <div class="text">
                            Messages
                        </div>
                    </a>
                    <a href="#" class="d-flex text-dark gap-2 text-decoration-none">
                        <div class="icons">
                            <i class="bi bi-plus-square"></i> </div>
                        <div class="text">
                            Create
                        </div>
                    </a>
                    <a href="#" class="mt-auto   d-flex text-dark gap-2 text-decoration-none">
                        <div class="icons">
                            <i class="bi bi-person"></i> </div>
                        <div class="text">
                            profile
                        </div>
                    </a>
                </div>

            </div>
            <div class="col-lg-6" style='background: lightgray;'>
                <div class="stories">
                    <div class="d-flex mx-auto story align-items-center gap-3" style="width:80%;overflow-x:scroll">
                        <div class="single-story text-center">
                            <div class="story-image">
                                <img  src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" alt="">
                            </div>
                            <div class="story-text">
                                <h6>Ali</h6>
                            </div>
                            
                        </div>
                        <div class="single-story text-center">
                            <div class="story-image">
                                <img  src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" alt="">
                            </div>
                            <div class="story-text">
                                <h6>Ali</h6>
                            </div>
                            
                        </div>
                        <div class="single-story text-center">
                            <div class="story-image">
                                <img  src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" alt="">
                            </div>
                            <div class="story-text">
                                <h6>Ali</h6>
                            </div>
                            
                        </div>
                        <div class="single-story text-center">
                            <div class="story-image">
                                <img  src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" alt="">
                            </div>
                            <div class="story-text">
                                <h6>Ali</h6>
                            </div>
                            
                        </div>
                        <div class="single-story text-center">
                            <div class="story-image">
                                <img  src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" alt="">
                            </div>
                            <div class="story-text">
                                <h6>Ali</h6>
                            </div>
                            
                        </div>
                        <div class="single-story text-center">
                            <div class="story-image">
                                <img  src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" alt="">
                            </div>
                            <div class="story-text">
                                <h6>Ali</h6>
                            </div>
                            
                        </div>
                        <div class="single-story text-center">
                            <div class="story-image">
                                <img  src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" alt="">
                            </div>
                            <div class="story-text">
                                <h6>Ali</h6>
                            </div>
                            
                        </div>
                        <div class="single-story text-center">
                            <div class="story-image">
                                <img  src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" alt="">
                            </div>
                            <div class="story-text">
                                <h6>Ali</h6>
                            </div>
                            
                        </div>
                        <div class="single-story text-center">
                            <div class="story-image">
                                <img  src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" alt="">
                            </div>
                            <div class="story-text">
                                <h6>Ali</h6>
                            </div>
                            
                        </div>
                        <div class="single-story text-center">
                            <div class="story-image">
                                <img  src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" alt="">
                            </div>
                            <div class="story-text">
                                <h6>Ali</h6>
                            </div>
                            
                        </div>
                        <div class="single-story text-center">
                            <div class="story-image">
                                <img  src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" alt="">
                            </div>
                            <div class="story-text">
                                <h6>Ali</h6>
                            </div>
                            
                        </div>
                        <div class="single-story text-center">
                            <div class="story-image">
                                <img  src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" alt="">
                            </div>
                            <div class="story-text">
                                <h6>Ali</h6>
                            </div>
                            
                        </div>
                        <div class="single-story text-center">
                            <div class="story-image">
                                <img  src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" alt="">
                            </div>
                            <div class="story-text">
                                <h6>Ali</h6>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="posts"></div>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>



































    <script>
        let flash = document.querySelector('.flash');
        setTimeout(() => {
            flash.style.transform = 'translateX(100%)'
        }, 4000);
    </script>


    <?php
                    unset($_SESSION['success_reg']);
                    unset($_SESSION['welcome']);
                ?>


</body>

</html>