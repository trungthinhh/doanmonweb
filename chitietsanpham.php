<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>chi tiết sản phẩm</title>
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
                                    <li>CHI TIẾT SẢN PHẨM</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <!--breadcrumbs area end-->
                 <!--product wrapper start-->
                <div class="product_details">
                    <form action=""  method="POST">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <?php
                                include 'db.inc';
                                $id = $_GET['MaSach'];
                                $sql = "select * from doanmonweb.sanpham where MaSach =".$id."";
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
                                if($data>0){
                                foreach ($data as $row):
                            ?>                                     
                            <div class="product_tab fix"> 
                                        <div class="tab-content produc_tab_c">
                                            <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                                                <div class="modal_img">
                                                    <a href="#"><img src="<?php echo $row['img']?>" alt=""></a>    
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-lg-7 col-md-6">
                                    <div class="product_d_right">
                                        <input type="hidden" id="TenSach" value="<?php echo $row['TenSach']; ?>">
                                        <input type="hidden" id="MaSach" value="<?php echo $row['MaSach']; ?>">
                                        <input type="hidden" id="Gia" value="<?php echo $row['Gia']; ?>">
                                        <input type="hidden" id="Hinh" value="<?php echo $row['img']; ?>">

                                        <h1 id=""><?php echo $row['TenSach']?></h1>
                                        <p id="MaSach" style="color: #a7a4a2;">Mã sách:<?php echo $row['MaSach']?></p>
                                        <div class="content_price mb-15">
                                            <span id="Gia"><?php echo number_format($row['Gia'],0).' '.'đ'?></span>
                                        </div>
                                        <div class="box_quantity mb-20">
                                            <form action="#">
                                                <label>Số lượng</label>
                                                <input min="1" max="100" value="1" type="number" id="soluong">
                                            </form> 
                                            <button type="button" name="cart" id="cart">
                                            Thêm giỏ hàng
                                            </button>  
                                        </div>

                                        <div class="product_stock mb-20">
                                           <p>Số lượng có sẵn: </p>
                                           <p style="color:red;font-weight:bold;">
                                            <?php 
                                                if($row['SL']>0){
                                                    echo $row['SL'];
                                                } 
                                                else
                                                    echo "hết hàng";
                                                ?></p>
                                        </div>
                                    </div>
                                    <?php endforeach;}?>
                                </div>
                          
                            </div>
                        </form>
                    </div>
                    <!--product details end-->


                    <!--product info start-->
                    <div class="product_d_info">
                        <div class="row">
                            <div class="col-12">
                                <div class="product_d_inner">   
                                    <div class="product_info_button">    
                                        <ul class="nav" role="tablist">
                                            <li>
                                                <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Mô tả sản phẩm</a>
                                            </li>
                                            <li>
                                                 <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Thông tin chi tiết</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                                            <div class="product_info_content">
                                                <p><?php echo $row['MoTa']?></p>
                                            </div>    
                                        </div>

                                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                                            <div class="product_d_table">
                                               <form action="#">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="first_child">Loại sản phẩm</td>
                                                                <td>Bìa mềm</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="first_child">Kích thước</td>
                                                                <td>20 x 14 x 1 cm</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="first_child">Số trang</td>
                                                                <td>192 trang</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>    
                                        </div>
                                        
                                    </div>
                                </div>     
                            </div>
                        </div>
                    </div>  
                    <!--product info end-->


                    <!--new product area start-->
                    <div class="new_product_area product_page">
                        <div class="row">
                            <div class="col-12">
                                <div class="block_title">
                                <h3>CÓ THỂ BẠN CŨNG THÍCH</h3>
                            </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="single_p_active owl-carousel">
                            <?php
                                include 'db.inc';
                                $sql = "select dm.MaDM,dm.TenSP,pd.MaSach,Gia,SL,
                                MoTa,pd.img,TenSach from sanpham AS pd,danhmuc AS dm 
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
                    <!--new product area start-->  
                    <!--new product area start-->
                    <div class="new_product_area product_page">
                        <div class="row">
                            <div class="col-12">
                                <div class="block_title">
                                <h3>KHÁM PHÁ THÊM</h3>
                            </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="single_p_active owl-carousel">
                                <?php
                                    include 'db.inc';
                                    $sql = "select  dm.MaDM,dm.TenSP,pd.MaSach,Gia,SL,
                                    MoTa,pd.img,TenSach from sanpham AS pd,danhmuc AS dm 
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
                    <!--new product area start-->  

                </div>
                <!--pos page inner end-->
            </div>
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
        $('#cart').click(function(){//#btn_cart là id của nút thêm vào giỏ hàng
        var tenSach = $('#TenSach').val();
        var maSach = $('#MaSach').val();
        var gia = $('#Gia').val();
        var amount = $('#soluong').val();
        var hinh = $('#Hinh').val();
        $.ajax('themgiohang.php',{   
            type: 'POST',  // http method
            data: { 
                'tenSach':tenSach,
                'maSach': maSach,
                'gia': gia,
                'amount': amount,
                'hinh': hinh,
            },  // data to submit
            success: function (data, status, xhr) {
                alert(data);
                location.reload();
                // console.log(data);
                // console.log(status);
                
            }

        });
    });
    </script>
</body>
</html>