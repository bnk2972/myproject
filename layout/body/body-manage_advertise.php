<?php
    $sql_ad = "SELECT * FROM advertise WHERE advertiseID = 1";
    $result_ad = $db->MySQL($sql_ad);
?>
<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                จัดการแบนเนอร์ร้านค้า
            </div>            
        </div>
        <div class="advertise-manage">
            <form action="php/save_advertise.php" id="save_advertise" method="post" enctype="multipart/form-data">
                <div class="advertise-image" style="position:relative; margin-top:10px; height:270px; padding:5px; border:1px solid #ccc;">
                    <img src="<?=(!empty($result_ad[0]['imageNAME']) ? 'img/advertise/'.$result_ad[0]['imageNAME']:'/img/advertise/no_img/No_Banner.png')?>" id="show-img-advertise" style="width:100%; max-height:100%;">
                    <div id="upload-img-advertise" style="visibility:hidden; bottom:0; left:0; position:absolute; text-align:center; margin-bottom:20px; min-width:100%;">
                        <button type="button" class="btn btn-default" style="font-size:15px;" onclick="$('[name=advertise_img]').click()">เลือกไฟล์ภาพ</button>
                        <?php
                        if(!empty($result_ad[0]['imageNAME'])){
                        ?>
                        <button type="button" onclick="delImageAd()" style="font-size:15px;" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> ลบภาพ</button>
                        <?php
                        }
                        ?>
                    </div>
                    
                    <input type="file" name="advertise_img" style="display:none;">
                </div>
                <script>
                    $('[name=advertise_img]').change(function(){
                        if(this.files && this.files[0]){
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                $('#show-img-advertise').attr('src', e.target.result);
                            }
                            reader.readAsDataURL(this.files[0]);
                        }else{
                            $('#show-img-advertise').attr('src', "/img/advertise/no_img/No_Banner.png");
                        }
                    });
                </script>                
                <div style="width:100%; margin-top:10px; text-align:center;">
                    <button type="button" onclick="saveAdvertise()" style="font-size:20px;" class="btn btn-orange">บันทึก</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function saveAdvertise(){
        let defect = 0;
        if($('[name=advertise_title]').val()=="" || $('[name=advertise_title]').length==0){
            $(".defect-advertise").show();
            $('[name=advertise_title]').css("border-bottom","1px solid red");
            defect++;
        }else{
            $(".defect-advertise").hide();
            $('[name=advertise_title]').css("border-bottom","1px solid #ccc");
        }
        if($('[name=adv_detail]').val()=="" || $('[name=adv_detail]').length==0){
            $(".defect-detail").show();
            $('[name=adv_detail]').css("border","1px solid red");
            defect++;
        }else{
            $(".defect-detail").hide();
            $('[name=adv_detail]').css("border","1px solid #ccc");
        }
        if(defect==0){
            HTMLFormElement.prototype.submit.call(document.getElementById("save_advertise"))
        }
    }
    
    function delImageAd(){
        if(confirm("คุณต้องการลบภาพโฆษณาหรือไม่")){
            $.ajax({
                url:"/ajax/delImageAdvertise.php",
                data:{
                    del:1
                },
                type:"post",
                success:function(res){
                    if(res == true)
                        window.location.href = window.location.href;
                }
            });
        }
    }
</script>
