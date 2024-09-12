<?php
    session_start();
    include('config.php');
    extract($_POST);
    mysqli_query($con,"insert into  tbl_dangky values(NULL,'$name','$email','$phone','$age','$gender')");
    $id=mysqli_insert_id($con);
    mysqli_query($con,"insert into  tbl_dangnhap values('$id','$id','$email','$password','2')");
    $_SESSION['user']=$id;
    header('location:index.php');
?>