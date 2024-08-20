<?php include 'header.php';
include '../connect.php';  ?>

<div class="container">
<h5 class="mb-2 text-gray-800">Categories</h5>
<div class="row">
    <div class=""></div>
    <div class="card col-md-6 col-sm-4 col-xl-8 col-lg-7 mb-5 ">
        <div class="card-header">
        <h6 class="font-weight-bold text-primary mt-2">Add Category</h6>
        </div>
        <div class="card-body">
            <form action="" method="POST">
            <div class="mb-3">
                <input type="text" name="cat_name" placeholder ="Category Name" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" name="add_cat" value="Add" class="btn btn-primary">
                <a href="categories.php" class="btn btn-secondary">Back</a>
            </div>
            </form>
        </div>
    </div>
</div>
</div>



<?php include 'footer.php'; 


if(isset($_POST['cat_name'])){
    $cat = mysqli_real_escape_string($con, $_POST['cat_name']);

    $sql = "SELECT * FROM `category` WHERE cat_name = '$cat' ";
    $resutl = mysqli_query($con, $sql);
    $row = mysqli_num_rows($resutl);

    if($row){
        $msg= ['Category already exit', 'alert-danger'];
        $_SESSION['msg'] = $msg;
        header('location:add_cat.php');
    }
    else{
        $sqli = "INSERT INTO `category`(`cat_name`) VALUES ('$cat')";
        $result1 = mysqli_query($con, $sqli);

        if($result1){
            $msg= ['Category add successfully', 'alert-success'];
            $_SESSION['msg'] = $msg;
            header('location:add_cat.php');
        }
        else{
            $msg= ['falied try again', 'alert-danger'];
            $_SESSION['msg'] = $msg;
            header('location:add_cat.php');
        }
    }

}




?>