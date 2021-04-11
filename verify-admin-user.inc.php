<?php
session_start();

require 'dbconfig.php';

$userid = $_SESSION['acountdetails'];
$userFullname = $_SESSION['fullname'];

// login
if(isset($_POST['verifyAdminUser'])){

	$fullname = validInput($_POST['fullname']);
	$verify = validInput($_POST['verify']);
    $authoritycode = validInput($_POST['authoritycode']);

    $fullname = mysqli_real_escape_string($con, $fullname);
  	$authoritycode = mysqli_real_escape_string($con, $authoritycode);

    if (empty($authoritycode)) {

     $_SESSION['message'] = "Authority code is required!";
     $_SESSION['msgtype'] = "danger";
     header("Location:". $_SERVER['HTTP_REFERER']);
     exit();

   } else {

      $sql = "SELECT * FROM logintb WHERE acountdetails='$userid'";
      $proccess = mysqli_query($con,$sql);

      $fetch = mysqli_fetch_assoc($proccess);

          if (!empty($fetch['authoritycode']) && $authoritycode == $fetch['authoritycode']) {

            $query = "UPDATE logintb SET verified='$verify' WHERE fullname='$fullname' LIMIT 1";
            $result=mysqli_query($con,$query);

                if($result) {

                	$sqlSelect = "SELECT * FROM logintb WHERE fullname='$fullname'";
      				$proccessQuery = mysqli_query($con,$sqlSelect);

      				$fetchAll = mysqli_fetch_assoc($proccessQuery);

      				$verifyUserEmail = $fetchAll['email'];
              $verifyUserFullname = $fetchAll['fullname'];
      				$verifyUserAddress = $fetchAll['address'];


	      				if ($proccessQuery) {


	      					$postTo = 'Ikechukwu Victor';
					        $postedby =  'PHP Hospital';
					        $date = date('Y-m-d H:i:s');
					        $dateFormat = date('M d Y H:ia', strtotime($date));
					        $commentStatus = 0;
					        $commentSubject = $userFullname.' Just verified '.$verifyUserEmail.' account';
					        $commentText = $userFullname.'  Verified '.$verifyUserEmail. ' with the following details:
					        Fullnmae: '.$fullname.'
					        Email: '.$verifyUserEmail.'
					        Verify: '.$verify.'
					        Date: '.$dateFormat.'
					        Address: '.$verifyUserAddress.'
					        Contact this new user as soon as possible. 

					        Thank You for your Time, we really appreciate it.

					        From: '.$postTo;

					        $queryS = "insert into comments(user_id,user_sent_id,comment_subject,comment_text,comment_status,comment_date) values ('$postTo','$postedby','$commentSubject','$commentText',$commentStatus,'$date');";
					        $resultS=mysqli_query($con,$queryS);

					        	if ($resultS) {

                        $posterImage = $fetch['profileimage'];
                        $postedby = $fetch['email'];
                        $postedName = $fetch['fullname'];
                        $postTo = $verifyUserFullname;
                        $commentSubject = $postedName.' Just verified your account';
                        $commentText = $postedName.'  Verified '.$verifyUserEmail. ' on '.$dateFormat;
                        $commentStatus = 0;
                        

                        $query = "insert into comments(user_id,user_sent_id,comment_subject,comment_text,comment_status,comment_date,comment_image) values ('$postTo','$postedby','$commentSubject','$commentText',$commentStatus,'$dateFormat','$posterImage');";

                        $result=mysqli_query($con,$query);

                        if ($result) {


                          $_SESSION['message'] = $fullname." Verified!";
                          $_SESSION['msgtype'] = "success";

                          header("Location:". $_SERVER['HTTP_REFERER']);
                          exit();



                        } else {

                          $_SESSION['message'] = $fullname." Not Verified!";
                          $_SESSION['msgtype'] = "danger";

                          header("Location:". $_SERVER['HTTP_REFERER']);
                          exit();

                        }
					                

					            } else {

					                $_SESSION['message'] = $fullname." Not Verified!";
					                $_SESSION['msgtype'] = "danger";

					                header("Location:". $_SERVER['HTTP_REFERER']);
					                exit();

					             }


	      				} else {

	      					$_SESSION['message']= "Cannot Find Admin name";
                     		$_SESSION['msgtype']= "danger"; 

                     		header("Location:". $_SERVER['HTTP_REFERER']);
                      		exit();


	      				}


                 } else {

                     $_SESSION['message']= "Cannot Verify Admin";
                     $_SESSION['msgtype']= "danger"; 

                     header("Location:". $_SERVER['HTTP_REFERER']);
                      exit();

                  }

            
          } else {

             $_SESSION['message']= "Wrong Code, Not Authorized!";
             $_SESSION['msgtype']= "danger"; 

             header("Location:". $_SERVER['HTTP_REFERER']);
                 exit();

      }

   }

  }



  function validInput($data) {

  $data = htmlspecialchars($data);
  $data = stripcslashes($data);
  $data = trim($data);

  return $data;

}