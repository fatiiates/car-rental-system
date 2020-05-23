<?php
require_once('../header.php');
require_once('../sidebar.php');

$query = "SELECT * FROM mevcut_arac_bilgi";
$result = $conn->prepare($query);
$result->execute();
$result->bind_result($id, $arac_marka, $arac_model, $arac_yil, $arac_kira_ucret);

?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-light w-100 h-100 p-5">
      <div class="col-md-12 border-left border-dark border-width-10 p-5">
          <h1 class="border-bottom border-primary pb-3">
            ARAÇ SEÇENEKLERİ
          </h1>
          <p class=" font-weight-light font-italic pt-3">Bu sekmede araç seçeneklerinizi düzenleyebilir, yeni seçenek ekleyebilir, mevcut seçeneği güncelleyebilirsiniz.</p>
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
        <div class="card border-dark mb-3 ">
          <div class="card-header bg-dark text-light">Araçlar</div>
            <div class="card-body text-dark">
              <div class="table-responsive" style="overflow-x:auto;overflow-y:auto;">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th></th>
                      <th></th>
                      <th>#</th>
                      <th>Marka</th>
                      <th>Model</th>
                      <th>Yıl</th>
                      <th>Kira Ücreti(Günlük)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    while ($result->fetch()) { ?>
                      <tr>
                        <td>
                          <a class="btn btn-primary" href="panel/araclar/arac-secenek-guncelle.php?id=<?php echo $id ?>">Güncelle</a>
                        </td>
                        <td>
                          <form action="post/admin/araclar.php" method="post">
                            <button class="btn btn-danger" type="submit" value="<?php echo $id ?>" name="sil_arac_secenek">Sil</button>
                          </form>
                        </td>
                        <td><?php echo $i ?></td>
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
