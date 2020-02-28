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
            <!-- add new category end -->
          </div>
            <div class="col-lg-6">
                <!--all category start-->
                <div class="card card-primary collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">ALL Catagory </h3>

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
                                while($row = mysqli_fetch_assoc($all_cat)){
                                    $cat_id = $row['id'];
                                    $cat_name = $row['name'];
                                    $cat_desc = $row['description'];

                                }?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><?php echo $cat_name; ?></td>
                                    <td><?php echo  $cat_desc; ?></td>
                                    <td>@mdo</td>
                                </tr>
                            <?php ?>
                            </tbody>
                        </table>
                        <!--category table end -->
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