<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
$sql = "select * from product where productID = {$_POST['productid']}";
$result = $db->MySql($sql);

function parse($text) {
    // Damn pesky carriage returns...
    $text = str_replace("\r\n", "\n", $text);
    $text = str_replace("\r", "\n", $text);

    // JSON requires new line characters be escaped
    $text = str_replace("\n", "\\n", $text);
    return $text;
}

if(sizeof($result)>0){
    $sql_img = "select * from product_image where productID = {$_POST['productid']}";
    $result_img = $db->MySQL($sql_img);
    if(sizeof($result_img)>0){
        $imgvalue = '';
        foreach($result_img as $res){
            $imgvalue.= '{"imgid":"'.$res['imageID'].'","imgname":"'.$res['imgNAME'].'","imgshow":"'.$res['imgshow'].'"},';
        }
        $imgvalue = rtrim($imgvalue,",");
    }
    $datajson = '[{"id":"productid","value":"'.$result[0]['productID'].'"},{"id":"productname","value":"'.$result[0]['productNAME'].'"},{"id":"brandid","value":"'.$result[0]['brandID'].'"},{"id":"all-tag-type","value":"'.$result[0]['typeID'].'"},{"id":"amount","value":"'.$result[0]['amount'].'"},{"id":"price","value":"'.$result[0]['price'].'"},{"id":"detail","value":"'.$result[0]['detail'].'"},{"id":"image","value":['.$imgvalue.']}]';
    echo parse($datajson);
}
exit;
?>