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
		<div class="container">
			<header class="jumbotron text-center">
				<h1><a href="index.php">국민대학교 정보 공유실</a></h1>
			</header>
			<div class="row">
				<?php
					require("nav.php");
				 ?>
				<div class="col-md-10">
					<script src="/script.js"></script>
					<article>
						<?php
						  $boardName = array("1"=>"자유게시판", "2"=>"과목별 자료공유", "3"=>"실시간 채팅방");
  						$id = htmlspecialchars($_GET['id']);
							if(!empty($id)){
								echo "<h4>".$boardName[$id]."</h4>";
							}
							require("article.php");
						 ?>
					</article>
					<?php
						if( !empty($_GET['id']) && ($_GET['id']==='1'|| $_GET['id']==='2')){
							echo '<a href="write.php?id='.$_GET['id'].'" class="btn btn-success">'."글쓰기".'</a>';
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
