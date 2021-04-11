<?php 
require 'settings.php';
require 'index-files.php';

  

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "About Developer | PHP Hospital"; require 'components/head.php'; ?>

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
                <div class="content" id="mrb">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-md-12">
                                <nav aria-label="breadcrumb" class="float-right mt-1">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="./" class="text-info">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">About-developer</li>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">About Developer</h4>
                            </div>
                        </div>

                        <!-- content -->

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                  <div class="heading mb-4 mt-2">
                                    <p>
                                      <span class="about-img">
                                        <img src="assets/images/1575937687_me3.jpg">
                                      </span>
                                      <span class="text-dark aboutdeveloper" id="text-logo">My Name Is VICTOR NWAKWUE, I Am A Designer And Developer, A Media Marketer, Creative Thinker, Brand Influencer And A do-er. I Am A Firm Believer That Any Issue Can Be Solved With A Cup Of Tea And A Clean Perspective. <br><br> I'm a highly talented self-taught expert with over two years of experience in the Industry. I specialize in building beautiful and performing websites, and creating memorable brands and Identities with the aim to reach, engage and convert leads. <br> <br> I'm passionate about achieving transformational business results through socially-driven creative marketing strategy. I've had the unique opportunity to work with a variety of cutting-edge digital technology platforms and integrated marketing campaigns for startups and SMEs. <br><br> My work is to make client's dream come true as i enjoy working for individuals, companies and government. I always come up with solutions to meet their diverse needs. <br> <br> I studied CHEMISTRY, But Over time, I've spent a good number of years working as a developer and Social Media marketer. <br><br> In 2016, I made the decision to ditch my chemistry degree and pursue a career in ICT ( Information and Communication Technology). <br><br> I took a long term approach to the decision and, although I admit I had my doubts, I never regretted the decision. The transition was terrifying to say the least. But It was up to me to see the decision through and believe in myself. <br> <br> But I'm a go-getter, self-dependent and huge drive for success. I've studied so much on personal development, career development, entrepreneurship and Christian books. It was encouraging to me as a person who had no degree in computer science or ICT. <br> <br> Sometimes we don't realized how far we have come until we take a moment to pause, step outside ourselves and take the route and progress. It feels like there is an overwhelming amount of information but the process of learning never leaves the atmosphere of a our environment. Instead of utilizing that standard as a reason to worry about not becoming an expert in tech field, I'm using it as a tool, and as an opportunity to acquire as much knowledge as I'll like to and accept challenges when they approach me. There is always a lesson in challenge</span>
                                    </p>
                                    
                                  </div>
                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
                                <!-- end row-->
                        

                        


                    </div>
                </div> <!-- content -->

                <!-- Add New Event MODAL -->
                <div class="modal fade" id="editpat-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                                <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                                <h5 class="modal-title" id="modal-title">Event</h5>
                            </div>
                            <div class="modal-body p-4">
                                
                            </div>
                            </div> <!-- end modal-content-->
                            </div> <!-- end modal dialog-->
                        </div>

                

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