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
            <h1>This is a Basic Template</h1>

            <?php

              $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';


              if ( $do == 'Manage' ){
                
              }
              else if( $do == 'Add' ){
                echo 'We can Add New Post From Here';
              }
              else if( $do == 'Insert' ){
                echo 'We can Insert New Post Data Into the DB From Here';
              }
              else if( $do == 'Edit' ){
                echo 'We can see the edit page here';
              }
              else if( $do == 'Update' ){
                echo 'We can Update the Post Data Into the DB From Here';
              }
              else if( $do == 'delete' ){
                echo 'We can Delete the Post Data From Here';
              }



            ?>


          </div>            
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
  </div><!-- /.content-wrapper -->
  

<?php
  include "inc/footer.php";
?>