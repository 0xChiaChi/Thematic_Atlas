<?php 

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>測試</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="css/test.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/fontawesome.js"></script>
	<script type="text/javascript" src="js/interact.min.js"></script>
	<style type="text/css">
		.nav-link.active  {
			color: #FFFFFF !important;
			background-color: #336699 !important;
		}
		.nav-tabs{
			border-bottom: 1px solid #E6E4EC;
		}
		.tab-content {
			border-left: 1px solid #E6E4EC;
			border-right: 1px solid #E6E4EC;
			border-bottom: 1px solid #E6E4EC;
			padding: 10px;
		}
		.image_whole {
			max-width: 100%;
			max-height: 100%;
		}
		#imageSrc {
		  border: solid 2px #43363D;
		  -ms-touch-action: none;
		      touch-action: none;
		}
		.nav-link{
			color: #FFFFFF;
			background-color: #003366;
		}
	</style>
</head>

<body style="background-color: #669160">
<!-- 	<div id="loading">
	</div> -->
	<div class="container"style="padding-left: 3rem;width: 100%; height: 100vh">
		<div id="wrapper" >
			<!-- Sidebar -->
			<div id="sidebar-wrapper">
				<ul class="sidebar-nav" id="tool_list" style="margin-left:0;">
					<li class="sidebar-brand">
						<label id="menu-toggle" style="margin-top:20px;float:right;"> <i
								class="fas fa-pencil-ruler fa-lg" style="font-size:20px;" aria-hidden="true"
								aria-hidden="true"></i> </label>
					</li>
					<li>
						<label class="active my-3">
							<input  type="radio" name="tool" class="sr-only" value="#000000" id='aspectRatio1'> 
							<i class="fas fa-pen fa-lg" aria-hidden="true"></i>
							<span style="margin-left:10px;">黑筆</span>
						</label>
					</li>
					<li>
						<label class="my-3">
							<input name="tool" type="radio" class="sr-only" value="#ffffff" id='aspectRatio2'>
							<i class="fas fa-eraser fa-lg"aria-hidden="true"></i>
							<span style="margin-left:10px;">橡皮擦</span>
						</label>
					</li>
					<li>
						<label class="my-3"><input type="button" class="sr-only" id='button1'><i class="fas fa-sync fa-lg"></i><span
								style="margin-left:10px;">清空畫布</span></label>
					</li>
					<li>
						<label class="my-3"><input type="button" class="sr-only" id='button2'><i class="fas fa-hand-holding-heart fa-lg"></i><span
								style="margin-left:10px;">圖片提交</span></label>
					</li>
					<li>
						<label class="my-3"> <input type="button" class="sr-only" id='downloadbutton'> <i class="fas fa-download fa-lg"></i><span
							style="margin-left:10px;" >下載</span> 
						</label>
					</li>
					<li>
						<label class="my-3"> <input type="button" class="sr-only" id='downloadbutton'><i class="fab fa-accessible-icon fa-lg"></i><span
							style="margin-left:10px;" >換張圖片</span> 
						</label>
					</li>
				</ul>
			</div>
		</div>
		<nav class="pt-5">
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
					aria-controls="nav-home" aria-selected="true">圖片繪製</a>
			</div>
		</nav>
		<div class="tab-content" style="background-color: #ffffff ;" id="nav-tabContent">
			<!--高寬要弄class-->
			<div style="width: 100%;height: 60vh;">
				<div class="row justify-content-center align-items-center" style="width: 100%;height:100%;">
					<div class="tab-pane fade show active col" id="nav-home" role="tabpanel" style="align-items: center;display: flex;width: 100%;height:100%;"aria-labelledby="nav-home-tab"><canvas id="imageSrc" style="margin:auto;height: 256px;width: 256px;"></canvas>
					</div>
					<div class="col" id="nav-home_2" role="tabpanel" style="width: 100%;height:100%;display: flex;align-items: center;"aria-labelledby="nav-home-tab_2"><img id="real_img_1" style="margin:auto;height: 256px;width: 256px;" src="./img/gura.png">
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer style="width:100%;position: fixed;bottom: 0;">
		<!-- <div style="position: fixed;"> -->
		<div style="display: flex;">
			<div style="margin:auto;">
				<span>筆劃調整</span>
				<input s type="range" min="1" max="12" value="6" id='pan_size'>					
			</div>
		</div>
	</footer>	
<?php include("config.php"); ?>
</body>
<script>
	$("#menu-toggle").click(function (e) {
		e.preventDefault();
		//取消這個事件
		$("#wrapper").toggleClass("toggled");
		//刪除和添加#wrapper的class(toggled)
	});
	var tooltip=document.getElementById('tool_list');
	var clear=document.getElementById('button1');
	var pansize=document.getElementById('pan_size');
</script>
<script type="text/javascript" src="js/canvas_pixel.js"></script>
<script type="text/javascript" src="js/downloadbutton.js"></script>
</html>