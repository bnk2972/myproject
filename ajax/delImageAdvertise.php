<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
$sql = "select imageNAME from advertise where advertiseID = 1";
$result = $db->MySql($sql);
if(file_exists("../img/advertise/".$result[0]['imageNAME'])) unlink("../img/advertise/".$result[0]['imageNAME']);
$sql = "UPDATE advertise SET imageNAME = NULL WHERE advertiseID = 1";
if($db->ExecuteSQL($sql,true)){
    echo true;
}
exit;
?>