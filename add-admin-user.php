<?php 
require 'settings.php';
require 'index-files.php';

$userid = $_SESSION['acountdetails'];

$select = "SELECT * FROM logintb WHERE acountdetails='$userid'";
$execute = mysqli_query($con, $select);

$extract = mysqli_fetch_assoc($execute);

$otCode = $extract['authoritycode'];

if (empty($otCode)) { 

   header("Location: ./");
   
    } else {


    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "All Admin User | PHP Hospital"; require 'components/head.php'; ?>
        <!-- plugin css -->
        <link href="assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    </head>
<?php  
require 'body.php';

?>

    <body  class="<?php echo $userTheme; ?>" data-left-keep-condensed="true">
    
            <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php require 'components/top-nav.php'; ?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php require 'components/side-nav.php'; ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content" id="mrb">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-md-12">
                                <nav aria-label="breadcrumb" class="float-right mt-1">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="./" class="text-info">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add New Admin</li>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Add New Admin</h4>
                            </div>
                        </div>

                        <!-- content -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-4">
                                <div class="card-body">
                                  <form action="add-admin.inc.php" method="POST" class="needs-validation" name="event-form" id="form-event" novalidate>
                                    <div class="row">
                                      <div class="col-md-2 form-group mb-4">
                                          <label class="form-label">Gender <span class="form-required text-danger">*</span></label>
                                          <select id="gender" name="gender" class="form-control" >
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                          </select>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-4">
                                          <input type="hidden" id="row_id">
                                          <label class="form-label">Fullname <span class="form-required text-danger">*</span></label>
                                          <input type="text" required class="form-control" id="fname" name="fullname" placeholder="Enter Patient name">
                                        </div>
                                        <div class="col-md-6 form-group mb-4">
                                          <label class="form-label">E-mail <span class="form-required text-danger">*</span></label>
                                          <input type="email" id="femail"  class="form-control" required name="email" placeholder="Enter Patient email" >
                                        </div>
                                    </div>

                                     <div class="row">

                                        <div class="col-md-6 form-group mb-4">
                                          <label class="form-label">Phone <span class="form-required text-danger">*</span></label>
                                          <input type="tel" class="form-control" id="contact" required  name="phone" placeholder="Enter Patient contact number">
                                        </div>

                                        <div class="col-md-6 form-group mb-4">
                                          <label class="form-label">Username <span class="form-required text-danger">*</span></label>
                                          <input type="text" class="form-control" id="username" required  name="username" placeholder="Enter Username">
                                        </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-8 form-group mb-4">
                                          <label class="form-label">Address <span class="form-required text-danger">*</span></label>
                                          <input type="text" class="form-control" id="address" required  name="address" placeholder="Enter Patient Address">
                                        </div>
                                    </div>

                                    <div class="row mb-2">

                                        <div class="form-group col-md-6">
                                          <label class="form-control-label">Password<span class="form-required text-danger">*</span></label>
                                          <div class="input-group input-group-merge">
                                              <div class="input-group-prepend">
                                                  <button id="show_password"  type="button" class="input-group-text">
                                                      <i class="icon-dual" data-feather="eye-off" id="eye_show"></i>
                                                      <i class="icon-dual" data-feather="eye" id="eye_hide"></i>
                                                  </button>
                                              </div>
                                              <input type="password" class="form-control" id="password" name="password" 
                                                  placeholder="Enter your password" required>
                                          </div>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <label class="form-control-label">Confirm Password<span class="form-required text-danger">*</span></label>
                                          <div class="input-group input-group-merge">
                                              <div class="input-group-prepend">
                                                  <button id="show_cpassword"  type="button" class="input-group-text">
                                                      <i class="icon-dual" data-feather="eye-off" id="eye_c_show"></i>
                                                      <i class="icon-dual" data-feather="eye" id="eye_c_hide"></i>
                                                  </button>
                                              </div>
                                              <input type="password" class="form-control" id="cpassword" name="cpassword" 
                                                  placeholder="Enter your password" required>
                                          </div>
                                      </div>
                                    </div>
                                      <div class=" form-group mt-3 text-right">
                                          <input type="submit" name="addAdmin" value="Add patient" class="btn btn-info">
                                        </div>                 
                                  </form>
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                                <!-- end row-->
                        

                        


                    </div>
                </div> <!-- content -->

                <!-- Add New Event MODAL -->
                <div class="modal fade" id="editpat-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                                <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                                <h5 class="modal-title" id="modal-title">Event</h5>
                            </div>
                            <div class="modal-body p-4">
                                
                            </div>
                            </div> <!-- end modal-content-->
                            </div> <!-- end modal dialog-->
                        </div>

                

                <!-- Footer Start -->
                <?php require 'components/footer.php';  ?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <?php require 'components/right-side-bar.php'; ?>

        <?php require 'components/scripts.php'; ?>

    </body>

</html>