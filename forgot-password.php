<?php require 'login.inc.php';  ?>

<!DOCTYPE html>
<html lang="en">
    
<?php $commponent = 'Password'; $GLOBALS['titlehead'] = "Forgot Password | PHP Hosipital"; require 'components/authentic-headers.php'; ?>

<h6 class="h4 mb-0 mt-4">Recover Password</h6>
<p class="text-muted mt-3 mb-5">
    Enter your email address and we'll send you an email with instructions to reset your password.
</p>

<form action="forgot.ini.php" method="POST" class="authentication-form needs-validation" novalidate>
    <div class="form-group">
        <label class="form-control-label">Email Address</label>
        <div class="input-group input-group-merge">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="icon-dual" data-feather="mail"></i>
                </span>
            </div>
            <input type="email" name="email" class="form-control" id="email" placeholder="hello@coderthemes.com" required>
        </div>
    </div>

    <div class="form-group mt-4 mb-0 text-center">
        <button type="submit" name="forgotPasswordBtn" class="btn btn-primary btn-block"> Submit
        </button>
    </div>
</form>
</div>

</div>

</div> <!-- end card-body -->
<!-- end card -->

<?php require 'components/authentic-footer.php'; ?>