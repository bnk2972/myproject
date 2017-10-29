<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                STEP 1 : สินค้าในตระกร้าของฉัน
                <div style="float:right; vertical-align:top;">
                    <button class="btn btn-primary" id="step" onclick="window.location.href='mycart-step2.php?step=2'">ต่อไป <span class="glyphicon glyphicon-chevron-right"></span></button>
                </div>
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
                        <th style="text-align:center; width:40%;">ชื่อสินค้า</th>
                        <th style="text-align:center; width:10%;">จำนวนสินค้า</th>
                        <th style="text-align:center; width:30%;">ราคาสินค้า/ชิ้น(บาท)</th>
                        <th style="text-align:center; width:10%;">ลบ</th>
                    </tr>
                </thead>
                <tbody id="cart-product">
                 
                </tbody>
                <tfoot>
                    <tr>
                        <td style="text-align:center" colspan="5">
                            <div>รวมราคาสินค้าทั้งหมด <span id="totalprice"></span> บาท</div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<style>
    a.btn.btn-primary{
        display: none;
    }
</style>
<script>
    show_mycart();
    function show_mycart(){
        $.ajax({
            url:"./ajax/getProductMyCart.php",
            type:"post",
            data:{
                memberid:'<?=$_SESSION['MEMBER_ID']?>'
            },
            success:function(res){
                $("#cart-product").html(res);
                var totalPrice = 0;
                var n = 0;
                $(".unitprice").each(function(){
                    totalPrice = parseFloat(totalPrice)+parseFloat($(this).val());
                    n++;
                });
                if($(".unitprice").length > 0){
                    $("#step").removeAttr("disabled");
                    $("#msg-cart").hide();
                }else{
                    $("#step").attr("disabled","true");
                    $("#msg-cart").show();
                }
                $("#totalprice").html(totalPrice);
                countCart();
            }
        });
    }
    
    $("body").delegate("[id^=quantity]","change",function(e){
        if(e.type == "change"){
            if($(this).val() <= 0){
                $(this).val(1); 
            }
            $.ajax({
                url:"./ajax/updateProductCart.php",
                type:"post",
                data:{
                    memberid:'<?=$_SESSION['MEMBER_ID']?>',
                    count:$(this).val(),
                    productid:$(this).data("product")
                },
                success:function(res){
                    if(res == "T"){
                        swal({
                          title: "จำนวนสินค้าเกินที่มีอยู่",
                          type: "error",
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "ตกลง"
                        });
                    }
                    show_mycart();
                }
            });
        }
    });
    
    function delProductInCart(productid,memberid,name){
        swal({
          title: "คุณแน่ใจหรือ?",
          text: "คุณกำลังเครื่องปริ้น "+name+" ออกจากตระกร้า",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ลบ",
          cancelButtonText: "ยกเลิก",
          closeOnConfirm: false
        },
        function(){
            $.ajax({
                url:"./ajax/delProductInCart.php",
                type:"post",
                data:{
                    memberid:memberid,
                    productid:productid
                },
                success:function(res){
                    swal({
                      title: "ลบสินค้าแล้วเรียบร้อย",
                      type: "success",
                      confirmButtonColor: "#21b443",
                      confirmButtonText: "ตกลง",
                    },
                    function(){
                            show_mycart();
                    });
                }
            });
        });    
    }
</script>