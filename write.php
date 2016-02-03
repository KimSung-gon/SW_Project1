<?php
	require("/config/config.php");
	$sql = "SELECT * FROM menu";
	$result = mysqli_query($conn, $sql);
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>
			국민대학교 정보 공유실에 오신것을 환영합니다.
		</title>
	</head>
	<body>
		<header>
			<h1><a href="index.php">국민대학교 정보 공유실</a></h1>
		</header>
		<nav>
			<ul>
				<?php
					while($row = mysqli_fetch_assoc($result)){
						echo '<li><a href="/first/index.php?id='.$row['id'].'">'
						.htmlspecialchars($row['title']).'</a></li>';
					}
				 ?>
			</ul>
		</nav>
		<article class="">
      <form class="" action="process.php" method="post">
        <div>
          <label for="title">제목: </label>
          <input type="text" name="title" value="">
        </div>
        <div>
          <label for="author">작성자:</label>
          <input type="text" name="author" value="">
        </div>
        <div>
          <label for="password">비밀번호:</label>
          <input type="text" name="password" value="">
        </div>
        <div>
          <label for="description">내용: </label>
          <textarea name="description" rows="8" cols="40"></textarea>
        </div>
        <div class="">
          <input type="submit" name="submit" value="제출">
        </div>
      </form>
			<?php
				$sql = "SELECT * FROM freeboard";
        $result = mysqli_query($conn, $sql);
        echo "순번  제목  작성자 작성시간\n";
        echo "<br />";
				while($row = mysqli_fetch_assoc($result)){
					echo htmlspecialchars($row['id']), htmlspecialchars($row['title'])
          ,htmlspecialchars($row['author']), htmlspecialchars($row['created']);
          echo "<br />";
				}
			 ?>
		</article>
	</body>
</html>
