<?php
header("content-type:text/html; charset=utf-8");
session_start();
include "db/connection_db.php";
$db = new ConnectDatabase();
include "layout/header/header.php";
include "layout/header/header-menu.php";
// if(!empty($_SESSION['MEMBER_ID'])){
//     include "layout/body/body-basket.php";
// }
include "layout/body/body-howtopay.php";
include "layout/footer/footer-contact.php";
include "layout/body/body-signin.php";

?>
<script>
    $(".howto").css("background-color","#c0392b")
</script>