<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
if(!empty($_POST['productid'])){
    $memberid = $_POST['memberid'];
    $productid = $_POST['productid'];
    $price = $_POST['price'];
    $sql_select = "SELECT * FROM tmp_order_detail WHERE productid = '{$productid}' AND memberid = '{$memberid}'";
    $result = $db->MySQL($sql_select);
    if(sizeof($result) == 0){
        $insert_tmp = "INSERT INTO tmp_order_detail(memberid,productid,unitPrice,quantity) 
                       VALUES(".$memberid.",".$productid.",".$price.",1)";
        if($db->ExecuteSQL($insert_tmp,true)) echo true;
    }else{
        echo false;
    }
}
exit;
?>