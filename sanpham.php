﻿					

   
		<?php 
	   $sql="SELECT * from danhmuc where dequi=1 order by madm";
	   $result=$con ->query($sql);
					
	 
	    while($row=$result ->fetch_assoc())
		{ 
		?> 	<div class="sanpham"> <?php 
			$sql1="SELECT * from sanpham where madm={$row['madm']} order by idsp  LIMIT 0,6";
			$kq=$con ->query($sql1);
			$dem = $kq ->fetch_assoc();
			if($dem>0)
			{
			?>
				
		<h2><?php echo $row["tendm"];?></h2> 
			<div id="xemthem">
				<p><a href="index.php?madm=<?php echo $row['madm']?>">Xem thêm >></a></p>
			</div>
		<?php } ?>
    	<div class="sanphamcon">
			<?php while($rows=$kq ->fetch_assoc())
			{ ?>
			<div class="dienthoai">
									<?php 
										if($rows['khuyenmai1']>0)
										{
									?>
									<div class="moi"><h3>-<?php echo $rows['khuyenmai1']?>%</h3></div>
									<?php } ?>
									<a href="#"><img  src="img/uploads/<?php echo $rows['hinhanh'];?>"></a><br>					
									<p><a href="#" ><?php echo $rows['tensp'];?></a></p><br>
									<h4><?php echo number_format(($rows['gia']*((100-$rows['khuyenmai1'])/100)),0,",",".");?></h4>
									<div class="button">
										<ul>
											<li>
												<h1><a href="index.php?content=chitietsp&idsp=<?php echo $rows['idsp'] ?>" class="chitiet"><button>Chi tiết</button></a></h1>
											</li>
											<li>
												<h5><a href="index.php?content=cart&action=add&idsp=<?php echo $rows['idsp'] ?>"><button>Cho vào giỏ</button></a></h5>
											</li>
										</ul>
									</div><!-- End .button-->
			</div><!-- End .dienthoai-->
			
			<?php } ?>
			
		</div>
		</div><!-- end san pham-->
<?php }?>