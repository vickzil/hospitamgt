<?php 
require 'settings.php';
require 'index-files.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Tasks | PHP Hospital"; require 'components/head.php'; ?>
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
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-md-3 col-xl-6">
                                <h4 class="mb-1 mt-0">Task List</h4>
                            </div>
                            <div class="col-md-9 col-xl-6 text-md-right">
                                <div class="mt-4 mt-md-0">
                                    <button type="button" class="btn btn-danger mr-4 mb-3  mb-sm-0" data-toggle="modal" data-target="#taskmodal"><i class="uil-plus mr-1"></i> Create Project</button>
                                    <div class="btn-group mb-3 mb-sm-0">
                                        <a href="tasks" class="btn btn-white">All</a>
                                    </div>
                                    <div class="btn-group ml-1">
                                        <a href="ongoing-task" class="btn btn-white">Ongoing</a>
                                        <a href="finished-task" class="btn btn-primary">Finished</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- widgets -->

                        <div class="row">

                            <?php 

                            $CompletedTas = "Yes"; 

                            $queryTask="SELECT * FROM tasks WHERE task_completed='$CompletedTas'  ORDER BY task_date DESC";
                            $Taskresult=mysqli_query($con,$queryTask);

                            $TaskNum = mysqli_num_rows($Taskresult);

                            if($TaskNum > 0) {

                            if ($Taskresult) : ?>

                            <?php  while($rowTask=mysqli_fetch_array($Taskresult)) :?>

                            <div class="col-xl-4 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <?php 

                                        if ($rowTask['task_completed'] == "No") { ?>
                                        <div class="badge badge-warning float-right">Pending</div>
                                        <p class="text-warning text-uppercase font-size-12 mb-2"><span class="text-dark text-capitalize font-weight-bold mr-2">by</span><?php echo $rowTask['postedby']; ?></p>
                                       <?php } else { ?>
                                        <div class="badge badge-success float-right">Completed</div>
                                        <p class="text-success text-uppercase font-size-12 mb-2"><span class="text-dark text-capitalize font-weight-bold mr-2">by</span><?php echo $rowTask['postedby']; ?></p>
                                      <?php } ?>
                                        <h5 class="mt-4"><a href="view-task?viewtask=<?php echo $rowTask['id']; ?>" class="text-dark"><?php echo $rowTask['title']; ?></a></h5>
                                        <p class="text-muted mb-4"><?php echo excerpt($rowTask['task_details'], 0, '150'); ?></p>
                                        
                                        <div>
                                            <h6 class="font-weight-bold">Assigned To</h6>
                                            <?php if ($rowTask['task_image'] == 0) { ?>
                                                <div class="avatar-sm font-weight-bold d-inline-block">
                                                    <span
                                                        class="avatar-title rounded-circle bg-soft-success text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $rowTask['task_assignto'];  ?>">
                                                        <?php echo substr($rowTask['task_assignto'], 0, 1);?>
                                                    </span>
                                                </div>
                                            <?php } else { ?>
                                                <img src="uploads/<?php echo $rowTask['task_image']; ?>" class="avatar-sm m-1 rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $rowTask['task_assignto'];  ?>" alt="<?php echo $rowTask['title'];?>" />

                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="row align-items-center">
                                            <div class="col-sm-auto">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item pr-2">
                                                        <a href="javascript: void(0);" class="text-muted d-inline-block"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Date posted">
                                                            <i class="uil uil-calender mr-1"></i> <?php echo date('M d', strtotime($rowTask['task_date'])); ?>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item pr-2">
                                                        <?php if ($rowTask['task_completed'] == 'Yes') { ?>
                                                        <div class="badge badge-success font-size-13 font-weight-normal" data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Completed">Completed</div>
                                                         <?php } else { ?>
                                                        <a href="javascript: void(0);" class="text-muted d-inline-block"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Due date">
                                                            <i class="uil uil-calender mr-1"></i> <?php echo date('M d', strtotime($rowTask['task_duedate'])); ?>
                                                        </a>
                                                        <?php } ?>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="view-task?viewtask=<?php echo $rowTask['id']; ?>" class="badge badge-danger">
                                                             <i class="uil uil-sign-out-alt mr-1 d-inline"></i>View
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        <?php endwhile ?>
                        <?php else : ?>
                            <div class="col-md-12">
                                <div class="card mt-5">
                                    <div class="card-body text-center font-weight-bold">
                                      <p class="font-size-16">No Task Completed Yet</p>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php } else { ?>

                          <div class="col-md-12">
                                <div class="card mt-5">
                                    <div class="card-body text-center font-weight-bold">
                                      <p class="font-size-16">No Task found</p>
                                    </div>
                                </div>
                            </div>
                      <?php } ?>
                        </div>
                        <!-- end row -->

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