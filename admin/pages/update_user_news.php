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
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Sửa user
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Sửa user</li>
      </ol>
    </section>

    <section class="content">
      
      <div class="box">
        <div class="box-body">
         
            <div class="form-group">
              
              <label class="control-label">Chọn User</label>
              <form action="getiduser.php" method="post" id="form1">
              <select name="idDN" class="form-control">
                <option value>Hãy chọn user</option>
                  <?php
                    $qry12=mysqli_query($con,"select * from tbl_dangnhap");
                    if(mysqli_num_rows($qry12))
                    {
                      while($c=mysqli_fetch_array($qry12))
                      {
                  ?>
                  <option><?php echo $c['TenDangNhap']?></option>
                  <?php
                      }
                    }
                  ?>
                </select>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <br>
                <button class="btn btn-success">Chọn</button>
                </form>
            </div>
            

            <form action="process_update_user.php" method="post" id="form1">
            
            <?php
                    $idDN = "";
                    if(empty($_SESSION['idDN']))
                    {

                    }else{
                      $idDN = $_SESSION['idDN'];
                    }
                    
                    if($idDN == "")
                    {?>
                    
                      <div class="form-group">
                      <label class="control-label">Tên</label>
                      <input name="name" type="text" size="25" placeholder="Tên" class="form-control" />
                      <?php $frm->validate("name",array("required","label"=>"Name","regexp"=>"name")); ?>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Tuổi</label>
                      <input name="age" type="text" size="25" placeholder="Tuổi" class="form-control"/>
                      <?php $frm->validate("age",array("required","label"=>"Age","regexp"=>"age")); ?>
                    </div>
                    <div class="form-group">
                    <label class="control-label">Giới tính</label>
                    <select name="gender" class="form-control">
                      <option value>Hãy chọn giới tính</option>
                      <option>Nam</option>
                      <option>Nữ</option>
                      </select>
                      <?php $frm->validate("gender",array("required","label"=>"Gender")); ?>
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Sdt</label>
                      <input name="phone" type="text" size="25" placeholder="Số điện thoại" class="form-control"/>
                      <?php $frm->validate("phone",array("required","label"=>"Mobile Number","regexp"=>"mobile")); ?>
                      <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Email</label>
                      <input name="email" type="text" size="25" placeholder="Email" class="form-control"/>
                      <?php $frm->validate("email",array("required","label"=>"Email","email")); ?>
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Mật khẩu</label>
                      <input name="password" type="password" size="25" placeholder="Mật khẩu" class="form-control" placeholder="Password" />
                      <?php $frm->validate("password",array("required","label"=>"Password","min"=>"7")); ?>
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Loại tài khoản</label>
                      <input name="cpassword" type="password" size="25" placeholder="Loại tài khoản" class="form-control" placeholder="Password" />
                      <?php $frm->validate("cpassword",array("required","label"=>"Confirm Password","min"=>"7","identical"=>"password Password")); ?>
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                    <button class="btn btn-success">Sửa tài khoản</button>
                  </div>
              <?php
                    }else
                    {
                    $us=mysqli_query($con,"select * from tbl_dangnhap where TenDangNhap='$idDN'");
                    $user=mysqli_fetch_array($us);
                    $idDN2 = $user['MaDN'];
                    $username = $user['TenDangNhap'];
                    $pass = $user['MatKhau'];
                    $loai = $user['LoaiNguoidung'];
                    $qry12=mysqli_query($con,"select * from tbl_dangky where MaNguoidung = '$idDN2'");
                    if(mysqli_num_rows($qry12))
                    {
                      while($c=mysqli_fetch_array($qry12))
                      {
                  ?>

              <div class="form-group">
                <label class="control-label">Id</label>
                <input name="id" type="text" size="25" class="form-control" value ="<?php echo $idDN2;?>" readonly/>
              </div>    
              <div class="form-group">
                <label class="control-label">Tên</label>
                <input name="name" type="text" size="25" placeholder="Tên" class="form-control" value ="<?php echo $c['HoTen'];?>" />
                <?php $frm->validate("name",array("required","label"=>"Name","regexp"=>"name")); ?>
              </div>
              <div class="form-group">
                <label class="control-label">Tuổi</label>
                <input name="age" type="text" size="25" placeholder="Tuổi" class="form-control" value ="<?php echo $c['Tuoi'];?>"/>
                <?php $frm->validate("age",array("required","label"=>"Age","regexp"=>"age")); ?>
              </div>
              <div class="form-group ">
              <label class="control-label">Giới tính</label>
              <select name="gender" class="form-control" value ="<?php echo $c['GioiTinh'];?>">
                <option>Nam</option>
                <option>Nữ</option>
                </select>
                <?php $frm->validate("gender",array("required","label"=>"Gender")); ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group">
                <label class="control-label">Sdt</label>
                <input name="phone" type="text" size="25" placeholder="Số điện thoại" class="form-control" value ="<?php echo $c['SDT'];?>"/>
                <?php $frm->validate("phone",array("required","label"=>"Mobile Number","regexp"=>"mobile")); ?>
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
              </div>
              <div class="form-group">
                 <label class="control-label">Email</label>
                 <input name="email" type="text" size="25" placeholder="Email" class="form-control" value ="<?php echo $c['Email'];?>"/>
                <?php $frm->validate("email",array("required","label"=>"Email","email")); ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group">
                <label class="control-label">Tên đăng nhập</label>
                <input name="username" type="text" size="25" placeholder="Tên" class="form-control" value ="<?php echo $username;?>" />
              </div>
              <div class="form-group">
                <label class="control-label">Mật khẩu</label>
                <input name="password" type="password" size="25" placeholder="Mật khẩu" class="form-control" placeholder="Password" value ="<?php echo $pass;?>"/>
                <?php $frm->validate("password",array("required","label"=>"Password","min"=>"7")); ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="form-group">
                <label class="control-label">Loại tài khoản</label>
                <input name="loai" type="text" size="25" placeholder="Loại" class="form-control" value ="<?php echo $loai;?>" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              

              <div class="form-group">
                <button class="btn btn-success">Sửa tài khoản</button>
              </div>
              <?php
                      }
                    }
                  }
                  ?>
            </form>
        </div> 
      </div>

    </section>
  </div>
  <?php
include('footer.php');
?>
 <script>
      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'long_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfO40iueprTDv0WCf0BCIlbj56JO-HylA&libraries=places&callback=initAutocomplete"
            async defer></script>
            <script>
        <?php $frm->applyvalidations("form1");?>
    </script>