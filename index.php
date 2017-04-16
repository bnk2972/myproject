<?php
header("content-type:text/html; charset=utf-8");
session_start();
include "db/connection_db.php";
$db = new ConnectDatabase();
include "layout/header/header.php";
include "layout/header/header-menu.php";
include "layout/body/body-index.php";
include "layout/body/body-center.php";

if(!empty($_SESSION['MEMBER_ID'])){
    include "layout/body/body-basket.php";  }
if(empty($_SESSION['MEMBER_ID']) || !empty($_SESSION['ADMIN_ID'])){
    include "layout/body/body-signin.php";  }

include "layout/body/body-modal-store-detail.php";
include "layout/footer/footer-contact.php";
?>
<script>
    $("#index").css("background-color","rgb(231,231,231)")
</script>