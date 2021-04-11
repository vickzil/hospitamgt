<?php 
require 'dbconfig.php';
require 'settings.php';


if (isset($_GET['sendnotification'])) {

  $id = $_GET['sendnotification'];

  $selectUser = "SELECT * FROM logintb WHERE fullname='$id'";

  $executeUser = mysqli_query($con, $selectUser);

  $extractUser = mysqli_fetch_assoc($executeUser);

} else {

    header("Location: ./");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Drop A Note | PHP Hospital"; require 'components/head.php'; ?>
        <!-- Summernote css -->
    <link href="assets/libs/summernote/summernote-bs4.css" rel="stylesheet" />


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
                                    <li class="breadcrumb-item active" aria-current="page">Drop A Note</li>
                                </ol>
                            </nav>
                            <h4 class="mb-1 mt-0">Drop a note to <?php echo $extractUser['fullname']; ?></h4>
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
                                <a href="inbox-notification" class="list-group-item border-0 font-weight-bold">
                                    <i class="uil uil-envelope-alt font-size-15 mr-1"></i>Inbox<span
                                        class="badge badge-danger float-right ml-2 mt-1"><?php echo $inboxRow;  ?></span>
                                </a>

                             <?php

                                // Get All admin users from Login table and display

                                $sentQuery="SELECT * from comments WHERE user_sent_id='$userEmail' ORDER BY comment_date DESC";
                                $sentResult=mysqli_query($con,$sentQuery);

                                $sentRow = mysqli_num_rows($sentResult); ?>

                                <a href="send-notification" class="list-group-item border-0"><i
                                        class="uil uil-envelope-edit font-size-15 mr-1"></i>Sent Mail<span
                                        class="badge badge-info float-right ml-2 mt-1"><?php echo $sentRow;  ?></span></a>
                            </div>

                            <ul class="list-unstyled mt-5">
                                <h5 class="mb-4h5">Users</h5>

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
                            <div class="email-container card">
                                    <div class="card-body">
                                        <form action="notification.inc.php" method="POST" class="needs-validation" name="event-form" id="form-event" novalidate>
                                            <div class="form-group">
                                                <label class="form-label ml-2 font-weight-bold">To</label>

                                                <input type="text" name="users_id" value="<?php echo $extractUser['fullname']; ?>" class="form-control" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label ml-2 font-weight-bold">Subject</label>
                                                <input type="text" name="comment_subject" class="form-control" placeholder="Subject" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label ml-2 font-weight-bold">Notification Message</label>
                                                <textarea rows="10" name="comment_text"class="form-control" placeholder="Here can be your description" required></textarea>

                                            </div>

                                            <div class="form-group mt-4">
                                                <div class="text-right">
                                                    <button type="submit" name="addNoti" class="btn btn-primary"> <span>Send</span> 
                                                        <i class="uil uil-message ml-2"></i> 
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div> <!-- end card-->
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