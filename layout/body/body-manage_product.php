<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                จัดการสินค้า
                <!-- <div class="input-group manage-product">
                    <input type="text" id="search-product" class="form-control search-product text-box" placeholder="เลือกประเภทการค้นหา" disabled name="search-product">
                    <span class="input-group-btn">
                        <button class="btn btn-default search-product" type="button" disabled><span class="glyphicon glyphicon-search" aria-hidden="true"></span> ค้นหา</button>
                    </span>
                </div>
                <div class="input-group manage-product-s">
                    <select id="type-search" class="form-control" onchange="offOnSearch(this.value)">
                        <option value="">--ประเภทการค้นหา--</option>
                        <option value="1">ค้นหาจากชื่อสินค้า</option>
                        <option value="2">ค้นหาจากรหัสสินค้า</option>
                        <option value="3">ค้นหาจากยี่ห้อ</option>
                    </select>
                </div> -->
                <div class="input-group manage-product-s"> 
                    <button data-toggle="modal" data-target="#add-product-modal"  class="btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มสินค้า</button>
                </div>
                
            </div>
            
        </div>
        <div class="report-manage-product">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ยี่ห้อสินค้า</th>
                        <th>ประเภทสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคา</th>
                        <th>สถานะ</th>
                        <th>แก้ไขข้อมูล</th>
                    </tr>
                </thead>
                <tbody id="all-product">
                 
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    getAllProduct();
    function getAllProduct(){
        let searchname = $("#search-product").val();
        let type = $("#type-search").val();
        $.ajax({
            url:"ajax/getAllProduct.php",
            type:"post",
            data:{
                all : 1,
                search : searchname ? searchname : null,
                type : type ? type : null
            },
            success:function(res){
                $("#all-product").html(res);
            }
        });
    }
    
    function checkTagType(typetags,productname){
        let html = "";
        let margin = "";
        typetags = typetags.split(",");
        $.each(typetags,function(i,typename){
            margin = "margin-bottom:3px;";
            if((i+1) == typetags.length) margin = "";
            html += "<div style='padding:3px 5px; "+margin+" border-radius:5px; border:1px solid #ccc;'><span class='glyphicon glyphicon-tag'></span> "+typename+"</div> ";
        });
        $("#show-type #printername").html(productname);
        $("#show-type .modal-body").html(html);
        $("#show-type").modal();
    }
    
    function editProduct(id){
        $.ajax({
            url:"ajax/getDetailProduct.php",
            data:{
                productid:id
            },
            type:"post",
            success:function(obj){
                let typename="";
                obj = JSON.parse(obj.replace(/\t/g, '\\t'));
                sessionStorage.setItem("product",obj);
                $.each(obj,function(i,data){
                    if(data.id == "image"){
                        $("#edit-product [name=productpic1]").css("border","1px solid #ccc")
                        $("#edit-product .productpic1-prefect").hide()
                        $("#edit-product [name^=productpic]").attr("disabled",false).show();
                        $(".productpic1, .productpic2, .productpic3, .productpic4, .productpic5").hide(); 
                        $.each(data.value,function(i,data){
                            $("#imgid"+data.imgshow).val(data.imgid);
                            $("#imgname"+data.imgshow).val(data.imgname);
                            $("#imgshow"+data.imgshow).val(data.imgshow);
                            $("#edit-product [name=productpic"+data.imgshow+"]").attr("disabled",true).hide();
                            $(".productpic"+data.imgshow+" a").attr("href","img/img_product/"+data.imgname);
                            $(".productpic"+data.imgshow+" a img").attr("src","img/img_product/"+data.imgname);
                            $(".productpic"+data.imgshow).show(); 
                        });
                    }else{
                        $("#edit-product [name="+data.name+"]").css("border","1px solid #ccc");
                        $("#edit-product ."+data.name+"-prefect").hide();
                        $("#edit-product [name="+data.id+"]").val(data.value);
                    } 
                });
                $("#edit-product-modal").modal();
            }
        });
    }
    
    function cancelOleImage(id){
        $(".productpic"+id).hide(); 
        $("#edit-product [name=productpic"+id+"]").attr("disabled",false).show();
    }
    
    function delProduct(id,name){
        swal({
          title: "คุณแน่ใจหรือ?",
          text: "คุณกำลังจะลบสินค้า "+name+" ในระบบ",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ลบ",
          cancelButtonText: "ยกเลิก",
          closeOnConfirm: false
        },
        function(){
            $.ajax({
                url:"/ajax/del_product.php",
                data:{productID:id, delProduct:1},
                type:"post",
                'async':false,
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
                            getAllProduct();
                        }
                    });
                }
            });
        });
    }
    
    function offOnSearch(status){
        if(status==1){
            $(".search-product").removeAttr("disabled");
            $(".form-control.search-product.text-box").attr("placeholder","กรอกชื่อสินค้า");
        }else if(status==2){
            $(".search-product").removeAttr("disabled");
            $(".form-control.search-product.text-box").attr("placeholder","กรอกรหัสสินค้า");
        }else if(status==3){
            $(".search-product").removeAttr("disabled");
            $(".form-control.search-product.text-box").attr("placeholder","กรอกยี่ห้อสินค้า");
        }else{
            $(".search-product").attr("disabled",true);
            $(".form-control.search-product.text-box").attr("placeholder","เลือกประเภทการค้นหา");
        }
    }
</script>
<style>
    td,th{
        text-align: center;
    }
</style>