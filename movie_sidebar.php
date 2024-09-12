
 			<div class="col">
					<h3>Phim Đang Chiếu</h3>
					
					<?php
					$today=date("Y-m-d");
					$qry2=mysqli_query($con,"select * from  tbl_phim where TrangThai='0' order by rand() limit 3");
								
					while($m=mysqli_fetch_array($qry2))
						{
                    ?>
            <div class="content-left">
					<div class="col-md-4">
						 <a href="about.php?id=<?php echo $m['MaPhim'];?>"><img src="<?php echo $m['image'];?>" width="250px" height="290px"></a>
					</div>
					<div class="col-md-8">
						  	<div class="extra-wrap1" >
									<a style="color:#a10000;font-size:17px;font-weight: bolder;" href="about.php?id=<?php echo $m['MaPhim'];?>" ><?php echo $m['TenPhim'];?><br>
									<span class="data" style="color:#a10000;">Khởi chiếu:<?php echo $m['NgayKhoiChieu'];?></span><br>
									Diễn viên:<Span class="data" style="color:#a10000"><?php echo $m['DienVien'];?></span><br>
									Thể loại: <span" class="color2" style="text-decoration: none;color:#a10000;"><?php echo $m['TheLoai'];?></span></a><br>
							</div>
					</div>
					
				<div class="clear"></div>
				<br>
			</div>
					<?php
						}
						?>
			</div>		
			
