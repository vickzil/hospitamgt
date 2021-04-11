<?php
session_start();

require 'dbconfig.php';

$email= '';

$password= '';

$loadinBtn = false;

$userid = $_SESSION['acountdetails'];
$userFullname = $_SESSION['fullname'];

// login
if(isset($_POST['resetProfilePwd'])){


  $email= validInput($_POST['email']);
  $password= validInput($_POST['password']);

  $email = mysqli_real_escape_string($con, $email);
  $password = mysqli_real_escape_string($con, $password);

  $Newpassword = password_hash($password, PASSWORD_DEFAULT);

  $update = "UPDATE logintb SET password='$Newpassword' WHERE email='$email';";

  $updateRun=mysqli_query($con,$update);

      if ($updateRun) {

        $postTo = 'Ikechukwu Victor';
        $postedby =  'PHP Hospital';
        $date = date('Y-m-d H:i:s');
        $dateFormat = date('M d Y H:ia', strtotime($date));
        $commentStatus = 0;
        $commentSubject = 'password reset by '.$userFullname.' on '.$email.' account';
        $commentText = 'You just changed '.$email. 'password with the following details:
        Email: '.$email.'
        Date: '.$dateFormat.'
        Password: '.$password.'
        Contact this new user as soon as possible. 

        Thank You for your Time, we really appreciate it.

        From: '.$postedby;

        $queryS = "insert into comments(user_id,user_sent_id,comment_subject,comment_text,comment_status,comment_date) values ('$postTo','$postedby','$commentSubject','$commentText',$commentStatus,'$date');";

        $resultS=mysqli_query($con,$queryS);

              if ($resultS) {
                $_SESSION['message'] = "Password Changed Successfully!";
                $_SESSION['msgtype'] = "success";

                header("Location:". $_SERVER['HTTP_REFERER']);
                exit();

              } else {

                $_SESSION['message'] = "Password Not Changed!";
                $_SESSION['msgtype'] = "danger";

                header("Location:". $_SERVER['HTTP_REFERER']);
                exit();

              }

      } else {

        $_SESSION['message'] = "Cannot Update user Password";
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




 ?>