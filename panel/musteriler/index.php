<?php
require_once('../header.php');
require_once('../sidebar.php');

$query = "SELECT * FROM musteri";
$result = $conn->prepare($query);
$result->execute();
$result->bind_result($id, $musteri_ad, $musteri_soyad, $musteri_TC, $musteri_mail,  $musteri_adres, $musteri_telefon);

?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-light w-100 h-100 p-5">
      <div class="col-md-12 border-left border-danger border-width-10 p-5">
          <h1 class="border-bottom border-danger pb-3">
            MÜŞTERİLER
          </h1>
          <p class=" font-weight-light font-italic pt-3">Bu sekmede müşterilerinizi yönetebilirsiniz.</p>
      </div>
      <div class="col-md-12 mt-5">
        <?php if (!empty($_GET['message'])): ?>
          <div class="alert alert-<?php echo $_GET['alertClass']  ?> alert-dismissible fade show" role="alert">
            <?php echo $_GET['message']  ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <div class="card border-danger mb-3 ">
          <div class="card-header bg-danger text-light">Müşteriler</div>
            <div class="card-body text-danger">
              <div class="table-responsive" style="overflow-x:auto;overflow-y:auto;">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th></th>
                      <th></th>
                      <th>#</th>
                      <th>Ad Soyad</th>
                      <th>TC Kimlik No</th>
                      <th>E-posta</th>
                      <th>Telefon</th>
                      <th>Adres</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    while ($result->fetch()) {  ?>
                      <tr>
                        <td>
                          <a href="panel/musteriler/musteri-guncelle.php?id=<?php echo $id ?>" class="btn btn-success" type="submit" value="<?php echo $id ?>" name="guncelle_musteri">Güncelle</a>
                        </td>
                        <td>
                          <form class="" action="post/admin/musteriler.php" method="post">
                            <button class="btn btn-danger" type="submit" value="<?php echo $id ?>" name="sil_musteri">Sil</button>
                          </form>
                        </td>
                        <td><?php echo $i ?></td>
                        <td><?php echo $musteri_ad." ".$musteri_soyad ?></td>
                        <td><?php echo $musteri_TC ?></td>
                        <td><?php echo $musteri_mail ?></td>
                        <td><?php echo $musteri_telefon ?></td>
                        <td><?php echo $musteri_adres ?></td>
                      </tr>
                    <?php $i++; } ?>
                  </tbody>
                </table>
              </div>
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
