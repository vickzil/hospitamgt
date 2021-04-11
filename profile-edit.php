<?php 
require 'dbconfig.php';
require 'settings.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Profile | PHP Hospital"; require 'components/head.php'; ?>
        <link rel="stylesheet" type="text/css" href="assets/css/tag.css">
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
                        <form action="profile.inc.php" method="POST" class="needs-validation" name="event-form" id="form-event" autocomplete="off" novalidate>
                            
                            <div class="row page-title">
                                <div class="col-md-12">
                                    <nav aria-label="breadcrumb" class="float-right mt-1">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="./" class="text-info">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                                        </ol>
                                        <button type="submit" class="btn btn-dark btn-sm mt-4 font-size-16" name="updateProfile">Update Profile><i
                                                    class="uil uil-location-arrow ml-2"></i></button>
                                    </nav>
                                    <h4 class="mb-1 mt-0">Edit Profile</h4>
                                </div>

                            </div>

                            <div class="row mt-4">
                                <div class="col-md-7 col-sm-12">
                                    <div class="card">
                                        <div class="card-body">              

                                            <div class="form-group mt-4">
                                                <label class="form-label text-dark small font-weight-bold">WORK POSITION: </label>

                                                <input type="text" name="skill_intro"class="form-control" placeholder="work Position" value="<?php echo $user['skill_intro']; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark small font-weight-bold">PHONE: </label>
                                                <input type="text" name="phone" value="<?php echo $user['phone']; ?>" class="form-control form-control-md" />
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark small font-weight-bold">ADDRESS: </label>
                                                <input type="text" name="address" value="<?php echo $user['address']; ?>" class="form-control form-control-md" style="text-transform: capitalize;">
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark small">DATE OF BIRTH: </label>

                                                <input type="date" name="dob" class="form-control" value="<?php echo $user['dob']; ?>" />

                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark small font-weight-bold">STATE: </label>
                                                <input type="text" name="state" class="form-control" placeholder="eg; Lagos" value="<?php echo $user['state']; ?>" />

                                            </div>

                                            <div class="form-group">
                                                <label class="form-label text-dark small font-weight-bold">NATIONALITY: </label>
                                                <input type="text" name="nationality" placeholder="eg; Nigeria" class="form-control" value="<?php echo $user['nationality']; ?>" />

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-sm-12"> 
                                    <div class="card">
                                        <div class="card-body">
                                            <label class="form-label mb-4 text-dark">ABOUT ME:</label>
                                            <textarea rows="10" name="bio"class="form-control" placeholder="Here can be your description"><?php echo $user['bio']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <label class="form-label mb-3 text-dark">SKILLS:</label> <br>
                                            <small class="mb-4">Add comma , to separate skills</small>
                                            <div class="form-group mt-3">
                                                
                                              <input type="text" name="skills" value="<?php echo $user['skills']; ?>" data-role="tagsinput" class="form-control mt-3" placeholder="Add skill" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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