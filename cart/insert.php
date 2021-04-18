
<?php
if($action="insert")
{
$hoten=$_POST['hoten'];
$dienthoai=$_POST['dienthoai'];
$diachi=$_POST['diachi'];
$email=$_POST['email'];
$phuongthuc=$_POST['phuongthuc'];
$ngay=date('Y-m-d');
		if(isset($_SESSION['idnd'])){
		
		
			$sql=$con->query("SELECT * from nguoidung where ID_ND='".$_SESSION['idnd']."'");
			$row=$sql->fetch_assoc();
			
			$idnd=$row['ID_ND'];
	
$sql="INSERT INTO dathang(ID_ND,HoTen,DiaChi,DienThoai,Email,NgayDH,TrangThai) VALUES 
('$idnd','$hoten', '$diachi', '$dienthoai', '$email', '$ngay','1')";

}
	else 
	$sql="INSERT INTO dathang(HoTen,DiaChi,DienThoai,Email,NgayDH,TrangThai) VALUES 
('$hoten', '$diachi', '$dienthoai', '$email', '$ngay','1')";
        $con->query($sql);
        $mahd=mysqli_insert_id($con);
    foreach($_SESSION['cart'] as $stt => $soluong)
            {
               $sql="SELECT * from hanghoa where MSHH=$stt";
               $rows=$con->query($sql);
               $row=$rows->fetch_assoc();
               $tensp=$row['TenHH'];
               $mshh =$row['MSHH'];
               $gia=$row['Gia'];
               $km=$row['KhuyenMai1'];
               $thanhgia=$gia*((100-$km)/100);
               $sql1 ="insert into chitietdathang(SoDonDH,MSHH,TenSP,SoLuong,Gia,GiamGia,ThanhGia,PhuongThucThanhToan) values('$mahd','$mshh','$tensp','$soluong','$gia','$km','$thanhgia','$phuongthuc')";
              $con->query($sql1);
              
            }
    foreach($_SESSION['cart'] as $stt => $soluong)
            {
               
               $sql="select * from hanghoa where MSHH=$stt";
               $rows=$con->query($sql);
               $row=$rows->fetch_assoc();
               $ban=$row['DaBan']+$soluong;
               $sql="UPDATE hanghoa SET DaBan='$ban' WHERE MSHH = $stt";
               
               $con->query($sql);
            }

unset($_SESSION['cart']);
}
?>
<?php 
echo "
							<script language='javascript'>
								alert('Đơn hàng của bạn đã thiết lập thành công chúng tôi sẽ chuyển hàng cho bạn trong thời gian sớm nhất');
								window.open('index.php','_self',3);
							</script>
						";
?>
