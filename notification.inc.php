<?php

session_start();

require 'dbconfig.php';

$userid = $_SESSION['acountdetails'];
// User add Notification

if (isset($_POST['addNoti'])) {

  $postTo = $_POST['users_id'];
  $commentSubject = validInput($_POST['comment_subject']);
  $commentText = validInput($_POST['comment_text']);
  $commentSubject= mysqli_real_escape_string($con, $commentSubject);
  $commentText= mysqli_real_escape_string($con, $commentText);
  $dateFormat = date('Y-m-d H:i:s');
  $commentStatus = 0;

  $postedby =  $_SESSION['email'];

      $query = "insert into comments(user_id,user_sent_id,comment_subject,comment_text,comment_status,comment_date) values ('$postTo','$postedby','$commentSubject','$commentText',$commentStatus,'$dateFormat');";

      $result=mysqli_query($con,$query);

	      if ($result) {

	      	$select = "SELECT * FROM logintb WHERE email='$postedby';";
            $selectRun=mysqli_query($con,$select);

            $extractUser = mysqli_fetch_assoc($selectRun);

            $posterEmail = $extractUser['profileimage'];

	            if ($selectRun) {

	            	$update = "UPDATE comments SET comment_image='$posterEmail' WHERE user_sent_id='$postedby';";
	                $updateRun=mysqli_query($con,$update);

		                if ($updateRun) {

		                	$_SESSION['message'] = "Notification Sent!";
						          $_SESSION['msgtype'] = "success";

						          header("Location:". $_SERVER['HTTP_REFERER']);
                      exit();

		                } else {

		                	$_SESSION['message'] = "Cannot Update user Notification";
			                $_SESSION['msgtype'] = "danger"; 

			                header("Location:". $_SERVER['HTTP_REFERER']);
                      exit();

		                }

	            } else {

	            	$_SESSION['message'] = "Cannot select user Notification";
		            $_SESSION['msgtype'] = "danger"; 

		            header("Location:". $_SERVER['HTTP_REFERER']);
                 exit();
	            }


	    } else {

	       $_SESSION['message'] = "Cannot Add Notification";
	       $_SESSION['msgtype'] = "danger"; 

	       header("Location:". $_SERVER['HTTP_REFERER']);
          exit();

	      }

}


if (isset($_POST['replyNoti'])) {

  $postTo = $_POST['users_id'];
  $commentSubject = validInput($_POST['comment_subject']);
  $commentText = validInput($_POST['comment_text']);
  $commentSubject= mysqli_real_escape_string($con, $commentSubject);
  $commentText= mysqli_real_escape_string($con, $commentText);
  $dateFormat = date('Y-m-d H:i:s');
  $commentStatus = 0;

  $postedby =  $_SESSION['email'];


  $LoginSelect = "SELECT * FROM logintb WHERE email='$postTo';";
  $LoginRun=mysqli_query($con,$LoginSelect);

  $LoginUser = mysqli_fetch_assoc($LoginRun);
  $LoginName = $LoginUser['fullname'];

  if ($LoginRun) {


  	$query = "insert into comments(user_id,user_sent_id,comment_subject,comment_text,comment_status,comment_date) values ('$LoginName','$postedby','$commentSubject','$commentText',$commentStatus,'$dateFormat');";

      $result=mysqli_query($con,$query);

	      if ($result) {

	      	$select = "SELECT * FROM logintb WHERE email='$postedby';";
            $selectRun=mysqli_query($con,$select);

            $extractUser = mysqli_fetch_assoc($selectRun);

            $posterEmail = $extractUser['profileimage'];

            if ($selectRun) {

            	$update = "UPDATE comments SET comment_image='$posterEmail' WHERE user_sent_id='$postedby';";
                $updateRun=mysqli_query($con,$update);

                if ($updateRun) {

                	$_SESSION['message'] = "Notification Sent!";
				          $_SESSION['msgtype'] = "success";

				          header("Location:". $_SERVER['HTTP_REFERER']);
                 exit();

                } else {

                	$_SESSION['message'] = "Cannot Update user Notification";
	                $_SESSION['msgtype'] = "danger"; 

	                header("Location:". $_SERVER['HTTP_REFERER']);
                 exit();

                }

            } else {

            	$_SESSION['message'] = "Cannot select user Notification";
	            $_SESSION['msgtype'] = "danger"; 

	            header("Location:". $_SERVER['HTTP_REFERER']);
              exit();
            }


	    } else {

	       $_SESSION['message'] = "Cannot Add Notification";
	       $_SESSION['msgtype'] = "danger"; 

	       header("Location:". $_SERVER['HTTP_REFERER']);
          exit();

	      }





  } else {

  	$_SESSION['message'] = "Cannot Initially select user Notification";
	$_SESSION['msgtype'] = "danger"; 

	header("Location:". $_SERVER['HTTP_REFERER']);
  exit();

  }









      

}





function validInput($data) {

  $data = htmlspecialchars($data);
  $data = stripcslashes($data);
  $data = trim($data);

  return $data;

}

