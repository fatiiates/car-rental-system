<?php
define( 'ROOT_DIR', $_SERVER['HTTP_HOST'] != "demo-arac-kiralama.ueuo.com" ? $_SERVER['DOCUMENT_ROOT'].'/oto-kiralama':$_SERVER['DOCUMENT_ROOT']);

require_once(ROOT_DIR.'/post/connect/usr-connect.php');

$keys= ['DESCRIPTION' => 'description', 'KEYWORDS' => 'keywords', 'AUTHOR'  => 'author'];

 ?>

<!DOCTYPE html>
<html lang="tr" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php foreach ($keys as $key => $value) {

      $ayar_query = "SELECT ayar_deger FROM site_ayar WHERE ayar_tip = ?";
      $ayar_result = $conn->prepare($ayar_query);
      $ayar_result->bind_param('s', $key);
      $ayar_result->execute();
      $ayar_result->bind_result($ayar_deger);
      $ayar_result->fetch();

      mysqli_close($conn);
      if($key != 'AUTHOR')
        $conn = mysqli_connect($serverName,$userID,$userPass,$database);

    ?>
      <meta name="<?php echo $value ?>" content="<?php echo $ayar_deger ?>">
    <?php } ?>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <base href="http://<?php echo $_SERVER['HTTP_HOST'].($_SERVER['HTTP_HOST'] != "demo-arac-kiralama.ueuo.com" ? '/oto-kiralama/' :'/')?>"  >
    <title>Prusa Oto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/master.css">
  </head>
