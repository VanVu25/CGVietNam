<?php
session_start();
include('config.php');
mysqli_query($con,"delete from tbl_datve where MaDatVe='".$_GET['id']."'");
$_SESSION['success']="Hủy đặt vé thành công!";
header('location:profile.php');
?>