<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                จัดการยี่ห้อสินค้า
                <div class="input-group manage-product-s"> 
                    <button class="btn btn-info" data-toggle="modal" data-target="#add-brand" style="margin-right:5px;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มยี่ห้อ</button>
                </div>
            </div>
        </div>
        <div class="report-manage-product">
            
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="5%">ลำดับ</th>
                    <th width="20%">ยี่ห้อ</th>
                    <th width="20%">บริษัท</th>
                    <th width="25%">ที่อยู่</th>
                    <th width="10%">เบอร์โทร</th>
                    <th width="20%">แก้ไขข้อมูล</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql_brand = "SELECT * FROM product_brand ORDER BY brandID ASC";
                $result_brand = $db->MySQL($sql_brand);
                if(sizeof($result_brand)>0){
                    $n = 1;
                    foreach($result_brand as $brand){
            ?>
            <tr>
                <td><?=$n?></td>
                <td><?=$brand['brandNAME']?></td>
                <td><?=$brand['brandCompany']?></td>
                <td><?=$brand['brandAddress']?></td>
                <td><?=$brand['brandContact']?></td>
                <td><button onclick="editBrand(<?=$brand['brandID']?>)" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> แก้ไข</button> <button onclick="delBrand(<?=$brand['brandID']?>,'<?=$brand['brandNAME']?>')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button></td>
            </tr>
      
            <?php
                        $n++;
                    }
                }else{
                    ?>
                    <tr>
                        <td colspan="6">ไม่มียี่ห้อสินค้า</td>
                    </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>

        </div>
    </div>
</div>
<script type="text/javascript">
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
                            window.location.href = window.location.href;
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
                            window.location.href = window.location.href;
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