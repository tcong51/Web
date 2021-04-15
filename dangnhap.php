<?php
session_start();
include("include/connect.php");
if(isset($_POST['login']))
{
    $username = $_POST['user'];
    $password = MD5($_POST['pass']);
    $sql_check = $con ->query("SELECT * from nguoidung where username = '$username'");
    $dem =$sql_check ->fetch_assoc();
    if($dem == 0)
    {
        $_SESSION['thongbaolo'] = "Tài khoản không thồn tại";
		echo "
							<script language='javascript'>
								alert('Tài khoản không tồn tại');
								window.open('index.php','_self', 1);
							</script>
						";
    }
    else
    {
        $sql_check2 = $con ->query("SELECT * from nguoidung where username = '$username' and password = '$password'");
        $dem2 = $sql_check2 ->fetch_assoc();
		
        if($dem2 == 0)
			echo "
							<script language='javascript'>
								alert('Mật khẩu đăng nhập không đúng');
								window.open('index.php','_self', 1);
							</script>
						";
        else
        {
            // $row = $sql_check2 ->fetch_assoc();
			
                $_SESSION['username'] = $username;
				$_SESSION['phanquyen'] = $dem2['phanquyen'];
				$_SESSION['idnd'] = $dem2['idnd'];
		
                
                if($_SESSION['phanquyen']==1)
					{
						echo "
							<script language='javascript'>
								alert('Đăng nhập thành công');
								window.open('index.php','_self', 1);
							</script>
						";
					}
                else
                {
					echo "
					<script language='javascript'>
						alert('Đăng nhập thành công');
						 window.open('admin/admin.php','_self', 1);
					</script>
				";
                   
                }
            }
        }
    }
	
?>