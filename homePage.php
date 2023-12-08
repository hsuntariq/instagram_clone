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
        .send{
            background: transparent;
            border: none;
        }
        .comment{
            outline-width: 0;
        }
        .mid {
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

        .story-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;

        }

        .story-image img {
            width: 100%;
            object-fit: cover;
            height: 100%;
            border-radius: 50%
        }

        .story::-webkit-scrollbar {
            height: 3px !important;
        }

        .story::-webkit-scrollbar-thumb {
            height: 3px;
            background: lightgray;
        }

        .story {
            background: #fff;
            margin-top: 1rem;
            border-radius: 10px 10px 0 0;
            padding: 0.5rem;
        }

        .underlay {
            background: rgba(0, 0, 0, 0.5);
            height: 100vh;
            width: 100vw;
            position: fixed;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .overlay {
            background: white;
            width: 25%
        }

        .st-close {
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
            if(isset($_SESSION['post_done'])){
        ?>
    <div class="underlay">
        <div class="overlay text-center p-4 rounded-3">
            <h6>
                <?php echo $_SESSION['post_done'] ?>
            </h6>
            <button class='my-1 w-100 btn st-close text-white fw-bolder'>
                OK
            </button>
        </div>
    </div>
    <?php }?>



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
                <?php include './stories.php' ?>
                <div class="posts">
                    <div class="col-lg-7 mx-auto">
                        <?php  
                            include './config.php';
                            $select = "SELECT posts.id,posts.caption,posts.image,posts.location,users.username,users.user_image FROM posts JOIN users ON posts.user_id = users.id";
                            $result = mysqli_query($connection,$select);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                        ?>

                        <div class="card border-0 border-top border-bottom col-lg-11 m-auto my-3 p-2 py-4">
                            <div class="d-flex justify-content-between align-items-center px-3">
                                <div class="user-info d-flex gap-2">
                                    <img width="50px" src="<?php echo $row['user_image'] ? 
                                            $row['user_image'] : 'https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png'
                                        ?>" alt="">
                                    <h6 class='align-self-center'>
                                        <?php echo $row['username'] ?>
                                    </h6>
                                </div>
                                <div class="post-icon">
                                    <i class="bi bi-three-dots fs-4"></i>
                                </div>
                            </div>
                            <div class="card-image">
                                <img class='d-block m-auto' style="object-fit: cover;" width="100%" height="500px"
                                    src="./posts/<?php echo $row['image'] ?>" alt="">
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="reacts d-flex fs-4 align-items-center gap-3">
                                    <div class="heart">
                                    <i class="bi bi-heart"></i>
                                    </div>
                                    <div class="comment align-self-start">
                                    <i class="bi bi-chat"></i>
                                    </div>
                                    <div class="share">
                                    <i class="bi bi-send"></i>
                                    </div>
                                </div>
                                <div class="save fs-4">
                                <i class="bi bi-bookmark"></i>
                                </div>
                            </div>
                            <div class="user-data my-2 d-flex gap-2 align-items-center">
                                <h6 class='m-0 p-0'><?php echo $row['username']?> </h6>
                                <p class='m-0 p-0'><?php echo $row['caption']?> </p>
                            </div>
                            <form action="./add-comment.php" class='d-flex justify-content-between' method='POST' autocomplete="off">
                                <input type="hidden" name="post_id" value="<?php echo $row['id'] ?>">
                                <input class="w-100 border-0 comment" name="comment" type="text" placeholder="Add a comment...">
                                <button type="submit" class="send">
                                <i class="bi bi-send-fill"></i>
                                </button>
                            </form>
                        </div>


                        <?php }}?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>





    <?php include './assets/boot_js.php'?>
    <script>
        let under = document.querySelector('.underlay');
        let btn = document.querySelector('.st-close');
        btn.addEventListener('click', () => {
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