	<?php 
		if(isset($_GET['action']))
    {    $action=$_GET['action'];}
    else $action=""; 
		if(isset($_GET['content']))
				{
					switch ($_GET['content'])
					{
						case "gioithieu":
							include ('gioithieu.php');
							break;
						case "timkiem":
							include ('timkiem.php');
							break;
						case "dangky":
							include ('dangky.php');
							break;
						case "dangnhap":
							include ('dangnhap.php');
							break;
						case "chitietsp":
							include ('chitietsp.php');
							break;
						case "cart":
							include ('cart/index.php');
							break;
						case "hotro":
							include ('hotro.php');
							break;
						case "sanpham":
							include ('sanpham.php');
							break;
						case "phukien":
							include ('phukien.php');
							break;
						case "tintuc":
							include ('tintuc.php');
							break;
						case "chitiettintuc":
							include ('chitiettintuc.php');
							break;
						case "hethang":
							include ('hethang.php');
							break;
						case "khuyenmai":
							include ('khuyenmai.php');
							break;
					}
				}
			elseif(isset($_GET['madm'])) {
					$sql = "SELECT * FROM hanghoa  WHERE MaLoaiHang='{$_GET['madm']}'";	
					$sql1 = "SELECT * FROM hanghoa  WHERE MaLoaiHang='{$_GET['madm']}'";	
					$sql1 = $con ->query($sql1);
					$dem = 0;
					foreach($sql1 as $value){
						$dem++;
					}
				
					if(isset($GET['madm']))
					{
						$sql.="WHERE MaLoaiHang='".$_GET['madm']."'";
					}
						if(!isset($_GET['page'])){  
						$page = 1;  
						} else {  
						$page = $_GET['page'];  
						}  
						// Chọn số kết quả trả về trong mỗi trang mặc định là 10 
						$max_results = 12;  
						// Tính số thứ tự giá trị trả về của đầu trang hiện tại 
						$from = (($page * $max_results) - $max_results);  
						$sql.=  "LIMIT $from, $max_results";
					$query=$con ->query($sql);
					$total=$query->fetch_assoc();
					
					if($total>0)
					{
					?>						
						<div class="sanpham">	
							<?php
							$sql1="SELECT TenLoaiHang from LoaiHangHoa where MaLoaiHang='{$_GET['madm']}'";
							$query1=$con ->query($sql1);
							$row=$query1->fetch_assoc();
						
							?>
						<h2><?php echo $row['TenLoaiHang']?></h2>
							<div class="sanphamcon">
								
								<?php 
								  foreach($query as $result)
								  { ?>
								
								<div class="dienthoai">
									<?php 
										if($result['KhuyenMai1']>1)
										{
									?>
									<div class="moi"><h3>-<?php echo $result['KhuyenMai1']?>%</h3></div>
									<?php } ?>
									<a href="index.php?content=chitietsp&idsp=<?php echo $result['MSHH'] ?>"><img  src="img/uploads/<?php echo $result['HinhAnh'];?>"></a>				
									<p><a href="index.php?content=chitietsp&idsp=<?php echo $result['MSHH'] ?>" ><?php echo $result['TenHH'];?></a></p>
									<h4><?php echo number_format(($result['Gia']*((100-$result['KhuyenMai1'])/100)),0,",",".");?></h4>
									<div class="button">
										<ul>
											<li>
												<h1><a href="index.php?content=chitietsp&idsp=<?php echo $result['MSHH'] ?>" class="chitiet"><button>Chi tiết</button></a></h1>
											</li>
											<li>
												<h5><a href="index.php?content=cart&action=add&idsp=<?php echo $result['MSHH'] ?>"><button>Cho vào giỏ</button></a></h5>
											</li>
										</ul>
									</div><!-- End .button-->
								</div><!-- End .dienthoai-->
								<?php } ?>
								
							</div><!-- End .sanphamcon-->
							
						</div><!-- End .sanpham-->
						<div class="phantrang">
						<?php 
						// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
						$total_pages = ceil($dem/$max_results);  
						// Tạo liên kết đến trang trước trang đang xem 
						if($page > 1){  
						$prev = ($page - 1);  
						echo "<a href=\"".$_SERVER['PHP_SELF']."?madm=".$_GET['madm']."&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
						}  
						for($i = 1; $i <= $total_pages; $i++){  
						if(($page) > $i){							
						echo "$i&nbsp;"; 
						} else {  
						echo "<a href=\"".$_SERVER['PHP_SELF']."?madm=".$_GET['madm']."&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
						}  
						}  
						// Tạo liên kết đến trang tiếp theo  
						if($page < $total_pages){  
						$next = ($page + 1);  
						echo "<a href=\"".$_SERVER['PHP_SELF']."?madm=".$_GET['madm']."&page=$next\"><button class='trang'>Trang sau</button></a>";  
						}  
						echo "</center>";  	
						// ?>
						 </div>			<?php 
					}
					else {echo "Không có sản phẩm nào";}
				}
				else {
		
	?>
				<div class="sanpham">			
						<h2>ĐIỆN THOẠI BÁN CHẠY</h2>
					<div class="sanphamcon">
					    <?php 
						    $sql1="SELECT * FROM hanghoa INNER JOIN LoaiHangHoa ON hanghoa.MaLoaiHang = LoaiHangHoa.MaLoaiHang WHERE DeQui=1 ORDER BY DaBan  DESC LIMIT 6 ";
							$result1= $con->query($sql1);
						?>
						<?php 
						  foreach($result1 as $row)
						  { ?>
						
						<div class="dienthoai">
							<?php 
										if($row['KhuyenMai1']>0)
										{
									?>
									<div class="moi"><h3>-<?php echo $row['KhuyenMai1']?>%</h3></div>
									<?php } ?>
							<h1><a href="index.php?content=chitietsp&idsp=<?php echo $row['MSHH'] ?>"><img  src="img/uploads/<?php echo $row['HinhAnh'];?>"></a></h1>				
							<p><a href="index.php?content=chitietsp&idsp=<?php echo $row['MSHH'] ?>" ><?php echo $row['TenHH'];?></a></p>
							<h4>Giá: <?php echo number_format(($row['Gia']*((100-$row['KhuyenMai1'])/100)),0,",",".");?></h4>
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
				
				<!------------------------------------------------------------------------------------------------------------------->
                <div class="sanpham">			
						<h2>ĐIỆN THOẠI MỚI</h2>
					<div class="sanphamcon">
					    <?php 
						    $sql1="SELECT * from hanghoa inner join LoaiHangHoa on hanghoa.MaLoaiHang = LoaiHangHoa.MaLoaiHang where DeQui=1 order by MSHH  DESC limit 6 ";
							$result1= $con ->query($sql1);
						?>
						<?php 
						  foreach($result1 as $row)
						  { ?>
						
						<div class="dienthoai">
							<?php 
										if($row['KhuyenMai1']>0)
										{
									?>
									<div class="moi"><h3>-<?php echo $row['KhuyenMai1']?>%</h3></div>
									<?php } ?>
							<h1><a href="index.php?content=chitietsp&idsp=<?php echo $row['MSHH'] ?>"><img  src="img/uploads/<?php echo $row['HinhAnh'];?>"></a></h1>				
							<p><a href="index.php?content=chitietsp&idsp= <?php echo $row['MSHH'] ?>" ><?php echo $row['TenHH'];?></a></p>
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
	<?php } ?>