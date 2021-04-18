 
  <?php

    $loi=0;
     foreach($_SESSION['cart'] as $stt => $soluong)
            {
               
               $sql="select SoLuongHang,TenHH,DaBan from hanghoa where MSHH=$stt";
               $rows=$con->query($sql);
               $row=$rows->fetch_assoc();
               $sl=$_SESSION['cart'][$stt];
               if($row['SoLuongHang']==0 or ($row['SoLuongHang']-$row['DaBan'])<$sl)
               {
               echo '<meta http-equiv="refresh" content="2;index.php?content=cart">';
               echo "Sản phẩm <font color='red'><b>". $row['TenHH']."</b></font> đã hết hoặc không đủ hàng trong kho<br><br>";
               $loi+=1;
               }
            }
     if($loi==0)
      echo '<meta http-equiv="refresh" content="0;index.php?content=cart&action=thanhtoan">';
   
            ?>