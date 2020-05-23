<?php
require_once('../header.php');
require_once('../sidebar.php');

$query = "SELECT arac.arac_id,
                 arac.arac_plaka,
                 mevcut_arac_bilgi.arac_marka,
                 mevcut_arac_bilgi.arac_model,
                 mevcut_arac_bilgi.arac_yil,
                 mevcut_arac_bilgi.arac_kira_ucret
                 FROM arac,mevcut_arac_bilgi
                 WHERE arac.arac_bilgi_id = mevcut_arac_bilgi.arac_bilgi_id";
$result = $conn->prepare($query);
$result->execute();
$result->bind_result($id, $arac_plaka,$arac_marka, $arac_model, $arac_yil, $arac_kira_ucret);


?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-light w-100 h-100 p-5">
      <div class="col-md-12 border-left border-primary border-width-10 p-5">
          <h1 class="border-bottom border-primary pb-3">
            ARAÇ KİRALA
          </h1>
          <p class=" font-weight-light font-italic pt-3">Bu sekmede sisteme yeni kiralamalar dahil edebilirsiniz.</p>
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
          <div class="card-header bg-primary text-light">Araç Kirala</div>
            <div class="card-body text-primary">
              <form class="" action="post/admin/araclar.php" method="post">
                <div class="form-group col-md-8">
                  <label for="arac_secenek">Kiralanacak Araç</label>
                  <select class="form-control" id="arac_secenek" name="arac_secenek">
                    <?php while ($result->fetch()) { ?>
                      <option value="<?php echo $id ?>">
                      <?php echo $arac_plaka.', '.$arac_marka.', '.$arac_model.', '.$arac_yil.', '.$arac_kira_ucret ?>
                      </option>
                    <?php }

                    mysqli_close($conn);
                    $conn = mysqli_connect($serverName,$userID,$userPass,$database);

                    $musteri_query = "SELECT musteri_id, musteri_ad, musteri_soyad, musteri_TC FROM musteri";
                    $musteri_result = $conn->prepare($musteri_query);
                    $musteri_result->execute();
                    $musteri_result->bind_result($musteri_id, $musteri_ad, $musteri_soyad, $musteri_TC);

                    ?>
                  </select>
                </div>
                <div class="form-group col-md-8">
                  <label for="musteri_secenek">Müşteri Seçenekleri</label>
                  <select class="form-control" id="musteri_secenek" name="musteri_secenek">
                    <?php while ($musteri_result->fetch()) { ?>
                      <option value="<?php echo $musteri_id ?>">
                      <?php echo $musteri_ad.' '.$musteri_soyad.', '.$musteri_TC ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-8">
                  <label for="kira_tarih">Kiralanma Tarihi</label>
                  <input type="datetime-local" class="form-control" id="kira_tarih" name="kira_tarih" value="">
                </div>
                <div class="form-group col-md-8">
                  <label for="kira_bitis">Kiralanma Bitişi</label>
                  <input type="datetime-local" class="form-control" id="kira_bitis" name="kira_bitis" value="">
                </div>
                <div class="form-group col-md-8">
                  <button class="btn btn-outline-primary" type="submit" value="true" name="ekle_kira">Kirala</button>
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
