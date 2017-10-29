<?php
    $sql = "SELECT * FROM member WHERE memberID = '{$_SESSION['MEMBER_ID']}'";
    $result = $db->MySQL($sql);
?>
<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                STEP 2 : ตรวจสอบที่อยู่ที่จัดส่งสินค้า
                <div style="float:right;  vertical-align:top;">
                    <button class="btn btn-primary" id="step" onclick="window.location.href='mycart-step3.php?step=3'">ต่อไป <span class="glyphicon glyphicon-chevron-right"></span></button>
                </div> 
                <div style="float:right; margin-right:10px; vertical-align:top;">
                    <button class="btn btn-danger" id="step" onclick="window.location.href='mycart.php'"><span class="glyphicon glyphicon-chevron-left"></span> ย้อนกลับ</button>
                </div>
            </div>
        </div>
        <div class="report-manage-product">
            <table style="width:100%;">
                <tbody id="cart-product">
                    <tr>
                        <td width="20%">ชื่อผู้สั่งซื้อ</td>
                        <td width="5%">:</td>
                        <td>
                            <input type="text" class="form-control" value="<?=$result[0]['name']?> <?=$result[0]['surname']?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;">
                            <div>ที่อยู่ที่จัดส่งสินค้า</div>
                            <div style="font-size:12px;">
                                <input type="radio" name="address" value="1" checked>
                                ที่อยู่ที่จัดส่งเดิม
                            </div>
                            <div style="font-size:12px;">
                                <input type="radio" name="address" value="2">
                                ที่อยู่ที่จัดส่งใหม่
                            </div>
                        </td>
                        <td style="vertical-align:top;">:</td>
                        <td>
                            <textarea readonly class="form-control" name="address_text" style="height:300px;"><?=$result[0]['address']?></textarea>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn btn-success" onclick="editAddress()" id="save" style="display:none;">บันทึก</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<style>
    td{
        padding-bottom:10px;
    }
</style>
<script>
    var address = $("[name=address_text]").val()
    $("[name=address]").change(function(){
        var num = $(this).val();
        if(num == 1){
            $("[name=address_text]").val(address).attr("readonly",true);
            $("#step").removeAttr("disabled");
            $("#save").hide();
        }
        if(num == 2){
            $("[name=address_text]").removeAttr("readonly").val("");
            $("#step").attr("disabled",true);
            $("#save").show();
        }
    });
    
    function editAddress(){
        if($("[name=address_text]").val().length <= 5){
            alert("กรุณากรอกข้อมูลให้ถูกต้อง");
            return false;
        }
        $.ajax({
            url:"ajax/saveAddress.php",
            data:{
                address : $("[name=address_text]").val(),
                memberid : '<?=$_SESSION['MEMBER_ID']?>'
            },
            type:"post",
            success:function(){
                window.location.href = window.location.href;
            }
        })
        
    }
</script>