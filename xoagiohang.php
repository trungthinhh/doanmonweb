<?php
// $id = "";
include 'db.inc';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaG = $_POST['MaG'];
   
    // echo "Mã sách đã được gửi: " . $maSach;
    
    $sql = "DELETE FROM giohang WHERE MaG='".$MaG."'";
    // var_dump($sql);die();
    // Thực thi truy vấn và kiểm tra kết quả
    if ($connect->query($sql) === TRUE) {
        echo "Xóa sản phẩm thành công";
    } else {
        echo "Lỗi khi xóa sản phẩm: " . $connect->error;
    }
}


?>
