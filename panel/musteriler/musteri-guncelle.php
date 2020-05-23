<?php
require_once('../header.php');
require_once('../sidebar.php');

if (empty($_GET["id"]))
  header("Location:index.php");

$id=mysqli_real_escape_string($conn, $_GET["id"]);

$query = "SELECT musteri_ad,
                 musteri_soyad,
                 musteri_TC,
                 musteri_mail,
                 musteri_adres,
                 musteri_telefon
                 FROM musteri WHERE musteri_id = ?";
$result = $conn->prepare($query);
$result->bind_param('i', $id);
$result->execute();
$result->bind_result($musteri_ad, $musteri_soyad, $musteri_TC, $musteri_mail, $musteri_adres, $musteri_telefon);
$result->fetch();

?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-light w-100 h-100 p-5">
      <div class="col-md-12 border-left border-primary border-width-10 p-5">
          <h1 class="border-bottom border-primary pb-3">
            MÜŞTERİ GÜNCELLE
          </h1>
          <p class=" font-weight-light font-italic pt-3">Bu sekmede sistemdeki müşterilerinizi güncelleyebilirsiniz.</p>
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
          <div class="card-header bg-primary text-light">Müşteri Güncelleme</div>
            <div class="card-body text-primary">
              <form class="" action="post/admin/musteriler.php" method="post">
                <div class="form-group col-md-8">
                  <label for="musteri_ad">Ad</label>
                  <input type="text" class="form-control" name="musteri_ad" value="<?php echo $musteri_ad ?>" id="musteri_ad" placeholder="Müşteri Ad">
                </div>
                <div class="form-group col-md-8">
                  <label for="musteri_soyad">Soyad</label>
                  <input type="text" class="form-control" name="musteri_soyad" value="<?php echo $musteri_soyad ?>" id="musteri_soyad" placeholder="Müşteri Soyad">
                </div>
                <div class="form-group col-md-8">
                  <label for="musteri_TC">TC Kimlik No</label>
                  <input type="text" class="form-control" name="musteri_TC" value="<?php echo $musteri_TC ?>" id="musteri_TC" placeholder="Müşteri TC">
                </div>
                <div class="form-group col-md-8">
                  <label for="musteri_mail">E-posta</label>
                  <input type="text" class="form-control" name="musteri_mail" value="<?php echo $musteri_mail ?>" id="musteri_mail" placeholder="Müşteri E-posta">
                </div>
                <div class="form-group col-md-8">
                  <label for="musteri_telefon">Telefon</label>
                  <input type="text" class="form-control" name="musteri_telefon" value="<?php echo $musteri_telefon ?>" id="musteri_telefon" placeholder="Müşteri Telefon">
                </div>
                <div class="form-group col-md-8">
                  <label for="musteri_adres">Adres</label>
                  <textarea class="form-control" name="musteri_adres" id="musteri_adres" rows="8" cols="80" placeholder="Müşteri Adres"><?php echo $musteri_adres ?></textarea>
                </div>
                <div class="form-group col-md-8">
                  <button class="btn btn-outline-primary" type="submit" value="<?php echo $id ?>" name="guncelle_musteri">Güncelle</button>
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
