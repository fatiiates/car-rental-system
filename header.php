<?php
define( 'ROOT_DIR', dirname(__FILE__));
require_once(ROOT_DIR.'/layout/head.php');
?>
<body>
  <style media="screen">
    html,body,.carousel-inner{height:100%!important;}
    .nav-link{color:gainsboro!important}
  </style>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark shadow-lg position-fixed w-100 opacity-0 z-index-999 p-3 justify-content-center">
    <a class="ml-2 h1 text-light mr-5 nav-link" href="" style="color:white!important">OTO ADI</a>
    <button class="navbar-toggler border" type="button" data-toggle="collapse" data-target="#headerNavbar" aria-controls="headerNavbar" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center justify-content-center h6" id="headerNavbar" style="flex-grow: 0;">
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
