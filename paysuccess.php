
<?php include('header.php');?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="content">
  <div class="wrap">
    <div class="content-top">
          <?php
          session_start();
          if(!isset($_SESSION['user']))
          {
            header('location:login.php');
          }
          include('config.php');
          extract($_POST);
              $bookid="BKID".rand(1000000,9999999);
              mysqli_query($con,"insert into tbl_datve values(NULL,'$bookid','".$_SESSION['theatre']."','".$_SESSION['user']."','".$_SESSION['show']."','".$_SESSION['screen']."','".$_SESSION['seats']."','".$_SESSION['amount']."','".$_SESSION['date']."',CURDATE(),'1')");
              $_SESSION['success']="Đặt vé thành công!!";
            ?>
    </div>
  </div>
</div>
<?php include('footer.php');?>
<script>
    setTimeout(function(){ window.location="profile.php"; }, 2000);
</script>