<?php
define( 'ROOT_DIR', dirname(__FILE__));

require_once('connect/index.php');

if ($_POST) {

  if (!empty($_POST['admin_login'])) {

        session_start();
        $admin_user_id=mysqli_real_escape_string($conn, $_POST['kullanici_ad']);
        $admin_PASS=md5(mysqli_real_escape_string($conn, $_POST['sifre']));

        if($admin_user_id && $admin_PASS){

            $query="SELECT kullanici_id FROM kullanici where kullanici_user_id = ? AND kullanici_sifre = ? AND kullanici_rol = 'admin'";
            $result = $conn->prepare($query);
            $result->bind_param("ss", $admin_user_id, $admin_PASS);
            $result->execute();
            $result->bind_result($id);
            $result->store_result();
            $count = $result->num_rows;
            $result->fetch();
            echo "Location:".ROOT_DIR."/../panel/index.php";
            if($count > 0){
                session_destroy();
                session_start();
                $_SESSION['usr-admin'] = $id;
                header("Location:../panel/index.php");
            }
            else
            header("Location:".$_SERVER['HTTP_REFERER'].'?process=false&message=Kullanıcı adı veya şifre yanlış.&alertClass=danger');
        }
    }else
      header("Location:".$_SERVER['HTTP_REFERER'].'?process=false&message=Gönderilen post verisinde bir submit bulunamadı.&alertClass=danger');

}else
  header("Location:".$_SERVER['HTTP_REFERER'].'?process=false&message=Giriş yapılamadı.&alertClass=danger');



 ?>
