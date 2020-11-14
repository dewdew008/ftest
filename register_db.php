<?php
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
//echo $_POST['username'];
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


    $email_stmt = $db->prepare("select * from member where email =  '$u_email' ");
    //console_log($email_stmt);
    $email_stmt->execute();
    //console_log($email_stmt);
    $email = $email_stmt->fetch(PDO::FETCH_ASSOC);
    console_log($email);
    if ($email['user_id'] != null) {
    header("Location: register.php?text=Email already exists");

    }
else{

    $stmt = $db->prepare("INSERT INTO member(username,password,firstname,lastname,email,phone,status) VALUES (?,?,?,?,?,?,?)");
    $stmt->execute([$u_username,$u_password,$u_firstname,$u_lastname,$u_email,$u_phone,$u_status]);

    header("Location: login.php");
}
}
?>