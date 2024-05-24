<?php
// $id = "";
include 'db.inc';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted data
    $tenkh = $_POST['tenkh'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];
    $Tongtien = $_POST['Tongtien'];
    $ngaydat = date('Y-m-d H:i:s');
    $soluongValues = $_POST['soluongValues'];
    $MaGValues = $_POST['MaGValues'];
    $MaSachValues = $_POST['MaSachValues'];
    // Chuyển đổi chuỗi thành mảng
    $array = explode(",", $soluongValues);
    $arraymag = explode(",", $MaGValues);
    $arraymasp = explode(",", $MaSachValues);
    // Kiểm tra xem độ dài của hai mảng có bằng nhau không
    if (count($array) != count($arraymag)|| count($array) != count($arraymasp)) {
        return false;
    }
    // var_dump($soluongValues);die();
    $results = []; // Tạo một mảng để lưu kết quả
    $kqSP=[];
    // Lặp qua các mảng đồng thời
    for ($i = 0; $i < count($array); $i++) {
        // Lấy số lượng và mã sản phẩm tương ứng
        $soluong = intval($array[$i]);       
        $MaG = $arraymag[$i];
        $MaSach = $arraymasp[$i];

        $sql = "INSERT INTO `hoadon`(`TenKH`, `DiaChi`, `SoDienThoai`, `Email`,`SL`, `TongTien`, `NgayDat`, `MaG`, `MaSach`) 
        VALUES (N'".$tenkh."',N'".$diachi."','".$sdt."','".$email."',".$soluong.",".$Tongtien.",'".$ngaydat."','".$MaG."','".$MaSach."')";
        $results= $sql;

        $kq1="update product AS sp SET 
        sp.SL = sp.SL - (SELECT SUM(hd.SL) FROM hoadon AS hd WHERE hd.MaSach = sp.MaSach)
        WHERE sp.MaSach = '".$MaSach."'";
        $kqSP= $kq1;
        // var_dump($kqSP);var_dump($sql); die();
        
        if (($connect->query($sql) === TRUE)&&($connect->query($kq1) === TRUE)) {
            echo "Đặt hàng thành công";
            session_start();
            $_SESSION['giohang']['Email']=$email;
            
        } else {
            echo "Lỗi khi đặt hàng: " . $connect->error;
        }      
    }
    return ['results' => $results, 'kqSP' => $kqSP];
    
}


?>
