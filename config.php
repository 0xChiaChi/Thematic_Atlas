<?php
 define('henako_SERVER','hub.kuaz.info');
 define('henako_USERNAME','holo_chia77');
 define('henako_PASSWORD','gura_and_mumei');
 define('henako_NAME','animate');
	// 建立MySQL的資料庫連接 
	$link = @mysqli_connect(henako_SERVER,henako_USERNAME,henako_PASSWORD,henako_NAME);  
	mysqli_query($link, 'SET NAMES utf8');
	if ( !$link ) {
	   die("MySQL資料庫連接錯誤!" . mysqli_connect_error());
	}
	else {
	   return $link;
	}
	?>
	<?php include("config.php"); ?>	