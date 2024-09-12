<?php
include('header.php');
?>
  <!-- =============================================== -->

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Danh Sách Phim
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Danh Sách Phim Và User</li>
      </ol>
    </section>

    <section class="content">

      <div class="box">
        <div class="box-body">
            <div class="box box-primary">
            <div class="box-body">
              <?php include('../../msgbox.php');?>
              <ul class="todo-list">
                 <?php 
                        $qry7=mysqli_query($con,"select * from tbl_phim");
                        if(mysqli_num_rows($qry7))
                        {
                        while($c=mysqli_fetch_array($qry7))
                        {
                        ?>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <span class="text"><?php echo $c['TenPhim'];?></span>
                  
                  <div class="tools">
                    
                    <button class="fa fa-trash-o" onclick="del(<?php echo $c['MaPhim'];?>)"></button>
                  </div>
                </li>
                  <?php
                       }}
                     ?>
                      
            </div>
          </div>
        </div> 
      </div>

    </section>
    <section class="content-header">
      <h1>
        User
      </h1>
    </section>
    <section class="content">

      <div class="box">
        <div class="box-body">
            <div class="box box-primary">
            <div class="box-body">
              <?php include('../../msgbox.php');?>
              <ul class="todo-list">
                 <?php 
                        $qry7=mysqli_query($con,"select * from tbl_dangnhap");
                        if(mysqli_num_rows($qry7))
                        {
                        while($c=mysqli_fetch_array($qry7))
                        {
                        ?>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <span class="text"><?php echo $c['TenDangNhap'];?></span>
                  
                  <div class="tools">
                    
                    <button class="fa fa-trash-o" onclick="delUser(<?php echo $c['MaDN'];?>)"></button>
                  </div>
                </li>
                  <?php
                       }}
                     ?>
                      
            </div>
          </div>
        </div> 
      </div>

    </section>
  </div>
  <?php
include('footer.php');
?>
<script>
function del(m)
    {
        if (confirm("Bạn có muốn xóa phim này?") == true) 
        {
            window.location="process_delete_movie.php?mid="+m;
        } 
    }
    function delUser(m)
    {
        if (confirm("Bạn có muốn xóa user này?") == true) 
        {
            window.location="process_delete_user.php?mid="+m;
        } 
    }
    </script>