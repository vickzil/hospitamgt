<?php 
require 'settings.php';
require 'index-files.php';


if (isset($_GET['viewtask'])) {

  $id = $_GET['viewtask'];

  $taskUser = "SELECT * FROM tasks WHERE id='$id'";

  $executeTask = mysqli_query($con, $taskUser);

  $extracTask = mysqli_fetch_assoc($executeTask);

  $taskId = $extracTask['id'];
  $taskTitle = $extracTask['title'];
  $taskDate = $extracTask['task_date'];
  $taskPostedby = $extracTask['postedby'];
  $taskDetails = $extracTask['task_details'];
  $taskSkill = $extracTask['task_skill'];
  $taskAssignedTo = $extracTask['task_assignto'];
  $taskImage = $extracTask['task_image'];
  $taskBudget = $extracTask['task_budget'];
  $taskDuedate = $extracTask['task_duedate'];
  $taskCompleted = $extracTask['task_completed'];



} else {

    header("Location: ./");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Tasks | PHP Hospital"; require 'components/head.php'; ?>
        <link rel="stylesheet" type="text/css" href="assets/css/tag.css">

        <style>
            .display_none {
                display: none;
            }
        </style>

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
                                <h4 class="mb-1 mt-0">
                                    Task
                                     <?php if ($taskCompleted == 'Yes') { ?>
                                    <div class="badge badge-success font-size-13 font-weight-normal">Completed</div>
                                     <?php } else { ?>
                                    <div class="badge badge-warning font-size-13 font-weight-normal">Pending</div>
                                    <?php } ?>
                                </h4>
                            </div>
                            <div class="col-md-9 col-xl-6 text-md-right">
                                <div class="mt-4 mt-md-0">
                                    <div class="btn-group mb-3 mb-sm-0 mt-0">
                                    <form action="task.inc.php" method="POST" class="form-inline">
                                        <input type="hidden" name="id" value="<?php echo $taskId; ?>">
                                        <select id="singid" name="singid" onchange="this.form.submit();" class="form-control" required>
                                            <option>Select action</option>
                                            <option value="Yes">Completed</option>
                                            <option value="No">Pending...</option>
                                        </select>
                                    </form>
                                </div>
                                    <div class="btn-group ml-1">
                                        <a href="javascript:void(0);" class="btn btn-soft-primary btn-sm mr-2" data-toggle="modal" data-target="#EditTaskmodal"><i
                                            class="uil uil-edit mr-1"></i>Edit</a>
                                         <a href="javascript:void(0);" class="btn btn-soft-danger btn-sm" data-toggle="modal" data-target="#deletethistask"><i
                                            class="uil uil-trash-alt mr-1"></i>Delete</a>
                                    </div>
                                    <div class="btn-group ml-1">
                                        <a href="javascript:window.history.back();" class="btn btn-white ml-2"><i
                                            class="uil uil-corner-up-left-alt mr-1"></i>Back</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="deletethistask" tabindex="-1" role="dialog" aria-lablledby="logoutModalLable" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header text-light" style="background: #17174a;">
                                <h3 class="text-light">Delete Task</h3>
                                <button data-dismiss="modal" class="close text-light" style="color: #fff;">&times;</button>
                              </div>
                              <div class="modal-body">
                                <p>
                                 Are you sure you want to delete this task with title: <span class="text-success font-weight-bold"> "<?php  echo $taskTitle;   ?>"</span>
                                </p>
                                <div class="btn-list">
                                  <a href="task.inc.php?deletestask=<?php  echo $taskId; ?>" class="btn btn-danger">Yes</a>
                                  <button class="btn btn-outline-dark" data-dismiss="modal" type="button">No, thanks</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- widgets -->

    

                        <!-- details-->
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="mt-0">About Task</h3>

                                        <h4 class="mt-0"><?php echo $taskTitle; ?></h4>

                                        <div class="text-muted mt-3">
                                            <?php echo nl2br($taskDetails); ?>
                                            

                                            <?php if ($taskSkill) { ?>
                                            <div class="tags mt-4">
                                                <h6 class="font-weight-bold">Skills Tags</h6>
                                                <div class="text-uppercase">
                                                    <?php 

                                                    $skillsArrays = explode(",", $taskSkill);

                                                    foreach ($skillsArrays as $skillsArray) { ?>
                                                        <label class="badge badge-soft-primary mr-2">
                                                        <?php echo $skillsArray; ?>
                                                        </label>
                                                   <?php }


                                                    ?>
                                                </div>
                                            </div>
                                            <?php } ?>


                                            <div class="row">
                                                <div class="col-lg-3 col-md-6">
                                                    <div  class="mt-4">
                                                        <p class="mb-2"><i class="uil-calender text-danger"></i> Start Date</p>
                                                        <h5 class="font-size-16"><?php echo date('d M, Y', strtotime($taskDate)); ?></h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="mt-4">
                                                        <p class="mb-2"><i class="uil-calendar-slash text-danger"></i> Due Date</p>
                                                        <?php if ($taskCompleted == 'Yes') { ?>
                                                        <div class="badge badge-success font-size-13 font-weight-normal">Completed</div>
                                                         <?php } else { ?>
                                                        <h5 class="font-size-16"><?php echo date('d M, Y', strtotime($taskDuedate)); ?></h5>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="mt-4">
                                                        <p class="mb-2"><i class="uil-dollar-alt text-danger"></i> Budget</p>
                                                        <h5 class="font-size-16"><span>&#8358;</span><?php echo $taskBudget; ?></h5>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6">
                                                    <div class="mt-4">
                                                        <p class="mb-2"><i class="uil-user text-danger"></i> Assign By</p>
                                                        <h5 class="font-size-16"><?php echo $taskPostedby; ?></h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="assign team mt-4 mb-4">
                                                <h6>Assign To</h6>
                                                <?php if ($taskImage == 0) { ?>
                                                <div class="avatar-sm font-weight-bold d-inline-block">
                                                    <span
                                                        class="avatar-title rounded-circle bg-soft-success text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $taskTitle;  ?>">
                                                        <?php echo substr($taskAssignedTo, 0, 1);?>
                                                    </span>
                                                </div>
                                            <?php } else { ?>
                                                <img src="uploads/<?php echo $taskImage; ?>" class="avatar-sm m-1 rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $taskAssignedTo;  ?>" alt="<?php echo $taskTitle;?>" />

                                            <?php } ?>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="mt-0 font-weight-bold">Task Activities</h6>
                                        <ul class="list-unstyled activity-widget">

                                            <?php  

                                            $queryTask="SELECT * FROM tasks WHERE id !='$taskId' ORDER BY task_date DESC LIMIT 7";
                                            $Taskresult=mysqli_query($con,$queryTask);

                                             while($rowTask=mysqli_fetch_array($Taskresult)) :?>




                                            <li class="activity-list">
                                                <div class="media">
                                                    <a href="view-task?viewtask=<?php echo $rowTask['id']; ?>">
                                                    <div class="text-center mr-3">
                                                        <div class="avatar-sm">
                                                            <?php 
                                                            if ($rowTask['task_completed'] == "No") { ?>
                                                            <span class="avatar-title rounded-circle bg-soft-warning text-warning"><?php echo date('d', strtotime($rowTask['task_date'])); ?></span>
                                                            <?php } else { ?>
                                                            <span class="avatar-title rounded-circle bg-soft-success text-success"><?php echo date('d', strtotime($rowTask['task_date'])); ?></span>
                                                            <?php } ?>
                                                        </div>
                                                        <p class="text-muted font-size-13 mb-0"><?php echo date('M', strtotime($rowTask['task_date'])); ?></p>
                                                    </div>
                                                    <div class="media-body overflow-hidden">
                                                        <a href="view-task?viewtask=<?php echo $rowTask['id']; ?>">
                                                        <h5 class="font-size-15 mt-2 mb-1 text-dark"><?php echo $rowTask['task_assignto']; ?></h5>
                                                        <p class="text-muted font-size-13 text-truncate mb-0"><?php echo $rowTask['title']; ?></p>
                                                        </a>
                                                    </div>
                                                    </a>
                                                </div>

                                            </li>
                                            <?php endwhile ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- Edit Task MODAL -->
                        <div class="modal fade" id="EditTaskmodal" tabindex="-1">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header py-3 px-4 border-bottom-0 d-block bg-success">
                                  <button type="button" class="close text-light" data-dismiss="modal"
                                  aria-hidden="true" style="color: #fff;">&times;</button>
                                  <h5 class="modal-title text-light" id="modal-title">Edit Task</h5>
                              </div>
                              <div class="modal-body p-4">
                                <form action="task.inc.php" method="POST" class="needs-validation" name="event-form" id="form-event" novalidate>
                                    <div class="form-group">
                                      <label class="form-control-label">Task Titile<span class="form-required text-danger">*</span></label>
                                      <input type="hidden" name="id" value="<?php echo $taskId; ?>">
                                      <input type="text" name="title" value="<?php echo $taskTitle; ?>" class="form-control" id="title" required>
                                   </div>
                                   <div class="row">
                                     <div class="form-group col-md-6">
                                        <label class="form-control-label">Task Due Date<span class="form-required text-danger">*</span></label>
                                        <input type="date" name="duedate" value="<?php echo $taskDuedate; ?>" id="duedate" class="form-control" required>
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label class="form-control-label">Task Assigned To<span class="form-required text-danger">*</span></label>
                                        <select id="assignedto" name="assignedto" class="form-control" required>
                                        <option value="<?php echo $taskAssignedTo; ?>"><?php echo $taskAssignedTo; ?></option>

                                          <?php
                                          $userfnmae = $_SESSION['fullname'];
                                          // $ot = '82855555';

                                          $query="SELECT * FROM logintb WHERE fullname !='$userfnmae' AND authoritycode !='$ot' AND fullname !='$taskAssignedTo' ";

                                          $result=mysqli_query($con,$query);

                                          while($row=mysqli_fetch_array($result)) {

                                            $fullname=$row['fullname'];
                                            $acountdetails=$row['acountdetails'];

                                            echo '<option value="'.$fullname.'">'.$fullname. '</option>';
                                          } ?>
                                        </select>
                                     </div>
                                   </div>
                                   <div class="row">
                                     <div class="form-group col-md-6">
                                        <label class="form-control-label">Task Budget<span class="form-required text-danger">*</span></label>
                                        <input type="text" id="budget" value="<?php echo $taskBudget; ?>" name="budget" class="form-control" required>
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label class="form-control-label">Developer Skills<span class="form-required text-danger">*</span></label>
                                        <input type="text" id="skills" value="<?php echo $taskSkill; ?>" name="skills" data-role="tagsinput" class="form-control mt-3" required  />
                                     </div>
                                     </div>

                                     <div class="row">
                                       <div class="form-group col-md-12">
                                          <label class="form-control-label">Task Details<span class="form-required text-danger">*</span></label>
                                          <textarea rows="7" id="taskdetails" name="taskdetails" class="form-control" required><?php echo $taskDetails; ?></textarea>
                                       </div>
                                     </div>
                                  <div class="form-group mt-4 text-right">
                                    <button type="submit" name="updateSingleTask" class="btn btn-success" >
                                      <span>Update</span> 
                                      <i class="uil uil-message ml-2"></i> 
                                    </button>  
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
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

    <script>
        $('#singid option:nth-child(1)').attr('hidden', 'hidden');
    </script>

</html>