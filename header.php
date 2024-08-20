<?php

$page = basename($_SERVER['PHP_SELF'], '.php');
// use this in if condition to dynamic the "active" class
echo dirname(__FILE__);
include 'connect.php';
$head_cat = "SELECT * FROM category";
$query_hc = mysqli_query($con, $head_cat);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

     <!-- Bootstrap 5 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap downloaded style sheet -->
    <link rel="stylesheet" href="stylecss.css">
    <!-- fontawsome cdn by w3schools -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- custome style sheet -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link  <?= ($page=='index')? 'active':''; ?>" aria-current="page" href="index.php">Home</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php while($catsh=mysqli_fetch_assoc($query_hc)){ ?>
            <li>
              <a class="dropdown-item" href="#"> <?= $catsh['cat_name'];	?>
              </a>
            </li>

            <?php } ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($page=="login")? 'active':''; ?>"
               href="login.php" >Login</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    
</body>
</html>