<?php
    $sql_ad = "SELECT * FROM advertise WHERE advertiseID = 1";
    $result_ad = $db->MySQL($sql_ad);
?>
<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                โฆษณา
            </div>            
        </div>
        <div class="advertise-manage">
                <div style="display:table; width:100%;">
                    <div style="display:table-row;">
                        <div style="display:table-cell; width:150px; font-size:20px;">หัวเรื่องโฆษณา : </div>
                        <div style="display:table-cell;">
                            <input type="text" readonly name="advertise_title" value="<?=(!empty($result_ad[0]['advertise_title']) ? $result_ad[0]['advertise_title']:'')?>">
                        </div>
                    </div>
                </div>
                
                <div class="advertise-image" style="position:relative; margin-top:10px; height:270px; padding:5px; border:1px solid #ccc;">
                    <img src="<?=(!empty($result_ad[0]['imageNAME']) ? 'img/advertise/'.$result_ad[0]['imageNAME']:'../../work/img/advertise/no_img/No_Banner.png')?>" id="show-img-advertise" style="width:100%; max-height:100%;">
                </div>
                <div style="width:100%; margin-top:10px;">
                    <div style="font-size:20px;">รายละเอียด : </div>
                    <textarea readonly class="textarea" style="padding:0px 10px; min-height:250px; background-color:white; border:none;" name="adv_detail" placeholder="ใส่รายละเอียด..." class="form-control"><?=(!empty($result_ad[0]['advertise_detail']) ? $result_ad[0]['advertise_detail']:'')?></textarea>
                </div>
        </div>
    </div>
</div>