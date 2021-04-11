<?php 
require 'settings.php';
require 'index-files.php';

$patEdit = false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Patient Payment Status | PHP Hospital"; require 'components/head.php'; ?>

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
                                        <li class="breadcrumb-item active" aria-current="page">Patient Payment Status</li>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Patient Payment Status</h4>
                            </div>
                        </div>

                        <!-- content -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <h4 class="h4 mt-0 mb-4 text-info" id="text-logo">Payment Status Data Table</h4>
                                        <div class="table-responsive">
                                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>email</th>
                                                        <th>Contact</th>
                                                        <th>Payment Status</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                
                                                    <?php

                                                    // Get patient Details from Appointment table and display

                                                    $query="select * from appointmenttb";
                                                    $result=mysqli_query($con,$query);

                                                    while($row=mysqli_fetch_array($result)) :  ?>
                                                    <tr>
                                                        <td><?php echo $row['fullname']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['contact']; ?></td>
                                                        <td><?php echo $row['payment']; ?></td>
                                                    </tr>

                                                <?php endwhile ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    
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