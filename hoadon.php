<?php 
session_start();
$_SESSION['giohang']['Email'];
// print_r($_SESSION['giohang']['Email']);
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Đơn đặt hàng</title>
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
            <!-- Add your site or application content here -->
            
            <!--pos page start-->
            <div class="pos_page">
                <div class="container">
                    <!--pos page inner-->
                    <div class="pos_page_inner"> 
                        <?php include_once 'header.php'; ?> 
                        <div class="breadcrumbs_area">
                            <div class="row">
                                <div class="col-12">
                                    <div class="breadcrumb_content">
                                        <ul>
                                            <li><a href="index.php">TRANG CHỦ</a></li>
                                            <li><i class="fa fa-angle-right"></i></li>
                                            <li>ĐƠN ĐẶT HÀNG</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!--header end -->
                        <!--Checkout page section-->
                        <div class="Checkout_section">
                            <div class="checkout_form">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <form action="#">    
                                                <div class="order_table table-responsive mb-30">
                                                    <div class="coupon_code">
                                                        <h3>THÔNG TIN KHÁCH HÀNG</h3>
                                                        <div class="coupon_inner">
                                                        <?php
                                                            // require("connect.php");
                                                        include 'db.inc';
                                                        $sql = "SELECT * FROM `hoadon` WHERE Email='".$_SESSION['giohang']['Email']."' GROUP by Email";
                                                        //var_dump($sql);die();
                                                        $result = mysqli_query($connect,$sql);
                                                        $data = [];
                                                        $rowNum = 1;
                                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                            $data[] = array(
                                                                'TenKH' => $row['TenKH'],
                                                                'DiaChi' => $row['DiaChi'],
                                                                'SoDienThoai' => $row['SoDienThoai'],
                                                                'Email' => $row['Email'],
                                                                'NgayDat' => $row['NgayDat'],
                                                            );
                                                        }
                                                        ?>    
                                                        <?php 
                                                        if(count($data)>0){
                                                            foreach ($data as $row):
                                                        ?>
                                                        <div class="cart_sub">
                                                            <p>Tên khách hàng:</p>
                                                            <span class="cart_infor"><?php echo $row['TenKH']?></span>
                                                        </div>
                                                        <div class="cart_sub ">
                                                            <p>Địa chỉ:</p>
                                                            <span class="cart_infor"><?php echo $row['DiaChi']?></span>
                                                        </div>
                                                        <div class="cart_sub ">
                                                            <p>Số điện thoại:</p>
                                                            <span class="cart_infor"><?php echo $row['SoDienThoai']?></span>
                                                        </div>
                                                        <div class="cart_sub ">
                                                            <p>Email:</p>
                                                            <span class="cart_infor"><?php echo $row['Email']?></span>
                                                        </div>
                                                        <div class="cart_sub ">
                                                            <p>Ngày đặt:</p>
                                                            <span class="cart_infor"><?php echo $row['NgayDat']?></span>
                                                        </div>
                                                        <?php endforeach;}?> 
                                                        </div>
                                                    </div>    
                                                </div> 
                                            </form>         
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <form action="#">    
                                                <h3>ĐƠN ĐẶT HÀNG CỦA BẠN</h3> 
                                                <div class="order_table table-responsive mb-30">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th>Sản phẩm</th>
                                                                <th>Tổng cộng</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            // require("connect.php");
                                                        include 'db.inc';
                                                        $sql = "select Gia,pd.img,pd.MaSach,pd.TenSach,hd.SL,hd.TongTien FROM `hoadon` as hd, `product` as pd
                                                        WHERE pd.MaSach=hd.MaSach and Email='".$_SESSION['giohang']['Email']."' group by MaSach";
                                                        //var_dump($sql);die();
                                                        $result = mysqli_query($connect,$sql);
                                                        $data = [];
                                                        $rowNum = 1;
                                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                            $data[] = array(
                                                                'Gia' => $row['Gia'],
                                                                'img' => $row['img'],
                                                                'TenSach' => $row['TenSach'],
                                                                'SL' => $row['SL'],
                                                                'TongTien' => $row['TongTien'],
                                                                'MaSach' => $row['MaSach'],
                                                            );
                                                        }
                                                        ?>    
                                                        <?php 
                                                        if(count($data)>0){
                                                            $tong=0; 
                                                            foreach ($data as $row):
                                                                $tt = $row['Gia']*$row['SL'];
                                                                
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <span><img src="<?php echo $row['img']?> " style="width: 50px;" alt=""></span>
                                                                    <?php echo $row['TenSach']?><strong> × <?php echo $row['SL']?></strong></td>
                                                                <td><?php echo number_format ($tt,0)?></td>
                                                            </tr>
                                                            <?php endforeach;}?> 
                                                        </tbody>
                                                        <tfoot>
                                                            <tr class="order_total">
                                                                <th>Tổng đơn hàng</th>
                                                                <td><strong><?php echo number_format ($row['TongTien'],0)?></strong></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>     
                                                </div> 
                                            </form>         
                                        </div>
                                    </div> 
                                </div>        
                        </div>
                        <!--Checkout page section end-->

                    </div>
                    <!--pos page inner end-->
                </div>
            </div>
            <!--pos page end-->
            
            <!--footer area start-->
            <?php include_once 'footer.php'; ?>
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
