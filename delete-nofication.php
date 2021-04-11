<?php 
require 'dbconfig.php';
require 'settings.php';

$userfullname = $_SESSION['fullname'];
$profileimage = $_SESSION['profileimage'];

if (isset($_GET['deletenotification'])) {

  $id = $_GET['deletenotification'];

  $commentUser = "DELETE FROM comments WHERE comment_id='$id'";

  $executeComment = mysqli_query($con, $commentUser);

      if ($executeComment) {

        $_SESSION['message']= "Notification message deleted";
        $_SESSION['msgtype']= "success";

         header("Location:". $_SERVER['HTTP_REFERER']);
         exit();

      } else {

        $_SESSION['message']= "Notification message Not deleted";
        $_SESSION['msgtype']= "danger";

         header("Location:". $_SERVER['HTTP_REFERER']);
         exit();

      }

} else {

    header("Location: ./");
}

?>