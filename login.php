<?php require 'login.inc.php';  ?>

<!DOCTYPE html>
<html lang="en">
    
<?php $GLOBALS['titlehead'] = "Login | PHP Hosipital"; require 'components/authentic-headers.php'; ?>

<h6 class="h4 mb-0 mt-4">Welcome back!</h6>
<p class="text-muted mt-1 mb-4">Enter your email address and password to
    access admin panel.</p>
    
<form action="login.inc.php" method="POST" class="authentication-form needs-validation" novalidate>
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

    <div class="form-group mt-4">
        <label class="form-control-label">Password</label>
        <a href="forgot-password" class="float-right text-primary ml-1">Forgot your password?</a>
        <div class="input-group input-group-merge">
            <div class="input-group-prepend">
                <button id="show_password"  type="button" class="input-group-text">
                    <i class="icon-dual" data-feather="eye-off" id="eye_show"></i>
                    <i class="icon-dual" data-feather="eye" id="eye_hide"></i>
                </button>
            </div>
            <input type="password" name="password" class="form-control" id="password"
                placeholder="Enter your password" required>
        </div>
    </div>

    <div class="form-group mt-4 mb-0 text-center">
        <button type="submit" name="loginBtn" class="btn btn-primary btn-block"> Log In
        </button>
    </div>
</form>
</div>

</div>

</div> <!-- end card-body -->
<!-- end card -->

<div class="row mt-3 px-3">
<div class="col-12 text-center">
<p class="text-muted">Don't have an account? <a href="register" class="text-primary font-weight-bold ml-1">Sign Up</a></p>
<p class="text-left">Login With this:</p>
<p class="text-left">
    <b>Email:</b> adminuser@mail.com <br>
    <b>Password:</b> 1234
</p>
</div> <!-- end col -->
</div>
<!-- end row -->


<?php require 'components/authentic-footer.php'; ?>