<section class="sale">
<div class="container">
    <div class="product">
        <div class="product-topic left">
            <div class="topic">
                แจ้งซ่อมสินค้า <span style="font-size:15px; color:red;">(กรุณากรอกข้อมูลการแจ้งซ่อมสินค้า)<span>
            </div>
        </div>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6" style="padding-left:10%;">
                    <div class="form-group">
                        <label for="usr">ชื่อ:</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
                <div class="col-md-6" style="padding-right:10%;">
                    <div class="form-group">
                        <label for="usr">นามสกุล:</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="padding-left:10%;">
                    <div class="form-group">
                        <label for="usr">เบอร์ติดต่อ(มือถือ):</label>
                        <input type="text" class="form-control" id="phone">
                    </div>
                </div>
                <div class="col-md-6" style="padding-right:10%;">
                    <div class="form-group">
                        <label for="usr">อีเมล์:</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="padding-left:10%; padding-right:10%;">
                    <div class="form-group">
                        <label for="usr">ที่อยู่ของลูกค้า:</label>
                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="padding-left:10%;">
                    <div class="form-group">
                        <label for="usr">รายการสินค้า:</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
                <div class="col-md-6" style="padding-right:10%;">
                    <div class="form-group">
                        <label for="usr">ยี่ห้อ:</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="padding-left:10%;">
                    <div class="form-group">
                        <label for="usr">หมายเลขเครื่อง:</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
                <div class="col-md-6" style="padding-right:10%;">
                    <div class="form-group">
                        <label for="usr">อาการเสีย:</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="padding-left:10%; padding-right:10%;">
                    <div class="form-group">
                        <label for="usr">อายุการใช้งาน:</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="padding-left:10%; padding-right:10%;">
                    <div class="form-group">
                        <label for="usr">เวลาที่ลูกค้าสะดวกให้ติดต่อกลับ:</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="padding-left:10%; padding-right:10%;">
                    <div class="form-group">
                        <label for="usr"><input type="radio" name="place" value="1" checked> ส่งผ่านร้าน iFix-Studio</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="padding-left:10%; padding-right:10%;">
                    <div class="form-group">
                        <label for="usr"><input type="radio" name="place" value="2"> ส่งผ่านไปรษณีย์ไทย(EMS):</label>
                        <input type="text" class="form-control" id="ems-key" placeholder="กรุณากรอกรหัส EMS" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align:center; padding-bottom:10px;">
                    <button type="button" class="btn btn-primary">ยืนยันการแจ้งซ่อม</button>
                </div>
            </div>
        </form>
    </div>
</div>
</section>
<style>
    .row{
        padding:0px;
    }
    form{
        margin:0px;
    }
</style>
<script>
    $('[name=place]').change(function(){
        if($(this).val() == 2)
            $("#ems-key").prop('disabled', false);
        else
            $("#ems-key").prop('disabled', true);
    })
</script>
