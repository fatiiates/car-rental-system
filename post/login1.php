<?php
require_once('baglan.php');

if ($_POST) {

  if (!empty($_POST['admin_login'])) {

        session_start();
        $admin_user_id=mysqli_real_escape_string($conn, $_POST['kullanici_ad']);
        $admin_PASS=md5(mysqli_real_escape_string($conn, $_POST['sifre']));

        if($admin_userID && $admin_PASS){

            $query="SELECT * FROM kullanici where kullanici_user_id = ? AND kullanici_sifre = ? AND kullanici_rol = 'admin'";
            $result = $conn->prepare($query);
            $result->bind_param("ss", $admin_user_id, $admin_PASS);
            $result->execute();
            $result->bind_result("ss", $admin_user_id, $admin_PASS);
            $result->store_result();
            $count = $result->num_rows;
            if($count > 0){
                session_destroy();
                session_start();
                $_SESSION['usr-admin'] = $admin_userID;
                header("Location:panel/index.php");
            }
            else{
                header("Location:sa-login.php?login=false");
            }

        }
    }else
      header("Location:../../error.php");

  }else {
    // code...
  }

}else {
  header("Location:".$_SERVER['HTTP_REFERER']);
}

 ?>
