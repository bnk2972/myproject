<?php
    $sql_ad = "SELECT * FROM contact";
    $result_ad = $db->MySQL($sql_ad);
?>
<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                ติดต่อเรา
            </div>
        </div>
        <div class="report-manage-product">
            <table style="width:100%;">
                <thead>
                    <tr>
                        <th style="text-align:center; width:40%; border-bottom:1px solid #ccc;">ช่องทาง</th>
                        <th style="text-align:center; width:60%; border-bottom:1px solid #ccc; border-left:1px solid #ccc;">ติดต่อ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($result_ad[0]['url'])){
                    ?>
                    <tr>
                        <td style="text-align:center; border-bottom:1px solid #ccc;">
                        <img src="img/icon/facebook.png" style="width:100px; height:100px;">
                        </td>
                        <td style="text-align:center; border-bottom:1px solid #ccc; border-left:1px solid #ccc;">
                            <a href="<?=$result_ad[0]['url']?>" target="_blank">Facebook</a>
                        </td>
                    </tr>
                    <?php
                        }
                        if(!empty($result_ad[1]['url'])){
                    ?>
                    <tr>
                        <td style="text-align:center; border-bottom:1px solid #ccc;">
                            <img src="img/icon/google.png" style="width:100px; height:100px;">
                        </td>
                        <td style="text-align:center; border-bottom:1px solid #ccc; border-left:1px solid #ccc;">
                            <a href="<?=$result_ad[1]['url']?>" target="_blank">Google +</a>
                        </td>
                    </tr>
                    <?php
                        }
                        if(!empty($result_ad[2]['url'])){
                    ?>
                    <tr>
                        <td style="text-align:center; border-bottom:1px solid #ccc;">
                            <img src="img/icon/instagram.ico" style="width:100px; height:100px;">
                        </td>
                        <td style="text-align:center; border-bottom:1px solid #ccc; border-left:1px solid #ccc;">
                            <a href="<?=$result_ad[2]['url']?>" target="_blank">Instagram</a>
                        </td>
                    </tr>
                    <?php
                        }
                        if(!empty($result_ad[4]['address'])){
                    ?>
                    <tr>
                        <td style="text-align:center; border-bottom:1px solid #ccc;">
                            <img src="img/icon/address.png" style="width:100px; height:100px;">
                        </td>
                        <td style="text-align:center; border-left:1px solid #ccc; border-bottom:1px solid #ccc;">
                            ที่อยู่ : <?=$result_ad[4]['address']?>
                        </td>
                    </tr>
                    <?php
                        }if(!empty($result_ad[3]['tel'])){
                    ?>
                    <tr>
                        <td style="text-align:center; border-bottom:1px solid #ccc;">
                            <img src="img/icon/phone.png" style="width:100px; height:100px;">
                        </td>
                        <td style="text-align:center; border-bottom:1px solid #ccc; border-left:1px solid #ccc;">
                            Tel : <?=$result_ad[3]['tel']?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
    td{
        padding: 3px;
    }
</style>