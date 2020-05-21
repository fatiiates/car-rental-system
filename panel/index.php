<?php

require_once('header.php');
require_once('sidebar.php');

$query = "SELECT * FROM site_ayar";
$result = $conn->prepare($query);
$result->execute();
$result->bind_result($id, $ayar_secenek, $ayar_deger);

?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-light w-100 h-100 p-5">
      <div class="col-md-12 border-left border-success border-width-10 p-5">
          <h1 class="border-bottom border-primary pb-3">
            ANASAYFA
          </h1>
          <p class=" font-weight-light font-italic pt-3">Soldaki sekmelerden sayfalar arasında gezinebilirsiniz
            ayrıca aşağıdaki tablodan site ayarlarınızı yönetebilirsiniz.</p>
          <a href="panel/ayarlar" class="btn btn-success">Ayar Seçeneği Ekle</a>
      </div>
      <div class="col-md-12 mt-5">
        <div class="card border-dark mb-3 ">
          <div class="card-header bg-dark text-light">Ayarlar</div>
            <div class="card-body text-dark">
              <div class="table-responsive" style="overflow-x:auto;overflow-y:auto;">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th></th>
                      <th></th>
                      <th>#</th>
                      <th>Seçenek</th>
                      <th>Değer</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    while ($result->fetch()) {  ?>
                      <tr>
                        <td>
                          <a class="btn btn-primary" href="panel/ayarlar/ayar-guncelle.php?id=<?php echo $id ?>" >Güncelle</a>
                        </td>
                        <td>
                          <form class="" action="api/admin/ayarlar.php" method="post">
                            <button class="btn btn-danger" type="submit" name="sil_ayar_secenek" value="<?php echo $id ?>">Sil</button>
                          </form>
                        </td>
                        <td><?php echo $i ?></td>
                        <td><?php echo $ayar_secenek ?></td>
                        <td><?php echo $ayar_deger ?></td>
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
<?php
require_once('footer.php');
 ?>
