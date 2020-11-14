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
require("connection.php");
$email_stmt = $db->prepare("select * from member where email = " . $_POST['email'] );
$email_stmt->execute();
$email = $email_stmt->fetch(PDO::FETCH_ASSOC);
if ($email[0]['user_id'] != null) {
    echo "Email already exists";
}
console_log($email);
?>