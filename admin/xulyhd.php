<?php
	if(isset($_POST['id']))
	{
	foreach($_POST['id'] as $mahd)
	{
		$_SESSION['id'][$mahd]=1;
	}

		if(isset($_POST['giaohang']))
		{
			foreach($_SESSION['id'] as $mahd=>$value)
			{
				if ($value==1)
				$sql="update dathang set TrangThai=2 where SoDonDH='$mahd'";
				$con->query($sql);
				unset($_SESSION['id']);
				echo "
							<script language='javascript'>
								alert('Đã giao hàng');
								window.open('admin.php?admin=hienthihd','_self', 1);
							</script>
						";
			}
		}
		else if(isset($_POST['huy']))
			{ 
				foreach($_SESSION['id'] as $mahd=>$value)
				{
					if ($value==1)
					$sql="update dathang set TrangThai=3 where SoDonDH='$mahd'";
					$con->query($sql);
					unset($_SESSION['id']);
					echo "
							<script language='javascript'>
								alert('Đã huỷ đơn hàng');
								window.open('admin.php?admin=hienthihd','_self', 1);
							</script>
						";
				}
			}
			else
					{
						foreach($_SESSION['id'] as $mahd=>$value)
						{
							if ($value==1)
							$sql="DELETE from dathang where SoDonDH='$mahd'";
							$con->query($sql);
							$sql1="DELETE from chitietdathang where SoDonDH='$mahd'";
							$con->query($sql1);
							unset($_SESSION['id']);
							echo "
							<script language='javascript'>
								alert('Xóa thành công');
								window.open('admin.php?admin=hienthihd','_self', 1);
							</script>
						";
						}
			
					}

			}		else echo "
							<script language='javascript'>
								alert('Bạn chưa chọn hóa đơn cần xử lý');
								window.open('admin.php?admin=hienthihd','_self', 1);
							</script>
						";
		
?>