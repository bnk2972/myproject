<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
if(!empty($_POST['productid'])){
    $del = "DELETE 
            FROM tmp_order_detail 
            WHERE memberid='{$_POST['memberid']}'
            AND productid ='{$_POST['productid']}'";
    $db->ExecuteSQL($del);
}
exit;
?>