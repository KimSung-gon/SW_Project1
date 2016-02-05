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
					<article>
						<?php
							echo '<form class="" action="process.php?id='.$_GET['id'].'" method="post">';
						 ?>
						 <div class="form-inline">

						 </div>

						 <div class="form-group">
							 <label for="form-title">제목: </label>
							 <input type="text" class="form-control" name="title" value="">
						 </div>

						 <br />
						 <div class="form-inline">
							 <?php
							 	if($_GET['id'] === '2'){
									echo '<div class="form-group"><label for="form-subject">과목명:</label>
					        <input type="text" class="form-control" name="form-subject" value=""></div>';
								}
								?>
							 <div class="form-group">
 			          <label for="form-author">글쓴이:</label>
 			          <input type="text" class="form-control" name="author" value="">
 			        </div>
 			        <div class="form-group">
 			          <label for="form-password">비밀번호:</label>
 			          <input type="text" class="form-control" name="password" value="">
 			        </div>
						 </div>
						 <br />
			        <div class="form-group">
			          <label for="description">내용: </label>
			          <textarea class="form-control" name="description" rows="20" cols="40"></textarea>
			        </div>
			        <div class="">
			          <input type="submit" name="submit" value="제출">
			        </div>
			      </form>
						<?php
							$id = htmlspecialchars($_GET['id']);
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
	</body>
</html>
