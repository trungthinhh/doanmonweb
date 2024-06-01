<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Coron - Fashion eCommerce Bootstrap4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugin.css">
    <link rel="stylesheet" href="assets/css/bundle.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>

<!-- Thêm nội dung trang web hoặc ứng dụng của bạn vào đây -->

<!-- bắt đầu trang pos -->
<div class="pos_page">
    <div class="container">
        <!-- header -->
        <div class="pos_page_inner">
        <?php include_once 'header.php'; ?>
        <div class="breadcrumbs_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb_content">
                                <ul>
                                    <li><a href="index.php">TRANG CHỦ</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li>DANH MỤC</li>
                                </ul>

                            </div>
                        </div>
                    </div>
            </div>
            <!-- pos home section -->
            <div class="pos_home_section">
                <div class="row pos_home">
                    <div class="col-lg-15 col-md-12">
                        <!-- new product area start -->
                        <div class="shop_tab_product shop_fullwidth">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="large" role="tabpanel">
                                    <div class="row" style="margin-bottom:10px;">
                                    <?php
                                        include 'db.inc';
                                        $id=$_GET['MaDM'];
                                        //var_dump($tukhoa);die();
                                        $sql = "select dm.MaDM,dm.TenSP,pd.MaSach,Gia,SL,
                                        MoTa,pd.img,TenSach from sanpham AS pd,danhmuc AS dm 
                                        WHERE pd.MaDM=dm.MaDM and dm.MaDM=".$id."";
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
                                            <div class="col-lg-3 col-md-4 col-sm-6">
                                                <div class="single_product">
                                                    <div class="product_thumb">
                                                        <a href="#"><img src="<?php echo $row['img']; ?>" alt=""></a>
                                                    </div>
                                                    <div class="product_content">
                                                        <span class="product_price"><?php echo number_format ($row['Gia'],0).' '.'đ'; ?></span>
                                                        <h3 class="product_title"><a href="single-product.html"><?php echo $row['TenSach']; ?></a></h3>
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
                        <!-- new product area end -->
                    </div>
                </div>
            </div>
            <!-- pos home section end -->
        </div>
        <!-- pos page inner end -->
    </div>
</div>
<!-- footer start -->
<?php include_once 'footer.php'; ?>
<!-- pos page end -->

<!-- all js here -->
<script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/ajax-mail.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
