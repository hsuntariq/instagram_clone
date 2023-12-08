<div class="stories">
                    <div class="d-flex mx-auto story align-items-center gap-3" style="width:80%;overflow-x:scroll">
                        <?php  
                            include './config.php';
                            $select = "SELECT stories.id AS story_id, users.id AS user_id, users.username, stories.image
                            FROM stories 
                            JOIN users ON stories.id = users.id 
                            GROUP BY user_id";
                            // $user = "SELECT * FROM users WHERE id "
                            $result = mysqli_query($connection,$select);
                            if(mysqli_num_rows($result) > 0){
                                
                                
                                while($row = mysqli_fetch_assoc($result)){
                                    // echo "<pre>";
                                    // print_r($row);
                                    // echo "</pre>";
                        ?>
                        
                        <a href="./single.php?id=<?php echo $row['story_id']?>" class="single-story text-center">
                            <div class="story-image">
                                <img  src='./stories/<?php echo $row['image'] ?>' alt="">
                            </div>
                            <div class="story-text">
                                <?php echo $row['username'] ?>
                            </div>
                            
                        </a>
                        <?php
                                }}
                        ?>
                    </div>
                </div>