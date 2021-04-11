<?php

require 'login.inc.php';


  $error = $_GET["thankyou"];

if (!empty($error)) {




} else {

$_SESSION['message']= "Unauthorized Page";
$_SESSION['msgtype'] = "danger";
header("Location: login");

}
 ?>

<!DOCTYPE html>
<html lang="en">
    

<?php $GLOBALS['titlehead'] = "Thank You | PHP Hosipital"; require 'components/authentic-headers.php'; ?>

    <h6 class="h4 mb-0 mt-4">Thank you <?php echo $error; ?> for registering</h6>
    <p class="text-muted mt-4 mb-1 lead">Your account has been successfully registered. To complete the verification process, please check your email for a validation request</p>
    <div class="text-center lead text-dark mt-4 mb-5">
        Send me back to <a href="./login" class="text-primary">Login</a> Page.
      </div>


</div>
</div>

</div> <!-- end card-body -->

<!-- end card -->

<?php require 'components/authentic-footer.php'; ?>