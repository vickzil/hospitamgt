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
                                        <li class="breadcrumb-item active" aria-current="page">Admin Users</li>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0"> Admin Users</h4>
                            </div>
                        </div>

                        <!-- content -->

                        <div class="row">
                          <div class="col-12">
                            <div class="card mt-4">
                              <div class="card-body">
                                <h4 class="h4 mt-0 mb-4 text-info">Admin Users Data Table</h4>
                                  <div class="table-responsive">
                                    <table id="basic-datatable" class="table dt-responsive nowrap">
                                      <thead>
                                        <tr>
                                          <th>Image</th>
                                          <th>Name</th>
                                          <th>E-mail</th>
                                          <th>Contact</th>
                                          <th>Address</th>
                                          <th>Age</th>
                                          <th>State</th>
                                          <th>Verified</th>
                                          <th>Last LoggedIn</th>
                                          <th>Last LoggedOut</th>
                                          <th>Date Registered</th>
                                          <th>Login Count</th>
                                        </tr>
                                      </thead>

                                      <tbody>
                                              
                                        <?php

                                        // Get patient Details from Appointment table and display

                                        $query="select * from logintb";
                                        $result=mysqli_query($con,$query);

                                        while($row=mysqli_fetch_array($result)) :  ?>
                                        <tr>
                                          <td>

                                            <?php if ($row['profileimage'] == 0) { ?>
                                            <img src="uploads/profile2.png" class="avatar-sm rounded-circle mr-2" alt="<?php echo $row['fullname'];?>" />
                                        <?php } else { ?>
                                            <img src="uploads/<?php echo $row['profileimage']; ?>" class="avatar-sm rounded-circle mr-2" alt="<?php echo $row['fullname'];?>" />

                                        <?php } ?>
                                              
                                          </td>
                                          <td><?php echo $row['fullname']; ?></td>
                                          <td><?php echo $row['email']; ?></td>
                                          <td><?php echo $row['phone']; ?></td>
                                          <td><?php echo $row['address']; ?></td>
                                          <td><?php echo $row['age']; ?></td>
                                          <td><?php echo $row['state']; ?></td>
                                          <td>
                                            <?php 

                                            if ($row['verified'] == 1) {
                                              echo "Yes";
                                            } else {
                                              echo "No";
                                            } ?>
                                            </td>
                                          <td><?php echo date('M d Y H:ia', strtotime($row['lastlogin'])); ?></td>
                                          <td><?php echo date('M d Y H:ia', strtotime($row['lastlogoff'])); ?></td>
                                          <td><?php echo $row['datecreated']; ?></td>
                                          <td><?php echo $row['logincount']; ?></td>
                                        </tr>

                                        <?php endwhile ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div> <!-- end card body-->
                              </div> <!-- end card -->
                            </div><!-- end col-->
                          </div><!-- end row-->


                          <?php 

                          if (!empty($otCode)) : ?>

                          <br><br><br><br>


                          <div class="row">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-body">
                                <h4 class="h4 mt-0 mb-4 text-info">Delete Admin Users Data Table</h4>
                                  <div class="table-responsive">
                                    <table id="basic-datatable" class="table dt-responsive nowrap">
                                      <thead>
                                        <tr>
                                          <th>Name</th>
                                          <th>Date Registered</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>

                                      <tbody>
                                              
                                        <?php

                                        // Get patient Details from Appointment table and display

                                        $query="select * from logintb";
                                        $result=mysqli_query($con,$query);

                                        while($row=mysqli_fetch_array($result)) :  ?>
                                        <tr>
                                          <td style="display: none;"><?php echo $row['id']; ?></td>
                                          <td><?php echo $row['fullname']; ?></td>
                                          <td style="display: none;"><?php echo $row['email']; ?></td>
                                          <td style="display: none;"><?php echo $row['phone']; ?></td>
                                          <td style="display: none;"><?php echo $row['address']; ?></td>
                                          <td><?php echo $row['datecreated']; ?></td>
                                          <td colspan="2">

                                            <button type="button" class="text-danger btn btn-outline-light deleteadmin">
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

                        <?php endif ?>
                        

                        


                    </div>
                </div> <!-- content -->

                <!-- Delete Doctor MODAL -->
                <div class="modal fade" id="deleteadmin-modal" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header py-3 px-4 border-bottom-0 d-block bg-dark">
                          <button type="button" class="close text-light" data-dismiss="modal"
                          aria-hidden="true">&times;</button>
                          <h5 class="modal-title text-light" id="modal-title">Delete Admin</h5>
                      </div>
                      <div class="modal-body p-4">
                        <form action="add-admin.inc.php" method="POST" class="needs-validation" name="event-form" id="form-event" autocomplete="off" novalidate>
                          <input type="hidden" name="id" id="docId">
                          <p class="font-size-16">Are You sure you want to delete this admin <b><span class="docName text-success text-capitalize"></span></b> </p>
                          <div class="form-group mt-4">
                            <label class="form-control-label">Authority code<span class="form-required text-danger">*</span></label>
                            <input type="text" name="authoritycode" class="form-control form-control-sm" required>
                          </div>
                          <div class="form-group mt-4">
                            <button type="submit" name="deleteadmin" class="btn mr-1 text-light bg-dark" >Yes</button>
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