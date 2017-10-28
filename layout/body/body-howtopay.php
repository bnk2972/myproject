<?php
    $sql_ad = "SELECT * FROM how_to_pay WHERE id = 1";
    $result = $db->MySQL($sql_ad);
?>
<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                วิธีการชำระเงินสินค้า
            </div>
        </div>
        <div class="report-manage-product">
            <div class="advertise-image" style="position:relative; margin-top:10px; height:500px; padding:5px; border:1px solid #ccc; text-align:left;">
                <img src="<?=(!empty($result[0]['imgPath']) ? 'img/howtopay/'.$result[0]['imgPath']:'/img/advertise/no_img/No_Banner.png')?>" id="show-img-advertise" style="border:1px solid #ccc; width:50%; height:100%;">
                <div style="width:45%; padding:10px; border:1px solid #ccc; float:right; height:100%;">
                <h3 style="margin:0px; text-decoration:underline;">รายละเอียด</h3>
                <?=isset($result[0]['detail']) ? $result[0]['detail']:"ไม่มีรายละเอียด"?>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    td{
        padding-bottom:10px;
    }
</style>