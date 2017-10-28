<?php
    $sql_ad = "SELECT * FROM contact WHERE contact_id IN(4, 5)";
    $result_ad = $db->MySQL($sql_ad);
?>
<div class="container" style="padding:0px;">
    <nav class="navbar navbar-default">
            <div class="navbar-text pull-left">
                contact us : <?=$result_ad[1]['address']?> เบอร์โทร : <?=$result_ad[0]['tel']?>
            </div>
    </nav>
</div>