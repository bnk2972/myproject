<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
$sql = "SELECT p.*,
               pb.brandNAME
        FROM product p 
        LEFT JOIN product_brand pb 
        ON p.brandID = pb.brandID
        WHERE productID = {$_POST['productid']}";
$result = $db->MySql($sql);
if(sizeof($result)>0){
    $sql_img = "SELECT * FROM product_image WHERE productID = {$_POST['productid']} ORDER BY imgshow ASC";
    $result_img = $db->MySql($sql_img);
    $count_img = sizeof($result_img);
?>
<table class="modal-table">
    <tr>
        <td rowspan="5" class="modal-img">
            <div class="tb-img">
                <div class="tr-img">
                    <div class="container-image">
                        <a href="img/img_product/<?=$result_img[0]['imgNAME']?>" target="_blank">
                            <img src="img/img_product/<?=$result_img[0]['imgNAME']?>" style="max-width:100%; max-height:100%; vertical-align:middle;">
                        </a>
                    </div>
                </div>
            </div>
            <div class="tb-img">
                <div class="tr-img">
                    <?php
                      foreach($result_img as $res_img){
                          ?>
                            <div class="sub-img" data-link="img/img_product/<?=$res_img['imgNAME']?>">
                                <img src="img/img_product/<?=$res_img['imgNAME']?>" style="max-width:100%; max-height:100%; vertical-align:middle;">
                            </div>
                          <?php
                      }
                      if(5-$count_img != 0){
                          for($i=0;$i<5-$count_img;$i++){
                              ?>
                            <div class="sub-img" data-link="img/other/no_img.gif">
                                <img src="img/other/no_img.gif" style="max-width:100%; max-height:100%; vertical-align:middle;">
                            </div>
                              <?php
                          }
                      }
                      
                    ?>
                    
                   <!-- <div class="sub-img"></div>
                    <div class="sub-img"></div>
                    <div class="sub-img"></div>
                    <div class="sub-img"></div>-->
                </div>
            </div>
        </td>
        <td class="modal-td">ชื่อสินค้า&nbsp;:&nbsp;</td>
        <td>
            <input type="hidden" id="productid" name="productid" value="<?=$result[0]['productID']?>">
            <input type="text" id="productname" readonly value="<?=$result[0]['productNAME']?>" name="productname"></td>
    </tr>
    <tr>
        <td class="modal-td">ยี่ห้อสินค้า&nbsp;:&nbsp;</td>
        <td style="text-align:left;">
            <input type="text" id="brandname" readonly value="<?=$result[0]['brandNAME']?>" name="brandname">
        </td>
    </tr>
    <tr>
        <td class="modal-td">ประเภทสินค้า&nbsp;:&nbsp;</td>
        <td style="text-align:left;">
            <div id="tags" style="cursor:default; word-break: keep-all; padding-left:5px; padding-right:5px; min-width:100%; height:54px; border:1px solid #ccc; border-radius:4px;">
                <?php
                    $type_sql = "SELECT * FROM product_type WHERE typeID IN (".$result[0]['typeID'].")";
                    $res_type = $db->MySQL($type_sql);
                    $html = '';
                    foreach($res_type as $res){
                        $html .= '<span style="color:blue; text-decoration: underline;">'.$res['typeNAME'].'</span> , ';
                    }
                    $html = rtrim($html,', ');
                    echo $html;
                ?>
            </div>
        </td>
    </tr>
    <tr>
        <td class="modal-td">ราคา&nbsp;:&nbsp;</td>
        <td style="text-align:left;"><input readonly value="<?=$result[0]['price']?>" style="width:80%;" type="text" id="price" name="price" placeholder="กรุณาใส่ราคาสินค้า"> บาท/ชิ้น</td>
    </tr>
    <tr>
        <td class="modal-td">รายละเอียด&nbsp;:&nbsp;</td>
        <td>
            <textarea readonly name="detail" class="form-control textarea-detail textarea_cart" style="background-color:white; height:200px; color:black; cursor:default;"><?=$result[0]['detail']?></textarea>
        </td>
    </tr>
</table>
<?php
}
exit;
?>