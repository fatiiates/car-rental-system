<?php
require_once('../header.php');
require_once('../sidebar.php');
?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-light w-100 h-100 p-5">
      <div class="col-md-12 border-left border-info border-width-10 p-5">
          <h1 class="border-bottom border-info pb-3">
            ARAÇ SEÇENEK EKLEME
          </h1>
          <p class=" font-weight-light font-italic pt-3">Bu sekmede yeni araç seçenekleri ekleyebilirsiniz.</p>
      </div>
      <div class="col-md-6 mt-5">
        <div class="card border-info mb-3 ">
          <div class="card-header bg-info text-light">Araç Seçenek Ekleme</div>
            <div class="card-body text-info">
              <form class="" action="api/admin/araclar.php" method="post">
                <div class="form-group col-md-8">
                  <label for="arac_plaka">Araç Marka</label>
                  <input type="text" class="form-control" name="arac_plaka" id="arac_plaka" placeholder="Arac Marka">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_model">Araç Model</label>
                  <input type="text" class="form-control" name="arac_model" id="arac_model" placeholder="Arac Model">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_yil">Araç Yıl</label>
                  <input type="text" class="form-control" name="arac_yil" id="arac_yil" placeholder="Arac Yılı">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_kira_ucret">Kira Ücreti</label>
                  <input type="text" class="form-control" name="arac_kira_ucret" id="arac_kira_ucret" placeholder="Kira Ücreti">
                </div>
                <div class="form-group col-md-8">
                  <button class="btn btn-outline-info" type="submit" value="true" name="ekle_arac_secenek">Ekle</button>
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
