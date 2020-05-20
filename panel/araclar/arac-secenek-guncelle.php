<?php
require_once('../header.php');
require_once('../sidebar.php');
?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-secondary w-100 h-100 p-5">
      <div class="col-md-12 border-left border-secondary border-width-10 p-5">
          <h1 class="border-bottom border-secondary pb-3">
            ARAÇ SEÇENEK GÜNCELLEME
          </h1>
          <p class=" font-weight-secondary font-italic pt-3">Bu sekmede mevcut araç seçeneğinizi düzenleyebilirsiniz.</p>
      </div>
      <div class="col-md-6 mt-5">
        <div class="card border-secondary mb-3 ">
          <div class="card-header bg-secondary text-light">Araç Seçenek Güncelleme</div>
            <div class="card-body text-secondary">
              <form class="" action="index.html" method="post">
                <div class="form-group col-md-8">
                  <label for="arac_plaka">Araç Marka</label>
                  <input type="text" class="form-control" id="arac_plaka" placeholder="Arac Marka">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_tur">Araç Model</label>
                  <input type="text" class="form-control" id="arac_plaka" placeholder="Arac Model">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_tur">Araç Yıl</label>
                  <input type="text" class="form-control" id="arac_plaka" placeholder="Arac Yılı">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_tur">Kira Ücreti</label>
                  <input type="text" class="form-control" id="arac_plaka" placeholder="Kira Ücreti">
                </div>
                <div class="form-group col-md-8">
                  <button class="btn btn-outline-secondary" type="submit" name="ekle_arac_secenek">Güncelle</button>
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
