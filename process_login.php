<?php
include('config.php');
session_start();
$email = $_POST["Email"];
$pass = $_POST["Password"];
$qry=mysqli_query($con,"select * from tbl_dangnhap where TenDangNhap='$email' and MatKhau='$pass'");
if(mysqli_num_rows($qry))
{
	$usr=mysqli_fetch_array($qry);
	if($usr['LoaiNguoidung']==2)
	{
		$_SESSION['user']=$usr['MaDN'];
		if(isset($_SESSION['show']))
		{
			header('location:booking.php');
		}
		else
		{
			header('location:index.php');
		}
	}
	else
	{
		$_SESSION['error']="Đăng nhập thất bại!";
		header("location:login.php");
	}
	
}
else
{
	$_SESSION['error']="Đăng nhập thất bại!";
	header("location:login.php");
}
?>