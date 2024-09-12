<?php
    include('../../config.php');
    extract($_POST);
    mysqli_query($con,"insert into tbl_phongchieu values(NULL,'$theatre','$name','$seats','$charge')");
?>