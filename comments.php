<?php
include './config.php';
include './assets/boot_css.php';
$id = $_GET['id'];
$post_image = "SELECT posts.image,users.username,posts.caption FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = $id";
$res1 = mysqli_query($connection, $post_image);
$row1 = mysqli_fetch_assoc($res1);
?>

<style>
    .bg {
        background: rgba(0, 0, 0, 0.7);
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .cross {
        position: absolute;
        right: 10px;
        top: 20px;
    }

    .ol {
        background: #fff;
    }
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
        .comment-section{
            position: relative;
        }
        .comment-form{
            position: absolute;
            bottom: 0;
            width: 95%
        }

</style>


<div class="container-fluid bg">
    <a href="./homePage.php" class="cross">
        <i class="bi bi-x-lg fs-4 text-white"></i>
    </a>
    <div class="container ol ">
        <div class="row">
            <div class="col-lg-7 p-0">
                <img width="100%" height="800px" style="object-fit: cover;" src="./posts/<?php echo $row1['image'] ?>"
                    alt="">
            </div>
            <div class="col-lg-5 border-start p-3 comment-section">
                <h5>
                    <?php echo $row1['username'] ?>
                </h5>
                <hr>
                <div class="">
                    <h5 class>
                        <?php echo $row1['username'] ?>
                    </h5>
                    <p>
                        <?php echo $row1['caption'] ?>
                    </p>
                </div>
                <div class="comments ">
                    <?php
                    include './config.php';
                    $comments = "SELECT comments.comment,users.username,users.user_image FROM comments JOIN users ON comments.user_id = users.id WHERE post_id = $id";
                    $res2 = mysqli_query($connection, $comments);
                    if (mysqli_num_rows($res2) > 0) {
                        while ($row2 = mysqli_fetch_assoc($res2)) {
                            ?>
                            <div class="d-flex gap-2 align-items-center my-2">
                                <div class="d-flex gap-2 align-items-center">
                                    <img width="30px" height="30px" style="border-radius:50%"
                                        src="http://localhost/instagram/posts/Untitled%20design.png" alt="">
                                    <h6 class='m-0'>
                                        <?php echo $row2['username'] ?>
                                    </h6>
                                </div>
                                <p class='m-0'></p>
                                <?php echo $row2['comment'] ?>
                                </p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="comment-form">

                    <form action="./add-comment.php" method='POST' autocomplete="off">
                        <input type="hidden" name="post_id" value="<?php echo $id ?>">
                        <div class='d-flex justify-content-between'>
                            <input class="w-100 border-0 comment" name="comment" type="text" placeholder="Add a comment...">
                            <button type="submit" class="send">
                                <i class="bi bi-send-fill"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>