<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
if(!empty($_POST['memberid'])){
    $memberid = $_POST['memberid'];
    $sql_select = "SELECT tp.*,p.productNAME FROM tmp_order_detail tp
                   LEFT JOIN product p ON tp.productid = p.productID
                   WHERE tp.memberid = '{$memberid}'
                   ORDER BY tp.rowid ASC";
    $result = $db->MySQL($sql_select);
    if(sizeof($result) > 0){
        $n=1;
        foreach($result as $res){
            ?>
            <tr>
                <td style="text-align:center;"><?=$n?></td>
                <td style="text-align:center;">
                    <a href="javascript:void(0)" onclick="getShowDetailProduct(<?=$res['productid']?>)" role="button"><?=$res['productNAME']?></a></td>
                <td style="text-align:center;"><input style="width:50px; text-align:center;" type="number" min="1" data-product="<?=$res['productid']?>" class="quantity" id="quantity<?=$res['rowid']?>" name="quantity[<?=$res['rowid']?>]" value="<?=$res['quantity']?>"></td>
                <td style="text-align:center;"  id="unitprice<?=$res['rowid']?>">
                    <?=($res['unitPrice']*$res['quantity'])?>
                    <input type="hidden" class="unitprice" value="<?=($res['unitPrice']*$res['quantity'])?>">
                </td>
                <td style="text-align:center;"><button onclick="delProductInCart(<?=$res['productid']?>,'<?=$_POST['memberid']?>','<?=$res['productNAME']?>')" class="btn btn-danger"><span class="	glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button></td>
            </tr>
            <?php
            $n++;
        }
    }else{
        ?>
        <tr>
            <td colspan="5" style="text-align:center">ไม่มีสินค้าในตระกร้า</td>
        </tr>
        <?php
    }
}
exit;
?>