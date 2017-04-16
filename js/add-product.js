function addProductBrand(){
    let defect = 0;
    let msg_defect;
    let data = JSON.stringify($("#get-brand").serializeArray());
    $.each(JSON.parse(data),function(i,_name){
        if(_name.name == "brandname"){
            if(_name.value == "" || _name.value.length == 0){
                defect++;
                msg_defect = "กรุณากรอกชื่อแบรนด์";
                $("#get-brand [name="+_name.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                $("#get-brand .brand-name-msg").html(msg_defect)
                $("#get-brand .brand-name-prefect").show()
            }else{
                $("#get-brand [name="+_name.name+"]").css("border-bottom","1px solid #ccc")
                $("#get-brand .brand-name-prefect").hide()
            }
        }
        if(_name.name == "brandcompany"){
            if(_name.value == "" || _name.value.length == 0){
                defect++;
                msg_defect = "กรุณากรอกชื่อบริษัท";
                $("#get-brand [name="+_name.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                $("#get-brand .brand-company-msg").html(msg_defect)
                $("#get-brand .brand-company-prefect").show()
            }else{
                $("#get-brand [name="+_name.name+"]").css("border-bottom","1px solid #ccc")
                $("#get-brand .brand-company-prefect").hide()
            }
        }
        if(_name.name == "brandaddress"){
            if(_name.value == "" || _name.value.length == 0){
                defect++;
                msg_defect = "กรุณากรอกที่อยู่บริษัท";
                $("#get-brand [name="+_name.name+"]").css("border","1px solid rgb(255,47,52)")
                $("#get-brand .brand-address-msg").html(msg_defect)
                $("#get-brand .brand-address-prefect").show()
            }else{
                $("#get-brand [name="+_name.name+"]").css("border","1px solid #ccc")
                $("#get-brand .brand-address-prefect").hide()
            }
        }
        if(_name.name == "brandcontact"){
            if(_name.value == "" || _name.value.length == 0){
                defect++;
                msg_defect = "กรุณากรอกเบอร์โทรติดต่อ";
                $("#get-brand [name="+_name.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                $("#get-brand .brand-contact-msg").html(msg_defect)
                $("#get-brand .brand-contact-prefect").show()
            }else{
                $("#get-brand [name="+_name.name+"]").css("border-bottom","1px solid #ccc")
                $("#get-brand .brand-contact-prefect").hide()
            }
        }
    });
    if(defect>0) return false;
    $.ajax({
        url:"../work/ajax/save_add_product.php",
        type:"post",
        async:false,
        data:$("#get-brand").serialize()+"&addBrand=1",
        success:function(obj){
            obj = JSON.parse(obj);
            swal({
              title: obj.msg,
              type: (obj.status == true ? "success":"error"),
              confirmButtonColor: (obj.status == true ? "#21b443":"red"),
              confirmButtonText: "ตกลง",
            },
            function(){
                if(obj.status == true){
                    $("#get-brand [name=brandname]").css("border-bottom","1px solid #ccc")
                    $("#get-brand .brand-name-prefect").hide()
                    $('#add-brand').modal('hide');
                    $('#get-brand')[0].reset();
                    selectManageDetail(1);
                }else{
                    $("#get-brand [name=brandname]").css("border-bottom","1px solid rgb(255,47,52)")
                    $("#get-brand .brand-name-msg").html("มีชื่อยี่ห้อนี้ในระบบ")
                    $("#get-brand .brand-name-prefect").show()
                }
            });
        }
    });
}

function editProductBrand(){
    let defect = 0;
    let msg_defect;
    let data = JSON.stringify($("#edit-brand-product").serializeArray());
    $.each(JSON.parse(data),function(i,_name){
        if(_name.name == "brandname"){
            if(_name.value == "" || _name.value.length == 0){
                defect++;
                msg_defect = "กรุณากรอกชื่อแบรนด์";
                $("#edit-brand-product [name="+_name.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                $("#edit-brand-product .brand-name-msg").html(msg_defect)
                $("#edit-brand-product .brand-name-prefect").show()
            }else{
                $("#edit-brand-product [name="+_name.name+"]").css("border-bottom","1px solid #ccc")
                $("#edit-brand-product .brand-name-prefect").hide()
            }
        }
        if(_name.name == "brandcompany"){
            if(_name.value == "" || _name.value.length == 0){
                defect++;
                msg_defect = "กรุณากรอกชื่อบริษัท";
                $("#edit-brand-product [name="+_name.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                $("#edit-brand-product .brand-company-msg").html(msg_defect)
                $("#edit-brand-product .brand-company-prefect").show()
            }else{
                $("#edit-brand-product [name="+_name.name+"]").css("border-bottom","1px solid #ccc")
                $("#edit-brand-product .brand-company-prefect").hide()
            }
        }
        if(_name.name == "brandaddress"){
            if(_name.value == "" || _name.value.length == 0){
                defect++;
                msg_defect = "กรุณากรอกที่อยู่บริษัท";
                $("#edit-brand-product [name="+_name.name+"]").css("border","1px solid rgb(255,47,52)")
                $("#edit-brand-product .brand-address-msg").html(msg_defect)
                $("#edit-brand-product .brand-address-prefect").show()
            }else{
                $("#edit-brand-product [name="+_name.name+"]").css("border","1px solid #ccc")
                $("#edit-brand-product .brand-address-prefect").hide()
            }
        }
        if(_name.name == "brandcontact"){
            if(_name.value == "" || _name.value.length == 0){
                defect++;
                msg_defect = "กรุณากรอกเบอร์โทรติดต่อ";
                $("#edit-brand-product [name="+_name.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                $("#edit-brand-product .brand-contact-msg").html(msg_defect)
                $("#edit-brand-product .brand-contact-prefect").show()
            }else{
                $("#edit-brand-product [name="+_name.name+"]").css("border-bottom","1px solid #ccc")
                $("#edit-brand-product .brand-contact-prefect").hide()
            }
        }
    });
    if(defect>0) return false;
    let brand = JSON.parse(sessionStorage.getItem("brand"));
    $.ajax({
        url:"../work/ajax/save_add_product.php",
        type:"post",
        "async":false,
        data:$("#edit-brand-product").serialize()+"&editBrand=1&brandid="+brand[0].value+"&brandoldname="+brand[1].value+"&brandoldcompany="+brand[2].value+"&brandoldaddress="+brand[3].value+"&brandoldcontact="+brand[4].value,
        success:function(obj){
            obj = JSON.parse(obj);
            swal({
              title: obj.msg,
              type: (obj.status == true ? "success":"error"),
              confirmButtonColor: (obj.status == true ? "#21b443":"red"),
              confirmButtonText: "ตกลง",
            },
            function(){
                if(obj.status == true){
                    $("#edit-brand-product [name=brandname]").css("border-bottom","1px solid #ccc")
                    $("#edit-brand-product .brand-name-prefect").hide()
                    $('#edit-brand').modal('hide');
                    $('#edit-brand-product')[0].reset();
                    selectManageDetail(1);
                }else{
                    $("#edit-brand-product [name=brandname]").css("border-bottom","1px solid rgb(255,47,52)")
                    $("#edit-brand-product .brand-name-msg").html("มีชื่อยี่ห้อนี้ในระบบ")
                    $("#edit-brand-product .brand-name-prefect").show()
                }
            });
        }
    });
}

function addProductType(){
    let defect = 0;
    let msg_defect;
    let data = JSON.stringify($("#add-type").serializeArray());
    $.each(JSON.parse(data),function(i,_name){
        if(_name.name == "typename"){
            if(_name.value == "" || _name.value.length == 0){
                defect++;
                msg_defect = "กรุณากรอกชื่อประเภทสินค้า";
                $("#add-type [name="+_name.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                $("#add-type .type-name-msg").html(msg_defect)
                $("#add-type .type-name-defect").show()
            }else{
                $("#add-type [name="+_name.name+"]").css("border-bottom","1px solid #ccc")
                $("#add-type .type-name-defect").hide()
            }
        }
    });
    if(defect>0) return false;
    $.ajax({
        url:"../work/ajax/save_add_product.php",
        type:"post",
        async:false,
        data:$("#add-type").serialize()+"&addType=1",
        success:function(obj){
            obj = JSON.parse(obj);
            swal({
              title: obj.msg,
              type: (obj.status == true ? "success":"error"),
              confirmButtonColor: (obj.status == true ? "#21b443":"red"),
              confirmButtonText: "ตกลง",
            },
            function(){
                if(obj.status == true){
                    $("#add-type [name=typename]").css("border-bottom","1px solid #ccc")
                    $("#add-type .type-name-defect").hide()
                    $('#add-type-product').modal('hide');
                    $('#add-type')[0].reset();
                    selectManageDetail(2);
                }else{
                    $("#add-type [name=typename]").css("border-bottom","1px solid rgb(255,47,52)")
                    $("#add-type .type-name-msg").html("มีชื่อประเภทนี้ในระบบ")
                    $("#add-type .type-name-defect").show()
                }
            });
        }
    });
}

function editProductType(){
    let defect = 0;
    let msg_defect;
    let data = JSON.stringify($("#edit-type").serializeArray());
    $.each(JSON.parse(data),function(i,_name){
        if(_name.name == "typename"){
            if(_name.value == "" || _name.value.length == 0){
                defect++;
                msg_defect = "กรุณากรอกชื่อประเภทสินค้า";
                $("#edit-type [name="+_name.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                $("#edit-type .type-name-msg").html(msg_defect)
                $("#edit-type .type-name-defect").show()
            }else{
                $("#edit-type [name="+_name.name+"]").css("border-bottom","1px solid #ccc")
                $("#edit-type .type-name-defect").hide()
            }
        }
    });
    if(defect>0) return false;
    let type = JSON.parse(sessionStorage.getItem("type"));
    $.ajax({
        url:"../work/ajax/save_add_product.php",
        type:"post",
        async:false,
        data:$("#edit-type").serialize()+"&editType=1&typeid="+type[0].value+"&typeoldname="+type[1].value,
        success:function(obj){
            obj = JSON.parse(obj);
            swal({
              title: obj.msg,
              type: (obj.status == true ? "success":"error"),
              confirmButtonColor: (obj.status == true ? "#21b443":"red"),
              confirmButtonText: "ตกลง",
            },
            function(){
                if(obj.status == true){
                    $("#edit-type [name=typename]").css("border-bottom","1px solid #ccc")
                    $("#edit-type .type-name-defect").hide()
                    $('#edit-type-product').modal('hide');
                    $('#edit-type')[0].reset();
                    selectManageDetail(2);
                }else{
                    $("#edit-type [name=typename]").css("border-bottom","1px solid rgb(255,47,52)")
                    $("#edit-type .type-name-msg").html("มีชื่อประเภทนี้ในระบบ")
                    $("#edit-type .type-name-defect").show()
                }
            });
        }
    });
}

function addProduct(){
    let defect = 0;
    let msg_defect;
    let data = JSON.stringify($("#add-product").serializeArray());
    $.each(JSON.parse(data),function(i,_name){
        if(_name.name == "productname" || _name.name == "amount" || _name.name == "price"){
            if(_name.value == "" || _name.value.length == 0 || _name.value <= 0){
                defect++;
                if(_name.name == "productname") msg_defect = "กรุณากรอกชื่อสินค้า";
                else if(_name.name == "amount") msg_defect = "กรุณากรอกจำนวนสินค้า";
                else if(_name.name == "price") msg_defect = "กรุณากรอกราคาสินค้า";
                $("#add-product [name="+_name.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                $("#add-product ."+_name.name+"-msg").html(msg_defect)
                $("#add-product ."+_name.name+"-prefect").show()
            }else{
                $("#add-product [name="+_name.name+"]").css("border-bottom","1px solid #ccc")
                $("#add-product ."+_name.name+"-prefect").hide()
            }
        }
        if(_name.name == "brandid" || _name.name == "detail"){
            if(_name.value == "" || _name.value.length == 0){
                defect++;
                if(_name.name == "brandid") msg_defect = "กรุณาเลือกยี่ห้อสินค้า";
                else if(_name.name == "detail") msg_defect = "กรุณากรอกรายละเอียดสินค้า";
                $("#add-product [name="+_name.name+"]").css("border","1px solid rgb(255,47,52)")
                $("#add-product ."+_name.name+"-msg").html(msg_defect)
                $("#add-product ."+_name.name+"-prefect").show()
            }else{
                $("#add-product [name="+_name.name+"]").css("border","1px solid #ccc")
                $("#add-product ."+_name.name+"-prefect").hide()
            }
        }
        if(_name.name == "productpic1"){
            alert(1)
            if(_name.value == "" || _name.value.length == 0){
                defect++;
                msg_defect = "กรุณาเลือกภาพแสดงหลัก";
                $("#add-product [name="+_name.name+"]").css("border","1px solid rgb(255,47,52)")
                $("#add-product ."+_name.name+"-msg").html(msg_defect)
                $("#add-product ."+_name.name+"-prefect").show()    
            }else{
                $("#add-product [name="+_name.name+"]").css("border","1px solid #ccc")
                $("#add-product ."+_name.name+"-prefect").hide()
            }
        }
    });
    
    if($("#add-product .typeid:checked").length == 0){
        defect++;
        msg_defect = "กรุณาเลือกประเภทสินค้าอย่างน้อย 1 ประเภท";
        $("#add-product #all-tag-type").css("border","1px solid rgb(255,47,52)");
        $("#add-product .typeid-msg").html(msg_defect)
        $("#add-product .typeid-prefect").show()   
    }else{
        $("#add-product #all-tag-type").css("border","1px solid #ccc")
        $("#add-product .typeid-prefect").hide()
    }
    
    if($("#add-product [name=productpic1]").val()==""){
        defect++;
        msg_defect = "กรุณาเลือกรูปภาพสินค้าอย่างน้อย 1 รูป";
        $("#add-product [name=productpic1]").css("border","1px solid rgb(255,47,52)");
        $("#add-product .productpic1-msg").html(msg_defect)
        $("#add-product .productpic1-prefect").show()   
    }else{
        $("#add-product [name=productpic1]").css("border","1px solid #ccc")
        $("#add-product .productpic1-prefect").hide()
    }
    if(defect>0) return false;
    let typeid = '';
    $("#add-product .typeid:checked").each(function(){
        typeid+=$(this).val()+',';
    });
    typeid = typeid.substr(0,typeid.length-1);
    var formData = new FormData($("#add-product")[0]);
    formData.append('addProduct',1);
    formData.append('typeid',typeid);
    $.ajax({
        url:"../work/ajax/save_add_product.php",
        type:"post",
        "async":false,
        data:formData,
        contentType:false,
        processData:false,
        success:function(obj){
            obj = JSON.parse(obj);
            swal({
              title: obj.msg,
              type: (obj.status == true ? "success":"error"),
              confirmButtonColor: (obj.status == true ? "#21b443":"red"),
              confirmButtonText: "ตกลง",
            },
            function(){
                if(obj.status == true){
                    $("#add-product [name=productname]").css("border-bottom","1px solid #ccc")
                    $("#add-product .productname-defect, #type-tag").hide()
                    $('#add-product-modal').modal('hide');
                    $('#add-product')[0].reset();
                    getAllProduct();
                }else{
                    $("#add-product [name=productname]").css("border-bottom","1px solid rgb(255,47,52)")
                    $("#add-product .productname-msg").html("มีชื่อประเภทนี้ในระบบ")
                    $("#add-product .productname-prefect").show()
                }
            });
        }
    });
}

function updateProduct(){
    let defect = 0;
    let msg_defect;
    let data = JSON.stringify($("#edit-product").serializeArray());
    $.each(JSON.parse(data),function(i,_name){
        if(_name.name == "productname" || _name.name == "amount" || _name.name == "price"){
            if(_name.value == "" || _name.value.length == 0 || _name.value <= 0){
                defect++;
                if(_name.name == "productname") msg_defect = "กรุณากรอกชื่อสินค้า";
                else if(_name.name == "amount") msg_defect = "กรุณากรอกจำนวนสินค้า";
                else if(_name.name == "price") msg_defect = "กรุณากรอกราคาสินค้า";
                $("#edit-product [name="+_name.name+"]").css("border-bottom","1px solid rgb(255,47,52)")
                $("#edit-product ."+_name.name+"-msg").html(msg_defect)
                $("#edit-product ."+_name.name+"-prefect").show()
            }else{
                $("#edit-product [name="+_name.name+"]").css("border-bottom","1px solid #ccc")
                $("#edit-product ."+_name.name+"-prefect").hide()
            }
        }
        if(_name.name == "brandid" || _name.name == "detail"){
            if(_name.value == "" || _name.value.length == 0){
                defect++;
                if(_name.name == "brandid") msg_defect = "กรุณาเลือกยี่ห้อสินค้า";
                else if(_name.name == "detail") msg_defect = "กรุณากรอกรายละเอียดสินค้า";
                $("#edit-product [name="+_name.name+"]").css("border","1px solid rgb(255,47,52)")
                $("#edit-product ."+_name.name+"-msg").html(msg_defect)
                $("#edit-product ."+_name.name+"-prefect").show()
            }else{
                $("#edit-product [name="+_name.name+"]").css("border","1px solid #ccc")
                $("#edit-product ."+_name.name+"-prefect").hide()
            }
        }
        if(_name.name == "productpic1"){
            alert(1)
            if(_name.value == "" || _name.value.length == 0){
                defect++;
                msg_defect = "กรุณาเลือกภาพแสดงหลัก";
                $("#edit-product [name="+_name.name+"]").css("border","1px solid rgb(255,47,52)")
                $("#edit-product ."+_name.name+"-msg").html(msg_defect)
                $("#edit-product ."+_name.name+"-prefect").show()    
            }else{
                $("#edit-product [name="+_name.name+"]").css("border","1px solid #ccc")
                $("#edit-product ."+_name.name+"-prefect").hide()
            }
        }
    });
    
    if($("#edit-product .typeid:checked").length == 0){
        defect++;
        msg_defect = "กรุณาเลือกประเภทสินค้าอย่างน้อย 1 ประเภท";
        $("#edit-product #all-tag-type").css("border","1px solid rgb(255,47,52)");
        $("#edit-product .typeid-msg").html(msg_defect)
        $("#edit-product .typeid-prefect").show()   
    }else{
        $("#edit-product #all-tag-type").css("border","1px solid #ccc")
        $("#edit-product .typeid-prefect").hide()
    }
    
    if($("#edit-product [name=productpic1]").attr("disabled") != "disabled"){
        if($("#edit-product [name=productpic1]").val()==""){
            defect++;
            msg_defect = "กรุณาเลือกรูปภาพสินค้าอย่างน้อย 1 รูป";
            $("#edit-product [name=productpic1]").css("border","1px solid rgb(255,47,52)");
            $("#edit-product .productpic1-msg").html(msg_defect)
            $("#edit-product .productpic1-prefect").show()   
        }else{
            $("#edit-product [name=productpic1]").css("border","1px solid #ccc")
            $("#edit-product .productpic1-prefect").hide()
        }
    }
    if(defect>0) return false;
    let typeid = '';
    $("#edit-product .typeid:checked").each(function(){
        typeid+=$(this).val()+',';
    });
    typeid = typeid.substr(0,typeid.length-1);
    var formData = new FormData($("#edit-product")[0]);
    formData.append('editProduct',1);
    formData.append('typeid',typeid);
    $.ajax({
        url:"../work/ajax/save_add_product.php",
        type:"post",
        "async":false,
        data:formData,
        contentType:false,
        processData:false,
        success:function(obj){
            obj = JSON.parse(obj);
            swal({
              title: obj.msg,
              type: (obj.status == true ? "success":"error"),
              confirmButtonColor: (obj.status == true ? "#21b443":"red"),
              confirmButtonText: "ตกลง",
            },
            function(){
                if(obj.status == true){
                    $("#edit-product [name=productname]").css("border-bottom","1px solid #ccc")
                    $("#edit-product .productname-defect, #type-tag").hide()
                    $('#edit-product-modal').modal('hide');
                    $('#edit-product')[0].reset();
                    getAllProduct();
                }else{
                    $("#edit-product [name=productname]").css("border-bottom","1px solid rgb(255,47,52)")
                    $("#edit-product .productname-msg").html("มีชื่อสินค้านี้ในระบบ")
                    $("#edit-product .productname-prefect").show()
                }
            });
        }
    });
}