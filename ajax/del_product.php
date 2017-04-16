<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();

if(!empty($_POST["delBrand"])){
    $delBrand = "DELETE FROM product_brand WHERE brandID = '{$_POST['brandID']}'";
    if($db->ExecuteSQL($delBrand,true)) 
        echo json_encode(array('status'=>true,'msg'=>'ลบยี่ห้อสำเร็จ'));
}

if(!empty($_POST['delType'])){
    $delBrand = "DELETE FROM product_type WHERE typeID = '{$_POST['typeID']}'";
    if($db->ExecuteSQL($delBrand,true)) 
        echo json_encode(array('status'=>true,'msg'=>'ลบยี่ห้อสำเร็จ'));
}

if(!empty($_POST['delProduct'])){
    $delProduct = "DELETE FROM product WHERE productID = '{$_POST['productID']}'";
    if($db->ExecuteSQL($delProduct,true)){
        $sql_product_img = "SELECT * FROM product_image WHERE productID = '{$_POST['productID']}'";
        $result_pro_img = $db->MySQL($sql_product_img);
        if(sizeof($result_pro_img)>0){
            foreach($result_pro_img as $res){
                unlink($res["path"]);
            }
            $delProductImg = "DELETE FROM product_image WHERE productID = '{$_POST['productID']}'";
            if($db->ExecuteSQL($delProductImg,true))
                echo json_encode(array('status'=>true,'msg'=>'ลบสินค้าสำเร็จ'));
        }
    }
}
exit;
?>