<?php
require_once('../header.php');
require_once('../sidebar.php');

$id=mysqli_real_escape_string($conn, $_GET["id"]);

$query = "SELECT * FROM mevcut_arac_bilgi";
$result = $conn->prepare($query);
$result->execute();
$result->bind_result($id, $arac_marka, $arac_model, $arac_yil, $arac_kira_ucret);


?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-light w-100 h-100 p-5">
      <div class="col-md-12 border-left border-primary border-width-10 p-5">
          <h1 class="border-bottom border-primary pb-3">
            ARAÇ EKLE
          </h1>
          <p class=" font-weight-light font-italic pt-3">Bu sekmede sisteme yeni araçlar dahil edebilirsiniz.</p>
      </div>
      <div class="col-md-6 mt-5">
        <div class="card border-primary mb-3 ">
          <div class="card-header bg-primary text-light">Araç Ekleme</div>
            <div class="card-body text-primary">
              <form class="" action="api/admin/araclar.php" method="post">
                <div class="form-group col-md-8">
                  <label for="arac_plaka">Araç Plaka</label>
                  <input type="text" class="form-control" name="arac_plaka" id="arac_plaka" placeholder="Arac Plaka">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_tur">Araç Seçenekleri</label>
                  <select class="form-control" id="arac_tur" name="arac_secenek">
                    <?php while ($result->fetch()) { ?>
                      <option value="<?php echo $id ?>">
                      <?php echo $arac_marka.', '.$arac_model.', '.$arac_yil.', '.$arac_kira_ucret ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-8">
                  <button class="btn btn-outline-primary" type="submit" value="true" name="ekle_arac">Ekle</button>
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
