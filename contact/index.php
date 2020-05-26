<?php require_once('../header.php'); ?>
<style media="screen">
  .nav-link-custom{color:black!important}
</style>
<div class="container">
  <div class="w-100 min-vh-100 shadow-lg bg-light d-flex justify-content-center align-items-center text-center">
    <div class="w-100 row justify-content-around" style="margin-top: 150px;">
      <?php
      $keys = array('MAIL' => array('name' => 'E-posta', 'alertClass' => 'primary', 'href' => 'mailto:'),
               'TELEFON' => array('name' => 'Telefon Numarası', 'alertClass' => 'danger', 'href' => 'tel:'),
               'ADRES' => array('name' => 'Adres', 'alertClass' => 'info', 'href' => '', 'googleUrl' => 'GOOGLE_URL')
             );

      foreach ($keys as $key => $value) {

        $conn=mysqli_connect($serverName,$userID,$userPass,$database);

        $query = "SELECT ayar_deger FROM site_ayar WHERE ayar_tip = ?";
        $result = $conn->prepare($query);
        $result->bind_param('s', $key);
        $result->execute();
        $result->bind_result($ayar_deger);
        $result->fetch();
        if(empty($ayar_deger))
          $ayar_deger = $value['name'].' bilgisi bulunamadı.';
        ?>
        <div class="card col-md-5 p-0 m-2 float-left">
          <div class="card-header bg-<?php echo $value['alertClass'] ?> text-light "><?php echo $value['name'] ?></div>
          <div class="card-body">
            <a <?php empty($value['href']) ? '':'href="'.$value['href'].'"' ?> class="nav-link nav-link-custom card-text text-dark"><?php echo $ayar_deger ?></a>
            <?php
            if ($value['name'] == 'Adres') {

              mysqli_close($conn);
              $conn=mysqli_connect($serverName,$userID,$userPass,$database);

              $query = "SELECT ayar_deger FROM site_ayar WHERE ayar_tip = ?";
              $result = $conn->prepare($query);
              $result->bind_param('s', $value['googleUrl']);
              $result->execute();
              $result->bind_result($ayar_deger);
              $result->fetch();
              if(!empty($ayar_deger)){ ?>
              <iframe src="<?php echo $ayar_deger ?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              <?php
              }
            } ?>
          </div>
        </div>
        <?php
        mysqli_close($conn);
      } ?>
    </div>
  </div>
</div>
<?php
require_once('../footer.php');

 ?>
