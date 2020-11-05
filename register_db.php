<?php

 // RSA password
if (isset($_POST['btn_insert']))
{

    $u_username = strip_tags($_POST['txt-username']);
    $u_password = strip_tags($_POST['txt-password']);
    $u_firstname = strip_tags($_POST['txt-firstname']);
    $u_lastname = strip_tags($_POST['txt-lastname']);
    $u_email = strip_tags($_POST['txt-email']);
    $u_phone = strip_tags($_POST['txt-phone']);
    $u_status = "USER";


    //RSA Password




    $stmt = $db->prepare("INSERT INTO member(user_id,username,password,firstname,lastname,email,phone,status) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->execute([null,$u_username,$u_password,$u_firstname,$u_lastname,$u_email,$u_phone,$u_status]);

    header("Location: login.php");
}
?>