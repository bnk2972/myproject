<div id="trackcode" class="modal fade modal-small" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">หมายเลขจัดส่งพัสดุ</h3>
                <h3 style="margin:0px;" id="printername"></h3>
            </div>
            <div class="modal-body" style="text-align:center; font-size:20px;">
            </div>
            <div class="modal-footer" style="text-align:center;">
                <button class="btn btn-primary" class="close" data-dismiss="modal" type="button">ตกลง</button>
            </div>
        </div>
    </div>
</div>
<script>
function trackcode(code){
    $("#trackcode .modal-body").html(code)
    $("#trackcode").modal();
}
</script>