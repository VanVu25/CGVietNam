<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
	$qry2=mysqli_query($con,"select * from tbl_phim where MaPhim='".$_SESSION['movie']."'");
	$movie=mysqli_fetch_array($qry2);
	?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">	
						<h3><?php echo $movie['TenPhim']; ?></h3>	
							<div class="about-top">	
								<div class="grid images_3_of_2">
									<img src="<?php echo $movie['image']; ?>" alt=""/>
								</div>
								<div class="desc span_3_of_2">
									<p class="p-link" style="font-size:15px">Diễn viên : <?php echo $movie['DienVien']; ?></p>
									<p class="p-link" style="font-size:15px">Khởi chiếu : <?php echo date('d-M-Y',strtotime($movie['NgayKhoiChieu'])); ?></p>
									<p style="font-size:15px"><?php echo $movie['TheLoai']; ?></p>
									<a href="<?php echo $movie['video_url']; ?>" target="_blank" class="watch_but">Watch Trailer</a>
								</div>
								<div class="clear"></div>
							</div>
							<table class="table table-hover table-bordered text-center">
							<?php
								$s=mysqli_query($con,"select * from tbl_lichchieu where MaLichChieu='".$_SESSION['show']."'");
								$shw=mysqli_fetch_array($s);
								
									$t=mysqli_query($con,"select * from tbl_rap where MaRap='".$shw['MaRap']."'");
									$theatre=mysqli_fetch_array($t);
									?>
									<tr>
										<td class="col-md-6">
											Rạp
										</td>
										<td>
											<?php echo $theatre['TenRap'].", ".$theatre['DiaChi'];?>
										</td>
										</tr>
										<tr>
											<td>
												Phòng
											</td>
										<td>
											<?php 
												$ttm=mysqli_query($con,"select  * from tbl_thoigianchieu where MaTgChieu='".$shw['MaTgChieu']."'");
												
												$ttme=mysqli_fetch_array($ttm);
												
												$sn=mysqli_query($con,"select  * from tbl_phongchieu where MaPhongChieu='".$ttme['MaPhongChieu']."'");
												
												$screen=mysqli_fetch_array($sn);
												echo $screen['TenPhongChieu'];
							
												?>
										</td>
									</tr>
									<tr>
										<td>
											Ngày
										</td>
										<td>
											<?php 
											if(isset($_GET['date']))
							{
								$date=$_GET['date'];
							}
							else
							{
								if($shw['NgayKhoiChieu']>date('Y-m-d'))
								{
									$date=date('Y-m-d',strtotime($shw['NgayKhoiChieu'] . "-1 days"));
								}
								else
								{
									$date=date('Y-m-d');
								}
								$_SESSION['dd']=$date;
							}
							?>
							<div class="col-md-12 text-center" style="padding-bottom:20px">
								<?php if($date>$_SESSION['dd']){?><a href="booking.php?date=<?php echo date('Y-m-d',strtotime($date . "-1 days"));?>"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i></button></a> <?php } ?><span style="cursor:default" class="btn btn-default"><?php echo date('d-M-Y',strtotime($date));?></span>
								<?php if($date!=date('Y-m-d',strtotime($_SESSION['dd'] . "+4 days"))){?>
								<a href="booking.php?date=<?php echo date('Y-m-d',strtotime($date . "+1 days"));?>"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-right"></i></button></a>
								<?php }
								$av=mysqli_query($con,"select sum(SoChoNgoi) from tbl_datve where MaLichChieu='".$_SESSION['show']."' and NgayDatVe='$date'");
								$avl=mysqli_fetch_array($av);
								?>
							</div>
										</td>
									</tr>
									<tr>
										<td>
											Thời gian
										</td>
										<td>
											<?php echo date('h:i A',strtotime($ttme['ThoiGianChieu']))." ".$ttme['BuoiChieu'];?>
										</td>
									</tr>
									<tr>
										<td>
											Số ghế ngồi
										</td>
										<td>
											<form  action="process_booking.php" method="post">
												<input type="hidden" name="screen" value="<?php echo $screen['MaPhongChieu'];?>"/>
											<input type="number" required tile="Number of Seats" max="<?php echo $screen['ChoNgoi']-$avl[0];?>" min="0" name="seats" class="form-control" value="1" style="text-align:center" id="seats"/>
											<input type="hidden" name="amount" id="hm" value="<?php echo $screen['Gia'];?>"/>
											<input type="hidden" name="date" value="<?php echo $date;?>"/>
										</td>
									</tr>
									<tr>
										<td>
											Thành tiền
										</td>
										<td id="amount" style="font-weight:bold;font-size:18px">
											<?php echo $screen['Gia'];?> VND
										</td>
									</tr>
									<tr>
										<td colspan="2"><?php if($avl[0]==$screen['ChoNgoi']){?><button type="button" class="btn btn-danger" style="width:100%">House Full</button><?php } else { ?>
										<button class="btn btn-info" style="width:100%">Đặt ngay</button>
										<?php } ?>
										</form></td>
									</tr>
						<table>
							<tr>
								<td></td>
							</tr>
						</table>
					</div>			
				<?php include('movie_sidebar.php');?>
			</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
<?php include('footer.php');?>
<script type="text/javascript">
	$('#seats').change(function(){
		var charge=<?php echo $screen['Gia'];?>;
		amount=charge*$(this).val();
		$('#ThanhTien').html(amount + " VND");
		$('#hm').val(amount);
	});
</script>