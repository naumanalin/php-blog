<?php include 'header.php';
	  include 'connect.php';
	//   pagination
if(!isset($_GET['page'])){
	$page = 1;	}
else{$page = $_GET['page'];}
$limit = 2;
echo $offset = ($page -1)*$limit;


	//  -----------------------
$sql = "SELECT * FROM blog LEFT JOIN category ON blog.category=category.cat_id LEFT JOIN 
user ON blog.author_id=user.user_id ORDER BY blog.publish_date DESC LIMIT $offset,$limit" ;
$query = mysqli_query($con, $sql);
$rows = mysqli_num_rows($query);
	 ?>

<div class="container mt-2">
	<div class="row">
		<div class="col-lg-8">
			<?php
				if($rows){
					while($result= mysqli_fetch_assoc($query)){
						
			?>
			
			<div class="card shadow">
				<div class="card-body d-flex blog_flex">
					<div class="flex-part1">
						<a href="cat_page.php?id=<?= $result['cat_id'] ?>"> <img src="admin/<?= $result['blog_image']	?>"> </a>
					</div>
					<div class="flex-grow-1 flex-part2">
						  <a href="cat_page.php?id=<?= $result['cat_id'] ?>" id="title"><?=	ucfirst($result['blog_title']);	?></a>
						<p>
						  <a href="" id="body">
						  	<?php	$body_disply = $result['blog_body'];			?>
							  <?=	strip_tags(substr($body_disply, 0,100))."...";	?>
						  </a> <span><br>
                          <a href="single_post.php?id=<?= $result['blog_id']; ?>" class="btn btn-sm btn-outline-primary">Continue Reading
                          </a></span>
                        </p>
						<ul>
							<li class="me-2"><a href=""> <span>
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span><?= $result['username']	?></a>
							</li>
							<li class="me-2">
								<a href=""> <span><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
								<?php $date = $result['publish_date'];		?>
								<?=	date("d-M-y", strtotime($date));	?> </a>
							</li>
							<li>
								<a href="" class="text-primary"> <span><i class="fa fa-tag" aria-hidden="true"></i></span> 
							<?= $result['cat_name']		?>
							</a>
						    </li>
						</ul>
					</div>
				</div>
			</div>
			<?php	}}	?>
			<!-- pagenation -->
			<?php
			$pagination = "SELECT * FROM blog";
			$run_q= mysqli_query($con, $pagination);
			$total_blogs= mysqli_num_rows($run_q);
			$pages = ceil($total_blogs/$limit);;

			?>
			<ul class="pagination py-4">
				<?php for($i=1; $i<=$pages; $i++){		?>
				<li class="page-item <?= ($i == $page) ? $active="active":"";?>">
					<a href="index.php?page=<?= $i ?>" class="page-link"><?= $i ?></a>
				</li>
			<?php }	?>
			</ul>
		</div>
		
		<?php include 'sidebar.php'; ?>
		
	</div>
</div>
<?php include 'footer.php';?>
