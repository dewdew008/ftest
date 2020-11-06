<?php
$registeredEmails = array('test1@test.com', 'test2@test.com', 'test3@test.com');

$requestedEmail  = $_POST['email'];

if( in_array($requestedEmail, $registeredEmails) ){
    echo 'false';
}
else{
    echo 'true';
}
?>