<?php   include 'header.php';  
        include 'connect.php';

$id = $_GET['id'];
if(empty($id)){
    header('location:index.php');
}
$sql = "SELECT * FROM blog WHERE blog_id = '$id'";
$query = mysqli_query($con, $sql);
$post = mysqli_fetch_assoc($query);
?>
<div class="container my-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body" >
                    <div id="single_img">
                        <a href="">
                            <img src="admin/<?= $post['blog_image']; ?>" alt="">
                        </a>
                    </div>
                    <hr class="my-5">
                    <div>
                        <h5><?= $post['blog_title'] ?></h5>
                        <p><?= $post['blog_body'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php   include 'sidebar.php'; ?>
    </div>
</div>


<?php   include 'footer.php';   ?>