<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
$sql = "select
            p.*,
            pb.brandNAME,
            pt.typeNAME
        from product p
        left join product_brand pb on pb.brandID = p.brandID
        left join product_type pt on pt.typeID = p.typeID
        where 1=1 ";
if($_POST['type'] == 1 && empty($_POST['search'])) $sql.= " and p.productNAME like '%".$_POST['search']."%'";
if($_POST['type'] == 2 && empty($_POST['search'])) $sql.= " and p.productID = ".$_POST['search'];
if($_POST['type'] == 3 && empty($_POST['search'])) $sql.= " and p.brandID = ".$_POST['search'];
$sql.= " order by p.productID desc";
$result = $db->MySQL($sql);
if(sizeof($result)>0){
    $num = 1;
    foreach($result as $res){
    ?>
        <tr>
            <td><?=$num?></td>
            <td><?=$res['productID']?></td>
            <td><?=$res['productNAME']?></td>
            <td><?=$res['brandNAME']?></td>
            <td>
                <?php
                    $typename = "";
                    $sql_type = "SELECT typeNAME FROM product_type WHERE typeID IN ({$res['typeID']})";
                    $result_type = $db->MySQL($sql_type);
                    foreach($result_type as $res_type){
                        $typename .= $res_type['typeNAME'].",";
                    }
                    $typename = rtrim($typename,",");
                ?>
                <button class="btn" onclick="checkTagType('<?=$typename?>','<?=$res['productNAME']?>')">
                    ตรวจสอบ <span class="glyphicon glyphicon-tags"></span>
                </button>
            </td>
            <td><?=$res['amount']?></td>
            <td><?=$res['price']?></td>
            <td>
                <?php
                    if($res['amount']>0)
                        echo '<button class="btn btn-success">กำลังขาย</button>';
                    else 
                        echo '<button class="btn btn-danger">สินค้าหมด</button>';
                ?>
                
            </td>
            <td><button class="btn btn-info" onclick="editProduct(<?=$res['productID']?>)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>แก้ไข</button> <button onclick="delProduct(<?=$res['productID']?>,'<?=$res['productNAME']?>')" class="btn btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>ลบ</button></td>
        </tr>
    <?php
        $num++;
    }
}else{
    ?>
    <tr>
        <td colspan="9">ยังไม่มีสินค้า</td>
    </tr>
    <?php
}
exit;
?>