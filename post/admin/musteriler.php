<?php
require_once('../connect/index.php');
require_once('../functions.php');


if ($_POST) {

  if (!empty($_POST['ekle_musteri'])) {

    //  MÜŞTERİ EKLEME

    isLogin();

    $musteri_ad = $_POST['musteri_ad'];
    if(strlen($musteri_ad) > 50 || $musteri_ad == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Müşteri adı 50 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $musteri_soyad = $_POST['musteri_soyad'];
    if(strlen($musteri_soyad) > 50 || $musteri_soyad == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Müşteri soyadı 50 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $musteri_TC = $_POST['musteri_TC'];
    if(strlen($musteri_TC) > 11 || $musteri_TC == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Müşteri TC kimlik numarası 11 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $musteri_mail = $_POST['musteri_mail'];
    if(strlen($musteri_TC) > 100 || $musteri_TC == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Müşteri e-postası 100 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $musteri_telefon = $_POST['musteri_telefon'];
    if(strlen($musteri_telefon) > 10 || $musteri_telefon == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Müşteri telefonu 10 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $musteri_adres = $_POST['musteri_adres'];
    if(strlen($musteri_adres) > 500 || $musteri_adres == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Müşteri adresi 500 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $query = "INSERT INTO musteri (musteri_ad, musteri_soyad, musteri_TC, musteri_mail, musteri_telefon, musteri_adres) VALUES (?,?,?,?,?,?)";
    $result = $conn->prepare($query);
    $result->bind_param("ssssss", $musteri_ad, $musteri_soyad, $musteri_TC, $musteri_mail, $musteri_telefon, $musteri_adres);
    $result->execute();

    if($result)
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Yeni müşteri eklemesi başarılıydı.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Yeni müşteri eklemesi başarısız oldu.&alertClass=danger');

  }else if (!empty($_POST['guncelle_musteri'])) {

    //  MÜŞTERİ GÜNCELLEME

    isLogin();

    $id=mysqli_real_escape_string($conn, $_POST['guncelle_musteri']);
    $musteri_ad = $_POST['musteri_ad'];
    if(strlen($musteri_ad) > 50 || $musteri_ad == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Müşteri adı 50 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $musteri_soyad = $_POST['musteri_soyad'];
    if(strlen($musteri_soyad) > 50 || $musteri_soyad == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Müşteri soyadı 50 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $musteri_TC = $_POST['musteri_TC'];
    if(strlen($musteri_TC) > 11 || $musteri_TC == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Müşteri TC kimlik numarası 11 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $musteri_mail = $_POST['musteri_mail'];
    if(strlen($musteri_TC) > 100 || $musteri_TC == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Müşteri e-postası 100 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $musteri_telefon = $_POST['musteri_telefon'];
    if(strlen($musteri_telefon) > 10 || $musteri_telefon == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Müşteri telefonu 10 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $musteri_adres = $_POST['musteri_adres'];
    if(strlen($musteri_adres) > 500 || $musteri_adres == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Müşteri adresi 500 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $query = "UPDATE musteri SET musteri_ad = ?, musteri_soyad = ?, musteri_TC = ?, musteri_mail = ?, musteri_telefon = ?, musteri_adres = ? WHERE musteri_id = ?";
    $result = $conn->prepare($query);
    $result->bind_param("ssssssi", $musteri_ad, $musteri_soyad, $musteri_TC, $musteri_mail, $musteri_telefon, $musteri_adres, $id);
    $result->execute();

    if($result)
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Yeni müşteri eklemesi başarılıydı.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Yeni müşteri eklemesi başarısız oldu.&alertClass=danger');

  }else if (!empty($_POST['sil_musteri'])) {

    //  MUSTERİ SİLME

    isLogin();
    $id=$_POST['sil_musteri'];

    $query = "DELETE FROM musteri WHERE musteri_id = ? ";
    $result = $conn->prepare($query);
    $result->bind_param("i", $id);
    $result->execute();
    print_r($result);
    if($result)
    if ($result->errno == 1451)
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Öncelikle ilişkili tablolardaki verileri silmelsiniz(bkz:Araç kiralamaları).&alertClass=danger');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Müşteri silme başarılıydı.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Müşteri silme başarısız oldu.&alertClass=danger');

  }else
    header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=API gönderilen post verisinde bir submit bulamadı.&alertClass=danger');

}else
  header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=API bir post verisi bulamadı.&alertClass=danger');


 ?>
