<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                รายการสินค้าที่ชื่นชอบของฉัน
                <div style="float:right; vertical-align: text-bottom; margin-top:23px; margin-right:10px;">
                    <span style="color:red; font-size:10px; display:none;" id="msg-cart">***กรุณาเลือกสินค้าลงตระกร้า</span>
                </div>
            </div>
        </div>
        <div class="report-manage-product">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="text-align:center; width:10%;">ลำดับ</th>
                        <th style="text-align:center; width:15%;">ชื่อสินค้า</th>
                        <th style="text-align:center; width:15%;">ราคาสินค้า</th>
                        <th style="text-align:center; width:10%;">ยกเลิก</th>
                    </tr>
                </thead>
                <tbody id="fav-product">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    getFaverite();
    function getFaverite(){
        $.ajax({
            url:"ajax/getFaveriteMe.php",
            type:"post",
            success:function(res){
                $("#fav-product").html(res);
            }
        });
    }
    function delFaverite(id,name){
        swal({
          title: "คุณแน่ใจหรือ?",
          text: "คุณต้องการลบสินค้า "+name+" ออกจากรายการชื่นชอบ",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ยืนยัน",
          cancelButtonText: "ยกเลิก",
          closeOnConfirm: false
        },
        function(){
            
            $.ajax({
                url:"ajax/delFaverite.php",
                type:"post",
                data:{
                    productid:id
                },
                success:function(){
                    swal({
                      title: "ลบสำเร็จ",
                      type: "success",
                      confirmButtonColor: "#21b443",
                      confirmButtonText: "ตกลง",
                    },
                    function(){
                        getFaverite();
                    });
                }
            });
        }); 
    }
</script>
