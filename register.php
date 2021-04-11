<?php

require 'register.inc.php';

 ?>

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/shreyu/preview/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Nov 2019 03:38:46 GMT -->
<?php $commponent = 'register'; $GLOBALS['titlehead'] = "Register | PHP Hosipital"; require 'components/authentic-headers.php'; ?>

    <h6 class="h4 mb-0 mt-4">Create your account</h6>
    <p class="text-muted mt-0 mb-4">Create a free account and start using Shreyu</p>

    <form action="register.inc.php" method="POST" class="authentication-form needs-validation" novalidate>
        <div class="form-group">
            <label class="form-control-label">Name</label>
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="icon-dual" data-feather="user"></i>
                    </span>
                </div>
                <input type="text" name="fullname" class="form-control" id="name" value="<?php echo $fullname; ?>" 
                    placeholder="Your full name" required>
            </div>
        </div>

        <div class="row">  
            <div class="form-group col-md-12">
                <label class="form-control-label">Email Address</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-dual" data-feather="mail"></i>
                        </span>
                    </div>
                    <input type="email" name="email" class="form-control" id="email" placeholder="hello@coderthemes.com" value="<?php echo $email; ?>" required>
                </div>
            </div> 
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label class="form-control-label">Username</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-dual" data-feather="at-sign"></i>
                        </span>
                    </div>
                    <input type="text" name="username" class="form-control" id="username" value="<?php echo $username; ?>" required />
                </div>
            </div>
            

            <div class="form-group col-md-6">
                <label class="form-control-label">Phone</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-dual" data-feather="phone"></i>
                        </span>
                    </div>
                    <input type="tel" name="phone" class="form-control" value="<?php echo $phone; ?>" placeholder="Mobile Phone" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label class="form-control-label">Password</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <button id="show_password"  type="button" class="input-group-text">
                            <i class="icon-dual" data-feather="eye-off" id="eye_show"></i>
                            <i class="icon-dual" data-feather="eye" id="eye_hide"></i>
                        </button>
                    </div>
                    <input type="password" class="form-control" id="password" name="password" 
                        placeholder="Enter your password" required>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label class="form-control-label">Confirm Password</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <button id="show_cpassword"  type="button" class="input-group-text">
                            <i class="icon-dual" data-feather="eye-off" id="eye_c_show"></i>
                            <i class="icon-dual" data-feather="eye" id="eye_c_hide"></i>
                        </button>
                    </div>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" 
                        placeholder="Enter your password" required>
                </div>
            </div>
        </div>

        <div class="form-group mb-4 mt-2">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"
                    id="checkbox-signup" required>
                <label class="custom-control-label" for="checkbox-signup">
                    I accept <a href="javascript: void(0);">Terms and Conditions</a>
                </label>
            </div>
        </div>

        <div class="form-group mb-0 text-center">
            <button class="btn btn-primary btn-block" type="submit" name="registerUser">Sign Up</button>
        </div>
    </form>
</div>
</div>

</div> <!-- end card-body -->

<!-- end card -->

<div class="row">
<div class="col-12 text-center">
<p class="text-muted">Already have account? <a href="login" class="text-primary font-weight-bold ml-1">Login</a></p>
</div> <!-- end col -->
</div>
<!-- end row -->

<?php require 'components/authentic-footer.php'; ?>