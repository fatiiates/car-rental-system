<?php
define('ROOT_OTO', $_SERVER['HTTP_HOST'] == "192.168.2.3" ? '/oto-kiralama':'/');

session_start();
session_destroy();

header("Location:".ROOT_OTO."/panel/login.php");
exit;
?>
