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


?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Patient Details | PHP Hospital"; require 'components/head.php'; ?>

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
                                        <li class="breadcrumb-item active" aria-current="page">Patient Details</li>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Patient Details</h4>
                            </div>
                        </div>

                        <!-- content -->

                        <div class="row">
                          <div class="col-12">
                            <div class="card mt-5">
                                <div class="card-body">
                                    <h4 class="h4 mt-0 mb-4 text-info" id="text-logo">Patient Data Table</h4>
                                    <div class="table-responsive">
                                      <table id="basic-datatable" class="table dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>E-mail</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Asigned To</th>
                                                <th>Date Registered</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php

                                          // Get patient Details from Appointment table and display

                                          $query="select * from appointmenttb";
                                          $result=mysqli_query($con,$query);

                                          while($row=mysqli_fetch_array($result)) :  ?>
                                          <tr>
                                              <td><?php echo $row['title']; ?> <?php echo $row['fullname']; ?></td>
                                              <td><?php echo $row['email']; ?></td>
                                              <td><?php echo $row['contact']; ?></td>
                                              <td><?php echo $row['address']; ?></td>
                                              <td><?php echo $row['doctor']; ?></td>
                                              <td><?php echo $row['datecreated']; ?></td>
                                          </tr>
                                          <?php endwhile ?>
                                        </tbody> 
                                      </table>
                                    </div>
                                  </div> <!-- end card body-->
                                </div> <!-- end card -->
                              </div><!-- end col-->
                            </div><!-- end row-->

                            <br> <br> <br><br><br>


                            <div class="row">
                          <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="h4 mt-0 mb-4 text-info" id="text-logo">Edit & Delete Patient Data Table</h4>
                                    <div class="table-responsive">
                                      <table id="basic-datatable" class="table dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>E-mail</th>
                                                <th>Contact</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php

                                          // Get patient Details from Appointment table and display

                                          $query="select * from appointmenttb";
                                          $result=mysqli_query($con,$query);

                                          while($row=mysqli_fetch_array($result)) :  ?>
                                          <tr>
                                              <td style="display: none;"><?php echo $row['id']; ?></td>
                                              <td><?php echo $row['fullname']; ?></td>
                                              <td><?php echo $row['email']; ?></td>
                                              <td><?php echo $row['contact']; ?></td>
                                              <td style="display: none;"><?php echo $row['address']; ?></td>
                                              <td style="display: none;"><?php echo $row['doctor']; ?></td>
                                              <td style="display: none;"><?php echo $row['datecreated']; ?></td>
                                              <td colspan="2" class="text-center">
                                                <button class="text-success btn btn-outline-light editpat" id="">
                                                <i class="fa fa-pencil-square-o"></i>
                                                </button>

                                                <button type="button" class="text-danger btn btn-outline-light deletePat">
                                                  <i class="fa fa-trash-o"></i>
                                                </button>

                                              </td>
                                          </tr>
                                          <?php endwhile ?>
                                        </tbody> 
                                      </table>
                                    </div>
                                  </div> <!-- end card body-->
                                </div> <!-- end card -->
                              </div><!-- end col-->
                            </div><!-- end row-->


                        

                        


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
                        <form action="patient.inc.php" method="POST" class="needs-validation" name="event-form" id="form-event" novalidate>
                          <div class="row">
                            <input type="hidden" id="patId" name="id">
                              <div class="col-md-12 form-group mb-4">
                                <input type="hidden" id="row_id">
                                <label class="form-label">Fullname <span class="form-required text-danger">*</span></label>
                                <input type="text" required class="form-control" id="fname" name="fullname">
                              </div>
                          </div>

                          <div class="row">
                            <div class="col-md-7 form-group mb-4">
                              <label class="form-label">E-mail <span class="form-required text-danger">*</span></label>
                              <input type="email" id="femail"  class="form-control" required name="femail" >
                            </div>
                            <div class="col-md-5 form-group mb-4">
                              <label class="form-label">Phone <span class="form-required text-danger">*</span></label>
                              <input type="tel" class="form-control" id="contact" required  name="contact" >
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12 form-group mb-4">
                              <label class="form-label">Address <span class="form-required text-danger">*</span></label>
                              <input type="text" class="form-control" id="address" required  name="address" >
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-9 form-group mb-4 ">
                              <label class="form-label">Asigned to <span class="form-required text-danger">*</span></label>
                             <select id="doctor" name="doctor" class="form-control" >
                                <?php display_docs(); ?>
                              </select>
                            </div>                                            
                          </div> 
                          <div class="form-group">
                            <input type="submit" name="updatePat" value="Update Now" class="btn btn-info btn-block">
                          </div> 
                        </form>
                      </div>
                    </div> <!-- end modal-content-->
                  </div> <!-- end modal dialog-->
                </div>

                <!-- Delete Doctor MODAL -->
                <div class="modal fade" id="deletepat-modal" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header py-3 px-4 border-bottom-0 d-block bg-dark">
                          <button type="button" class="close text-light" data-dismiss="modal"
                          aria-hidden="true">&times;</button>
                          <h5 class="modal-title text-light" id="modal-title">Delete Patient</h5>
                      </div>
                      <div class="modal-body p-4">
                        <form action="patient.inc.php" method="POST" class="needs-validation" name="event-form" id="form-event" novalidate>
                          <input type="hidden" name="id" id="docId">
                          <p class="font-size-16">Are You sure you want to delete <b><span class="docName text-success text-capitalize"></span></b> </p>
                          <div class="form-group mt-4">
                            <label class="form-control-label">Admin Password<span class="form-required text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                              <input type="password" class="form-control form-control-md" id="password" name="password" 
                                  placeholder="Enter your password" required>
                              <div class="input-group-prepend">
                                  <button id="show_password"  type="button" class="btn btn-outline-light btn-sm">
                                      <i class="icon-dual icon-sm" data-feather="eye-off" id="eye_show"></i>
                                      <i class="icon-dual" data-feather="eye" id="eye_hide"></i>
                                  </button>
                              </div>
                            </div>
                          </div>
                          <div class="form-group mt-4">
                            <button type="submit" name="deletepat" class="btn mr-1 text-light bg-dark" >Yes</button>
                            <button class="btn btn-outline-secondary" data-dismiss="modal">No, thanks</button>  
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
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