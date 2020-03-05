<?php include "inc/header.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Deshboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="deshboard.php">Deshboard</a></li>
              <li class="breadcrumb-item active">Manage All Category</li>
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
            <!--add user tabel start-->
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Email</th>
                    <th scope="col">PhoneNo</th>
                    <th scope="col">Photo</th>
                    <th scope="col">UserRole</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                <?php

                  $query = "SELECT * FROM user";
                  $allUser = mysqli_query($db,$query);
                  while($row = mysqli_fetch_assoc($allUser)){
                    $id         = $row['user_id'];
                    $name       = $row['name'];
                    $user_name  = $row['user_name'];
                    $email      = $row['email'];
                    $phone      = $row['phone'];
                    $image      = $row['image'];
                    $user_role  = $row['user_role'];

                    ?>

                  <tr>
                    <th scope="row"><?php echo $id; ?></th>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $user_name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td><img src="img/<?php echo $image;?>" height="50" width="50" alt=""></td>
                    <td><?php echo $user_role; ?></td>
                    <td>
                      <div class="action-item">
                          <ul>
                              <li><a href=""><i class="fa fa-edit"></i></a></li>
                              <li><a href=""><i class="fa fa-trash"></i></a></li>
                          </ul>
                      </div>
                    </td>
                  </tr>

                  <?php } ?>

                </tbody>
              </table>
            <!--add user tabel start-->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "inc/footer.php"?>