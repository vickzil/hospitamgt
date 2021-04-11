<?php

session_start();

$patEdit = false;

$date =  date("Y-m-d");

$msg = true;
include('dbcon.php');

$inactive = 600;

if (isset($_SESSION['timeout'])) {
  $session_life = time() - $_SESSION['timeout'];

  if ($session_life > $inactive) {
    session_destroy();

    header("location:logout.php");
  }

  $_SESSION['timeout']=time();

}


include('dbcon.php');





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

function display_docs()
{
	global $con;
	$query="select * from doctb";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['name'];
		echo '<option value="'.$name.'">'.$name.'</option>';
	}
}


// select email info from Appointment table and display

function email_info()
{

  global $con;
  $query=" select * from appointmenttb";
  $result=mysqli_query($con,$query);
  while($row=mysqli_fetch_array($result))
  {
    $fname=$row['fname'];
    $lname=$row['lname'];
    $email=$row['email'];
    echo '<option value="'.$email.'">'.$fname. ' '. $lname.'</option>';
  }
}



// Get patient Details from Appointment table and display

$query="select * from appointmenttb";
$result=mysqli_query($con,$query);
$getPatientDetails = '<tbody id="getPatientDetails" class="text-center">';

while ($row = mysqli_fetch_array($result)) {

    $getPatientDetails .= '
              <tr>
                <td>'. $row['fname'] .' '.$row['lname'] .'</td>
                <td>'. $row['email'] .'</td>
                <td>'. $row['contact'] .'</td>
                <td>'. $row['doctor'] .'</td>
                <td>'. $row['payment'] .'</td>
                <td colspan="2">
                  <a class="text-success mr-4" href="patient-details.php?editpat='.$row['id'].'">
                  <i class="fa fa-pencil-square-o"></i>
                  </a>

                  <a class="text-danger" href="patient-details.php?deletepat='.$row['id'].'">
                  <i class="fa fa-trash-o"></i>
                  </a>

                  </td>
              </tr>';
  }
      
        $getPatientDetails .='</tbody>';

//Edit patient details 

if (isset($_GET['editpat'])) {

  $id = $_GET['editpat'];

  $patEdit = true;

  $rec = $con->query("select * from appointmenttb where id=$id");

  $row = mysqli_fetch_array($rec);
  $fname=$row['fname'];
  $lname=$row['lname'];
  $email=$row['email'];
  $contact=$row['contact'];
  $doctor=$row['doctor'];
  $payment=$row['payment'];

}


// Update Doctors Details

if(isset($_POST['updatePat']))

{

  $id= $_POST['id'];
  $fname=validInput($_POST['fname']);
  $lname=validInput($_POST['lname']);
  $email=validInput($_POST['femail']);
  $contact=validInput($_POST['contact']);
  $doctor=validInput($_POST['doctor']);
  $payment=validInput($_POST['payment']);

  if (empty($fname)) {

      $_SESSION['message']= "First Name Is Required";
      $_SESSION['msgtype']= "danger";

      $msg = false;

      header("Location:patient-details.php");

     }

  elseif (!preg_match("/^[a-zA-Z ]*$/", $fname) && !preg_match("/^[a-zA-Z ]*$/", $lname)) {

      $_SESSION['message']= "Only letters and white space allowed";
      $_SESSION['msgtype']= "danger";

      $msg = false;

      header("Location:patient-details.php");
}

  else if (empty($lname)) {
      $_SESSION['message']= "Last Name Is Required";
      $_SESSION['msgtype']= "danger";

      $msg = false;

      header("Location:patient-details.php");

 }


 else if (empty($email)) {
     $_SESSION['message']= "Email Is Required";
      $_SESSION['msgtype']= "danger";
      $msg = false;

      header("Location:patient-details.php");

 }

 else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  
     $_SESSION['message']= "Please use a valid Email";
      $_SESSION['msgtype']= "danger";
      $msg = false;

      header("Location:patient-details.php");

 }

 else if (empty($contact)) {

     $_SESSION['message']= "Contact Details Is Required";
      $_SESSION['msgtype']= "danger";

      $msg = false;

      header("Location:patient-details.php");

    }

elseif (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $contact)) {
  
  $_SESSION['message']= "Invalid phone number";
  $_SESSION['msgtype']= "danger";

  $msg = false;

  header("Location:patient-details.php");

  }

  else {

    $query="UPDATE appointmenttb SET fname='$fname', lname='$lname',email='$email',contact='$contact',doctor='$doctor',payment='$payment' WHERE id=$id";

  $result = mysqli_query($con,$query);

  if($result) {

       $_SESSION['message']= "Patient Updated";
       $_SESSION['msgtype']= "success";
       $patEdit = false; 
       $msg = true; 
       header("Location: patient-details.php");
     
      } else {

       $_SESSION['message']= "Patient Not Updated";
       $_SESSION['msgtype']= "danger";
       $patEdit = true;
       $msg = false;  
       header("Location: patient-details.php");

      }


    }
  

     
  }


// delete doctor details

if (isset($_GET['deletepat'])) {
    $id = $_GET['deletepat'];

  $query = "delete from appointmenttb where id=$id";

  $result=mysqli_query($con,$query);
  if ($result) {

  $_SESSION['message'] = "Patient Deleted";
  $_SESSION['msgtype'] = "success";

  header("Location: patient-details.php");

   } else {

       $_SESSION['message'] = "Cannot Delete Patient";
       $_SESSION['msgtype'] = "danger"; 

       header("Location: patient-details.php");

      }

}




// Get patient Payment Status from Appointment table and display

function getPaymentStatus() {
  global $con;

  $query="select * from appointmenttb";
  $result=mysqli_query($con,$query);

  while($row=mysqli_fetch_array($result)) {
    $fname=$row['fname'];
    $lname=$row['lname'];
    $contact=$row['contact'];
    $payment=$row['payment'];

    echo "<tr>

       <td>$fname $lname</td>
       <td>$contact</td>
       <td>$payment</td>

    </tr>";
  }
}


// Get Tasks and display

function getTasks() {
  global $con;

  $query="select * from tasks";
  $result=mysqli_query($con,$query);

  while($row=mysqli_fetch_array($result)) {


    echo '
          <div class="col-md-6 mt-2">
            <div class="card">
              <div class="card-body text-dark">
                  <span class="font-weight-bold">
                     '. $row['title'] . ' <a class="text-danger pull-right ml-3" href="index.php?delete-task='.$row['id'].'">
                    <i class="fa fa-trash-o"></i>
                  </a>
                  </span>
                  <p class="font-size-13 mt-2 text-dark small font-weight-bold">Due on <i class="fa fa-calendar ml-2 mr-1"></i> <span class="font-weight-light">'.$row['task_date'].' </span></p>
              </div>
            </div>
        </div>


    ';
  }
}


// add Task


if (isset($_POST['addTask'])) {

  $title=validInput($_POST['title']);
  $title= mysqli_real_escape_string($con, $title);
  $date =  date("Y-m-d");

  if (empty($title)) {

      $_SESSION['message'] = "Please type a task!";
      $_SESSION['msgtype'] = "danger";
       header("Location: index.php");

    }

  else {

      $query = "insert into tasks(title,task_date) values ('$title','$date');";

      $result=mysqli_query($con,$query);
      if ($result) {

      $_SESSION['message'] = "Task Added";
      $_SESSION['msgtype'] = "success";

      header("Location: index.php");

       } else {

           $_SESSION['message'] = "Cannot Add Task";
           $_SESSION['msgtype'] = "danger"; 

           header("Location: index.php");

      }
    }

}

// delete Task

if (isset($_GET['delete-task'])) {
    $id = $_GET['delete-task'];

  $query = "delete from tasks where id=$id";

  $result=mysqli_query($con,$query);
  if ($result) {

  $_SESSION['message'] = "Task Deleted successfully!";
  $_SESSION['msgtype'] = "success";

  header("Location: index.php");

   } else {

       $_SESSION['message'] = "Cannot Delete Task";
       $_SESSION['msgtype'] = "danger"; 

       header("Location: index.php");

      }

}





// delete User/Admin details

if (isset($_GET['deleteuser'])) {
    $id = $_GET['deleteuser'];

  $query = "delete from logintb where id=$id";

  $result=mysqli_query($con,$query);
  if ($result) {

  $_SESSION['message'] = "User Deleted successfully!";
  $_SESSION['msgtype'] = "success";

  header("Location: admin-users.php");

   } else {

       $_SESSION['message'] = "Cannot Delete User";
       $_SESSION['msgtype'] = "danger"; 

       header("Location: admin-users.php");

      }

}




function validInput($data) {

  $data = htmlspecialchars($data);
  $data = stripcslashes($data);
  $data = trim($data);

  return $data;

}



?>