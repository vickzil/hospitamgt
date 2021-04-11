<?php

require 'login.inc.php';

 ?>

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/shreyu/preview/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Nov 2019 03:38:46 GMT -->
<?php $GLOBALS['titlehead'] = "Message | PHP Hosipital"; require 'components/authentic-headers.php'; ?>

<?php  

  $email = $_GET["reset"];

      if (empty($email)) {

        $_SESSION['message']= "Unauthorized Page";
        $_SESSION['msgtype'] = "danger";
        header("Location: forgot-password");

      } else { ?>

    <h6 class="h4 mb-0 mt-4">Password Recovering</h6>
    <p class="text-muted mt-4 mb-1 lead">An email has been sent to your email address. Please click on the link sent to reset your password</p>
    <div class="text-center lead text-dark mt-4 mb-5">
        Send me back to <a href="./login" class="text-primary">Login</a> Page.
      </div>

  <?php } ?>


</div>
</div>

</div> <!-- end card-body -->

<!-- end card -->

<?php require 'components/authentic-footer.php'; ?>