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
    $UPDATE = "UPDATE employee SET password = '{$passnew}' WHERE employeeID = '{$_SESSION['ADMIN_ID']}'";
    $db->ExecuteSQL($UPDATE);
    echo true;
}
if(!empty($_POST['myself'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $_SESSION['FULLNAME'] = $name.' '.$surname;
    $phone = $_POST['phone'];
    $UPDATE = "UPDATE employee SET name = '{$name}', surname = '{$surname}', phone = '{$phone}' WHERE employeeID = '{$_SESSION['ADMIN_ID']}'";
    $db->ExecuteSQL($UPDATE);
}
exit;
?>