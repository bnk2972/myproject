<?php
$SELECT = "SELECT * FROM member WHERE memberID = {$_SESSION['MEMBER_ID']}";
$result = $db->MySQL($SELECT);
?>
<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                ข้อมูลส่วนตัว
            </div>
        </div>
        <div class="report-manage-product">
            <form class="form-horizontal" action="php/editPassword.php">
                <h3 style="margin:0px;">แก้ไขรหัสผ่าน</h3>
                <div style="border:1px solid #ccc; padding:10px;">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">อีเมล์ :</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" readonly value="<?=$result[0]['email']?>">
                        </div>
                    </div>
                    <div class="form-group" >
                        <label class="control-label col-sm-2" for="pwd">รหัสผ่านเดิม :</label>
                        <div class="col-sm-10"> 
                            <input type="password" class="form-control" name="pwdold" id="pwdold" placeholder="กรุณาใส่รหัสผ่านเดิม">
                            <span id="pass1" style="color:red;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">รหัสผ่านใหม่ :</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="pwdnew" id="pwdold" placeholder="กรุณาใส่รหัสผ่านใหม่">
                            <span id="pass2" style="color:red;"></span>
                        </div>
                    </div>
                    <div class="form-group" >
                        <label class="control-label col-sm-2" for="pwd">ยืนยันรหัสผ่านใหม่ :</label>
                        <div class="col-sm-10"> 
                            <input type="password" class="form-control" name="pwdagain" id="pwdold" placeholder="ยืนยันรหัสผ่านใหม่">
                            <span id="pass3" style="color:red;"></span>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:0px;"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <button onclick="editProfile()" type="button" class="btn btn-default">แก้ไข</button>
                        </div>
                    </div>
                </div>
            </form>
            <form class="form-horizontal">
                <h3 style="margin:0px;">แก้ไขข้อมูลส่วนตัว</h3>
                <div style="border:1px solid #ccc; padding:10px;">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">ชื่อ :</label>
                        <div class="col-sm-10"> 
                            <input type="text" class="form-control" name="name" id="name" placeholder="กรุณากรอกชื่อ" value="<?=$result[0]['name']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">นามสกุล :</label>
                        <div class="col-sm-10"> 
                            <input type="text" value="<?=$result[0]['surname']?>" name="surname" class="form-control" id="surname" placeholder="กรุณากรอกนามสกุล">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">ที่อยู่ :</label>
                        <div class="col-sm-10"> 
                            <textarea name="address" id="address" placeholder="กรุณากรอกที่อยู่" class="form-control"><?=$result[0]['address']?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">เบอร์โทร :</label>
                        <div class="col-sm-10"> 
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="กรุณากรอกเบอร์โทร" value="<?=$result[0]['phone']?>">
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom:0px;"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" onclick="editInfo()" class="btn btn-default">แก้ไข</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    td{
        padding:3px 0px;
    }
</style>
<script>
    function editProfile(){
        var pwd = '<?=$result[0]['password']?>';
        var pwdold = $("[name=pwdold]").val();
        var pwdnew = $("[name=pwdnew]").val();
        var pwdagain = $("[name=pwdagain]").val();
        var check = 0;
        $("[name=pwdagain],[name=pwdold],[name=pwdnew]").css("border-color","#ccc");
        $("#pass1,#pass2,#pass3").html("");
        if(pwdold == ""){
            $("[name=pwdold]").css("border-color","red");
            $("#pass1").html("*กรุณากรอกช่องรหัสผ่านเดิม");
            check++;
        }
        if(pwdnew == ""){
            $("[name=pwdnew]").css("border-color","red");
            $("#pass2").html("*กรุณากรอกช่องรหัสผ่านใหม่");
            check++;
        }
        if(pwdagain == ""){
            $("[name=pwdagain]").css("border-color","red");
            $("#pass3").html("*กรุณากรอกช่องยืนยันรหัสผ่านใหม่");
            check++;
        }
        if(pwdnew !== pwdagain){
            $("[name=pwdagain],[name=pwdnew]").css("border-color","red");
            $("#pass3").html("*ยืนยันรหัสผ่านใหม่ไม่ตรงกัน");
            check++;
        }
        if(check>0){
            return false;
        }
        $.ajax({
            url:"php/editProfile.php",
            data:{
                pwdold:pwdold,
                pwdnew:pwdnew,
                pwd:pwd
            },
            type:"post",
            success:function(res){
                if(res == "F"){
                    $("[name=pwdold]").css("border-color","red");
                    $("#pass1").html("*รหัสผ่านเก่าไม่ถูกต้อง");
                    return false;
                }
                if(res == "S"){
                    $("[name=pwdnew],[name=pwdold]").css("border-color","red");
                    $("#pass2").html("*รหัสเก่าและรหัสใหม่เหมือนกัน");
                    return false;
                }
                alert("เปลี่ยนรหัสผ่านแล้วเรียบร้อย");
                window.location.href = window.location.href;
            }
        });
    }
    
    function editInfo(){
        var name = $("#name").val();
        var surname = $("#surname").val();
        var address = $("#address").val();
        var phone = $("#phone").val();
        var msg = "";
        var defect = 0;
        if(name == ""){
            msg += "- กรุณากรอกชื่อ\n";
            defect++;
        }
        if(surname == ""){
            msg += "- กรุณากรอกนามสกุล\n";
            defect++;
        }
        if(address == ""){
            msg += "- กรุณากรอกที่อยู่\n";
            defect++;
        }
        if(phone == ""){
            msg += "- กรุณากรอกเบอร์โทร\n";
            defect++;
        }else if(phone.length<10){
            msg += "- กรุณากรอกเบอร์โทรให้ถูกต้อง\n";
            defect++;
        }
        if(defect>0) return false;
        $.ajax({
            url:"php/editProfile.php",
            data:{
                myself:1,
                name:name,
                surname:surname,
                address:address,
                phone:phone
            },
            type:"post",
            success:function(){
                alert("แก้ไขข้อมูลแล้วเรียบร้อย");
                window.location.href = window.location.href;
            }
        });
    }
</script>