<?php
header('Content-type:text/json;charset=utf-8');
require_once "config.php";
session_start();
// SET SQL_SAFE_UPDATES=0;
if ($_SERVER['REQUEST_METHOD'] == "POST") { 
    $edge = $_POST["edge"];
    if ($edge != null ) { 
    	$sql_reset = "UPDATE animate SET edge ='".$edge."' , edge_name ='".$_SESSION["real_img_name"]."_edge' WHERE real_img ='".$_SESSION['real_img']."'AND real_img_name='".$_SESSION["real_img_name"]."'";
    	if(mysqli_query($link, $sql_reset)){
            echo json_encode(array(
            'GOOD' => '上傳成功!'
        	));
        }else{
            echo json_encode(array(
            'ERROR' => '上傳失敗!',
            'errorMsg'=> mysqli_connect_error()
        	));
        }
    } else {
        echo json_encode(array(
            'errorMsg' => '資料未輸入完全！'
        ));
    }
} else {
    echo json_encode(array(
        'errorMsg' => '請求無效，只允許 POST 方式訪問！'
    ));
}
// SET SQL_SAFE_UPDATES=1;
mysqli_close($link);
  ?>