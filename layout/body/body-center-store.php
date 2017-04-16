<section class="sale">
    <div class="container">
        <nav class="navbar navbar-default">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="javascript:void(0)" style="background-color:rgb(231,231,231);" class="product-menu" onclick="getProduct(1,this)">สินค้าทั่วไป</a></li>
                    <li><a href="javascript:void(0)" class="product-menu" onclick="getProduct(2,this)">สินค้าใหม่</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <select class="form-control search-brand">
                                <option>--ประเภทการค้นหา--</option>
                                <option></option>
                                <option></option>
                                <option></option>
                        </select>
                    </li>
                    <li>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="ค้นหาชื่อสินค้า">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">ค้นหา</button>
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
<div class="container">
    <div class="product">
        <div class="product-topic left">
            <div class="topic">
                สินค้าทั่วไป
            </div>
        </div>
        <?php
            $sql_product_new = "SELECT p.*,
                                           pb.brandNAME,
                                        (SELECT imgNAME FROM product_image pi WHERE p.productID = pi.productID AND imgshow = 1) AS imgshow
                                FROM product p 
                                LEFT JOIN product_brand pb ON p.brandID = pb.brandID
                                ORDER BY p.productID DESC";
            $result_product_new = $db->MySQL($sql_product_new);
            $count = 0;
            $count_res = sizeof($result_product_new);
            if($count_res>0){
                $count_div = ceil($count_res/4);
                $j=0;
                for($i=0;$i<$count_div;$i++){
                    echo '<div class="row">';
                    $countdata = ($i+1)*4;
                    if($countdata>$count_res) $countdata = $count_res;
                    for($j;$j<$countdata;$j++){
                        if(empty($_SESSION['MEMBER_ID'])){
                           $event_click = "pleaseLogin()"; 
                        }else{
                           $event_click = ""; 
                        }
                        ?>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="img/img_product/<?=$result_product_new[$j]['imgshow']?>" style="height:134.5px;">
                                    <div class="caption">
                                        <h3>Printer : <?=$result_product_new[$j]['productNAME']?></h3>
                                        <?php
                                        if(!empty($result_product_new[$j]['create_date_new_product']) && strtotime($result_product_new[$j]['create_date_new_product'])>=strtotime('today UTC')){
                                            echo '<h4><span class="label label-primary">NEW</span></h4>';
                                        }
                                        ?>
                                        <p>ยี่ห้อ : <?=$result_product_new[$j]['brandNAME']?></p>
                                        <p style="text-align:right"><a href="javascript:void(0)" class="btn btn-primary" onclick="<?=$event_click?>" role="button">หยิบใส่ตะกร้า</a> <a href="javascript:void(0)" class="btn btn-default" onclick="getShowDetailProduct(<?=$result_product_new[$j]['productID']?>)" role="button">รายละเอียด</a></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    echo '</div>';
                }
            }
        ?>
    </div>
</div>
<script type="text/javascript">
    function getProduct(status,getThis){
        $(".product-menu").css("background-color","rgb(248,248,248)");
        getThis.style.backgroundColor = "rgb(231,231,231)";
        
        $.ajax({
            url:"ajax/getProduct.php",
            type:"post",
            data:{
                status:status
            },
            success:function(result){
                $(".product").html(result);
            }
        });
    }
</script>