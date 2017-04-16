<section class="header-menu"> 
    <div class="container index">
        <nav class="navbar navbar-default">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" id="index"><strong>หน้าแรก</strong></a>
            <div class="navbar-collapse collapse">
                <?php
                if(empty($_SESSION['ADMIN_ID'])){
                ?>
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="store.php" class="store">สินค้า</a></li>
                        <li><a href="#promotion">โปรโมชัน</a></li>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">วิธีการ<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">วิธีการสั่งซื้อสินค้า</a>
                                </li>
                                <li>
                                    <a href="#">วิธีการชำระเงิน </a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#help">ช่วยเหลือ</a></li>
                        <li><a href="#contact">ติดต่อเรา</a></li>
                    </ul>
                <?php
                }else{
                ?>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="manage-product" class="dropdown-toggle" data-toggle="dropdown">จัดการ<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="manage_product.php">จัดการสินค้า</a>
                                </li>
                                <li>
                                    <a href="manage_product_detail.php">จัดการรายละเอียดของสินค้า</a>
                                </li>
                                <li><a href="advertise_manage.php">จัดการโฆษณา</a></li>
                                <li><a href="#advertive">จัดการข้อมูลต่างๆ</a></li>
                            </ul>
                        </li>
                        
                        <!--<li><a href="manage_product.php" class="manage-product">จัดการสินค้า</a></li>-->
                        <!--<li><a href="manage_member.php" class="manage-member">ข้อมูลสมาชิก</a></li>-->
                        <li><a href="#order">การสั่งซื้อสินค้า <span class="badge">10+</span></a></li>
                        
                        <!--<li class="dropdown">
                            <a href="#howto" class="dropdown-toggle" data-toggle="dropdown"><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">ตรวจสอบการสั่งซื้อสินค้า</a>
                                </li>
                                <li>
                                    <a href="#">แก้ไขใบเสร็จ</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#help">ช่วยเหลือ</a></li>
                        <li><a href="#contact">ติดต่อเรา</a></li>-->
                    </ul>
                <?php
                }
                ?>
                
                
                <?php
                if(!empty($_SESSION['MEMBER_ID'])){
                    ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            ยินดีต้อนรับ <?=$_SESSION['FULLNAME']?>
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#setting">แก้ไขข้อมูลส่วนตัว</a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#favorite">รายการชื่นชอบ</a>
                                </li>
                                <li>
                                    <a href="php/member_logout.php">ออกจากระบบ</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php
                }else if(!empty($_SESSION['ADMIN_ID'])){
                    ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#message">ข้อความ <span class="badge">100+</span></a></li>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            ยินดีต้อนรับ <?=$_SESSION['FULLNAME']?>
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#edit">แก้ไขข้อมูลส่วนตัว</a>
                                </li>
                                <!--<li>
                                    <a href="#" data-toggle="modal" data-target="#add">เพิ่ม ADMIN</a>
                                </li>-->
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#setting">ตั้งค่าอื่นๆ</a>
                                </li>
                                <li>
                                    <a href="php/member_logout.php">ออกจากระบบ</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php
                }else{
                ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">เข้าสู่ระบบ/สมัครสมาชิก
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#signin" data-toggle="modal" data-target="#signin">เข้าสู่ระบบ</a>
                                </li>
                                <li>
                                    <a href="#signup" data-toggle="modal" data-target="#signup">สมัครสมาชิก</a>
                                </li>
                                <li>
                                    <a href="#forget" data-toggle="modal" data-target="#forget">ลืมรหัสผ่าน</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </nav>
    </div>
</section>