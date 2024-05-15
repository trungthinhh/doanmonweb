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
                                                        <th class="product_remove">Mã giỏ hàng</th>
                                                        <th class="product_remove" style="display:none;">Mã sách</th>
                                                        <th class="product_thumb">Hình ảnh</th>
                                                        <th class="product_name">Tên sản phẩm</th>
                                                        <th class="product_remove">Giá</th>
                                                        <th class="product_remove">Số lượng</th>
                                                        <th class="product_remove">Tổng tiền</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
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
                                                            'MaG' => $row['MaG'],
                                                        );
                                                        
                                                    }
                                                ?>       
                                                <?php
                                                if(count($data)>0){
                                                    $tong=0; 
                                                    $tongsl=0;
                                                    foreach ($data as $row):
                                                        
                                                        $tt = $row['Gia']*$row['SL'];
                                                        $tong += $tt;  
                                                          
                                                        $tsl=$tt/$row['Gia'];       
                                                        $tongsl += $tsl;     
                                                ?>         
                                                    <tr>
                                                        <td class="product_remove"><a href="#" onclick="deleteSP(<?php echo $row['MaG']?>)"><i class="fa fa-trash-o"></i></a></td>
                                                        <td class="product_id" val="<?php echo $row['MaG']; ?>"><?php echo $row['MaG']?></td>
                                                        <td class="product_idSP" style="display:none;" val="<?php echo $row['MaSach']; ?>"><?php echo $row['MaSach']?></td>
                                                        <td class="product_thumb"><img src="<?php echo $row['img']?>" alt=""></td>
                                                        <td class="product_name"><?php echo $row['TenSach']?></td>
                                                        <td class="product-price" id="price<?php echo $row['MaG']?>" val="<?php echo $row['Gia']?>"><?php echo number_format($row['Gia'],0)?></td>
                                                        <td class="product_quantity">
                                                            <input min="1" max="100" type="number" class="product_sl" 
                                                                id="soluong<?php echo $row['MaG']?>" value="<?php echo $row['SL']?>" 
                                                                val="<?php echo $row['SL']?>" onChange="changeQuantity(<?php echo $row['MaG']; ?>)"></td>
                                                        <td class="product_total" id="total<?php echo $row['MaG']?>" val="<?php echo number_format($row['Gia']*$row['SL'])?>"><?php echo number_format($row['Gia']*$row['SL'],0)?></td>
                                                    </tr>
                                                <?php endforeach;}?>
                                                </tbody>
                                            </table>   
                                            </div>  
                                            <div class="cart_submit">
                                                <button type="submit" onclick="updateSP()" style="cursor: hand;">Cập nhật</button>
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
                                                           <p class="cart_sl" val="<?php echo $tongsl;?>"><?php echo number_format($tongsl)?></p>
                                                       </div>
                                                       <div class="cart_subtotal ">
                                                           <p>Tổng giỏ hàng</p>
                                                           <p class="cart_amount" id="tongtien" val="<?php echo $tong;?>"><?php echo number_format($tong,0)." "?></p>
                                                       </div>
                                                       <div class="cart_submit">
                                                            <button type="submit" onclick="dathang()" style="cursor: hand;background:red;">Đặt hàng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="coupon_code">
                                                    <h3>THÔNG TIN KHÁCH HÀNG</h3>
                                                    <div class="coupon_inner">
                                                       <div class="cart_sub">
                                                           <p>Tên khách hàng:</p>
                                                           <p class="cart_infor"><input type="text" value="uyên" id="tenkh"></p>
                                                       </div>
                                                       <div class="cart_sub ">
                                                           <p>Địa chỉ:</p>
                                                           <p class="cart_infor"><input type="text" value="mỹ tho" id="diachi"></p>
                                                       </div>
                                                       <div class="cart_sub ">
                                                           <p>Số điện thoại:</p>
                                                           <p class="cart_infor"><input type="text" value="0123456789" id="sdt"></p>
                                                       </div>
                                                       <div class="cart_sub ">
                                                           <p>Email:</p>
                                                           <p class="cart_infor"><input type="text" value="uyen12@gmail.com" id="email"></p>
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
        <script>
        function changeQuantity(MaG){
        //khai báo biến chứa giá trị số lượng
        var quantity = $('#soluong'+MaG).val();
        console.log('Quantity '+quantity);

        var cost = $('#price'+MaG).text();
        // console.log('befor cost '+cost);
        // console.log(cost);
        cost = Number(cost.replace(/,/g, ""));
        // console.log('after cost '+cost);
        $("#price"+MaG).attr('val', cost);

        var sum = quantity * cost;
        //var total = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(sum);
        var total = new Intl.NumberFormat('vi-VN').format(sum);
        console.log('total '+total);
        $("#total"+MaG).text(total);
        $("#total"+MaG).attr('val', sum);

        let elements = document.getElementsByClassName("product_total");
        var sumTotal = 0;
        for (let i = 0; i < elements.length; i++) {
            let element = elements[i];
            console.log('element ');
            console.log(element);
            let value = element.getAttribute('val');
            console.log('i: '+i+'; value: '+value);
            value = Number(value.replace(/,/g, ""));
            sumTotal += value;
            console.log('result total '+sumTotal);
           
        }
        $('.cart_amount').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(sumTotal));
        $('.cart_amount').attr('val', sumTotal);

        //tính tổng số lượng
        var sumSL = sum/cost;
        var totalSL = new Intl.NumberFormat('vi-VN').format(sumSL);
        console.log('totalSL '+totalSL);
        $("#soluong"+MaG).text(totalSL);
        $("#soluong"+MaG).attr('val', sumSL);

        let elementss = document.getElementsByClassName("product_sl");
        var sumTotal1 = 0;
        for (let i = 0; i < elementss.length; i++) {
            let element1 = elementss[i];
            console.log('element ');
            console.log(element1);
            let value1 = element1.getAttribute('val');
            console.log('i: '+i+'; value: '+value1);
            value1 = Number(value1.replace(/,/g, ""));
            sumTotal1 += value1;
            console.log('result total '+sumTotal1);
        }
        $('.cart_sl').text((sumTotal1));
        $('.cart_sl').attr('val', sumTotal1);
        }
       
            //nút xóa
        function deleteSP(MaG){
                $.ajax('xoagiohang.php',{   
                    type: 'POST',  // http method
                    data: { 
                        'MaG': MaG,                 
                    },  // data to submit
                    success: function (data, status, xhr) {
                        alert(data);
                        location.reload();
                        // console.log(status);
                    } 
                
                });
        
        }

        //nút cập nhật
        function updateSP() {
        let soluongElements = document.getElementsByClassName("product_sl");
        let soluongValues = []; // Mảng để lưu trữ nhiều giá trị
        for (let i = 0; i < soluongElements.length; i++) {
            let element = soluongElements[i];
            console.log('element ', element);
            let value = element.getAttribute('val');
            console.log('i: ' + i + '; value: ' + value);
            soluongValues.push(Number(value)); //Chuyển đổi thành số và lưu trữ trong mảng
        }

        let MaGElements = document.getElementsByClassName("product_id");
        let MaGValues = []; // This should also be an array
        for (let i = 0; i < MaGElements.length; i++) {
            let element = MaGElements[i];
            console.log('element ', element);
            let value = element.getAttribute('val');
            console.log('i: ' + i + '; value: ' + value);
            MaGValues.push(value); 
        }

        for (let i = 0; i < soluongValues.length; i++) {
            $.ajax('capnhatgiohang.php', {
                type: 'POST',
                data: {
                    'MaG': MaGValues[i],
                    'soluong': soluongValues[i],
                },
                success: function (data, status, xhr) {
                    alert(data);
                    location.reload();

                }
            });
        }
    }
    function dathang(){
        var tenkh = $('#tenkh').val();
        var diachi = $('#diachi').val();
        var sdt = $('#sdt').val();
        var email = $('#email').val();
        var tongtien = $('#tongtien').text();
        Tongtien = Number(tongtien.replace(/,/g, ""));
        
        let soluongElements = document.getElementsByClassName("product_quantity");
        let soluongValues = []; // Mảng để lưu trữ nhiều giá trị
            for (let i = 0; i < soluongElements.length; i++) {
                let element = soluongElements[i];
                console.log('element ', element);
                let value = element.getAttribute('val');
                console.log('i: ' + i + '; value: ' + value);
                soluongValues.push(Number(value)); //Chuyển đổi thành số và lưu trữ trong mảng
        }

        let MaGElements = document.getElementsByClassName("product_id");
        let MaGValues = []; // This should also be an array
        for (let i = 0; i < MaGElements.length; i++) {
            let element = MaGElements[i];
            console.log('element ', element);
            let value = element.getAttribute('val');
            console.log('i: ' + i + '; value: ' + value);
            MaGValues.push(value); 
        };
        //lấy giá trị mã sách
        let MaSachElements = document.getElementsByClassName("product_idSP");
        let MaSachValues = []; // This should also be an array
        for (let i = 0; i < MaSachElements.length; i++) {
            let element = MaSachElements[i];
            console.log('element ', element);
            let value = element.getAttribute('val');
            console.log('i: ' + i + '; value: ' + value);
            MaSachValues.push(value); 
        };
        for (let i = 0; i < soluongValues.length; i++) {
            $.ajax('themhoadon.php', {//gom vo 1 ham, roi qua conntroller xu ly
            type: 'POST',
            data: {
                'tenkh': tenkh,  
                'email': email,  
                'Tongtien': Tongtien,   
                'sdt': sdt,
                'diachi': diachi,
                'MaGValues': MaGValues[i],
                'MaSachValues': MaSachValues[i],
                'soluongValues': soluongValues[i],

            },
            success: function (data, status, xhr) {
                // alert(data);
                console.log(data);
                console.log(status);

            }
        });
        }
        
    }
        </script>
    </body>
</html>