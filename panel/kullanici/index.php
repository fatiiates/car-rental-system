<?php
require_once('../header.php');
require_once('../sidebar.php');
?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-primary w-100 h-100 p-5">
      <div class="col-md-12 border-left border-primary border-width-10 p-5">
          <h1 class="border-bottom border-primary pb-3">
            KULLANICI BİLGİLERİ
          </h1>
          <p class=" font-weight-primary font-italic pt-3">Bu sekmede mevcut bilgielrinizi görebilir ve düzenleyebilirsiniz.</p>
      </div>
      <div class="col-md-6 mt-5">
        <div class="card border-primary mb-3 ">
          <div class="card-header bg-primary text-light">Kullanıcı Bilgileri</div>
            <div class="card-body text-primary">
              <form class="" action="index.html" method="post">
                <div class="form-group col-md-8">
                  <label for="arac_plaka">Ad</label>
                  <input type="text" class="form-control" id="arac_plaka" placeholder="Adınız">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_tur">Soyad</label>
                  <input type="text" class="form-control" id="arac_plaka" placeholder="Soyadınız">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_tur">Kullanıcı adı</label>
                  <input type="text" class="form-control" id="arac_plaka" placeholder="Kullanıcı Adı">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_tur">Mail</label>
                  <input type="email" class="form-control" id="arac_plaka" placeholder="Mail">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_tur">Şifre</label>
                  <input type="password" class="form-control" id="arac_plaka" placeholder="Şifreniz">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_tur">Telefon Numarası</label>
                  <input type="text" class="form-control" id="arac_plaka" placeholder="Telefon numaranız">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_tur">Adres</label>
                  <textarea class="form-control" name="name" rows="4" cols="80" id="arac_plaka" placeholder="Adresiniz"></textarea>
                </div>
                <div class="form-group col-md-8">
                  <button class="btn btn-outline-primary" type="submit" name="ekle_arac_secenek">Güncelle</button>
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
