<?php
include('../../config.php');
session_start();
$email = $_POST["Email"];
$pass = $_POST["Password"];
$qry=mysqli_query($con,"select * from tbl_dangnhap where TenDangNhap='$email' and MatKhau='$pass'");
if(mysqli_num_rows($qry))
{
	$usr=mysqli_fetch_array($qry);
	if($usr['LoaiNguoidung']==0)
	{
		$_SESSION['admin']=$usr['MaDN'];
		header('location:index.php');
	}
	else
	{
		$_SESSION['error']="Login Failed!";
		header("location:../index.php");
	}
}
else
{
	$_SESSION['error']="Login Failed!";
	header("location:../index.php");
}
?>