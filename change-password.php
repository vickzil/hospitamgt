<?php 
require 'settings.php';
require 'index-files.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Change Password | PHP Hospital"; require 'components/head.php'; ?>

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
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-md-12">
                                <nav aria-label="breadcrumb" class="float-right mt-1">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="./" class="text-info">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Change Password</li>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Change Password</h4>
                            </div>
                        </div>

                        <!-- content -->
                    <?php if ($_SESSION['email'] != 'adminuser@mail.com') { ?>
                     
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-4">
                                <div class="card-body">
                                  <form action="reset-profile-password.inc.php" method="POST" class="needs-validation mt-5 mb-4" name="event-form" id="form-event" novalidate>

                                    <div class="col-md-9 mr-auto">
                                        <div class="row mb-2">

                                            <div class="form-group col-md-12 mb-5">
                                              <label class="form-control-label">Old Password<span class="form-required text-danger">*</span></label>
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

                                          <div class="form-group col-md-12 mb-3">
                                              <label class="form-control-label">New Password<span class="form-required text-danger">*</span></label>
                                              <div class="input-group input-group-merge">
                                                  <div class="input-group-prepend">
                                                      <button id="show_npassword"  type="button" class="input-group-text">
                                                          <i class="icon-dual" data-feather="eye-off" id="eye_n_show"></i>
                                                          <i class="icon-dual" data-feather="eye" id="eye_n_hide"></i>
                                                      </button>
                                                  </div>
                                                  <input type="password" class="form-control" id="npassword" name="npassword" 
                                                      placeholder="Enter new your password" required>
                                              </div>
                                          </div>

                                          <div class="form-group col-md-12 mt-3">
                                              <label class="form-control-label">Confirm New Password<span class="form-required text-danger">*</span></label>
                                              <div class="input-group input-group-merge">
                                                  <div class="input-group-prepend">
                                                      <button id="show_cpassword"  type="button" class="input-group-text">
                                                          <i class="icon-dual" data-feather="eye-off" id="eye_c_show"></i>
                                                          <i class="icon-dual" data-feather="eye" id="eye_c_hide"></i>
                                                      </button>
                                                  </div>
                                                  <input type="password" class="form-control" id="cpassword" name="cpassword" 
                                                      placeholder="Confirm new your password" required>
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
                <?php } else { ?>

                  <div class="row">
                    <div class="col-12">
                          <div class="card mt-4 alert alert-warning">
                              <div class="card-body text-center">
                                <h5>Sorry, You are not Authorized to change this password. Please create new account!</h5>
                              </div>
                          </div>
                      </div>
                  </div>


                <?php } ?>


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

