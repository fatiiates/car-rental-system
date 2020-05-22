<?php

function isLogin(){
  if(empty($_SESSION['usr-admin'])){
    header("Location:".$_SERVER['HTTP_REFERER']."?process=error&message=Sistemde tanımlı token bulunmuyor.&alertClass=danger");
    exit;
  }
}
function headerLoginControl($param){
  if(empty($_SESSION['usr-admin'])){
    header("Location:".$param."/panel/login.php");
    exit;
  }
}

 ?>
