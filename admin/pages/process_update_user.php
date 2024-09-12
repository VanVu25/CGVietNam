<?php
    include('../../config.php');
    extract($_POST);
    mysqli_query($con,"update tbl_dangky set HoTen='$name', Email='$email', SDT='$phone', Tuoi='$age', GioiTinh='$gender' where MaNguoidung='$id'");

    mysqli_query($con,"update tbl_dangnhap set TenDangNhap='$username', MatKhau='$password', LoaiNguoidung='$loai' where MaDN='$id'");
    
    header('location:index.php');
?>