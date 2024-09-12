<?php
include('header.php');
?>
  <!-- =============================================== -->

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Lịch Chiếu Hôm Nay
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Thông Tin Lịch Chiếu</li>
      </ol>
    </section>

    <section class="content">

      <div class="box">
         <div class="box-header with-border">
              <h3 class="box-title">Lịch Chiếu</h3>
            </div>
        <div class="box-body">
          <?php
          $sw=mysqli_query($con,"select * from tbl_lichchieu where MaTgChieu in(select MaTgChieu from tbl_thoigianchieu where MaPhongChieu in(select MaPhongChieu from tbl_phongchieu where MaRap='".$_SESSION['theatre']."')) and TrangThai='1' and r_TrangThai='1'");
          if(mysqli_num_rows($sw))
          {?>
            <table class="table">
              <th class="col-md-1">
                Mã Số
              </th>
              <th class="col-md-2">
                Tên Rạp
              </th>
              <th class="col-md-3">
                Thời Gian
              </th>
              <th class="col-md-3">
                Tên Phim
              </th>
              <?php
              $sl=1;
              while($shows=mysqli_fetch_array($sw))
              {
                ?>
                <tr>
                  <td>
                    <?php echo $sl; $sl++;?>
                  </td>
                  <?php
                  $st=mysqli_query($con,"select * from tbl_thoigianchieu where MaTgChieu='".$shows['MaTgChieu']."'");
                  $show_time=mysqli_fetch_array($st);
                  $sr=mysqli_query($con,"select * from tbl_phongchieu where MaPhongChieu='".$show_time['MaPhongChieu']."'");
                  $screen=mysqli_fetch_array($sr);
                  $mv=mysqli_query($con,"select * from tbl_phim where MaPhim='".$shows['MaPhim']."'");
                  $movie=mysqli_fetch_array($mv);
                  ?>
                  <td>
                    <?php echo $screen['TenPhongChieu'];?>
                  </td>
                  <td>
                    <?php echo date('h:i A',strtotime($show_time['ThoiGianChieu']))." ( ".$show_time['BuoiChieu']." Show )";?>
                  </td>
                  <td>
                    <?php echo $movie['TenPhim'];?>
                  </td>
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
            <h3>Không Có Lịch Chiếu</h3>
            <?php
          }
          ?>
        </div> 
      </div>

    </section>
  </div>
  <?php
include('footer.php');
?>