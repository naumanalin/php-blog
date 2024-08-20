<?php include 'header.php';  


// php form validation:

if(isset($_POST['add_user'])){
    $username = $_POST['username']; 
    $email = $_POST['email']; 
    $password = sha1($_POST['password']);
    $c_password = sha1($_POST['Cpassword']);
    $role = $_POST['role'];

    if(strlen($username) < 4 || strlen($username) > 100){
        $error = "User Name should be in between 4 to 100 characters.";
    }
    elseif(strlen($password) < 2){
        $error = "password should be greater than 4 characters.";
    }
    elseif($password != $c_password){
        $error = "Confrim password does not match.";
    }
    else{
        $sqli = "SELECT * FROM `user` where email = '$email'";
        $query = mysqli_query($con, $sqli);
        $rows = mysqli_num_rows($query);

        if($rows >= 1){
            $error = "User already exit!";
        }
        else{
            $sql1 = "INSERT INTO `user`(`username`, `email`, `password`, `role`) 
            VALUES ('$username','$email','$password','$role')";
            $query_run = mysqli_query($con, $sql1);

            if(!$query_run){
                    $error = "Failed to register, try again.";
            }
            else{
                $msg= ['User added successfully', 'alert-success'];
                $_SESSION['msg'] = $msg;
                header('location:add_user.php');
            }
        }
    }
}



?>

<div class="container">
    <div class="row">
        <div class="col-md-5 col-lg-6 bg-info m-auto p-4">
            <form action="" method="POST">
                <p class="text-center">Create New Account</p>
                <div class="">
                    <?php
                    if(!empty($error)){
                        echo '<p class="p-2 bg-danger text-white">'.$error.'</p';
                    }
                    ?>
                </div>
                <div class="mb-3">
                    <input type="text" name="username" value="<?php if(!empty($error)){ 
                        echo $username;
                                    }  
                        ?>" placeholder="Full Name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" value="<?php if(!empty($error)){ 
                        echo $email;
                                    }  
                        ?>" placeholder="Email" class="form-control" required >
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control" required >
                </div>
                <div class="mb-3">
                    <input type="password" name="Cpassword" placeholder="Confirm Password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <select name="role" class="form-control" required>
                        <option value="">Select a Role</option>
                        <option value="1">Admin</option>
                        <option value="0">Co-Admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" name="add_user" value="create" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>






<?php include 'footer.php';  ?>