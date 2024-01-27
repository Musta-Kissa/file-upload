<?php
  session_start();
  if($_SESSION['logged-in'] != true){
    header('Location: ./login.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="style.css">
  </head>
<body>
  <div style="float:left;padding:1rem">
  <form action="./login.php">
    <input type="submit" value="change user">
  </form>
  <?php
  echo "<p>user: <b>" . $_SESSION["username"] . "</b></p>";
  ?>
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="file" style="border: 1px solid rgb(108, 100, 89);height: 90px">
    <br>
    <p><input type="submit" name="clicked" value="Upload"></p>
  </form>
  <?php
  function upload(){
    if(!isset($_POST['clicked'])){
      return;
    }
    if(empty($_FILES["file"]["name"])){
      echo "<p><b>Choose a file</b></p>";
      return;
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
  }upload();
  ?>
  </div>
  <div style="float:left;padding:1rem">
  <?php
    function printDir($dir) {
      $out = array();
      foreach (glob($dir . '/*') as $i => $file) {
        $file_relative = str_replace($dir . "/","",$file);
        if(is_dir($file) == true){
          echo "<div name=\"$file\">\n";
          echo "<li><b>".end(explode('/',$file)).":</b></li>";
          echo "<div class=\"in_dir\">\n";
          printDir($file);
          echo "</div>\n";
          echo "</div>\n";
          }else{
          echo "<li><a href=\"./uploads/" . $_SESSION['username'] . "/" . $file_relative . "\"download>" .end(explode('/',$file)). "</a></li>\n";
        }
      }
      //print_r($out);
    }
    $dir = "./uploads/" . $_SESSION["username"];
    echo "<p><b>Uploaded files</b></p>";
    printDir($dir);
  ?>
  </div>
</body>
<html>
