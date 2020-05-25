<?php
define( 'ROOT_DIR', $_SERVER['HTTP_HOST'] != "sitead" ? $_SERVER['DOCUMENT_ROOT'].'/oto-kiralama':$_SERVER['DOCUMENT_ROOT']);

require_once(ROOT_DIR.'/layout/head.php');
$conn = mysqli_connect($serverName,$userID,$userPass,$database);

$query = "SELECT ayar_deger FROM site_ayar WHERE ayar_tip = 'ISLETME_AD'";
$result = $conn->prepare($query);
$result->execute();
$result->bind_result($ISLETME_AD);
$result->fetch();

?>
<body>
  <style media="screen">
    html,body,.carousel-inner{height:100%!important;}
    .nav-link{color:gainsboro!important}
  </style>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark shadow-lg position-fixed w-100 opacity-0 z-index-999 p-3 justify-content-center">
    <a class="ml-2 h1 text-light mr-5 nav-link" href="" style="color:white!important"><?php echo $ISLETME_AD ?></a>
    <button class="navbar-toggler border" type="button" data-toggle="collapse" data-target="#header_nav_bar" aria-controls="header_nav_bar" >
     <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center justify-content-center h6" id="header_nav_bar" style="flex-grow: 0;">
      <ul class="navbar-nav">
        <li class="nav-item  active" >
          <a class="text-light nav-link" href="arac-kirala">ARAÇ KİRALAMA</a>
        </li>
        <span class="ml-5 border-left mr-5" ></span>
        <li class="nav-item  active" >
          <a class="text-light nav-link" href="about">HAKKIMIZDA</a>
        </li>
        <span class="ml-5 border-left mr-5" ></span>
        <li class="nav-item ">
          <a class="text-light nav-link" href="contact">İLETİŞİM</a>
        </li>
      </ul>
    </div>
  </nav>
