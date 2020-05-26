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
            Kaynak Kodlar
          </h1>
          <p class=" font-weight-light font-italic pt-3">Bu sekmeden kaynak kodları ve veritabanı yedeğini alabilirsiniz.</p>
          <a href="panel/ayarlar" class="btn btn-success">Ayar Seçeneği Ekle</a>
      </div>
      <div class="col-md-12 mt-5">
        <a href="panel/kodlar.zip" class="btn btn-outline-success" download>Kodlar</a>
        <a href="panel/vt.zip" class="btn btn-outline-warning" download>Veritabanı</a>
      </div>
    </div>
  </div>
</div>
<?php
require_once('footer.php');
 ?>
