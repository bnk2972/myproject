<?php
session_start();
include "../db/connection_db.php";
$db = new ConnectDatabase();
if(!empty($_POST['pwdold'])){
    $pass = $_POST['pwd'];
    $passold = md5($_POST['pwdold']);
    $passnew = md5($_POST['pwdnew']);
    if($pass != $passold){
        echo "F";
        exit;
    }
    if($pass == $passnew){
        echo "S";
        exit;
    }
    $UPDATE = "UPDATE member SET password = '{$passnew}' WHERE memberID = '{$_SESSION['MEMBER_ID']}'";
    $db->ExecuteSQL($UPDATE);
    echo true;
}
if(!empty($_POST['myself'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $UPDATE = "UPDATE member SET name = '{$name}', surname = '{$surname}', address = '{$address}', phone = '{$phone}' WHERE memberID = '{$_SESSION['MEMBER_ID']}'";
    $db->ExecuteSQL($UPDATE);
}
exit;
?>