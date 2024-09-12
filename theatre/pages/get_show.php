<?php
    extract($_POST);
    include('../../config.php');
    $w=mysqli_query($con,"select * from tbl_thoigianchieu where MaPhongChieu='$id'");
    ?>
    <option value="0">Chọn Lịch Chiếu</option>
    <?php
    while($sh=mysqli_fetch_array($w))
    {
        ?>
        <option value="<?php echo $sh['MaTgChieu'];?>"><?php echo $sh['BuoiChieu'];?></option>
        <?php
    }
?>