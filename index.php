<html>
<body>
<?php
include('header.php');
?>

<div class="content">
	<div class="container">
		<div class="content-top">
				<div class="col">
					<h3>Phim Sắp Chiếu</h3>
					<?php 
					$qry3=mysqli_query($con,"select * from tbl_phimmoi");
					
					while($n=mysqli_fetch_array($qry3))
					{
					?>
					<div class="content-left">
						<div class="col-md-4" >
							<img src="admin/news_images/<?php echo $n['Anh']; ?>" width="90%" height="50%"/>
						</div>
						<div class="col-md-8">
							<div class="extra-wrap">
								<span style="text-color:#000" class="data"><strong><?php echo $n['TenPhimMoi'];?></strong><br>
								<span style="text-color:#000" class="data"><strong>Diễn viên :<?php echo $n['DienVien'];?></strong><br><br>
									<div class="data">Khởi chiếu :<?php echo $n['NgayKhoiChieu'];?></div>
									<span class="text-top"><?php echo $n['TheLoai'];?></span>
							</div>
						</div>
						<div class="clear"></div>
						<br>
					</div>
					<?php
					}
					?>
				</div>
			
					
				<div class="col ">
							<h3>Trailers Phim Hot</h3>
								<div class="middle-list">
							<?php 
							$qry4=mysqli_query($con,"select * from tbl_phim order by rand()");
						
							while($nm=mysqli_fetch_array($qry4))
							{
							?>
								<div class="col-md-4">
									<a target="_blank" href="<?php echo $nm['video_url'];?>"><img src="<?php echo $nm['image'];?>" alt="" width="90%" height="50%"/></a>
								</div>	 
								<div class="col-md-2">

									<a style="color:#a10000;font-size:17px;font-weight: bolder;" target="_blank" href="<?php echo $nm['video_url'];?>" class="link"><?php echo $nm['TenPhim'];?></a>
								</div>
							<?php
							}
							?>
							</div>
							
							
				</div>
				
			<?php include('movie_sidebar.php');?>
		</div>
	</div>
</div>
<?php include('footer.php');?>
</div>
<?php include('searchbar.php');?>