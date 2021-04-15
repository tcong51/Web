
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
		
		
			$sql=$con->query("select * from nguoidung where idnd='".$_SESSION['idnd']."'");
			$row=$sql->fetch_assoc();
			
			$idnd=$row['idnd'];
	
$sql="INSERT INTO hoadon(idnd,hoten,diachi,dienthoai,email,ngaydathang,trangthai) VALUES 
('$idnd','$hoten', '$diachi', '$dienthoai', '$email', '$ngay','1')";

}
	else 
	$sql="INSERT INTO hoadon(hoten,diachi,dienthoai,email,ngaydathang,trangthai) VALUES 
('$hoten', '$diachi', '$dienthoai', '$email', '$ngay','1')";

$con->query($sql);
	
    foreach($_SESSION['cart'] as $stt => $soluong)
            {
               $sql="select * from sanpham where idsp=$stt";
               $rows=$con->query($sql);
               $row=$rows->fetch_assoc();
               $tensp=$row['tensp'];
        
               $gia=$row['gia']*((100-$row['khuyenmai1'])/100);
               $sql1 ="insert into chitiethoadon(mahd,Tensp,Soluong,gia,phuongthucthanhtoan) values('$mahd','$tensp','$soluong','$gia','$phuongthuc')";
              $con->query($sql1);
              
            }
    foreach($_SESSION['cart'] as $stt => $soluong)
            {
               
               $sql="select * from sanpham where idsp=$stt";
               $rows=$con->query($sql);
               $row=$rows->fetch_assoc();
               $ban=$row['daban']+$soluong;
               $sql="UPDATE sanpham SET daban='$ban' WHERE idsp = $stt";
               
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
