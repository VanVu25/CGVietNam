<?php
    include('../../config.php');
    extract($_POST);
    mysqli_query($con,"insert into  tbl_rap values(NULL,'$name','$address','$place','$state','$pin')");
    $id=mysqli_insert_id($con);
    mysqli_query($con,"insert into tbl_dangky values(NULL,'$hoten','$email','$SDT','$tuoi', '$gioitinh')");
    $id2=mysqli_insert_id($con);
    mysqli_query($con,"insert into tbl_dangnhap values($id2,$id,'$username','$password',1)");
    header('location:add_theatre_2.php?id='.$id);
?>