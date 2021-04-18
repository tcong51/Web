<?php
	include("include/connect.php");
?>
<div class="khuyenmai">
	<table>
	<tr style="height:40px; font-weight:bold; font-size:20px; color:green;">
		<td colspan="6" align="center">SẢN PHẨM KHUYẾN MÃI</td>
	</tr>
	<tr style="background:green; height:30px; color:white;">
		<td>ID</td>
		<td>Tên SP</td>
		<td>Giảm giá</td>
		<td>Khuyến mãi</td>
		<td>Giá KM</td>
	</tr>
	
	<?php

		$sql=  "select * from hanghoa";
		$query=$con->query($sql);
		$total=$query ->fetch_assoc();
		$idsp=1;
		while($row=$query ->fetch_assoc())
		{
			
			if($row['KhuyenMai2']!="")
			{
				?><tr>
					<td><?php echo $idsp++; ?></td>
					<td><p style="padding-top:5px; padding-bottom:5px;"><a href="index.php?content=chitietsp&idsp=<?php echo $row['MSHH'] ?>"><?php echo $row['TenHH'] ?></a></p></td>
					<td><?php echo $row['KhuyenMai1'] ?> %</td>
					<td><p style="padding-top:5px; padding-bottom:5px;"><?php echo $row['KhuyenMai2'] ?></p></td>
					<td><?php echo number_format(($row['Gia']*((100-$row['KhuyenMai1'])/100)),0,",",".");?></</td>
				
				</tr>
				<?php 
			}
			else if($row['KhuyenMai1']>0)
			{
				?><tr>
					<td><?php echo $idsp++; ?></td>
					<td><p style="padding-top:5px; padding-bottom:5px;"><a href="index.php?content=chitietsp&idsp=<?php echo $row['MSHH'] ?>"><?php echo $row['TenHH'] ?></a></p></td>
					<td><?php echo $row['KhuyenMai1'] ?> %</td>
					<td><p style="padding-top:5px; padding-bottom:5px;"><?php echo $row['KhuyenMai2'] ?></p></td>
					<td><?php echo number_format(($row['Gia']*((100-$row['KhuyenMai1'])/100)),0,",",".");?></</td>
				
				</tr>
				<?php 
			}
				else echo "";		
		}
?>

</table>
		</div>
