<?php
 define('SERVER','hub.kuaz.info');
 define('USERNAME','holo_chia77');
 define('PASSWORD','gura_and_mumei');
 define('NAME','Thematic_Atlas');
 define('PORT','63306');
// 建立MySQL的資料庫連接 
$link = mysqli_connect(SERVER,USERNAME,PASSWORD,NAME,PORT); 
mysqli_query($link, 'SET NAMES utf8');
if ( !$link ) {
   die("MySQL資料庫連接錯誤!" . mysqli_connect_error());
}
else {
   return $link;
}
?>	