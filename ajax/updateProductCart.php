<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
if(!empty($_POST['memberid'])){
    $memberid = $_POST['memberid'];
    $count = $_POST['count'];
    $productid = $_POST['productid'];
    $sql = "SELECT amount FROM product WHERE productID = '{$productid}'";
    $result = $db->MySQL($sql);
    if($count > $result[0]['amount']){ 
        $count = $result[0]['amount'];
        echo "T";
    }
    $update = "UPDATE tmp_order_detail SET quantity = '{$count}' WHERE memberid = '{$memberid}' AND productid = '{$productid}'";
    $db->ExecuteSQL($update);
}
exit;
?>