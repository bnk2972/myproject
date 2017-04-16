<?php
session_start();
include "../layout/header/header.php";
include "../db/connection_db.php";
$db = new ConnectDatabase();
$sql_advertise = "SELECT * FROM advertise WHERE advertiseID = 1";
$result_advertise = $db->MySQL($sql_advertise);
if(sizeof($result_advertise)==0){
    if(!empty($_FILES['advertise_img']['tmp_name'])){
        if(is_uploaded_file($_FILES['advertise_img']['tmp_name']) || file_exists($_FILES['productpic1']['tmp_name'])){
            $filetype = pathinfo($_FILES['advertise_img']['name'],PATHINFO_EXTENSION);
            $filetmp = $_FILES['advertise_img']['tmp_name'];
            $filename = "advertise1.".$filetype;
            move_uploaded_file($filetmp,"../img/advertise/".$filename);
        }
    }
    $insert_advertise = "INSERT INTO
                         advertise(advertiseID,imageNAME,create_date_advertise,advertise_detail,advertise_title,advertise_subdetail) 
                         VALUES(1,'".(!empty($filename) ? $filename : '')."','".date('Y-m-d H:i:s')."','".$_POST['adv_detail']."','".$_POST['advertise_title']."','".$_POST['adv_subdetail']."')";
}else{
    if(!empty($_FILES['advertise_img']['tmp_name'])){
        if(is_uploaded_file($_FILES['advertise_img']['tmp_name']) || file_exists($_FILES['advertise_img']['tmp_name'])){
            
            if(!empty($result_advertise[0]['imageNAME']))
                if(file_exists("../img/advertise/{$result_advertise[0]['imageNAME']}"))               
                    unlink("../img/advertise/{$result_advertise[0]['imageNAME']}");
            
            $filetype = pathinfo($_FILES['advertise_img']['name'],PATHINFO_EXTENSION);
            $filetmp = $_FILES['advertise_img']['tmp_name'];
            $filename = "advertise1.".$filetype;
            if(move_uploaded_file($filetmp,"../img/advertise/".$filename)){
                $db->ExecuteSQL("UPDATE advertise SET imageNAME='{$filename}' WHERE advertiseID = 1",true);
            }
        }
    }
    $insert_advertise = "UPDATE advertise SET 
                         advertise_detail='".$_POST['adv_detail']."',
                         advertise_title='".$_POST['advertise_title']."',
                         advertise_subdetail='".$_POST['adv_subdetail']."'
                         WHERE advertiseID = 1";
}
if($db->ExecuteSQL($insert_advertise,true)){
    ?>
    <script>
        window.onload = function(){
            swal({
              title: "บันทึกข้อมูลสำเร็จ",
              type: "success",
              confirmButtonColor: "#5CB85C",
              confirmButtonText: "ตกลง"
            },
            function(){
                window.location.href="../advertise_manage.php";
            });
        }
    </script>
    <?php
}else{
    ?>
    <script>
        window.onload = function(){
            swal({
              title: "บันทึกข้อมูลไม่สำเร็จ",
              type: "error",
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "ตกลง"
            },
            function(){
                window.location.href="../advertise_manage.php";
            });
        }
    </script>
    <?php
    
}
?>