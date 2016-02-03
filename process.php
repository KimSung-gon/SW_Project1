<?php
  require("config/config.php");
  $sql = "INSERT INTO freeboard (title, author, description, password, created)
   VALUES ('".$_POST['title']."', '".$_POST['author']."',
    '".$_POST['description']."', '".$_POST['password']."', now())";
  $result = mysqli_query($conn, $sql);
  header('Location: /first/index.php')
 ?>
