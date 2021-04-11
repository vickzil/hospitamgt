<?php 

session_start();

require 'dbconfig.php';

$userid = $_SESSION['acountdetails'];


// login
if(isset($_POST['DefaultTheme'])){

	$defaultTheme = '';


	$update = "UPDATE logintb SET theme='$defaultTheme' WHERE acountdetails='$userid' LIMIT 1";

	$resultRun = mysqli_query($con, $update);

			if ($resultRun) {
                $_SESSION['message']= "Theme Updated";
                $_SESSION['msgtype'] = "success";
                header("Location:". $_SERVER['HTTP_REFERER']);
                exit();

            } else {

                $_SESSION['message']= "Cannot Change Theme";
                $_SESSION['msgtype'] = "danger";
                header("Location:". $_SERVER['HTTP_REFERER']);
                exit();


            }




}


// Dark Theme
if(isset($_POST['DarkSideTheme'])){

	$defaultTheme = 'left-side-menu-dark';


	$update = "UPDATE logintb SET theme='$defaultTheme' WHERE acountdetails='$userid' LIMIT 1";

	$resultRun = mysqli_query($con, $update);

			if ($resultRun) {
                $_SESSION['message']= "Theme Updated";
                $_SESSION['msgtype'] = "success";
                header("Location:". $_SERVER['HTTP_REFERER']);
                exit();

            } else {

                $_SESSION['message']= "Cannot Change Theme";
                $_SESSION['msgtype'] = "danger";
                header("Location:". $_SERVER['HTTP_REFERER']);
                exit();


            }




}



// Condensed Side Nav Theme
if(isset($_POST['CondensedSideNav'])){

	$defaultTheme = 'left-side-menu-condensed boxed-layout';


	$update = "UPDATE logintb SET theme='$defaultTheme' WHERE acountdetails='$userid' LIMIT 1";

	$resultRun = mysqli_query($con, $update);

			if ($resultRun) {
                $_SESSION['message']= "Theme Updated";
                $_SESSION['msgtype'] = "success";
                header("Location:". $_SERVER['HTTP_REFERER']);
                exit();

            } else {

                $_SESSION['message']= "Cannot Change Theme";
                $_SESSION['msgtype'] = "danger";
                header("Location:". $_SERVER['HTTP_REFERER']);
                exit();


            }




}




