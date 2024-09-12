 <?php
 include('../../config.php');
    $sr=mysqli_query($con,"select * from tbl_thoigianchieu where MaPhongChieu='".$_POST['screen']."'");
    if(mysqli_num_rows($sr))
    {
        while($time=mysqli_fetch_array($sr))
        {
            ?>
            <option value="<?php echo $time['MaTgChieu'];?>"><?php echo $time['BuoiChieu']."( ".$time['ThoiGianChieu']." )";?></option>
            <?php
        }
    }
    else {
        ?>
        <option disabled>Không Có Lịch Chiếu Nào Trong Phòng Chiếu</option>
        <?php
    }
    ?>