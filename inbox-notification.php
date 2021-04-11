<?php 
require 'dbconfig.php';
require 'settings.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Inbox Notification | PHP Hospital"; require 'components/head.php'; ?>
        <!-- Summernote css -->
    <link href="assets/libs/summernote/summernote-bs4.css" rel="stylesheet" />


    </head>

<?php  
require 'body.php';

?>
<body  class="<?php echo $userTheme; ?>" data-left-keep-condensed="true">

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
                                    <li class="breadcrumb-item active" aria-current="page">Inbox Notifications</li>
                                </ol>
                            </nav>
                            <h4 class="mb-1 mt-0">Inbox Notifications</h4>
                        </div>
                    </div>

                    <div class="row">
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
                                <a href="inbox-notification" class="list-group-item border-0 text-danger font-weight-bold">
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
                                <h5 class="mb-4 font-weight-bold">Users</h5>

                                <?php

                                // Get All admin users from Login table and display
                                $userid = $_SESSION['acountdetails'];

                                $query="SELECT * FROM logintb WHERE acountdetails !='$userid' AND  authoritycode !='$ot'";
                                $result=mysqli_query($con,$query);

                                while($row=mysqli_fetch_array($result)) :  ?>

                                    <li class="py-2">
                                        <a href="send-user-notifaction?sendnotification=<?php echo $row['fullname'];?>" class="chat">
                                            <div class="media">
                                                <div class="text-center mr-3">
                                                    <?php if ($row['profileimage'] == 0) { ?>
                                                        <div class="avatar-sm font-weight-bold d-inline-block">
                                                            <span
                                                                class="avatar-title rounded-circle bg-soft-success text-success">
                                                                <?php echo substr($row['fullname'], 0, 1);?>
                                                            </span>
                                                        </div>
                                                    <?php } else { ?>
                                                        <img src="uploads/<?php echo $row['profileimage']; ?>" class="avatar-sm rounded-circle" alt="<?php echo $row['fullname'];?>" />

                                                    <?php } ?>
                                                </div>
                                                <div class="media-body overflow-hidden">
                                                    <h5 class="font-size-15 mt-0 mb-1"><?php echo $row['fullname'];?> 
                                                    <?php if ($row['active'] == 1) { ?>
                                                        <i class="fa fa-circle ml-1" style="color: #00ff00; font-size: 11px;"></i>
                                                    <?php } else { ?>
                                                        <i class="fa fa-circle" style="color: #ddd; font-size: 11px;"></i>
                                                    <?php } ?>
                                                    </h5>
                                                    <?php if ($row['skill_intro']) { ?>
                                                    <p class="text-muted font-size-13 text-truncate mb-0"><?php echo $row['skill_intro'];?></p>
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

                        <div class="col-md-9 col-sm-12">
                            <div class="email-container ">

                                        <ul class="message-list">

                                            <?php

                                            $userid = $_SESSION['acountdetails'];
                                            $userEmail = $_SESSION['email'];

                                            // Get All admin users from Login table and display

                                            $commentQuery="SELECT * FROM comments WHERE user_sent_id !='$userEmail' AND user_id='$userName' ORDER BY comment_date DESC ";

                                            $commentResult=mysqli_query($con,$commentQuery);

                                            $commentRow = mysqli_num_rows($commentResult);


                                             if($commentRow > 0) {

                                            while($commentRow=mysqli_fetch_array($commentResult)) :  ?>

                                                <?php if ($commentRow['comment_status'] == '0'): ?>

                                            <li class="unread font-weight-bold">
                                                <div class="col-mail col-mail-1">
                                                    <span class="star-toggle uil uil-star text-warning"></span>
                                                    <a href="read-notification?read=<?php echo $commentRow['comment_id']; ?>" class="title">From: <?php echo $commentRow['user_sent_id']; ?></a>
                                                </div>
                                                <div class="col-mail col-mail-2" style="overflow: hidden;">
                                                    <a href="read-notification?read=<?php echo $commentRow['comment_id']; ?>" class="subject"> 
                                                        <?php echo excerpt($commentRow['comment_subject'], 0, '50'); ?>
                                                    </a>
                                                    <div class="date" id="date"><?php echo date('M d Y H:ia', strtotime($commentRow['comment_date'])); ?></div>
                                                </div>
                                            </li>

                                            <?php else : ?>

                                            <li class="unread">
                                                <div class="col-mail col-mail-1">
                                                    <span class="star-toggle uil uil-star"></span>
                                                    <a href="read-notification?read=<?php echo $commentRow['comment_id']; ?>" class="title">From: <?php echo $commentRow['user_sent_id']; ?></a>
                                                </div>
                                                <div class="col-mail col-mail-2" style="overflow: hidden;">
                                                    <a href="read-notification?read=<?php echo $commentRow['comment_id']; ?>" class="subject"> 
                                                        <?php echo excerpt($commentRow['comment_subject'], 0, '50'); ?>
                                                    </a>
                                                    <div class="date" id="date"><?php echo date('M d Y H:ia', strtotime($commentRow['comment_date'])); ?></div>
                                                </div>
                                            </li>

                                           <?php endif; ?>

                                            <?php endwhile ?>

                                            <?php } else { ?>

                                            <li class="unread">
                                                <div class="text-center">No Notifications found</div>
                                            </li>

                                            <?php } ?>
                                        </ul>
                                <!-- end inbox-rightbar-->
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
        <!--Summernote js-->
    <script src="assets/libs/summernote/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.summernote').summernote({
                height: 230,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false                 // set focus to editable area after initializing summernote
            });
        });
    </script>

    </body>

</html>