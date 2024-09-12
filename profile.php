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
					<h3>Đặt vé</h3>
					<?php include('msgbox.php');?>
					<?php
					$bk=mysqli_query($con,"select * from tbl_datve where MaNguoidung='".$_SESSION['user']."'");
					if(mysqli_num_rows($bk))
					{
					?>
					<table class="table table-bordered">
						<thead>
						<th>Id</th>
						<th>Phim</th>
						<th>Rạp</th>
						<th>Phòng</th>
						<th>Buổi</th>
						<th>Số vé</th>
						<th>Giá</th>
						<th></th>
						</thead>
						<tbody>
						<?php
						while($bkg=mysqli_fetch_array($bk))
						{
							$m=mysqli_query($con,"select * from tbl_phim where MaPhim=(select MaPhim from tbl_lichchieu where MaLichChieu='".$bkg['MaLichChieu']."')");
							$mov=mysqli_fetch_array($m);
							$s=mysqli_query($con,"select * from tbl_phongchieu where MaPhongChieu='".$bkg['MaPhongChieu']."'");
							$srn=mysqli_fetch_array($s);
							$tt=mysqli_query($con,"select * from tbl_rap where MaRap='".$bkg['MaRap']."'");
							$thr=mysqli_fetch_array($tt);
							$st=mysqli_query($con,"select * from tbl_thoigianchieu where MaTgChieu=(select MaTgChieu from tbl_lichchieu where MaLichChieu='".$bkg['MaLichChieu']."')");
							$stm=mysqli_fetch_array($st);
							?>
							<tr>
								<td>
									<?php echo $bkg['MaVe'];?>
								</td>
								<td>
									<?php echo $mov['TenPhim'];?>
								</td>
								<td>
									<?php echo $thr['TenRap'];?>
								</td>
								<td>
									<?php echo $srn['TenPhongChieu'];?>
								</td>
								<td>
									<?php echo $stm['BuoiChieu'];?>
								</td>
								<td>
									<?php echo $bkg['SoChoNgoi'];?>
								</td>
								<td>
									<?php echo $bkg['ThanhTien'];?> VND
								</td>
								<td>
									<?php  if($bkg['NgayDatVe']<date('Y-m-d'))
									{
										?>
										<i class="glyphicon glyphicon-ok"></i>
										<?php
									}
									else
									{?>
									<a href="cancel.php?id=<?php echo $bkg['MaDatVe'];?>">Cancel</a>
									<?php
									}
									?>
								</td>
							</tr>
							<?php
						}
						?></tbody>
					</table>
					<?php
					}
					else
					{
						?>
						<h3>Chưa có vé được đặt</h3>
						<?php
					}
					?>
				</div>
			</div>			
			<div style="height:300px;"><?php include('movie_sidebar.php');?></div>
			</div>
				<div class="clear"></div>		
			</div>
		</div>
	</div>
</div>
<?php include('footer.php');?>
<script type="text/javascript">
	$('#seats').change(function(){
		var charge=<?php echo $screen['Gia'];?>;
		amount=charge*$(this).val();
		$('#amount').html(amount+" VND");
		$('#hm').val(amount);
	});
</script>