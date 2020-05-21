<?php
require_once('../connect/index.php');
require_once('../functions.php');


if ($_POST) {

  if (!empty($_POST['ekle_ayar_secenek'])) {

    //  AYAR SEÇENEKLERİ EKLEME

    isLogin();

    $ayar_secenek = $_POST['ayar_secenek'];
    if(strlen($ayar_secenek) > 50 || $ayar_secenek == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Ayar seçeneği 50 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $ayar_deger = $_POST['ayar_deger'];
    if(strlen($ayar_deger) > 2500 || $ayar_deger == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Ayar değeri 2500 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $query = "INSERT INTO site_ayar (ayar_tip, ayar_deger) VALUES (?, ?)";
    $result = $conn->prepare($query);
    $result->bind_param("ss", $ayar_secenek, $ayar_deger);
    $result->execute();

    if($result)
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Ayar seceneği eklemesi başarılıydı.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Ayar seceneği eklemesi başarısız oldu.&alertClass=danger');

  }
  else if (!empty($_POST['guncelle_ayar_secenek'])) {

    //  AYAR SEÇENEKLERİ GÜNCELLEME

    isLogin();
    $id=$_POST['guncelle_ayar_secenek'];
    $ayar_secenek = $_POST['ayar_secenek'];

    if(strlen($ayar_secenek) > 50 || $ayar_secenek == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'&process=error&message=Ayar seçeneği 50 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $ayar_deger = $_POST['ayar_deger'];
    if(strlen($ayar_deger) > 2500 || $ayar_deger == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'&process=error&message=Ayar değeri 2500 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $query = "UPDATE site_ayar SET ayar_tip = ?, ayar_deger = ? WHERE ayar_id = ? ";
    $result = $conn->prepare($query);
    $result->bind_param("ssi", $ayar_secenek, $ayar_deger, $id);
    $result->execute();

    if($result)
      header('Location:'.$_SERVER['HTTP_REFERER'].'&process=success&message=Ayar seceneği düzenlemesi başarılıydı.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'&process=error&message=Ayar seceneği düzenlemesi başarısız oldu.&alertClass=danger');

  }else if (!empty($_POST['sil_ayar_secenek'])) {

    //  AYAR SEÇENEKLERİ SİLME

    isLogin();
    $id=$_POST['sil_ayar_secenek'];

    $query = "DELETE FROM site_ayar WHERE ayar_id = ? ";
    $result = $conn->prepare($query);
    $result->bind_param("i", $id);
    $result->execute();

    if($result)
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Ayar seceneğini silme başarılıydı.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Ayar seceneğini silme başarısız oldu.&alertClass=danger');

  }else 
    header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=API gönderilen post verisinde bir submit bulamadı.&alertClass=danger');

}else
  header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=API bir post verisi bulamadı.&alertClass=danger');


 ?>
