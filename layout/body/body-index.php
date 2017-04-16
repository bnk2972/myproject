<?php
$sql = "SELECT * FROM advertise WHERE advertiseID = 1";
$result = $db->MySQL($sql);
?>
<div class="container">
    <div class="jumbotron" style="background-image: url('img/advertise/<?=(!empty($result[0]['imageNAME']) ? $result[0]['imageNAME']:'/no_img/No_Banner.png')?>');">
        <div id="advertise" style="visibility:hidden">
            <span style="font-size:25px;"><?=(!empty($result[0]['advertise_title']) ? $result[0]['advertise_title']:'ลงโฆษณา')?></span>
            <p style="font-size:15px;"><?=(!empty($result[0]['advertise_detail']) ? $result[0]['advertise_subdetail']:'รายละเอียดย่อยๆ')?></p>
        </div>
        <button onclick="window.location.href='advertise.php'" type="button" id="read-advertise" style="visibility:hidden; clear: both; float: right; display: block; margin-top:3px;" class="btn btn-default">
            อ่านต่อ <span class="glyphicon glyphicon-book
                " style="color:rgb(34,34,34)"></span>
        </button>
    </div>
</div>