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
					<article class="">
						<table class="table">
							<?php
							  $id = htmlspecialchars($_GET['id']);
								$boardName = array("1"=>"자유게시판", "2"=>"과목별 자료공유", "3"=>"실시간 채팅방");
								echo "<h4>".$boardName[$id]."</h4>";
								if($id==='1'){
									echo '<tr class="active"><th>순번</th><th>제목</th><th>내용</th><th>글쓴이</th><th>날짜</th></tr>';
								}
								if($id==='2'){
									echo '<tr class="active"><th>순번</th><th>과목명</th><th>내용</th><th>제목</th><th>글쓴이</th><th>날짜</th></tr>';
								}
								if($id === "1"){
									$table = "freeboard";
								} else if($id === "2"){
									$table = "shareBySub";
								}
								$sql = "SELECT * FROM ".$table." WHERE id=".$id;
								$result = mysqli_query($conn, $sql);
								$row = mysqli_fetch_assoc($result);
								echo "<tr><td>".htmlspecialchars($row['id'])."</td>";
								echo "<td>".htmlspecialchars($row['author'])."</td>";
								echo "<td>".htmlspecialchars($row['title'])."</td>";
								echo "<td>".htmlspecialchars($row['description'])."</td>";
								echo "<td>".htmlspecialchars($row['created'])."</td></tr>";
								echo "<hr />";
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
						</table>
						<?php
							require("article.php");
						 ?>
					</article>
					<?php
					if( !empty($id) && ($id==='1'|| $id==='2')){
						echo '<a href="write.php?id='.$_GET['id'].'" class="btn btn-success">'."글쓰기".'</a>';
					}
					 ?>
				</div>
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		 <!-- Include all compiled plugins (below), or include individual files as needed -->
		 <script src="js/bootstrap.min.js"></script>
		</div>
	</body>
</html>
