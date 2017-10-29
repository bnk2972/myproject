<?php
session_start();
include "../db/connection_db.php";
$db = new ConnectDatabase();
$SQL = "SELECT  o.*,
                m.name,
                m.surname 
        FROM `order` o
        LEFT JOIN member m 
        ON o.memberID = m.memberID
        ORDER BY o.create_date_order DESC";
$result = $db->MySQL($SQL);
if(sizeof($result)>0){
    $n=1;
    foreach($result as $res){
        echo "<tr>";
        ?>
        <td style="text-align:center;"><?=$n?></td>
        <td style="text-align:center;"><?=$res['orderID']?></td>
        <td style="text-align:center;">
           <?=$res['name']." ".$res['surname']?>
        </td>
        <td style="text-align:center;"><?=$res['totalPay']?></td>
        <td style="text-align:center;">
            <?php
                $_DATE = explode(" ",$res['create_date_order']);
                list($_YEAR,$_MONTH,$_DAY) = explode("-",$_DATE[0]);
                echo $_DAY."/".$_MONTH."/".$_YEAR."<br>".$_DATE[1]." น.";
            ?>
        </td>
        <td style="text-align:center;">
            <?php
            $disabled = "";
            if($res['statusID']==0)
            {  echo "เกิดปัญหา";  }
            else if($res['statusID']==1)
            {  echo "ยังไม่ได้ชำระเงิน";   }
            else if($res['statusID']==2)
            {  echo "<span style='color:#2cc718;'>ส่งหลักฐานการชำระเงินแล้ว</span>";   }
            else if($res['statusID']==3)
            {  echo "รอจัดส่งสินค้า";  }
            else if($res['statusID']==4)
            {  echo "จัดส่งสินค้าแล้วเรียบร้อย";  }
            else if($res['statusID']==5)
            {  echo "<span style='color:red;'>รอดำเนินการยกเลิก</span>";  }
            else if($res['statusID']==6)
            {  echo "<span style='color:red;'>ยกเลิกการสั่งซื้อแล้ว</span>";  }
            else if($res['statusID']==7)
            {  echo "แก้ไขปัญหาแล้ว <span class='glyphicon glyphicon-search' style='cursor:pointer;' onclick='checkRemark(".$res['orderID'].",\"".$res['remark']."\")'>";  }
            ?>
        </td>
        <td style="text-align:center;">
           <button class="btn" onclick="window.open('manage_order_detail.php?orderid=<?=$res['orderID']?>','_blank')">ตรวจสอบ</button>
        </td>
        <?php
        $n++;
        echo "</tr>";
    }
}else{
    ?>
        <td colspan="7" style="text-align:center;">ไม่มีการสั่งซื้อ</td>
    <?php
}
exit;
?>