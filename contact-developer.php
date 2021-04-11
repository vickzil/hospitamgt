<?php 
require 'settings.php';
require 'index-files.php';

  $name = '';
  $email = '';
  $message = '';
  $msg = '';
  $msgClass = '';
  $allowedForm = true;

  $dateFormat = date('Y-m-d H:i:s');

    if (filter_has_var(INPUT_POST, 'contactSubmit')) {
      
      $name = validInput($_POST['name']);
      $email = validInput($_POST['email']);
      $message = validInput($_POST['message']);


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $msg = 'Please use a valid email';
          $msgClass = 'alert-danger';
          $allowedForm = false;

        }  


        else{

          $toEmail = 'contact@victornwakwue.info';
          $subject = 'Contact submission from '.$email;
          $body = '<p>Sending from PHP Hospital project on'.$dateFormat.'</p>
                   <p>'.$message.'</p>

          ';

          $headers = "MIME-Version: 1.0" ."\r\n";
          $headers = "Content-Type:text/html;charset=UTF-8" ."\r\n";

          $headers .= "From: " .$name. "<".$email.">". "\r\n";

          if (mail($toEmail, $subject, $body, $headers)) {
               
               $msg = 'Your Message Has Been Sent';
               $msgClass = 'alert-success';
               $allowedForm = true;
               header('Location: contact-thank-you?thankyou='.$name);
          
          }else{
          
          $msg = 'Email Not Sent';
          $msgClass = 'alert-danger';
          $allowedForm = false;

          }

        }

     


    }
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Contact Developer | PHP Hospital"; require 'components/head.php'; ?>

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
                                        <li class="breadcrumb-item active" aria-current="page">Contact-developer</li>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Contact Developer</h4>
                            </div>
                        </div>

                        <!-- content -->

                    <div class="row mt-4">
                        <div class="col-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                   <?php if ($msg !=''): ?>
                                      <div class="alert <?php echo $msgClass; ?> my-3">
                                        <button data-dismiss="alert" class="close text-light">&times;</button>
                                        <?php echo $msg; ?>
                                        </div>
                                    <?php endif; ?>
                                  <div class="heading mb-4 mt-2">
                                    <p class="lead mt-4">I love talking with like-minded people and businesses, working together to make the world a better place. If you're interested in chatting or want to Hire me, drop me a line and I'll get back to you as soon as I can.</p>
                                  </div>
                                  <form action="contact-developer.php" method="POST" class="needs-validation" name="event-form" id="form-event" novalidate>

                                    <div class="row">
                                      <input type="hidden" id="patId" name="id">
                                        <div class="col-md-12 form-group mb-4">
                                          <input type="hidden" id="row_id">
                                          <label class="form-label">Fullname <span class="form-required text-danger">*</span></label>
                                          <input type="text" required class="form-control" id="fname" name="name" placeholder="Enter your name" value="<?php echo $name; ?>">
                                        </div>
                                        <div class="col-md-12 form-group mb-4">
                                          <label class="form-label">E-mail <span class="form-required text-danger">*</span></label>
                                          <input type="email" id="femail"  class="form-control" required name="email" placeholder="Enter your email" value="<?php echo $email; ?>" >
                                        </div>

                                        <div class="col-md-12 form-group mb-4">
                                          <label class="form-label">Message <span class="form-required text-danger">*</span></label>
                                          <textarea rows="5" name="message"class="form-control" placeholder="Give me a review, Hire me or just contact me." required><?php echo $message; ?></textarea>
                                        </div>
                                    </div>

                                        <div class=" form-group text-right">
                                          <button type="submit" name="contactSubmit" class="btn btn-info">
                                            <span>Send</span> 
                                            <i class="uil uil-message ml-2"></i>
                                          </button>
                                        </div>                 
                                  </form>
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                                <!-- end row-->
                        

                        


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