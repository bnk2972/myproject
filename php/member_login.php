<?php
session_start();
include "../db/connection_db.php";
$db = new ConnectDatabase();
if($_POST['email']=="admin"){
    $sql_admin = "SELECT *
                  FROM employee e
                  WHERE e.email = '{$_POST['email']}'
                  AND e.password = '{$_POST['pass']}'";
    $result_admin = $db->MySQL($sql_admin);
    if(sizeof($result_admin)>0){
        $_SESSION["ADMIN_ID"] = $result_admin[0]["employeeID"];
        $_SESSION["EMAIL"] = $result_admin[0]["email"];
        $_SESSION["FULLNAME"] = $result_admin[0]["name"]." ".$result_admin[0]["surname"];
        echo "ADMIN";
    }else{
        echo false;
    }
    exit;
}

$sql_login = "SELECT * 
              FROM member m 
              WHERE m.email = '{$_POST['email']}'
              AND m.password = '{$_POST['pass']}'";
$result_login = $db->MySQL($sql_login);
if(sizeof($result_login)>0){
    $_SESSION["MEMBER_ID"] = $result_login[0]["memberID"];
    $_SESSION["EMAIL"] = $result_login[0]["email"];
    $_SESSION["FULLNAME"] = $result_login[0]["name"]." ".$result_login[0]["surname"];
    echo "MEMBER";
}else{
    echo false;
}
exit;
?>