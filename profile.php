<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include './assets/boot_css.php';
    session_start();
    $username = $_SESSION['username'];
    $name = $_SESSION['f_name'];
    $id = $_GET['id'];
    echo "<title>
    
        {$name} ({$username})
    </title>"
        ?>
</head>

<body>
    <div class="row">
        <?php include './sidebar.php' ?>
        <div class="col-lg-10">
            <div class="container col-lg-7 mx-auto">
                <div class="top my-2 border-bottom pb-4">
                    <div class="d-flex align-items-center gap-5">
                        <div class="image">
                            <img width="100%" height="200px"
                                src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="">
                        </div>
                        <div class="user-info d-flex flex-column gap-3">
                            <div class="d-flex gap-3">
                                <h4>
                                    <?php echo $username ?>
                                </h4>
                                <button class="btn btn-secondary">
                                    Edit Profile
                                </button>
                                <button class="btn btn-secondary">
                                    View Archives
                                </button>
                            </div>
                            <div class="d-flex gap-3">
                                <h6>
                                    <?php
                                    include './config.php';
                                    $count = "SELECT COUNT(*) AS count FROM posts WHERE user_id = $id";
                                    $res = mysqli_query($connection, $count);
                                    $row = mysqli_fetch_assoc($res);
                                    if ($row['count'] > 1) {
                                        echo "{$row['count']} posts";
                                    } else {
                                        echo "{$row['count']} post";

                                    }

                                    ?>
                                </h6>
                                <h6>
                                    3 followers
                                </h6>
                                <h6>
                                    6 following
                                </h6>
                            </div>
                            <div class="f_name text-capitalize">

                                <h4>
                                    <?php echo $name ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    include './config.php';
                    $select = "SELECT * FROM posts WHERE user_id = $id";
                    $result = mysqli_query($connection, $select);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="col-lg-4">
                                <div class="card mx-0 my-1">
                                    <img width="100%" height="200px" style="object-fit:cover" src="./posts/<?php echo $row['image'] ?>" alt="">
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php include './assets/boot_js.php' ?>

</body>

</html>