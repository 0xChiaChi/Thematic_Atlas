<?php 
$sql = "SELECT * FROM animate WHERE edge ='0' ORDER BY RAND() LIMIT 1";
$result=mysqli_query($link,$sql);
$result_array=mysqli_fetch_assoc($result);
// if(!($result_array)){
// 	echo '<script type="text/javascript">alert("已經..沒有...沒有圖了");</script>';
// 	exit;
// }
//$reset = "UPDATE animate SET edge ='1' WHERE real_img ='".$result_array["real_img"]."'AND real_img_name='"+$result_array["real_img_name"]+"'";
//mysqli_query($link,$reset);
$array_=array("real_img","real_img_name");
session_start();
$_SESSION['real_img'] = $array_["0"];
$_SESSION['real_img_name'] = $array_["1"];
mysqli_close($link);
 ?>
