<?php
    $SQL = "SELECT o.*,m.address AS myaddress,od.unitPrice,od.productid,od.quantity,p.productNAME FROM `order` o
            LEFT JOIN order_detail od ON o.orderID = od.orderID 
            LEFT JOIN product p ON p.productID = od.productID
            LEFT JOIN member m ON m.memberID = o.memberID
            WHERE o.orderID = '{$_GET['orderid']}'
            AND o.memberID = '{$_SESSION['MEMBER_ID']}'";
    $result = $db->MySQL($SQL);
?>
<div class="container">
    <div class="product" style="min-height:100%;">
        <div class="product-topic left">
            <div class="topic">
                รายการสั่งซื้อหมายเลข <?=$_GET['orderid']?>
                <?php
                if($result[0]['statusID']==3 || $result[0]['statusID']==4){
                ?>
                 <div style="float:right;">
                    <a href="_invoice.php?orderid=<?=$_GET['orderid']?>">ใบเสร็จ <span class="glyphicon glyphicon-file	Try it
"></span></a>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="report-manage-product">
            <form action="php/saveImgBill.php" method="post" enctype="multipart/form-data">
                <table style="width:100%;">
                    <tbody id="order-product">
                        <tr>
                            <td style="width:20%;">รหัสการสั่งซื้อหมายเลข</td>
                            <td>: <?=$_GET['orderid']?><input type="hidden" value="<?=$_GET['orderid']?>" name="orderid"></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">ชื่อผู้สั่งซื้อ</td>
                            <td>: <?=$_SESSION['FULLNAME']?></td>
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
                            <td>: 
                                <?php
                                    if($result[0]['statusID']==0)
                                        echo "เกิดปัญหา <span class='glyphicon glyphicon-search' style='cursor:pointer;' onclick='checkRemark(".$result[0]['orderID'].",\"".$result[0]['remark']."\")'></span> <a href='javascript:void(0)' onclick='repairOrder(".$result[0]['orderID'].")'><span class='glyphicon glyphicon-ok'>แก้ไขแล้ว</span></a>";
                                    else if($result[0]['statusID']==1)
                                        echo "ยังไม่ได้ชำระเงิน";
                                    else if($result[0]['statusID']==2)
                                        echo "ส่งหลักฐานการชำระเงินแล้ว";
                                    else if($result[0]['statusID']==3)
                                        echo "รอจัดส่งสินค้า";
                                    else if($result[0]['statusID']==4)
                                        echo "จัดส่งสินค้าแล้วเรียบร้อย";
                                    else if($result[0]['statusID']==5)
                                        echo "<span style='color:red;'>รอดำเนินการยกเลิก</span>";
                                    else if($result[0]['statusID']==5)
                                        echo "<span style='color:red;'>ยกเลิกการสั่งซื้อแล้ว</span>";
                                    else if($result[0]['statusID']==6)
                                        echo "<span style='color:red;'>ยกเลิกการสั่งซื้อแล้ว</span>";  
                                    else if($result[0]['statusID']==7)
                                        echo "แก้ไขปัญหาแล้ว <span class='glyphicon glyphicon-search' style='cursor:pointer;' onclick='checkRemark(".$result[0]['orderID'].",\"".$result[0]['remark']."\")'>";  
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%;">หมายเลขพัสดุ</td>
                            <td>: <?=($result[0]['trackcode'] ? $result[0]['trackcode'] : "ยังไม่ได้รับหมายเลขพัสดุ")?></td>
                        </tr>
                        <?php
                            $date = "";
                            if(!empty($result[0]['create_date_track'])){
                                list($y,$m,$d) = explode("-",$result[0]['create_date_track']);
                                $date = $d."/".$m."/".$y;
                            }
                        ?>
                        <tr>
                            <td style="width:20%;">วันที่จัดส่งพัสดุ</td>
                            <td>: <?=($result[0]['create_date_track'] ? $date : "-")?></td>
                        </tr>
                        <tr>
                            <td style="width:20%;">หลักฐานการโอนเงิน</td>
                            <td>: <span id="uploadimg">
                                <?php
                                if(!empty($result[0]['path'])){
                                    ?>
                                    <a href="img/order/<?=$result[0]['path']?>" target="_blank"><?=$result[0]['path']?></a>
                                    <?php
                                    if($result[0]['statusID']!=3 && $result[0]['statusID']!=4 && $result[0]['statusID']!=5){
                                    ?>
                                    <span class="glyphicon glyphicon-trash" style="cursor:pointer;" onclick="delimg('<?=$_GET['orderid']?>')"></span>
                                    <?php
                                    }
                                }else if($result[0]['statusID']!=5 && $result[0]['statusID']!=6){
                                ?>
                                    <a href="javascript:void(0)" onclick="$('[name=img]').click();">คลิกเพื่ออัพโหลดภาพ</a>
                                <?php
                                }else{
                                    echo "-";
                                }
                                ?>
                                </span>
                                <input type="file" style="display:none;" accept="image/*" onchange="uploadImg(this)" name="img">
                                <script>
                                    function uploadImg(input){
                                       if(input.files && input.files[0]) {
                                            $("#uploadimg").html('<span style="color:#4080cb; text-decoration:underline; cursor:default;">'+input.files[0].name+'</span><span class="glyphicon glyphicon-remove" onclick="cancelupload()" style=\'cursor:pointer;\'></span> <button type="submit" class="btn btn-success">บันทึก</button>');
                                        }
                                    }
                                    function cancelupload(){
                                        $("#uploadimg").html('<a href="javascript:void(0)" onclick="$(\'[name=img]\').click();">คลิกเพื่ออัพโหลดภาพ</a>');
                                    }
                                    
                                    function delimg(id){
                                        swal({
                                          title: "คุณแน่ใจหรือ?",
                                          text: "คุณต้องการลบภาพหลักฐานการโอนเงินหรือไม่",
                                          type: "warning",
                                          showCancelButton: true,
                                          confirmButtonColor: "#DD6B55",
                                          confirmButtonText: "ยืนยัน",
                                          cancelButtonText: "ยกเลิก",
                                          closeOnConfirm: false
                                        },
                                        function(){
                                            $.ajax({
                                                url:"/ajax/delImgBill.php",
                                                type:"post",
                                                data:{
                                                    orderid:id
                                                },
                                                success:function(){
                                                    swal({
                                                      title: "ลบสำเร็จ",
                                                      type: "success",
                                                      confirmButtonColor: "#21b443",
                                                      confirmButtonText: "ตกลง",
                                                    },
                                                    function(){
                                                       window.location.href = 'order_detail.php?orderid=<?=$_GET['orderid']?>';
                                                    });
                                                }
                                            });
                                        }); 
                                    }
                                </script>
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
    function checkRemark(id,remark){
        $("#remark-order .modal-body").html("รายละเอียด : "+remark);
        $("#remark-order").modal();
    }
    function repairOrder(id){
        if(confirm("คุณมั่นใจว่าแก้ไขข้อมูลแล้วเรียบร้อย")){
            $.ajax({
                url:"/ajax/repairOrder.php",
                type:"post",
                data:{
                    orderid:id
                },
                success:function(){
                    window.location.href = window.location.href;
                }
            });
        }
    }
</script>
