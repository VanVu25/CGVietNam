<?php
    include('../../config.php');
    extract($_POST);
    mysqli_query($con,"insert into tbl_thoigianchieu values(NULL,'$screen','$sname','$time')");
?>