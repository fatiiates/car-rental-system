<?php
require_once('../header.php');
require_once('../sidebar.php');

if(empty($_GET["id"]))
  header("Location:index.php");

$id=mysqli_real_escape_string($conn, $_GET["id"]);

$query = "SELECT arac_marka, arac_model, arac_yil, arac_kira_ucret FROM mevcut_arac_bilgi WHERE arac_bilgi_id = ?";
$result = $conn->prepare($query);
$result->bind_param("i", $id);
$result->execute();
$result->bind_result($arac_marka, $arac_model, $arac_yil, $arac_kira_ucret);
$result->fetch();

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
        <?php if (!empty($_GET['message'])): ?>
          <div class="alert alert-<?php echo $_GET['alertClass']  ?> alert-dismissible fade show" role="alert">
            <?php echo $_GET['message']  ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <div class="card border-secondary mb-3 ">
          <div class="card-header bg-secondary text-light">Araç Seçenek Güncelleme</div>
            <div class="card-body text-secondary">
              <form class="" action="post/admin/araclar.php" method="post">
                <div class="form-group col-md-8">
                  <label for="arac_marka">Araç Marka</label>
                  <input type="text" class="form-control" name="arac_marka" value="<?php echo $arac_marka ?>" id="arac_marka" placeholder="Arac Marka">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_model">Araç Model</label>
                  <input type="text" class="form-control" name="arac_model" value="<?php echo $arac_model ?>" id="arac_model" placeholder="Arac Model">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_yil">Araç Yıl</label>
                  <input type="text" class="form-control" name="arac_yil" value="<?php echo $arac_yil ?>" id="arac_yil" placeholder="Arac Yılı">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_kira_ucret">Kira Ücreti</label>
                  <input type="text" class="form-control" name="arac_kira_ucret" value="<?php echo $arac_kira_ucret ?>" id="arac_kira_ucret" placeholder="Kira Ücreti">
                </div>
                <div class="form-group col-md-8">
                  <button class="btn btn-outline-secondary" type="submit" value="<?php echo $id ?>" name="guncelle_arac_secenek">Güncelle</button>
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
