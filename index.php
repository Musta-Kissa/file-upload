<?php
  session_start();
  if($_SESSION['logged-in'] == true){
    header('Location: ./file-upload.php');
  }else {
    header('Location: ./login.php');
  }
?>
