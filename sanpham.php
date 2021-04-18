					

   
		<?php 
	   $sql="SELECT * from loaihanghoa where DeQui=1 order by MaLoaiHang";
	   $result=$con ->query($sql);
					
	 
	    while($row=$result ->fetch_assoc())
		{ 
		?> 	<div class="sanpham"> <?php 
			$sql1="SELECT * from hanghoa where MaLoaiHang={$row['MaLoaiHang']} order by MSHH  LIMIT 0,6";
			$kq=$con ->query($sql1);
			$dem = $kq ->fetch_assoc();
			if($dem>0)
			{
			?>
				
		<h2><?php echo $row["TenLoaiHang"];?></h2> 
			<div id="xemthem">
				<p><a href="index.php?madm=<?php echo $row['MaLoaiHang']?>">Xem thêm >></a></p>
			</div>
		<?php } ?>
    	<div class="sanphamcon">
			<?php while($rows=$kq ->fetch_assoc())
			{ ?>
			<div class="dienthoai">
									<?php 
										if($rows['KhuyenMai1']>0)
										{
									?>
									<div class="moi"><h3>-<?php echo $rows['KhuyenMai1']?>%</h3></div>
									<?php } ?>
									<a href="index.php?content=chitietsp&idsp=<?php echo $rows['MSHH'] ?>"><img  src="img/uploads/<?php echo $rows['HinhAnh'];?>"></a><br>					
									<p><a href="index.php?content=chitietsp&idsp=<?php echo $rows['MSHH'] ?>" ><?php echo $rows['TenHH'];?></a></p><br>
									<h4><?php echo number_format(($rows['Gia']*((100-$rows['KhuyenMai1'])/100)),0,",",".");?></h4>
									<div class="button">
										<ul>
											<li>
												<h1><a href="index.php?content=chitietsp&idsp=<?php echo $rows['MSHH'] ?>" class="chitiet"><button>Chi tiết</button></a></h1>
											</li>
											<li>
												<h5><a href="index.php?content=cart&action=add&idsp=<?php echo $rows['MSHH'] ?>"><button>Cho vào giỏ</button></a></h5>
											</li>
										</ul>
									</div><!-- End .button-->
			</div><!-- End .dienthoai-->
			
			<?php } ?>
			
		</div>
		</div><!-- end san pham-->
<?php }?>