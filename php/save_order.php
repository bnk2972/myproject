<?php
session_start();
include "../layout/header/header.php";
include "../db/connection_db.php";
$db = new ConnectDatabase();
$select = "SELECT * FROM tmp_order_detail WHERE memberid = '{$_SESSION['MEMBER_ID']}' ORDER BY rowid ASC";
$result = $db->MySQL($select);
$select_member = "SELECT address FROM member WHERE memberid = '{$_SESSION['MEMBER_ID']}'";
$result_member = $db->MySQL($select_member);
$totalPay = 0;
foreach($result as $res){
    $amount_product = "UPDATE product SET amount = amount-{$res['quantity']}, buy_amount=buy_amount+1 WHERE productID = '{$res['productid']}'";
    $db->ExecuteSQL($amount_product);
    $totalPay = $totalPay+($res['unitPrice']*$res['quantity']);
}
$create_date = date("d/m/Y H:i:s");
$insert_order = "INSERT INTO `order`(memberID,create_date_order,statusID,totalPay,address) VALUES('".$_SESSION['MEMBER_ID']."',STR_TO_DATE('{$create_date}','%d/%m/%Y %H:%i:%s'),'1','{$totalPay}','{$result_member[0]['address']}')";
$orderid = $db->ExecuteSQL($insert_order);
$insert_order_detail = "INSERT INTO order_detail(orderID,productID,unitPrice,quantity) VALUES";
foreach($result as $res){
    $insert_order_detail .= "('{$orderid}','{$res['productid']}','{$res['unitPrice']}','{$res['quantity']}'),";
}
$insert_order_detail = rtrim($insert_order_detail,',');
if($db->ExecuteSQL($insert_order_detail,true)){
    $del = "DELETE FROM tmp_order_detail WHERE memberid = {$_SESSION['MEMBER_ID']}";
    $db->ExecuteSQL($del);
}
?>
<script>
    window.onload = function(){
        swal({
          title: "บันทึกการสั่งซื้อแล้วเรียบร้อย",
          type: "success",
          confirmButtonColor: "#3eef6e",
          confirmButtonText: "ตกลง"
        },
        function(){
            window.location.href="../order.php";
        });
    }
</script>
<?php
exit;
?>