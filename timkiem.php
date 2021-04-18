<?php
if(isset($_GET['timkiem']))
{
  $tim=$_GET['timkiem'];
  switch($_GET['gia'])
  {
	case "1":
		$sql="SELECT * FROM hanghoa WHERE TenHH like '%".$tim."%' and (Gia between '0' and '1000000')";	
	break;
	case "2":
		$sql="SELECT * FROM hanghoa WHERE TenHH like '%".$tim."%'  and (Gia between '1000000' and '3000000')";	
	break;
	case "3":
		$sql="SELECT * FROM hanghoa WHERE TenHH like '%".$tim."%'  and (Gia between '3000000' and '5000000')";	
	break;
	case "4":
		$sql="SELECT * FROM hanghoa WHERE TenHH like '%".$tim."%'  and (Gia between '5000000' and '8000000')";	
	break;
	case "5":
		$sql="SELECT * FROM hanghoa WHERE TenHH like '%".$tim."%'  and (Gia between '8000000' and '10000000')";	
	break;
	case "6":
		$sql="SELECT * FROM hanghoa WHERE TenHH like '%".$tim."%'  and (Gia >= '10000000')";	
	break;
	default:
	  $sql="SELECT * FROM hanghoa WHERE TenHH like '%".$tim."%' ";	
	  break;
  }
  
 
	$rows=$con->query($sql);
	$tr=$con->query($sql);
	$tong=0;
	foreach($tr as $value){
		$tong++;
	}
    if($tong<0)
     echo"Không tìm được sản phẩm nào";
    else
      {
    ?>
	<div class="sanpham">	
	<h2>Từ khóa <font color="yellow"><b><?php echo $tim ?></b></font> : có <?php echo $tong?> kết quả </h2>
	<div class="sanphamcon">
    <?php

        while($row=$rows->fetch_assoc())
        {
?>
		
		<div class="dienthoai">
			<?php 
										if($row['KhuyenMai1']>0)
										{
									?>
									<div class="moi"><h3>-<?php echo $row['KhuyenMai1']?>%</h3></div>
									<?php } ?>
			<a href="index.php?content=chitietsp&idsp=<?php echo $row['MSHH'] ?>"><img  src="img/uploads/<?php echo $row['HinhAnh'];?>"></a>					
			<p><a href="index.php?content=chitietsp&idsp=<?php echo $row['MSHH'] ?>" ><?php echo $row['TenHH'];?></a></p>
			<h4><?php echo number_format(($row['Gia']*((100-$row['KhuyenMai1'])/100)),0,",",".");?></h4>
				<div class="button">
										<ul>
											<li>
												<h1><a href="index.php?content=chitietsp&idsp=<?php echo $row['MSHH'] ?>" class="chitiet"><button>Chi tiết</button></a></h1>
											</li>
											<li>
												<h5><a href="index.php?content=cart&action=add&idsp=<?php echo $row['MSHH'] ?>"><button>Cho vào giỏ</button></a></h5>
											</li>
										</ul>
									</div><!-- End .button-->
		</div><!-- End .dienthoai-->
	<?php } ?>
		</div><!-- End .sanphamcon-->
	</div><!-- End .sanpham-->
 
<?php 
}}
?>
