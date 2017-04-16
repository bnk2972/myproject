<?php
if(empty($_SESSION['MEMBER_ID'])){
    $event_click = "pleaseLogin()"; 
}else{
    $event_click = ""; 
}
?>
<div id="detail-cart-product" class="modal fade modal-small" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">รายละเอียดสินค้า</h3>
            </div>
            <div class="modal-body">
                <form id="add-cart" method="post" action="">
                    
                </form>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" onclick="<?=$event_click?>" class="btn btn-primary" role="button">หยิบใส่ตะกร้า</a> 
                <button type="button" data-dismiss="modal" class="btn btn-danger">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("body").delegate(".sub-img","click",function(){
        var img = $(this).html();
        var link = $(this).data("link");
        $(".container-image a").html(img).attr("href",link);
    });
</script>