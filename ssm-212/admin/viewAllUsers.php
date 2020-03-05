<?php
  include "inc/header.php";
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
              <li class="breadcrumb-item active">Manage All Users</li>
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

              $allUser = mysqli_query($db, $query);

              while ($row = mysqli_fetch_assoc($allUser)) {
                  $id       = $row['user_id'];
                  $name     = $row['name'];
                  $username = $row['user_name'];
                  $email    = $row['email'];
                  $phone    = $row['phone'];
                  $image    = $row['image'];
                  $role     = $row['user_role'];

                  ?>

              <tr>
                  <th scope="row"><?php echo $id;?></th>
                  <td><?php echo $name;?></td>
                  <td><?php echo $username;?></td>
                  <td><?php echo $email;?></td>
                  <td><?php echo $phone;?></td>
                  <td><img src="img/<?php echo $image;?>" height="50" width="50" alt=""></td>
                  <td>
                    <?php
                      if ( $role == 0 ){ ?>
                        <span class="badge badge-success">Admin</span>
                      <?php }
                      else{ ?>
                        <span class="badge badge-primary">Editor</span>
                      <?php }
                    ?>
                  </td>
                  <td>
                    <div class="action-item">
                      <ul>
                        <li><a href="updateUsers.php?edit=<?php echo $id;?>"><i class="fa fa-edit"></i></a></li>
                        <li>
                          <a href="viewAllUsers.php?delete=<?php echo $id;?>">
                            <i class="fa fa-trash"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>

            <?php 
              }

            ?>

              </tbody>
            </table>
          </div>   

        <?php 

          if(isset($_GET['delete'])){
            $userDelete = $_GET['delete'];

            $query = "SELECT * FROM user WHERE user_id='$userDelete'";

            $result = mysqli_query($db,$query);

            while ($row = mysqli_fetch_assoc($result)) {
              # code...
              $name = $row['image'];
            }

            unlink("img/$name");


            $query = "DELETE FROM user WHERE user_id='$userDelete'";

            $result = mysqli_query($db,$query);

            if($result){
              header('Location:viewAllUsers.php');
            }else{
              die("".mysqli_error());
            }

          }

        ?>

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
  </div><!-- /.content-wrapper -->
  

<?php
  include "inc/footer.php";
?>