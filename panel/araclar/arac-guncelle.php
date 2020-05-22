<?php
require_once('../header.php');
require_once('../sidebar.php');

if(empty($_GET["id"]))
  header("Location:panel/araclar");

$id=mysqli_real_escape_string($conn, $_GET["id"]);

$query = "SELECT * FROM arac WHERE arac_id = ?";
$arac_result = $conn->prepare($query);
$arac_result->bind_param("i", $id);
$arac_result->execute();
$arac_result->bind_result($arac_id, $arac_plaka, $arac_bilgi_id);
$arac_result->fetch();

mysqli_close($conn);
$conn=mysqli_connect($serverName,$userID,$userPass,$database);

$query = "SELECT * FROM mevcut_arac_bilgi";
$result = $conn->prepare($query);
$result->execute();
$result->bind_result($id, $arac_marka, $arac_model, $arac_yil, $arac_kira_ucret);


?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-light w-100 h-100 p-5">
      <div class="col-md-12 border-left border-danger border-width-10 p-5">
          <h1 class="border-bottom border-danger pb-3">
            ARAÇ GÜNCELLEME
          </h1>
          <p class=" font-weight-light font-italic pt-3">Bu sekmede aracınızı düzenleyebilirsiniz.</p>
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
          <div class="card-header bg-danger text-light">Araç Güncelleme</div>
            <div class="card-body text-danger">
              <form class="" action="post/admin/araclar.php" method="post">
                <div class="form-group col-md-8">
                  <label for="arac_plaka">Araç Marka</label>
                  <input type="text" class="form-control" name="arac_plaka" id="arac_plaka" value="<?php echo $arac_plaka ?>"  placeholder="Arac Marka">
                </div>
                <div class="form-group col-md-8">
                  <label for="arac_secenek">Araç Seçenekleri</label>
                  <select class="form-control" id="arac_secenek" name="arac_secenek">
                    <?php while ($result->fetch()) { ?>
                      <option value="<?php echo $id; ?>" <?php echo $id == $arac_id ? 'selected':''; ?>>
                      <?php echo $arac_marka.', '.$arac_model.', '.$arac_yil.', '.$arac_kira_ucret ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-8">
                  <button class="btn btn-outline-danger" type="submit" value="<?php echo $arac_id ?>" name="guncelle_arac">Güncelle</button>
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
