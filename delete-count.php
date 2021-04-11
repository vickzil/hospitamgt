<?php 
require 'dbconfig.php';
require 'settings.php';

$userfullname = $_SESSION['fullname'];
$profileimage = $_SESSION['profileimage'];

if (isset($_GET['deletecount'])) {

  $id = $_GET['deletecount'];

  $commentUser = "DELETE FROM visitors WHERE id='$id'";

  $executeComment = mysqli_query($con, $commentUser);

      if ($executeComment) {

        $_SESSION['message']= "Visitor Ip Address Deleted";
        $_SESSION['msgtype']= "success";

         header("Location:". $_SERVER['HTTP_REFERER']);
         exit();

      } else {

        $_SESSION['message']= "Visitor Ip Address Not deleted";
        $_SESSION['msgtype']= "danger";

         header("Location:". $_SERVER['HTTP_REFERER']);
         exit();

      }

} else {

    header("Location: ./");
}

?>