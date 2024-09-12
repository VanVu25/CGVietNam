
<html>
<body>
<?php
include('header.php');
?>

<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form" >
				  	<h3>LIÊN HỆ CHÚNG TÔI</h3>
							<form action="process_contact.php" method="post" name="form11" >
								<div>
									<span><label>TÊN</label></span>
									<span><input type="text" value="" required name="name"></span>
								</div>
								<div>
									<span><label>E-MAIL</label></span>
									<span><input type="text" value="" required name="email"></span>
								</div>
								<div>
									<span><label>SỐ ĐIỆN THOẠI</label></span>
									<span><input type="number" value="" required name="mobile"></span>
								</div>
								<div>
									<span><label>NỘI DUNG</label></span>
									<span><textarea required name="subject"> </textarea></span>
								</div>
								<div>
										<button name="btnSend" type="submit">Gửi</button>
								</div>
							</form>
						<?php
							if(isset($_SESSION['success']))
							{?>
								<br><br>
								<div class="alert alert-success alert-dismissible" id='hideMe'>
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-check"></i> Thành công!</h4>
									<?php echo $_SESSION['success'];?>
								</div>
							<?php 
							
								unset($_SESSION['success']);
							}
						?>
				  </div>
  				</div>
				<div class="col span_1_of_3">
					<div class="contact_info">
    	 				<h3>Chúng tôi ở đây</h3>
					    	  <div class="map">
							  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1099.7499368916901!2d106.62826029371745!3d10.806472950491905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752be27d8b4f4d%3A0x92dcba2950430867!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBUaOG7sWMgcGjhuqltIFRQLkhDTQ!5e0!3m2!1svi!2s!4v1684250728498!5m2!1svi!2s" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							  </div>
      				</div>
				 </div>
			  </div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
<?php include('footer.php');?>
