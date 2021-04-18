<base href="http://localhost/dienthoai/" />
<?php 
session_start();
include("include/connect.php");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<html xmlns:fb="http://ogp.me/ns/fb#">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Bán Điện Thoại </title>
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<link rel="stylesheet" style="style/sheet" href="css/index.css">

<link rel="stylesheet" style="style/sheet" href="slide/engine/style.css">
<script type="text/javascript" src="slide/engine/wowslider.js"></script>
<script type="text/javascript" src="slide/engine/wowslider.mod.js"></script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<script src="js/newsScrollerDefault-rightToleft-bottomTotop.js" type="text/javascript"></script>
<script src="js/newsScrollerEdit-leftToright-topTobottom.js" type="text/javascript"></script>

<script type="text/javascript" src="js/zoom/cloud-zoom.1.0.2.js"></script>
<link href="css/cloud-zoom.css" rel="stylesheet" type="text/css" />

<script>

$(document).ready(function(){

$('ul.tabs').each(function(){


var $active, $content, $links = $(this).find('a');


$active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);

$active.addClass('active');

$content = $($active.attr('href'));


$links.not($active).each(function () {

$($(this).attr('href')).hide();

});
$(this).on('click', 'a', function(e){
$active.removeClass('active');
$content.hide();
$active = $(this);
$content = $($(this).attr('href'));
$active.addClass('active');
$content.show();
e.preventDefault();

});

});

});

</script>

<!-------------------------------------slide-------------------------------->
<link rel="stylesheet" style="style/sheet" href="css/style1.css">
<script language="javascript" type="text/javascript" src="js/jquery.easing.js"></script>
<script language="javascript" type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">
 $(document).ready( function(){	
		var buttons = { previous:$('#lofslidecontent45 .lof-previous') ,
						next:$('#lofslidecontent45 .lof-next') };
						
		$obj = $('#lofslidecontent45').lofJSidernews( { interval : 4000,
												direction		: 'opacitys',	
											 	easing			: 'easeInOutExpo',
												duration		: 2000,
												auto		 	: true,
												maxItemDisplay  : 4,
												navPosition     : 'horizontal', // horizontal
												navigatorHeight : 32,
												navigatorWidth  : 80,
												mainWidth:1000,
												buttons			: buttons} );	
	});
</script>
</head>
<body style="background:white">
<div id="wapper">
	<div id="header">
		<div id="lg-header">
			<h1><a href="index.php">logo</a></h1>
		</div>
		<!-- End .bg-lg-header -->
		<div id="bg-header">	
		</div><!-- End .bg-header -->
			<div id="menu-header">
			<?php include("home_include/menu_ngang.php"); ?>
				<!-- End .menu -->
			</div><!-- End .menu-header -->
	</div><!-- End .header -->
	<div id="content">
		<div id="lofslidecontent45" class="lof-slidecontent" style="width:1000px; height:350px;">
			<div class="preload"><div></div></div>
				<div id="lof-main-outer">
					<ul class="lof-main-wapper">
						<li><img src="img/slide/slide1.png" width="1000" height="350"></li>
						<li><img src="img/slide/slide.png" width="1000" height="350"></li>
						<li><img src="img/slide/slide2.png" width="1000" height="350"></li>
						<li><img src="img/slide/slide3.png" width="1000" height="350"></li>
						<li><img src="img/slide/slide4.png" width="1000" height="350"></li>
					</ul>
				</div>
				<div class="lof-navigator-wapper">

					<div onClick="return false" href="" class="lof-next">Next</div>
					  <div class="lof-navigator-outer">
							<ul class="lof-navigator">
							   <li><img src="img/slide/slide1.png" width="70" height="25" /></li>       		
							   <li><img src="img/slide/slide.png" width="70" height="25" /></li>       		
							   <li><img src="img/slide/slide2.png" width="70" height="25" /></li>       		
							   <li><img src="img/slide/slide3.png" width="70" height="25" /></li>       		
							   <li><img src="img/slide/slide4.png" width="70" height="25" /></li>       		
							</ul>
					  </div>
					<div onClick="return false" href="" class="lof-previous">Previous</div>
				</div> 
		</div>
		<div id="main-content">
			<div id="left-content">
				<?php include("home_include/left_content.php");?>
			</div><!-- End .left-content -->
			
			<div id="center-content">
				
				<?php include("content_page.php"); ?>
				<!-------------------------------------------------------------------------------------------------------------------->
			</div><!-- End .center-content -->
			
			<div id="right-content">
				<?php include("home_include/right_content.php"); ?>
			</div><!-- End .right-content-->
		</div><!-- End .main-content -->
		<div id="doitac">
			<div id="center2">
				<div id="doitaccon">
					<h4>ĐỐI TÁC</h4>
					<div id="thanhdoc">
						<img src="img/thanhdoc.png">
					</div>
					<div class="boxeSlide" style="overflow:hidden;">
							<div class="sildeShow">
								<ul id="random">
									<li> 
										<a href="https://www.samsung.com/vn/" target="_blank"><img src="img/samsung.png" alt="Sam Sung" title="Sam Sung" /></a>
									</li>
									<li> 
										<a href="https://www.sony.com.vn/" target="_blank"><img src="img/sony.png" alt="Sony" title="Sony" /></a>
									</li>
										<li> 
										<a href="https://www.lg.com/vn" target="_blank"><img src="img/lg.png" alt="LG" title="LG" /></a>
									</li>
										<li> 
										<a href="https://www.nokia.com/" target="_blank" ><img src="img/nokia.png" alt="Nokia" title="Nokia" /></a>
									</li>
								</ul>
							</div><!--End .sildeShow-->
					</div><!--End .boxeSlide-->
				</div><!-- End .doitaccon -->
			</div><!-- End .center2 -->
		</div><!-- End .bottom-content -->
	</div><!-- End .content -->
	<div id="footer">
		<div id="menu-footer">
			<ul>
				<li><a href="index.php">TRANG CHỦ</a></li>
				<li><a href="index.php?content=gioithieu">GIỚI THIỆU</a></li>
				<li><a href="index.php?content=sanpham">SẢN PHẨM</a>
				<li><a href="index.php?content=phukien">PHỤ KIỆN</a></li>
				<li><a href="index.php?content=khuyenmai">KHUYỂN MÃI</a></li>
				<li><a href="index.php?content=tintuc">TIN TỨC</a></li>
				<li><a href="index.php?content=hotro">HỖ TRỢ</a></li>
			</ul>
		</div><!-- End .menu-footer -->
		<div id="bg-footer">
			<div id="noidungfooter">
				<div id="lg-footer">
					<h3><a href="index.php">logo</a></h3>
				</div><!-- End .lg-footer -->
				<div id="noidung">
					<ul>
						<li><span id="tencongty">Công Ty TNHH ĐIỆN THOẠI TCZONE</span></li> <br>
						
						<li>Địa chỉ: Ninh Kiều - Cần Thơ </li>
						<li>Điện thoại: 0909090909 - Hotline:  0809090808</li>
						<li>Email:  dienthoaizone@gmail.com</li>
					</ul>
				</div><!-- End .noidung -->
				<div id="thanhngang">
					<img src="img/thanhngang-footer.png">
				</div><!-- End .thanhngang -->
				<div id="copyright">
					<p>Sinh Viên : Đỗ Thành Công | Gmail : tcong91999@gmail.com<p>
				</div><!-- End .copyright -->
			</div><!-- End .noidungfooter -->
		</div><!-- End .bg-footer -->
	</div><!-- End .footer -->
</div><!-- End .wapper -->
</body>
</html>