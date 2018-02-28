<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Perfection Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script> 
<!-- //js -->
<!-- start-smoth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--//end-smoth-scrolling-->
</head>
<body>
	<!--popular-->
	<div class="popular">
		<div class="container">
			<h3 class="title" >Show the Weddingdress</h3>
			<div class="col-md-5 popular-left" >
			
			<?php
			header("Content-type:text/html;charset=utf-8");
			include '../conn/conn.php';
			$ProductId=$_REQUEST['ProductId'];
			$ProId=substr($ProductId, 7);
            $result="select ProductPic from productinfo where ProductId=$ProId";
            $r=mysqli_query($link, $result);
            $lsrc=mysqli_fetch_object($r);//obj
            $sqlimg=$lsrc->ProductPic;
            if(strpos($sqlimg, "thumb")){
                $srcf=strstr(substr($sqlimg, 1),"thumb",true);
                $srcb=strstr(substr($sqlimg, 1),"thumb");
                $srcc=substr($srcb, 6);
                $picsrc = $srcf.$srcc;
            }
            else{
                $picsrc=substr($ProductPic, 1);
            }
            $imgsrc="../".$picsrc;
            echo "<img src='$imgsrc' class='img-responsive'  id='showimg'  alt='暂无图片'/>";
			?>
				
			</div>
			<div class="col-md-7 popular-right">
				<div class="popular-grids">
					<div class="col-md-4 popular-text">
						<img src="images/img6.jpg" class="img-responsive" alt="暂无图片"/>
					</div>
					<div class="col-md-8 popular-text pplr-right cl-effect-1">
						<?php
						header("Content-type:text/html;charset=utf-8");
						include '../conn/conn.php';
						$ProductId=$_REQUEST['ProductId'];
						$ProId=substr($ProductId, 7);
						$sql="SELECT `productinfo`.ProductName,producttypeinfo.ProductTypeName FROM productinfo INNER JOIN producttypeinfo ON productinfo.ProductTypeId=producttypeinfo.ProductTypeId WHERE productinfo.ProductId=$ProId";
						$result=mysqli_query($link, $sql);
						$row=mysqli_fetch_row($result);
						$sqlProId=$row[1];
						$ProductName=$row[0];
						echo "</br>";
						echo "<h4>商品名称：$ProductName</h4>";
						echo "</br>";echo "</br>";echo "</br>";echo "</br>";
						echo "<h4>产品类型：$sqlProId</h4>";
						?>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="popular-grids">
					<div class="col-md-4 popular-text">
						<img src="images/img7.jpg" class="img-responsive" alt=""/>
					</div>
					<div class="col-md-8 popular-text pplr-right cl-effect-1">
					<?php 
					header("Content-type:text/html;charset=utf-8");
					include '../conn/conn.php';
					$ProductId=$_REQUEST['ProductId'];
					$ProID=substr($ProductId, 7);
					$query="select  ProductRental,ProductPrice,Storearea from productinfo where ProductId=$ProID";
					$result=mysqli_query($link, $query);
					$row=mysqli_fetch_Object($result);
					$ProductRental=$row->ProductRental;
					$ProductPrice=$row->ProductPrice;
					$Storearea=$row->Storearea;
					echo "</br>";
					echo "<h4>参考价格：$ProductPrice</h4>";
					echo "</br>"; echo "</br>";
					echo "<h4>商品价格：$ProductRental</h4>";
					echo "</br>"; echo "</br>";
					echo "<h4>商品产地：$Storearea</h4>";
					?> 						
					</div>
					<div class="col-md-8 popular-text pplr-right cl-effect-1" id="messg">
					<?php 
					header("Content-type:text/html;charset=utf-8");
					include '../conn/conn.php';
					$ProductId=$_REQUEST['ProductId'];
					$ProID=substr($ProductId, 7);
					$query="select memo from productinfo where ProductId=$ProID";
					$result=mysqli_query($link, $query);
					$row=mysqli_fetch_Object($result);
					$memo=$row->memo;
					echo "</br>";
					echo "<h4  id='messh4'>商品详情:</h4><h4><p>$memo</p></h4>";
					?> 						
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//popular-->
	<!--footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-row">
				<div class="col-md-3 footer-grids">
					<h2><a href="index.html">Perfection</a></h2>
					
					<p>顺德职业技术学院27栋612</p>
				</div>
				<div class="col-md-3 footer-grids">
					<h3>Navigation</h3>					
				</div>
				<div class="col-md-3 footer-grids">
					<h3>Support</h3>
					
				</div>
				<div class="col-md-3 footer-grids">	
					<h3>Newsletter</h3>
					<p>It was popularised in the 1960s with the release Ipsum. <p>
					
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">		
			<p>Copyright &copy; 2015.软件技术3班</p>					
		</div>
	</div>
	<!--//footer-->		
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!--//smooth-scrolling-of-move-up-->
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"> </script>
</body>
</html>


<?php

?>