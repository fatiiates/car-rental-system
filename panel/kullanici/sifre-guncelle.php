<?php
require_once('../header.php');
require_once('../sidebar.php');
?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-danger w-100 h-100 p-5">
      <div class="col-md-12 border-left border-danger border-width-10 p-5">
          <h1 class="border-bottom border-danger pb-3">
            KULLANICI BİLGİLERİ
          </h1>
          <p class=" font-weight-danger font-italic pt-3">Bu sekmede mevcut bilgielrinizi görebilir ve düzenleyebilirsiniz.</p>
      </div>
      <div class="col-md-6 mt-5">
        <?php if (!empty($_GET['message'])): ?>
          <div class="alert alert-<?php echo $_GET['alertClass']  ?> alert-dismissible fade show" role="alert">
            <?php echo $_GET['message']  ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <div class="card border-danger mb-3 ">
          <div class="card-header bg-danger text-light">Kullanıcı Bilgileri</div>
            <div class="card-body text-danger">
              <form class="" action="post/admin/kullanicilar.php" method="post">
                <div class="form-group col-md-8">
                  <label for="arac_plaka">Mevcut Şifre</label>
                  <input type="mevcut_sifre" class="form-control" name="mevcut_sifre" id="mevcut_sifre" placeholder="Mevcut Şifre">
                </div>
                <div class="form-group col-md-8">
                  <label for="yeni_sifre">Yeni Şifre</label>
                  <input type="password" class="form-control" name="yeni_sifre" id="yeni_sifre" placeholder="Yeni Şifre">
                </div>
                <div class="form-group col-md-8">
                  <label for="yeni_sifre_r">Yeni Şifre Tekrar</label>
                  <input type="password" class="form-control" name="yeni_sifre_r" id="yeni_sifre_r" placeholder="Yeni Şifre Tekrar">
                </div>
                <div class="form-group col-md-8">
                  <button class="btn btn-outline-danger" type="submit" value="true" name="guncelle_kullanici_sifre" >Güncelle</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
require_once('../footer.php');
 ?>
