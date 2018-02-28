<!DOCTYPE html>
<html>
<head>
<title>Gallery</title>
<link href="css/bootstrap.css" type="text/css" rel="stylesheet"
	media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="css/chocolat.css" type="text/css"
	media="screen">
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"
	content="Perfection Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
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
<style>
.xqbutton {
	float: right;
	background: #FFF;
	color: #fc4f6b;
	border: 2px solid #fc4f6b;
	outline: none;
}
.aa{
	color: #fc4f6b;
	display:block;
	font-size:16px;
	height:100%;
	width:80px;
}
.aa:hover{
	color: #fc4f6b;	
}
.img-responsive {
	width: 100%;
	height: 250px;
	margin: 0;
}

.tab_img {
	padding: 0 90px;
	width: 100%;
}


</style>
</head>
<body>
	<!--banner-->
	<div class="banner">
		<!--navigation-->
		<div class="headder">
			<nav class="navbar navbar-default">
				<div class="container">
					<div class="navbar-header navbar-right">
						<button type="button" class="navbar-toggle collapsed"
							data-toggle="collapse"
							data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span> <span
								class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
						<div class="home-social">
							<ul>
								<li><a href="#"></a></li>
								<li><a href="#" class="twt"></a></li>
								<li><a href="#" class="pn"></a></li>
								<li><a href="#" class="gg"></a></li>
							</ul>
						</div>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-left"
						id="bs-example-navbar-collapse-1">
						<div class="top-nav">
							<ul class="nav navbar-nav navbar-left cl-effect-16">



								<li><a href="index.php" class="active">Gallery</a></li>

								<li><a href="contact.html" data-hover="Contact">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</nav>
			<!--navigation-->
		</div>
		<div class="bnr-text">
			<div class="container">
				<h1>
					<a href="index.php"> IWISH Gallery </a>
				</h1>
				<p>Perfect wedding dressing & fresh ideas for your wedding</p>
			</div>
		</div>
	</div>
	<!--//banner-->
	<!--gallery-->
	<div class="gallery">
		<div class="container">
			<h3 class="title">Gallery</h3>
			<div class="sap_tabs">
				<div id="horizontalTab"
					style="display: block; width: 100%; margin: 0px;">
					<ul class="resp-tabs-list">
						<?php
    header("Content-type:text/html;charset=utf-8");
    include 'conn/conn.php';
    $rs = mysqli_query($link, 'select * from producttypeinfo');
    $typecount = 1;
    while ($row = mysqli_fetch_object($rs)) {
        
        $ProductTypeName = $row->ProductTypeName;
        echo "<li><a class='aa' href='index.php?type=" . "$typecount'>$ProductTypeName</a></li>";
        $typecount = $typecount + 1;
    }
    ?>				
					</ul>
					<div class="clearfix"></div>
					<div class="resp-tabs-container">
						<div class="tab-1 resp-tab-content ">
						<?php
    header("Content-type:text/html;charset=utf-8");
    include 'conn/conn.php';
    if (isset($_REQUEST['type'])) {
        $type = $_REQUEST['type'];
        $cs = mysqli_query($link, "select count(*) from productinfo where ProductTypeId=$type");
        $sqlrss = "select * from productinfo where ProductTypeId=$type limit ";
    } else {
        $cs = mysqli_query($link, "select count(*) from productinfo where ProductTypeId=1");
        $sqlrss = "select * from productinfo where ProductTypeId=1 limit ";
    }
    
    $csrow = mysqli_fetch_row($cs);
    $count = $csrow[0];
    $rows = ceil($count / 4);
    
    for ($rowc = 1; $rowc <= $rows; $rowc ++) {
        $rowcc = ($rowc - 1) * 4;
        echo "<div class='tab_img'>";
        $sqlrs = $sqlrss . " $rowcc,4";
        $rs = mysqli_query($link, $sqlrs);
        while ($row = mysqli_fetch_object($rs)) {
            $ProductPic = $row->ProductPic;
            $ProductId="probtn_".$row->ProductId;
            if(strpos($ProductPic, "thumb")){
                $srcf=strstr(substr($ProductPic, 1),"thumb",true);
                $srcb=strstr(substr($ProductPic, 1),"thumb");
                $srcc=substr($srcb, 6);
                $picsrc = $srcf.$srcc;
            }
            else{
                $picsrc=substr($ProductPic, 1);
            }
            
            
            
            echo "<div class='col-md-3 img-top '>";
            echo "<a href='$picsrc'>";
            echo "<img src='$picsrc' class='img-responsive' alt=''>";
            echo "</a>";
            echo "<button class='xqbutton' id='$ProductId' Onclick='Toshowdate(this)'>查看详情</button>";
            echo "</div>";
        }
        
        echo "</div>";
    }
    ?>
					       	
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!--//gallery-->
	<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
	<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default', //Types: default, vertical, accordion           
							width: 'auto', //auto or any width like 600px
							fit: true   // 100% fit in a container
						});
					});
					
	</script>
	<!--script-->
	<script src="js/jquery.chocolat.js"></script>
	<!--light-box-files -->
	<script type="text/javascript">
			$(function() {
				$('.img-top a').Chocolat();
			});
		</script>
	<!--footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-row">
				<div class="col-md-3 footer-grids">
					<h2>
						<a href="index.php">IWISH Gallery</a>
					</h2>
					<p>
						<a href="mailto:example@mail.com">mail@example.com</a>
					</p>
					<p>+2 000 222 1111</p>
				</div>
				<div class="col-md-3 footer-grids">
					<h3>Navigation</h3>
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">About us</a></li>
						<li><a href="#">Gallery</a></li>
						<li><a href="#">Typo</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-grids">
					<h3>Support</h3>
					<ul>
						<li><a href="services.html">Services</a></li>
						<li><a href="#">Help Center</a></li>
						<li><a href="#">Lemollisollis</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-grids">
					<h3>Newsletter</h3>
					<p>It was popularised in the 1960s with the release Ipsum.
					
					
					<p>
					
					
					<form>
						<input type="text" class="text" value="Enter Email"
							onfocus="this.value = '';"
							onblur="if (this.value == '') {this.value = 'Enter Email';}"> <input
							type="submit" value="Go">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<p>Copyright &copy; 2015.Company name All rights reserved.</p>
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
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover"
		style="opacity: 1;"> </span></a>
	<!--//smooth-scrolling-of-move-up-->
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/bootstrap.js"> </script>
	<script> 
	    function Toshowdate(obj){
		     var ProductId = $(obj).attr("id");
		     location.href="./showdate/showdate.php?ProductId="+ProductId+"";
		    }
	</script>

</body>
</html>