<?php 
include 'settings.php';

include('dbconfig.php');

$id = $_SESSION['acountdetails'];

$userid = $_SESSION['acountdetails'];


// upload Profile Picture
if(isset($_POST['uploadProfileImage'])){

  $fileSize = $_FILES['Profilefile']['size'];
  $profileImgName = time() . '_' . $_FILES['Profilefile']['name'];

  $target = 'uploads/' .$profileImgName;

  $allowed = array('jpg', 'jpeg', 'png');


    if ($fileSize < 500000) {

          if (move_uploaded_file($_FILES['Profilefile']['tmp_name'], $target)) {

              $update = "UPDATE logintb SET profileimage='$profileImgName' WHERE acountdetails='$userid' LIMIT 1";
              $resultRun = mysqli_query($con, $update);

                  if ($resultRun) {
                    $_SESSION['message']= "Profile Image uploaded";
                      $_SESSION['msgtype'] = "success";
                      header("Location:". $_SERVER['HTTP_REFERER']);
                      exit();

                  } else {

                    $_SESSION['message']= "Image Not Inserted to database";
                      $_SESSION['msgtype'] = "danger";
                      header("Location:". $_SERVER['HTTP_REFERER']);
                      exit();


                  }

          } else {


                $_SESSION['message']= "Image Notuploaded";
                $_SESSION['msgtype'] = "danger";
                header("Location:". $_SERVER['HTTP_REFERER']);
                exit();

          }


    } else {

      $_SESSION['message']= "You cannot upload files of this type!";
      $_SESSION['msgtype'] = "danger";
      header("Location:". $_SERVER['HTTP_REFERER']);
        exit();


    }



}


// upload Profile Picture
if(isset($_POST['formimage'])){

  $fileSize = $_FILES['Profilefile']['size'];
  $profileImgName = time() . '_' . $_FILES['Profilefile']['name'];

  $target = 'uploads/' .$profileImgName;

  $allowed = array('jpg', 'jpeg', 'png');


    if ($fileSize < 500000) {

          if (move_uploaded_file($_FILES['Profilefile']['tmp_name'], $target)) {

              $update = "UPDATE logintb SET profileimage='$profileImgName' WHERE acountdetails='$userid' LIMIT 1";
              $resultRun = mysqli_query($con, $update);

                  if ($resultRun) {
                    $_SESSION['message']= "Profile Image uploaded";
                      $_SESSION['msgtype'] = "success";
                      header("Location:". $_SERVER['HTTP_REFERER']);
                      exit();

                  } else {

                    $_SESSION['message']= "Image Not Inserted to database";
                      $_SESSION['msgtype'] = "danger";
                      header("Location:". $_SERVER['HTTP_REFERER']);
                      exit();


                  }

          } else {


                $_SESSION['message']= "Image Notuploaded";
                $_SESSION['msgtype'] = "danger";
                header("Location:". $_SERVER['HTTP_REFERER']);
                exit();

          }


    } else {

      $_SESSION['message']= "You cannot upload files of this type!";
      $_SESSION['msgtype'] = "danger";
      header("Location:". $_SERVER['HTTP_REFERER']);
        exit();


    }



}



// Update Profile Personal Details

if(isset($_POST['updateProfile']))

{
  $fullname = validInput($_POST['fullname']);
  $phone = validInput($_POST['phone']);
  $skill_intro = validInput($_POST['skill_intro']);
  $address = validInput($_POST['address']);
  $bio = validInput($_POST['bio']);
  $Dob = $_POST['dob'];
  $State = validInput($_POST['state']);
  $Nationality = validInput($_POST['nationality']);
  $skills = $_POST['skills'];



  $fullname = mysqli_real_escape_string($con,$fullname);
  $phone = mysqli_real_escape_string($con,$phone);
  $skill_intro = mysqli_real_escape_string($con,$skill_intro);
  $address = mysqli_real_escape_string($con,$address);
  $bio = mysqli_real_escape_string($con,$bio);
  $State = mysqli_real_escape_string($con,$State);
  $Nationality = mysqli_real_escape_string($con,$Nationality);


       if (empty($phone)) {

          $_SESSION['message']= "Your Phone Number cannot be empty";
          $_SESSION['msgtype']= "danger";

       header("Location:". $_SERVER['HTTP_REFERER']);
        exit();

      }

      else if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone)) {

          $_SESSION['message'] = "Invalid Phone Number";
          $_SESSION['msgtype'] = "danger";
         header("Location:". $_SERVER['HTTP_REFERER']);
        exit();

            }

      else {

            $query="UPDATE logintb SET phone='$phone', skill_intro='$skill_intro', address='$address', dob='$Dob', state='$State', nationality='$Nationality', bio='$bio', skills='$skills' WHERE acountdetails='$userid'";

            $result = mysqli_query($con,$query);

              if($result) {

                $sql = "SELECT * FROM logintb WHERE acountdetails='$userid';";
                $sqlQuery = mysqli_query($con,$sql);
                $user = mysqli_fetch_array($sqlQuery);

                $Age = date('Y');
                $DOB = $user['dob'];
                $DOB = strtotime($DOB);
                $DOB = date('Y', $DOB);

                $currentAge = $Age - $DOB;

                $sqlR="UPDATE logintb SET age='$currentAge' WHERE acountdetails='$userid'";
                $resultRun = mysqli_query($con,$sqlR);

                    if ($resultRun) {

                      $_SESSION['message']= "Profile Updated successfully!";
                      $_SESSION['msgtype']= "success"; 
                      header("Location:". $_SERVER['HTTP_REFERER']);
                      exit();

                    }
               
                } else {

                 $_SESSION['message']= "Profile Not Updated";
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










































?>