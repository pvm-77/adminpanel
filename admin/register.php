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
<!-- delete user -->
<div class="modal fade" id="delete_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="includes/handeluser.inc.php" method="POST">
        <div class="modal-body">
          <input type="hidden" class="delete_user_id" name="delete_id">
          <p>are you sure to delete ?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="DeleteUserbtn">yes,delete </button>
        </div>
      </form>
    </div>
  </div>
</div>




<!-- delete user -->

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
          <li class="breadcrumb-item active">Registered Users</li>
        </ol>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
      if (isset($_SESSION['status'])) {
        echo '<h4>' . $_SESSION['status'] . '</h4>';
        unset($_SESSION['status']);
      }
      ?>

    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Registered User

            </h3>
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add User</a>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone </th>

                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $query = "SELECT * FROM `users`";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                  while ($row = mysqli_fetch_assoc($query_run)) {
                    echo '<tr>
                      <td>' . $row['id'] . '</td>
                      <td>' . $row['name'] . '</td>
                      <td>' . $row['email'] . '</td>
                      <td>' . $row['phone'] . '</td>
                      <td>
                      <a href="registered-edit.php?user_id=' . $row['id'] . '" class="btn btn-info btn-sm">edit</a>
                      <button type="button" value="' . $row['id'] . '" class="btn btn-danger btn-sm deletebtn">delete</button>
                      </td></tr>';
                  }
                } else {
                }
                ?>


              </tbody>
            </table>
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
<?php include('includes/script.inc.php'); ?>
<script>
  $(document).ready(function() {
    $('.deletebtn').click(function(e) {
      e.preventDefault();
      var user_id = $(this).val();
      //console.log(user_id);
      $('.delete_user_id').val(user_id);
      $('#delete_Modal').modal('show');

    });

  });
</script>
<?php include('includes/footer.inc.php'); ?>