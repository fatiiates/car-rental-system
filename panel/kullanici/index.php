<?php
require_once('../header.php');
require_once('../sidebar.php');

$id=$_SESSION['usr-admin'];

$query = "SELECT kullanici_ad,
                 kullanici_soyad,
                 kullanici_user_id,
                 kullanici_mail,
                 kullanici_telefon,
                 kullanici_adres
                 FROM kullanici WHERE kullanici_id = $id AND kullanici_rol = 'admin'";
$result = $conn->prepare($query);
$result->execute();
$result->bind_result($kad, $ksoyad, $kuser_id, $kmail, $ktelefon, $kadres);
$result->fetch();

?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-primary w-100 h-100 p-5">
      <div class="col-md-12 border-left border-primary border-width-10 p-5">
          <h1 class="border-bottom border-primary pb-3">
            KULLANICI BİLGİLERİ
          </h1>
          <p class=" font-weight-primary font-italic pt-3">Bu sekmede mevcut bilgilerinizi görebilir ve düzenleyebilirsiniz.</p>
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
        <div class="card border-primary mb-3 ">
          <div class="card-header bg-primary text-light">Kullanıcı Bilgileri</div>
            <div class="card-body text-primary">
              <form class="" action="post/admin/kullanicilar.php" method="post">
                <div class="form-group col-md-8">
                  <label for="kullanici_ad">Ad</label>
                  <input type="text" class="form-control" value="<?php echo $kad; ?>" name="kullanici_ad" id="kullanici_ad" placeholder="Adınız">
                </div>
                <div class="form-group col-md-8">
                  <label for="kullanici_soyad">Soyad</label>
                  <input type="text" class="form-control" value="<?php echo $ksoyad; ?>" name="kullanici_soyad" id="kullanici_soyad" placeholder="Soyadınız">
                </div>
                <div class="form-group col-md-8">
                  <label for="kullanici_user_id">Kullanıcı adı</label>
                  <input type="text" class="form-control" value="<?php echo $kuser_id; ?>" name="kullanici_user_id" id="kullanici_user_id" placeholder="Kullanıcı Adı">
                </div>
                <div class="form-group col-md-8">
                  <label for="kullanici_mail">Mail</label>
                  <input type="email" class="form-control" value="<?php echo $kmail; ?>" name="kullanici_mail" id="kullanici_mail" placeholder="Mail">
                </div>
                <div class="form-group col-md-8">
                  <label for="kullanici_telefon">Telefon Numarası(Başında 0 OLMADAN! bkz:5554443322)</label>
                  <input type="text" class="form-control" value="<?php echo $ktelefon; ?>" name="kullanici_telefon" id="kullanici_telefon" placeholder="Telefon numaranız">
                </div>
                <div class="form-group col-md-8">
                  <label for="kullanici_adres">Adres</label>
                  <textarea class="form-control" rows="4" cols="80" name="kullanici_adres" id="kullanici_adres" placeholder="Adresiniz"><?php echo $kadres ?></textarea>
                </div>
                <div class="form-group col-md-8">
                  <button class="btn btn-outline-primary" type="submit" value="<?php echo $id ?>" name="guncelle_kullanici_bilgi">Güncelle</button>
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
