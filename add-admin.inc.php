<?php

session_start();

require 'dbconfig.php';

$date =  date("Y-m-d");

$fullname= '';
$email= '';
$username= '';
$phone= '';
$password= '';
$cpassword= '';


$errors= array();

$userid = $_SESSION['acountdetails'];


// Sign Up or Register
if(isset($_POST['addAdmin'])){

  $fullname= validInput($_POST['fullname']);
  $username= validInput($_POST['username']);
  $email= validInput($_POST['email']);
  $phone= validInput($_POST['phone']);
  $address= validInput($_POST['address']);
  $gender= validInput($_POST['gender']);
  $password= validInput($_POST['password']);
  $cpassword= validInput($_POST['cpassword']);

  $fullname= mysqli_real_escape_string($con, $fullname);
  $username= mysqli_real_escape_string($con, $username);
  $email= mysqli_real_escape_string($con, $email);
  $phone= mysqli_real_escape_string($con, $phone);
  $address= mysqli_real_escape_string($con, $address);
  $gender= mysqli_real_escape_string($con, $gender);
  $password= mysqli_real_escape_string($con, $password);
  $cpassword= mysqli_real_escape_string($con, $cpassword);


  if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  
      $_SESSION['message'] = "Invalid email address";
      $_SESSION['msgtype'] = "danger";
     header("Location:". $_SERVER['HTTP_REFERER']);
     exit();

 }


    else if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone)) {

      $_SESSION['message'] = "Invalid Phone Number";
      $_SESSION['msgtype'] = "danger";
      header("Location:". $_SERVER['HTTP_REFERER']);
     exit();
        }


    else if ($cpassword !== $password) {

      $_SESSION['message']= "Password do not match";
      $_SESSION['msgtype']= "danger";
      header("Location:". $_SERVER['HTTP_REFERER']);
     exit();

    } else {

        $md5 = strtoupper(md5($fullname. $username. $email .$password));

        $code[] = substr($md5, 0, 5);
        $code[] = substr($md5, 5, 5);

        $accountNumber = implode("5", $code);

        $dateFormat = date('Y-m-d H:i:s');
        $key = bin2hex(md5($username. $email));
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = md5($key. $dateFormat. $password);
        $verified = 0;
        $balance = 0;
        $userTheme = '';

        // $sql="insert into users(fullname,email,password) values ('$fullname','$email','$password');";

       $sql = "insert into logintb (password,email,fullname,username,phone,address,token,datecreated,verified,currentbalance,acountdetails,gender,theme) values ('$password', '$email', '$fullname','$username','$phone', '$address', '$token', '$dateFormat','$verified','$balance','$accountNumber','$gender','$userTheme')";

       $result = mysqli_query($con, $sql);


       if ($result) {
          $to = $email;
          $subject = "E-mail Verification From PHP Hospital";
          $message = '<p>Thank you for registering with us at PHP Hospital. But before we continue your registration, you need to verify your email!';
          $message .= '<p>Here is the link to verify your email ';
          $message .= "<a href='http://comment.vickblog.com/verify?token=$token'>Verify Your E-mail</a>";
          $message .= '<p>The Management</p> ';
          $headers = "From: Victor nwakwue <contact@vickblog.com>\r\n";
          $headers .= "MIME-Version: 1.0". "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8". "\r\n";
            if (mail($to, $subject, $message, $headers)) {

              $postTo = $fullname;
              $postedby =  'Ikechukwu Victor';
              $date = date('Y-m-d H:i:s');
              $dateFormat = date('M d Y H:ia', strtotime($date));
              $commentStatus = 0;
              $commentSubject = 'Confirm your email From '.$postedby;
              $commentText = 'Thank You '.$fullname.' for registering to this portal. You registered on '.$dateFormat.'. However, To complete the verification process, please check your email for a validation request. 

              Thank You for your Time, we really appreciate it.

              From: '.$postedby;

              $query = "insert into comments(user_id,user_sent_id,comment_subject,comment_text,comment_status,comment_date) values ('$postTo','$postedby','$commentSubject','$commentText',$commentStatus,'$date');";

              $result=mysqli_query($con,$query);

              if ($result) {

                $postTo = 'Ikechukwu Victor';
                $postedby =  'admin2';
                $date = date('Y-m-d H:i:s');
                $dateFormat = date('M d Y H:ia', strtotime($date));
                $commentStatus = 0;
                $commentSubject = 'New user registration ';
                $commentText = 'A new visitor just registered!
                Name: '.$fullname.' 
                Email: '.$email.'
                Address: '.$address.'
                Date: '.$dateFormat.'
                Please contact this new user as soon as possible. 

                Thank You for your Time, we really appreciate it.

                From: '.$postedby;

                $queryS = "insert into comments(user_id,user_sent_id,comment_subject,comment_text,comment_status,comment_date) values ('$postTo','$postedby','$commentSubject','$commentText',$commentStatus,'$date');";

                $resultS=mysqli_query($con,$queryS);

                if ($resultS) {

                  $_SESSION['message']= "Registration Successfully!!";
                  $_SESSION['msgtype']= "success";
                  header("Location:". $_SERVER['HTTP_REFERER']);
                  exit();
                  
                }

                
              } else {

                 $_SESSION['message']= "Registration not Successful!!";
                  $_SESSION['msgtype']= "danger";
                  header("Location:". $_SERVER['HTTP_REFERER']);
              }
                 
            
            } else {

              $_SESSION['message']= "E-mail Not Sent";
              $_SESSION['msgtype'] = "danger";
              header("Location:". $_SERVER['HTTP_REFERER']);
              exit();

            }
        } else {

          $_SESSION['message']= "E-mail/Username Already Taken";
          $_SESSION['msgtype'] = "danger";
          header("Location:". $_SERVER['HTTP_REFERER']);
          exit();
        }

      
    }


    }



// delete doctor details

if (isset($_POST['deleteadmin'])) {
    $id = $_POST['id'];
    $authoritycode = $_POST['authoritycode'];

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

            $query = "delete from logintb where id=$id";
            $result=mysqli_query($con,$query);

                if($result) {

                $_SESSION['message']= "Admin Deleted successfully!";
                $_SESSION['msgtype']= "success";

                header("Location:". $_SERVER['HTTP_REFERER']);
                 exit();

                 } else {

                     $_SESSION['message']= "Cannot Delete Admin";
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



// delete doctor details

if (isset($_POST['adminAuthCode'])) {

    $authoritycode = $_POST['authoritycode'];

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

            header('Location: admin-code?adminAuthCode=adminAuthCode');
            
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


