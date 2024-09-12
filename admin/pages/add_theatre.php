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
        Thêm Rạp Mới
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Thêm Rạp Mới</li>
      </ol>
    </section>

    <section class="content">

      <div class="box">
        <div class="box-body">
            <form action="process_add_theater.php" method="post" id="form1">
              <div class="form-group">
                <label class="control-label">Tên Rạp</label>
                <input type="text" name="name" class="form-control"/>
                <?php $frm->validate("name",array("required","label"=>"Theatre Name")); ?>
              </div>
              <div class="form-group">
                <label class="control-label">Địa Chỉ</label>
                <input type="text" name="address" class="form-control"/>
                <?php $frm->validate("address",array("required","label"=>"Theatre Address")); ?>
              </div>
              <div class="form-group">
                <label class="control-label">Thành Phố</label>
                <!-- <input type="text" name="place" id="autocomplete" onFocus="geolocate()" class="form-control"> -->
                <input type="text" name="place" class="form-control">
                <?php $frm->validate("place",array("required","label"=>"Place"));?>
              </div>
              <div class="form-group">
                 <label class="control-label">Tình Trạng</label>
                <input type="text" name="state" id="administrative_area_level_1" s placeholder="State" class="form-control">
                <?php $frm->validate("state",array("required","label"=>"State")); ?>
              </div>
              <div class="form-group">
                <label class="control-label">Mã Pin</label>
                 <input type="text" name="pin" id="postal_code"s placeholder="Zip code" class="form-control">
                 <?php $frm->validate("pin",array("required","label"=>"Pin Code","regexp"=>"pin"));  ?>
              </div>

              <?php
                start:
                $username="USR".rand(123456,999999);
                $u=mysqli_query($con,"select * from tbl_dangnhap where TenDangNhap='$username'");
                if(mysqli_num_rows($u))
                {
                  goto start;
                }
              ?>
              <div class="form-group">
                <label class="control-label">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username ?>">
                <?php $frm->validate("username",array("required","label"=>"Username"));?>
              </div>
              <div class="form-group">
                <label class="control-label">Password</label>
                <input type="text" name="password" class="form-control" value="<?php echo "PWD".rand(123456,999999);?>">
                <?php $frm->validate("password",array("required","label"=>"Password")); ?>
              </div>
              <div class="form-group">
                <label class="control-label">Họ Tên</label>
                <input type="text" name="hoten" class="form-control">
                <?php $frm->validate("username",array("required","label"=>"Username"));?>
              </div>
              <div class="form-group">
                <label class="control-label">Email</label>
                <input type="text" name="email" class="form-control">
                <?php $frm->validate("username",array("required","label"=>"Username"));?>
              </div>
              <div class="form-group">
                <label class="control-label">SDT</label>
                <input type="text" name="SDT" class="form-control">
                <?php $frm->validate("username",array("required","label"=>"Username"));?>
              </div>
              <div class="form-group">
                <label class="control-label">Tuổi</label>
                <input type="text" name="tuoi" class="form-control">
                <?php $frm->validate("username",array("required","label"=>"Username"));?>
              </div>
              <div class="form-group">
                <label class="control-label">Giới Tính</label>
                <input type="text" name="gioitinh" class="form-control">
                <?php $frm->validate("username",array("required","label"=>"Username"));?>
              </div>
              
              <div class="form-group">
                <button class="btn btn-success">Thêm Rạp Mới</button>
              </div>
              <input type="hidden" name="country" class="form-control" id="country">
              <input type="hidden" class="field" id="route" disabled="true">
              <input type="hidden" class="field" id="street_number" disabled="true">
              <input type="hidden" class="field" id="locality"disabled="true">
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