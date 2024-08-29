<?php
include 'connect.php';
$side_cat = "SELECT * FROM category";
$query_sc = mysqli_query($con, $side_cat);

// recent post query's
$sql3 = "SELECT * FROM blog ORDER BY blog.publish_date DESC LIMIT 5";
$query3 = mysqli_query($con, $sql3);
?>
<div class="col-lg-4">
			<div class="card">
				<div class="card-body d-flex right-section">
					<div id="categories">
						<h6>Categories</h6>
						<ul>
						<?php while($cats=mysqli_fetch_assoc($query_sc)){	?>
							<a href="cat_page.php?id=<?= $cats['cat_id'] ?>" class="text-decoration-none color-success fw-bold"><li><?= $cats['cat_name'];	?></li></a>
						<?php }	?>
						</ul>
					</div>
				    <div id="posts">
						<h6>Recent Posts</h6>
						<ul>
							<?php while($record=mysqli_fetch_assoc($query3)){ 		?>
							<li  class="text-decoration-none color-success fw-bold"><a href="single_post.php?id=<?= $record['blog_id'] ?>"><?=	$record['blog_title']	?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>