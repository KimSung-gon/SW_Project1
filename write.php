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
						echo '<form class="" action="process.php?id='.$_GET['id'].'" method="post">';
					 ?>

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
						<?php
							if($_GET['id'] === '2'){
								echo '<label for="subject">과목명:</label>
			          <input type="text" name="subject" value="">';
							}
						 ?>
		        <div>
		          <label for="description">내용: </label>
		          <textarea name="description" rows="8" cols="40"></textarea>
		        </div>
		        <div class="">
		          <input type="submit" name="submit" value="제출">
		        </div>
		      </form>
					<?php
						if($_GET['id'] === "1"){
							$sql = "SELECT * FROM freeboard";
							$result = mysqli_query($conn, $sql);
							echo "순번  제목  작성자 작성시간\n";
							echo "<br />";
							while($row = mysqli_fetch_assoc($result)){
								echo htmlspecialchars($row['id']), htmlspecialchars($row['title'])
								,htmlspecialchars($row['author']), htmlspecialchars($row['created']);
								echo "<br />";
							}
						} else if($_GET['id'] === "2"){
							$sql = "SELECT * FROM shareBySub";
			        $result = mysqli_query($conn, $sql);
			        echo "순번  과목명	 제목  작성자 작성시간\n";
			        echo "<br />";
							while($row = mysqli_fetch_assoc($result)){
								echo htmlspecialchars($row['id']), htmlspecialchars($row['subject'])
								,htmlspecialchars($row['title'])
			          ,htmlspecialchars($row['author']), htmlspecialchars($row['created']);
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
