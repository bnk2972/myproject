<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                จัดการรายละเอียดสินค้า
                <select class="form-control" id="selectManagementStore" style="width:15em; display:inline-block; border-radius:0px; vertical-align:top;" onchange="selectManageDetail(this.value)">
                    <option value="1">--ยี่ห้อสินค้า--</option>
                    <option value="2">--ประเภทสินค้า--</option>
                </select>
            </div>
        </div>
        <div class="report-manage-product">
            
        </div>
    </div>
</div>
<script type="text/javascript">
    selectManageDetail($("#selectManagementStore").val());
    function selectManageDetail(status){
        $.ajax({
            url:"ajax/getManageDetail.php",
            type:"post",
            data:{status:status},
            success:function(result){
                $(".report-manage-product").html(result);
            }
        });
    }
    
    function editBrand(id){
        $("#edit-brand-product")[0].reset();
        sessionStorage.removeItem("brand");
        $.ajax({
            url:"ajax/getDetailBrand.php",
            data:{
                id:id
            },
            type:"post",
            success:function(result){
                sessionStorage.setItem("brand",result);
                $.each(JSON.parse(sessionStorage.getItem("brand")),function(i,data){
                    $("#edit-brand-product [name="+data.id+"]").val(data.value);
                });
                $("#edit-brand").modal("show");
            }
        });
    }
    
    function editType(id){
        $("#edit-type")[0].reset();
        sessionStorage.removeItem("type");
        $.ajax({
            url:"ajax/getDetailType.php",
            data:{
                id:id
            },
            type:"post",
            success:function(result){
                sessionStorage.setItem("type",result);
                $.each(JSON.parse(sessionStorage.getItem("type")),function(i,data){
                    $("#edit-type [name="+data.id+"]").val(data.value);
                });
                $("#edit-type-product").modal("show");
            }
        });
    }
    
    function delBrand(id,name){
        swal({
          title: "คุณแน่ใจหรือ?",
          text: "คุณกำลังจะลบยี่ห้อ "+name+" ในระบบ",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ลบ",
          cancelButtonText: "ยกเลิก",
          closeOnConfirm: false
        },
        function(){
            $.ajax({
                url:"../work/ajax/del_product.php",
                data:{brandID:id, delBrand:1},
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
                            selectManageDetail(1);
                        }
                    });
                }
            });
        });
    }
    
    function delType(id,name){
         swal({
          title: "คุณแน่ใจหรือ?",
          text: "คุณกำลังจะลบประเภท "+name+" ในระบบ",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ลบ",
          cancelButtonText: "ยกเลิก",
          closeOnConfirm: false
        },
        function(){
            $.ajax({
                url:"../work/ajax/del_product.php",
                data:{typeID:id, delType:1},
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
                            selectManageDetail(2);
                        }
                    });
                }
            });
        });
    }
</script>
<style>
    td,th{
        text-align: center;
    }
</style>