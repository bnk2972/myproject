<div class="container">
    <div class="product">
        <div class="product-topic">
            <div class="topic">
                สินค้าใหม่ มาแรง
            </div>
        </div>
       
        <div class="row new-product">
            <?php
                $sql_product_new = "SELECT p.*,
                                           pb.brandNAME,
                                        (SELECT imgNAME FROM product_image pi WHERE p.productID = pi.productID AND imgshow = 1) AS imgshow
                                    FROM product p 
                                    LEFT JOIN product_brand pb 
                                    ON p.brandID = pb.brandID
                                    WHERE p.create_date_new_product >= CURDATE() 
                                    ORDER BY p.create_date_new_product DESC LIMIT 0,6";
                $result_product_new = $db->MySQL($sql_product_new);
                if(sizeof($result_product_new)>0){
                    foreach($result_product_new as $res){
                        if(empty($_SESSION['MEMBER_ID'])){
                           $event_click = "pleaseLogin()"; 
                        }else{
                           $event_click = ""; 
                        }
                        ?>
                        <div class="col-md-2">
                            <div class="thumbnail">
                                <img src="img/img_product/<?=$res['imgshow']?>" width="160px"  style="height:80px;">
                                <div class="caption">
                                    <h5>Printer : <?=$res['productNAME']?></h5>
                                    <h6><span class="label label-primary">NEW</span></h6>
                                    <p>ยี่ห้อ : <?=$res['brandNAME']?></p>
                                    <p style="text-align:right"><a href="javascript:void(0)" class="btn btn-primary" onclick="<?=$event_click?>" role="button"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a> <a href="javascript:void(0)" onclick="getShowDetailProduct(<?=$res['productID']?>)" class="btn btn-default" role="button"><i class="fa fa-search" aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>

        <div class="product-topic">
            <div class="topic">
                สินค้าขายดี
            </div>
        </div>
        <div class="row hot-product">
             <?php
                $sql_product_new = "SELECT p.*,
                                           pb.brandNAME,
                                        (SELECT imgNAME FROM product_image pi WHERE p.productID = pi.productID AND imgshow = 1) AS imgshow
                                    FROM product p 
                                    LEFT JOIN product_brand pb ON p.brandID = pb.brandID
                                    ORDER BY p.buy_amount DESC LIMIT 0,6";
                $result_product_new = $db->MySQL($sql_product_new);
                if(sizeof($result_product_new)>0){
                    foreach($result_product_new as $res){
                        if(empty($_SESSION['MEMBER_ID'])){
                           $event_click = "pleaseLogin()"; 
                        }else{
                           $event_click = ""; 
                        }
                        ?>
                        <div class="col-sm-6 col-md-2">
                            <div class="thumbnail">
                                <img src="img/img_product/<?=$res['imgshow']?>" style="height:80px;">
                                <div class="caption">
                                    <h5>Printer : <?=$res['productNAME']?></h5>
                                    <h6><span class="label label-danger">HOT</span></h6>            <p>ยี่ห้อ : <?=$res['brandNAME']?></p>
                                    <p style="text-align:right"><a onclick="<?=$event_click?>" href="javascript:void(0)" class="btn btn-primary" role="button"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a> <a href="javascript:void(0)" onclick="getShowDetailProduct(<?=$res['productID']?>)" class="btn btn-default" role="button"><i class="fa fa-search" aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>

        <div class="product-topic">
            <div class="topic">
                สินค้าแนะนำ
            </div>
        </div>
        <div class="row">
            <?php
                $sql_product_new = "SELECT p.*,
                                           pb.brandNAME,
                                        (SELECT imgNAME FROM product_image pi WHERE p.productID = pi.productID AND imgshow = 1) AS imgshow
                                    FROM product p 
                                    LEFT JOIN product_brand pb ON p.brandID = pb.brandID
                                    ORDER BY RAND() LIMIT 0,4";
                $result_product_new = $db->MySQL($sql_product_new);
                if(sizeof($result_product_new)>0){
                    foreach($result_product_new as $res){
                        if(empty($_SESSION['MEMBER_ID'])){
                           $event_click = "pleaseLogin()"; 
                        }else{
                           $event_click = ""; 
                        }
                        ?>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <img src="img/img_product/<?=$res['imgshow']?>" style="height:134.5px;">
                                <div class="caption">
                                    <h3>Printer : <?=$res['productNAME']?></h3>
                                    <p>ยี่ห้อ : <?=$res['brandNAME']?></p>
                                    <p style="text-align:right"><a href="javascript:void(0)" onclick="<?=$event_click?>" class="btn btn-primary" role="button">หยิบใส่ตะกร้า</a> <a href="javascript:void(0)" onclick="getShowDetailProduct(<?=$res['productID']?>)" class="btn btn-default" role="button">รายละเอียด</a></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</div>
