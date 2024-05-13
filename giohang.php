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
                                            <li>GIỎ HÀNG</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs area end-->

                         <!--shopping cart area start -->
                        <div class="shopping_cart_area">
                            <form action="#"> 
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table_desc">
                                                <div class="cart_page table-responsive">
                                                    <table>
                                                <thead>
                                                    <tr>
                                                        <th class="product_remove">Hành động</th>
                                                        <th class="product_thumb">Hình ảnh</th>
                                                        <th class="product_name">Tên sản phẩm</th>
                                                        <th class="product-price">Giá</th>
                                                        <th class="product_quantity">Số lượng</th>
                                                        <th class="product_total">Tổng tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                       <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                                        <td class="product_thumb"><a href="#"><img src="tttl/83827_tam-thanh-va-loc-doi.jpg" alt=""></a></td>
                                                        <td class="product_name"><a href="#">Tên sp</a></td>
                                                        <td class="product-price">Giá</td>
                                                        <td class="product_quantity"><input min="1" max="100" value="1" type="number"></td>
                                                        <td class="product_total">Giá tổng</td>


                                                    </tr>
                                                </tbody>
                                            </table>   
                                                </div>  
                                                <div class="cart_submit">
                                                    <button type="submit">Cập nhật</button>
                                                </div>      
                                            </div>
                                         </div>
                                     </div>
                                     <!--coupon code area start-->
                                    <div class="coupon_area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="coupon_code">
                                                    <h3>Tổng giỏ hàng</h3>
                                                    <div class="coupon_inner">
                                                       <div class="cart_subtotal">
                                                           <p>Tổng số lượng mặt hàng</p>
                                                           <p class="cart_amount">Sl</p>
                                                       </div>
                                                       <div class="cart_subtotal ">
                                                           <p>Tổng giỏ hàng</p>
                                                           <p class="cart_amount">Tổng</p>
                                                       </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--coupon code area end-->
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
    </body>
</html>