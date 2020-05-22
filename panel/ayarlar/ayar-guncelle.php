<?php
require_once('../header.php');
require_once('../sidebar.php');

if (empty($_GET["id"]))
  header("Location:../");
$id=mysqli_real_escape_string($conn, $_GET["id"]);

$query = "SELECT ayar_tip,ayar_deger FROM site_ayar WHERE ayar_id = $id";
$result = $conn->prepare($query);
$result->execute();
$result->bind_result($ayar_secenek, $ayar_deger);
$result->fetch();

?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-secondary w-100 h-100 p-5">
      <div class="col-md-12 border-left border-secondary border-width-10 p-5">
          <h1 class="border-bottom border-secondary pb-3">
            AYAR SEÇENEK GÜNCELLEME
          </h1>
          <p class=" font-weight-secondary font-italic pt-3">Bu sekmede mevcut ayar seçeneğinizi düzenleyebilirsiniz.</p>
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
          <div class="card-header bg-secondary text-light">Ayar Seçenek Güncelleme</div>
            <div class="card-body text-secondary">
              <form class="" action="post/admin/ayarlar.php" method="post">
                <div class="form-group col-md-8">
                  <label for="ayar_secenek">Ayar Seçenek</label>
                  <input type="text" class="form-control" name="ayar_secenek" id="ayar_secenek" value="<?php echo $ayar_secenek ?>" placeholder="Ayar Seçeneği">
                </div>
                <div class="form-group col-md-8">
                  <label for="ayar_deger">Ayar Değer</label>
                  <textarea class="form-control" name="ayar_deger" id="ayar_deger" placeholder="Ayar Değeri" rows="8" cols="80"><?php echo $ayar_deger ?></textarea>
                </div>
                <div class="form-group col-md-8">
                  <button class="btn btn-outline-secondary" type="submit" name="guncelle_ayar_secenek" value="<?php echo $id ?>">Ekle</button>
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
