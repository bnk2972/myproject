<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
$sql_product_new = "SELECT p.*,
                               pb.brandNAME,
                            (SELECT imgNAME FROM product_image pi WHERE p.productID = pi.productID AND imgshow = 1) AS imgshow
                    FROM product p 
                    LEFT JOIN product_brand pb ON p.brandID = pb.brandID";
if($_POST['status']==1){ 
    $title = "สินค้าทั่วไป";
    $sql_product_new .= " ORDER BY p.productID DESC";
}
if($_POST['status']==2){ 
    $title = "สินค้าใหม่";
    $sql_product_new .= " WHERE p.create_date_new_product >= CURDATE() 
                         ORDER BY p.create_date_new_product DESC";
}
?>
<div class="product-topic left">
    <div class="topic">
        <?=$title?>
    </div>
</div>
<?php
    $result_product_new = $db->MySQL($sql_product_new);
    $count = 0;
    $count_res = sizeof($result_product_new);
    if($count_res>0){
        $count_div = ceil($count_res/4);
        $j=0;
        for($i=0;$i<$count_div;$i++){
            echo '<div class="row">';
            $countdata = ($i+1)*4;
            if($countdata>$count_res) $countdata = $count_res;
            for($j;$j<$countdata;$j++){
                if(empty($_SESSION['MEMBER_ID'])){
                   $event_click = "pleaseLogin()"; 
                }else{
                   $event_click = ""; 
                }
                ?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <img src="img/img_product/<?=$result_product_new[$j]['imgshow']?>" style="height:134.5px;">
                            <div class="caption">
                                <h3>Printer : <?=$result_product_new[$j]['productNAME']?></h3>
                                <?php
                                if($_POST['status']==1){
                                    if(!empty($result_product_new[$j]['create_date_new_product']) && strtotime($result_product_new[$j]['create_date_new_product'])>=strtotime('today UTC')){
                                        echo '<h4><span class="label label-primary">NEW</span></h4>';
                                    }
                                }
                                if($_POST['status']==2){
                                    echo '<h4><span class="label label-primary">NEW</span></h4>';
                                }
                                ?>
                                <p>ยี่ห้อ : <?=$result_product_new[$j]['brandNAME']?></p>
                                <p style="text-align:right"><a href="javascript:void(0)" onclick="<?=$event_click?>" class="btn btn-primary" role="button">หยิบใส่ตะกร้า</a> <a href="javascript:void(0)" onclick="getShowDetailProduct(<?=$result_product_new[$j]['productID']?>)" class="btn btn-default" role="button">รายละเอียด</a></p>
                            </div>
                        </div>
                    </div>
                <?php
            }
            echo '</div>';
        }
    }
exit;
?>


