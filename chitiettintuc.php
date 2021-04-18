<?php 

	$matt=$_GET['matt'];
	$select=$con->query("select * from tintuc where MaTT='".$matt."'");
	while($row=$select->fetch_assoc())
	{
?>
<div class="chitiettintuc">
	<h3><?php echo $row['TieuDe'] ?></h3>
	<div class="noidungchitiettintuc">
		<img src="img/tintuc/<?php echo $row['HinhAnh']?>" width="200" height="200">
		<p><?php echo $row['NDNgan'] ?></p>
	</div>
	<div class="noidungfull">
		<p><?php echo $row['NoiDung'] ?></p>
		<span>Tác giả: <?php echo $row['TacGia'] ?></span>
	</div>
</div>
<?php } ?>