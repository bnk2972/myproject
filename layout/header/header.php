<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<META HTTP-EQUIV="EXPIRES" CONTENT="Mon, 02 May 2015 21:00:00 GMT">

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<!--- Javascript -->
<script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.mask/1.14.9/jquery.mask.min.js"></script>
<script src="/js/sweetalert-master/dist/sweetalert.min.js"></script>
<!--- CSS -->
<link rel="stylesheet" href="/css/bootstrap.css">
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> -->
<!-- <link href="https://fonts.googleapis.com/css?family=Pridi" rel="stylesheet">  -->
<!-- <link href="https://fonts.googleapis.com/css?family=Trirong" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Maitree" rel="stylesheet">
<link href="/js/sweetalert-master/dist/sweetalert.css" rel="stylesheet">

<script type="text/javascript">
    $(document).ready(function(){
        $('.datepicker').datepicker({
            dateFormat: 'dd/mm/yy',
            changeMonth: true,
            changeYear: true
        }).change(function(){
            $(this).css("border-bottom","1px solid #ccc")
            $(".birthdate-signup").hide()
        })
        
        $("#phone").mask('000-000-0000')
        $("#code").mask('0-0000-00000-00-0')
        
        if(sessionStorage.getItem("loginSuccess")==1){
            swal("ยินดีต้อนรับ", "คุณ "+"<?php if(isset($_SESSION['FULLNAME'])) echo $_SESSION['FULLNAME']; ?>", "success")
            sessionStorage.clear()
        }else if(sessionStorage.getItem("loginSuccess")==2){
            swal("ยินดีต้อนรับ ADMIN", "คุณ "+"<?php if(isset($_SESSION['FULLNAME'])) echo $_SESSION['FULLNAME']; ?>", "success")
            sessionStorage.clear()
        }
        
        $('textarea').keypress(function(event) {
           if(event.which == 13) {
               event.preventDefault();
               var s = $(this).val();
               $(this).val(s+"\n");
           }
        });
        
        countCart();
        /*$("body").delegate("a","click",function(){
            var href = $(this).attr("href");
            if(!href.match(/#signin|#signup|#forget/g) && href.match(/#/g)){
                swal("ขออภัย กำลังปรับปรุง","","warning");
            }
        })*/
        
    });
    
    function pleaseLogin(){
        swal({
          title: "กรุณาเข้าสู่ระบบ",
          type: "error",
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ตกลง"
        });
    }
    
    function getShowDetailProduct(id){
        $.ajax({
            url:"./ajax/getDetailProductCart.php",
            type:"post",
            data:{
                productid:id
            },
            success:function(res){
                $("#add-cart").html(res);
                $("#detail-cart-product").modal();
            }
        });
    }
    
    function countCart(){
        $.ajax({
            url:"./ajax/getCountCart.php",
            type:"post",
            data:{
                memberid:'<?=(isset($_SESSION['MEMBER_ID']) ? $_SESSION['MEMBER_ID']:"")?>'
            },
            success:function(res){
                $("#count_cart").html(res);
            }
        });
    }
    
    function getToCart(id,price){
        $.ajax({
            url:"./ajax/getToCart.php",
            data:{
               productid:id,
               price:price,
               memberid:'<?=(isset($_SESSION['MEMBER_ID']) ? $_SESSION['MEMBER_ID']:"")?>'
            },
            type:"post",
            success:function(res){
                if(res == true){
                    swal({
                      title: "บันทึกสินค้าลงตระกร้า",
                      type: "success",
                      confirmButtonColor: "#4fe24a",
                      confirmButtonText: "ตกลง"
                    });
                    countCart();
                }else if(res == false){
                    swal({
                      title: "มีสินค้าในตระกร้าแล้ว",
                      type: "error",
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ตกลง"
                    });
                    countCart();
                }
            }
        });
    }
    
    function faverite(id){
        $.ajax({
            url:"./ajax/getFaverite.php",
            data:{
               productid:id,
               memberid:'<?=(isset($_SESSION['MEMBER_ID']) ? $_SESSION['MEMBER_ID']:"")?>'
            },
            type:"post",
            success:function(res){
                if(res == true){
                    swal({
                      title: "นำสินค้าลงรายการชื่นชอบแล้ว",
                      type: "success",
                      confirmButtonColor: "#4fe24a",
                      confirmButtonText: "ตกลง"
                    });
                    countCart();
                }else if(res == false){
                    swal({
                      title: "นำสินค้าออกจากรายการชื่นชอบแล้ว",
                      type: "error",
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "ตกลง"
                    });
                }
            }
        });
    }
</script>
