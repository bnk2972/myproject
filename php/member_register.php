<?php
session_start();
include "../db/connection_db.php";
$db = new ConnectDatabase();
$create_date_account = date("d/m/Y H:i:s");
$mycard = preg_replace("/-/","",$_POST['code']);
$sql_signup = "INSERT INTO member(email,
                                        password,
                                        name,
                                        surname,
                                        idcard,
                                        address,
                                        create_date_account,
                                        statusID,
                                        phone) ";
$sql_signup.= "VALUES('{$_POST['email']}',
                      '".md5($_POST['pass'])."',
                      '{$_POST['name']}',
                      '{$_POST['surname']}',
                      '{$mycard}',
                      '{$_POST['address']}',
                      STR_TO_DATE('{$create_date_account}','%d/%m/%Y %H:%i:%s'),
                      1,
                      '{$_POST['phone']}')";
if($result = $db->ExecuteSQL($sql_signup)){
    $_SESSION['MEMBER_ID'] = $result;
    $_SESSION['EMAIL'] = $_POST['email'];
    $_SESSION['FULLNAME'] = $_POST['name']." ".$_POST['surname'];
    ?>
    <script type="text/javascript">
        localStorage.setItem("loginSuccess",1)
    </script>
    <META HTTP-EQUIV="Refresh" CONTENT="0;URL=../index.php">
    <?php
}
?>