<?php include 'header.php';
	  include 'connect.php';
      $id = $_GET['id'];
      if(empty($id)){
        header('location:index.php');
      }
$cat_sql = "SELECT * FROM blog LEFT JOIN category ON blog.category=category.cat_id LEFT JOIN user ON blog.author_id=user.user_id WHERE cat_id='$id' ORDER BY blog.publish_date DESC" ;
$cat_query = mysqli_query($con, $cat_sql);
$rows_cat = mysqli_num_rows($cat_query);
	 ?>

<div class="container mt-2">
	<div class="row">
		<div class="col-lg-8">
			<?php
				if($rows_cat){
					while($result_cat= mysqli_fetch_assoc($cat_query)){
						
			?>
			
			<div class="card shadow">
				<div class="card-body d-flex blog_flex">
					<div class="flex-part1">
						<a href="cat_page.php?id=<?= $re['cat_id'] ?>"> <img src="admin/<?= $result_cat['blog_image']	?>"> </a>
					</div>
					<div class="flex-grow-1 flex-part2">
						  <a href="" id="title"><?=	ucfirst($result_cat['blog_title']);	?></a>
						<p>
						  <a href="" id="body">
						  	<?php	$body_disply = $result_cat['blog_body'];			?>
							  <?=	strip_tags(substr($body_disply, 0,100))."...";	?>
						  </a> <span><br>
                          <a href="single_post.php?id=<?= $result_cat['blog_id']; ?>" class="btn btn-sm btn-outline-primary">Continue Reading
                          </a></span>
                        </p>
						<ul>
							<li class="me-2"><a href=""> <span>
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span><?= $result_cat['username']	?></a>
							</li>
							<li class="me-2">
								<a href=""> <span><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
								<?php $date = $result_cat['publish_date'];		?>
								<?=	date("d-M-y", strtotime($date));	?> </a>
							</li>
							<li>
								<a href="" class="text-primary"> <span><i class="fa fa-tag" aria-hidden="true"></i></span> 
							<?= $result_cat['cat_name']		?>
							</a>
						    </li>
						</ul>
					</div>
				</div>
			</div>
			<?php	}}	?>
		</div>
		
		<?php include 'sidebar.php'; ?>
		
	</div>
</div>
<?php include 'footer.php'; ?>