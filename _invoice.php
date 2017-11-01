<?php
session_start();
include "db/connection_db.php";
$db = new ConnectDatabase();
$orderid = $_GET['orderid'];
$SQL = "SELECT  o.*,
                m.address AS myaddress,
                od.unitPrice,
                od.productid,
                od.quantity,
                p.productNAME 
        FROM `order` o
        LEFT JOIN order_detail od ON o.orderID = od.orderID 
        LEFT JOIN product p ON p.productID = od.productID
        LEFT JOIN member m ON m.memberID = o.memberID
        WHERE o.orderID = '{$orderid}'
        AND o.memberID = '{$_SESSION['MEMBER_ID']}'";
$result = $db->MySQL($SQL);

$SQLI = "SELECT address FROM contact WHERE contact_id = 5";
$result_address = $db->MySQL($SQLI);

$_DATE = explode(" ",$result[0]['create_date_order']);
list($_YEAR,$_MONTH,$_DAY) = explode("-",$_DATE[0]);

require_once('mpdf60/mpdf.php');
$mpdf=new mPDF('th','A4','','' , 0 , 0 , 0 , 0 , 0 , 0); 
ob_start();
$mpdf->SetDisplayMode('fullpage');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Print Invoice</title>
    <style>
        *
        {
            margin:0;
            padding:0;
            font-family:Arial;
            font-size:10pt;
            color:#000;
        }
        body
        {
            width:100%;
            font-size:10pt;
            margin:0;
            padding:0;
        }
         
        p
        {
            margin:0;
            padding:0;
        }
         
        #wrapper
        {
            width:180mm;
            margin:0 15mm;
        }
         
        .page
        {
            height:297mm;
            width:210mm;
            page-break-after:always;
        }
 
        table
        {
             
            border-spacing:0;
            border-collapse: collapse; 
             
        }
         
        table td 
        {
            padding: 2mm;
        }
         
        table.heading
        {
            height:50mm;
        }
         
        h1.heading
        {
            font-size:14pt;
            color:#000;
            font-weight:normal;
        }
         
        h2.heading
        {
            font-size:9pt;
            color:#000;
            font-weight:normal;
        }
         
        hr
        {
            color:#ccc;
            background:#ccc;
        }
         
        #invoice_body
        {
            height: 149mm;
        }
         
        #invoice_body , #invoice_total
        {   
            width:100%;
        }
        #invoice_body table , #invoice_total table
        {
            width:100%;
            border-top: 1px solid #ccc;
     
            border-spacing:0;
            border-collapse: collapse; 
             
            margin-top:5mm;
        }
         
        #invoice_body table td , #invoice_total table td
        {
            border-left: 1px solid #ccc;
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding:2mm 0;
        }
         
        #invoice_body table td.mono  , #invoice_total table td.mono
        {
            font-family:monospace;
            text-align:right;
            padding-right:3mm;
            font-size:10pt;
        }
         
        #footer
        {   
            width:180mm;
            margin:0 15mm;
            padding-bottom:3mm;
        }
        #footer table
        {
            width:100%;
            border-left: 1px solid #ccc;
            border-top: 1px solid #ccc;
             
            background:#eee;
             
            border-spacing:0;
            border-collapse: collapse; 
        }
        #footer table td
        {
            width:25%;
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
<div id="wrapper">
     
    <h1 style="text-align:center; font-weight:bold; padding-top:5mm;">ใบเสร็จรับเงิน</h1>
    <table class="heading" style="width:100%;">
        <tr>
            <td style="width:80mm;">
                <h1 class="heading">ร้านโมบาย</h1>
                <h2 class="heading">
                    ผู้ให้จำหน่ายมือถือหลากหลายยี่ห้อ<br>
                    ที่อยู่ร้าน : <?=$result_address[0]['address']?>
                </h2>
            </td>
            <td rowspan="2" valign="top" align="right" style="padding:3mm;">
                <table>
                    <tr><td>หมายเลขการสั่งซื้อ : </td><td><?=$orderid?></td></tr>
                    <tr><td>วันที่สั่งซื้อ : </td><td><?=$_DAY."/".$_MONTH."/".$_YEAR." ".$_DATE[1]." น."?></td></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <b>รายละเอียดผู้สั่งสินค้า</b> :<br />
                ชื่อสกุล : <?=$_SESSION['FULLNAME']?><br />
                ที่อยู่ : <?=$result[0]['address'] ? $result[0]['address']:$result[0]['myaddress']?>
            </td>
        </tr>
    </table>
         
         
    <div id="content">
         
        <div id="invoice_body">
            <table>
            <tr style="background:#eee;">
                <td style="width:8%;"><b>ลำดับ</b></td>
                <td><b>สินค้า</b></td>
                <td style="width:15%;"><b>จำนวน</b></td>
                <td style="width:15%;"><b>ราคา/ชิ้น</b></td>
                <td style="width:15%;"><b>ราคารวม</b></td>
            </tr>
            </table>
             
            <table>
            <?php
            $n=1;
            foreach($result as $res){
            ?>
            <tr>
                <td style="width:8%;"><?=$n?></td>
                <td style="text-align:left; padding-left:10px;"><?=$res['productNAME']?></td>
                <td class="mono" style="width:15%;"><?=$res['quantity']?></td>
                <td style="width:15%;" class="mono"><?=number_format($res['unitPrice'],2)?></td>
                <td style="width:15%;" class="mono"><?=number_format(($res['unitPrice']*$res['quantity']),2)?></td>
            </tr>
            <?php
                $n++;
            }
            ?>
            <tr>
                <td colspan="3"></td>
                <td></td>
                <td></td>
            </tr>
             
            <tr>
                <td colspan="3"></td>
                <td>รวมเป็นเงิน</td>
                <td class="mono"><?=number_format($result[0]['totalPay'],2)?></td>
            </tr>
                
            <tr>
                <td colspan="2" style="border-color:white;"></td>
                <td style="border:none; border-color:white;">ลงชื่อเจ้าของร้าน : </td>
                <td style="border:none" colspan="2">
                    นายศรายุทธ แสงบ่อคำ
                    <!-- <img style="width:10em; height:2em;" src="img/licence/lincence.png"> -->
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border-color:white;"></td>
                <td style="border:none; border-color:white; text-align:right;">วัน/เดือน/ปี : </td>
                <td style="border:none" colspan="2">
                    <?php 
                        list($y,$m,$d) = explode("-",explode(" ",$res['create_date_confirm'])[0]);
                        echo $d."/".$m."/".$y;
                    ?>
                </td>
            </tr>
        </table>
        
        </div>
        <hr/>
        <table style="width:100%; height:35mm;">
            <tr>
                <td style="width:65%; font-weight:bold; text-align:right;" align="center" valign="top">
                   ขอบคุณที่ใช้บริการ 
                </td>
            </tr>
        </table>
    </div>
     
    <br />
     
    </div>
        
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML($html);
$mpdf->Output();
?>