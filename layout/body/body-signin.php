<div id="signin" class="modal fade modal-small" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">เข้าสู่ระบบ</h3>
            </div>
            <div class="modal-body">
                <form id="get-signin" method="post" action="php/member_login.php">
                    <table class="modal-table">
                        <tr>
                            <td class="modal-td">อีเมล์&nbsp;:&nbsp;</td>
                            <td><input type="email" id="email" name="email" placeholder="กรุณาใส่อีเมล์"></td>
                        </tr>
                        <tr class="email-signin" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="email-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">รหัสผ่าน&nbsp;:&nbsp;</td>
                            <td><input type="password" id="pass" name="pass" placeholder="กรุณาใส่รหัสผ่าน"></td>
                        </tr>
                        <tr class="pass-signin" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="pass-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr class="warning-login" style="display:none">
                            <td colspan="2" style="padding-top:0px; padding-bottom:0px;">
                                <div class="alert alert-danger">
                                <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>-->
                                อีเมล์หรือรหัสผ่านไม่ถูกต้อง
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="get_login()" class="btn btn-primary">เข้าสู่ระบบ</button>
            </div>
        </div>
    </div>
</div>

<div id="signup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><strong>สมัครสมาชิก</strong></h3>
            </div>
            <div class="modal-body">
                <form id="get-signup" method="post" action="php/member_register.php">
                    <table class="modal-table">
                        <tr>
                            <td class="modal-td">อีเมล์ : </td>
                            <td>
                                <input type="email" onchange="check_mail(this.value)" onkeyup="check_mail(this.value)" name="email" id="email" placeholder="exsample@gmail.com">
                            </td>
                        </tr>
                        <tr class="email-signup" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="email-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">รหัสผ่าน : </td>
                            <td><input type="password" name="pass" id="pass" placeholder="exsample1234"></td>
                        </tr>
                        <tr class="pass-signup" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="pass-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">ยืนยันรหัสผ่าน : </td>
                            <td><input type="password" name="re-pass" id="re-pass" placeholder="exsample1234"></td>
                        </tr>
                        <tr class="repass-signup" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="repass-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">ชื่อ : </td>
                            <td><input type="text" name="name" id="name" placeholder="กรุณากรอกชื่อ"></td>
                        </tr>
                        <tr class="name-signup" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="name-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">นามสกุล : </td>
                            <td><input type="text" name="surname" id="surname" placeholder="กรุณากรอกนามสกุล"></td>
                        </tr>
                        <tr class="surname-signup" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="surname-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">วันเกิด : </td>
                            <td><input type="text" name="birthdate" id="birthdate" class="datepicker" placeholder="ใส่วันเกิด" readonly></td>
                        </tr>
                        <tr class="birthdate-signup" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="birthdate-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">เพศ : </td>
                            <td>
                                <input type="radio" value="M" checked style="clear: none; width:20px;" name="gender">ชาย
                                <input type="radio" value="F" style="clear: none; width:20px;" name="gender">หญิง
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">บัตรประชาชน : </td>
                            <td>
                                <input type="text" name="code" id="code" placeholder="กรุณาระบุเลขบัตรประชาชน">
                            </td>
                        </tr>
                        <tr class="code-signup" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="code-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">จังหวัด : </td>
                            <td>
                                <select class="form-control" name="province" id="province" onchange="get_aumphur(this.value)">
                                    <option value="">--กรุณาระบุจังหวัด--</option>
                                    <?php
                                    $sql_province = "SELECT * FROM province p ORDER BY p.province_name ASC";
                                    $result_province = $db->MySQL($sql_province);
                                    foreach($result_province as $result){
                                    ?>
                                    <option value="<?=$result['PROVINCE_ID']?>"><?=$result['PROVINCE_NAME']?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr class="province-signup" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="province-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">อำเภอ : </td>
                            <td>
                                <select class="form-control" name="amphur" id="amphur" onchange="get_district(this.value,$('#province').val())">
                                    <option value="">--กรุณาระบุอำเภอ--</option>
                                </select>                        </td>
                        </tr>
                        <tr class="amphur-signup" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="amphur-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">ตำบล :</td>
                            <td>
                                <select class="form-control" name="district" id="district">
                                    <option value="">--กรุณาระบุตำบล--</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="district-signup" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="district-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">รหัสไปรษณี : </td>
                            <td>
                                <input type="text" readonly name="postcode" id="postcode" placeholder="กรุณาระบุรหัสไปรษณี">
                            </td>
                        </tr>
                        <tr class="postcode-signup" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="postcode-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">ที่อยู่ : </td>
                            <td>
                                <textarea class="form-control" name="address"></textarea>
                            </td>
                        </tr>
                        <tr class="address-signup" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="address-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal-td">เบอร์โทร : </td>
                            <td>
                                <input type="text" name="phone" id="phone" placeholder="กรุณาระบุเบอร์โทร">
                            </td>
                        </tr>
                        <tr class="phone-signup" style="display:none">
                            <td></td>
                            <td style="padding-top:0px; padding-bottom:0px;">
                                <span class="phone-prefect" style="font-size:10px; color:red;"></span>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="get_signup()">สมัครสมาชิก</button>
            </div>
        </div>
    </div>
</div>

<div id="forget" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ลืมรหัสผ่าน</h4>
            </div>
            <div class="modal-body">
                <table class="modal-table">
                    <tr>
                        <td class="modal-td">อีเมล์ : </td>
                        <td><input type="email" name="email" id="email" placeholder="exsample@gmail.com"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">ตกลง</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../work/js/md5.js"></script>
<script type="text/javascript" src="../../work/js/member-register.js"></script>