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
    if (count($array) != count($arraymag)) {
        return false;
    }

    $results = []; // Tạo một mảng để lưu kết quả
    $kqSP=[];
    // Lặp qua các mảng đồng thời
    for ($i = 0; $i < count($array); $i++) {
        // Lấy số lượng và mã sản phẩm tương ứng
        $soluong = intval($array[$i]);
        //print_r($soluong);
        $MaG = $arraymag[$i];
        $MaSach = $arraymasp[$i];
        $sql = "INSERT INTO `hoadon`(`TenKH`, `DiaChi`, `SoDienThoai`, `Email`, `TongTien`, `NgayDat`,`MaG`,`MaSach`) 
        VALUES (N'".$tenkh."',N'".$diachi."','".$sdt."','".$email."',".$Tongtien.",'".$ngaydat."','".$MaG."','".$MaSach."')";
        $results[] = $sql;
        // var_dump($results);
        // $kqSP="update product AS sp SET 
        // sp.SL = sp.SL - (SELECT SUM(hd.SL) FROM hoadon AS hd WHERE hd.MaSach = sp.MaSach)
        // WHERE sp.MaSach = '10'";
        // return ['results' => $sql, 'kqSP' => $kqSP];
        echo "Thêm sản phẩm vào giỏ hàng thành công";

        $return = ['results' => $results];




        // Thực thi truy vấn và kiểm tra kết quả
        // if ($connect->query($sql) === TRUE) {
        //     echo "Thêm sản phẩm vào giỏ hàng thành công";
        // } else {
        //     echo "Lỗi khi thêm sản phẩm mới: " . $connect->error;
        // }
       
    }
    
}


?>
