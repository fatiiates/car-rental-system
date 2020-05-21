<?php
ob_start();
session_start();

$serverName="localhost:3306";// sunucu adresi
$database="oto_kiralama";
$userID="root";
$userPass="12345678";

$conn=mysqli_connect($serverName,$userID,$userPass,$database);


if (!$conn) {
  echo '{ error:"baglanilamadi" }';
  exit;
}
echo "bhuodıfshopfdshfdsopjhfsdhjdfshojfds";
$conn->set_charset("utf8");
?>
