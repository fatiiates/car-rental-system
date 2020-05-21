<?php
require_once('../connect/index.php');
require_once('../functions.php');


if ($_POST) {

  if (!empty($_POST['guncelle_okundu_olarak'])) {

    //  MESAJ OKUNDU OLARAK İŞARETLEME

    isLogin();

    $id = mysqli_real_escape_string($conn, $_POST['guncelle_okundu_olarak']);
    $param=0;

    $query = "UPDATE mesaj SET mesaj_durum = ? WHERE mesaj_id = ? ";
    $result = $conn->prepare($query);
    $result->bind_param("ii", $param, $id);
    $result->execute();

    if($result)
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Mesaj okundu olarak işaretlendi.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Mesaj okundu olarak işaretlenemedi.&alertClass=danger');


  }
  else if (!empty($_POST['guncelle_okunmadı_olarak'])) {

    //  MESAJ OKUNDU OLARAK İŞARETLEME

    isLogin();

    $id = mysqli_real_escape_string($conn, $_POST['guncelle_okunmadı_olarak']);
    $param=1;

    $query = "UPDATE mesaj SET mesaj_durum = ? WHERE mesaj_id = ? ";
    $result = $conn->prepare($query);
    $result->bind_param("ii", $param, $id);
    $result->execute();

    if($result)
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Mesaj okundu olarak işaretlendi.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Mesaj okundu olarak işaretlenemedi.&alertClass=danger');


  }else if (!empty($_POST['sil_mesaj'])) {

    //  MESAJ OKUNDU OLARAK İŞARETLEME

    isLogin();

    $id = mysqli_real_escape_string($conn, $_POST['sil_mesaj']);

    $query = "DELETE FROM mesaj WHERE mesaj_id = ? ";
    $result = $conn->prepare($query);
    $result->bind_param("i", $id);
    $result->execute();

    if($result)
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Mesajın silinmesi başarılıydı.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Mesajın silinmesi başarısız oldu.&alertClass=danger');


  }else
    header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=API gönderilen post verisinde bir submit bulamadı.&alertClass=danger');

}else
  header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=API bir post verisi bulamadı.&alertClass=danger');


 ?>
