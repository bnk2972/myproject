<?php
$sql = "SELECT * FROM product_brand";
$result_brand = $db->MySQL($sql);
$sql = "SELECT * FROM product_type";
$result_type = $db->MySQL($sql);
?>
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
                    <select class="form-control search-brand" id="findpro">
                            <option value="">--ประเภทการค้นหา--</option>
                            <option value="1">ค้นหาจากชื่อสินค้า</option>
                            <option value="2">ค้นหาจากยี่ห้อสินค้า</option>
                            <option value="3">ค้นหาจากประเภทสินค้า</option>
                    </select>
                </li>
                <li>
                    <div class="input-group">
                        <select name="brand" id="brand" class="form-control" style="display:none">
                            <option value="">--เลือกยี่ห้อ--</option>
                            <?php
                            foreach($result_brand as $res){
                            ?>
                                <option value="<?=$res['brandID']?>"><?=$res['brandNAME']?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <select name="type" id="type" class="form-control" style="display:none">
                            <option value="">--เลือกประเภทสินค้า--</option>
                            <?php
                            foreach($result_type as $res){
                            ?>
                                <option value="<?=$res['typeID']?>"><?=$res['typeNAME']?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <input type="text" disabled class="form-control" id="txtfind" placeholder="ค้นหาชื่อสินค้า">
                        <span class="input-group-btn">
                            <button disabled class="btn btn-default" id="btnfind" type="button">ค้นหา</button>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
</section>
<div class="container" style="min-height: 100%;">
    <div class="product-topic left">
        <div class="topic">
            สินค้า
        </div>
    </div>
    <?php
        $sql_product_new = "SELECT p.*,
                                       pb.brandNAME,
                                       pt.typeNAME,
                                    (SELECT imgNAME FROM product_image pi WHERE p.productID = pi.productID AND imgshow = 1) AS imgshow
                            FROM product p 
                            LEFT JOIN product_brand pb ON p.brandID = pb.brandID
                            LEFT JOIN product_type pt ON p.typeID = pt.typeID
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
                        $event_click = "getToCart(".$result_product_new[$j]['productID'].",'".$result_product_new[$j]['price']."')"; 
                    }
                    ?>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <img src="img/img_product/<?=$result_product_new[$j]['imgshow']?>" style="height:134.5px;">
                                <div class="caption">
                                    <h3>
                                        สินค้า : <?=$result_product_new[$j]['productNAME']?>
                                        <?php
                                        if(!empty($result_product_new[$j]['create_date_new_product']) && strtotime($result_product_new[$j]['create_date_new_product'])>=strtotime('today UTC')){
                                            echo '<span class="label label-primary" style="font-size: 10px;">NEW</span>';
                                        }
                                        ?>
                                    </h3>
                                   <p>
                                        ยี่ห้อ : <?=$result_product_new[$j]['brandNAME']?><br>
                                        ประเภท : <?=$result_product_new[$j]['typeNAME']?><br>
                                        ราคา : <?=$result_product_new[$j]['price']?> บาท
                                    </p>
                                    <p style="text-align:center"><a href="javascript:void(0)" class="btn btn-orange" onclick="<?=$event_click?>" role="button"><i class="fa fa-shopping-cart" aria-hidden="true"></i> หยิบใส่ตะกร้า</a> <a href="javascript:void(0)" class="btn btn-default" onclick="getShowDetailProduct(<?=$result_product_new[$j]['productID']?>)" role="button">รายละเอียด</a></p>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                echo '</div>';
            }
        }else{
            ?>
            <div class="row">
                <div class="col-md-12" style="text-align:center;">
                    ไม่มีสินค้า
                </div>
            </div>
            <?php
        }
    ?>
</div>
<script type="text/javascript">
function getProduct(status,getThis){
    if(getThis!== void(0)){
        $(".product-menu").css("background-color","rgb(248,248,248)");
        getThis.style.backgroundColor = "rgb(231,231,231)";
    }
    
    $.ajax({
        url:"ajax/getProduct.php",
        type:"post",
        data:{
            status:status,
            memberid:'<?=isset($_SESSION['MEMBER_ID']) ? $_SESSION['MEMBER_ID'] : ''?>'
        },
        success:function(result){
            $(".product").html(result);
        }
    });
}
$("#findpro").change(function(){
    if($(this).val() == ""){
        $("#txtfind,#btnfind").attr("disabled",true).show();
        $("#brand,#type").hide();
        getProduct(1);
    }else if($(this).val() == 1){
        $("#brand,#type").hide();
        $("#txtfind,#btnfind").removeAttr("disabled").show();
    }else if($(this).val() == 2){
        $("#brand").show();
        $("#txtfind,#btnfind,#type").hide();
    }else if($(this).val() == 3){
        $("#type").show();
        $("#txtfind,#btnfind,#brand").hide();
    }
});
$("#txtfind").keyup(function(){
    var txt = $(this).val();
    $.ajax({
        url:"ajax/getProduct.php",
        type:"post",
        data:{
            status:1,
            txtfind:txt
        },
        success:function(result){
            $(".product").html(result);
        }
    });
});
$("#brand").change(function(){
    var brand = $(this).val();
    $.ajax({
        url:"ajax/getProduct.php",
        type:"post",
        data:{
            status:1,
            brand:brand
        },
        success:function(result){
            $(".product").html(result);
        }
    });
});
$("#type").change(function(){
    var type = $(this).val();
    $.ajax({
        url:"ajax/getProduct.php",
        type:"post",
        data:{
            status:1,
            type:type
        },
        success:function(result){
            $(".product").html(result);
        }
    });
});

</script>