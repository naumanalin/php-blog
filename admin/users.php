<?php
include 'header.php';
if($admin != 1){
   header('location:index.php');
}

$sql= "SELECT * FROM `user`";
$query = mysqli_query($con, $sql);
$rows = mysqli_num_rows($query);

?>
   <!-- Begin Page Content -->
   <div class="container-fluid">
      <!-- Page Heading -->
      <h5 class="mb-2 text-gray-800">Users</h5>
      <!-- DataTales Example -->
      <div class="card shadow">
         <div class="card-header py-3 d-flex justify-content-between">
            <div>
               <a href="add_user.php">
                  <h6 class="font-weight-bold text-primary mt-2">Add user</h6>
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
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th colspan="2">Action</th>
         </tr>
      </thead>
                  <tbody>
                    <?php
                    if($rows >=1){
                     $counter = 0;
                     while($result = mysqli_fetch_assoc($query)){
                        $uid = $result['user_id'];
                        $uname = $result['username'];
                        $uemail = $result['email'];
                        if($result['role'] == 1){
                           $role = "admin";
                        }
                        else{
                           $role = "Co-admin";
                        }
                        echo '
                        <tr>
                        <td>'.++$counter.'</td>
                        <td>'.$uname.'</td>
                        <td>'.$uemail.'</td>
                        <td>'.$role.'</td>
                        <td>
                        <form action="" method="post" onsubmit="return confirm(\'Are you sure to delete!\')">
                           <input type="hidden" name="deleteid" value='.$uid.'>
                           <input type="submit" name="btn_delete" class="btn btn-danger" value="Delete">
                        </form>
                        </td>
                        </tr>
                        
                        ';
                     }
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

if(isset($_POST['btn_delete'])){
   $id = $_POST['deleteid'];

   $sql1 = "DELETE FROM `user` WHERE user_id = '$id'";
   $run = mysqli_query($con, $sql1);

   if($run){
      $msg= ['User Deleted successfully', 'alert-success'];
      $_SESSION['msg'] = $msg;
      header('location:users.php');
   }
   else{
      $msg= ['Failed to delete user, try again.', 'alert-danger'];
      $_SESSION['msg'] = $msg;
      header('location:users.php');
   }
  

}

?>

 