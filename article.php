<?php
  $arrayOfTable = array( "1"=>"freeboard", "2"=>"shareBySub", "3"=>"chattingRoom" );
  $arrayOfTableMember = array( "1"=> '<tr class="active"><th>순번</th><th>제목</th><th>글쓴이</th><th>날짜</th></tr>',
                               "2"=> '<tr class="active"><th>순번</th><th>과목명</th><th>제목</th><th>글쓴이</th><th>날짜</th></tr>');
  if(empty($id)){
    echo "국민대학교 정보 공유실에 오신것을 환영합니다";
  } else if($id==='1' || $id==='2'){
    $sql = "SELECT * FROM ".$arrayOfTable[$id];
    $result = mysqli_query($conn, $sql);
    echo '<table class="table">';
    echo $arrayOfTableMember[$id];
    while($row = mysqli_fetch_assoc($result)){

      echo '<tr><div class="row"><td class="col-md-1">'.htmlspecialchars($row['id']).
      '</td><td class="col-md-7"><a href="contentpage.php?id='.$row['id'].'">',
      htmlspecialchars($row['title']).'</a></td><td class="col-md-2">',
      htmlspecialchars($row['author']).'</td><td class="col-md-2">',
      htmlspecialchars($row['created']).'</td></div></tr>'."\n";

    }
    echo '</table>';
  } else if($_GET['id']==='3'){
    echo "<h4>".$boardName[$id]."</h4>";
    echo '<form action="">';
    echo '<textarea name="chatting"></textarea>';
    echo '<input type="submit" class="btn btn-default" name="send" value="전송">';
    echo '</form>';
  }
  echo "<hr />";
 ?>
