<?php
include('header.php');
?>
  <!-- =============================================== -->

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        View Shows
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">View Shows</li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
         <div class="box-header with-border">
              <h3 class="box-title">Available Shows</h3>
            </div>
        <div class="box-body">
          <?php include('../../msgbox.php');?>
          <?php
          $sw=mysqli_query($con,"select * from tbl_lichchieu where MaTgChieu in(select MaTgChieu from tbl_thoigianchieu where MaPhongChieu in(select MaPhongChieu from  tbl_phongchieu where MaRap='".$_SESSION['theatre']."')) and TrangThai='1'");
          if(mysqli_num_rows($sw))
          {?>
            <table class="table">
              <th class="col-md-1">
                Sl.no
              </th>
              <th class="col-md-2">
                Screen
              </th>
              <th class="col-md-3">
                Show Time
              </th>
              <th class="col-md-3">
                Movie
              </th>
              <th class="col-md-3">
                Options
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
                  <td>
                    <?php if($shows['r_TrangThai']==1)
                    {
                    ?><a href="change_running.php?id=<?php echo $shows['MaLichChieu'];?>&status=0"><button class="btn btn-danger">Stop Running</button></a>
                    <?php
                    }
                    else
                    {?><a href="change_running.php?id=<?php echo $shows['MaLichChieu'];?>&status=1"><button class="btn btn-success">Start Running</button></a>
                    <?php 
                    }?>
                    <a href="stop_running.php?id=<?php echo $shows['MaLichChieu'];?>"><button class="btn btn-warning">Stop Show</button></a>
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
            <h3>No Shows Added</h3>
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