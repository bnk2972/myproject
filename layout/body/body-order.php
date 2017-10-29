<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                รายการสั่งซื้อของฉัน
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
                        <th style="text-align:center; width:15%;">รหัสการสั่งซื้อ</th>
                        <th style="text-align:center; width:20%;">วัน/เวลาที่สั่งซื้อ</th>
                        <th style="text-align:center; width:15%;">ราคาทั้งหมด(บาท)</th>
                        <th style="text-align:center; width:10%;">รายละเอียด</th>
                        <th style="text-align:center; width:20%;">สถานะ</th>
                        <th style="text-align:center; width:10%;">ยกเลิก</th>
                    </tr>
                </thead>
                <tbody id="order-product">
                    
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    getMyOrder();
    function getMyOrder(){
        $.ajax({
            url:"ajax/getMyOrder.php",
            type:"post",
            success:function(res){
                $("#order-product").html(res);
            }
        });
    }
    function againOrder(id){
        $.ajax({
            url:"ajax/againOrder.php",
            type:"post",
            data:{
                id:id
            },
            success:function(){
                getMyOrder();
            }
        });
    }
    function cancelOrder(id){
        swal({
          title: "คุณแน่ใจหรือ?",
          text: "คุณต้องการยกเลิกรายการสั่งซื้อรหัส "+id,
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ยืนยัน",
          cancelButtonText: "ยกเลิก",
          closeOnConfirm: false
        },
        function(){
            $.ajax({
                url:"ajax/cancelOrder.php",
                type:"post",
                data:{
                    id:id
                },
                success:function(){
                    swal({
                      title: "ยกเลิกสำเร็จ รอดำเนินการยืนยัน",
                      type: "success",
                      confirmButtonColor: "#21b443",
                      confirmButtonText: "ตกลง",
                    },
                    function(){
                        getMyOrder();
                    });
                }
            });
        }); 
    }
    function delOrder(id){
        $.ajax({
            url:"ajax/delOrder.php",
            type:"post",
            data:{
                orderid:id
            },
            success:function(){
                getMyOrder();
            }
        });
    }
    function checkRemark(id,remark){
        $("#remark-order .modal-body").html("รายละเอียด : "+remark);
        $("#remark-order").modal();
    }
</script>
