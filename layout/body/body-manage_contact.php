<?php
    $sql_ad = "SELECT * FROM contact";
    $result_ad = $db->MySQL($sql_ad);
?>
<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                ตั้งค่าอื่นๆ
            </div>
        </div>
        <div class="report-manage-product">
            <form class="form-horizontal" method="post" action="/php/save_contact.php">
                <h3 style="margin:0px;">ช่องทางการติดต่อ</h3>
                <div style="border:1px solid #ccc; padding:10px;">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">FACEBOOK <span class="glyphicon glyphicon-link	Try it
"></span> :</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="กรุณาใส่ URL Facebook" class="form-control" id="facebook" name="facebook" value="<?=$result_ad[0]['url']?$result_ad[0]['url']:""?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">GOOGLE+ <span class="glyphicon glyphicon-link	Try it
"></span> :</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?=$result_ad[1]['url']?$result_ad[1]['url']:""?>" class="form-control" name="google" id="google" placeholder="กรุณาใส่ URL Google+">
                        </div>
                    </div>
                    <div class="form-group" >
                        <label class="control-label col-sm-2" for="pwd">INSTAGRAM <span class="glyphicon glyphicon-link	Try it
"></span> :</label>
                        <div class="col-sm-10"> 
                            <input type="text" value="<?=$result_ad[2]['url']?$result_ad[2]['url']:""?>" class="form-control" name="intragram" id="intragram" placeholder="กรุณาใส่ URL Instagram+">
                        </div>
                    </div>
                    <div class="form-group" >
                        <label class="control-label col-sm-2" for="pwd">เบอร์โทรศัพท์ <span class="	glyphicon glyphicon-phone
"></span> :</label>
                        <div class="col-sm-10"> 
                            <input type="text" class="form-control" value="<?=$result_ad[3]['tel']?$result_ad[3]['tel']:""?>" name="phone" id="phone" placeholder="กรุณาใส่เบอร์โทร">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">ที่อยู่บริษัท <span class="glyphicon glyphicon-home
"></span> :</label>
                        <div class="col-sm-10"> 
                            <textarea class="form-control" name="address" style="height:300px;"><?=$result_ad[4]['address']?$result_ad[4]['address']:""?></textarea>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:0px;"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">แก้ไข</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>

