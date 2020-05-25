<?php
require_once('../layout/head.php');

?>
<style media="screen">
  html, body{
    height: 100%!important;
    min-height: 100%!important;
  }
</style>
<div class="content m-0 p-0 bg-dark d-flex justify-content-center align-items-center text-center w-100 " style="height: 100%!important">
  <form class="mw-25 justify-content-center w-100" action="post/login.php" method="post" style="max-width:350px">
    <?php if (!empty($_GET['message'])): ?>
      <div class="alert alert-<?php echo $_GET['alertClass']  ?> alert-dismissible fade show" role="alert">
        <?php echo $_GET['message']  ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
    <div class="form-group mb-3">
      <svg class="bi bi-arrow-bar-right" width="7em" height="7em" viewBox="0 0 16 16" fill="white" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M10.146 4.646a.5.5 0 01.708 0l3 3a.5.5 0 010 .708l-3 3a.5.5 0 01-.708-.708L12.793 8l-2.647-2.646a.5.5 0 010-.708z" clip-rule="evenodd"/>
        <path fill-rule="evenodd" d="M6 8a.5.5 0 01.5-.5H13a.5.5 0 010 1H6.5A.5.5 0 016 8zm-2.5 6a.5.5 0 01-.5-.5v-11a.5.5 0 011 0v11a.5.5 0 01-.5.5z" clip-rule="evenodd"/>
      </svg>
      <h1 class="h3 mb-3 font-weight-normal text-light">fPanel</h1>
    </div>
    <div class="form-group mb-3">
      <label for="kullanici_ad" class="sr-only">Kullanıcı Adı</label>
      <input type="text" id="kullanici_ad" class="form-control bg-dark text-light" name="kullanici_ad" placeholder="Kullanıcı Adı" required autofocus>
    </div>
    <div class="form-group mb-3">
      <label for="Şifre" class="sr-only">Şifre</label>
      <input type="password" id="sifre" class="form-control bg-dark text-light" name="sifre" placeholder="Şifre" required>
    </div>
    <div class="form-group mb-3 justify-content-center">
      <button class="btn btn-lg btn-light col-md-8" type="submit" value="true" name="admin_login">Giriş</button>
      <p class="mt-5 mb-3 text-muted">© 2019-2020</p>
    </div>
  </form>
</div>

<?php require_once('../layout/foot.php'); ?>
