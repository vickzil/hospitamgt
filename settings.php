<?php 

session_start();  

if(!isset($_SESSION['acountdetails']) && !isset($_SESSION['id']) && !isset($_SESSION['loginTime']) ) : header("location: logout.inc.php"); ?>

    <?php elseif ((time() - $_SESSION['loginTime']) > 1400) : header("location: logout.inc.php"); ?>

    <?php elseif ($_SESSION['verified'] == 0) : header("Location: confirm-email?error=".$email); ?>


    <?php elseif ($_SESSION['acountdetails'] == false) : header("location: logout.inc.php"); ?>


     <?php else: ?>

     <?php endif;
     
error_reporting(0);
?>