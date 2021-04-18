<?php
session_start();
if(isset($_SESSION['username']))
{
	

if($_SESSION['phanquyen']==2)
{
	header("location:../index.php");
}
if($_SESSION['phanquyen']==1)
{
	header("location:admin.php");
}
}
?>
<link rel="stylesheet" href="css/login.css" type="text/css">
<div class="body">
    <div class="tieude1">
        <div class="quantri">
            <h2>Đăng nhập quản trị</h2>
        </div>
    </div>
<?php
include("../include/connect.php");

if(isset($_POST['login']))
{
    $username = $_POST['user'];
    $password = MD5($_POST['pass']);
    $sql_check = mysql_query("SELECT * from nguoidung where UserName = '$username'");
    $dem = mysql_num_rows($sql_check);
    if($dem == 0)
    {
        echo "<p class='thongbao1'>Tài khoản không tồn tại</p>";
    }
    else
    {
        $sql_check2 = "SELECT * from nguoidung where UserName = '$username' and Password = '$password'";
		$row=mysql_query($sql_check2);	
        $dem2 = mysql_num_rows($row);
        if($dem2 == 0)
            echo "<p class='thongbao1'>Mật khẩu không chính xác</p>";
        else
        {
	
		 while($rows = mysql_fetch_array($row))
            {
              $_SESSION['username'] = $username;
				$_SESSION['phanquyen'] = $row['PhanqQuyen'];
				$_SESSION['idnd'] = $row['ID_ND'];
                if($rows['phanquyen'] == 1)
                {
                    
					echo "
							<script language='javascript'>
								alert('Đăng nhập quản trị thành công');
								window.open('admin.php','_self', 1);
							</script>
						";
                }
                else
                {
                    
					header('location:../index.php');
                }
            }
        }
    }
}
?>
<div class="admin_login">
    <form action="" method="post">
        <label>Tên tài khoản:</label><input type="text" name="user" placeholder=" Username"><br>
        <label>Mật khẩu:</label><input type="password" name="pass" placeholder=" Password"><br>
        <button name="login" class="dangnhap">Đăng nhập</button><button class="thoat"><a href="../index.php">Thoát</a></button>
    </form>
</div>
</div>
