
<style>
    body{
        padding: 0;
        margin: 0;
    }
    .underlay{
        background: #1A1A1A;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .underlay img{
        height: 100%;
        width: 100%;
        object-fit: contain;
        margin: auto;
        display: block;
    }
    .card{
        height: 85% !important;
        border-radius: 20px;
        background: #D9D2DA !important;
        width: 20%;
        padding: 2rem;

    }
</style>
<?php
    include './config.php';
    include './assets/boot_css.php';
    $id = $_GET['id'];
    $select = "SELECT * FROM stories WHERE id = $id";
    $result = mysqli_query($connection,$select);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
?>
    <div class="underlay">
        <div class="card">
            <img src="./stories/<?php echo $row['image'] ?>" alt="">
            <h5 class="text-center text-capitalize">
                <?php echo $row['caption'] ?>
            </h5>
        </div>
    </div>
<?php 
        }}
?>