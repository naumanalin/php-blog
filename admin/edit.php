<?php include 'header.php';
include '../connect.php'; 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM `category` WHERE cat_id = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $catnaam = $row['cat_name'];
}

?>

<div class="container">
<h5 class="mb-2 text-gray-800">Categories</h5>
<div class="row">
    <div class=""></div>
    <div class="card col-md-6 col-sm-4 col-xl-8 col-lg-7 mb-5 ">
        <div class="card-header">
        <h6 class="font-weight-bold text-primary mt-2">Edit Category</h6>
        </div>
        <div class="card-body">
            <form action="" method="POST">
            <div class="mb-3">
                <input type="text" name="cat_name" value="<?= $catnaam  ?>" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" name="update_cat" value="Update" class="btn btn-primary">
                <a href="categories.php" class="btn btn-secondary">Back</a>
            </div>
            </form>
        </div>
    </div>
</div>
</div>



<?php include 'footer.php'; 


if(isset($_POST['update_cat'])){
    $newname = $_POST['cat_name'];

    $sql = "UPDATE `category` SET cat_name='$newname' WHERE cat_id = '$id'";
    $result = mysqli_query($con, $sql) or die("query not run");

    if($result){
        $msg= ['Category add successfully', 'alert-success'];
        $_SESSION['msg'] = $msg;
        header('location:categories.php');
     }
     else{
        $msg= ['Category add successfully', 'alert-danger'];
              $_SESSION['msg'] = $msg;
        header('location:categories.php');
     }
}
?>