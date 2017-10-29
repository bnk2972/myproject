<?php
    $SQL = "SELECT o.*,m.name,m.surname,m.address AS myaddress,od.unitPrice,od.productid,od.quantity,p.productNAME FROM `order` o
            LEFT JOIN order_detail od ON o.orderID = od.orderID 
            LEFT JOIN product p ON p.productID = od.productID
            LEFT JOIN member m ON m.memberID = o.memberID
            WHERE o.orderID = '{$_GET['orderid']}'";
    $result = $db->MySQL($SQL);
?>
<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                รายการสั่งซื้อหมายเลข <?=$_GET['orderid']?>
            </div>
        </div>
        <div class="report-manage-product">
            <form action="php/updateStatusOrder.php" method="post" enctype="multipart/form-data">
                <table style="width:100%;">
                    <tbody id="order-product">
                        <tr>
                            <td style="width:20%;">รหัสการสั่งซื้อหมายเลข</td>
                            <td>: <?=$_GET['orderid']?><input type="hidden" value="<?=$_GET['orderid']?>" name="orderid"></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">ชื่อผู้สั่งซื้อ</td>
                            <td>: <?=$result[0]['name']." ".$result[0]['surname']?></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">ที่อยู่ที่จัดส่ง</td>
                            <td>: <?=$result[0]['address'] ? $result[0]['address']:$result[0]['myaddress']?></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">วันที่และเวลาสั่งซื้อ</td>
                            <td>: <?php
                                    $_DATE = explode(" ",$result[0]['create_date_order']);
                                    list($_YEAR,$_MONTH,$_DAY) = explode("-",$_DATE[0]);
                                    echo $_DAY."/".$_MONTH."/".$_YEAR." ".$_DATE[1]." น.";
                                   ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">สถานะการสั่งซื้อ</td>
                            <td>: <?php 
                                    if($result[0]['statusID']!=1 && $result[0]['statusID']!=6){
                                  ?>
                                  <select name="order_status" onchange="orderStatus(this.value)">
                                    <option value="0" <?=($result[0]['statusID']==5 || $result[0]['statusID']==3 || $result[0]['statusID']==4 ? "disabled" : "")?> <?=($result[0]['statusID']==0 ? "selected" : "")?> >เกิดปัญหา</option>
                                    <?php
                                    if($result[0]['statusID']==7){
                                    ?>
                                    <option value="7" <?=($result[0]['statusID']==5 || $result[0]['statusID']==3 || $result[0]['statusID']==4 ? "disabled" : "")?> <?=($result[0]['statusID']==7 ? "selected" : "")?>>แก้ไขปัญหาแล้ว</option>
                                    <?php
                                    }
                                    ?>
                                    <option value="2" <?=($result[0]['statusID']==5 || $result[0]['statusID']==3 || $result[0]['statusID']==4 ? "disabled" : "")?> <?=($result[0]['statusID']==2 ? "selected" : "")?>>ส่งหลักฐานการชำระเงินแล้ว</option>
                                    <option value="3" <?=($result[0]['statusID']==5 || $result[0]['statusID']==4 ? "disabled" : "")?> <?=($result[0]['statusID']==3 ? "selected" : "")?>>รอจัดส่งสินค้า</option>
                                    <option value="4" <?=($result[0]['statusID']==5 ? "disabled" : "")?> <?=($result[0]['statusID']==4 ? "selected" : "")?>>จัดส่งสินค้าแล้วเรียบร้อย</option>
                                    <option value="5" <?=($result[0]['statusID']==5 ? "selected" : "disabled")?>>รอดำเนินการยกเลิก</option>
                                  </select>
                                  <input type="text" value="<?=($result[0]['statusID']==0 ? $result[0]['remark'] : '')?>" placeholder="รายละเอียดปัญหา" id="remark" name="remark" style="width:300px; <?=($result[0]['statusID']==0 ? '' : 'display:none')?> ">
                                  <input type="text" id="tracking" name="tracking" value="<?=($result[0]['statusID']==4 ? $result[0]['trackcode'] : '')?>" placeholder="ใส่หมายเลขจัดส่งพัสดุ" style="width:200px; <?=($result[0]['statusID']==4 ? '' : 'display:none')?> ">
                                  <?php
                                    $date = "";
                                    if(!empty($result[0]['create_date_track'])){
                                        list($y,$m,$d) = explode("-",$result[0]['create_date_track']);
                                        $date = $d."/".$m."/".$y;
                                    }
                                  ?>
                                  <input type="text" id="datetrack" name="datetrack" value="<?=($result[0]['statusID']==4 ? $date : '')?>" placeholder="วันที่จัดส่งพัสดุ" class="datepicker" readonly style="width:200px; <?=($result[0]['statusID']==4 ? '' : 'display:none;')?>">
                                  <span id="msg-remark" style='<?=($result[0]['statusID']==7 ? "":"display:none")?>' class='glyphicon glyphicon-search' style='cursor:pointer;' onclick='checkRemark(<?=$result[0]['orderID']?>,"<?=$result[0]['remark']?>")'>
                                  
                                <?php
                                    }else if($result[0]['statusID']==1){
                                        echo "ยังไม่ได้ชำระเงิน";
                                    }else if($result[0]['statusID']==6){
                                        echo "<span style='color:red;'>ยกเลิกการสั่งซื้อแล้ว</span>";
                                    }
                                ?>
                            </td>
                            <script>
                                function orderStatus(status){
                                    if(status == 0){
                                        $("#msg-remark").hide();
                                        $("#tracking, #datetrack").hide();
                                        var oldstatus = '<?=$result[0]['statusID']?>';
                                        var ramark_old = '';
                                        if(oldstatus == 0){
                                            ramark_old = '<?=$result[0]['remark']?>';
                                        }
                                        $("#remark").val(ramark_old).show();
                                    }else if(status==4){
                                        $("#tracking, #datetrack").show();
                                        $("#msg-remark").hide();
                                        $("#remark").val("").hide();
                                    }else if(status==7){
                                        $("#tracking, #datetrack").hide();
                                        $("#msg-remark").show();
                                        $("#remark").val("").hide();
                                    }
                                    else{
                                        $("#tracking, #datetrack").hide();
                                        $("#msg-remark").hide();
                                        $("#remark").val("").hide();
                                    }
                                }
                            </script>
                        </tr>
                        <tr>
                            <td style="width:20%;">หมายเลขพัสดุ</td>
                            <td>: <?=($result[0]['trackcode'] ? $result[0]['trackcode'] : "ยังไม่ได้รับหมายเลขพัสดุ")?></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">หลักฐานการโอนเงิน</td>
                            <td>: <span id="uploadimg">
                                <?php
                                if(!empty($result[0]['path'])){
                                    ?>
                                    <a href="/img/order/<?=$result[0]['path']?>" target="_blank"><?=$result[0]['path']?></a>
                                    <?php
                                }else{
                                ?>
                                   -
                                <?php
                                }
                                ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">วัน/เวลา ที่ส่งหลักฐานการโอนเงิน</td>
                            <td>: <?php
                                    if(empty($result[0]['create_date_apply'])){
                                        echo "-";
                                    }else{
                                        $_DATE = explode(" ",$result[0]['create_date_apply']);
                                        list($_YEAR,$_MONTH,$_DAY) = explode("-",$_DATE[0]);
                                        echo $_DAY."/".$_MONTH."/".$_YEAR." ".$_DATE[1]." น.";
                                    }
                                   ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%;"></td>
                            <td>  <button type="button" style="<?=($result[0]['statusID']!=5 && $result[0]['statusID']!=6 ? "":"display:none")?>" onclick="save_manage_order()" class="btn btn-success">บันทึก</button>
                            <button type="button" style="<?=($result[0]['statusID']==5 ? "":"display:none")?>" onclick="cancelOrder(6)" class="btn btn-danger">ดำเนินการยกเลิก</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <table class="table table-striped">
                <caption style="text-decoration:underline; font-size:20px;">รายละเอียดสินค้าที่สั่งซื้อ</caption>
                <thead>
                    <tr>
                        <th style="text-align:center; width:10%;">ลำดับ</th>
                        <th style="text-align:center; width:15%;">ชื่อสินค้า</th>
                        <th style="text-align:center; width:20%;">จำนวนสินค้า</th>
                        <th style="text-align:center; width:20%;">ราคา/ชิ้น(บาท)</th>
                        <th style="text-align:center; width:15%;">รวมราคา(บาท)</th>
                    </tr>
                </thead>
                <tbody id="order-product">
                    <?php
                    $n=1;
                    foreach($result as $res){
                        ?>
                        <tr>
                            <td style="text-align:center;"><?=$n?></td>
                            <td style="text-align:center;"><a href="javascript:void(0)" onclick="getShowDetailProduct(<?=$res['productid']?>)" role="button"><?=$res['productNAME']?></a></td>
                            <td style="text-align:center;"><?=$res['quantity']?></td>
                            <td style="text-align:center;"><?=$res['unitPrice']?></td>
                            <td style="text-align:center;"><?=($res['unitPrice']*$res['quantity'])?></td>

                        </tr>
                        <?php
                        $n++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" style="text-align:right;">
                            ราคาทั้งหมด <?=$result[0]['totalPay']?> บาท
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
    window.onload = function(){
        window.opener.location.href = window.opener.location.href;
    }
    function save_manage_order(){
        var status = $("[name=order_status]").val();
        var remark;
        var trackcode;
        var datetrack;
        var oldstatus = '<?=$result[0]['statusID']?>';
        var ramark_old;
        var trackcode_old;
        if(oldstatus == 0){
            ramark_old = '<?=$result[0]['remark']?>';
        }
        if(oldstatus == 4){
            trackcode_old = '<?=$result[0]['trackcode']?>';
        }
        if(status == 0){
            remark = $("#remark").val();
            if(remark.length <= 0){
                alert("กรุณาใส่ข้อมูลปัญหา");
                return false;
            }
        }
        if(status == 4){
            trackcode = $("#tracking").val();
            datetrack = $("#datetrack").val();
            if(trackcode.length <= 5){
                alert("กรุณาใส่หมายเลขจัดส่งพัสดุ");
                return false;
            }
            if(datetrack == null || datetrack == ''){
                alert("กรุณาใส่วันที่จัดส่งพัสดุ");
                return false;
            }
        }
        if(status == oldstatus){
            if(status == 0){
                if(ramark_old == remark){
                    alert("ไม่มีการเปลี่ยนแปลงข้อมูล");
                    return false;
                }
            }else if(status == 4){
                if(trackcode_old == trackcode){
                    alert("ไม่มีการเปลี่ยนแปลงข้อมูล");
                    return false;
                }
            }else{
                alert("ไม่มีการเปลี่ยนแปลงข้อมูล");
                return false;
            }
        }
        if(confirm("คุณแน่ใจว่าต้องการบันทึกข้อมูล")){
            $("form").submit();
        }
    }
    function cancelOrder(id){
        $.ajax({
            data:{
                status:id,
                orderid:$("[name=orderid]").val()
            },
            url:"/ajax/cancelManageOrder.php",
            type:"post",
            success:function(){
                window.location.href = window.location.href;
            }
        });
    }
    function checkRemark(id,remark){
        $("#remark-order .modal-body").html("รายละเอียด : "+remark);
        $("#remark-order").modal();
    }
</script>
