<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets\img\favicon.png">
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\plugin.css">
    <link rel="stylesheet" href="assets\css\bundle.css">
    <link rel="stylesheet" href="assets\css\style.css">
    <link rel="stylesheet" href="assets\css\responsive.css">
    <script src="assets\js\vendor\modernizr-2.8.3.min.js"></script>
    </head>
    <body>
            <!-- Add your site or application content here -->
            <!--pos page start-->
<div class="pos_page">
    <div class="container">  
                   <!--pos page inner-->
                    <div class="pos_page_inner">  
                       <!--header area -->
                       <?php include_once 'header.php' ?>
                        <!--header end -->
                         <!--breadcrumbs area start-->
                        <div class="breadcrumbs_area">
                            <div class="row">
                                <div class="col-12">
                                    <div class="breadcrumb_content">
                                        <ul>
                                            <li><a href="index.php">TRANG CHỦ</a></li>
                                            <li><i class="fa fa-angle-right"></i></li>
                                            <li>ĐĂNG NHẬP</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs area end-->

                         <!--shopping cart area start -->
                        <div class="shopping_cart_area">
                            <form action="#"> 
                                    
                                     <!--coupon code area start-->
                                    <div class="coupon_area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6" style="margin-left:300px;margin-right:300px;">
                                                <div class="coupon_code">
                                                    <h3 style="text-align: center;">ĐĂNG NHẬP</h3>
                                                    <div class="coupon_inner">
                                                       <div class="cart_subb">
                                                           <p style="font-size: 20px;text-align: center;color:black;">Tên tài khoản</p>
                                                           <p class="cart_infor"><input type="text" value="nhi12@gmail.com" name="Email" id="email"></p>
                                                       </div>
                                                       <div class="cart_subb">
                                                           <p style="font-size: 20px;text-align: center;color:black;">Mật khẩu</p>
                                                           <p class="cart_infor"><input type="password" value="Nhi@!23" id="matkhau"></p>
                                                       </div>
                                                       <button name="dangnhap" id="dangnhap" style="margin-left:210px;margin-right:210px;">Đăng nhập</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form> 
                         </div>
                         <!--shopping cart area end -->
                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            
            <!--pos page end-->
            
            <!--footer area start-->
            <?php include_once 'footer.php' ?>
            <!--footer area end-->
            
		<!-- all js here -->
        <script src="assets\js\vendor\jquery-1.12.0.min.js"></script>
        <script src="assets\js\popper.js"></script>
        <script src="assets\js\bootstrap.min.js"></script>
        <script src="assets\js\ajax-mail.js"></script>
        <script src="assets\js\plugins.js"></script>
        <script src="assets\js\main.js"></script>
    <script>
        $('#dangnhap').click(function(){
        var Email = $('#email').val();
        var Matkhau = $('#matkhau').val();
        var MatkhauPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if(!Email || !Matkhau){
            alert("Vui lòng nhập đủ thông tin");  
        }
        // else if (!MatkhauPattern.test(Matkhau)) {
        //     alert("Mật khẩu phải có chữ hoa, chữ thường, số, và kí tự đặc biệt.");
        //     return false;
        // }
        else if (!filter.test(Email)) {
            alert("Email phải đủ tên,@,gmail.com");
            return false;
        } 
        else {
                $.ajax('kiemtradangnhap.php',{   
                type: 'POST',  // http method
                data: { 
                    'Email': Email,
                    'Matkhau': Matkhau,

                },  // data to submit          
                success: function (data, status, xhr) {
                    if(data==1){
                       alert("Xin chào '"+Email+"' Bạn đăng nhập thành công");
                       window.open("hoadon.php","_self");
                    }
                    else{
                       alert("Tài khoản hoặc mật khẩu không đúng");
                    }  
                    // console.log(data);
                    // console.log(status);
                }
            });
        }           
        });
        </script>
    </body>
</html>