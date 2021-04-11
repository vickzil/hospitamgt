<?php 
require 'dbconfig.php';
require 'settings.php';

$patEdit = false;

$userid = $_SESSION['acountdetails'];

$select = "SELECT * FROM logintb WHERE acountdetails='$userid'";
$execute = mysqli_query($con, $select);

$extract = mysqli_fetch_assoc($execute);

$otCode = $extract['authoritycode'];

if (empty($otCode)) { 

   header("Location: ./");
   
    } else {


    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <?php $GLOBALS['title'] = "Visitors | PHP Hospital"; require 'components/head.php'; ?>

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
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
                            <div class="col-md-12">
                                <nav aria-label="breadcrumb" class="float-right mt-1">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="./" class="text-info">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">visitors</li>
                                    </ol>
                                </nav>
                                <h4 class="mb-1 mt-0">Visitors</h4>
                            </div>
                        </div>

                        <!-- content -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-5">
                                <div class="card-body">

                                    <?php


                                    // inserting new visitors to database

                                    $visitor_Ip = $_SERVER['REMOTE_ADDR'];


                                    // select visitors
                                    $visitorSelect = "SELECT * FROM visitors WHERE ip_address='$visitor_Ip' ";
                                    $VisitorSqlRun = mysqli_query($con,$visitorSelect);
                                    if (!$VisitorSqlRun) {
                                        die("Retrieving Error".$visitorSelect);
                                    }

                                    $Visitorr=mysqli_num_rows($VisitorSqlRun);

                                    if ($Visitorr < 1) {
                                        $visitorSelect = "INSERT INTO visitors(ip_address) VALUES('$visitor_Ip')";
                                        $VisitorSqlRun = mysqli_query($con,$visitorSelect);
                                    }

                                    $Select = "SELECT * FROM visitors ";
                                    $VisitorSql = mysqli_query($con,$Select);

                                    $Visitorrow=mysqli_num_rows($VisitorSql);


                                    ?>
                                    
                                    <div class="media p-3">
                                        <div class="media-body">
                                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">Unique Visitors</span>
                                            <h2 class="mb-0 text-primary"> <?php echo $Visitorrow; ?> <i class="fa fa-eye text-success"></i></h2>
                                            
                                        </div>
                                        <div class="align-self-center">
                                            <?php

                                            $sql = "SELECT id FROM visitors ORDER BY id";
                                            $sqlRun = mysqli_query($con,$sql);
                                            $row=mysqli_num_rows($sqlRun);

                                            $docPercentage = '150';

                                            $totalDocPer = ($row / 100) * $docPercentage;

                                            ?>

                                            <i class="fa fa-user-plus fa-3x mr-2 text-primary"></i>

                                            <?php

                                            if ($totalDocPer > '50') { ?>
                                                <span class="text-success font-weight-bold font-size-13"><i class='uil uil-arrow-up'></i> <?php echo $totalDocPer; ?>%</span>
                                          <?php  } else { ?>

                                            <span class="text-danger font-weight-bold font-size-13"><i class='uil uil-arrow-down'></i> <?php echo $totalDocPer; ?>%</span>

                                          <?php } ?>
                                        </div>
                                    </div>





                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->

                        <div class="col-md-12">
                            <div class="email-container bg-transparent">
                                <ul class="message-list">
                                    <?php

                                    $userid = $_SESSION['acountdetails'];
                                    $userEmail = $_SESSION['email'];

                                    // Get All admin users from Login table and display

                                    $commentQuery="SELECT * FROM visitors ORDER BY visit_date DESC ";

                                    $commentResult=mysqli_query($con,$commentQuery);

                                    $commentRow = mysqli_num_rows($commentResult);


                                     if($commentRow > 0) {

                                    while($commentRow=mysqli_fetch_array($commentResult)) :  ?>

                                    <li class="unread">
                                        <div class="col-mail col-mail-1">
                                            <span class="star-toggle uil uil-star"></span>
                                            <a href="delete-count?deletecount=<?php echo $commentRow['id']; ?>">
                                                <span class="star-toggle uil-trash text-danger"></span>
                                            </a>
                                        </div>
                                        <div class="col-mail col-mail-2" style="overflow: hidden;">
                                            <span class="subject">IP ADDRESS:  
                                                <?php echo $commentRow['ip_address']; ?>
                                            </span>
                                            <div class="date" id="date"><?php echo date('M d Y H:ia', strtotime($commentRow['visit_date'])); ?></div>
                                        </div>
                                    </li>



                                    <?php endwhile ?>
                                     <?php } ?>
                                </ul>


                            </div>
                        </div>
                    </div>
                    <!-- end row-->
                        

                        


                    </div>
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