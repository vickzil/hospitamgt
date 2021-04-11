



<?php

include 'settings.php';

include('dbconfig.php');

$id = $_SESSION['acountdetails'];

$userid = $_SESSION['acountdetails'];


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