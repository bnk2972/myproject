<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                STEP 4 : ยืนยันการสั่งซื้อ
                <div style="float:right; vertical-align:top;">
                    <button class="btn btn-danger" id="step" onclick="window.location.href='mycart-step3.php?step=3'"><span class="glyphicon glyphicon-chevron-left"></span> ย้อนกลับ</button>
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
                    </tr>
                </thead>
                <tbody id="cart-product">
                <?php
                    $memberid = $_SESSION['MEMBER_ID'];
                    $sql_select = "SELECT tp.*,p.productNAME FROM tmp_order_detail tp
                                   LEFT JOIN product p ON tp.productid = p.productID
                                   WHERE tp.memberid = '{$memberid}'
                                   ORDER BY tp.rowid ASC";
                    $result = $db->MySQL($sql_select);
                    if(sizeof($result) > 0){
                        $n=1;
                        $total=0;
                        foreach($result as $res){
                            $total = $total+($res['unitPrice']*$res['quantity']);
                            ?>
                            <tr>
                                <td style="text-align:center;"><?=$n?></td>
                                <td style="text-align:center;"><a href="javascript:void(0)" onclick="getShowDetailProduct(<?=$res['productid']?>)" role="button"><?=$res['productNAME']?></a></td>
                                <td style="text-align:center;"><?=$res['quantity']?></td>
                                <td style="text-align:center;"  id="unitprice<?=$res['rowid']?>">
                                    <?=($res['unitPrice']*$res['quantity'])?>
                                    <input type="hidden" class="unitprice" value="<?=($res['unitPrice']*$res['quantity'])?>">
                                </td>
                            </tr>
                            <?php
                            $n++;
                        }
                    }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td style="text-align:right;" colspan="5">
                            <div>รวมราคาสินค้าทั้งหมด <span id="totalprice"><?=$total?></span> บาท</div>
                            <button style="margin-top:10px;" onclick="submitOrder()" class="btn btn-success">ยืนยันการสั่งซื้อสินค้า</button>
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
    function submitOrder(){
        swal({
          title: "คุณแน่ใจหรือ?",
          text: "ต้องยืนยันการสั่งซื้อสินค้าหรือไม่",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ยืนยัน",
          cancelButtonText: "ยกเลิก",
          closeOnConfirm: false
        },
        function(){
            window.location.href = "php/save_order.php";
        });    
    }
</script>