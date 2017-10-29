<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                จัดการรายการสั่งซื้อของลูกค้า           
            </div>
        </div>
        <div class="report-manage-product">
             <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="text-align:center; width:5%;">ลำดับ</th>
                        <th style="text-align:center; width:10%;">รหัสการสั่งซื้อ</th>
                        <th style="text-align:center; width:25%;">ชื่อลูกค้า</th>
                        <th style="text-align:center; width:15%;">ราคาทั้งหมด(บาท)</th>
                        <th style="text-align:center; width:12%;">วัน/เวลาที่สั่งซื้อ</th>
                        <th style="text-align:center; width:18%;">สถานะ</th>
                        <th style="text-align:center; width:15%;">รายละเอียด</th>
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
            url:"ajax/getOrderMember.php",
            type:"post",
            success:function(res){
                $("#order-product").html(res);
            }
        });
    }
    function checkRemark(id,remark){
        $("#remark-order .modal-body").html("รายละเอียด : "+remark);
        $("#remark-order").modal();
    }
</script>