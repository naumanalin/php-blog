# blog_web
✅ (1): Three tables: blog(blog_id, blog_title, blog_body, blog_img, category, author_id, publish_date)
        user(user_id, user_name, email, password);
        category(cat_id, cat_name);

<!----------------------------------------------------------------------------->

✅ (2): Header ma 'active' class dynamic ha through php
{
    $page = basename($_SERVER['PHP_SELF'], '.php');
    <a class="nav-link <?= ($page=='index')? 'active':''; ?>" href="index.php">Home</a>
    <a class="nav-link <?= ($page=='login')? 'active':''; ?>" href="login.php">Login</a>
}

<!----------------------------------------------------------------------------->

✅ (3): Displying error message in login form uisng php session
1. session_start();

3. if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}

2. else{
    $_SESSION['error'] = "invalid email/password";
    header();
}

<!----------------------------------------------------------------------------->
 
✅ (4):