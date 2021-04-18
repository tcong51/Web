<link rel="stylesheet" href="css/hienthi_sp.css">
<script type="text/javascript" src="js/checkbox.js"></script>
<?php
	include ('../include/connect.php');
	
    
    $query = $con->query("SELECT * from dathang");
    $dem = 0;
	foreach($query  as $value){
		$dem++;
	}
	
?>
<div class="quanlysp">
	<h3>QUẢN LÝ HÓA ĐƠN</h3>
	
	<p>Có tổng <font color=red><b><?php echo $dem ?></b></font> hóa đơn</p><br>
	<form action="admin.php?admin=xulyhd" method="post">
		<div id="check">
			<p>
				<input type="submit" name="giaohang" value="Đã giao hàng" />
				<input type="submit" name="huy" value="Hủy" />
				<input type="submit" name="xoa" value="Xóa" />

			</p>
		</div>
	
</div>
<table>
    
    <tr class='tieude_hienthi_sp'>
        <td width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></td>
        <td>Mã HD</td>
        <td>Họ Tên</td>
        <td>Địa Chỉ</td>
        <td>Điện Thoại</td>
        <td>Email</td>
        <td>Trạng thái</td>
        <td colspan=2>Active</td>
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
		$sql = $con->query("SELECT * FROM dathang ORDER by SoDonDH DESC  LIMIT $from, $max_results"); 



								
    if($dem > 0)
        while ($bien = $sql->fetch_assoc())
        {
?>
            <tr class='noidung_hienthi_sp'>
                <td class="masp_hienthi_sp"><input type="checkbox" name="id[]" class="item" class="checkbox" value="<?=$bien['SoDonDH']?>"/></td>
                <td class="masp_hienthi_sp"><?php  echo $bien['SoDonDH'] ?></td>
                <td class="stt_hienthi_sp"><?php echo $bien['HoTen'] ?></td>
				<td class="sl_hienthi_sp"><?php echo $bien['DiaChi'] ?></td>
				<td class="sl_hienthi_sp">0<?php echo $bien['DienThoai'] ?></td>
				<td class="sl_hienthi_sp"><?php echo $bien['Email'] ?></td>
				<td class="sl_hienthi_sp"><?php if($bien['TrangThai']==1) echo "Đang xử lý"; else if($bien['TrangThai']==2) echo"Đã giao hàng"; else echo"Đã hủy đơn hàng";?></td>
				<td class="active_hienthi_sp" style="width:70px;"><a href="admin.php?admin=chitiethoadon&mahd=<?php echo $bien['SoDonDH']; ?> " style="float:left;">Chi tiết</a>
					
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
		
			// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
			$total_pages = ceil($dem / $max_results);  
			

			// Tạo liên kết đến trang trước trang đang xem 
			if($page > 1){  
			$prev = ($page - 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthihd&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
			}  

			for($i = 1; $i <= $total_pages; $i++){  
			if(($page) == $i){  
			echo "$i&nbsp;";  
			} else {  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthihd&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
			}  
			}  

			// Tạo liên kết đến trang tiếp theo  
			if($page < $total_pages){  
			$next = ($page + 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthihd&page=$next\"><button class='trang'>Trang sau</button></a>";  
			}  
			echo "</center>";  		
		
	?>
	</div>
