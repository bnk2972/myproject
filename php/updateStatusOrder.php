<?php
session_start();
include "../layout/header/header.php";
include "../db/connection_db.php";
$db = new ConnectDatabase();
$orderid = $_POST['orderid'];
$status = $_POST['order_status'];
$update = "UPDATE `order` SET statusID = '{$status}'";
if($status == 3) $update.=", create_date_confirm = '".date("Y-m-d H:i:s")."'";
if(!empty($_POST['remark'])) $update.=", remark = '{$_POST['remark']}'";
if(!empty($_POST['tracking'])) $update.=", trackcode = '{$_POST['tracking']}'";
if(!empty($_POST['datetrack'])){ 
    list($d,$m,$y) = explode("/",$_POST['datetrack']);
    $date = $y."-".$m."-".$d;
    $update.=", create_date_track = '{$date}'";
}
$update.= " WHERE orderID = {$orderid}";
if($db->ExecuteSQL($update,true)){
?>
    <script>
        window.onload = function(){
            swal({
              title: "บันทึกข้อมูลสำเร็จ",
              type: "success",
              confirmButtonColor: "#3eef6e",
              confirmButtonText: "ตกลง"
            },
            function(){
                window.location.href="../manage_order_detail.php?orderid=<?=$orderid?>";
            });
        }
    </script>
<?php
}
?>