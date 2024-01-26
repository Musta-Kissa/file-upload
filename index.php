<?php
  session_start();
  if($_SESSION['logged-in'] == true){
    header('Location: ./upload_file.php');
  }else {
    header('Location: ./login.php');
  }
?>
