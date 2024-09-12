<?php
session_start();
include('../../config.php');

$mid=$_GET['mid'];
mysqli_query($con,"delete  from tbl_phim where MaPhim='$mid'");
 $_SESSION['success']="Movie deleted  successfully";
header("location:index.php");
?>