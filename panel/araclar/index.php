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
      <div class="col-md-12 border-left border-success border-width-10 p-5">
          <h1 class="border-bottom border-primary pb-3">
            ARAÇLAR
          </h1>
          <p class=" font-weight-light font-italic pt-3">Bu sekmede araçlarınızı düzenleyebilir, yeni araç ekleyebilir, mevcut aracınızı güncelleyebilirsiniz.</p>
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
        <div class="card border-success mb-3 ">
          <div class="card-header bg-success text-light">Araçlar</div>
            <div class="card-body text-success">
              <div class="table-responsive" style="overflow-x:auto;overflow-y:auto;">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th></th>
                      <th></th>
                      <th>#</th>
                      <th>Plaka</th>
                      <th>Marka</th>
                      <th>Model</th>
                      <th>Yıl</th>
                      <th>Kira Ücreti(saatlik)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    while ($result->fetch()) { ?>
                      <tr>
                        <td>
                          <a class="btn btn-primary" href="panel/araclar/arac-guncelle.php?id=<?php echo $id ?>">Güncelle</a>
                        </td>
                        <td>
                          <form action="api/admin/araclar.php" method="post">
                            <button class="btn btn-danger" type="submit" value="<?php echo $id ?>" name="sil_arac">Sil</button>
                          </form>
                        </td>
                        <td><?php echo $i ?></td>
                        <td><?php echo $arac_plaka ?></td>
                        <td><?php echo $arac_marka ?></td>
                        <td><?php echo $arac_model ?></td>
                        <td><?php echo $arac_yil ?></td>
                        <td><?php echo $arac_kira_ucret ?></td>
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
