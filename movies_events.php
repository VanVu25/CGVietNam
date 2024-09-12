<?php 
	include('header.php');
	include("Pages.php");
    $sql= mysqli_query($con,"select TenPhim, image from tbl_phim");

    //XL phân trang
    $p = new Pages();
	//giới hạn phim 1 trang
    $limit = 3;
	//tổng số phim
    $count = $sql->num_rows;
    $vt=$p->findStart($limit);
    $pages = $p->findPages($count,$limit);
    $cur = $_GET["page"];
    $phantrang = $p->pageList($cur,$pages);
?>

<div class="content">
	<div class="container">
		<div class="content-top">
			<h3>Movies</h3>
			
			<?php
          	 $today=date("Y-m-d");
          	 $qry2=mysqli_query($con,"select * from  tbl_phim limit $vt, $limit");
		
          	  while($m=mysqli_fetch_array($qry2))
                {
                    ?>
						<div class="col col-md-3 " >
							<div class="imageRow">
									<div class="single" >
										<a href="about.php?id=<?php echo $m['MaPhim'];?>"><img src="<?php echo $m['image'];?>"  height="300px" width="200px" /></a>
									</div>
									<div class="movie-text">
										<h4 class="h-text" style="width:200px;"><a href="about.php?id=<?php echo $m['MaPhim'];?>"><?php echo $m['TenPhim'];?></a></h4>
										
										
									</div>
							</div>
						</div>
						
  	    			<?php
  	    		}
  	    	?>
		</div>
	</div>
	<div style="margin:50px; text-align:center;font-size: 30px;">
		<?php echo $phantrang;?>
	</div>
</div>		
<div>
	<div class="clear"></div>		
</div>
<?php include('footer.php');?>