<?php 
	$idsp=$_GET['idsp'];
	$rows=$con ->query("SELECT * from hanghoa where MSHH=$idsp");
	while ($row=$rows->fetch_assoc())
	{
?>

<div class="chitietsp">
	<div class="chitietsp-in">
		<div class="content">
			<div class="zoom-small-image">
				<a href='img/uploads/<?php echo $row['HinhAnh'] ?>' width="300" height="300"  class = 'cloud-zoom' id='zoom1' rel="adjustX: 10, adjustY:-4">
					<img src="img/uploads/<?php echo $row['HinhAnh'] ?>" width="250" height="250"  alt='' title="Optional title display" />
				</a>
			</div>
			<div class="giasp">
				<ul>
					<p> <?php echo $row['TenHH'] ?></p>
					<li><span><b>Giá: <font color="red"><?php echo number_format(($row['Gia']*((100-$row['KhuyenMai1'])/100)),0,",",".");?></b></font></span></li>
					<li>Tình trạng: 
						<?php 
							$dem = $row['SoLuongHang'] - $row['DaBan'];
							if( $dem >0)
								echo "Số sản phẩm còn (".$dem.")";
							else 
								echo "Hết hàng";
						?>
					</li>
					<form action="index.php?content=cart&action=add&idsp=<?php echo $row['MSHH'] ?>" method="post">
					<li>Số lượng mua : <input type="text" name="soluongmua" size="1" value="1" /></li>
					<li>
					<?php 
						if($dem <=0)
							echo "<a href='index.php?content=hethang'><button>Cho vào giỏ</button></a>
							";
						else { ?>
							<input type="submit" value="Cho vào giỏ" name="chovaogio" class="inputmuahang" />
							<?php } ?>
					</li>
					</form>
				</ul>
			</div>
		</div>
		<div class="tinhnang">
			<div class="tieudetinhnang">
				<ul class="tabs">
				<li><a href="#tab1">Tính năng</a></li>
				<li><a href="#tab2">Bình luận </a></li>
				</ul>
			</div>
			
			<div id="tab1">
				<?php echo $row['QuyCach'] ?>
			</div>
			
		</div>
	</div>
</div>
<?php } ?>