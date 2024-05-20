<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Nhà sách Phương Nam</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets\img\favicon.png">
		
		<!-- all css here -->
        <link rel="stylesheet" href="assets\css\bootstrap.min.css">
        <link rel="stylesheet" href="assets\css\plugin.css">
        <link rel="stylesheet" href="assets\css\bundle.css">
        <link rel="stylesheet" href="assets\css\style.css">
        <link rel="stylesheet" href="assets\css\responsive.css">
        <script src="assets\js\vendor\modernizr-2.8.3.min.js"></script>
    </head>
    <body>
          
<!-- Thêm nội dung trang web hoặc ứng dụng của bạn vào đây -->
            
          
<!--bắt đầu trang pos-->
            <div class="pos_page">
                <div class="container">
                 <!--header-->
                 <?php include_once 'header.php' ?>
                     <div class="pos_page_inner">  
                        <div class=" pos_home_section">
                            <div class="row pos_home">
                                <div class="col-lg-3 col-md-8 col-12">
                                   <!--sidebar banner-->
                                    <div class="sidebar_widget banner mb-35">
                                        <div class="banner_img mb-35">
                                            <a href="#"><img src="tttl/top.jpg" alt=""></a>
                                        </div>
                                        <div class="banner_img">
                                            <a href="#"><img src="tttl/bottom.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <!--sidebar banner end-->
                                    <!--categorie menu start-->
                                    <div class="sidebar_widget catrgorie mb-35">
                                        <h3>Danh mục</h3>
                                        <ul>
                                            <li><a href="">Sách Văn Học</a></li>
                                            <li><a href="">Sách Kỹ Năng</a></li>
                                            <li><a href="">Sách Tiểu Thuyết</a></li>
                                        </ul>
                                    </div>
                                    <!--categorie menu end-->
<!--sidebar banner-->
                                    <div class="sidebar_widget bottom ">
                                        <div class="banner_img">
                                            <a href="#"><img src="tttl/Banner4.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <!--sidebar banner end-->

                                </div>
                                <div class="col-lg-9 col-md-12">
                                    <!--banner slider start-->
                                    <div class="banner_slider slider_1">
                                        <div class="slider_active owl-carousel">
                                            <div class="single_slider" style="background-image: url(tttl/Banner1.jpg)"></div>
                                            <div class="single_slider" style="background-image: url(tttl/Banner2.jpg)"></div>
                                            <div class="single_slider" style="background-image: url(tttl/Banner3.jpg)"></div>
                                        </div>
                                    </div> 
                                    <!--banner slider start-->

                                    <!--new product area start-->
                                    <div class="new_product_area">
                                        <div class="block_title">
                                            <h3>SẢN PHẨM MỚI</h3>
                                        </div>
                                        <div class="row">
                                            <div class="product_active owl-carousel">
                                            <?php
                                                    // require("connect.php");
                                                include 'db.inc';
                                                $sql = "select * from product";
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
                                                        'MoTa' => $row['MoTa'],
                                                        'MaDM' => $row['MaDM'],
                                                    );
                                                }
                                                ?>    
                                                <?php 
                                                    foreach ($data as $row):
                                                ?>
                                                <div class="col-lg-3">                                               
                                                    <div class="single_product">
                                                        <div class="product_thumb">
                                                           <a href="" ><img src="<?php echo $row['img']?>" alt=""></a> 
                                                           <div class="img_icone">
                                                               <img src="<?php echo $row['img']?>" alt="">
                                                           </div>
                                                        </div>
                                                        <div class="product_content">
                                                            <span class="product_price"><?php echo number_format($row['Gia'],0).' '.'đ'?></span>
                                                            <h3 class="product_title">                                                               
                                                                    <?php echo $row['TenSach']?>
                                                            </h3>
                                                        </div>
                                                        <div class="product_info">
                                                            <ul>
                                                                <li><a href='chitietsanpham.php?MaSach="<?php echo $row['MaSach']?>"'>Xem Chi Tiết</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach;?>    
                                            </div> 
                                        </div>       
                                    </div> 
                                    <!--new product area start-->  

                                    <!--featured product start--> 
                                    <div class="featured_product">
                                        <div class="block_title">
                                            <h3>SÁCH VĂN HỌC</h3>
                                        </div>
                                        <div class="row">
                                            <div class="product_active owl-carousel">
                                            <?php
                                                    // require("connect.php");
                                                include 'db.inc';
                                                $sql = "select dm.MaDM,dm.TenSP,pd.MaSach,Gia,SL,
                                                MoTa,pd.img,TenSach FROM product AS pd,danhmuc AS dm 
                                                WHERE pd.MaDM=dm.MaDM and dm.TenSP=N'Văn Học'";
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
                                                        'MoTa' => $row['MoTa'],
                                                        'MaDM' => $row['MaDM'],
                                                    );
                                                }
                                                ?>    
                                                <?php 
                                                    foreach ($data as $row):
                                                ?>
                                                <div class="col-lg-3">                                               
                                                    <div class="single_product">
                                                        <div class="product_thumb">
                                                           <a href="" ><img src="<?php echo $row['img']?>" alt=""></a> 
                                                           <div class="img_icone">
                                                               <img src="<?php echo $row['img']?>" alt="">
                                                           </div>
                                                        </div>
                                                        <div class="product_content">
                                                            <span class="product_price"><?php echo number_format($row['Gia'],0).' '.'đ'?></span>
                                                            <h3 class="product_title"><?php echo $row['TenSach']?></h3>
                                                        </div>
                                                        <div class="product_info">
                                                            <ul>
                                                                <li><a href='chitietsanpham.php?MaSach="<?php echo $row['MaSach']?>"'>Xem Chi Tiết</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach;?> 
                                            </div> 
                                        </div> 
                                    </div>     
                                    <!--featured product end--> 

                                    <!--banner area start-->
                                    <div class="banner_area mb-60">
                                        <div class="row">
                                            <div class="col-log">
                                                <div class="single_banner">
                                                    <a href="#"><img src="tttl/April-10__2_.png" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-log">
                                                <div class="single_banner">
                                                    <a href="#"><img src="tttl/April-20__2_.png" alt=""></a>
                                                  
                                                </div>
                                            </div>
                                            <div class="col-log">
                                                <div class="single_banner">
                                                    <a href="#"><img src="tttl/April-30__2_.png" alt=""></a>
                                                   
                                                </div>
                                            </div>
                                            <div class="col-log">
                                                <div class="single_banner">
                                                    <a href="#"><img src="tttl/SAN-SALE__2_.png" alt=""></a>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="banner_area mb-60">
                                        <div class="featured_product">
                                            <div class="block_title">
                                                <h3>SÁCH KỸ NĂNG</h3>
                                            </div>
                                            <div class="row">
                                                <div class="product_active owl-carousel">
                                                <?php
                                                    // require("connect.php");
                                                include 'db.inc';
                                                $sql = "select dm.MaDM,dm.TenSP,pd.MaSach,Gia,SL,
                                                MoTa,pd.img,TenSach FROM product AS pd,danhmuc AS dm 
                                                WHERE pd.MaDM=dm.MaDM and dm.TenSP=N'Kỹ Năng'";
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
                                                        'MoTa' => $row['MoTa'],
                                                        'MaDM' => $row['MaDM'],
                                                    );
                                                }
                                                ?>    
                                                <?php 
                                                    foreach ($data as $row):
                                                ?>
                                                <div class="col-lg-3">                                               
                                                    <div class="single_product">
                                                        <div class="product_thumb">
                                                           <a href="" ><img src="<?php echo $row['img']?>" alt=""></a> 
                                                           <div class="img_icone">
                                                               <img src="<?php echo $row['img']?>" alt="">
                                                           </div>
                                                        </div>
                                                        <div class="product_content">
                                                            <span class="product_price"><?php echo number_format($row['Gia'],0).' '.'đ'?></span>
                                                            <h3 class="product_title"><?php echo $row['TenSach']?></h3>
                                                        </div>
                                                        <div class="product_info">
                                                            <ul>
                                                                <li><a href='chitietsanpham.php?MaSach="<?php echo $row['MaSach']?>"'>Xem Chi Tiết</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach;?> 
                                                </div> 
                                            </div> 
                                        </div>                                        
                                    </div>                                         
                                    <!--banner area end-->      
                                </div>

                            </div>  
                        </div>
                        <!--pos home section end-->
                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
             <!--footer star-->
             <?php include_once 'footer.php' ?>
            <!--pos page end-->
		
    </body>
</html>
<!-- all js here -->
        <script src="assets\js\vendor\jquery-1.12.0.min.js"></script>
        <script src="assets\js\popper.js"></script>
        <script src="assets\js\bootstrap.min.js"></script>
        <script src="assets\js\ajax-mail.js"></script>
        <script src="assets\js\plugins.js"></script>
        <script src="assets\js\main.js"></script>
