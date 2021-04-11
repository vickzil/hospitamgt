<?php 

session_start();

require 'dbconfig.php';

$userid = $_SESSION['acountdetails'];

// Update Doctors Details

if(isset($_POST['updatePat']))

{

  $id= $_POST['id'];
  $fullname=validInput($_POST['fullname']);
  $email=validInput($_POST['femail']);
  $contact=validInput($_POST['contact']);
  $address=validInput($_POST['address']);
  $doctor=validInput($_POST['doctor']);

  if (empty($fullname)) {

      $_SESSION['message']= "Fullname Name Is Required";
      $_SESSION['msgtype']= "danger";

      $msg = false;

      header("Location:". $_SERVER['HTTP_REFERER']);
      exit();

     }

  elseif (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {

      $_SESSION['message']= "Only letters and white space allowed";
      $_SESSION['msgtype']= "danger";

      $msg = false;

      header("Location:". $_SERVER['HTTP_REFERER']);
      exit();
}


 else if (empty($email)) {
     $_SESSION['message']= "Email Is Required";
      $_SESSION['msgtype']= "danger";
      $msg = false;

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

 else if (empty($contact)) {

     $_SESSION['message']= "Contact Details Is Required";
      $_SESSION['msgtype']= "danger";

      $msg = false;

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


  else if (empty($address)) {

     $_SESSION['message']= "Address Is Required";
      $_SESSION['msgtype']= "danger";

      $msg = false;

      header("Location:". $_SERVER['HTTP_REFERER']);
      exit();

    }

  else {

    $query="UPDATE appointmenttb SET fullname='$fullname', email='$email',contact='$contact',doctor='$doctor',address='$address' WHERE id=$id";

  $result = mysqli_query($con,$query);

  if($result) {

       $_SESSION['message']= "Patient Updated";
       $_SESSION['msgtype']= "success";
       $patEdit = false; 
       $msg = true; 
       header("Location:". $_SERVER['HTTP_REFERER']);
        exit();
     
      } else {

       $_SESSION['message']= "Patient Not Updated";
       $_SESSION['msgtype']= "danger";
       $patEdit = true;
       $msg = false;  
       header("Location:". $_SERVER['HTTP_REFERER']);
        exit();

      }


    }
  

     
  }



if(isset($_POST['addPatient'])){

  $title=$_POST['title'];
  $fullname=$_POST['fullname'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
  $address=$_POST['address'];
  $doctor=$_POST['doctor'];
  $payment=$_POST['payment'];

  $address = mysqli_real_escape_string($con, $address);

  if (empty($fullname)) {

      $_SESSION['message']= "Fullname Is Required";
      $_SESSION['msgtype']= "danger";

      $msg = false;

      header("Location:". $_SERVER['HTTP_REFERER']);
        exit();

     }
   elseif (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {

      $_SESSION['message']= "Only letters and white space allowed";
      $_SESSION['msgtype']= "danger";

      $msg = false;

      header("Location:". $_SERVER['HTTP_REFERER']);
        exit();
}

 else if (empty($email)) {
     $_SESSION['message']= "Email Is Required";
      $_SESSION['msgtype']= "danger";
      $msg = false;

      header("Location:". $_SERVER['HTTP_REFERER']);
        exit();

 }

 else if (empty($address)) {
     $_SESSION['message']= "Address Is Required";
      $_SESSION['msgtype']= "danger";
      $msg = false;

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

 else if (empty($contact)) {

     $_SESSION['message']= "Contact Details Is Required";
      $_SESSION['msgtype']= "danger";

      $msg = false;

      header("Location:". $_SERVER['HTTP_REFERER']);
        exit();

    }

    else {
      $datecreated = date('Y-m-d H:i:s');

      $query="insert into appointmenttb(fullname,email,contact,doctor,payment,datecreated,address,title) values ('$fullname','$email','$contact','$doctor','$payment','$datecreated','$address','$title');";
       

      $result=mysqli_query($con,$query);

      if($result) {

        $_SESSION['message']= "Patient Added Successfully";
        $_SESSION['msgtype']= "success";

       header("Location:". $_SERVER['HTTP_REFERER']);
        exit();

      }
           
      else { 

        $_SESSION['message']= "Username Already Exist";
        $_SESSION['msgtype']= "danger";  
         $msg = true;
        header("Location:". $_SERVER['HTTP_REFERER']);
        exit();

       }




  }
 
  


}


if(isset($_POST['update_data']))
{
  $email=$_POST['email'];
  $status=$_POST['status'];

  $query="update appointmenttb set payment='$status' where email='$email';";
  $result=mysqli_query($con,$query);

  if($result) {

    $_SESSION['message']= "Payment Updated successfully!";
    $_SESSION['msgtype']= "success";  
    header("Location:". $_SERVER['HTTP_REFERER']);
    exit();

  }
  
  else {

    $_SESSION['message']= "Something went wrong";
    $_SESSION['msgtype']= "danger";  
    
    header("Location:". $_SERVER['HTTP_REFERER']);
    exit();


  }

    
        
}


// delete doctor details

if (isset($_POST['deletepat'])) {
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

            $query = "delete from appointmenttb where id=$id";

            $result=mysqli_query($con,$query);

                if ($result) {

                    $_SESSION['message'] = "Patient Deleted";
                    $_SESSION['msgtype'] = "success";

                    header("Location:". $_SERVER['HTTP_REFERER']);
                    exit();

                 } else {

                     $_SESSION['message'] = "Cannot Delete Patient";
                     $_SESSION['msgtype'] = "danger"; 

                     header("Location:". $_SERVER['HTTP_REFERER']);
                      exit();

                }



          } else {


            $_SESSION['message']= "Wrong Password, Patient not deleted!!";
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




