<?php
session_start();
include('includes/header.inc.php');
include('includes/topnavbar.inc.php');
include('includes/sidenavbar.inc.php');
include('config/dbconnection.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Modal to add user -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User Here</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="includes/handeluser.inc.php" method="POST">
          <div class="modal-body">
            <!-- user  registration fields -->
            <div class="form-group"><input type="text" class="form-control" name="name" placeholder="Name"></div>
            <div class="form-group"><input type="text" class="form-control" name="phone" placeholder="Phone"></div>
            <div class="form-group"><input type="email" class="form-control" name="email" placeholder="Email"></div>
            <div class="form-group"><input type="password" class="form-control" name="password" placeholder="password"></div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="adduser">Add User</button>

        </form>
      </div>
    </div>
  </div>
</div>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>DashBoard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Edit-Registered Users</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      

    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
      <?php
      if(isset($_SESSION['status'])){
        echo'<h4>'.$_SESSION['status'].'</h4>';
        unset($_SESSION['status']);
      }
    ?>

        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit-Registered User

            </h3>
            <a href="register.php" class="btn btn-danger float-right">Back</a>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <form action="includes/handeluser.inc.php" method="POST">
                  <div class="modal-body">
                  <?php
                    $user_id=$_GET['user_id'];
                    if(isset($user_id)){
                      $query="SELECT * FROM `users` WHERE id='$user_id' LIMIT 1";
                      $query_run=mysqli_query($con,$query);
                      if(mysqli_num_rows($query_run)>0){
                        while($row=mysqli_fetch_assoc($query_run)){
                          echo'
                          <input type="hidden" name="user_id" value="'.$row['id'].'">
                          <div class="form-group">
                            <input type="text" class="form-control" value="'.$row['name'].'" name="name" placeholder="Name">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" value="'.$row['phone'].'" name="phone" placeholder="Phone">
                          </div>
                          <div class="form-group">
                            <input type="email" class="form-control" value="'.$row['email'].'" name="email" placeholder="Email">
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" value="'.$row['password'].'" name="password" placeholder="password">
                          </div>';

                        }


                      }
                      else{
                        echo'<h4>No Results found</h4>';
                      }

                    }
                    else{

                    }
                    
                  ?>
                   
                  </div>
                  <div class="modal-footer">
                   
                    <button type="submit" class="btn btn-info" name="updateuser">Update</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- <a href="registered-edit.php?user_id='.$row['id'].'" class="btn btn-info btn-sm">edit</a> -->


          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



</div>
<?php include('includes/script.inc.php');?>
<?php
include('includes/footer.inc.php');
?>