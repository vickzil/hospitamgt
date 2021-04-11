<?php 
require 'settings.php';
require 'index-files.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Welcome to PHP Hospital"; require 'components/head.php'; ?>
        <link rel="stylesheet" type="text/css" href="assets/css/tag.css">

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
                <div class="col-sm-4 col-xl-6">
                    <h4 class="mb-1 mt-0">Dashboard</h4>
                </div>
                <div class="col-sm-8 col-xl-6">
                    <form class="form-inline float-sm-right mt-3 mt-sm-0">
                        <div class="form-group mb-sm-0 mr-2">
                            <input type="text" class="form-control" id="dash-daterange" style="min-width: 190px;" />
                        </div>
                        
                    </form>
                </div>
            </div>

            <!-- content -->
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Doctors</span>

                                    <!-- display the number of doctors in dtabase -->
                                    <?php display_docs_id(); ?>
                                    
                                </div>
                                <div class="align-self-center">
                                    <?php

                                    // Select doctors from database

                                    $sql = "SELECT id FROM doctb ORDER BY id";
                                    $sqlRun = mysqli_query($con,$sql);
                                    $row=mysqli_num_rows($sqlRun);

                                    // calculate the percentage of the total number of doctors

                                    $docPercentage = '150';

                                    $totalDocPer = ($row / 100) * $docPercentage;

                                    ?>

                                    <i class="fa fa-user-md fa-3x mr-2 text-primary"></i>

                                    <?php

                                    if ($totalDocPer > '50') { ?>
                                        <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i> <?php echo $totalDocPer; ?>%</span>
                                  <?php  } else { ?>

                                    <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i> <?php echo $totalDocPer; ?>%</span>

                                  <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold"> Treatment</span>
                                    <!-- display the number of Treatments in database -->
                                    <?php display_specialty_id(); ?>
                                </div>
                                <?php

                                 // Select doctors from specialialty

                                    $Querry = "SELECT id FROM specialty ORDER BY id";
                                    $sqlRun = mysqli_query($con,$Querry);
                                    $rowT=mysqli_num_rows($sqlRun);

                                    // calculate the percentage of the total number of Treatements
                                    $treatPercentage = '150';

                                    $totalTreatPer = ($rowT / 100) * $treatPercentage;

                                    ?>
                                <div class="align-self-center">
                                    <i class="fa fa-wheelchair-alt fa-3x mr-2 text-danger"></i>

                                    <?php

                                    if ($totalTreatPer > '50') { ?>
                                        <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i> <?php echo $totalTreatPer; ?>%</span>
                                  <?php  } else { ?>

                                    <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i> <?php echo $totalTreatPer; ?>%</span>

                                  <?php } ?>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Patient</span>
                                    <!-- display the number of doctors in dtabase -->
                                    <?php display_patient_id(); ?>
                                </div>
                                <?php

                                    $Querry = "SELECT id FROM appointmenttb ORDER BY id";
                                    $sqlRun = mysqli_query($con,$Querry);
                                    $rowT=mysqli_num_rows($sqlRun);

                                    // calculate the percentage of the total number of doctors

                                    $patPercentage = '150';

                                    $totalParPer = ($rowT / 100) * $patPercentage;

                                    ?>
                                <div class="align-self-center">
                                    <i class="fa fa-address-card fa-3x mr-2 text-success"></i>
                                    <?php

                                    if ($totalParPer > '50') { ?>
                                        <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i> <?php echo $totalParPer; ?>%</span>
                                  <?php  } else { ?>

                                    <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i> <?php echo $totalParPer; ?>%</span>

                                  <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media p-3">
                                <div class="media-body">
                                    <span class="text-muted text-uppercase font-size-12 font-weight-bold"> Admin Users</span>
                                    <!-- display the number of doctors in dtabase -->
                                    <?php display_users_id(); ?>

                                </div>
                                <?php

                                    $Querry = "SELECT id FROM logintb ORDER BY id";
                                    $sqlRun = mysqli_query($con,$Querry);
                                    $rowT=mysqli_num_rows($sqlRun);

                                    $adminPercentage = '150';

                                    $totaladminPer = ($rowT / 100) * $adminPercentage;

                                    ?>
                                <div class="align-self-center">
                                    <i data-feather="users" class="icon-dual icon-lg text-warning mr-2"></i>
                                    <?php

                                    if ($totaladminPer > '50') { ?>
                                        <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i> <?php echo $totaladminPer; ?>%</span>
                                  <?php  } else { ?>

                                    <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i> <?php echo $totaladminPer; ?>%</span>

                                  <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end row -->


            <div class="row">
                <div class="col-md-4 col-xl-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <?php

                            $userid = $_SESSION['acountdetails'];
                            $userEmail = $_SESSION['email'];

                            // Get All Notifications from Login table and display

                            $inboxQuery="SELECT * FROM comments WHERE user_sent_id !='$userEmail' AND user_id='$userName' ORDER BY comment_date DESC ";

                            $inboxResult=mysqli_query($con,$inboxQuery);

                            $inboxRow = mysqli_num_rows($inboxResult); 

                            $NotiPercentage = '200';

                            $totalNotiPer = ($inboxRow / 100) * $NotiPercentage;


                            ?>

                            <div class="p-3">
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Inbox Notifications</span>
                                <h2><?php echo $inboxRow;  ?></h2>
                                <div class="progress mb-1 mt-2" style="height: 5px;">
                                    <?php
                                    if ($totalNotiPer > '50') { ?>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $totalNotiPer;  ?>%"
                                        aria-valuenow="<?php echo $totalNotiPer; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                     <?php  } else { ?>
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $totalNotiPer;  ?>%"
                                        aria-valuenow="<?php echo $totalNotiPer; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    <?php } ?>
                                </div>
                                <span class="text-muted font-weight-bold"><?php echo $totalNotiPer;  ?>% Avg</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <?php

                            // Get All Task from comment table and display

                            $Query="SELECT * FROM tasks";

                            $Result=mysqli_query($con,$Query);

                            $commentRaw = mysqli_num_rows($Result); 

                            $TaskPercentage = '200';

                            $totalTaskPer = ($commentRaw / 100) * $TaskPercentage;


                            ?>

                            <div class="p-3">
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Tasks</span>
                                <h2><?php echo $commentRaw;  ?></h2>
                                <div class="progress mb-1 mt-2" style="height: 5px;">
                                    <?php
                                    if ($totalTaskPer > '50') { ?>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $totalTaskPer;  ?>%"
                                        aria-valuenow="<?php echo $totalTaskPer; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                     <?php  } else { ?>
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $totalTaskPer;  ?>%"
                                        aria-valuenow="<?php echo $totalTaskPer; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    <?php } ?>
                                </div>
                                <span class="text-muted font-weight-bold"><?php echo $totalTaskPer;  ?>% Avg</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-4">
                    <div class="card">
                        <div class="card-body p-0">
                            <?php

                            // Get All Total Paid Patients and display

                            $Paid = "paid";

                            $SelectPaid = "SELECT * FROM appointmenttb WHERE payment='$Paid' ";
                            $PaidSql = mysqli_query($con,$SelectPaid);

                            $Paidrow=mysqli_num_rows($PaidSql);

                            $PaidPercentage = '200';

                            $totalPaidPer = ($Paidrow / 100) * $PaidPercentage;


                            ?>

                            <div class="p-3">
                                <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Paid Patients</span>
                                <h2><?php echo $Paidrow;  ?></h2>
                                <div class="progress mb-1 mt-2" style="height: 5px;">
                                    <?php
                                    if ($totalPaidPer > '50') { ?>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $totalPaidPer;  ?>%"
                                        aria-valuenow="<?php echo $totalPaidPer; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                     <?php  } else { ?>
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?php echo $totalPaidPer;  ?>%"
                                        aria-valuenow="<?php echo $totalPaidPer; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    <?php } ?>
                                </div>
                                <span class="text-muted font-weight-bold"><?php echo $totalPaidPer;  ?>% Avg</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end of Row -->

        <div class="row mt-5">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-2">
                        <h6 class="font-size-16 mb-4 font-weight-bold" id="text-logo">Admin Members</h6>

                        <?php

                        // Get All admin users from Login table and display
                        $userid = $_SESSION['acountdetails'];

                        $query="SELECT * FROM logintb WHERE acountdetails !='$userid' AND  authoritycode !='$ot' ";
                        $result=mysqli_query($con,$query);

                        while($row=mysqli_fetch_array($result)) :  ?>

                        <div class="media border-top pt-3">

                        <?php if ($row['profileimage'] == 0) { ?>
                            <img src="uploads/profile2.png" class="avatar rounded mr-3" alt="<?php echo $row['fullname'];?>" />
                        <?php } else { ?>
                            <img src="uploads/<?php echo $row['profileimage']; ?>" class="avatar rounded mr-3" alt="<?php echo $row['fullname'];?>" />

                        <?php } ?>

                            <div class="media-body">
                                <h6 class="mt-1 mb-0 font-size-15" style="text-transform: capitalize;"><?php echo $row['fullname'];?> 
                                <?php if ($row['active'] == 1) { ?>
                                    <i class="fa fa-circle ml-1" style="color: #00ff00; font-size: 11px;"></i>
                                <?php } else { ?>
                                    <i class="fa fa-circle" style="color: #ddd; font-size: 11px;"></i>
                                <?php } ?>
                                </h6>
                                <?php if ($row['skill_intro']) { ?>
                                <h6 class="text-muted font-weight-normal mt-1 mb-3"><?php echo $row['skill_intro'];?></h6>
                                <?php } else { ?>
                                <h6 class="text-muted font-weight-normal mt-1 mb-3">No Position Yet</h6>
                                <?php } ?>
                            </div>
                            <div class="dropdown align-self-center float-right">
                                <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="uil uil-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- item-->
                                    <a href="view-user.php?viewprofile=<?php echo $row['fullname'];?>" class="dropdown-item"><i
                                            class="uil uil-user-times mr-2"></i>View</a>
                                </div>
                            </div>
                        </div>
                        <?php endwhile ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-2">
                        <h6 class="font-size-16 mb-4 font-weight-bold" id="text-logo">Tasks</h6>
                        
                        <div class="row calendar-widget">
                            <div class="col-md-4 col-sm-12">
                                <div id="calendar-widget"></div>
                            </div>

                            <div class="col-md-8 col-sm-12" id="mobile_profile_top">

                                <?php 

                                     $query="select * from tasks";
                                     $result=mysqli_query($con,$query);
                                     $TaskNum = mysqli_num_rows($result);

                                    if($TaskNum > 0) {


                                ?>



                                <ul class="list-unstyled row ml-sm-3 pl-sm-5 mt-4 mt-sm-0">
                                    <?php

                                      while($row=mysqli_fetch_array($result)): ?>
                                      <li class="mb-4 col-md-6">
                                        <p class="text-muted mb-0 font-size-13">Posted on 
                                            <i class="uil uil-calender mr-1 text-primary"></i> <?php echo date('d M, Y', strtotime($row['task_date'])); ?>
                                        </p>
                                        <h6 class="mt-1 font-size-16 font-weight-bold"><a href="view-task?viewtask=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
                                            <?php if ($row['task_completed'] == 'Yes') { ?>
                                            <small class="badge badge-success font-size-12 font-weight-normal ml-2" style="font-size: 9px;">Completed</small>
                                             <?php } else { ?>
                                            <small class="badge badge-warning font-size-12 font-weight-normal ml-2" style="font-size: 9px;">Pending</small>
                                            <?php } ?>
                                        </h6>
                                        <p class="text-muted mb-0 font-size-13"> Posted By 
                                            <i class="uil uil-user mr-1"></i><?php echo $row['postedby']; ?>
                                        </p>
                                      </li>

                                   <?php endwhile ?>
                                   
                               </ul>
                               <div class="text-right">
                                    <a href="javascript:void(0);" class="btn btn-primary mb-0" data-toggle="modal" data-target="#taskmodal"><i class="uil-plus mr-1"></i>Add tasks</a>
                                </div>
                                <?php } else { ?>
                                <div class="">
                                    <ul class="list-unstyled row ml-sm-3 pl-sm-5 mt-4 mt-sm-0 d-flex justify-content-center align-items-center align-self-center">
                                      <li class="mb-4 col-md-6">
                                        <h5 class="card-body text-center font-weight-boldfont-size-16">No Task found</h5>
                                        </li>
                                    </ul>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        </div>
    </div> <!-- content -->
    <div class="clearfix"></div>

    

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