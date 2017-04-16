<meta http-equiv="content-type" content="text/html; charset=utf-8">
<!--- Javascript --->
<script type="text/javascript" src="../../work/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../../work/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.mask/1.14.9/jquery.mask.min.js"></script>
<script src="../../work/js/sweetalert-master/dist/sweetalert.min.js"></script>
<!--- CSS --->
<link rel="stylesheet" href="../../work/css/bootstrap.css">
<link rel="stylesheet" href="../../work/css/style.css">
<link rel="stylesheet" href="../../work/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
<link href="../../work/js/sweetalert-master/dist/sweetalert.css" rel="stylesheet">

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
            url:"ajax/getDetailProductCart.php",
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
</script>
