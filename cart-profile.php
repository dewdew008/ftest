<?php
session_start();
require ("connection.php");
if(!isset($_SESSION['username'])){
    header("Location: login.php");


}
if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('Location: login.php');
}

    $user_id = $_GET['userID'];
    $user_own = $db->prepare("select * from member where user_id = '$user_id'");
    $user_own->execute();
    $user_own = $user_own->fetch(PDO::FETCH_ASSOC);

$username = $_SESSION['username'];
$user_stmt = $db->prepare("select * from member where username = '$username'");
$user_stmt->execute();
$user = $user_stmt->fetch(PDO::FETCH_ASSOC);


//echo "$user_id";


?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title><?php echo $user_own["firstname"]." ".$user_own["lastname"]; ?></title>
</head>
<body>
<!-- Nav bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php"><strong style="font-family: monospace;font-size: 30px">SHOOTING</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-auto">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="cart-profile.php?userID=<?php echo $user['user_id']?>">
                            <?php
                            echo $user['firstname']." ".$user['lastname'];
                            ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?logout=1" class="nav-link btn btn-danger"><strong>Logout</strong></a>
                    </li>

                </ul>

            </div>
        </div>

    </div>
</nav>

<h1 class="text-center"> <?php echo $user_own["firstname"]." ".$user_own["lastname"]; ?></h1>
<div class="container">
    <?php
    if($_SESSION['username'] == $user_own['username']){
        ?>
        <a href="upload-photo.php" class="btn btn-success btn-lg btn-block">Add Photo</a>
        <?php
    }
    ?>

<section class="photo">
    <div class="container">
        <div class="photo-grid">
            <!--                <div class="photo-grid--item">-->
            <!--                    <a href="img/photo-1.jpg" data-lightbox="image-1" data-title="My caption">-->
            <!--                        <img src="img/photo-1.jpg" alt="">-->
            <!--                    </a>-->
            <!--                </div>-->
            <!--                <div class="photo-grid--item">-->
            <!--                    <a href="img/photo-1.jpg" data-lightbox="image-2" data-title="My caption">-->
            <!--                        <img src="img/photo-1.jpg" alt="">-->
            <!--                    </a>-->
            <!--                </div><div class="photo-grid--item">-->
            <!--                    <a href="img/photo-1.jpg" data-lightbox="image-3" data-title="My caption">-->
            <!--                        <img src="img/photo-1.jpg" alt="">-->
            <!--                    </a>-->
            <!--                </div><div class="photo-grid--item">-->
            <!--                    <a href="img/photo-1.jpg" data-lightbox="image-4" data-title="My caption">-->
            <!--                        <img src="img/photo-1.jpg" alt="">-->
            <!--                    </a>-->
            <!--                </div><div class="photo-grid--item">-->
            <!--                    <a href="img/photo-1.jpg" data-lightbox="image-5" data-title="My caption">-->
            <!--                        <img src="img/photo-1.jpg" alt="">-->
            <!--                    </a>-->
            <!--                </div> -->
            <?php

            $stmt = $db->prepare("SELECT * FROM photo  where user_id = {$user_own["user_id"]} ORDER BY img_id DESC");
            if($stmt->execute()){
                while($img = $stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <div class="photo-grid--item">
                        <a href="cart-image.php?id=<?php echo $img['img_id'];?>">
                            <img src="<?php echo $img['img_watermark']?>" alt="">
                        </a>
                    </div>

                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/lightbox.js"></script>
</body>
</html>