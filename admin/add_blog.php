<?php
include 'header.php';
include '../connect.php'; 

if (isset($_SESSION['user_data'])) {
    $authorid = $_SESSION['user_data'][0];
} else {
    $authorid = null; // Handle the case where `authorid` is not set
}

$sql = "SELECT * FROM `category`";
$run = mysqli_query($con, $sql);
?>

<div class="container">
    <h5 class="mb-2 text-gray-800">Blog</h5>
    <div class="row">
        <div class=""></div>
        <div class="card col-md-8 col-sm-4 col-xl-8 col-lg-10 mb-5">
            <div class="card-header">
                <h6 class="font-weight-bold text-primary mt-2">Publish blog/article</h6>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" name="blog_title" placeholder="Title" class="form-control" required>
                    </div>
                    <label for="blog">Body/Description</label>            
                    <textarea cols="30" rows="10" class="mb-3 form-control" id="blog" name="blog_body" required></textarea>
                    <div class="my-3">
                        <input type="file" name="blog_image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <select name="category" id="" class="form-control" required>
                            <option value="">Select Category...</option>
                            <?php while ($row = mysqli_fetch_assoc($run)) { ?>
                                <option value="<?= $row['cat_id'] ?>"> <?= $row['cat_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="add_blog" value="Publish" class="btn btn-primary">
                        <a href="categories.php" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php'; 

if (isset($_POST['add_blog'])) {
    $title = mysqli_real_escape_string($con, $_POST['blog_title']); 
    $body = mysqli_real_escape_string($con, $_POST['blog_body']);
    $category = mysqli_real_escape_string($con, $_POST['category']); 

    $image = $_FILES['blog_image'];
    $file_name = $image['name'];
    $file_temp = $image['tmp_name'];
    $seprate_extension = explode('.', $file_name);
    $file_extension = strtolower(end($seprate_extension));
    $extensions = array('jpeg', 'jpg', 'png'); 

    if (in_array($file_extension, $extensions)) {
        $img_destinatio = "image/" . $file_name;

        // Check if the directory is writable
        if (!is_dir('image/')) {
            mkdir('image/', 0777, true);  // Create directory if it doesn't exist
        }
        
        if (move_uploaded_file($file_temp, $img_destinatio)) {
            // Construct SQL query
            $sql = "INSERT INTO `blog`(`blog_title`, `blog_body`, `blog_image`, `category`, `author_id`)
                    VALUES ('$title', '$body', '$img_destinatio', '$category', '$authorid')";

            // Execute the query and check for errors
            if (mysqli_query($con, $sql)) {
                $_SESSION['msg'] = ['Blog post inserted successfully', 'alert-success'];
                header('Location: index.php');
                exit();
            } else {
                $_SESSION['msg'] = ['Error inserting blog post into DB table: ' . mysqli_error($con), 'alert-danger'];
                header('Location: index.php');
                exit();
            }
        } else {
            $_SESSION['msg'] = ['Failed to move the uploaded file.', 'alert-danger'];
            header('Location: index.php');
            exit();
        }
    } else {
        $_SESSION['msg'] = ['Invalid file extension!', 'alert-danger'];
        header('Location: index.php');
        exit();
    }
} 
?>
