<section class="header-menu"> 
    <div class="container index">
        <nav class="navbar navbar-default main">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="index.php" id="index"><strong><i class="fa fa-home" aria-hidden="true"></i>
 หน้าแรก</strong></a>
                </li>
                <?php
                if(empty($_SESSION['ADMIN_ID'])){
                ?>
                    
                        <?php
                        if(!empty($_SESSION['MEMBER_ID'])){
                            ?>
                            <li><a href="mycart.php" class="mycart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
 สินค้าในตะกร้า <span class="badge" style="background-color:white; color:#7C7979;" id="count_cart"></span></a></li>
                            <li><a href="order.php" class="order"><i class="fa fa-inbox" aria-hidden="true"></i> รายการสั่งซื้อ</a></li>
                            <?php
                        }
                        ?>
                        <li><a href="howtopay.php" class="howto"><i class="fa fa-credit-card" aria-hidden="true"></i> วิธีการชำระเงิน</a></li>
                        <!-- <li><a href="contact.php" class="contact">ติดต่อเรา</a></li> -->
                <?php
                }else{
                ?>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="manage-product" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
 จัดการ<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="manage_product.php">จัดการสินค้า</a>
                                </li>
                                <li><a href="manage_product_type.php">จัดการประเภทสินค้า</a></li>
                                <li><a href="manage_product_detail.php">จัดการยี่ห้อสินค้า</a></li>
                                <li><a href="advertise_manage.php">จัดการแบนเนอร์ร้านค้า</a></li>
                                <li><a href="manage_howtopay.php">จัดการวิธีการสั่งซื้อ</a></li>
                            </ul>
                        </li>
                        
                        <!--<li><a href="manage_product.php" class="manage-product">จัดการสินค้า</a></li>-->
                        <!--<li><a href="manage_member.php" class="manage-member">ข้อมูลสมาชิก</a></li>-->
                        <li><a href="manage_order.php" class="order_member"><i class="fa fa-inbox" aria-hidden="true"></i> ใบสั่งซื้อลูกค้า 
                            <?php
                                $SQL = "SELECT COUNT(*) AS count_order FROM `order` WHERE statusID = 2";
                                $RES = $db->MySQL($SQL);
                                if(sizeof($RES)>0){
                                    $count = '';
                                    if($RES[0]['count_order']>10) $count = '10+';
                                    else $count = $RES[0]['count_order'];
                                    ?>
                                    <span class="badge" style="background-color:white; color:#7C7979;"><?=$count?></span>
                                    <?php
                                }
                            ?></a></li>
                        
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
                    
                <?php
                }
                ?>
                </ul>
                <?php
                $sql = 'SELECT * FROM phone.contact ORDER BY contact_id ASC';
                $result = $RES = $db->MySQL($sql);
                if(sizeof($result)>0){
                ?>
                    <ul class="nav navbar-nav contact">
                        <?php 
                        if($result[0]['contact_id'] == 1 && isset($result[0]['url'])) {
                        ?>
                        <li><a href="<?=$result[0]['url']?>" target="_blank" style="padding:0px; margin-left: 10px; margin-top:10px;" class="s_icon s_fb_fanpage"></a></li>
                        <?php
                        }
                        if($result[1]['contact_id'] == 2 && !empty($result[1]['url'])) {
                        ?>
                        <li><a href="<?=$result[1]['url']?>" target="_blank" style="padding:0px; margin-top:10px;" class="s_gplus s_icon"></a></li>
                        <?php
                        }
                        if($result[2]['contact_id'] == 3 && !empty($result[2]['url'])) {
                        ?>
                        <li><a href="#" style="padding:0px; margin-top:10px;" class="s_instagram s_icon"></a></li>
                        <?php
                        }
                        ?>
<!--                        <li><a href="#" style="padding:0px; margin-top:10px;" class="s_line_talk s_icon"></a></li>-->
                    </ul>
                <?php
                }
                
                if(!empty($_SESSION['MEMBER_ID'])){
                    ?>
                    <ul class="nav navbar-nav navbar-right main">
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            ยินดีต้อนรับ <?=$_SESSION['FULLNAME']?>
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="profile.php">แก้ไขข้อมูลส่วนตัว</a>
                                </li>
                                <!-- <li>
                                    <a href="faverite.php">รายการชื่นชอบ</a>
                                </li> -->
                                <li>
                                    <a href="php/member_logout.php">ออกจากระบบ</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                <?php
                }else if(!empty($_SESSION['ADMIN_ID'])){
                    ?>
                    <ul class="nav navbar-nav navbar-right main">
                        <!--<li><a href="#message">ข้อความ <span class="badge">100+</span></a></li>-->
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            ยินดีต้อนรับ <?=$_SESSION['FULLNAME']?>
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="profile_admin.php">แก้ไขข้อมูลส่วนตัว</a>
                                </li>
                                <li>
                                    <a href="contact_admin.php">ตั้งค่าอื่นๆ</a>
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
                    <ul class="nav navbar-nav navbar-right main">
                        <li>
                            <a href="#signup" data-toggle="modal" data-target="#signup"><i class="fa fa-user" aria-hidden="true"></i>
 เข้าสู่ระบบ / สมัครสมาชิก</a>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </nav>
    </div>
</section>