<?php
include('header.php');
?>
<link rel="stylesheet" href="../../validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="../../validation/dist/js/bootstrapValidator.js"></script>
  <!-- =============================================== -->
  <?php
    include('../../form.php');
    $frm=new formBuilder;      
  ?> 
  <!-- =============================================== -->

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
      Thêm Lịch Chiếu
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Thêm Lịch Chiếu</li>
      </ol>
    </section>

    <section class="content">

      <div class="box">
        <div class="box-body">
          <?php include('../../msgbox.php');?>
          <form action="process_addshow.php" method="post" id="form1">
<!--  -->
            <div class="form-group">
              <label class="control-label">Chọn Phim</label>
              <select name="movie" class="form-control">
                <option value>Chọn Phim</option>
                <?php
                  $mv=mysqli_query($con,"select * from tbl_phim where TrangThai='0'");
                  while($movie=mysqli_fetch_array($mv))
                  {
                    ?>
                    <option value="<?php echo $movie['MaPhim'];?>"><?php echo $movie['TenPhim']; ?></option>
                    <?php
                  }
                ?>
              </select>
              <?php $frm->validate("movie",array("required","label"=>"Movie")); ?>
            </div>
<!--  -->
            <div class="form-group">
              <label class="control-label">Chọn Phòng Chiếu</label>
              <select name="screen" class="form-control" id="screen">
                <option value>Chọn Phòng Chiếu</option>
                <?php
                  $sc=mysqli_query($con,"select * from tbl_phongchieu where MaRap='".$_SESSION['TenPhongChieu']."'");
                  while($screen=mysqli_fetch_array($sc))
                  {
                    ?>
                    <option value="<?php echo $screen['MaPhongChieu']; ?>"><?php echo $screen['TenPhongChieu']; ?></option>
                    <?php
                  }
                ?>
              </select>
              <?php $frm->validate("screen",array("required","label"=>"Screen"));  ?>
            </div>
  <!--  -->
            <div class="form-group">
              <label class="control-label">Chọn Lịch Chiếu</label>
              <select name="stime[]" class="form-control" id="stime" multiple>
                <option value="0">Chọn Lịch Chiếu</option>
              </select>
              
            </div>
            <div class="form-group">
              <label class="control-label">Ngày Bắt Đầu</label>
              <input type="date" name="sdate" class="form-control"/>
              <?php $frm->validate("sdate",array("required","label"=>"Start Date")); ?>
            </div>

            <div class="form-group">
              <button class="btn btn-success">Thêm Lịch Chiếu</button>
            </div>
          </form>
        </div> 
      </div>

    </section>
  </div>
  <?php
include('footer.php');
?>
<script type="text/javascript">
  $('#screen').change(function(){
    screen=$(this).val();
    $.ajax({
			url: 'get_showtime.php',
			type: 'POST',
			data: 'screen='+screen,
			dataType: 'html'
		})
		.done(function(data){
			$('#stime').html(data);    
		})
		.fail(function(){
			$('#stime').html('<option><i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...</option>');
		});
  });
</script>
<script>
        <?php $frm->applyvalidations("form1");?>
    </script>