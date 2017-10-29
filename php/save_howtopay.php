<?php
session_start();
include "../layout/header/header.php";
include "../db/connection_db.php";
$db = new ConnectDatabase();
$sql_advertise = "SELECT * FROM how_to_pay WHERE id = 1";
$result_advertise = $db->MySQL($sql_advertise);
if(sizeof($result_advertise)==0){
    if(!empty($_FILES['advertise_img']['tmp_name'])){
        if(is_uploaded_file($_FILES['advertise_img']['tmp_name']) || file_exists($_FILES['advertise_img']['tmp_name'])){
            $filetype = pathinfo($_FILES['advertise_img']['name'],PATHINFO_EXTENSION);
            $filetmp = $_FILES['advertise_img']['tmp_name'];
            $filename = "howtopay1.".$filetype;
            move_uploaded_file($filetmp,"../img/howtopay/".$filename);
        }
    }
    $insert_advertise = "INSERT INTO
                         how_to_pay(id,detail,imgPath) 
                         VALUES(1,'".$_POST['detail_howtopay']."','{$filename}')";
}else{
    if(!empty($_FILES['advertise_img']['tmp_name'])){
        if(is_uploaded_file($_FILES['advertise_img']['tmp_name']) || file_exists($_FILES['advertise_img']['tmp_name'])){
            
            if(!empty($result_advertise[0]['imgPath']))
                if(file_exists("../img/howtopay/{$result_advertise[0]['imgPath']}"))               
                    unlink("../img/howtopay/{$result_advertise[0]['imgPath']}");
            
            $filetype = pathinfo($_FILES['advertise_img']['name'],PATHINFO_EXTENSION);
            $filetmp = $_FILES['advertise_img']['tmp_name'];
            $filename = "advertise1.".$filetype;
            if(move_uploaded_file($filetmp,"../img/howtopay/".$filename)){
                $db->ExecuteSQL("UPDATE how_to_pay SET imgPath='{$filename}' WHERE id = 1",true);
            }
        }
    }
    $insert_advertise = "UPDATE how_to_pay SET 
                         detail='".$_POST['detail_howtopay']."'
                         WHERE id = 1";
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
                window.location.href="../manage_howtopay.php";
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
                window.location.href="../manage_howtopay.php";
            });
        }
    </script>
    <?php
    
}
?>