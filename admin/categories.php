<?php
include 'header.php';
if($admin != 1){
   header('location:index.php');
}




?>
   <!-- Begin Page Content -->
   <div class="container-fluid">
      <!-- Page Heading -->
      <h5 class="mb-2 text-gray-800">Categories</h5>
      <!-- DataTales Example -->
      <div class="card shadow">
         <div class="card-header py-3 d-flex justify-content-between">
            <div>
               <a href="add_cat.php">
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
            <th>Category</th>
            <th colspan="2">Action</th>
         </tr>
      </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM `category` ";
                    $result = mysqli_query($con, $sql);
                    $rows = mysqli_num_rows($result);
                    $count = 0;

                    
                    while($rows = mysqli_fetch_assoc($result)){
                        $id = $rows['cat_id'];
                        $catname = $rows['cat_name'];
                    

                       echo '<tr>
                                 <td>'. ++$count.'</td>
                                <td>'.$catname.'</td>
                                <td>
                                    <a href="edit.php?id='.$id.'" class="btn btn-success">Edit</a>
                                 </td>
                                  <td>
                                    <form action="" method="POST" onsubmit="return confirm(\'Are you sure to delete!\')">
                                    <input type="hidden" value='.$id.' name="dqid">
                                    <input type="submit" name="deletebtn" class="btn btn-danger" value="Delete">
                                    </form>
                                 </td>
                                 
                                 </tr>';
                              } ?>
           
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
  
   $delete = "DELETE FROM `category` WHERE cat_id = '{$id}'";
   $run = mysqli_query($con, $delete);
   
   if($run){
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

 