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
        Thêm Phim Sắp Chiếu
      </h1>
      <?php
      if(isset($_SESSION['add']))
      {?>
      <div class="alert alert-success">
  <strong>Thành Công!</strong> Đã thêm thành công..
</div>
<?php
}?>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Trang Chủ</a></li>
        <li class="active">Thêm Phim Sắp Chiếu</li>
      </ol>
    </section>

    <section class="content">

      <div class="box">
        <div class="box-body">
            <form action="process_add_news.php" method="post" enctype="multipart/form-data" id="form1">
              <div class="form-group">
                <label class="control-label">Tên Phim</label>
                <input type="text" name="name" class="form-control"/>
                <?php $frm->validate("name",array("required","label"=>"Movie Name")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                 <label class="control-label">Diễn Viên</label>
                <input type="text" name="cast" class="form-control">
                <?php $frm->validate("cast",array("required","label"=>"Cast","regexp"=>"text")); // Validating form using form builder written in form.php ?>
              </div>
              
              <div class="form-group">
                <label class="control-label">Ngày Khởi Chiếu</label>
                <input type="date" name="date" class="form-control"/>
                <?php $frm->validate("date",array("required","label"=>"Release Date")); // Validating form using form builder written in form.php ?>
              </div>
              
              <div class="form-group">
                <label class="control-label">Thể Loại</label>
                 <input type="text" name="description" class="form-control">
                 <?php $frm->validate("description",array("required","label"=>"Description")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                  <label class="control-label">Hình Ảnh Phim</label>
              <input type="file"  name="attachment" class="form-control" placeholder="Images">
               <?php $frm->validate("attachment",array("required","label"=>"Image")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                <button class="btn btn-success">Thêm Mới</button>
              </div>
        </form>
        </div> 
      </div>

    </section>
  </div>
  <?php
include('footer.php');
?>
<script>
        <?php $frm->applyvalidations("form1");?>
    </script>