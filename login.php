<?php 
      include 'header.php'; 
      include 'connect.php'; 
      session_start();
      if(isset($_SESSION['user_data'])){  // agr logedin ha tu login page show na hu.
        header('location:./admin/index.php');
       } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-5 bg-info p-5 m-auto my-5">
                <form action="" method="POST">
                <p class="text-center">Blog! Login your account.</p>
                <div class="mb-3">
                    <input type="email" name="email" placeholder="Email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="submit" name="login" value="Login" class="btn btn-primary">
                </div>
                <div class="mb-3 ">
                    <?php
                        if(isset($_SESSION['error'])){
                            $error = $_SESSION['error'];
                            echo "<p class='text-white p-2 bg-danger'>".$error."</p>";
                            unset($_SESSION['error']);
                        }
                    ?>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php include 'footer.php'; 

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, sha1($_POST['password']));

    // echo '<div class="container m-auto"> '.$email ."<br>". $pass.'</div>';

    $sql = "SELECT * FROM `user` WHERE email = '{$email}' AND password ='{$pass}' ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_num_rows($result);

    if($row){
        $udata = mysqli_fetch_assoc($result);
        $user_data = array($udata['user_id'],$udata['username'],$udata['role']);
        $_SESSION['user_data']= $user_data;
        header('location:admin/index.php');
    }
    else{
        $_SESSION['error'] = "inavlid email/password!";
        header('location:login.php');
    }
    
}
?>

