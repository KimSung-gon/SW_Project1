<?php
  require("config/config.php");
  if($_GET['id'] === "1"){
    $sql = "INSERT INTO freeboard (title, author, description, password, created)
     VALUES ('".$_POST['title']."', '".$_POST['author']."',
      '".$_POST['description']."', '".$_POST['password']."', now())";
    $result = mysqli_query($conn, $sql);
    header("Location: /first/index.php?id=1");
  } else if($_GET['id'] === "2"){
    $sql = "INSERT INTO shareBySub (subject, title, author, description, password, created)
     VALUES ('".$_POST['subject']."', '".$_POST['title']."', '".$_POST['author']."',
      '".$_POST['description']."', '".$_POST['password']."', now())";
    $result = mysqli_query($conn, $sql);
    header("Location: /first/index.php?id=2");
  }
 ?>
