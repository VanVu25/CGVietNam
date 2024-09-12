<?php include('header.php');
	$qry2=mysqli_query($con,"select * from tbl_phim where MaPhim='".$_GET['id']."'");
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
									<a href="<?php echo $movie['video_url']; ?>" target="_blank" class="watch_but">Xem Trailer</a>
								</div>
								<div class="clear"></div>
							</div>
							<?php $s=mysqli_query($con,"select DISTINCT MaRap from tbl_lichchieu where MaPhim='".$movie['MaPhim']."'");
							if(mysqli_num_rows($s))
							{?>
							<table class="table table-hover table-bordered text-center">
							<?php
								
								while($shw=mysqli_fetch_array($s))
								{
									$t=mysqli_query($con,"select * from tbl_rap where MaRap='".$shw['MaRap']."'");
									$theatre=mysqli_fetch_array($t);
									?>
									<tr>
										<td>
											<?php echo $theatre['TenRap'].", ".$theatre['DiaChi'];?>
										</td>
										<td>
											<?php $tr=mysqli_query($con,"select * from tbl_lichchieu where MaPhim='".$movie['MaPhim']."' and MaRap='".$shw['MaRap']."'");
											while($shh=mysqli_fetch_array($tr))
											{
												$ttm=mysqli_query($con,"select  * from tbl_thoigianchieu where MaTgChieu='".$shh['MaTgChieu']."'");
												$ttme=mysqli_fetch_array($ttm);
												
												?>
												
												<a href="check_login.php?show=<?php echo $shh['MaLichChieu'];?>&movie=<?php echo $shh['MaPhim'];?>&theatre=<?php echo $shw['MaRap'];?>"><button class="btn btn-default"><?php echo date('h:i A',strtotime($ttme['ThoiGianChieu']));?></button></a>
												<?php
											}
											?>
										</td>
									</tr>
									<?php
								}
							?>
						</table>
							<?php
							}
						
							else
							{
								?>
								<h3>Chưa có suất chiếu</h3>
								<?php
							}
							?>
						
					</div>			
				<?php include('movie_sidebar.php');?>
			</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
<?php include('footer.php');?>