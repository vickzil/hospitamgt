<?php 
require 'settings.php';
require 'index-files.php';

// if the link on the Url of the site contains 'thankyou', then proccess this page, if not, redirect user to front page

if (isset($_GET['thankyou'])) {

  $id = $_GET['thankyou'];
 // get all the variables from the get array
  $postTo = 'Ikechukwu Victor';
  $postedby =  $id;
  $date = date('Y-m-d H:i:s');
  $dateFormat = date('M d Y H:ia', strtotime($date));
  $commentStatus = 0;
  $commentSubject = 'Contact form submit From '.$postedby;
  $commentText = 'This is to inform you that '.$postedby .' Sent You a mail on '.$dateFormat.' .Check your email address to view the message. Please do well to contact him as soon as possible. 

  Thank You for your Time, we really appreciate it.

  From: '.$postedby;
 // run the query by inserting the data into database
  $query = "insert into comments(user_id,user_sent_id,comment_subject,comment_text,comment_status,comment_date) values ('$postTo','$postedby','$commentSubject','$commentText',$commentStatus,'$date');";
  
// Execute the requery
  $result=mysqli_query($con,$query);


} else {

    header("Location: ./");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $GLOBALS['title'] = "Thank You | PHP Hospital"; require 'components/head.php'; ?>
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
                                        <li class="breadcrumb-item active" aria-current="page">message-sent</li>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Thank You</h4>
                            </div>
                        </div>

                        <!-- content -->

                    <div class="row mt-5">
                        <div class="col-8 m-auto">
                            <div class="card mt-5">
                                <div class="card-body">
                                  <div class="text-center">
                                    <div class="mb-3">
                                        <i class="uil uil-check-square text-success h2"></i>
                                    </div>
                                    <h3>Thank you !</h3>

                                    <p class="w-75 mt-2 mx-auto text-muted lead">Thank You <?php echo $id; ?> for contacting me. I will get back to you as soon as I can.</p>
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
                                
                            </div>
                            </div> <!-- end modal-content-->
                            </div> <!-- end modal dialog-->
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