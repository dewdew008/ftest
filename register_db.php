<?php
echo $_POST['username'];
require("connection.php");
require ("RSA.class.php");
session_start();
 // RSA password
if (isset($_POST['username']))
{
    
    $u_username = ($_POST['username']);
    $u_password = ($_POST['password']);
    $u_firstname = ($_POST['firstname']);
    $u_lastname = ($_POST['lastname']);
    $u_email = ($_POST['email']);
    $u_phone = ($_POST['phone']);
    $u_status = "USER";
    $p = 7;
    $q = 13;
    $cipher =  RSA::Cryptosystem_En($u_password,$p,$q);
    $u_password = $cipher;

    //RSA Password




    $stmt = $db->prepare("INSERT INTO member(username,password,firstname,lastname,email,phone,status) VALUES (?,?,?,?,?,?,?)");
    $stmt->execute([$u_username,$u_password,$u_firstname,$u_lastname,$u_email,$u_phone,$u_status]);

    header("Location: login.php");
}
?>