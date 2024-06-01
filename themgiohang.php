<?php
// $id = "";
include 'db.inc';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted data
    $tenSach = $_POST['tenSach'];
    $maSach = $_POST['maSach'];
    $gia = $_POST['gia'];
    $amount = $_POST['amount'];
    $hinh = $_POST['hinh'];
   
    // echo "Tên sách đã được gửi: " . $tenSach." ";
    // echo "Mã sách đã được gửi: " . $maSach;
    // echo "Giá đã được gửi: " . $gia;
    // echo "hinh: " . $hinh;
    $sql_sl="select * from `sanpham` where MaSach='".$maSach."'";
    
    // var_dump($sql);die();
    // Thực thi truy vấn và kiểm tra kết quả
    $result_tonkho = $connect->query($sql_sl);
    if ($result_tonkho->num_rows > 0) {
        $row_tonkho = $result_tonkho->fetch_assoc();
        $tonkho = $row_tonkho["SL"];
        if ($tonkho >= $amount) {
            // Thêm sản phẩm vào giỏ hàng
            // ... (Thực hiện truy vấn INSERT như bình thường)
            $sql = "INSERT INTO `giohang`(`img`, `TenSach`, `SL`, `Gia`, `MaSach`) 
            VALUES ('".$hinh."',N'".$tenSach."',".$amount.",".$gia.",'".$maSach."')";
            if ($connect->query($sql) === TRUE){
                echo "Thêm sản phẩm vào giỏ hàng thành công";
            }
            else {
                echo "Lỗi khi thêm sản phẩm mới: " . $connect->error;
            }
            
        } 
        else {
            echo "Sản phẩm đã hết hàng. Vui lòng đặt hàng khi có hàng.";
        }
    } 
}


?>
