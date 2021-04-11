<?php 
require 'settings.php';
require 'index-files.php';

$patEdit = false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Update Payment | PHP Hospital"; require 'components/head.php'; ?>

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
                                        <li class="breadcrumb-item active" aria-current="page">Update Payment Status</li>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Update Patient Payment Status</h4>
                            </div>
                        </div>

                        <!-- content -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-5">
                                <div class="card-body">
                                    <form action="patient.inc.php" method="POST" class="needs-validation" name="event-form" id="form-event" novalidate>
                                        <div class="row">
                                          <div class="col-md-12 form-group mb-3">
                                            <label class="form-label">Patient Name</label>
                                            <select id="update_email" name="email" class="form-control" >
                                                <?php email_info(); ?>
                                            </select>
                                          </div>

                                          <div class="col-md-12 form-group mb-4">
                                            <label class="form-label">Status</label>
                                            <select id="update_status" name="status" class="form-control">
                                                <option value="paid">Paid</option>
                                                <option value="Not Paid">Not Paid</option>
                                            </select>
                                          </div>
                                      </div>

                                      <div class="form-group text-right">
                                        <button type="submit" name="update_data" class="btn btn-info"><i class="fa fa-paper-plane mr-2"></i> Update Now</button>
                                      </div>

                                    </form>
                                    
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                    <!-- end row-->
                        

                        


                    </div>
                </div> <!-- content -->
                

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