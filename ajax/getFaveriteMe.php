<?php
session_start();
include "../db/connection_db.php";
$db = new ConnectDatabase();
$SELECT = "SELECT p.* FROM addfaverite af
           LEFT JOIN product p ON af.productID = p.productID
           WHERE af.memberID = {$_SESSION['MEMBER_ID']}
           ORDER BY af.create_date_fav DESC";
$result = $db->MySQL($SELECT);
if(sizeof($result)>0){
    $n = 1;
    foreach($result as $res){
    ?>
        <tr>
            <td style="text-align:center;"><?=$n?></td>
            <td style="text-align:center;"><a href="javascript:void(0)" onclick="getShowDetailProduct(<?=$res['productID']?>)" role="button"><?=$res['productNAME']?></a></td>
            <td style="text-align:center;"><?=$res['price']?></td>
            <td style="text-align:center;"><button onclick="delFaverite(<?=$res['productID']?>,'<?=$res['productNAME']?>')" class="btn btn-danger"><span class='glyphicon glyphicon-trash'></span> ลบ</button></td>
        </tr>
    <?php
        $n++;
    }
}else{
    ?>
    <tr><td colspan="4" style="text-align:center;">ไม่มีรายการสินค้าที่ชื่นชอบ</td></tr>
    <?php
}
exit;
?>