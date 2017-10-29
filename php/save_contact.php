<?php
session_start();
include "../layout/header/header.php";
include "../db/connection_db.php";
$db = new ConnectDatabase();
$facebook = isset($_POST['facebook']) ? $_POST['facebook']:"";
$google = isset($_POST['google']) ? $_POST['google']:"";
$intragram = isset($_POST['intragram']) ? $_POST['intragram']:"";
$phone = isset($_POST['phone']) ? $_POST['phone']:"";
$address = isset($_POST['address']) ? $_POST['address']:"";
$update = "UPDATE contact SET url = '{$facebook}' WHERE contact_id = 1";
$db->ExecuteSQL($update,true);
$update = "UPDATE contact SET url = '{$google}' WHERE contact_id = 2";
$db->ExecuteSQL($update,true);
$update = "UPDATE contact SET url = '{$intragram}' WHERE contact_id = 3";
$db->ExecuteSQL($update,true);
$update = "UPDATE contact SET tel = '{$phone}' WHERE contact_id = 4";
$db->ExecuteSQL($update,true);
$update = "UPDATE contact SET address = '{$address}' WHERE contact_id = 5";
$db->ExecuteSQL($update,true);
?>
<script>
    window.onload = function(){
        swal({
          title: "บันทึกข้อมูลสำเร็จ",
          type: "success",
          confirmButtonColor: "#3eef6e",
          confirmButtonText: "ตกลง"
        },
        function(){
            window.location.href="/contact_admin.php";
        });
    }
</script>
<?php
exit;
?>