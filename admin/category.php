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
          <div class="col-lg-6">
            <!-- add new category start-->
              <div class="card card-primary collapsed-card">
                  <div class="card-header">
                      <h3 class="card-title">Add New Category</h3>

                      <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                      </button>
                      </div>
                      <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body" style="display: none;">
                      <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" required="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="description">Category Description</label>
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="add_cat" value="Add New Category" class="btn btn-primary btn-flat btn-sm">
                        </div>
                      </form> 
                      <?php
                        //add new catagory 
                        if(isset($_POST['add_cat'])){
                            $name         = $_POST['name'];
                            $description  =  $_POST['description'];

                            $query = "INSERT INTO category(name,description) VALUES('$name','$description')";
                            $add_cat = mysqli_query($db,$query);

                            if($add_cat){
                              header("Location:category.php");
                            }else{
                              die("Mysql Query Failed-".mysql_error($db));
                            }
                        }
                      ?> 
                  </div>
                  <!-- /.card-body -->
              </div>
            <!-- add new category end -->
            <?php 

              if(isset($_GET['edit'])){
                $edit_cat =  $_GET['edit'];
                $query = "SELECT * FROM category WHERE id='$edit_cat'";
                $selected_cat = mysqli_query($db, $query);
        
                while($row = mysqli_fetch_assoc($selected_cat)){
                    $cat_id     = $row['id'];
                    $cat_name   = $row['name'];
                    $cat_desc   = $row['description'];

                ?>
              <!-- Update category start-->
              <div class="card card-primary collapsed-card">
                  <div class="card-header">
                      <h3 class="card-title">Update Category</h3>

                      <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                      </button>
                      </div>
                      <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body" style="display: none;">
                      <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" required="" autocomplete="off" value="<?php echo $cat_name; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Category Description</label>
                            <textarea name="description" class="form-control" rows="5"><?php echo $cat_desc; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update_cat" value="Update Category" class="btn btn-primary btn-flat btn-sm">
                        </div>
                      </form> 
                  </div>
                  <!-- /.card-body -->
              </div>
            <!-- Update category end -->

              <?php } } ?>

             <?php
              //add new catagory 
              if(isset($_POST['update_cat'])){
                  $name         = $_POST['name'];
                  $description  =  $_POST['description'];

                  $query = "UPDATE category SET name='$name',description='$description' WHERE id='$cat_id'";
                  $add_cat = mysqli_query($db,$query);

                  if($add_cat){
                    header("Location:category.php");
                  }else{
                    die("Mysql Query Failed-".mysql_error($db));
                  }
              }
            ?> 

          </div>
            <div class="col-lg-6">
                <!--all category start-->
                <div class="card card-primary collapsed-card">
                  <div class="card-header">
                      <h3 class="card-title">Update Catagory </h3>

                      <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                      </button>
                      </div>
                      <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->
                      <div class="card-body" style="display: none;">
                          <!--catagory table start-->
                          <table class="table">
                              <thead class="thead-dark">
                                  <tr>
                                  <th scope="col">Sl.</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Description</th>
                                  <th scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                              <?php
                                  $query = "SELECT * FROM `category`";
                                  $all_cat = mysqli_query($db, $query);
                                  $i = 0;
                                  while($row = mysqli_fetch_assoc($all_cat)){
                                      $cat_id     = $row['id'];
                                      $cat_name   = $row['name'];
                                      $cat_desc   = $row['description'];
                                      $i++;
                                  ?>
                                  <tr>
                                      <th scope="row"><?php echo $i; ?></th>
                                      <td><?php echo $cat_name; ?></td>
                                      <td><?php echo  $cat_desc; ?></td>
                                      <td>
                                          <div class="action-item">
                                              <ul>
                                                  <li><a href="category.php?edit=<?php echo $cat_id; ?>"><i class="fa fa-edit"></i></a></li>
                                                  <li><a data-toggle="modal" data-target="#delete" href=""><i class="fa fa-trash"></i></a></li>
                                              </ul>
                                          </div>
                                      </td>
                                  </tr>
                                  <?php } ?>
                                
                              </tbody>
                          </table>
                          <!--category table end -->

                          <!-- catagory delete modal start-->
                          <!-- Modal -->
                              <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Are You Sure Delete Me?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="delete-opction">
                                          <ul>
                                              <li><a class="btn btn-success btn-lg btn-flat" href="category.php?delete=<?php echo $cat_id; ?>">Yes</a></li>
                                              <li><button type="submit" class="btn btn-danger btn-lg btn-flat" data-dismiss="modal">No</button></li>
                                          </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          <!-- catagory delete modal end-->
                      </div>
                      <!-- /.card-body -->
                  </div>
                <!-- all category end -->
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