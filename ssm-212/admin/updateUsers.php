<?php
  include "inc/header.php";
?>

<?php 

    if(isset($_GET['edit'])){
          $userId = $_GET['edit'];

          $query = "SELECT * FROM user WHERE user_id = '$userId'";

          $result = mysqli_query($db,$query);

          while ($row = mysqli_fetch_assoc($result)) {
              
              $name     = $row['name'];
              $username = $row['user_name'];
              $email    = $row['email'];
              $phone    = $row['phone'];
              $role     = $row['user_role'];
              
          }
    }

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Update user</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <input type="text" name="name" value="<?php echo $name;?>" placeholder="Full name" class="form-control">
              </div>
              <div class="form-group">
                <input type="text" name="username" value="<?php echo $username;?>" placeholder="User Name" class="form-control">
              </div>
              <div class="form-group">
                <input type="email" name="email" value="<?php echo $email;?>" placeholder="Email" class="form-control">
              </div>
              <div class="form-group">
                <input type="text" name="phone" value="<?php echo $phone;?>" placeholder="Phone Number" class="form-control">
              </div>
              <!-- <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control">
              </div>

              <div class="form-group">
                <input type="file" name="image"class="form-control">
              </div> -->

              <div class="form-group">
                <input type="text" name="role" value="<?php echo $role;?>" placeholder="user role" class="form-control">
              </div>

              <div class="form-group">
                <input type="submit" value="update" name="update"class="btn btn-md btn-primary">
              </div>
            
            </form>
          </div>            
        </div><!-- /.row -->


    <?php 

      if(isset($_POST['update'])){
          $name       = $_POST['name'];
          $username   = $_POST['username'];
          $email      = $_POST['email'];
          $phone      = $_POST['phone'];
          $role       = $_POST['role'];

          $query="UPDATE user SET name='$name', user_name='$username', email='$email',phone='$phone',user_role='$role'";

          $result = mysqli_query($db,$query);

          if($result){
            header('Location: viewAllUsers.php');
          }else{
            die("error".mysqli_error($db));
          }
      }

    ?>

      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
  </div><!-- /.content-wrapper -->
  

<?php
  include "inc/footer.php";
?>