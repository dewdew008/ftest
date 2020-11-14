<?php
session_start();
require ("connection.php");
$img_id = $_GET['id'];
//echo "getID is".$img_id;
$username = $_SESSION['username'];
$stmt = $db->prepare("select * from photo where img_id = '$img_id'");
$stmt->execute();
$img = $stmt->fetch(PDO::FETCH_ASSOC);
$user_id = $img['user_id'];
$user_own = $db->prepare("select * from member where user_id = '$user_id'");
$user_own->execute();
$user_own = $user_own->fetch(PDO::FETCH_ASSOC);
$user_stmt = $db->prepare("select * from member where username = '$username'");
$user_stmt->execute();
$user = $user_stmt->fetch(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Cart-image</title>
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
                        <a class="nav-link" href="cart-profile.php?userID=<?php echo $user['user_id']; ?>">
                            <?php
                            echo $user["firstname"]." ".$user["lastname"];
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

<h1 class="text-center"><?php echo $img['img_title'] ?></h1>
    <div class="container" ><center>
        <!-- <div class="photo-grid"> -->
            <!-- show image -->
                    <!-- <div class="photo-grid--item"> -->
                        <a href="<?php echo $img['img_watermark'] ?>" data-lightbox="<?php echo $img['img_name'] ?>"
                           data-title="<?php echo $img['img_title'] ?>">
                            <img src="<?php echo $img['img_watermark'] ?>" alt="">&ensp;
                        </a>
                    <!-- </div> -->


            


<!--                --><?php
//                    $stmt = $db->prepare("SELECT * FROM photo where img_id = '$img_id'");
//                    $stmt->execute();
//                    if($img = $stmt->fetch(PDO::FETCH_ASSOC)){
//
//                ?>
<!--                        <div class="photo-grid--item">-->
<!--                            <a href="--><?php //echo $img['img_path']; ?><!--">-->
<!--                                <img src="--><?php //echo $img['img_path']?><!--" alt="">-->
<!--                            </a>-->
<!--                        </div>-->
<!--            --><?php //  $user_id = $img['user_id'];
//                    }
//                $file = $img['img_path']; //Let say If I put the file name Bang.png
//                echo "<a href='download.php?nama=".$file."'>download</a> ";
//                    ?>
<!---->
<!---->
<!--            --><?php
//                $owner_stmt = $db->prepare("select * from member where user_id = '$user_id'");
//                $owner_stmt->execute();
//                if($owner = $owner_stmt->fetch(PDO::FETCH_ASSOC)){
//                    ?>
<!---->
<!--                    Created By <a href="cart-profile.php">--><?php //echo $owner['firstname']." ".$owner['lastname']?><!--</a>-->
<!--            --><?//
//                }
//            ?>

        <!-- </div> -->
         &ensp;


        <!-- Download -->
            <?php
                            if($img['user_id']!=$_SESSION['user_id']){
                                $file = $img['img_watermark'];
                            }
                                else{
                                     $file = $img['img_path'];
                                }
                            //Let say If I put the file name Bang.png
                            // echo "<a href='download.php?nama=".$file."' class='btn btn-danger'>download</a> ";
                            ?>
                           <form method="POST" action="download.php">
                             <input type="hidden" name="nama" value="<?php echo $file; ?>"> 
                             <input type="submit" class="btn btn-danger" value="Download">

                            </form>

            <!-- Owner -->

            Created By <a href="cart-profile.php?userID=<?php echo $user_id; ?>"><?php echo $user_own['firstname']." ".$user_own['lastname']?></a>
    </div>
    </center>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/lightbox.js"></script>
</body>
</html>