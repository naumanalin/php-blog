<?php
include 'header.php';
if(isset($_SESSION['user_data'])){
   $userid = $_SESSION['user_data'][0];
}
?>
   <!-- Begin Page Content -->
   <div class="container-fluid">
      <!-- Page Heading -->
      <h5 class="mb-2 text-gray-800">Blog Posts</h5>
      <!-- DataTales Example -->
      <div class="card shadow">
         <div class="card-header py-3 d-flex justify-content-between">
            <div>
               <a href="add_blog.php">
                  <h6 class="font-weight-bold text-primary mt-2">Add New</h6>
               </a>
            </div>
            <div>
               <form class="navbar-search">
                  <div class="input-group">
                     <input type="text" class="form-control bg-white border-0 small" placeholder="Search for...">
                     <div class="input-group-append">
                        <button class="btn btn-primary" type="button"> <i class="fa fa-search"></i> </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th>Sr.No</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th colspan="2">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     //  $sql = "SELECT * FROM blog LEFT JOIN category ON 'blog.category'='category.cat_id' WHERE author_id= '$userid' ORDER BY blog.publish_date DESC";
                        $sql = "SELECT blog.*, category.cat_name, user.username 
                                FROM blog 
                                LEFT JOIN category ON blog.category = category.cat_id 
                                LEFT JOIN user ON blog.author_id = user.user_id 
                                WHERE blog.author_id = '$userid' 
                                ORDER BY blog.publish_date DESC";
                        $run = mysqli_query($con, $sql);
                     
                        $count = 0;
                        while($rows = mysqli_fetch_assoc($run)){
                           $id = $rows['blog_id'];
                           $col_title = $rows['blog_title'];
                           $col_category = $rows['cat_name'];
                           $date = $rows['publish_date'];
                           $imagepath = $rows['blog_image'];
                           $author = $rows['username'];

                           echo '<tr>
                              <td>'. ++$count .'</td>
                              <td>'.$col_title.'</td>
                              <td>'.$col_category.'</td>
                              <td>'.$author.'</td>
                              <td>'.$date.'</td>
                              <td>
                                 <a href="edit_blog.php?id='.$id.'" class="btn btn-primary">Edit</a>
                              </td>
                              <td>
                                 <form method="POST" onsubmit="return confirm(\'Are you sure to delete?\')">
                                    <input type="hidden" value="'.$id.'" name="dqid"> 
                                    <input type="hidden" value="'.$imagepath.'" name="image"> 
                                    <input type="submit" name="deletebtn" class="btn btn-danger" value="Delete">
                                 </form>
                              </td>
                           </tr>';
                        } 
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
</div>

<?php
include 'footer.php';

if(isset($_POST['deletebtn'])){
   $id = $_POST['dqid'];
   $img = "image/".$_POST['image'];
  
   $delete = "DELETE FROM blog WHERE blog_id = '$id'";
   $run = mysqli_query($con, $delete);
   
   if($run){
      unlink($img); // Delete the image file from the server
      $_SESSION['msg'] = ['Blog post has been deleted successfully', 'alert-success'];
      header('location:index.php');
   } else {
      $_SESSION['msg'] = ['Failed to delete the blog post', 'alert-danger'];
      header('location:index.php');
   }
}
?>
