
<div class="panel panel-default">
            <div class="panel-body" id="disp"><?php
    extract($_POST);
    include('../../config.php');
    $w=mysqli_query($con,"select * from tbl_lichchieu where MaTgChieu='$id' and r_TrangThai='1'");
    $swt=mysqli_fetch_array($w);
    $qq=mysqli_query($con,"select * from tbl_datve where MaLichChieu='".$swt['MaLichChieu']."' and Ngay=CURDATE()");
    if(mysqli_num_rows($qq))
    {
        $m=mysqli_query($con,"select * from tbl_phim where MaPhim='".$swt['MaPhim']."'");
        $movie=mysqli_fetch_array($m);
        ?>
        
         <h3><small>Tên Phim : </small><?php echo $movie['TenPhim'];?></h3>
        <table class="table">
            <th>
                Slno
            </th>
            <th>
                Mã Vé
            </th>
            <th>
                Tên Khách Hàng
            </th>
            <th>
                Điện Thoại
            </th>
            <th>
                Số Chỗ Ngồi
            </th>
        <?php
    $sl=1;
    while($sh=mysqli_fetch_array($qq))
    {
        $us=mysqli_query($con,"select * from tbl_dangky where MaNguoidung='".$sh['MaNguoidung']."'");
        $user=mysqli_fetch_array($us);
        ?>
        <tr>
            <td><?php echo $sl; $sl++;?></td>
            <td><?php echo $sh['MaVe'];?></td>
            <td><?php echo $user['HoTen'];?></td>
            <td><?php echo $user['SDT'];?></td>
            <td><?php echo $sh['SoChoNgoi'];?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
    }
    else
    {
        ?>
        <h3>Không Có Ai Đặt Vé</h3>
        <?php
    }
?></div>
          </div>