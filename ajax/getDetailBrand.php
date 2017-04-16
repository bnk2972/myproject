<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
$sql = "select * from product_brand where brandID = {$_POST['id']}";
$result = $db->MySql($sql);
if(sizeof($result)>0){
    echo '[{"id":"brandid","value":"'.$result[0]['brandID'].'"},
          {"id":"brandname","value":"'.$result[0]['brandNAME'].'"},
          {"id":"brandcompany","value":"'.$result[0]['brandCompany'].'"},
          {"id":"brandaddress","value":"'.$result[0]['brandAddress'].'"},
          {"id":"brandcontact","value":"'.$result[0]['brandContact'].'"}]';
}
exit;
?>