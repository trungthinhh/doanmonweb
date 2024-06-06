<?php
include 'db.inc';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['Email'];
    $Matkhau = $_POST['Matkhau'];
    $sql_sl="select * FROM `hoadon` WHERE Email='".$Email."' and Matkhau='".$Matkhau."'";
    //var_dump($sql_sl);

    session_start();
    $_SESSION['dangnhap']['Email']=$Email;
        if(!$sql_sl){
            echo 0;
        }
        else{
            echo 1;
        }
}
?>