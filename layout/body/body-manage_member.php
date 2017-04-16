<div class="container">
    <div class="product" style="height:100%;">

        <div class="product-topic left">
            <div class="topic">
                ข้อมูลสมาชิก
                <div class="input-group manage-product">
                    <input type="text" class="form-control search-product text-box" placeholder="เลือกประเภทการค้นหา" disabled name="search-product">
                    <span class="input-group-btn">
                        <button class="btn btn-default search-product" type="button" disabled><span class="glyphicon glyphicon-search" aria-hidden="true"></span> ค้นหา</button>
                    </span>
                </div>
                <div class="input-group manage-product-s">
                    <select class="form-control" onchange="offOnSearch(this.value)">
                        <option value="">--ประเภทการค้นหา--</option>
                        <option value="1">ค้นหาจากชื่อ-นามสกุล สมาชิก</option>
                        <option value="2">ค้นหาจากรหัสสมาชิก</option>
                    </select>
                </div>
            </div>
            
        </div>
        <div class="report-manage-product">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>รหัสสินค้า</th>
                        <th>ยี่ห้อสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคา</th>
                        <th>สถานะ</th>
                        <th>แก้ไขข้อมูล</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="8">ไม่มีสินค้า</td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td><button class="btn btn-success">กำลังขาย</button></td>
                        <td><button class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>แก้ไข</button> <button class="btn btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>ลบ</button></td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td><button class="btn btn-danger" disabled>สินค้าหมด</button></td>
                        <td><button class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>แก้ไข</button> <button class="btn btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>ลบ</button></td>
                    </tr>
                    <tr>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                        <td>...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    function offOnSearch(status){
        if(status==1){
            $(".search-product").removeAttr("disabled");
            $(".form-control.search-product.text-box").attr("placeholder","กรอกชื่อ-นามสกุล สมาชิก");
        }else if(status==2){
            $(".search-product").removeAttr("disabled");
            $(".form-control.search-product.text-box").attr("placeholder","กรอกรหัสสมาชิก");
        }else{
            $(".search-product").attr("disabled",true);
            $(".form-control.search-product.text-box").attr("placeholder","เลือกประเภทการค้นหา");
        }
    }
</script>
<style>
    td,th{
        text-align: center;
    }
</style>