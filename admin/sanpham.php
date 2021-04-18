<link rel="stylesheet" href="css/hienthi_sp.css">
<script type="text/javascript" src="js/checkbox.js"></script>
<?php
	include ('../include/connect.php');
	
    $select = "SELECT * from hanghoa inner join loaihanghoa on hanghoa.MaLoaiHang=loaihanghoa.MaLoaiHang";
    $query = $con->query($select);
    $dem = 0;
	foreach($query  as $value){
		$dem++;
	}
?>
<div class="quanlysp">
	<h3>QUẢN LÝ SẢN PHẨM</h3>
<a href='#' >Thêm sản phẩm</a><br>
	
	<p>Có tổng <font color=red><b><?php echo $dem ?></b></font> sản phẩm</p>
	<form action="admin.php?admin=xulysp" method="post">
		<div id="check">
			<p>
				<input type="submit" name="xoa" value="Xóa" />

			</p>
		</div>
</div>
<table>
    
    <tr class='tieude_hienthi_sp'>
		<td width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></td>
        <td>IDSP</td>
        <td>HÌnh ảnh và Tên SP</td>
        <td>Số lượng</td>
        <td>Đã bán</td>
        <td>Giá</td>
        <td>Danh mục</td>
        <td>Active</td>
    </tr>

    <?php
	

		if(!isset($_GET['page'])){  
		$page = 1;  
		} else {  
		$page = $_GET['page'];  
		}  

		// Chọn số kết quả trả về trong mỗi trang mặc định là 10 
		$max_results = 10;  
		$from = (($page * $max_results) - $max_results);  
		$sql = $con->query("SELECT * FROM hanghoa inner join loaihanghoa on hanghoa.MaLoaiHang=loaihanghoa.MaLoaiHang ORDER by MSHH DESC  LIMIT $from, $max_results"); 



								
    if($dem > 0)
        while ($bien = $sql->fetch_assoc())
        {
?>
            <tr class='noidung_hienthi_sp'>
				<td class="masp_hienthi_sp"><input type="checkbox" name="id[]" class="item" class="checkbox" value="<?=$bien['MSHH']?>"/></td>
                <td class="masp_hienthi_sp"><?php  echo $bien['MSHH'] ?></td>
                <td class="img_hienthi_sp">
                    <img src="../img/uploads/<?php echo $bien['HinhAnh'] ?>"  width='60' height='60'><br>
                    <h4><?php echo $bien['TenHH'] ?></h4>
                </td>
				<td class="sl_hienthi_sp"><?php echo $bien['SoLuongHang'] ?></td>
				<td class="sl_hienthi_sp"><?php echo $bien['DaBan'] ?></td>
                <td class="gia_hienthi_sp"><?php echo number_format($bien['Gia']).' VNÐ' ?></td>
                <td  class="madm_hienthi_sp">
					 
									<?=$bien['TenLoaiHang'] ?>
				</td>
                <td class="active_hienthi_sp">
                    <a href='#'><img src="img/sua.png" title="Sửa"></a>
				</td>
            </tr>
<?php 
    }
	
    else echo "<tr><td colspan='6'>Không có sản phẩm trong CSDL</td></tr>";
	
?>
</table>
</form>
	<div id="phantrang_sp">
	
	<?php
			// Tính tổng kết quả trong toàn DB:  
			// $total = $con->query(("SELECT COUNT(*) as Num FROM hanghoa"),0);  
			// $total_results = count($total->fetch_assoc());

			// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
			$total_pages = ceil($dem / $max_results);  


			// Tạo liên kết đến trang trước trang đang xem 
			if($page > 1){  
			$prev = ($page - 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthisp&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
			}  

			for($i = 1; $i <= $total_pages; $i++){  
			if(($page) == $i){  
				if($i>1) {
						echo "$i&nbsp;";  } 
				
			} else {  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthisp&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
			}  
			}  

			// Tạo liên kết đến trang tiếp theo  
			if($page < $total_pages){  
			$next = ($page + 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthisp&page=$next\"><button class='trang'>Trang sau</button></a>";  
			}  
			echo "</center>";  		
		
	?>
	</div>
