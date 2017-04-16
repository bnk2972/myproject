<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
if(isset($_POST['amphur']) && !empty($_POST['province_id'])){
    $province_id = $_POST['province_id'];
    $sql_amphur = "SELECT * 
                   FROM amphur a 
                   WHERE a.province_id = ".$province_id;
?>
<option value="">--กรุณาระบุอำเภอ--</option>
<?php
    if($result_amphur = $db->MySQL($sql_amphur)){
        foreach($result_amphur as $result){
?>
<option value="<?=$result['AMPHUR_ID']?>"><?=$result['AMPHUR_NAME']?></option>
<?php
        }
    }
}

if(isset($_POST['district']) && !empty($_POST['amphur_id'])){
    $amphur_id = $_POST['amphur_id'];
    $province_id = $_POST['province_id'];
    $sql_district = "SELECT *,
                            (SELECT postcode 
                             FROM amphur a
                             WHERE a.amphur_id={$amphur_id}) AS POSTCODE
                     FROM district d 
                     WHERE d.amphur_id = ".$amphur_id."
                     AND d.province_id = ".$province_id;
    $data = "<option value=''>--กรุณาระบุตำบล--</option>";
    if($result_district = $db->MySQL($sql_district)){
        foreach($result_district as $result){
            $data.="<option value='{$result['DISTRICT_ID']}'>{$result['DISTRICT_NAME']}</option>";   
        }
    }
    echo json_encode(array("postcode"=>$result_district[0]['POSTCODE'],
                           "data"=>$data));
}
exit;
?>