<?php

try{
    $db = new PDO("mysql:dbname=shoot;host=localhost","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    $e->getMessage();
}
?>
