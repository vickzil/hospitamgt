<?php 

function excerpt($str, $startPos =0, $maxLength=100) {

    if (strlen($str) > $maxLength) {

        $excerpt = substr($str, $startPos, $maxLength-3);
        $lastSpace = strrpos($excerpt, ' ');
        $excerpt = substr($excerpt, 0, $lastSpace);
        $excerpt .= '...';
    } else {

        $excerpt = $str;
    }

    return $excerpt;

    
}

?>


<div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
    <div class="container-fluid">
        <!-- LOGO -->
        <a href="./" class="navbar-brand mr-0 mr-md-2 logo">
            <span class="logo-lg">
                <span class="d-inline h5 ml-1 text-logo" id="text-logo">Hospital MGT</span>
            </span>
            <span class="logo-sm">
                <img src="assets/images/favicon.png" alt="" height="24">
            </span>
        </a>

        <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
            <li class="">
                <button class="button-menu-mobile open-left disable-btn">
                    <i data-feather="menu" class="menu-icon"></i>
                    <i data-feather="x" class="close-icon"></i>
                </button>
            </li>
        </ul>

        <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">

            <?php 

            $userid = $_SESSION['acountdetails'];
            $userName = $_SESSION['fullname'];
            $userEmail = $_SESSION['email'];

             // Get All Notifications from comment table and display

            $Query="SELECT * FROM comments WHERE user_sent_id !='$userEmail' AND user_id='$userName' AND comment_status=0";

            $Result=mysqli_query($con,$Query);

            $commentRaw = mysqli_num_rows($Result);

            $Row = mysqli_fetch_array($Result);

            $counter = $Row['comment_status'] == '0';

             if ($counter > 0) {?>
                  <li class="dropdown notification-list" data-toggle="tooltip" data-placement="left"
            title="<?php echo $commentRaw++; ?> new Notifications">
            <?php } else{ ?>
                  
                  <li class="dropdown notification-list" data-toggle="tooltip" data-placement="left"
            title="0 new Notification">

            <?php } ?>


            
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                    aria-expanded="false">
                    <i data-feather="bell"></i>

                    <?php

                    if ($Row['comment_status'] == '0') :?>
                        <span class="noti-icon-badge count"></span>
                    <?php endif ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title border-bottom">
                        <h5 class="m-0 font-size-16">
                            Notification
                        </h5>
                    </div>

                     <?php

                        $commentQuery="SELECT * FROM comments WHERE user_sent_id !='$userEmail' AND user_id='$userName' ORDER BY comment_status ASC, comment_date DESC  LIMIT 3";

                        $commentResult=mysqli_query($con,$commentQuery);

                        $commentRow = mysqli_num_rows($commentResult);


                         if($commentRow > 0) { ?>

                        <div class="slimscroll noti-scroll showNotifications">

                        <?php while($commentRow=mysqli_fetch_array($commentResult)) :  ?>

                            <?php if ($commentRow['comment_status'] == '0'): ?>

                        <!-- item-->
                        <a href="read-notification?read=<?php echo $commentRow['comment_id']; ?>" class="dropdown-item notify-item border-bottom">
                            <?php 

                            if ($commentRow['comment_image']) { ?>
                            <div class="notify-icon">
                                <img src="uploads/<?php echo $commentRow['comment_image']; ?>" class="img-fluid rounded-circle" alt="" />
                            </div>

                            <?php } else { ?>
                               <div class="notify-icon bg-primary"><i class="uil uil-user-plus"></i></div>

                            <?php } ?>
                            

                            <p class="notify-details font-weight-bold"><?php echo excerpt($commentRow['comment_subject'], 0, '50'); ?>.<small class="text-muted"><?php echo date('M d Y H:ia', strtotime($commentRow['comment_date'])); ?></small>
                            </p>
                        </a>
                        <?php else : ?>

                        <a href="read-notification?read=<?php echo $commentRow['comment_id']; ?>" class="dropdown-item notify-item border-bottom">
                            <?php

                            if ($commentRow['comment_image']) { ?>
                            <div class="notify-icon">
                                <img src="uploads/<?php echo $commentRow['comment_image']; ?>" class="img-fluid rounded-circle" alt="" />
                            </div>

                            <?php } else { ?>
                               <div class="notify-icon bg-primary"><i class="uil uil-user-plus"></i></div>

                            <?php } ?>
                            <p class="notify-details"><?php echo excerpt($commentRow['comment_subject'], 0, '50'); ?>.<small class="text-muted"><?php echo date('M d Y H:ia', strtotime($commentRow['comment_date'])); ?></small>
                            </p>
                        </a>

                        <?php endif; ?>

                        <?php endwhile ?>

                        </div>
                        <a href="all-notifications" class="dropdown-item text-center text-primary notify-item notify-all border-top">
                        View all
                        <i class="fi-arrow-right"></i>
                        </a>

                        <?php } else { ?>
                        <div class="slimscroll noti-scroll showNotifications">
                            <div class="text-center ">No Notifications found</div>
                        </div>

                        <?php } ?>

                </div>
            </li>

            <li class="dropdown notification-list" data-toggle="tooltip" data-placement="left" title="Theme Settings">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle">
                    <i data-feather="settings"></i>
                </a>
            </li>

            <li class="notification-list">
                <a href="javascript:void(0);" class="nav-link" data-toggle="modal" data-target="#logoutModal">
                    <i data-feather="log-out"></i>
                </a>
            </li>
        </ul>
    </div>

</div>