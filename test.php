<<<<<<< HEAD
<?php

require ("RSA.class.php");

if(isset($_REQUEST['btn'])){
    $p = $_POST['p'];
    $q = $_POST['q'];
    $text = $_POST['txt'];
    //Example for Use Encrypt with RSA
    $cipher =  RSA::Cryptosystem_En("$text",$p,$q);
//Example for Use Decrypt with RSA
    $plain = RSA::Cryptosystem_De("$cipher",$p,$q);
}
=======
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Index</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#"><strong style="font-family: monospace;font-size: 30px">SHOOTING</strong></a>
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
>>>>>>> 8fa75b2ff193e9f6ded4cd56ae958e0451e66d67

?>
<html>
    <head>

    </head>
    <body>
        <form method="post">
            <p>Enter p:</p>
            <input type="text" name="p">
            <p>Enter q:</p>
            <input type="text" name="q">
            <p>Enter Plaintext:</p>
            <input type="text" name="txt">
            <input type="submit" name="btn">
        </form>
        <?php
            if(isset($cipher)){
                ?>
                <p>Cipher is <?php echo $cipher;?></p>
                <?php
            }
        ?>
        <?php
        if(isset($plain)){
            ?>
            <p>Plaintext is <?php echo $plain;?></p>
            <?php
        }
        ?>
    </body>

</html>
