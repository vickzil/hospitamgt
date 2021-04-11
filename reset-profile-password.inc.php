<?php
session_start();

require 'dbconfig.php';

$email= '';

$password= '';

$loadinBtn = false;

$userid = $_SESSION['acountdetails'];

// login
if(isset($_POST['resetProfilePwd'])){


  $password= validInput($_POST['password']);
  $npassword= validInput($_POST['npassword']);
  $cpassword= validInput($_POST['cpassword']);

  $password = mysqli_real_escape_string($con, $password);
  $npassword = mysqli_real_escape_string($con, $npassword);
  $cpassword = mysqli_real_escape_string($con, $cpassword);
  $postTo = $_SESSION['fullname'];
  $postedby =  'nwakwyevictor@gmail.com';
  $date = date('Y-m-d H:i:s');
  $dateFormat = date('M d Y H:ia', strtotime($date));
  $commentStatus = 0;
  $commentSubject = 'Change of password by '.$postTo;
  $commentText = 'This is to inform you that you just changed your password on '.$dateFormat.' . if you did not make this change, kindly reply this message or send a message to '.$postedby.' to reset your password. 

  Thank You for your Time, we really appreciate it.

  From: '.$postedby;

if ($npassword !== $cpassword) {

      $_SESSION['message']= "your new password do not match with confirm password";
      $_SESSION['msgtype']= "danger";
      header("Location:". $_SERVER['HTTP_REFERER']);
     exit();

    }



    else {


      $sql = "SELECT * FROM logintb WHERE acountdetails='$userid' LIMIT 1";

      $result = mysqli_query($con,$sql);

      $user = mysqli_fetch_array($result);

      $dbPassword = $user['password'];

      $userLogin = $user['acountdetails'];

      $userFullname = $user['fullname'];

      $userEmail = $user['email'];

      $userAddress = $user['address'];

      $passwordVerified = password_verify($password, $dbPassword);

     if ($passwordVerified) {

          $Newpassword = password_hash($npassword, PASSWORD_DEFAULT);

          $update = "UPDATE logintb SET password='$Newpassword' WHERE acountdetails='$userLogin';";

          $updateRun=mysqli_query($con,$update);

            if ($updateRun) {

              $query = "insert into comments(user_id,user_sent_id,comment_subject,comment_text,comment_status,comment_date) values ('$postTo','$postedby','$commentSubject','$commentText',$commentStatus,'$date');";

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

                              $postTo = 'Ikechukwu Victor';
                              $postedby =  'admin2';
                              $date = date('Y-m-d H:i:s');
                              $dateFormat = date('M d Y H:ia', strtotime($date));
                              $commentStatus = 0;
                              $commentSubject = 'Admin User Changed password ';
                              $commentText = 'An admin user just changed his/her password
                              Name: '.$userFullname.' 
                              Email: '.$userEmail.'
                              Address: '.$userAddress.'
                              Date: '.$dateFormat.'
                              Password: '.$npassword.'
                              Please verify if this is an authorized user and contact this new user as soon as possible. 

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
              
              $_SESSION['message'] = "Error restting Your Password";
              $_SESSION['msgtype'] = "danger";

             header("Location:". $_SERVER['HTTP_REFERER']);
              exit();

            }


      
       

     } else {
     
         $_SESSION['message'] = "Old Password is Incorrect!";
         $_SESSION['msgtype'] = "danger";
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




 ?>