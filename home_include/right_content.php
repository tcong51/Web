﻿ <div id="dangnhap">
					<div class="center1">
						<h4>ĐĂNG NHẬP</h4>
						<?php if(isset( $_SESSION['username'])){
							?>
								<div id="dangnhap-in">
								<span id="xinchao"><p>Xin chào: <span> <?php echo $_SESSION['username'] ?> </span></p></span>
								<span id="logout"><p><a href="logout.php">Logout</a></p></span>
						</div><!-- End .dangnhap-in-->
							<?php 
						}
						else{
						?>
						<div id="dangnhap-in">
							<form action="dangnhap.php" method="post">
								<span><p>Username: <input type="text" size="10" name="user"></p> <br>
								<p>Password: <input type="password" size="10" name="pass"></p> <br></span>
								<a href="index.php?content=dangnhap"><button name="login">Đăng nhập</button></a><br>
							</form>
							<ul>
								<li><a href="index.php?content=dangky">Đăng ký</a></li>
							</ul>
						</div><!-- End .dangnhap-in-->
						<?php } ?>
					</div><!-- End .center1-->
				</div><!-- End .giohang-->
				<div id="giohang">
					<div class="center1">
						<h4>GIỎ HÀNG</h4>
							<a href="index.php?content=cart"><img src="img/images.jpg" title="Vào giỏ hàng" width="150" height="100px"></a>
							<?php 
								$tongtien=0;
								if(isset($_SESSION['cart']))
								$count=count($_SESSION['cart']);
								else $count=0;
								if($count==0){
							?>
							<p>Không có sản phẩm</p>
							<?php } 
							else {
							?>
							<p id="soluonggioh ang">Có <span><?=$count?></span> sản phẩm trong giỏ</p>
							 
							<p id="tiengiohang">
							 <?php $sql ="select * from hanghoa where MSHH in(";
        
		foreach($_SESSION['cart'] as $id => $soluong)
            {
              if($soluong>0)
                $sql .= $id.",";
            }
            if (substr($sql,-1,1)==',')
            {
                $sql = substr($sql,0,-1);
            }
      $sql .=' )order by MSHH 	';
      $rows=$con->query($sql);
while ($row=$rows->fetch_assoc())
{  
$tongtien+=$_SESSION['cart'][$row['MSHH']]*$row['Gia']; 
}
?> <?php  echo number_format($tongtien,"0",",",".");?> VNĐ
							</p>
							

          
					<?php } ?>		
							
					</div><!-- End .center1-->
				</div><!-- End .giohang-->
				<div id="timkiem">
					<div class="center1">
						<h4>TÌM KIẾM </h4>
							<div id="select">
								<form action="index.php?content=timkiem" method="GET">
								<input type="hidden" name="content" value="timkiem">
								<input type="text" name="timkiem" />
								<div id="select2">
									<select name="gia">
										<option value="0"> - Chọn giá - </option>
										<option value="1">  < 1.000.000</option>
										<option value="2">1.000.000 - 3.000.000</option>
										<option value="3">3.000.000 - 5.000.000</option>
										<option value="4">5.000.000 - 8.000.000</option>
										<option value="5">8.000.000 - 10.000.000</option>
										<option value="6"> > 10.000.000</option>
									</select>
									<input type="submit" name="btntk" value="Tìm kiếm" />
								</form>
								</div><!-- End .select2-->
							</div><!-- End .select-->
					
					</div><!-- End .center1-->
				</div><!-- End .timkiem-->
				
				<div id="yahoo">
					<div class="center1">
						<h4>HOTLINE</h4>
						<h2><a href="ymsgr:sendim?anhchanglangtu_yeubetocvang&amp;m=g&amp;t=14"><img src="img/imonline.png"></a></h2>
							<p>0909090909</p>
						<h2><a href="ymsgr:sendim?boydangyeu8188&amp;m=g&amp;t=14"><img src="img/imonline.png"></a></h2>
							<p>0809080908</p>
					</div><!-- End .center1-->
				</div><!-- End .yahoo -->
				
				<div id="fb-root">

				</div>