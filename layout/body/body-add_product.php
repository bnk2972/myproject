<script type="text/javascript" src="/js/add-product.js"></script>
<div id="add-brand" class="modal fade modal-small" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e74c3c; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><strong>เพิ่มยี่ห้อสินค้า</strong></h3>
            </div>
            <div class="modal-body">
                <form id="get-brand" method="post" action="">
                    <table class="modal-table">
                        <tr>
                            <td class="modal-td">ชื่อยี่ห้อ&nbsp;:&nbsp;</td>
                            <td><input type="text" id="brandname" name="brandname" placeholder="กรุณาใส่ชื่อยี่ห้อ"></td>
                        </tr>
                        <tr class="brand-name-prefect" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                <span class="brand-name-msg" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">ชื่อบริษัท&nbsp;:&nbsp;</td>
                            <td><input type="text" id="brandcompany" name="brandcompany" placeholder="กรุณาใส่ชื่อบริษัท"></td>
                        </tr>
                        <tr class="brand-company-prefect" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                <span class="brand-company-msg" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">ที่อยู่บริษัท&nbsp;:&nbsp;</td>
                            <td><textarea class="form-control" placeholder="กรุณาใส่ที่อยู่บริษัท" name="brandaddress"></textarea></td>
                        </tr>
                        <tr class="brand-address-prefect" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                <span class="brand-address-msg" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">เบอร์ติดต่อ&nbsp;:&nbsp;</td>
                            <td><input type="text" id="brandcontact" name="brandcontact" placeholder="กรุณาใส่เบอร์ติดต่อ"></td>
                        </tr>
                        <tr class="brand-contact-prefect" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                <span class="brand-contact-msg" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr class="warning-login" style="display:none">
                            <td colspan="2" style="padding-top:0px; padding-bottom:0px;">
                                <div class="alert alert-danger">
                                    <span id="msg-danger"></span>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer" style="text-align:center;">
                <button type="button" onclick="addProductBrand()" class="btn btn-orange">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<div id="edit-brand" class="modal fade modal-small" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e74c3c; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><strong>แก้ไขยี่ห้อสินค้า</strong></h3>
            </div>
            <div class="modal-body">
                <form id="edit-brand-product" method="post" action="">
                    <table class="modal-table">
                        <tr>
                            <td class="modal-td">ชื่อยี่ห้อ&nbsp;:&nbsp;</td>
                            <td><input type="text" id="brandname" name="brandname" placeholder="กรุณาใส่ชื่อยี่ห้อ"></td>
                        </tr>
                        <tr class="brand-name-prefect" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                <span class="brand-name-msg" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">ชื่อบริษัท&nbsp;:&nbsp;</td>
                            <td><input type="text" id="brandcompany" name="brandcompany" placeholder="กรุณาใส่ชื่อบริษัท"></td>
                        </tr>
                        <tr class="brand-company-prefect" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                <span class="brand-company-msg" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">ที่อยู่บริษัท&nbsp;:&nbsp;</td>
                            <td><textarea class="form-control" placeholder="กรุณาใส่ที่อยู่บริษัท" name="brandaddress"></textarea></td>
                        </tr>
                        <tr class="brand-address-prefect" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                <span class="brand-address-msg" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">เบอร์ติดต่อ&nbsp;:&nbsp;</td>
                            <td><input type="text" id="brandcontact" name="brandcontact" placeholder="กรุณาใส่เบอร์ติดต่อ"></td>
                        </tr>
                        <tr class="brand-contact-prefect" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                <span class="brand-contact-msg" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr class="warning-login" style="display:none">
                            <td colspan="2" style="padding-top:0px; padding-bottom:0px;">
                                <div class="alert alert-danger">
                                    <span id="msg-danger"></span>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer" style="text-align:center;">
                <button type="button" onclick="editProductBrand()" class="btn btn-orange">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<div id="add-type-product" class="modal fade modal-small" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e74c3c; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><strong>เพิ่มประเภทสินค้า</strong></h3>
            </div>
            <div class="modal-body">
                <form method="post" id="add-type" action="php/member_login.php">
                    <table class="modal-table">
                        <tr>
                            <td class="modal-td" width="30%">ชื่อประเภทสินค้า&nbsp;:&nbsp;</td>
                            <td width="70%"><input type="text" id="typename" name="typename" placeholder="กรุณาใส่ชื่อประเภทสินค้า"></td>
                        </tr>
                        <tr class="type-name-defect" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                <span class="type-name-msg" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer" style="text-align:center">
                <button type="button" onclick="addProductType()" class="btn btn-orange">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<div id="edit-type-product" class="modal fade modal-small" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e74c3c; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><strong>เพิ่มประเภทสินค้า</strong></h3>
            </div>
            <div class="modal-body">
                <form method="post" id="edit-type" action="php/member_login.php">
                    <table class="modal-table">
                        <tr>
                            <td class="modal-td" width="30%">ชื่อประเภทสินค้า&nbsp;:&nbsp;</td>
                            <td width="70%"><input type="text" id="typename" name="typename" placeholder="กรุณาใส่ชื่อประเภทสินค้า"></td>
                        </tr>
                        <tr class="type-name-defect" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                <span class="type-name-msg" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer" style="text-align:center">
                <button type="button" onclick="editProductType()" class="btn btn-orange">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<div id="add-product-modal" class="modal fade modal-small" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e74c3c; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><strong>เพิ่มสินค้า</strong></h3>
            </div>
            <div class="modal-body">
                <form id="add-product" enctype="multipart/form-data" method="post" action="">
                    <div class="row">
                        <div class="col-md-6" style="border-right:1px solid #ddd;">
                            <table class="modal-table">
                                <tr>
                                    <td class="modal-td">ชื่อสินค้า&nbsp;:&nbsp;</td>
                                    <td><input type="text" id="productname" name="productname" placeholder="กรุณาใส่ชื่อสินค้า"></td>
                                </tr>
                                <tr class="productname-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="productname-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">ยี่ห้อสินค้า&nbsp;:&nbsp;</td>
                                    <td style="text-align:left;">
                                        <select name="brandid" class="form-control">
                                            <option value="" selected>--เลือกยี่ห้อ--</option>
                                            <?php
                                                $sql_brand = "SELECT * FROM product_brand ORDER BY brandNAME ASC";
                                                $resule_brand = $db->MySQL($sql_brand);
                                                if(sizeof($resule_brand)>0){
                                                    foreach($resule_brand as $res){
                                                    ?>
                                                        <option value="<?=$res['brandID']?>">
                                                            <?=$res['brandNAME']?>
                                                        </option>
                                                    <?php
                                                    }
                                                }
                                            ?>  
                                        </select>
                                    </td>
                                </tr>
                                <tr class="brandid-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="brandid-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">ประเภทสินค้า&nbsp;:&nbsp;</td>
                                    <td style="text-align:left;">
                                        <select name="typeid" id="typeid" class="form-control">
                                            <option value="" selected>--เลือกประเภท--</option>
                                            <?php
                                                $sql_type = "SELECT * FROM product_type ORDER BY typeNAME ASC";
                                                $resule_type = $db->MySQL($sql_type);
                                                if(sizeof($resule_type)>0){
                                                    foreach($resule_type as $res){
                                                        ?>
                                                        <option value="<?=$res['typeID']?>">
                                                            <?=$res['typeNAME']?>
                                                        </option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <!-- <div id="all-tag-type" style="overflow:scroll; border-radius:4px; overflow-x: hidden; width:100%; height:120px; border:1px solid #ccc;">
                                            <?php
                                                $sql_type = "SELECT * FROM product_type ORDER BY typeNAME ASC";
                                                $resule_type = $db->MySQL($sql_type);
                                                if(sizeof($resule_type)>0){
                                                    $num = 0;
                                                    foreach($resule_type as $res){
                                                    ?>
                                                    <div style="display:block;">
                                                    <input style="width:20px;" type="checkbox" class="typeid" value="<?=$res['typeID']?>" data-eq="<?=$num?>" data-name="<?=$res['typeNAME']?>"><?=$res['typeNAME']?>
                                                    </div>
                                                    <?php
                                                        $num++;
                                                    }
                                                }
                                            ?>
                                        </div> -->
                                    </td>
                                </tr>
                                <tr id="type-tag" style="display:none">
                                    <td class="modal-td"><span class="glyphicon glyphicon-tags"></span>&nbsp;:&nbsp;</td>
                                    <td style="text-align:left;">
                                        <!--<textarea readonly id="tags" style="background-color:white;" class="form-control"></textarea>-->
                                        <div id="tags" style="cursor:default; word-break: keep-all; padding-left:5px; padding-right:5px; width:100%; min-height:54px; border:1px solid #ccc; border-radius:4px;">
                                        
                                        </div>
                                    </td>
                                </tr>
                                <tr class="typeid-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="typeid-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">จำนวนสินค้า&nbsp;:&nbsp;</td>
                                    <td style="text-align:left;"><input style="width:80%;" type="text" id="amount" name="amount" placeholder="กรุณาใส่จำนวนสินค้า"> ชิ้น</td>
                                </tr>
                                <tr class="amount-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="amount-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">ราคา&nbsp;:&nbsp;</td>
                                    <td style="text-align:left;"><input style="width:80%;" type="text" id="price" name="price" placeholder="กรุณาใส่ราคาสินค้า"> บาท/ชิ้น</td>
                                </tr>
                                <tr class="price-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="price-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">รายละเอียด&nbsp;:&nbsp;</td>
                                    <td><textarea name="detail" class="form-control" style="height:200px;"></textarea></td>
                                </tr>
                                <tr class="detail-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="detail-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="modal-table">
                                <tr>
                                    <td class="modal-td">รูปสินค้า(show)&nbsp;:&nbsp;</td>
                                    <td><input style="border:1px solid #ccc;" type="file" name="productpic1" class="form-control"></td>
                                </tr>
                                <tr class="productpic1-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="productpic1-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">รูปสินค้า&nbsp;:&nbsp;</td>
                                    <td><input style="border:1px solid #ccc;" type="file" name="productpic2" class="form-control"></td>
                                </tr>
                                <tr class="productpic2-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="productpic2-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">รูปสินค้า&nbsp;:&nbsp;</td>
                                    <td><input style="border:1px solid #ccc;" type="file" name="productpic3" class="form-control"></td>
                                </tr>
                                <tr class="productpic3-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="productpic3-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">รูปสินค้า&nbsp;:&nbsp;</td>
                                    <td><input style="border:1px solid #ccc;" type="file" name="productpic4" class="form-control"></td>
                                </tr>
                                <tr class="productpic4-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="productpic4-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">รูปสินค้า&nbsp;:&nbsp;</td>
                                    <td><input style="border:1px solid #ccc;" type="file" name="productpic5" class="form-control"></td>
                                </tr>
                                <tr class="productpic5-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="productpic5-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="text-align:center;">
                <button type="button" onclick="addProduct()" class="btn btn-orange">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<div id="show-type" class="modal fade modal-small" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e74c3c; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><strong>ประเภทของสินค้า</strong></h3>
                <h3 style="margin:0px;" id="printername"></h3>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer" style="text-align:center;">
                <button class="btn btn-primary" class="close" data-dismiss="modal" type="button">ตกลง</button>
            </div>
        </div>
    </div>
</div>

<div id="edit-product-modal" class="modal fade modal-small" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e74c3c; color:white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><strong>แก้ไขสินค้า</strong></h3>
            </div>
            <div class="modal-body">
                <form id="edit-product" enctype="multipart/form-data" method="post" action="">
                    <div class="row">
                        <div class="col-md-6" style="border-right:1px solid #ddd;">
                            <table class="modal-table">
                                <tr>
                                    <td class="modal-td">ชื่อสินค้า&nbsp;:&nbsp;</td>
                                    <td>
                                        <input type="hidden" id="productid" name="productid">
                                        <input type="text" id="productname" name="productname" placeholder="กรุณาใส่ชื่อสินค้า">
                                    </td>
                                </tr>
                                <tr class="productname-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="productname-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">ยี่ห้อสินค้า&nbsp;:&nbsp;</td>
                                    <td style="text-align:left;">
                                        <select id="brandid" name="brandid" class="form-control">
                                            <option value="" selected>--เลือกยี่ห้อ--</option>
                                            <?php
                                                $sql_brand = "SELECT * FROM product_brand ORDER BY brandNAME ASC";
                                                $resule_brand = $db->MySQL($sql_brand);
                                                if(sizeof($resule_brand)>0){
                                                    foreach($resule_brand as $res){
                                                    ?>
                                                        <option value="<?=$res['brandID']?>">
                                                            <?=$res['brandNAME']?>
                                                        </option>
                                                    <?php
                                                    }
                                                }
                                            ?>  
                                        </select>
                                    </td>
                                </tr>
                                <tr class="brandid-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="brandid-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">แท็กประเภทสินค้า&nbsp;:&nbsp;</td>
                                    <td style="text-align:left;">
                                        <select name="typeid" id="typeid" class="form-control">
                                            <option value="" selected>--เลือกประเภท--</option>
                                            <?php
                                                $sql_type = "SELECT * FROM product_type ORDER BY typeNAME ASC";
                                                $resule_type = $db->MySQL($sql_type);
                                                if(sizeof($resule_type)>0){
                                                    foreach($resule_type as $res){
                                                        if($res['typeID'])
                                                        ?>
                                                        <option value="<?=$res['typeID']?>">
                                                            <?=$res['typeNAME']?>
                                                        </option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr id="type-tag" style="display:none">
                                    <td class="modal-td"><span class="glyphicon glyphicon-tags"></span>&nbsp;:&nbsp;</td>
                                    <td style="text-align:left;">
                                        <div id="tags" style="cursor:default; word-break: keep-all; padding-left:5px; padding-right:5px; width:100%; min-height:54px; border:1px solid #ccc; border-radius:4px;">
                                        
                                        </div>
                                    </td>
                                </tr>
                                <tr class="typeid-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="typeid-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">จำนวนสินค้า&nbsp;:&nbsp;</td>
                                    <td style="text-align:left;"><input style="width:80%;" type="text" id="amount" name="amount" placeholder="กรุณาใส่จำนวนสินค้า"> ชิ้น</td>
                                </tr>
                                <tr class="amount-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="amount-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">ราคา&nbsp;:&nbsp;</td>
                                    <td style="text-align:left;"><input style="width:80%;" type="text" id="price" name="price" placeholder="กรุณาใส่ราคาสินค้า"> บาท/ชิ้น</td>
                                </tr>
                                <tr class="price-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="price-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">รายละเอียด&nbsp;:&nbsp;</td>
                                    <td><textarea name="detail" class="form-control" style="height:200px;"></textarea></td>
                                </tr>
                                <tr class="detail-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="detail-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="modal-table">
                            <tr>
                                    <td class="modal-td">รูปสินค้า(show)&nbsp;:&nbsp;</td>
                                    <td>
                                        <input type="hidden" id="imgid1" name="imgid1">
                                        <input type="hidden" id="imgname1" name="imgname1">
                                        <input type="hidden" id="imgshow1" name="imgshow1">
                                        <input style="border:1px solid #ccc;" type="file" name="productpic1" class="form-control">
                                        <div class="productpic1" style="display:none">
                                            <span class="glyphicon glyphicon-remove img-closed" onclick="cancelOleImage(1)"></span>
                                            <a href="" target="_blank">
                                                <img src="">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="productpic1-prefect" style="display:none;">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="productpic1-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">รูปสินค้า&nbsp;:&nbsp;</td>
                                    <td>
                                        <input type="hidden" id="imgid2" name="imgid2">
                                        <input type="hidden" id="imgname2" name="imgname2">
                                        <input type="hidden" id="imgshow2" name="imgshow2">
                                        <input style="border:1px solid #ccc;" type="file" name="productpic2" class="form-control">
                                        <div class="productpic2" style="display:none;">
                                            <span class="glyphicon glyphicon-remove img-closed" onclick="cancelOleImage(2)"></span>
                                            <a href="" target="_blank">
                                                <img src="">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="productpic2-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="productpic2-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">รูปสินค้า&nbsp;:&nbsp;</td>
                                    <td>
                                        <input type="hidden" id="imgid3" name="imgid3">
                                        <input type="hidden" id="imgname3" name="imgname3">
                                        <input type="hidden" id="imgshow3" name="imgshow3">
                                        <input style="border:1px solid #ccc;" type="file" name="productpic3" class="form-control">
                                        <div class="productpic3" style="display:none;">
                                            <span class="glyphicon glyphicon-remove img-closed" onclick="cancelOleImage(3)"></span>
                                            <a href="" target="_blank">
                                                <img src="">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="productpic3-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="productpic3-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">รูปสินค้า&nbsp;:&nbsp;</td>
                                    <td>
                                        <input type="hidden" id="imgid4" name="imgid4">
                                        <input type="hidden" id="imgname4" name="imgname4">
                                        <input type="hidden" id="imgshow4" name="imgshow4">
                                        <input style="border:1px solid #ccc;" type="file" name="productpic4" class="form-control">
                                        <div class="productpic4" style="display:none;">
                                            <span class="glyphicon glyphicon-remove img-closed" onclick="cancelOleImage(4)"></span>
                                            <a href="" target="_blank">
                                                <img src="">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="productpic4-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="productpic4-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="modal-td">รูปสินค้า&nbsp;:&nbsp;</td>
                                    <td>
                                        <input type="hidden" id="imgid5" name="imgid5">
                                        <input type="hidden" id="imgname5" name="imgname5">
                                        <input type="hidden" id="imgshow5" name="imgshow5">
                                        <input style="border:1px solid #ccc;" type="file" name="productpic5" class="form-control">
                                        <div class="productpic5" style="display:none;">
                                            <span class="glyphicon glyphicon-remove img-closed" onclick="cancelOleImage(5)"></span>
                                            <a href="" target="_blank">
                                                <img src="">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="productpic5-prefect" style="display:none">
                                    <td></td>
                                    <td style="padding-top:0px; padding-bottom:0px; text-align:left;">
                                        <span class="productpic5-msg" style="font-size:10px; color:red;"></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="text-align:center;">
                <button type="button" onclick="updateProduct()" class="btn btn-orange">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<div id="show-type" class="modal fade modal-small" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">ประเภทของสินค้า</h3>
                <h3 style="margin:0px;" id="printername"></h3>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer" style="text-align:center;">
                <button class="btn btn-primary" class="close" data-dismiss="modal" type="button">ตกลง</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#add-product .typeid").click(function(){
        let counttag = 0;
        let tag = "";
        $("#add-product .typeid:checked").each(function(){
            tag += "<span style='color:blue; text-decoration: underline;'>"+$(this).data("name")+"</span>";
            tag += "<span class='glyphicon glyphicon-remove' onclick='delTags("+$(this).data("eq")+")' style='color:#ccc; font-size:10px; cursor:pointer;'></span> , ";
            counttag++;
        });
        if(counttag>0){
            tag = tag.substr(0,tag.length-2);
            $("#add-product #tags").html(tag);
            $("#add-product #type-tag").show();
        }else{
            $("#add-product #tags").html("");
            $("#add-product #type-tag").hide();
        }
    });
    
    function delTags(index){
        $("#add-product .typeid").eq(index).click();
    }
    
    $("#amount , #price").keypress(function(e){
        let _event = e.keycode || e.which;
        let string = String.fromCharCode(_event);
        if(!string.match(/[0-9.]/) && $(this).attr('id') == "price"){
            e.preventDefault() ? e.preventDefault() : e.returnValue=false;
        }
        if(!string.match(/[0-9]/) && $(this).attr('id') == "amount"){
            e.preventDefault() ? e.preventDefault() : e.returnValue=false;
        }
    });
    
    $("#edit-product .typeid").click(function(){
        let counttag = 0;
        let tag = "";
        $("#edit-product .typeid:checked").each(function(){
            tag += "<span style='color:blue; text-decoration: underline;'>"+$(this).data("name")+"</span>";
            tag += "<span class='glyphicon glyphicon-remove' onclick='delTagsEdit("+$(this).data("eq")+")' style='color:#ccc; font-size:10px; cursor:pointer;'></span> , ";
            counttag++;
        });
        if(counttag>0){
            tag = tag.substr(0,tag.length-2);
            $("#edit-product #tags").html(tag);
            $("#edit-product #type-tag").show();
        }else{
            $("#edit-product #tags").html("");
            $("#edit-product #type-tag").hide();
        }
    });
    
    function delTagsEdit(index){
        $("#edit-product .typeid").eq(index).click();
    }
    

</script>