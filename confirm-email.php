<?php

require 'login.inc.php';

 ?>

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/shreyu/preview/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Nov 2019 03:38:46 GMT -->
<?php $commponent = 'login'; $GLOBALS['titlehead'] = "Confirm E-mail | PHP Hosipital"; require 'components/authentic-headers.php'; ?>

<?php  

  $error = $_GET["error"];

      if (empty($error)) {

        $_SESSION['message']= "Unauthorized Page";
        $_SESSION['msgtype'] = "danger";
        header("Location: login");

      } else { ?>

    <h6 class="h4 mb-0 mt-4">Verify your email</h6>
    <p class="text-muted mt-4 mb-1 lead">Your account have not been Verified. Please verify your account by clicking on the link we just sent to your email [<?php echo $error; ?>] . Or check your spam messages!</p>
    <div class="text-center lead text-dark mt-5 mb-5">
        Send me back to <a href="./login" class="text-primary">Login</a> Page.
     </div>


     <?php } ?>


</div>
</div>

</div> <!-- end card-body -->

<!-- end card -->

<?php require 'components/authentic-footer.php'; ?>