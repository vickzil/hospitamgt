<?php 
require 'dbconfig.php';
require 'settings.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Profile | PHP Hospital"; require 'components/head.php'; ?>


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
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                            <h4 class="mb-1 mt-0">My Profile</h4>
                        </div>
                    </div>

                        <div class="row mt-4">
                            <div class="col-md-8 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="my-profile row mt-3">
                                            <div class="col-md-3">
                                                <?php if ($user['profileimage'] == 0) { ?>
                                                <center>
                                                    <img src="uploads/profile2.png" onclick="triggerClick()" class="img-fluid img-thumbnail" style="cursor: pointer;" id="profileDisplay">
                                                </center>
                                                <?php } else { ?>
                                                <center>
                                                    <img src="uploads/<?php echo $user['profileimage']; ?>" onclick="triggerClick()" class="img-fluid img-thumbnail" id="profileDisplay" style="cursor: pointer;">
                                                </center>
                                                <?php } ?>
                                                <center>
                                                    <small class="text-muted d-block mt-1">click on the image to upload photo</small>
                                                </center>

                                                <form action="form.php" method="POST" id="form_image" class="form-inline mt-4 text-center" enctype="multipart/form-data" name="formimage">
                                                    <div class=" form-group text-center">
                                                        <input name="Profilefile" onchange="displayImage(this)" type="file" id="file_input" class="btn btn-outline-dark btn-sm" required style="display: none;">
                                                    </div>
                                                    
                                                    <?php if ($_SESSION['email'] != 'adminuser@mail.com') { ?>
                                                    <div class=" form-group m-auto">
                                                        <button type="submit" id="" name="uploadProfileImage" class="btn btn-success btn-sm file_btn"> Upload</button>
                                                    </div>
                                                <?php } else {?>
                                                    <div class=" form-group m-auto">
                                                        <small>Sorry You are not authorized to upload profile image</small>
                                                    </div>
                                                <?php } ?>
                                                </form>

                                            </div>

                                            <div class="col-md-9" id="mobile_profile_top">
                                                <div class="form-group">
                                                    <label class="form-label text-dark small font-weight-bold">FULLNAME: </label>
                                                    <input type="text" value="<?php echo $user['fullname']; ?>" class="form-control form-control-md" style="text-transform: capitalize;" disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label text-dark small font-weight-bold">USERNAME: </label>
                                                    <input type="text" value="<?php echo $user['username']; ?>" class="form-control form-control-md" disabled>
                                                </div>              
                                            </div>
                                        </div>

                                            <div class="form-group">

                                                <?php

                                                if ($user['skill_intro']) { ?>
                                                <label class="form-label text-dark small font-weight-bold">POSITION: </label>

                                                <h6 class="text-muted font-weight-normal mt-2 mb-0"><?php echo $user['skill_intro'];?>
                                                </h6>

                                            <?php } ?>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark small font-weight-bold">E-MAIL: </label>
                                                <input type="text" value="<?php echo $user['email']; ?>" class="form-control form-control-md" disabled>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark small font-weight-bold">PHONE: </label>
                                                <input type="text" value="<?php echo $user['phone']; ?>" class="form-control form-control-md" style="text-transform: capitalize;" disabled>
                                            </div>

                                            <?php 

                                            if ($user['address']) { ?>

                                            <div class="form-group">
                                                <label class="form-label text-dark small font-weight-bold">ADDRESS: </label>
                                                <input type="text" value="<?php echo $user['address']; ?>" class="form-control form-control-md" style="text-transform: capitalize;" disabled>
                                            </div>

                                            <?php } ?>

                                            <div class="form-group">
                                                <?php 

                                                if ($user['dob']) { ?>

                                                <label class="form-label text-dark small">DATE OF BIRTH: </label>

                                                <input type="text" name="dob" class="form-control" value="<?php echo $user['dob']; ?>" disabled/>

                                                <?php } ?>

                                            </div>

                                            <div class="form-group">
                                                <?php 

                                                if ($user['state']) { ?>
                                                    <label class="form-label text-dark small font-weight-bold">STATE: </label>
                                                    <input type="text" name="state" class="form-control" value="<?php echo $user['state']; ?>" disabled />

                                                <?php } ?>

                                            </div>


                                              <?php

                                              $userDate = $user['datecreated'];
                                              $userDate = strtotime($userDate);
                                              $userDate = date('M d Y m:ia', $userDate);


                                              ?>

                                            <div class="form-group mt-4">
                                                <label class="form-label text-dark small">REGISTRATION DATE: </label>
                                                <input type="text" value="<?php echo $userDate;  ?>" class="form-control form-control-md" style="text-transform: capitalize;" disabled>
                                            </div>

                                            <div class="form-group mt-4">
                                                <label class="form-label text-dark small">LAST LOGIN TIME: </label>
                                                <input type="text" value="<?php echo $user['lastlogin'];  ?>" class="form-control form-control-md" style="text-transform: capitalize;" disabled>
                                            </div>

                                            <?php 

                                            if ($user['lastlogoff']) { ?>

                                            <div class="form-group mt-4">
                                                <label class="form-label text-dark small">LAST LOGOUT TIME: </label>
                                                <input type="text" value="<?php echo $user['lastlogoff'];  ?>" class="form-control form-control-md" style="text-transform: capitalize;" disabled>
                                            </div>

                                            <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12"> 

                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label mb-4 text-dark">SKILLS:</label>
                                        <?php if ($user['skills'] == Null) { ?>
                                            <p class="">You do not have any Skills added Yet! Please click on edit profile to add your Skills</p>
                                        <?php } else { ?>
                                            <div class=" pt-2 border-top">
                                                <?php 

                                                $skillsArrays = explode(",", $user['skills']);

                                                foreach ($skillsArrays as $skillsArray) { ?>
                                                    <label class="badge badge-soft-primary">
                                                    <?php echo $skillsArray; ?>
                                                    </label>
                                               <?php }


                                                ?>
                                                
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label mb-4 text-dark">ABOUT ME:</label>
                                        <?php if ($user['bio'] == Null) { ?>
                                            <p class="">You don't have any Bio Yet! Please click on edit profile to add your Bio</p>
                                        <?php } else { ?>
                                        <p><?php echo nl2br($user['bio']); ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

    </body>

</html>