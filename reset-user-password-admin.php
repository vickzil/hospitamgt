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
        <?php $GLOBALS['title'] = "About Developer | PHP Hospital"; require 'components/head.php'; ?>

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
                                        <li class="breadcrumb-item active" aria-current="page">change user password</li>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Change user password</h4>
                            </div>
                        </div>

                        <!-- content -->

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <form action="reset-admin-password.inc.php" method="POST" class="needs-validation mt-5 mb-4" name="event-form" id="form-event" novalidate>

                                    <div class="col-md-7 mr-auto">
                                        <div class="row mb-2">

                                            <div class="form-group col-md-12 mb-3">
                                              <label class="form-control-label">User E-mail<span class="form-required text-danger">*</span></label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <button id="show_npassword"  type="button" class="input-group-text">
                                                          <i class="icon-dual" data-feather="mail"></i>
                                                        </button>
                                                    </div>
                                                    <input type="email" class="form-control" name="email" 
                                                      placeholder="Enter user email" required>
                                                </div>
                                            </div>

                                          <div class="form-group col-md-12 mb-3">
                                              <label class="form-control-label">New Password<span class="form-required text-danger">*</span></label>
                                              <div class="input-group input-group-merge">
                                                  <div class="input-group-prepend">
                                                      <button id="show_password"  type="button" class="input-group-text">
                                                          <i class="icon-dual" data-feather="eye-off" id="eye_show"></i>
                                                          <i class="icon-dual" data-feather="eye" id="eye_hide"></i>
                                                      </button>
                                                  </div>
                                                  <input type="password" class="form-control" id="password" name="password" 
                                                      placeholder="Enter new your password" required>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="form-footer text-right">
                                            <button type="submit" name="resetProfilePwd" class="btn btn-dark" style="background: #17174a;">Change Password</button>
                                        </div>
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