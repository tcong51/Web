<link rel="stylesheet" href="css/hienthi_sp.css">
<?php
	include ('../include/connect.php');
	
    $select = "SELECT * from chitietdathang where SoDonDH={$_GET['mahd']}";
    $query = $con->query($select);
    $dem = 0;
    $q1 =$con->query($select);
    foreach($q1 as $value){
        $dem++;
    }
?>
<div class="quanlysp">
	<h3>CHI TIẾT HÓA ĐƠN</h3>
	
</div>
<table>
    
    <tr class='tieude_hienthi_sp'>
        <td>Mã HD</td>
        <td>Tên sản phẩm</td>
        <td>Số lượng</td>
        <td>Giá</td>
        <td>Thành tiền</td>
    </tr>

    <?php
	


			$tong=0;					
    if($dem > 0){
        while ($bien = $query->fetch_assoc())
        {
		$thanhtien=$bien['ThanhGia'];
		$tong+=$thanhtien;
?>

            <tr class='noidung_hienthi_sp'>
                <td class="masp_hienthi_sp"><?php  echo $bien['SoDonDH'] ?></td>
                <td class="stt_hienthi_sp"><?php echo $bien['TenSP'] ?></td>
				<td class="sl_hienthi_sp"><?php echo $bien['SoLuong'] ?></td>
				<td class="sl_hienthi_sp"><?php echo number_format($bien['Gia'],0,",",".") ?></td>
				<td class="sl_hienthi_sp"><?php echo number_format($thanhtien,0,",",".") ?></td>
                
            </tr>
<?php 

		}
		
	?>
		<tr>
			<td colspan=5 align="right" style="padding:10px 20px 10px 0px; font-size:20px;">Tổng: <font color="red"><?php echo number_format($tong,0,",",".") ?></font></td>
		</tr>
	<?php 
	}
    else echo "<tr><td colspan='6'>Không có sản phẩm trong CSDL</td></tr>";
	
?>
</table>
<div id="inhoadon">
	<p style="float:right; margin-top:10px; padding-right:30px;"><a href="inhd.php?mahd=<?=$_GET['mahd']?>" target="_blank">In hoá đơn</a></p>
</div>


