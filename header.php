<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets\img\favicon.png">
		
		<!-- all css here -->
    <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\plugin.css">
    <link rel="stylesheet" href="assets\css\bundle.css">
    <link rel="stylesheet" href="assets\css\headerFooter.css">
    <link rel="stylesheet" href="assets\css\responsive.css">
    <script src="assets\js\vendor\modernizr-2.8.3.min.js"></script>
</head>
<body>
<div class="pos_page">
    <div class="container">
       <div class="pos_page_inner"> 
       <div class="header_area">
        <img src="tttl/Banner-PQTjpg.jpg" alt="">
                               <!--header top--> 
                                <div class="header_top">
                                   <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6">
                                           <div class="switcher">
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="header_links">
                                                <ul>
                                                    <li><a href="#" title="Contact">Liên hệ</a></li>
                                                    <li><a href="#" title="wishlist">Đăng nhập</a></li>
                                                    <li><a href="#" title="My account">Đăng ký</a></li>
                                                </ul>
                                            </div>   
                                        </div>
                                   </div> 
                                </div> 
                               <!--tiêu đề trên cùng-->

                             <!--phần giữa tiêu đề-->
                                <div class="header_middel">
                                    <div class="row align-items-center">
                                       <!--logo start-->
                                        <div class="col-lg-3 col-md-3">
                                            <div class="logo">
                                                <a href="index.html"><img src="tttl/logo.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <!--logo end-->
                                        <div class="col-lg-9 col-md-9">
                                            <div class="header_right_info">
                                                <div class="search_bar">
                                                    <form action="#">
                                                        <input placeholder="Search..." type="text">
                                                        <button type="submit"><i class="fa fa-search"></i></button>
                                                    </form>
                                                </div>
                                                <div class="shopping_cart">
                                                    <a href="#"><i class="fa fa-shopping-cart"></i>Items - Tổng<i class="fa fa-angle-down"></i></a>

                                                    <!--mini cart-->
                                                             
                                                    <div class="mini_cart">
                                                    <?php
                                                        include 'db.inc';
                                                        
                                                        $sql = "select * from doanmonweb.giohang";
                                                        $result = mysqli_query($connect,$sql);
                                                        $data = [];
                                                        $rowNum = 1;
                                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                            $data[] = array(
                                                                'MaSach' => $row['MaSach'],
                                                                'TenSach' => $row['TenSach'],
                                                                'Gia' => $row['Gia'],
                                                                'SL' => $row['SL'],
                                                                'img' => $row['img'],
                                                            );
                                                        }
                                                    ?>       
                                                    <?php
                                                        foreach ($data as $row):
                                                    ?>   
                                                        <div class="cart_item">
                                                           <div class="cart_img">
                                                               <img src="<?php echo $row['img']?>" alt="">
                                                           </div>
                                                            <div class="cart_info">
                                                                <a href="#"><?php echo $row['TenSach']?></a>
                                                                <span class="cart_price"><?php echo number_format($row['Gia'],3, ',', ' ').' '.'đ'?></span>
                                                                <span class="quantity"><?php echo $row['SL']?></span>
                                                            </div>
                                                            <div class="cart_remove">
                                                                <a title="Remove this item" href="#"><i class="fa fa-times-circle"></i></a>
                                                            </div>
                                                        </div>
                                                    <?php endforeach;?>

                                                        <div class="cart_button">
                                                            <a href="giohang.php">Giỏ hàng</a>
                                                        </div>
                                                    </div>
                                                    <!--mini cart end-->
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>     
                                <!--header middel end-->      
                            <div class="header_bottom">
                                <div class="row">
                                        <div class="col-12">
                                            <div class="main_menu_inner">
                                                <div class="main_menu d-none d-lg-block">
                                                    <nav>
                                                        <ul>
                                                            <li class="active" style="background: #062746;"><a href="index.php">TRANG CHỦ</a></li>
                                                            <li><a href="#">DANH MỤC</a>
                                                                <div class="mega_menu jewelry">
                                                                    <div class="mega_items jewelry">
                                                                        <ul>
                                                                            <li><a href="">Sách Văn Học</a></li>
                                                                            <li><a href="">Sách Kỹ Năng</a></li>
                                                                            <li><a href="">Sách Tiểu Thuyết</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
       </div>
    </div>
</div>    
</body>
</html>