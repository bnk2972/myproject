<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">สินค้าในตะกร้า</h3>
    </div>
    <div class="panel-body basket" onclick="window.location.href='mycart.php'">
    <span id="count_cart"></span> รายการ <i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i>
    </div>
    <div class="panel-heading center2" onclick="window.location.href='order.php'">
        <h3 class="panel-title">รายการสั่งซื้อ</h3>
    </div>
    <!--<div class="panel-footer">
        footer
    </div>-->
</div>
<style>
    .panel.panel-primary{
        position: fixed;
        top: 50%;
        margin-top: -100px;
        right:0px;
        border-radius: 0px;
        border-color: transparent;
        border-width: 0px;
        background-color: transparent;
        width: 110px;
        z-index: 100;
    }
    .panel-primary > .panel-heading {
        color: #fff;
        background-color: #e74c3c;
        border-color: #e74c3c;
    }
    .panel-heading{
        width: 110px;
        border-top-left-radius: 3px;
        border-top-right-radius: 0px;
        float:right;
        display: block;
        padding:10px 0px 10px 10px;
    }
    .panel-body.basket{
        width: 110px;
        border: 1px solid #e74c3c;
        cursor: pointer;
        background-color: white;
        float:right;
        display: block;
        padding:10px 0px 10px 10px;
    }
    .panel-body.basket:hover{
        width: 130px;
        z-index: 100;
    }
    .panel-heading.center1{
        cursor: pointer;
        border-radius: 0px;
        background-color: #f7d753;
        border: 1px solid #f7d753;
        width: 110px;
        display: block;
        z-index: 100;
        padding:10px 0px 10px 10px;
    }
    .panel-heading.center1:hover{
        width: 130px;
        z-index: 100;
    }
    .panel-heading.center2{
        width: 110px;
        cursor: pointer;
        background-color: #51c62e;
        border: 1px solid #51c62e;
        border-radius: 0px;
        float:right;
        display: block;
        z-index: 100;
        padding:10px 0px 10px 10px;
    }
    .panel-heading.center2:hover{
        width: 130px;
        z-index: 100;
    }
    .fa.fa-shopping-cart{
        color: rgb(51,122,183);
    }
</style>