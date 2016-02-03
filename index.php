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
			<?php
				if(empty($_GET['id'])){
					echo "국민대학교 정보 공유실에 오신것을 환영합니다";
				} else {
					$sql = "SELECT * FROM freeboard";
					$result = mysqli_query($conn, $sql);
					echo "순번  제목  작성자 작성시간\n";
					echo "<br />";
					while($row = mysqli_fetch_assoc($result)){
						echo "<ul>";
						echo '<li><a href="contentpage.php?id='.$row['id'].'">'.htmlspecialchars($row['id']) ,htmlspecialchars($row['title'])
	          ,htmlspecialchars($row['author']) ,htmlspecialchars($row['created']).'</a></li>'."\n";
						echo "</ul>";
						echo "<br />";
					}
				}
			 ?>
		</article>
		<a href="write.php">글쓰기</a>
	</body>
</html>
