<?php
include "../db/connection_db.php";
$db = new ConnectDatabase();
function checkPID($pid) {
   if(strlen($pid) != 13) return false;
      for($i=0, $sum=0; $i<12;$i++)
      $sum += (int)($pid{$i})*(13-$i);
      if((11-($sum%11))%10 == (int)($pid{12}))
      return true;
   return false;
}

if(!empty($_POST['mycode'])){
    $check = checkPID($_POST['mycode']);
    if($check==true){
        $sql_idcard = "SELECT * 
                       FROM member m 
                       WHERE m.idcard = {$_POST['mycode']}";
        $result_idcard = $db->MySQL($sql_idcard);
        if(sizeof($result_idcard)>0){
            echo "S";
        }else{
            echo "T";
        }
    }else{
        echo "F";
    }
}
exit;
?>