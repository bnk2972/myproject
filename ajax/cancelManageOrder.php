<?php
session_start();
include "../db/connection_db.php";
$db = new ConnectDatabase();
$update = "UPDATE `order` SET statusID = '{$_POST['status']}', remark = NULL, create_date_confirm = '".date('Y-m-d H:i:s')."' WHERE orderID = '{$_POST['orderid']}'";
$db->ExecuteSQL($update,true);
$select = "SELECT * FROM order_detail WHERE orderID = '{$_POST['orderid']}'";
$result = $db->MySQL($select);
foreach($result as $res){
    $amount_product = "UPDATE product SET amount = amount+{$res['quantity']}, buy_amount=buy_amount-1 WHERE productID = '{$res['productID']}'";
    $db->ExecuteSQL($amount_product);
}
?>