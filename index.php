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
		<div class="container-fluid">
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
					<script src="/script.js"></script>
					<article>
						<?php
							require("article.php");
						 ?>
					</article>
					<hr />
					<?php
						if( !empty($_GET['id']) && ($_GET['id']==='1'|| $_GET['id']==='2')){
							echo '<a href="write.php?id='.$_GET['id'].'">'."글쓰기".'</a>';
						}
					 ?>
				</div>

			</div>
			 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="js/bootstrap.min.js"></script>
		</div>
	</body>
</html>
