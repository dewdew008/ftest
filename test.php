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
