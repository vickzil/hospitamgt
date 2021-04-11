<?php 
require 'dbconfig.php';
require 'settings.php';

$userfullname = $_SESSION['fullname'];
$profileimage = $_SESSION['profileimage'];

if (isset($_GET['read'])) {

  $id = $_GET['read'];

  $commentUser = "SELECT * FROM comments WHERE comment_id='$id'";

  $executeComment = mysqli_query($con, $commentUser);

  $extractUser = mysqli_fetch_assoc($executeComment);

  $userSub = $extractUser['comment_subject'];

      if ($executeComment) {

         $update = "UPDATE comments SET comment_status=1 WHERE comment_id='$id'";
         $updateRun=mysqli_query($con,$update);
      }

} else {

    header("Location: ./");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Notifications | PHP Hospital"; require 'components/head.php'; ?>


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

                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row page-title">

                        <div class="col-md-12">
                            <nav aria-label="breadcrumb" class="float-right mt-1">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="./" class="text-info">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Notifications</li>
                                </ol>
                            </nav>
                            <h4 class="mb-1 mt-0">Read Notifications</h4>
                        </div>
                    </div>

                    <?php 




                      ?>

                    <div class="row mt-5">
                        <div class="col-md-3 card">

                            <?php

                            $userid = $_SESSION['acountdetails'];
                            $userEmail = $_SESSION['email'];

                            // Get All admin users from Login table and display

                            $inboxQuery="SELECT * FROM comments WHERE user_sent_id !='$userEmail' AND user_id='$userName' ORDER BY comment_date DESC ";

                            $inboxResult=mysqli_query($con,$inboxQuery);

                            $inboxRow = mysqli_num_rows($inboxResult); ?>

                            <div class="mail-list mt-4">
                                <a href="drop-notification" class="btn btn-danger text-light font-weight-bold mb-4 btn-block">Compose</a>

                                <a href="inbox-notification" class="list-group-item border-0 font-weight-bold">
                                    <i class="uil uil-envelope-alt font-size-15 mr-1"></i>Inbox<span
                                        class="badge badge-danger float-right ml-2 mt-1"><?php echo $inboxRow;  ?></span>
                                </a>

                             <?php

                                // Get All admin users from Login table and display

                                $sentQuery="SELECT * from comments WHERE user_sent_id='$userEmail' ORDER BY comment_date DESC";
                                $sentResult=mysqli_query($con,$sentQuery);

                                $sentRow = mysqli_num_rows($sentResult); ?>

                                <a href="send-notification" class="list-group-item border-0 font-weight-bold"><i
                                        class="uil uil-envelope-edit font-size-15 mr-1"></i>Sent Mail<span
                                        class="badge badge-info float-right ml-2 mt-1"><?php echo $sentRow;  ?></span></a>
                            </div>

                            <ul class="list-unstyled mt-5">
                                <h5 class="mb-4h5">Users</h5>

                                <?php

                                // Get All admin users from Login table and display
                                $userid = $_SESSION['acountdetails'];

                                $queryUser="SELECT * FROM logintb WHERE acountdetails !='$userid' AND  authoritycode !='$ot'";
                                $resultUser=mysqli_query($con,$queryUser);

                                while($rowUser=mysqli_fetch_array($resultUser)) :  ?>

                                    <li class="py-2">
                                        <a href="send-user-notifaction?sendnotification=<?php echo $rowUser['fullname'];?>" class="chat">
                                            <div class="media">
                                                <div class="text-center mr-3">
                                                    <?php if ($rowUser['profileimage'] == 0) { ?>
                                                        <div class="avatar-sm font-weight-bold d-inline-block">
                                                            <span
                                                                class="avatar-title rounded-circle bg-soft-success text-success">
                                                                <?php echo substr($rowUser['fullname'], 0, 1);?>
                                                            </span>
                                                        </div>
                                                    <?php } else { ?>
                                                        <img src="uploads/<?php echo $rowUser['profileimage']; ?>" class="avatar-sm rounded-circle" alt="<?php echo $rowUser['fullname'];?>" />

                                                    <?php } ?>
                                                </div>
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-15 mt-0 mb-1"><?php echo $rowUser['fullname'];?> 
                                                    <?php if ($rowUser['active'] == 1) { ?>
                                                        <i class="fa fa-circle ml-1" style="color: #00ff00; font-size: 11px;"></i>
                                                    <?php } else { ?>
                                                        <i class="fa fa-circle" style="color: #ddd; font-size: 11px;"></i>
                                                    <?php } ?>
                                                    </h5>
                                                    <?php if ($rowUser['skill_intro']) { ?>
                                                    <p class="text-muted font-size-13 text-truncate mb-0"><?php echo $rowUser['skill_intro'];?></p>
                                                    <?php } else { ?>
                                                    <p class="text-muted font-size-13 text-truncate mb-0">No Position Yet</p>
                                                    <?php } ?>
                                                </div>

                                            </div>
                                        </a>
                                    </li>
                                <?php endwhile ?>
                            </ul>
                        </div>

                        <div class="col-md-9">
                            <div class="email-container card">

                                    <div class="mt-2 card-body">
                                        <h5 class="font-weight-bold"><?php echo $extractUser['comment_subject']; ?></h5>

                                        <hr />

                                        <div class="media mb-4 mt-1">
                                            <?php 
                                            if ($extractUser['comment_image']) { ?>
                                                <img class="d-flex mr-2 rounded-circle avatar-sm"
                                                src="uploads/<?php echo $extractUser['comment_image']; ?>" alt="Generic placeholder image">

                                          <?php  } else { ?>
                                                <div class="avatar-sm font-weight-bold d-inline-block mr-3">
                                                    <span
                                                        class="avatar-title rounded-circle bg-soft-success text-success" style="text-transform: uppercase;">
                                                        <?php echo substr($extractUser['user_sent_id'], 0, 1);?>
                                                    </span>
                                                </div>
                                          <?php } ?>
                                        


                                            <div class="media-body">
                                                <span class="float-right"><?php echo date('M d Y H:ia', strtotime($extractUser['comment_date'])); ?></span>
                                                <h6 class="m-0 font-13" style="font-size: 13px;"><b>To:</b> <?php echo $userfullname; ?></h6>
                                                <p class="text-muted mt-1" style="font-size: 12px;"><b>From:</b> <?php echo $extractUser['user_sent_id']; ?></p>
                                            </div>
                                        </div>

                                        <div class="text-muted text-ront">
                                            <?php echo nl2br($extractUser['comment_text']); ?>
                                        </div>

                                        <br>

                                        <hr />
                                        <br>

                                        <h5>Reply</h5>

                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                <form action="notification.inc.php" method="POST" class="needs-validation" name="event-form" id="form-event" novalidate>
                                                    <div class="form-group">
                                                        <label class="form-label ml-2 font-weight-bold">To</label>
                                                        <input type="text" name="users_id" class="form-control" value="<?php echo $extractUser['user_sent_id']; ?>" readonly>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="form-label ml-2 font-weight-bold">Subject</label>
                                                        <input type="text" name="comment_subject" class="form-control" value="RE: <?php echo $extractUser['comment_subject']; ?>" placeholder="Subject" required style="font-weight: bold;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label ml-2 font-weight-bold">Notification Message</label>
                                                        <textarea rows="10" name="comment_text"class="form-control" placeholder="Reply message to <?php echo $extractUser['user_sent_id']; ?> " required></textarea>

                                                    </div>

                                                    <div class="form-group mt-4">
                                                        <div class="text-right">
                                                            <button type="submit" name="replyNoti" class="btn btn-primary"> <span>Send</span> 
                                                                <i class="uil uil-message ml-2"></i> 
                                                            </button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>

                                    </div> <!-- card-box -->
                                <!-- end right sidebar -->
                                <div class="clearfix"></div>
                            </div>
                        </div> <!-- end Col -->

                        
                    </div><!-- End row -->
                </div> <!-- container-fluid -->

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