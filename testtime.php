<?php
    echo strtotime('today UTC').'<br>asd';
    echo strtotime('+1 month',strtotime('today UTC')).'<br>';
    echo date('Y-m-d',strtotime('today UTC'));
    echo date('Y-m-d',strtotime('+1 month',strtotime('today UTC')));
?>