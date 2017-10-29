var domainName = document.domain;
var prefect;

function check_mail(email,send){
    $("#get-signup [name=email]").css("border-bottom","1px solid #ccc")
    $("#get-signup .email-signup").hide()
    var check
    if(email.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
        $.ajax({
            url:"/ajax/checkMail.php",
            type:"post",
            data:{
                email:email
            },
            async:false,
            success:function(e){
                if(e==false){
                    check = false
                    $("#get-signup [name=email]").css("border-bottom","1px solid rgb(255,47,52)")
                    $("#get-signup .email-prefect").html("*อีเมล์นี้มีผู้ใช้งานแล้ว")
                    $("#get-signup .email-signup").show()
                }else if(e==true){
                    check = true
                    $("#get-signup [name=email]").css("border-bottom","1px solid #ccc")
                    $("#get-signup .email-signup").hide()
                }
            }
        })
    }
    if(send != "" || send != null) return check;
}

function get_signup(){
    var data = $("#get-signup").serializeArray(),
        pass = '',
        defect = 0
    data = JSON.parse(JSON.stringify(data))
    $.each(data,function(i,field){
        if(field.name == "email"){
            if(field.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
                if(check_mail(field.value,"send") == false){ 
                    defect++
                }else{
                    $("#get-signup [name="+field.name+"]").css("border-bottom","1px solid #ccc")
                    $("#get-signup .email-signup").hide()
                }
            }else{
                defect++
                $("#get-signup [name="+field.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                $("#get-signup .email-prefect").html("*กรุณากรอกอีเมล์ให้ถูกต้อง")
                $("#get-signup .email-signup").show()
            }
        }
        if(field.name == "pass"){
            if(field.value == "" || (field.value.length<6 || field.value.length>20)){
                defect++
                if(field.value == "") prefect = "*กรุณากรอกรหัสผ่าน"
                else if(field.value.length<6 || field.value.length>20) prefect = "*รหัสผ่านควรมีความยาวอย่างน้อย 6-20 อักขระ"
                $("#get-signup [name="+field.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                $("#get-signup .pass-prefect").html(prefect)
                $("#get-signup .pass-signup").show()
            }else{
                pass = field.value
                $("#get-signup .pass-signup").hide()
            }
        }
        if(field.name == "re-pass"){
            if(field.value != pass || field.value == ""){
                defect++
                $("#get-signup [name="+field.name+"] , #get-signup [name=pass]").css("border-bottom","1px solid rgb(255,47,52)");

                if(field.value != pass) prefect = "*รหัสผ่านไม่ตรงกัน"
                else if(field.value == "") prefect = "*กรุณากรอกรหัสผ่าน"

                $("#get-signup .repass-prefect").html(prefect)
                $("#get-signup .repass-signup").show()
            }else{
                $("#get-signup [name="+field.name+"] , #get-signup [name=pass]").css("border-bottom","1px solid #ccc");
                $("#get-signup .pass-signup").hide()
                $("#get-signup .repass-signup").hide()
            }
        }
        if(field.name == "name" || field.name == "surname" || field.name == "birthdate" ||
           field.name == "postcode" || field.name == "phone"){
            if(field.value == ""){
                defect++
                $("#get-signup [name="+field.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                if(field.name == "name") prefect = "*กรุณากรอกชื่อ"
                if(field.name == "surname") prefect = "*กรุณากรอกนามสกุล"
                if(field.name == "birthdate") prefect = "*กรุณากรอกวันเกิด"
                if(field.name == "postcode") prefect = "*กรุณากรอกรหัสไปรษณียร์"
                if(field.name == "phone") prefect = "*กรุณากรอกเบอร์โทรศัพท์"
                $("#get-signup ."+field.name+"-prefect").html(prefect)
                $("#get-signup ."+field.name+"-signup").show()
            }else{
                $("#get-signup [name="+field.name+"]").css("border-bottom","1px solid #ccc");
                $("#get-signup ."+field.name+"-signup").hide()
            }
        }
        if(field.name == "code"){
            var mycode = field.value.replace(/-/g,'')
            if(mycode == "" || mycode.length != 13){
                defect++
                if(mycode == "") prefect = "*กรุณากรอกรหัสบัตรประชาชน"
                else if(mycode.length != 13) prefect = "*รหัสบัตรประชาชนไม่ครบ 13 หลัก"
                $("#get-signup [name="+field.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                $("#get-signup ."+field.name+"-prefect").html(prefect)
                $("#get-signup ."+field.name+"-signup").show()
            }else{
                $.ajax({
                    url:"/ajax/checkMyCode.php",
                    type:"post",
                    async:false,
                    data:{
                        mycode:mycode
                    },
                    success:function(e){
                        if(e=="F"){
                            defect++
                            prefect = "*รหัสบัตรประชาชนนี้ไม่ถูกต้อง"
                            $("#get-signup [name="+field.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                            $("#get-signup ."+field.name+"-prefect").html(prefect)
                            $("#get-signup ."+field.name+"-signup").show()
                        }else if(e=="T"){
                            $("#get-signup [name="+field.name+"]").css("border-bottom","1px solid #ccc");
                            $("#get-signup ."+field.name+"-signup").hide()
                        }else if(e=="S"){
                            defect++
                            prefect = "*รหัสบัตรประชาชนนี้มีผู้ใช้งานแล้ว"
                            $("#get-signup [name="+field.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                            $("#get-signup ."+field.name+"-prefect").html(prefect)
                            $("#get-signup ."+field.name+"-signup").show()
                        }
                    }
                })
            }
        }
        if(field.name == "province" || field.name == "district" || field.name == "amphur" || 
           field.name == "address"){
            if(field.value == ""){
                defect++
                if(field.name == "province") prefect = "*กรุณากรอกจังหวัด"
                if(field.name == "district") prefect = "*กรุณากรอกอำเภอ"
                if(field.name == "amphur")   prefect = "*กรุณากรอกตำบล"
                if(field.name == "address")  prefect = "*กรุณากรอกที่อยู่"
                $("#get-signup [name="+field.name+"]").css("border","1px solid rgb(255,47,52)")
                $("#get-signup ."+field.name+"-prefect").html(prefect)
                $("#get-signup ."+field.name+"-signup").show()
            }else{
                $("#get-signup [name="+field.name+"]").css("border","1px solid #ccc")
                $("#get-signup ."+field.name+"-signup").hide()
            }
        }
    })
    if(defect>0) return false
    HTMLFormElement.prototype.submit.call(document.getElementById("get-signup"))
}

function get_login(){
    $(".warning-login").hide()
    var data = $("#get-signin").serializeArray()
    data = JSON.parse(JSON.stringify(data))
    var defect = 0
    var warning = ""
    $.each(data,function(i,field){
        if(field.value == ""){
            defect++
            if(field.name == "email") warning = "*กรุณาใส่อีเมล์"
            if(field.name == "pass")  warning = "*กรุณาใส่รหัสผ่าน"
            $("#get-signin [name="+field.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
            $("#get-signin ."+field.name+"-prefect").html(warning)
            $("#get-signin ."+field.name+"-signin").show()
        }else{
            if(field.name === "email" && field.value === "admin"){
                $("#get-signin [name="+field.name+"]").css("border-bottom","1px solid #ccc")
                $("#get-signin ."+field.name+"-signin").hide()
            }else if(field.name == "email" && !field.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
                defect++
                warning = "*อีเมล์ไม่ถูกต้อง"
                $("#get-signin [name="+field.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                $("#get-signin ."+field.name+"-prefect").html(warning)
                $("#get-signin ."+field.name+"-signin").show()
            }else{
                $("#get-signin [name="+field.name+"]").css("border-bottom","1px solid #ccc")
                $("#get-signin ."+field.name+"-signin").hide()
            }
        }
    })
    if(defect>0) return false
    var email = $("#get-signin [name=email]").val(),
        pass = $("#get-signin [name=pass]").val()
    $.ajax({
        url:"/php/member_login.php",
        type:"post",
        data:{
            email: email,
            pass: calcMD5(pass)
        },
        success:function(e){
            if(e==false){
                $(".warning-login").show()
                return false
            }
            if(e=="MEMBER"){
                sessionStorage.setItem("loginSuccess",1)
            }
            if(e=="ADMIN"){
                sessionStorage.setItem("loginSuccess",2)
            }
            window.location.href = "index.php"
        }
    })
}