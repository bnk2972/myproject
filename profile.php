<?php
header("content-type:text/html; charset=utf-8");
session_start();
include "db/connection_db.php";
$db = new ConnectDatabase();
include "layout/header/header.php";
if(empty($_SESSION["MEMBER_ID"])){
    ?>
    <script type="text/javascript">
        window.onload = function(){
            swal({
              title: "ไม่มีสิทธิ์เข้าถึงหน้านี้",
              type: "error",
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "ตกลง",
            },
            function(){
                window.location.href="index.php";
            });
        }
    </script>
    <?php
    exit;
}
include "layout/header/header-menu.php";
include "layout/body/body-profile.php";
include "layout/footer/footer-contact.php";
?>