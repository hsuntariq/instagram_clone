<div class="col-lg-7 mx-auto">
                        <?php  
                            include './config.php';
                            $select = "SELECT posts.id,posts.caption,posts.image,posts.location,users.username,users.user_image FROM posts JOIN users ON posts.user_id = users.id ORDER BY(id) DESC";
                            $result = mysqli_query($connection,$select);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    // echo "<pre>";
                                    // print_r($row);
                                    // echo "</pre>";
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
                           
                            <form action="./add-comment.php"  method='POST' autocomplete="off">
                                <input type="hidden" name="post_id" value="<?php echo $row['id'] ?>">
                                <?php 
                                    include './config.php';
                                    $id = $row['id'];
                                    $count = "SELECT COUNT(*) AS count FROM comments WHERE post_id = $id";
                                    $res = mysqli_query($connection,$count);
                                    $r = mysqli_fetch_assoc($res);
                                    if($r['count'] != 0){
                                        echo "<a class='text-decoration-none text-secondary' href='./comments.php?id={$id}'>View all {$r['count']} comments</a>";
                                    }else{
                                        echo "";
                                    }
                                ?>
                                <div class='d-flex justify-content-between'>

                                    <input class="w-100 border-0 comment" name="comment" type="text" placeholder="Add a comment...">
                                    <button type="submit" class="send">
                                        <i class="bi bi-send-fill"></i>
                                    </button>
                                </div>
                            </form>
                        </div>


                        <?php }}?>
                    </div>