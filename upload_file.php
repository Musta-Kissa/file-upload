<?php
  session_start();
  if($_SESSION['logged-in'] != true){
    header('Location: ./login.php');
  }
?>
<!DOCTYPE html>
<html>
   <head>
   </head>
<body>
  <form action="./login.php">
    <input type="submit" value="change user">
  </form>
  <?php
  echo "<p>user: <b>" . $_SESSION["username"] . "</b></p>";
  ?>
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" style="border: 1px solid #ccc;height: 90px">
    <br>
    <p><input type="submit" name="clicked" value="Upload"></p>
  </form>
  <?php
    if(!isset($_POST['clicked'])){
      exit();
    }
    if(empty($_FILES["file"]["name"])){
      echo "<p><b>Choose a file</b></p>";
      exit();
    }
    mkdir("./uploads/" . $_SESSION["username"]);
    echo "<br>";
    echo "submited" . "<br>";
    echo "name: " . $_FILES["file"]['name']."<br>";
    echo "tmp_name: " . $_FILES["file"]['tmp_name']."<br>";
    echo "size: " . $_FILES["file"]['size']."<br>";
    echo "file error: " . $_FILES['file']['error']."<br>";
    echo "move error: " . 
    move_uploaded_file(
      $_FILES['file']['tmp_name'],
      "./uploads/" . $_SESSION["username"] . "/" . $_FILES["file"]["name"]);
  ?>
</body>
<html>
