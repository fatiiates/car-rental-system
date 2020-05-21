<?php
require_once('../header.php');
require_once('../sidebar.php');

$query = "SELECT mesaj_id,
                 mesaj_icerik,
                 mesaj_tarih,
                 mesaj_gonderen,
                 mesaj_mail,
                 mesaj_tel
                 FROM mesaj WHERE mesaj_durum = 0";
$result = $conn->prepare($query);
$result->execute();
$result->bind_result($id, $mesaj_icerik, $mesaj_tarih, $mesaj_gonderen, $mesaj_mail, $mesaj_telefon);

?>
  <div class="admin-panel bg-light float-left h-100 p-5" >
    <div class="admin-panel-content bg-light w-100 h-100 p-5">
      <div class="col-md-12 border-left border-primary border-width-10 p-5">
          <h1 class="border-bottom border-primary pb-3">
            OKUNMUŞ MESAJLAR
          </h1>
          <p class=" font-weight-light font-italic pt-3">Bu sekmede gönderilmiş ve okunan mesajlarınızı yönetebilirsiniz.</p>
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
        <div class="card border-primary mb-3 ">
          <div class="card-header bg-primary text-light">Okunmuş Mesajlar</div>
            <div class="card-body text-primary">
              <div class="table-responsive" style="overflow-x:auto;overflow-y:auto;">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th></th>
                      <th></th>
                      <th>#</th>
                      <th>İçerik</th>
                      <th>Gönderim Tarihi</th>
                      <th>Gönderen</th>
                      <th>Mail</th>
                      <th>Telefon</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    while ($result->fetch()) {  ?>
                      <tr>
                        <td>
                          <form class="" action="post/admin/mesajlar.php" method="post">
                            <button class="btn btn-warning" type="submit" value="<?php echo $id ?>" name="guncelle_okunmadı_olarak">Okunmadı ol. iş.</button>
                          </form>
                        </td>
                        <td>
                          <form class="" action="post/admin/mesajlar.php" method="post">
                            <button class="btn btn-danger" type="submit" value="<?php echo $id ?>" name="sil_mesaj">Sil</button>
                          </form>
                        </td>
                        <td><?php echo $i ?></td>
                        <td><?php echo $mesaj_icerik ?></td>
                        <td><?php echo $mesaj_tarih ?></td>
                        <td><?php echo $mesaj_gonderen ?></td>
                        <td><?php echo $mesaj_mail ?></td>
                        <td><?php echo $mesaj_telefon ?></td>
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
