<?php
	require("/config/config.php");
	$sql = "SELECT * FROM menu";
	$result = mysqli_query($conn, $sql);
 ?>
<!DOCTYPE html>
<html>
	<head>
		<?php
			require("head.php");
	 	?>
	</head>
	<body>
		<header class="jumbotron text-center">
			<h1><a href="index.php">국민대학교 정보 공유실</a></h1>
		</header>
		<div class="row">
			<nav class="col-md-2">
				<ul>
					<?php
						while($row = mysqli_fetch_assoc($result)){
							echo '<li><a href="/first/index.php?id='.$row['id'].'">'
							.htmlspecialchars($row['title']).'</a></li>';
						}
					 ?>
				</ul>
			</nav>
			<div class="col-md-10">
				<article class="">
					<?php
					  echo "순번  제목  작성자 작성시간\n";
						if($_GET['id'] === "1"){
							$table = "freeboard";
						} else if($_GET['id'] === "2"){
							$table = "shareBySub";
						}
						$sql = "SELECT * FROM ".$table." WHERE id=".htmlspecialchars($_GET['id']);
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($result);
						echo "<p>".htmlspecialchars($row['id'])."</p>";
						echo "<p>".htmlspecialchars($row['author'])."</p>";
						echo "<p>".htmlspecialchars($row['title'])."</p>";
						echo "<p>".htmlspecialchars($row['description'])."</p>";
						echo "<p>".htmlspecialchars($row['created'])."</p>";
						if(empty($_GET['id'])){
							echo "국민대학교 정보 공유실에 오신것을 환영합니다";
						} else {
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
				<?php
				if( !empty($_GET['id']) && ($_GET['id']==='1'|| $_GET['id']==='2')){
					echo '<a href="write.php">글쓰기</a>';
				}
				 ?>
			</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	 <!-- Include all compiled plugins (below), or include individual files as needed -->
	 <script src="js/bootstrap.min.js"></script>
	</body>
</html>
