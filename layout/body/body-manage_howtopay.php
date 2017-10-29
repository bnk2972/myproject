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
            <form action="php/save_howtopay.php" id="save_advertise" method="post" enctype="multipart/form-data">
                <div class="advertise-image" style="position:relative; margin-top:10px; height:500px; padding:5px; border:1px solid #ccc; text-align:left;">
                    <img src="<?=(!empty($result[0]['imgPath']) ? 'img/howtopay/'.$result[0]['imgPath']:'/img/advertise/no_img/No_Banner.png')?>" id="show-img-advertise" style="border:1px solid #ccc; width:50%; height:100%;">
                    <div id="upload-img-advertise" style="margin-left:220px; visibility:hidden; bottom:0; left:0; position:absolute; margin-bottom:20px; min-width:100%;">
                        <button type="button" class="btn btn-default" style="font-size:15px;" onclick="$('[name=advertise_img]').click()">เลือกไฟล์ภาพ</button>
                        <?php
                        if(!empty($result[0]['imgPath'])){
                        ?>
                        <button type="button" onclick="delImageAd()" style="font-size:15px;" class="btn btn-default"><span class="glyphicon glyphicon-trash"></span> ลบภาพ</button>
                        <?php
                        }
                        ?>
                    </div>
                    <input type="file" name="advertise_img" style="display:none;">
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
                    <div style="width:45%; padding:10px; border:1px solid #ccc; float:right; height:100%;">
                    <h3 style="margin:0px; text-decoration:underline;">รายละเอียด</h3>
                    <textarea name="detail_howtopay" placeholder="กรอกรายละเอียด" class="form-control" style="height:95%;"><?=(!empty($result[0]['detail']) ? $result[0]['detail'] : "")?></textarea>
                    </div>
                </div>
                <div style="text-align:center;">
                    <button style="margin-top:10px;" onclick="saveHowToPay()" type="button" class="btn btn-success">บันทึก</button>
                </div>
            </form>
        </div>
        
    </div>
</div>
<style>
    td{
        padding-bottom:10px;
    }
</style>
<script>
    function saveHowToPay(){
            HTMLFormElement.prototype.submit.call(document.getElementById("save_advertise"))
    }
    function delImageAd(){
        if(confirm("คุณต้องการลบภาพหรือไม่")){
            $.ajax({
                url:"/ajax/delImgHowToPay.php",
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