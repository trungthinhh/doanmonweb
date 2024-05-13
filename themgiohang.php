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
    $sql = "INSERT INTO `giohang`(`img`, `TenSach`, `SL`, `Gia`, `MaSach`) 
    VALUES ('".$hinh."',N'".$tenSach."',".$amount.",".$gia.",'".$maSach."')";
    // var_dump($sql);die();
    // Thực thi truy vấn và kiểm tra kết quả
    if ($connect->query($sql) === TRUE) {
        echo "Thêm sản phẩm vào giỏ hàng thành công";
    } else {
        echo "Lỗi khi thêm sản phẩm mới: " . $connect->error;
    }
}


?>
