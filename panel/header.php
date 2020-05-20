<?php
define( 'ROOT_DIR', dirname(__FILE__));
require_once(ROOT_DIR.'/../layout/head.php');
require_once(ROOT_DIR.'/../api/connect/index.php');

?>
<body class="bg-light">
    <header id="panel-header" class="justify-content-center custom-purple col-md-12 p-4 d-flex shadow-lg z-index-999 text-center">
      <div class="col-md-10">
        <div class="col-md-6 float-left text-md-left">
          <p class="text-light h4 width-fit-content" href="#"><?php //şirket ad ?> - fPanel Sistemi</p>
        </div>
        <div class="col-md-6 float-right text-md-right">
          <span class="text-light h4 width-fit-content" href="#">
            <a class="btn btn-warning" href="#">
              <svg class="bi bi-envelope" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="#212529" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14 3H2a1 1 0 00-1 1v8a1 1 0 001 1h12a1 1 0 001-1V4a1 1 0 00-1-1zM2 2a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M.071 4.243a.5.5 0 01.686-.172L8 8.417l7.243-4.346a.5.5 0 01.514.858L8 9.583.243 4.93a.5.5 0 01-.172-.686z" clip-rule="evenodd"/>
                <path d="M6.752 8.932l.432-.252-.504-.864-.432.252.504.864zm-6 3.5l6-3.5-.504-.864-6 3.5.504.864zm8.496-3.5l-.432-.252.504-.864.432.252-.504.864zm6 3.5l-6-3.5.504-.864 6 3.5-.504.864z"/>
              </svg>
               &nbsp;Mesaj
            </a>
            <a class="btn btn-outline-danger" href="#">Güvenli Çıkış</a>
          </span>
        </div>
      </div>
    </header>
