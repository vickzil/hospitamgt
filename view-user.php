<?php 
require 'dbconfig.php';
require 'settings.php';



  if (isset($_GET['viewprofile'])) {

  $id = $_GET['viewprofile'];

  $selectUser = "SELECT * FROM logintb WHERE fullname='$id'";

  $executeUser = mysqli_query($con, $selectUser);

  $extractUser = mysqli_fetch_assoc($executeUser);

} else {

    header("Location: ./");
}

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

                      <?php 





                      ?>

                      <div class="row page-title">
                        <div class="col-md-12">
                            <nav aria-label="breadcrumb" class="float-right mt-1">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="./" class="text-info">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $extractUser['fullname']; ?></li>
                                    </ol>
                                </nav>
                            <h4 class="mb-1 mt-0" style="text-transform: capitalize;"><?php echo $extractUser['fullname']; ?>'s Profile</h4>
                        </div>
                    </div>

                        <div class="row mt-3" id="text-logo">
                            <div class="col-md-8 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="my-profile row ">
                                            <div class="col-md-3">
                                                <?php if ($extractUser['profileimage'] == 0) { ?>
                                                <center>
                                                    <img src="uploads/profile2.png" class="img-fluid img-thumbnail">
                                                </center>
                                                <?php } else { ?>
                                                <center>
                                                    <img src="uploads/<?php echo $extractUser['profileimage']; ?>"  class="img-fluid img-thumbnail">
                                                </center>
                                                <?php } ?>
                                                <center>
                                            </div>

                                            <div class="col-md-9" id="mobile_profile_top">
                                                <div class="form-group">
                                                    <label class="form-label text-dark font-weight-bold">FULLNAME: </label>
                                                    <h5 class=" font-weight-normal mt-1 mb-3" style="font-family: font-family: 'Kotta One', sans-serif;"><?php echo $extractUser['fullname']; ?></h5>
                                                </div>

                                                <div class="form-group">
                                                  <label class="form-label text-dark font-weight-bold">POSITION: </label>
                                                    <?php

                                                if ($extractUser['skill_intro']) { ?>
                                                <h6 class="text-muted font-weight-normal mt-1 mb-3"><?php echo $extractUser['skill_intro'];?></h6>
                                                  <?php } else { ?>
                                                  <h6 class="text-muted font-weight-normal mt-1 mb-3">No Position Yet</h6>
                                                  <?php } ?>
                                                </div>              
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-4">

                                            <div class="form-group">
                                                <label class="form-label text-dark font-weight-bold">PHONE: </label>
                                                <h6 class="text-muted font-weight-normal mt-1 mb-3"><?php echo $extractUser['phone']; ?></h6>
                                            </div>

                                            <?php 

                                            if ($extractUser['address']) { ?>

                                            <div class="form-group">
                                                <label class="form-label text-dark font-weight-bold">ADDRESS: </label>
                                                <h6 class="text-muted font-weight-normal mt-1 mb-3"><?php echo $extractUser['address']; ?></h6>
                                            </div>

                                            <?php } ?>


                                            <div class="form-group">
                                                <?php 

                                                if ($extractUser['age']) { ?>

                                                    <label class="form-label text-dark font-weight-bold">AGE: </label>
                                                    <h5 class="text-muted font-weight-normal mt-1 mb-3"><?php echo $extractUser['age']; ?></h5>
                                                <?php } ?>

                                            </div>

                                            <div class="form-group">
                                                <?php 

                                                if ($extractUser['state']) { ?>
                                                    <label class="form-label text-dark font-weight-bold">STATE: </label>
                                                    <h6 class="text-muted font-weight-normal mt-1 mb-3"><?php echo $extractUser['state']; ?></h6>

                                                <?php } ?>

                                            </div>


                                              <?php

                                              $userDate = $extractUser['datecreated'];
                                              $userDate = strtotime($userDate);
                                              $userDate = date('M d Y m:ia', $userDate);


                                              ?>

                                            <div class="form-group mt-4">
                                                <label class="form-label text-dark">REGISTRATION DATE: </label>
                                                <h6 class="text-muted font-weight-normal mt-1 mb-3"><?php echo $userDate; ?></h6>
                                            </div>

                                            <div class="form-group mt-4">
                                                <label class="form-label text-dark">LAST LOGIN TIME: </label>
                                                <h6 class="text-muted font-weight-normal mt-1 mb-3"><?php echo $extractUser['lastlogin']; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-12"> 

                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label mb-4 text-dark font-weight-bold">SKILLS:</label>
                                        <?php if ($extractUser['skills'] == Null) { ?>
                                            <p class=""><?php echo $extractUser['fullname']; ?> do not have any Skill added Yet!</p>
                                        <?php } else { ?>
                                            <div class=" pt-2 border-top">
                                                <?php 

                                                $skillsArrays = explode(",", $extractUser['skills']);

                                                foreach ($skillsArrays as $skillsArray) { ?>
                                                    <label class="badge h5 badge-soft-primary">
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
                                        <label class="form-label mb-4 text-dark font-weight-bold" style="text-transform: uppercase;"> <?php echo $extractUser['fullname']; ?>'s BIO:</label>
                                        <?php if ($extractUser['bio'] == Null) { ?>
                                            <p class=""><?php echo $extractUser['fullname']; ?> do not have any Bio Yet!</p>
                                        <?php } else { ?>
                                        <p><?php echo nl2br($extractUser['bio']); ?></p>
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