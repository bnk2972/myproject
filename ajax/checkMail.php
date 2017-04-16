<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
if(isset($_POST['email'])){
    $sql_mail = "SELECT m.email FROM member m WHERE m.email = '{$_POST['email']}'";
    $result_mail = $db->MySQL($sql_mail);
    if(sizeof($result_mail)>0) echo false;
    else echo true;
}
exit;
?>