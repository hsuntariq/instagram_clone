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
        .mid{
            background: rgb(247, 247, 247);
        }
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

        .underlay{
            background: rgba(0,0,0,0.5);
            height: 100vh;
            width: 100vw;
            position: fixed;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .overlay{
            background: white;
            width:25%
            
        }
        .st-close{
            background: linear-gradient(to right, #E31484, #FE7504, #B903EB);
        }

    </style>
</head>

<body>

        <?php
            if(isset($_SESSION['story_uploaded'])){
        ?>
            <div class="underlay">
            <div class="overlay text-center p-4 rounded-3">
                <h6>
                    <?php echo $_SESSION['story_uploaded'] ?>
                </h6>
                <button class='my-1 w-100 btn st-close text-white fw-bolder'>
                        OK
                </button>
            </div>
        </div>



    <?php
    }
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
            <?php include './sidebar.php' ?>

            <div class="col-lg-6 mid" style=''>
                <div class="stories">
                    <div class="d-flex mx-auto story align-items-center gap-3" style="width:80%;overflow-x:scroll">
                        <?php  
                            include './config.php';
                            $select = "SELECT * FROM stories";
                            // $user = "SELECT * FROM users WHERE id "
                            $result = mysqli_query($connection,$select);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <a href="./single.php?id=<?php echo $row['id']?>" class="single-story text-center">
                            <div class="story-image">
                                <img  src='./stories/<?php echo $row['image'] ?>' alt="">
                            </div>
                            <div class="story-text">
                                
                            </div>
                            
                        </a>
                        <?php
                                }}
                        ?>
                    </div>
                </div>
                <div class="posts"></div>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>





    <?php include './assets/boot_js.php'?>
    <script>
        let under =document.querySelector('.underlay');
        let btn = document.querySelector('.st-close');
        btn.addEventListener('click',()=>{
            under.style.display = 'none'
        })
    </script>



        <?php 
            unset($_SESSION['story_uploaded']);
        ?>































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