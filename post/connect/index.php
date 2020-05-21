<?php
ob_start();
session_start();

/*$dizin = $_SERVER["HTTP_HOST"] == "localhost" ? 'http://'.$_SERVER["HTTP_HOST"].'/oto-kiralama/' :'https://'.$_SERVER["HTTP_HOST"]."/";

if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
  header("Location:".$dizin."error");
  exit;
}

if (empty($_SESSION['admin_userID']) && !isset($_POST['admin_login'])) {
  header("Location:".$dizin."error");
  exit;
}*/

$serverName="localhost:3306";// sunucu adresi
$database="oto_kiralama";
$userID="root";
$userPass="12345678";



$conn=mysqli_connect($serverName,$userID,$userPass,$database);


if (!$conn) {
  echo '{ error:"baglanilamadi" }';
  exit;
}
$conn->set_charset("utf8");
?>
