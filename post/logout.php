<?php

session_start();
session_destroy();

header("Location:../panel/login.php");
exit;
?>
