<?php 
require 'settings.php';
require 'index-files.php';




if (isset($_GET['adminAuthCode'])) {

	$userid = $_SESSION['acountdetails'];

    $select = "SELECT * FROM logintb WHERE acountdetails='$userid'";
    $execute = mysqli_query($con, $select);

    $extract = mysqli_fetch_assoc($execute);

    $otCode = $extract['authoritycode'];

	if ($otCode != $userid) {

		$_SESSION['message']= " Unauthorized Admin!";
        $_SESSION['msgtype']= "danger";

        header("Location:". $_SERVER['HTTP_REFERER']);
        exit();


	} else {


		 $id = $_GET['adminAuthCode'];




	}






} else {

    $_SESSION['message']= " Unauthorized Admin!";
    $_SESSION['msgtype']= "danger";

    header('Location: ./');
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Change Authority Code | PHP Hospital"; require 'components/head.php'; ?>

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
                                        <li class="breadcrumb-item active" aria-current="page"> Authority Code</li>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Change Authority Code</h4>
                            </div>
                        </div>

                        <!-- content -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-4">
                                <div class="card-body">
                                  <form action="patient.inc.php" method="POST" class="needs-validation mt-5 mb-4" name="event-form" id="form-event" novalidate>

                                  	<h4 class="text-center mb-5 text-danger font-weight-bold">Change Your Authority Code</h4>

                                      <input type="hidden" id="patId" name="id">
                                        <div class="col-md-6 m-auto form-group mb-4">
                                          <input type="hidden" id="row_id">
                                          <label class="form-label">Old AuthorityCode <span class="form-required text-danger">*</span></label>
                                          <input type="text" required class="form-control" id="fname" name="fullname">
                                        </div>
                                        <br>

                                        <div class="col-md-6 m-auto form-group mb-4">
                                          <input type="hidden" id="row_id">
                                          <label class="form-label">New AuthorityCode <span class="form-required text-danger">*</span></label>
                                          <input type="text" required class="form-control" id="fname" name="fullname" >
                                        </div>
                                        <br>

                                        <div class="col-md-6 m-auto form-group mb-4">
                                          <input type="hidden" id="row_id">
                                          <label class="form-label">Confirm New AuthorityCode <span class="form-required text-danger">*</span></label>
                                          <input type="text" required class="form-control" id="fname" name="fullname">
                                        </div>
                                        <br><br>


                                        <div class=" col-md-6 m-auto form-group">
                                          <input type="submit" name="addPatient" value="Change Code" class="btn btn-danger btn-block">
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

