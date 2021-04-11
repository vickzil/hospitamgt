<?php

session_start();

include('dbconfig.php');

$userid = $_SESSION['acountdetails'];

// insert into Doctors Details

if(isset($_POST['addDoc']))

{
  
  $fullname = validInput($_POST['fullname']);
  $email = validInput($_POST['email']);
  $contact = validInput($_POST['contact']);
  $address = validInput($_POST['address']);
  $address = mysqli_real_escape_string($con,$address);
  $specialty=$_POST['specialty'];
  $available=$_POST['available'];
  $days=$_POST['days'];

  if (empty($fullname)) {

      $_SESSION['message']= "Please Enter Doctors Name";
      $_SESSION['msgtype']= "danger";

      header("Location:". $_SERVER['HTTP_REFERER']);
      exit();

  }

  elseif (empty($email)) {

      $_SESSION['message']= "Please Enter Doctors email";
      $_SESSION['msgtype']= "danger";

      header("Location:". $_SERVER['HTTP_REFERER']);
      exit();

  }

  else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  
     $_SESSION['message']= "Please use a valid Email";
      $_SESSION['msgtype']= "danger";
      $msg = false;

     header("Location:". $_SERVER['HTTP_REFERER']);
      exit();

 }

 elseif (empty($contact)) {

      $_SESSION['message']= "Please Enter Doctors contact";
      $_SESSION['msgtype']= "danger";

      header("Location:". $_SERVER['HTTP_REFERER']);
      exit();

  }

  elseif (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $contact)) {
  
  $_SESSION['message']= "Invalid phone number";
  $_SESSION['msgtype']= "danger";

  $msg = false;

  header("Location:". $_SERVER['HTTP_REFERER']);
  exit();

  }

  elseif (empty($address)) {

      $_SESSION['message']= "Please Enter Doctors address";
      $_SESSION['msgtype']= "danger";

      header("Location:". $_SERVER['HTTP_REFERER']);
      exit();

  }

  else {

    $dateFormat = date('Y-m-d H:i:s');

  	$query="insert into doctb(name,email,phone,address,specialty,availability,days,datecreated)values('$fullname','$email','$contact','$address','$specialty','$available','$days','$dateFormat')";

	$result = mysqli_query($con,$query);

	if($result) {

       $_SESSION['message']= "Doctor Added successfully!";
       $_SESSION['msgtype']= "success";  
       header("Location:". $_SERVER['HTTP_REFERER']);
       exit();
     
      } else {

       $_SESSION['message']= "Doctor Not Added";
       $_SESSION['msgtype']= "danger";  
       header("Location:". $_SERVER['HTTP_REFERER']);
        exit();

      }


    }
	

     
  }



// delete doctor details

if (isset($_POST['deletedoc'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];

    if (empty($password)) {

     $_SESSION['message'] = "password is required!";
     $_SESSION['msgtype'] = "danger";
     header("Location:". $_SERVER['HTTP_REFERER']);
      exit();

   } else {

      $sql = "SELECT * FROM logintb WHERE acountdetails='$userid'";
      $proccess = mysqli_query($con,$sql);

      $fetch = mysqli_fetch_assoc($proccess);

        if (password_verify($password, $fetch['password'])) {

          $query = "delete from doctb where id=$id";
          $result=mysqli_query($con,$query);

                if($result) {

                $_SESSION['message']= "Doctor Deleted successfully!";
                $_SESSION['msgtype']= "success";

                header("Location:". $_SERVER['HTTP_REFERER']);
                 exit();

                 } else {

                     $_SESSION['message']= "Cannot Delete Doctor";
                     $_SESSION['msgtype']= "danger"; 

                     header("Location:". $_SERVER['HTTP_REFERER']);
                      exit();

                }


        } else {


          $_SESSION['message']= "Wrong Password, Doctor not deleted!!";
          $_SESSION['msgtype']= "danger"; 

          header("Location:". $_SERVER['HTTP_REFERER']);
          exit();

        }




   }


}





  // Update Doctors Details

if(isset($_POST['updateDoc']))

{

  $id= $_POST['id'];
  $fullname = validInput($_POST['fullname']);
  $email = validInput($_POST['femail']);
  $contact = validInput($_POST['contact']);
  $address = validInput($_POST['address']);
  $specialty=$_POST['specialty'];
  $available=$_POST['available'];
  $days=$_POST['days'];

  if (empty($fullname)) {

      $_SESSION['message']= "Please Enter Doctors Name";
      $_SESSION['msgtype']= "danger";

      header("Location:". $_SERVER['HTTP_REFERER']);
      exit();

  }

  elseif (empty($email)) {

      $_SESSION['message']= "Please Enter Doctors email";
      $_SESSION['msgtype']= "danger";

      header("Location:". $_SERVER['HTTP_REFERER']);
      exit();

  }

  else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  
     $_SESSION['message']= "Please use a valid Email";
      $_SESSION['msgtype']= "danger";
      $msg = false;

      header("Location:". $_SERVER['HTTP_REFERER']);
      exit();

 }

 elseif (empty($contact)) {

      $_SESSION['message']= "Please Enter Doctors contact";
      $_SESSION['msgtype']= "danger";

      header("Location:". $_SERVER['HTTP_REFERER']);
      exit();

  }

  elseif (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $contact)) {
  
  $_SESSION['message']= "Invalid phone number";
  $_SESSION['msgtype']= "danger";

  $msg = false;

  header("Location:". $_SERVER['HTTP_REFERER']);
  exit();

  }

  elseif (empty($address)) {

      $_SESSION['message']= "Please Enter Doctors address";
      $_SESSION['msgtype']= "danger";

      header("Location:". $_SERVER['HTTP_REFERER']);
      exit();

  }

  else {

    $query="UPDATE doctb SET name='$fullname', email='$email',phone='$contact', address='$address', specialty='$specialty',availability='$available',days='$days' WHERE id=$id";

  $result = mysqli_query($con,$query);

  if($result) {

       $_SESSION['message']= "Doctor Updated successfully!";
       $_SESSION['msgtype']= "success";
       $docEdit = false;  
       header("Location:". $_SERVER['HTTP_REFERER']);
       exit();
     
      } else {

       $_SESSION['message']= "Doctor Not Updated";
       $_SESSION['msgtype']= "danger";
       $docEdit = true;  
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

// select specialty from specialty table and display

function display_specialty()
{
  global $con;
  $query="select * from specialty";
  $result=mysqli_query($con,$query);
  while($row=mysqli_fetch_array($result))
  {
    $specialty=$row['specialty'];
    echo '<option value="'.$specialty.'">'.$specialty.'</option>';
  }
}

// select doctors Name from doctb table and display

function display_days()
{
  global $con;
  $query="select * from days";
  $result=mysqli_query($con,$query);
  while($row=mysqli_fetch_array($result))
  {
    $day=$row['day'];
    echo '<option value="'.$day.'">'.$day.'</option>';
  }
}

