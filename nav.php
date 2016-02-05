<?php
  echo '<nav class="col-md-2">
          <ul class="nav nav-pills nav-stacked">';
            while($row = mysqli_fetch_assoc($result)){
              echo '<li><a href="/first/index.php?id='.$row['id'].'">'
              .htmlspecialchars($row['title']).'</a></li>';
            }
  echo    '</ul>
        </nav>';
?>
