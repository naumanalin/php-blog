<?php include 'header.php';
include '../connect.php'; 

if(isset($_SESSION['user_data'])){
    $authorid = $_SESSION['user_data'][0];
}

$sql = "SELECT * FROM `category`";
$run = mysqli_query($con, $sql);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM `blog` WHERE blog_id ='$id'";
    $run1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_assoc($run1);
}
?>

<div class="container">
<h5 class="mb-2 text-gray-800">Blog</h5>
<div class="row">
    <div class=""></div>
    <div class="card col-md-8 col-sm-4 col-xl-8 col-lg-10 mb-5 ">
        <div class="card-header">
        <h6 class="font-weight-bold text-primary mt-2">Edit blog/artical</h6>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" value="<?= $row1['blog_title']; ?>" name="blog_title" placeholder ="Tite" class="form-control">
            </div>
                <label for="">Body/Description</label>            
                <textarea  cols="30" rows="10"  class="mb-3 form-control" id="blog" name="blog_body"><?= $row1['blog_body']; ?></textarea>
            <div class="my-3">
                <input type="file" name="blog_image" class="form-control" placeholder="<?= $row['blog_image']  ?>">
                <img src="<?= $row1['blog_image']  ?>" alt="" width="100px" class="my-2">
            </div>
            <div class="mb-3">
            <select name="category" id="" class="form-control">
                <?php   while($row=mysqli_fetch_assoc($run)){ 
                                   ?>
                <option value="<?= $row['cat_id'] ?>"> <?=  $row['cat_name'];  
                
                
                
                // who it work i don't understand: (video No. 13 time: 21:00.)



                if($row1['category'] == $row['cat_name']){
                    echo "selected";
                }
                else{
                    echo "";
                }
                
                ?></option>

            <?php     }   ?>
            </select>
            </div>
            <div class="mb-3">

            </div>
            <div class="mb-3">
                <input type="submit" name="edit_blog" value="Update" class="btn btn-primary">
                <a href="categories.php" class="btn btn-secondary">Back</a>
            </div>
            </form>
        </div>
    </div>
</div>
</div>



<?php include 'footer.php'; 
if(isset($_POST['edit_blog'])){
    $title = $_POST['blog_title']; 
    $body = $_POST['blog_body'];
    $category = $_POST['category']; 

    $image = $_FILES['blog_image'];
    $file_name = $_FILES['blog_image']['name'];
    $file_temp = $_FILES['blog_image']['tmp_name'];
    $seprate_extension = explode('.', $file_name);
    $file_extension = strtolower(end($seprate_extension));
    $extensions = array('jpeg', 'jpg', 'png'); 
    $img_destinatio = "image/".$file_name;

    if(!empty($file_name)){
    if(in_array($file_extension, $extensions)){

        $preimage = $row1['blog_image'];
        if($preimage){
            unlink($preimage);
        }

        move_uploaded_file($file_temp, $img_destinatio);

        $id = $_GET['id'];

        $sql = "UPDATE `blog` SET blog_title='$title',blog_body='$body',
        blog_image='$img_destinatio',category='$category '
        WHERE blog_id = '$id'";

        $run11 = mysqli_query($con, $sql);

        header('location:index.php');
    }
    else{
        echo "Invalid Extension !";
    }
}

}


?>