<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
$productid = $_POST['productid'];
$memberid = $_POST['memberid'];
$SELECT = "SELECT * FROM addfaverite WHERE memberID = {$memberid} AND productID = {$productid}";
$result = $db->MySQL($SELECT);
if(sizeof($result)>0){
    $DELETE = "DELETE FROM addfaverite WHERE memberID = {$memberid} AND productID = {$productid}";
    $db->ExecuteSQL($DELETE);  
    echo false;
}else{
    $INSERT = "INSERT INTO addfaverite(memberID,productID,create_date_fav) VALUES({$memberid},{$productid},'".date("Y-m-d H:i:s")."')";
    $db->ExecuteSQL($INSERT);
    echo true;
}
exit;
?>