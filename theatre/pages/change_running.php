<?php
session_start();
include('../../config.php');
extract($_GET);
mysqli_query($con,"update tbl_lichchieu set r_TrangThai='$status' where MaLichChieu='$id'");
$_SESSION['success']="Running Status Updated";
header('location:view_shows.php');
?>