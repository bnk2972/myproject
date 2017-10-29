<?php
$sql = "SELECT * FROM advertise WHERE advertiseID = 1";
$result = $db->MySQL($sql);
?>
<div class="container">
    <div class="jumbotron" style="background-image: url('img/advertise/<?=(!empty($result[0]['imageNAME']) ? $result[0]['imageNAME']:'/no_img/No_Banner.png')?>');">
    </div>
</div>