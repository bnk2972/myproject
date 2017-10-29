<?php
session_start();
include "../layout/header/header.php";
include "../db/connection_db.php";
$db = new ConnectDatabase();
if(file_exists($_FILES['img']['tmp_name']) || is_uploaded_file($_FILES['img']['tmp_name'])){
    $orderid = $_POST['orderid'];
    $imgname = $_FILES['img']['name'];
    $imgtmp = $_FILES['img']['tmp_name'];
    $imgtype = pathinfo($imgname,PATHINFO_EXTENSION);
    $newname = "order_".$orderid.".".$imgtype;
    if(move_uploaded_file($imgtmp,"../img/order/".$newname)){
        $update = "UPDATE `order` SET path = '{$newname}' , statusID=2 , create_date_apply='".date('Y/m/d H:i:s')."' WHERE orderID = {$orderid} AND memberID = {$_SESSION['MEMBER_ID']}";
        if($db->ExecuteSQL($update,true)){
            ?>
            <script>
                window.onload = function(){
                    swal({
                      title: "บันทึกหลักฐานการโอนเงินเรียบร้อย",
                      type: "success",
                      confirmButtonColor: "#3eef6e",
                      confirmButtonText: "ตกลง"
                    },
                    function(){
                        window.location.href="../order_detail.php?orderid=<?=$_POST['orderid']?>";
                    });
                }
            </script>
            <?php
        }
    }
}
exit;
?>