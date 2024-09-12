<?php
session_start();
include('../../config.php');

$mid=$_GET['mid'];

$us=mysqli_query($con,"select * from tbl_datve where MaNguoiDung='$mid'");
$user=mysqli_fetch_array($us);
if($user['MaDatVe']!="")
{
    $result1=mysqli_query($con,"delete from tbl_datve where MaDatVe='".$user['MaDatVe']."'");
}
$result2 =mysqli_query($con,"delete from tbl_dangnhap where MaDN='$mid'");

$result3 =mysqli_query($con,"delete from tbl_dangky where MaNguoidung='$mid'");

$_SESSION['success']="Xóa user thành công";


header("location:index.php");
?>