<div id="tintuc">
	<h3>Tin Tức</h3>
	<?php
		if(!isset($_GET['page'])){  
		$page = 1;  
		} else {  
		$page = $_GET['page'];  
		}  
		$max_results = 10;  
		$from = (($page * $max_results) - $max_results);  
		// Chạy 1 MySQL query để hiện thị kết quả trên trang hiện tại  
		$sql = $con->query("SELECT * FROM tintuc ORDER by matt DESC  LIMIT $from, $max_results"); 
		
		while($row=$sql->fetch_assoc())
		{
	?>
	
	<div class="tintuccon">
		<div class="tintuccon-in">
			<div class="tieudetintuc">
				<p><a href="index.php?content=chitiettintuc&matt=<?php echo $row['matt'] ?>"><?php echo $row['tieude'] ?></a></p>
				<span>Ngày đăng tin: <?php echo $row['ngaydangtin'] ?></span>
			</div>
			<div class="imgtintuc">
				<img src="img/tintuc/<?php echo $row['hinhanh'] ?>" width="300px" height="300px;">
			</div>
			<div class="noidungtintuc">
				
				<span><p> <?php echo $row['ndngan'] ?> </p></span>
				<p class="xemthem"><a href="index.php?content=chitiettintuc&matt=<?php echo $row['matt'] ?>">Xem thêm >></a></p>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<div id="phantrang_sp">
	
	<?php
			$total = $con->query("SELECT *  FROM tintuc");
			$dem = 0;
			foreach($total as $value){
			$dem++;
			}
			// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
			$total_pages = ceil($dem/ $max_results);  
			// Tạo liên kết đến trang trước trang đang xem 
			if($page > 1){  
			$prev = ($page - 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?content=tintuc&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
			}  

			for($i = 1; $i <= $total_pages; $i++){  
			if(($page) == $i){  
			echo "$i&nbsp;";  
			} else {  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?content=tintuc&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
			}  
			}  
			// Tạo liên kết đến trang tiếp theo  
			if($page < $total_pages){  
			$next = ($page + 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?content=tintuc&page=$next\"><button class='trang'>Trang sau</button></a>";  
			}  
			echo "</center>";  		
		
	?>
	</div>