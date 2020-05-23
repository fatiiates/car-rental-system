<?php
require_once('../header.php');
require_once('../sidebar.php');


$query = 'SELECT arac_kiralama.kira_id,
                 arac.arac_plaka,
                 mevcut_arac_bilgi.arac_marka,
                 mevcut_arac_bilgi.arac_model,
                 mevcut_arac_bilgi.arac_yil,
                 mevcut_arac_bilgi.arac_kira_ucret,
                 musteri.musteri_ad,
                 musteri.musteri_soyad,
                 musteri.musteri_TC,
                 arac_kiralama.kira_tarih,
                 arac_kiralama.kira_bitis
                 FROM arac,arac_kiralama,musteri,mevcut_arac_bilgi
                 WHERE arac.arac_id = arac_kiralama.arac_id AND
                 musteri.musteri_id = arac_kiralama.musteri_id AND
                 mevcut_arac_bilgi.arac_bilgi_id = arac.arac_bilgi_id';
$result = $conn->prepare($query);
$result->execute();
$result->bind_result($kira_id,
                     $arac_plaka,
                     $arac_marka,
                     $arac_model,
                     $arac_yil,
                     $arac_kira_ucret,
                     $musteri_ad,
                     $musteri_soyad,
                     $musteri_TC,
                     $kira_tarih,
                     $kira_bitis
                   );


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
                      <th>Araç</th>
                      <th>Müşteri</th>
                      <th>Başlangıç Tarihi</th>
                      <th>Bitiş Tarihi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    while ($result->fetch()) { ?>
                      <tr>
                        <td>
                          <a class="btn btn-primary" href="panel/araclar/kiralanan-arac-guncelle.php?id=<?php echo $kira_id ?>">Güncelle</a>
                        </td>
                        <td>
                          <form action="post/admin/araclar.php" method="post">
                            <button class="btn btn-danger" type="submit" value="<?php echo $kira_id ?>" name="sil_kiralama">Sil</button>
                          </form>
                        </td>
                        <td><?php echo $i ?></td>
                        <td><?php echo $arac_plaka.", ".
                                        $arac_marka.", ".
                                        $arac_model.", ".
                                        $arac_yil.", ".
                                        $arac_kira_ucret ?>
                        </td>
                        <td><?php echo $musteri_ad.", ".
                                       $musteri_soyad.", ".
                                       $musteri_TC ?>
                        </td>
                        <td><?php echo $kira_tarih ?></td>
                        <td><?php echo $kira_bitis ?></td>
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
