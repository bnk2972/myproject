<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
$sql = "select * from product_type where typeID = {$_POST['id']}";
$result = $db->MySql($sql);
if(sizeof($result)>0){
    echo '[{"id":"typeid","value":"'.$result[0]['typeID'].'"},
           {"id":"typename","value":"'.$result[0]['typeNAME'].'"}]';
}
exit;
?>