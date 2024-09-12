<?php
include('header.php');
?>
  <!-- =============================================== -->

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Quản Lý Rạp Chiếu Phim
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Home</li>
      </ol>
    </section>

    <section class="content">

      <div class="box">
        <div class="box-body">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Phim Đang Chiếu</h3>
            </div>
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th class="col-md-1">Mã Số</th>
                  <th class="col-md-3">Thời Gian Chiếu</th>
                  <th class="col-md-4">Tên Rạp</th>
                  <th class="col-md-4">Tên Phim</th>
                </tr>
                <?php 
					$qry8=mysqli_query($con,"select * from tbl_lichchieu where r_TrangThai=1 and MaRap='".$_SESSION['theatre']."'");
					$no=1;
					while($mn=mysqli_fetch_array($qry8))
					{
					 $qry9=mysqli_query($con,"select * from tbl_phim where MaPhim='".$mn['MaPhim']."'");
					 $mov=mysqli_fetch_array($qry9);
					 $qry10=mysqli_query($con,"select * from tbl_thoigianchieu where MaTgChieu='".$mn['MaTgChieu']."'");
					 $scr=mysqli_fetch_array($qry10);
					 $qry11=mysqli_query($con,"select * from tbl_phongchieu where MaPhongChieu='".$scr['MaPhongChieu']."'");
					 $scn=mysqli_fetch_array($qry11);
					?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><span class="badge bg-green"><?php echo $scn['TenPhongChieu'];?></span></td>
                  <td><span class="badge bg-light-blue"><?php echo $scr['ThoiGianChieu'];?>(<?php echo $scr['BuoiChieu'];?>)</span></td>
                  <td><?php echo $mov['TenPhim'];?></td>
                  </tr>
                  <?php
					       $no=$no+1;
					  
					}
                  ?>
              </table>
            </div>
          </div>
            
            
        </div> 
      </div>

    </section>
  </div>
  <?php
include('footer.php');
?>