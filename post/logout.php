<?php
define( 'ROOT_DIR', $_SERVER['HTTP_HOST'] != "demo-arac-kiralama.ueuo.com" ? $_SERVER['DOCUMENT_ROOT'].'/oto-kiralama':$_SERVER['DOCUMENT_ROOT']);

session_start();
session_destroy();
$param = 'http://'.$_SERVER['HTTP_HOST'].($_SERVER['HTTP_HOST'] != "demo-arac-kiralama.ueuo.com" ? '/oto-kiralama':'');
header("Location:".$param."/panel/login.php");
?>
