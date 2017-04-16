<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
if($_POST['status']==1){ 
    $title = "ยี่ห้อสินค้า";
?>
<div>
    <u style="font-size:30px;"><?=$title?></u>
    <div class="input-group manage-product">
        <input type="text" class="form-control search-product text-box" style="width:15em;" placeholder="ค้นหาชื่อยี่ห้อสินค้า" name="search-product">
        <span class="input-group-btn">
            <button class="btn btn-default search-product" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> ค้นหา</button>
        </span>
    </div>
    <div class="input-group manage-product-s"> 
        <button class="btn btn-info" data-toggle="modal" data-target="#add-brand" style="margin-right:5px;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มยี่ห้อ</button>
    </div>
</div>
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
<?php
}else if($_POST['status']==2){
    $title = "ประเภทสินค้า";
?>
<div>
    <u style="font-size:30px;"><?=$title?></u>
    <div class="input-group manage-product">
        <input type="text" class="form-control search-product text-box" style="width:15em;" placeholder="ค้นหาชื่อประเภทสินค้า" name="search-product">
        <span class="input-group-btn">
            <button class="btn btn-default search-product" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> ค้นหา</button>
        </span>
    </div>
    <div class="input-group manage-product-s"> 
        <button class="btn btn-info" data-toggle="modal" data-target="#add-type-product" style="margin-right:5px;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มประเภทสินค้า</button>
    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th width="5%">ลำดับ</th>
            <th width="70%">ประเภทสินค้า</th>
            <th width="25%">แก้ไขข้อมูล</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql_type = "SELECT * FROM product_type ORDER BY typeID ASC";
        $result_type = $db->MySQL($sql_type);
        if(sizeof($result_type)>0){
            $n = 1;
            foreach($result_type as $type){
        ?>
            <tr>
                <td><?=$n?></td>
                <td><?=$type['typeNAME']?></td>
                <td><button onclick="editType(<?=$type['typeID']?>)" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> แก้ไข</button> <button onclick="delType(<?=$type['typeID']?>,'<?=$type['typeNAME']?>')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>ลบ</button></td>
            </tr>
        <?php
                $n++;
            }
        }else{
            ?>
            <tr>
                <td colspan="3">ไม่มีประเภทสินค้า</td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<?php
}
exit;
?>