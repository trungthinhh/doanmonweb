<?php
// $id = "";
include 'db.inc';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted data
    $MaG = $_POST['MaG'];
    $soluong = $_POST['soluong'];
   
    $sql = "UPDATE `giohang` set SL=".$soluong." where MaG='".$MaG."'";
    // var_dump($sql);die();
    // Thực thi truy vấn và kiểm tra kết quả
    if ($connect->query($sql) === TRUE) {
        echo "Cập nhật sản phẩm thành công";
    } else {
        echo "Lỗi khi cập nhật sản phẩm: " . $connect->error;
    }
}


?>
