<?php

function isLogin(){
  if(empty($_SESSION['usr-admin'])){
    header("Location:".$_SERVER['HTTP_REFERER']."?process=error&message=Sistemde tanımlı token bulunmuyor.&alertClass=danger");
    exit;
  }
}
function headerLoginControl(){
  if(empty($_SESSION['usr-admin'])){
    header("Location:".ROOT_OTO."/panel/login.php");
    exit;
  }
}

 ?>
