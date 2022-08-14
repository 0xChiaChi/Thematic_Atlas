<?php
header('Content-type:text/json;charset=utf-8');
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") { 
    $edge = $_POST["edge"]; 
    if ($edge != null ) { 
    	$sql_reset = "INSERT INTO Thematic_Atlas.animate (id, edge, real_img, real_img_name, edge_name) VALUES (NULL, '0', '".$edge."', '0', '0')";
    	if(mysqli_query($link, $sql_reset)){
            echo json_encode(array(
            'GOOD' => '上傳成功!'
        	));
        }else{
            echo json_encode(array(
            'ERROR' => '上傳失敗!'
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
mysqli_close($link);
  ?>