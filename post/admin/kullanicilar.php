<?php
require_once('../connect/index.php');
require_once('../functions.php');


if ($_POST) {

  if (!empty($_POST['guncelle_kullanici_sifre'])) {

    //  KULLANICI ŞİFRE GÜNCELLEME

    isLogin();

    $id = mysqli_real_escape_string($conn, $_SESSION['usr-admin']);
    $query = "SELECT kullanici_sifre FROM kullanici WHERE kullanici_id = ?";
    $result = $conn->prepare($query);
    $result->bind_param("i", $id);
    $result->execute();
    $result->bind_result($kayitli_sifre);
    $result->fetch();

    mysqli_close($conn);
    $conn=mysqli_connect($serverName,$userID,$userPass,$database);

    $mevcut_sifre = md5($_POST['mevcut_sifre']);
    if(strlen($mevcut_sifre) > 50 || $mevcut_sifre == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Mevcut şifreniz 50 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $yeni_sifre = md5($_POST['yeni_sifre']);
    if(strlen($yeni_sifre) > 50 || $yeni_sifre == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Yeni şifreniz 50 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $yeni_sifre_r = md5($_POST['yeni_sifre_r']);
    if(strlen($yeni_sifre_r) > 50 || $yeni_sifre_r == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Yeni şifrenizin tekrarı 50 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    if($yeni_sifre != $yeni_sifre_r){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Yeni şifreleriniz birbiriyle uyuşmuyor.&alertClass=danger');
      exit;
    }

    if($mevcut_sifre != $kayitli_sifre){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Mevcut şifreniz kayıtlı şifrenizle uyuşmuyor.&alertClass=danger');
      exit;
    }

    $query = "UPDATE kullanici SET kullanici_sifre = ? WHERE kullanici_id = ? ";
    $result = $conn->prepare($query);
    $result->bind_param("si", $yeni_sifre, $id);
    $result->execute();
    // çıkış atılacak
    if($result)
      require_once('../logout.php');
      //header('Location:'.$_SERVER['HTTP_REFERER'].'&process=success&message=Kullanıcı düzenlemesi başarılıydı.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'&process=error&message=Kullanıcı düzenlemesi başarısız oldu.&alertClass=danger');


  }
  else if (!empty($_POST['guncelle_kullanici_bilgi'])) {

    //  KULLANICI BİLGİ GÜNCELLEME

    isLogin();

    $id=mysqli_real_escape_string($conn, $_POST['guncelle_kullanici_bilgi']);
    $kullanici_ad = $_POST['kullanici_ad'];
    if(strlen($kullanici_ad) > 50 || $kullanici_ad == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Adınız 50 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $kullanici_soyad = $_POST['kullanici_soyad'];
    if(strlen($kullanici_soyad) > 50 || $kullanici_soyad == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Soyadınız 50 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $kullanici_user_id = $_POST['kullanici_user_id'];
    if(strlen($kullanici_user_id) > 50 || $kullanici_user_id == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Kullanıcı adı 50 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $kullanici_mail = $_POST['kullanici_mail'];
    if(strlen($kullanici_mail) > 100 || $kullanici_mail == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Kullanıcı e-postanız 100 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $kullanici_telefon = $_POST['kullanici_telefon'];
    if(strlen($kullanici_telefon) > 10 || $kullanici_telefon == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Telefon numaranız 10 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }
    $kullanici_adres = $_POST['kullanici_adres'];
    if(strlen($kullanici_adres) > 1000 || $kullanici_adres == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Adresiniz 1000 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $query = "UPDATE kullanici SET kullanici_ad = ?, kullanici_soyad = ?, kullanici_user_id = ?, kullanici_mail = ?, kullanici_telefon = ?, kullanici_adres = ? WHERE kullanici_id = ? ";
    $result = $conn->prepare($query);
    $result->bind_param("ssssssi", $kullanici_ad, $kullanici_soyad, $kullanici_user_id, $kullanici_mail, $kullanici_telefon, $kullanici_adres, $id);
    $result->execute();

    if($result)
      header('Location:'.$_SERVER['HTTP_REFERER'].'&process=success&message=Kullanıcı düzenlemesi başarılıydı.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'&process=error&message=Kullanıcı düzenlemesi başarısız oldu.&alertClass=danger');

  }else
    header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=API gönderilen post verisinde bir submit bulamadı.&alertClass=danger');

}else
  header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=API bir post verisi bulamadı.&alertClass=danger');


 ?>
