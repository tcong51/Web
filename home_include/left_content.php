
 <div id="danhmucsp">
					<div class="center">
					<h4>SẢN PHẨM</h4>
					<?php 
						
						include("include/connect.php");
						?>	
					<?php 
					
					   $sql="SELECT * FROM LoaiHangHoa WHERE DeQui=1";
					   $result= $con->query($sql);
					?>
						<ul>
						<?php 
						  foreach($result as $row)
						   {
						?>
							<li><a href="index.php?madm=<?php echo $row['MaLoaiHang'] ?>"><?php echo $row["TenLoaiHang"];?></a></li>
							<?php } ?>
							
							
						</ul>
					</div><!-- End .center -->
				</div>	<!-- End .menu-left -->
				
				<div id="phukien">
					<div class="center">
						<h4> PHỤ KIỆN</h4>
						<?php 
					   $sql="SELECT * from LoaiHangHoa where DeQui=2";
					   $result= $con->query($sql);
					?>
						<ul>
						<?php 
						   foreach($result as $row)
						   {
						?>
							<li><a href="index.php?madm=<?php echo $row['MaLoaiHang'] ?>"><?php echo $row["TenLoaiHang"];?></a></li>
							<?php } ?>
							
						</ul>
					</div><!-- End .center -->
				</div><!-- End .phukien -->	
				
				<div id="quangcao1">
					<div class="center">
						<a href="#"> <img src="img/quangcao.png" alt="quangcao" title="quangcao"> </a>
					
						<a href="#"> <img src="img/quangcao2.png" alt="quangcao2" title="quangcao2"> </a>
					</div><!-- End .center -->
				</div><!-- End .quangcao1 -->