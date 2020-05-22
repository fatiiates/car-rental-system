<?php
require_once('../connect/usr-connect.php');
require_once('../functions.php');


if ($_POST) {

  if (!empty($_POST['gonder_mesaj'])) {

    //  AYAR SEÇENEKLERİ EKLEME

    $mesaj_gonderen = $_POST['gonderen'];
    if(strlen($mesaj_gonderen) > 50 || $mesaj_gonderen == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=İsminiz 50 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $mesaj_mail = $_POST['mail'];
    if(strlen($mesaj_mail) > 100 || $mesaj_mail == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=E-postanız 100 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $mesaj_telefon = $_POST['telefon'];
    if(strlen($mesaj_telefon) > 10 || $mesaj_telefon == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Telefonunuz 10 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $mesaj_icerik = $_POST['icerik'];
    if(strlen($mesaj_icerik) > 500 || $mesaj_icerik == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Mesajınızın içeriği 500 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }
    $mesaj_tarih = date("Y-m-d H:i:s");
    $param = 1;
    $query = "INSERT INTO mesaj (mesaj_icerik, mesaj_tarih, mesaj_gonderen, mesaj_mail, mesaj_tel, mesaj_durum) VALUES (?,?,?,?,?,?)";
    $result = $conn->prepare($query);
    $result->bind_param("sssssi", $mesaj_icerik, $mesaj_tarih, $mesaj_gonderen, $mesaj_mail, $mesaj_telefon, $param);
    $result->execute();

    if($result)
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Mesaj başarıyla gönderildi.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Mesaj gönderme başarısız oldu.&alertClass=danger');

  }else
    header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Gönderilen post verisinde bir submit bulamadı.&alertClass=danger');

}else
  header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=API bir post verisi bulamadı.&alertClass=danger');


 ?>
