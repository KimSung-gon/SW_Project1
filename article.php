<?php
  $arrayOfTable = array( "1"=>"freeboard", "2"=>"shareBySub", "3"=>"chattingRoom" );
  $arrayOfTableMember = array( "1"=> "순번  제목  작성자 작성시간\n",
                               "2"=> "순번  과목  제목  작성자 작성시간\n");
  if(empty($_GET['id'])){
    echo "국민대학교 정보 공유실에 오신것을 환영합니다";
  } else if($_GET['id']==='1' || $_GET['id']==='2'){
    $index = $_GET["id"];
    $sql = "SELECT * FROM ".$arrayOfTable[$index];
    $result = mysqli_query($conn, $sql);
    echo $arrayOfTableMember[$index];
    while($row = mysqli_fetch_assoc($result)){
      echo "<ul>";
      echo '<li><a href="contentpage.php?id='.$row['id'].'">'
      .htmlspecialchars($row['id']),
      htmlspecialchars($row['title']),
      htmlspecialchars($row['author']),
      htmlspecialchars($row['created']).'</a></li>'."\n";
      echo "</ul>";
      echo "<br />";
    }
  } else if($_GET['id']==='3'){
    echo '<form action="">';
    echo '<textarea name="chatting"></textarea>';
    echo '<input type="submit" name="send" value="전송">';
    echo '</form>';
  }

 ?>
