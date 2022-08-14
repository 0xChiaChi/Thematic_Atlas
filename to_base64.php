<?php
header('Content-type:text/json;charset=utf-8');
$conn=require_once "config.php";
// if(isset($_POST['edge'])){
// 	echo "<p>".$_POST['edge']."</p>";
// };
// exit;
// $reset = "UPDATE animate SET edge ='".$_POST['edge']."'AND edge_name='"+$_SESSION['real_img_name']+"_edge"+"' WHERE real_img='"+$_SESSION['real_img']+"'";
// mysqli_query($link,$reset);
if ($_SERVER['REQUEST_METHOD'] == "POST") { 
    @$edge = $_POST["edge"]; 
    if ($edge != null ) { 
    	$reset = "INSERT INTO animate (id, edge, real_img, real_img_name, edge_name) VALUES (110, '0', ".$edge.", '0', '0')";
    	if(mysqli_query($conn, $reset)){
                echo "註冊成功!3秒後將自動跳轉頁面<br>";
            }else{
                echo "Error creating table: " . mysqli_error($conn);
            }
		echo json_encode(array(
            'real_img' => $edge,
        ));
    } else {
        echo json_encode(array(
            'errorMsg' => '資料未輸入完全！'
        ));
    }
} else {
    //回傳 errorMsg json 資料
    echo json_encode(array(
        'errorMsg' => '請求無效，只允許 POST 方式訪問！'
    ));
}
  ?>