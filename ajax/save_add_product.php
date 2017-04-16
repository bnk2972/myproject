<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();

if(!empty($_POST["addBrand"])){
    $find_brand_name = "SELECT pb.brandNAME FROM product_brand pb WHERE pb.brandNAME = '{$_POST['brandname']}'";
    $res_brand_name = $db->MySQL($find_brand_name);
    if(sizeof($res_brand_name) == 0){
        $add_brand = "INSERT INTO  product_brand(brandNAME,brandCompany,brandAddress,brandContact)  VALUES('{$_POST['brandname']}','{$_POST['brandcompany']}','{$_POST['brandaddress']}','{$_POST['brandcontact']}')";
        if($db->ExecuteSQL($add_brand)) 
            echo json_encode(array("status"=>true,"msg"=>"บันทึกยี่ห้อ {$_POST['brandname']} สำเร็จ"));
        else 
            echo json_encode(array("status"=>false,"msg"=>"เกิดข้อผิดพลาดในการบันทึกยี่ห้อ {$_POST['brandname']}"));
    }else{
        echo json_encode(array("status"=>false,"msg"=>"ยี่ห้อ ".$_POST['brandname']." ซ้ำในระบบ"));
    }
}

if(!empty($_POST['editBrand'])){
    $brandoldname = $_POST['brandoldname'] ? $_POST['brandoldname'] : null;
    $brandoldcompany = $_POST['brandoldcompany'] ? $_POST['brandoldcompany'] : null;
    $brandoldaddress = $_POST['brandoldaddress'] ? $_POST['brandoldaddress'] : null;
    $brandoldcontact = $_POST['brandoldcontact'] ? $_POST['brandoldcontact'] : null;
    if($brandoldname != $_POST['brandname']){
        $find_brand_name = "SELECT pb.brandNAME FROM product_brand pb WHERE pb.brandNAME = '{$_POST['brandname']}'";
        $res_brand_name = $db->MySQL($find_brand_name);
        if(sizeof($res_brand_name) == 0){
            $editbrand = "UPDATE product_brand SET brandNAME='{$_POST['brandname']}',";
            if($brandoldcompany != $_POST['brandcompany']) 
                $editbrand .= "brandCompany='{$_POST['brandcompany']}',";
            if($brandoldaddress != $_POST['brandaddress']) 
                $editbrand .= "brandAddress='{$_POST['brandaddress']}',";
            if($brandoldcontact != $_POST['brandcontact']) 
                $editbrand .= "brandContact='{$_POST['brandcontact']}',";
            $editbrand = rtrim($editbrand,",");
            $editbrand .= " WHERE brandID={$_POST['brandid']}";
            if($db->ExecuteSQL($editbrand,true)) 
                echo json_encode(array("status"=>true,"msg"=>"แก้ไขข้อมูล {$_POST['brandname']} สำเร็จ"));
            else 
                echo json_encode(array("status"=>false,"msg"=>"เกิดข้อผิดพลาดในการแก้ไขข้อมูล {$_POST['brandname']}"));
        }else{
            echo json_encode(array("status"=>false,"msg"=>"ยี่ห้อ ".$_POST['brandname']." ซ้ำในระบบ"));
        }
    }else{
        $change = 0;
        $editbrand = "UPDATE product_brand SET ";
        if($brandoldcompany != $_POST['brandcompany'])
            { $editbrand .= "brandCompany='{$_POST['brandcompany']}',"; $change++; }
        if($brandoldaddress != $_POST['brandaddress'])
            { $editbrand .= "brandAddress='{$_POST['brandaddress']}',"; $change++; }
        if($brandoldcontact != $_POST['brandcontact'])
            { $editbrand .= "brandContact='{$_POST['brandcontact']}',"; $change++; }
        $editbrand = rtrim($editbrand,",");
        $editbrand .= " WHERE brandID={$_POST['brandid']}";
        if($change>0){
            if($db->ExecuteSQL($editbrand,true)) 
                echo json_encode(array("status"=>true,"msg"=>"แก้ไขข้อมูล {$_POST['brandname']} สำเร็จ"));
            else 
                echo json_encode(array("status"=>false,"msg"=>"เกิดข้อผิดพลาดในการแก้ไขข้อมูล {$_POST['brandname']}"));
        }else{
            echo json_encode(array("status"=>false,"msg"=>"ไม่มีการแก้ไขข้อมูล"));
        }
    }
}

if(!empty($_POST["addType"])){
    $find_type_name = "SELECT pt.typeNAME FROM product_type pt WHERE pt.typeNAME = '{$_POST['typename']}'";
    $res_type_name = $db->MySQL($find_type_name);
    if(sizeof($res_type_name) == 0){
        $add_type = "INSERT INTO product_type(typeNAME)  VALUES('{$_POST['typename']}')";
        if($db->ExecuteSQL($add_type)) 
            echo json_encode(array("status"=>true,"msg"=>"บันทึกประเภท {$_POST['typename']} สำเร็จ"));
        else 
            echo json_encode(array("status"=>false,"msg"=>"เกิดข้อผิดพลาดในการบันทึกประเภท {$_POST['typename']}"));
    }else{
        echo json_encode(array("status"=>false,"msg"=>"ประเภท ".$_POST['typename']." ซ้ำในระบบ"));
    }
}

if(!empty($_POST['editType'])){
    $typeoldname = $_POST['typeoldname'] ? $_POST['typeoldname'] : null;
    if($typeoldname != $_POST['typename']){
        $find_type_name = "SELECT pb.typeNAME FROM product_type pb WHERE pb.typeNAME = '{$_POST['editType']}'";
        $res_type_name = $db->MySQL($find_type_name);
        if(sizeof($res_type_name) == 0){
            $edittype = "UPDATE product_type SET typeNAME='{$_POST['typename']}'";
            $edittype .= " WHERE typeID={$_POST['typeid']}";
            if($db->ExecuteSQL($edittype,true)) 
                echo json_encode(array("status"=>true,"msg"=>"แก้ไขข้อมูลประเภท {$_POST['typename']} สำเร็จ"));
            else 
                echo json_encode(array("status"=>false,"msg"=>"เกิดข้อผิดพลาดในการแก้ไขข้อมูลประเภท {$_POST['typename']}"));
        }else{
            echo json_encode(array("status"=>false,"msg"=>"ประเภท ".$_POST['typename']." ซ้ำในระบบ"));
        }
    }else{
        echo json_encode(array("status"=>false,"msg"=>"ไม่มีการแก้ไขข้อมูล"));
    }
}

if(!empty($_POST['addProduct'])){
    $productname = $_POST['productname'] ? $_POST['productname']:null;
    $brandid = $_POST['brandid'] ? $_POST['brandid']:null;
    $typeid = $_POST['typeid'] ? $_POST['typeid']:null;
    $amount = $_POST['amount'] ? $_POST['amount']:null;
    $price = $_POST['price'] ? $_POST['price']:null;
    $detail = $_POST['detail'] ? $_POST['detail']:null;
    $sql_product_name = "SELECT productNAME FROM product WHERE productNAME = '{$productname}'";
    $result_product_name = $db->MySQL($sql_product_name);
    if(sizeof($result_product_name)==0){
        $sql_insert_product = "INSERT INTO      product(brandID,typeID,productNAME,detail,amount,price,buy_amount,statusID,create_date_product,create_date_new_product) 
        VALUES(".$brandid.",'".$typeid."','".$productname."','".$detail."','".$amount."','".$price."',0,1,'".date('Y-m-d H:i:s')."','".date('Y-m-d',strtotime('+1 month',strtotime('today UTC')))."')";
        if($productid = $db->ExecuteSQL($sql_insert_product)){
            $uploadCount = 0;
            $sql_check_img = "SELECT MAX(P.imageID) AS maxID FROM (SELECT * FROM product_image) P";
            $result_img = $db->MySQL($sql_check_img);
            if(empty($result_img[0]['maxID'])) $id = 1;
            else $id = $result_img[0]['maxID'];
            $sql_upload_img = "INSERT INTO product_image(productID,imgNAME,path,imgshow) VALUES";
            if(is_uploaded_file($_FILES['productpic1']['tmp_name']) || file_exists($_FILES['productpic1']['tmp_name'])){
                $filetype = pathinfo($_FILES['productpic1']['name'],PATHINFO_EXTENSION);
                $file_tmp = $_FILES['productpic1']['tmp_name'];
                $new_file_name = "product_".$id.".".$filetype;
                $new_file_path = "../img/img_product/".$new_file_name;
                if(!file_exists($new_file_path)){
                    if(move_uploaded_file($file_tmp,$new_file_path)){
                        $sql_upload_img .= "(".$productid.",'".$new_file_name."','".$new_file_path."',1),";
                        $uploadCount++;
                        $id++;
                    }
                }
            }
            if(is_uploaded_file($_FILES['productpic2']['tmp_name']) || file_exists($_FILES['productpic2']['tmp_name'])){
                $filetype = pathinfo($_FILES['productpic2']['name'],PATHINFO_EXTENSION);
                $file_tmp = $_FILES['productpic2']['tmp_name'];
                $new_file_name = "product_".$id.".".$filetype;
                $new_file_path = "../img/img_product/".$new_file_name;
                if(!file_exists($new_file_path)){
                    if(move_uploaded_file($file_tmp,$new_file_path)){
                        $sql_upload_img .= "(".$productid.",'".$new_file_name."','".$new_file_path."',2),";
                        $uploadCount++;
                        $id++;
                    }
                }
            }
            if(is_uploaded_file($_FILES['productpic3']['tmp_name']) || file_exists($_FILES['productpic3']['tmp_name'])){
                $filetype = pathinfo($_FILES['productpic3']['name'],PATHINFO_EXTENSION);
                $file_tmp = $_FILES['productpic3']['tmp_name'];
                $new_file_name = "product_".$id.".".$filetype;
                $new_file_path = "../img/img_product/".$new_file_name;
                if(!file_exists($new_file_path)){
                    if(move_uploaded_file($file_tmp,$new_file_path)){
                        $sql_upload_img .= "(".$productid.",'".$new_file_name."','".$new_file_path."',3),";
                        $uploadCount++;
                        $id++;
                    }
                }
            }
            if(is_uploaded_file($_FILES['productpic4']['tmp_name']) || file_exists($_FILES['productpic4']['tmp_name'])){
                $filetype = pathinfo($_FILES['productpic4']['name'],PATHINFO_EXTENSION);
                $file_tmp = $_FILES['productpic4']['tmp_name'];
                $new_file_name = "product_".$id.".".$filetype;
                $new_file_path = "../img/img_product/".$new_file_name;
                if(!file_exists($new_file_path)){
                    if(move_uploaded_file($file_tmp,$new_file_path)){
                        $sql_upload_img .= "(".$productid.",'".$new_file_name."','".$new_file_path."',4),";
                        $uploadCount++;
                        $id++;
                    }
                }
            }
            if(is_uploaded_file($_FILES['productpic5']['tmp_name']) || file_exists($_FILES['productpic5']['tmp_name'])){
                $filetype = pathinfo($_FILES['productpic5']['name'],PATHINFO_EXTENSION);
                $file_tmp = $_FILES['productpic5']['tmp_name'];
                $new_file_name = "product_".$id.".".$filetype;
                $new_file_path = "../img/img_product/".$new_file_name;
                if(!file_exists($new_file_path)){
                    if(move_uploaded_file($file_tmp,$new_file_path)){
                        $sql_upload_img .= "(".$productid.",'".$new_file_name."','".$new_file_path."',5),";
                        $uploadCount++;
                        $id++;
                    }
                }
            }
            $sql_upload_img = rtrim($sql_upload_img,",");
            if($uploadCount>0){
                if($db->ExecuteSQL($sql_upload_img,true)){
                    echo json_encode(array("status"=>true,"msg"=>"บันทึกสินค้า {$productname} สำเร็จ"));
                }else{
                    echo json_encode(array("status"=>false,"msg"=>"เกิดข้อผิดพลาดในการบันทึกสินค้า {$productname}"));
                }
            }
        }
    }else{
        echo json_encode(array("status"=>false,"msg"=>"สินค้า ".$productname." ซ้ำในระบบ"));
    }
    
}

if(!empty($_POST['editProduct'])){
    $productid = $_POST['productid'] ? $_POST['productid']:null;
    $productname = $_POST['productname'] ? $_POST['productname']:null;
    $brandid = $_POST['brandid'] ? $_POST['brandid']:null;
    $typeid = $_POST['typeid'] ? $_POST['typeid']:null;
    $amount = $_POST['amount'] ? $_POST['amount']:null;
    $price = $_POST['price'] ? $_POST['price']:null;
    $detail = $_POST['detail'] ? $_POST['detail']:null;
    $sql_update_pro = "UPDATE product SET ";
    if($productname) $sql_update_pro .= "productNAME = '{$productname}',";
    if($brandid) $sql_update_pro .= "brandID = '{$brandid}',";
    if($typeid) $sql_update_pro .= "typeID = '{$typeid}',";
    if($amount) $sql_update_pro .= "amount = {$amount},";
    if($price) $sql_update_pro .= "price = {$price},";
    if($detail) $sql_update_pro .= "detail = '{$detail}',";
    $sql_update_pro = rtrim($sql_update_pro,",");
    $sql_update_pro .= " WHERE productID = {$productid}";
    if($db->ExecuteSQL($sql_update_pro,true)){
        $uploadCount = 0;
        $insertCount = 0;
        $sql_insert_img = "INSERT INTO product_image(productID,imgNAME,path,imgshow) VALUES";
        $sql_check_img = "SELECT MAX(P.imageID) AS maxID FROM (SELECT * FROM product_image) P";
        $result_img = $db->MySQL($sql_check_img);
        if(empty($result_img[0]['maxID'])) $id = 1;
        else $id = $result_img[0]['maxID'];
        
        if(!empty($_FILES['productpic1'])){
            if(is_uploaded_file($_FILES['productpic1']['tmp_name']) || file_exists($_FILES['productpic1']['tmp_name'])){
                $sql_update_img = "UPDATE product_image SET ";
                $filetype = pathinfo($_FILES['productpic1']['name'],PATHINFO_EXTENSION);
                $file_tmp = $_FILES['productpic1']['tmp_name'];
                //ชื่อไฟล์เก่า
                $oldpath = "../img/img_product/".$_POST['imgname1'];
                if(file_exists($oldpath)) unlink($oldpath);
                $fileold = explode(".",$_POST['imgname1']);
                $fileoldname = $fileold[0];

                $file_name = $fileoldname.".".$filetype;
                $new_file_path = "../img/img_product/".$file_name;
                if(!file_exists($new_file_path)){
                    if(move_uploaded_file($file_tmp,$new_file_path)){
                        $sql_update_img .= "imgNAME = '{$file_name}',";
                        $sql_update_img .= "path = '{$new_file_path}' ";
                        $sql_update_img .= "WHERE imageID = {$_POST['imgid1']}";
                        if($db->ExecuteSQL($sql_update_img,true)){
                            $uploadCount++;
                        }
                    }
                }
            }
        }
        
        if(!empty($_FILES['productpic2'])){
            if(is_uploaded_file($_FILES['productpic2']['tmp_name']) || file_exists($_FILES['productpic2']['tmp_name'])){
                if(!empty($_POST['imgid2'])){
                    $sql_update_img = "UPDATE product_image SET ";
                    $filetype = pathinfo($_FILES['productpic2']['name'],PATHINFO_EXTENSION);
                    $file_tmp = $_FILES['productpic2']['tmp_name'];
                    //ชื่อไฟล์เก่า
                    $oldpath = "../img/img_product/".$_POST['imgname2'];
                    if(file_exists($oldpath)) unlink($oldpath);
                    $fileold = explode(".",$_POST['imgname2']);
                    $fileoldname = $fileold[0];

                    $file_name = $fileoldname.".".$filetype;
                    $new_file_path = "../img/img_product/".$file_name;
                    if(!file_exists($new_file_path)){
                        if(move_uploaded_file($file_tmp,$new_file_path)){
                            $sql_update_img .= "imgNAME = '{$file_name}',";
                            $sql_update_img .= "path = '{$new_file_path}' ";
                            $sql_update_img .= "WHERE imageID = {$_POST['imgid2']}";
                            if($db->ExecuteSQL($sql_update_img,true)){
                                $uploadCount++;
                            }
                        }
                    }
                }else{
                    $filetype = pathinfo($_FILES['productpic2']['name'],PATHINFO_EXTENSION);
                    $file_tmp = $_FILES['productpic2']['tmp_name'];
                    $new_file_name = "product_".$id.".".$filetype;
                    $new_file_path = "../img/img_product/".$new_file_name;
                    if(!file_exists($new_file_path)){
                        if(move_uploaded_file($file_tmp,$new_file_path)){
                            $sql_insert_img .= "(".$productid.",'".$new_file_name."','".$new_file_path."',2),";
                            $insertCount++;
                            $id++;
                        }
                    }
                }
            }else{
                if(!empty($_POST['imgid2'])){        
                    $sql_del_img = "DELETE FROM product_image WHERE imageID = '{$_POST['imgid2']}'";
                    if($db->ExecuteSQL($sql_del_img,true)){
                        unlink("../img/img_product/".$_POST['imgname2']);
                    }
                }
            }
        }
        
        if(!empty($_FILES['productpic3'])){
            if(is_uploaded_file($_FILES['productpic3']['tmp_name']) || file_exists($_FILES['productpic3']['tmp_name'])){
                if(!empty($_POST['imgid3'])){
                    $sql_update_img = "UPDATE product_image SET ";
                    $filetype = pathinfo($_FILES['productpic3']['name'],PATHINFO_EXTENSION);
                    $file_tmp = $_FILES['productpic3']['tmp_name'];
                    //ชื่อไฟล์เก่า
                    $oldpath = "../img/img_product/".$_POST['imgname3'];
                    if(file_exists($oldpath)) unlink($oldpath);
                    $fileold = explode(".",$_POST['imgname3']);
                    $fileoldname = $fileold[0];

                    $file_name = $fileoldname.".".$filetype;
                    $new_file_path = "../img/img_product/".$file_name;
                    if(!file_exists($new_file_path)){
                        if(move_uploaded_file($file_tmp,$new_file_path)){
                            $sql_update_img .= "imgNAME = '{$file_name}',";
                            $sql_update_img .= "path = '{$new_file_path}' ";
                            $sql_update_img .= "WHERE imageID = {$_POST['imgid3']}";
                            if($db->ExecuteSQL($sql_update_img,true)){
                                $uploadCount++;
                            }
                        }
                    }
                }else{
                    $filetype = pathinfo($_FILES['productpic3']['name'],PATHINFO_EXTENSION);
                    $file_tmp = $_FILES['productpic3']['tmp_name'];
                    $new_file_name = "product_".$id.".".$filetype;
                    $new_file_path = "../img/img_product/".$new_file_name;
                    if(!file_exists($new_file_path)){
                        if(move_uploaded_file($file_tmp,$new_file_path)){
                            $sql_insert_img .= "(".$productid.",'".$new_file_name."','".$new_file_path."',3),";
                            $insertCount++;
                            $id++;
                        }
                    }
                }
            }else{
                if(!empty($_POST['imgid3'])){
                    $sql_del_img = "DELETE FROM product_image WHERE imageID = {$_POST['imgid3']}";
                    if($db->ExecuteSQL($sql_del_img,true)){
                        unlink("../img/img_product/".$_POST['imgname3']);
                    }
                }
            }
        }
        
        if(!empty($_FILES['productpic4'])){
            if(is_uploaded_file($_FILES['productpic4']['tmp_name']) || file_exists($_FILES['productpic4']['tmp_name'])){
                if(!empty($_POST['imgid4'])){
                    $sql_update_img = "UPDATE product_image SET ";
                    $filetype = pathinfo($_FILES['productpic4']['name'],PATHINFO_EXTENSION);
                    $file_tmp = $_FILES['productpic4']['tmp_name'];
                    //ชื่อไฟล์เก่า
                    $oldpath = "../img/img_product/".$_POST['imgname4'];
                    if(file_exists($oldpath)) unlink($oldpath);
                    $fileold = explode(".",$_POST['imgname4']);
                    $fileoldname = $fileold[0];

                    $file_name = $fileoldname.".".$filetype;
                    $new_file_path = "../img/img_product/".$file_name;
                    if(!file_exists($new_file_path)){
                        if(move_uploaded_file($file_tmp,$new_file_path)){
                            $sql_update_img .= "imgNAME = '{$file_name}',";
                            $sql_update_img .= "path = '{$new_file_path}' ";
                            $sql_update_img .= "WHERE imageID = {$_POST['imgid4']}";
                            if($db->ExecuteSQL($sql_update_img,true)){
                                $uploadCount++;
                            }
                        }
                    }
                }else{
                    $filetype = pathinfo($_FILES['productpic4']['name'],PATHINFO_EXTENSION);
                    $file_tmp = $_FILES['productpic4']['tmp_name'];
                    $new_file_name = "product_".$id.".".$filetype;
                    $new_file_path = "../img/img_product/".$new_file_name;
                    if(!file_exists($new_file_path)){
                        if(move_uploaded_file($file_tmp,$new_file_path)){
                            $sql_insert_img .= "(".$productid.",'".$new_file_name."','".$new_file_path."',4),";
                            $insertCount++;
                            $id++;
                        }
                    }
                }
            }else{
                if(!empty($_POST['imgid4'])){
                    $sql_del_img = "DELETE FROM product_image WHERE imageID = {$_POST['imgid4']}";
                    if($db->ExecuteSQL($sql_del_img,true)){
                        unlink("../img/img_product/".$_POST['imgname4']);
                    }
                }
            }
        }
        
        if(!empty($_FILES['productpic5'])){
            if(is_uploaded_file($_FILES['productpic5']['tmp_name']) || file_exists($_FILES['productpic5']['tmp_name'])){
                if(!empty($_POST['imgid5'])){
                    $sql_update_img = "UPDATE product_image SET ";
                    $filetype = pathinfo($_FILES['productpic5']['name'],PATHINFO_EXTENSION);
                    $file_tmp = $_FILES['productpic5']['tmp_name'];
                    //ชื่อไฟล์เก่า
                    $oldpath = "../img/img_product/".$_POST['imgname5'];
                    if(file_exists($oldpath)) unlink($oldpath);
                    $fileold = explode(".",$_POST['imgname5']);
                    $fileoldname = $fileold[0];

                    $file_name = $fileoldname.".".$filetype;
                    $new_file_path = "../img/img_product/".$file_name;
                    if(!file_exists($new_file_path)){
                        if(move_uploaded_file($file_tmp,$new_file_path)){
                            $sql_update_img .= "imgNAME = '{$file_name}',";
                            $sql_update_img .= "path = '{$new_file_path}' ";
                            $sql_update_img .= "WHERE imageID = {$_POST['imgid5']}";
                            if($db->ExecuteSQL($sql_update_img,true)){
                                $uploadCount++;
                            }
                        }
                    }
                }else{
                    $filetype = pathinfo($_FILES['productpic5']['name'],PATHINFO_EXTENSION);
                    $file_tmp = $_FILES['productpic5']['tmp_name'];
                    $new_file_name = "product_".$id.".".$filetype;
                    $new_file_path = "../img/img_product/".$new_file_name;
                    if(!file_exists($new_file_path)){
                        if(move_uploaded_file($file_tmp,$new_file_path)){
                            $sql_insert_img .= "(".$productid.",'".$new_file_name."','".$new_file_path."',5),";
                            $insertCount++;
                            $id++;
                        }
                    }
                }
            }else{
                if(!empty($_POST['imgid5'])){
                    $sql_del_img = "DELETE FROM product_image WHERE imageID = {$_POST['imgid5']}";
                    if($db->ExecuteSQL($sql_del_img,true)){
                        unlink("../img/img_product/".$_POST['imgname5']);
                    }
                }
            }
        }
        
        $sql_insert_img = rtrim($sql_insert_img,",");
        if($insertCount>0)  $db->ExecuteSQL($sql_insert_img,true);

        if($uploadCount>0){
            echo json_encode(array("status"=>true,"msg"=>"แก้ไขสินค้า {$productname} สำเร็จ"));
        }else{
            echo json_encode(array("status"=>true,"msg"=>"แก้ไขสินค้า {$productname} สำเร็จ"));
        }
    }else{
        echo json_encode(array("status"=>false,"msg"=>"เกิดข้อผิดพลาดในการแก้ไขสินค้า {$productname}"));
    }
}
exit;
?>