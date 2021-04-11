<?php  
$ot = '82855555';
$userid = $_SESSION['acountdetails'];

$query="SELECT * FROM logintb WHERE acountdetails='$userid'";

$result = mysqli_query($con,$query); 

$user = mysqli_fetch_array($result);


?>

<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">

        <?php if ($user['profileimage'] == 0) { ?>

            <img src="uploads/profile2.png" class="avatar-sm rounded-circle mr-2" alt="<?php echo $user['fullname'];?>" />
            <img src="assets/images/users/avatar-7.jpg" class="avatar-xs rounded-circle mr-2" alt="<?php echo $user['fullname'];?>" />
        <?php } else { ?>
            <img src="uploads/<?php echo $user['profileimage']; ?>" class="avatar-sm rounded-circle mr-2" alt="<?php echo $user['fullname'];?>" />
            <img src="uploads/<?php echo $user['profileimage']; ?>" class="avatar-xs rounded-circle mr-2" alt="<?php echo $user['fullname'];?>" />

        <?php } ?>

        <div class="media-body">
            <h6 class="pro-user-desc mt-0 mb-0"><?php echo $user['fullname'];?><i class="fa fa-circle ml-2" style="color: #00ff00; font-size: 11px;"></i></h6>
            <?php if ($user['authoritycode'] !== '') { ?>
            <span class="pro-user-desc">Oga Boss</span>
            <?php } else { ?>
            <span class="pro-user-desc">Administrator</span>
            <?php } ?>

        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <a href="profile.php" class="dropdown-item notify-item">
                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                    <span>My Profile</span>
                </a>

                <a href="profile-edit" class="dropdown-item notify-item">
                    <i data-feather="user-plus" class="icon-dual icon-xs mr-2"></i>
                    <span>Edit Profile</span>
                </a>

                <a href="change-password" class="dropdown-item notify-item">
                    <i data-feather="unlock" class="icon-dual icon-xs mr-2"></i>
                    <span>Change Password</span>
                </a>

                <?php

                $userid = $_SESSION['acountdetails'];

                $select = "SELECT * FROM logintb WHERE acountdetails='$userid'";
                $execute = mysqli_query($con, $select);

                $extract = mysqli_fetch_assoc($execute);

                $otCode = $extract['authoritycode'];

                if (!empty($otCode)) { ?>

                <a href="javascript:void(0);" class="dropdown-item notify-item" data-toggle="modal" data-target="#authcodemodal">
                    <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                    <span class="auth_code">Change Authority Code</span>
                </a>

               <?php } ?>

                <div class="dropdown-divider"></div>

                <a href="javascript:void(0);" class="dropdown-item notify-item" data-toggle="modal" data-target="#logoutModal">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">Navigation</li>

                <li>
                    <a href="./">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-wheelchair-alt fa-1x"></i>
                        <span> Patients </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="patient-details"><i class="fa fa-address-card fa-1x mr-2"></i> Patients Details</a>
                        </li>
                        <li>
                            <a href="patient-registration"> <i class="fa fa-user-plus mr-2"></i>Patients Registration</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-credit-card-alt fa-1x"></i>
                        <span> Payment </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="payment-status"><i class="fa fa-credit-card-alt fa-1x mr-2"></i> Payment Status</a>
                        </li>
                        <li>
                            <a href="update-payment"> <i class="fa fa-paper-plane mr-2"></i>Update Payment</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-user-md fa-1x"></i>
                        <span> Doctors </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="add-doctor"> <i class="fa fa-stethoscope mr-2"></i>Add Doctor</a>
                        </li>
                        <li>
                            <a href="doctor-details"><i class="fa fa-user-md fa-1x mr-2"></i> Doctors Details</a>
                        </li>
                        
                    </ul>
                </li>

                <?php

                $userid = $_SESSION['acountdetails'];

                $select = "SELECT * FROM logintb WHERE acountdetails='$userid'";
                $execute = mysqli_query($con, $select);

                $extract = mysqli_fetch_assoc($execute);

                $otCode = $extract['authoritycode'];

                if ($otCode == $userid) { ?>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="users"></i>
                        <span> Admin Users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="all-users"><i class="fa fa-user fa-1x mr-2"></i> All Admin</a>
                        </li>
                        <li>
                            <a href="add-admin-user"><i class="fa fa-user-plus fa-1x mr-2"></i> Add Admin</a>
                        </li>
                        <li>
                            <a href="verify-admin-user"><i class="fa fa-users fa-1x mr-2"></i> Verify Admin</a>
                        </li>
                    </ul>
                </li>

                <?php } ?>

                <li>
                    <a href="javascript: void(0);" aria-expanded="false">
                        <i data-feather="bell"></i>
                        <span> Notifications </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="all-notifications"><i class="fa fa-bell fa-1x mr-2"></i>All Notifications</a>
                        </li>
                        <li>
                            <a href="drop-notification"><i class="fa fa-bullhorn fa-1x mr-2"></i>Drop a Notification</a>
                        </li>
                        <?php
                        if ($otCode == $userid) { ?>
                        <li>
                            <a href="delete-all-notifications"><i class="fa fa-trash fa-1x mr-2"></i>Delete Notifications</a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <?php
                if ($otCode == $userid) { ?>
                <li>
                    <a href="visitors">
                        <i data-feather="pie-chart"></i>
                        <span> Visitors </span>
                    </a>
                </li>
                <?php } ?>

                <li>
                    <a href="javascript: void(0);" aria-expanded="false">
                        <i data-feather="calendar"></i>
                        <span> Tasks </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="tasks"><i class="fa fa-list-alt fa-1x mr-2"></i>All tasks</a>
                        </li>
                        <li>
                            <a href="assigned-task"><i class="fa fa-tasks fa-1x mr-2"></i>Inbox todo task</a>
                        </li>
                        <li>
                            <a href="sent-task"><i class="fa fa-list-ul fa-1x mr-2"></i>Sent task</a>
                        </li>
                    </ul>
                </li>

                <?php
                if ($otCode == $userid) { ?>

                <li>
                    <a href="reset-user-password-admin">
                        <i data-feather="edit-2"></i>
                        <span> Reset User password </span>
                    </a>
                </li>
                <?php } ?>

                <li>
                    <a href="contact-developer">
                        <i data-feather="phone-forwarded"></i>
                        <span> Contact Developer </span>
                    </a>
                </li>

                <li>
                    <a href="about-developer">
                        <i data-feather="user-check"></i>
                        <span> About Developer </span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
