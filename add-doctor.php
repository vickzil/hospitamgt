<?php 
require 'settings.php';
require 'index-files.php';

$patEdit = false;

function display_docs()
{
    global $con;
    $query="select * from doctb";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result))
    {
        $name=$row['name'];
        echo '<option value="'.$name.'">'.$name.'</option>';
    }
}

//Edit patient details 

if (isset($_GET['editpat'])) {

  $id = $_GET['editpat'];

  $patEdit = true;

  $rec = $con->query("select * from appointmenttb where id=$id");

  $row = mysqli_fetch_array($rec);
  $fname=$row['name'];
  $email=$row['email'];
  $contact=$row['contact'];
  $doctor=$row['doctor'];
  $payment=$row['payment'];

}

// delete doctor details

if (isset($_GET['deletepat'])) {
    $id = $_GET['deletepat'];

  $query = "delete from appointmenttb where id=$id";

  $result=mysqli_query($con,$query);
  if ($result) {

  $_SESSION['message'] = "Patient Deleted";
  $_SESSION['msgtype'] = "success";

  header("Location:". $_SERVER['HTTP_REFERER']);
  exit();

   } else {

       $_SESSION['message'] = "Cannot Delete Patient";
       $_SESSION['msgtype'] = "danger"; 

       header("Location:". $_SERVER['HTTP_REFERER']);
        exit();

      }

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Add Doctor | PHP Hospital"; require 'components/head.php'; ?>

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
                                        <li class="breadcrumb-item active" aria-current="page">Add Doctor</li>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Add Doctor</h4>
                            </div>
                        </div>

                        <!-- content -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-4">
                                <div class="card-body">
                                  <form action="doctor.inc.php" method="POST" class="needs-validation" name="event-form" id="form-event" novalidate>
                                    <div class="row">
                                      <input type="hidden" id="patId" name="id">
                                        <div class="col-md-6 form-group mb-4">
                                          <input type="hidden" id="row_id">
                                          <label class="form-label">Fullname <span class="form-required text-danger">*</span></label>
                                          <input type="text" required class="form-control" id="fname" name="fullname" placeholder="Enter Doctor's name">
                                        </div>
                                        <div class="col-md-6 form-group mb-4">
                                          <label class="form-label">E-mail <span class="form-required text-danger">*</span></label>
                                          <input type="email" id="femail"  class="form-control" required name="email" placeholder="Enter Doctor's email" >
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 form-group mb-4">
                                          <label class="form-label">Phone <span class="form-required text-danger">*</span></label>
                                          <input type="tel" class="form-control" id="contact" required  name="contact" placeholder="Enter Doctor's contact number">
                                        </div>

                                        <div class="col-md-6 form-group mb-4">
                                          <label class="form-label">Address <span class="form-required text-danger">*</span></label>
                                          <input type="text" class="form-control" id="address" required  name="address" placeholder="Enter Doctor's Address">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4 form-group mb-4">
                                          <label class="form-label">Doctors Specialty <span class="form-required text-danger">*</span></label>
                                          <select id="specialty" name="specialty" class="form-control">
                                            <?php display_specialty(); ?>
                                        </select>
                                        </div>

                                        <div class="col-md-4 form-group mb-4 ">
                                          <label class="form-label">Availablity <span class="form-required text-danger">*</span></label>
                                         <select id="available" name="available" class="form-control">
                                            <option value="Available">Available</option>
                                            <option value="Not Available">Not Available</option>
                                        </select>
                                        </div>

                                        <div class="col-md-4 form-group mb-4 ">
                                          <label class="form-label">Days Available <span class="form-required text-danger">*</span></label>
                                         <select id="days" name="days" class="form-control" >
                                            <?php display_days(); ?>
                                        </select>
                                        </div>
                                    </div>

                                        <div class=" form-group text-right">
                                          <button type="submit" name="addDoc" class="btn btn-info"><i class="fa fa-user-md mr-2"></i> Add Doctor</button>
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