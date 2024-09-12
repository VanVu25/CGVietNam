<?php
session_start();
include('../../config.php');
extract($_GET);
mysqli_query($con,"update tbl_lichchieu set TrangThai='0' where MaLichChieu='$id'");
$_SESSION['success']="Show Deleted";
header('location:view_shows.php');?>