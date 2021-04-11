<?php require 'reset-password.inc.php';  ?>

<!DOCTYPE html>
<html lang="en">
    
<?php $GLOBALS['titlehead'] = "Reset Password | PHP Hosipital"; require 'components/authentic-headers.php'; ?>


<?php  

  $selector = $_GET["selector"];
  $validator = $_GET["validator"];

      if (empty($selector) || empty($validator)) {

        $_SESSION['message']= "Unauthorized Page";
        $_SESSION['msgtype'] = "danger";
        header("Location: forgot-password");

      } else {

        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) { ?>

<h6 class="h4 mb-0 mt-4">Reset your Password</h6>
<p class="text-muted mt-3 mb-4 lead">Please Enter your new password</p>

<form action="reset-password.inc.php" method="POST" class="authentication-form needs-validation" novalidate>
    <div class="form-group">
    <input type="hidden" name="selector" value="<?php echo $selector; ?>">
    <input type="hidden" name="validator" value="<?php echo $validator; ?>">
        <label class="form-control-label">New Password</label>
        <div class="input-group input-group-merge">
            <div class="input-group-prepend">
                <button id="show_password"  type="button" class="input-group-text">
                    <i class="icon-dual" data-feather="eye-off" id="eye_show"></i>
                    <i class="icon-dual" data-feather="eye" id="eye_hide"></i>
                </button>
            </div>
            <input type="password" name="password" class="form-control" id="password"
                placeholder="Enter new your password" required>
        </div>
    </div>

    <div class="form-group mt-4">
        <label class="form-control-label">Confirm Password</label>
        <div class="input-group input-group-merge">
            <div class="input-group-prepend">
                <button id="show_cpassword"  type="button" class="input-group-text">
                    <i class="icon-dual" data-feather="eye-off" id="eye_c_show"></i>
                    <i class="icon-dual" data-feather="eye" id="eye_c_hide"></i>
                </button>
            </div>
            <input type="password" name="cpassword" class="form-control" id="cpassword"
                placeholder="Confirm new password" required>
        </div>
    </div>

    <div class="form-group mt-4 mb-0 text-center">
        <button type="submit" name="resetPwdBtn" class="btn btn-primary btn-block"> ResetPassword
        </button>
    </div>
</form>

 <?php }


      }

  ?>
</div>

</div>

</div> <!-- end card-body -->
<!-- end card -->

<div class="row mt-3">
<div class="col-12 text-center">
<p class="text-muted">Don't have an account? <a href="register" class="text-primary font-weight-bold ml-1">Sign Up</a></p>
</div> <!-- end col -->
</div>
<!-- end row -->

<?php require 'components/authentic-footer.php'; ?>