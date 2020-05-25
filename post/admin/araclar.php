<?php
require_once('../connect/index.php');
require_once('../functions.php');


if ($_POST) {

  if (!empty($_POST['ekle_arac'])) {

    //  ARAÇ EKLEME

    isLogin();

    $arac_plaka = $_POST['arac_plaka'];
    if(strlen($arac_plaka) > 20 || $arac_plaka == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç plakası 20 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $arac_bilgi_id= $_POST['arac_secenek'];
    if(strlen($arac_bilgi_id) > 11 || $arac_bilgi_id == "" || $arac_bilgi_id < 0){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç seçeneği 11 karakterden fazla, 0\'dan küçük veya boş olamazz.&alertClass=danger');
      exit;
    }

    $query = "INSERT INTO arac (arac_plaka, arac_bilgi_id) VALUES (?, ?)";
    $result = $conn->prepare($query);
    $result->bind_param("si", $arac_plaka, $arac_bilgi_id);
    $result->execute();

    if($result)
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Araç eklemesi başarılıydı.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç eklemesi başarısız oldu.&alertClass=danger');

  }else if (!empty($_POST['guncelle_arac'])) {

    //  ARAÇ GÜNCELLEME

    isLogin();

    $id=mysqli_real_escape_string($conn, $_POST['guncelle_arac']);
    $arac_plaka = $_POST['arac_plaka'];
    if(strlen($arac_plaka) > 20 || $arac_plaka == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç plakası 20 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $arac_bilgi_id = $_POST['arac_secenek'];
    if(strlen($arac_bilgi_id) > 11 || $arac_bilgi_id == "" || $arac_bilgi_id < 0){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç seçeneği 11 karakterden fazla, 0\'dan küçük veya boş olamaz.&alertClass=danger');
      exit;
    }

    $query = "UPDATE arac SET arac_plaka = ?, arac_bilgi_id = ? WHERE arac_id = ?";
    $result = $conn->prepare($query);
    $result->bind_param("sii", $arac_plaka, $arac_bilgi_id, $id);
    $result->execute();

    if($result)
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Ayar güncellemesi başarılıydı.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Ayar güncellemesi başarısız oldu.&alertClass=danger');

  }else if (!empty($_POST['ekle_arac_secenek'])) {

    //  ARAÇ SEÇENEK EKLEME

    isLogin();

    $arac_marka = $_POST['arac_marka'];
    if(strlen($arac_marka) > 50 || $arac_marka == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç markası 20 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $arac_model = $_POST['arac_model'];
    if(strlen($arac_model) > 50 || $arac_model == ""){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç modeli 50 karakterden fazla veya boş olamaz.&alertClass=danger');
      exit;
    }

    $arac_yil = $_POST['arac_yil'];
    if(strlen($arac_yil) > 4 || $arac_yil == "" || $arac_yil < 0){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç yılı 4 karakterden fazla, 0\'dan küçük veya boş olamaz.&alertClass=danger');
      exit;
    }

    $arac_kira_ucret = $_POST['arac_kira_ucret'];
    if(strlen($arac_kira_ucret) > 7 || $arac_kira_ucret == "" || $arac_kira_ucret < 0){
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç kira ücreti 7 karakterden fazla, 0\'dan küçük veya boş olamaz.&alertClass=danger');
      exit;
    }

    $query = "INSERT INTO mevcut_arac_bilgi (arac_marka, arac_model, arac_yil, arac_kira_ucret) VALUES (?,?,?,?)";
    $result = $conn->prepare($query);
    $result->bind_param("ssid", $arac_marka, $arac_model, $arac_yil, $arac_kira_ucret);
    $result->execute();

    if($result)
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Araç seçeneği eklemesi başarılıydı.&alertClass=success');
    else
      header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç seçeneği eklemesi başarısız oldu.&alertClass=danger');

    }else if (!empty($_POST['guncelle_arac_secenek'])) {

      //  ARAÇ SEÇENEK GÜNCELLEME

      isLogin();

      $id=mysqli_real_escape_string($conn, $_POST['guncelle_arac_secenek']);
      $arac_marka = $_POST['arac_marka'];
      if(strlen($arac_marka) > 50 || $arac_marka == ""){
        header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç markası 20 karakterden fazla veya boş olamaz.&alertClass=danger');
        exit;
      }

      $arac_model = $_POST['arac_model'];
      if(strlen($arac_model) > 50 || $arac_model == ""){
        header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç modeli 50 karakterden fazla veya boş olamaz.&alertClass=danger');
        exit;
      }

      $arac_yil = $_POST['arac_yil'];
      if(strlen($arac_yil) > 4 || $arac_yil == "" || $arac_yil < 0){
        header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç yılı 4 karakterden fazla, 0\'dan küçük veya boş olamaz.&alertClass=danger');
        exit;
      }

      $arac_kira_ucret = $_POST['arac_kira_ucret'];
      if(strlen($arac_kira_ucret) > 7 || $arac_kira_ucret == "" || $arac_kira_ucret < 0){
        header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç kira ücreti 7 karakterden fazla, 0\'dan küçük veya boş olamaz.&alertClass=danger');
        exit;
      }

      $query = "UPDATE mevcut_arac_bilgi SET arac_marka = ?, arac_model = ?, arac_yil = ?, arac_kira_ucret = ? WHERE arac_bilgi_id = ?";
      $result = $conn->prepare($query);
      $result->bind_param("ssidi", $arac_marka, $arac_model, $arac_yil, $arac_kira_ucret, $id);
      $result->execute();

      if($result)
        header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Araç seçeneği güncellemesi başarılıydı.&alertClass=success');
      else
        header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç seçeneği güncellemesi başarısız oldu.&alertClass=danger');

      }else if (!empty($_POST['ekle_kira'])) {

        //  ARAÇ KİRALAMA

        isLogin();

        $arac_id = mysqli_real_escape_string($conn, $_POST['arac_secenek']);
        $musteri_id = mysqli_real_escape_string($conn, $_POST['musteri_secenek']);

        $kira_tarih = $_POST['kira_tarih'];
        $kira_bitis = $_POST['kira_bitis'];

        $query = "SELECT kira_bitis FROM arac_kiralama WHERE arac_id = ?";
        $result = $conn->prepare($query);
        $result->bind_param("i", $arac_id);
        $result->execute();
        $result->bind_result($bitis_tarih);
        if ($kira_bitis < $kira_tarih) {
          header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Kira bitiş tarihi, başlangıç tarihinden büyük olamaz.&alertClass=danger');
          exit;
        }
        while ($result->fetch()) {
          if($bitis_tarih >= $kira_tarih){
            header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç seçili tarihlerde zaten kiralanmış.&alertClass=danger');
            exit;
          }
        }

        mysqli_close($conn);
        $conn=mysqli_connect($serverName,$userID,$userPass,$database);

        $query = "INSERT INTO arac_kiralama (arac_id, musteri_id, kira_tarih, kira_bitis) VALUES (?, ?, ?, ?)";
        $result = $conn->prepare($query);
        $result->bind_param("iiss", $arac_id, $musteri_id, $kira_tarih, $kira_bitis);
        $result->execute();

        if($result)
          header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Araç kiralaması tamamlandı.&alertClass=success');
        else
          header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç kiralaması başarısız oldu.&alertClass=danger');

      }else if (!empty($_POST['guncelle_kira'])) {

        //  ARAÇ KİRA GÜNCELLEME

        isLogin();

        $kira_id = mysqli_real_escape_string($conn, $_POST['guncelle_kira']);
        $arac_id = mysqli_real_escape_string($conn, $_POST['arac_secenek']);
        $musteri_id = mysqli_real_escape_string($conn, $_POST['musteri_secenek']);

        $kira_tarih = $_POST['kira_tarih'];
        $kira_bitis = $_POST['kira_bitis'];

        $query = "SELECT kira_bitis FROM arac_kiralama WHERE arac_id = ? AND kira_id != ?";
        $result = $conn->prepare($query);
        $result->bind_param("i", $arac_id, $kira_id);
        $result->execute();
        $result->bind_result($bitis_tarih);
        if ($kira_bitis < $kira_tarih) {
          header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Kira bitiş tarihi, başlangıç tarihinden büyük olamaz.&alertClass=danger');
          exit;
        }
        while ($result->fetch()) {
          if($bitis_tarih >= $kira_tarih){
            header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç seçili tarihlerde zaten kiralanmış.&alertClass=danger');
            exit;
          }
        }

        mysqli_close($conn);
        $conn=mysqli_connect($serverName,$userID,$userPass,$database);

        $query = "UPDATE arac_kiralama SET arac_id = ?, musteri_id = ?, kira_tarih = ?, kira_bitis = ? WHERE kira_id = ?";
        $result = $conn->prepare($query);
        $result->bind_param("iissi", $arac_id, $musteri_id, $kira_tarih, $kira_bitis, $kira_id);
        $result->execute();

        if($result)
          header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Kira güncellemesi tamamlandı.&alertClass=success');
        else
          header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Kira güncellemesi başarısız oldu.&alertClass=danger');

      }else if (!empty($_POST['sil_arac'])) {

        //  ARAÇ SİLME

        isLogin();

        $id=mysqli_real_escape_string($conn, $_POST['sil_arac']);

        $query = "DELETE FROM arac WHERE arac_id = ? ";
        $result = $conn->prepare($query);
        $result->bind_param("i", $id);
        $result->execute();

        if($result)
          header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Araç silme başarılıydı.&alertClass=success');
        else
          header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç silme başarısız oldu.&alertClass=danger');


      }else if (!empty($_POST['sil_kiralama'])) {

        //  ARAÇ KİRA SİLME

        isLogin();

        $id=mysqli_real_escape_string($conn, $_POST['sil_kiralama']);

        $query = "DELETE FROM arac_kiralama WHERE kira_id = ? ";
        $result = $conn->prepare($query);
        $result->bind_param("i", $id);
        $result->execute();

        if($result)
          header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Kiralama silme başarılıydı.&alertClass=success');
        else
          header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Kiralama silme başarısız oldu.&alertClass=danger');


      }else if (!empty($_POST['sil_arac_secenek'])) {
        //  ARAÇ SEÇENEK SİLME

        isLogin();

        $id=mysqli_real_escape_string($conn, $_POST['sil_arac_secenek']);

        $query = "DELETE FROM mevcut_arac_bilgi WHERE arac_bilgi_id = ? ";
        $result = $conn->prepare($query);
        $result->bind_param("i", $id);
        $result->execute();


        if($result){
          if ($result->errno == 1451)
            header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Öncelikle ilişkili tablolardaki verileri silmelsiniz(bkz:Araclar).&alertClass=danger');
          else
            header('Location:'.$_SERVER['HTTP_REFERER'].'?process=success&message=Araç seçeneği silme başarılıydı.&alertClass=success');
        }
        else
          header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=Araç seçeneği silme başarısız oldu.&alertClass=danger');


      }else
        header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=API gönderilen post verisinde bir submit bulamadı.&alertClass=danger');

  }else
    header('Location:'.$_SERVER['HTTP_REFERER'].'?process=error&message=API bir post verisi bulamadı.&alertClass=danger');


 ?>
