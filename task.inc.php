<?php 

session_start();

require 'dbconfig.php';


// add Task

if (isset($_POST['addTask'])) {

  $title=validInput($_POST['title']);
  $duedate=$_POST['duedate'];
  $skills=$_POST['skills'];
  $assignedto=validInput($_POST['assignedto']);
  $budget=validInput($_POST['budget']);
  $taskdetails=validInput($_POST['taskdetails']);

  $title= mysqli_real_escape_string($con, $title);
  $assignedto= mysqli_real_escape_string($con, $assignedto);
  $budget= mysqli_real_escape_string($con, $budget);
  $taskdetails= mysqli_real_escape_string($con, $taskdetails);
  $dateFormat =  date('Y-m-d H:i:s');
  $taskCompleted = 'No';

  $postedby =  $_SESSION['fullname'];


      $query = "insert into tasks(title,task_date,postedby,task_details,task_skill,task_assignto,task_budget,task_duedate,task_completed) values ('$title','$dateFormat','$postedby','$taskdetails','$skills','$assignedto','$budget','$duedate','$taskCompleted');";

      $result=mysqli_query($con,$query);

        if ($result) {

          $select = "SELECT * FROM logintb WHERE fullname='$assignedto'";
          $selectQuery = mysqli_query($con,$select);

          $row=mysqli_fetch_array($selectQuery);

          $taskImage = $row['profileimage'];

              if ($selectQuery) {

                $queryT = "UPDATE tasks SET task_image='$taskImage' WHERE task_assignto='$assignedto'";

               $resultT=mysqli_query($con,$queryT);

               if ($resultT) {

                        $_SESSION['message'] = "Task Added successfully!";
                       $_SESSION['msgtype'] = "success";

                        header("Location:". $_SERVER['HTTP_REFERER']);
                       exit();

               } else {

                    $_SESSION['message'] = "Task Not Added!";
                    $_SESSION['msgtype'] = "danger";

                    header("Location:". $_SERVER['HTTP_REFERER']);
                   exit();

               }

             } else {

                $_SESSION['message'] = "Cannot Add this Task";
                 $_SESSION['msgtype'] = "danger"; 

               header("Location:". $_SERVER['HTTP_REFERER']);
               exit();
             }

     } else {

         $_SESSION['message'] = "Cannot Add Task";
         $_SESSION['msgtype'] = "danger"; 

         header("Location:". $_SERVER['HTTP_REFERER']);
           exit();

        }



}


// add Task in Task


if (isset($_POST['addTasks'])) {

  $title=validInput($_POST['title']);
  $title= mysqli_real_escape_string($con, $title);
  $date =  date("Y-m-d");

  $postedby =  $_SESSION['fullname'];

      $query = "insert into tasks(title,task_date,postedby) values ('$title','$date','$postedby');";

      $result=mysqli_query($con,$query);
      if ($result) {

  $_SESSION['message'] = "Task Added successfully!";
  $_SESSION['msgtype'] = "success";

  header("Location:". $_SERVER['HTTP_REFERER']);
         exit();

   } else {

       $_SESSION['message'] = "Cannot Delete Task";
       $_SESSION['msgtype'] = "danger"; 

       header("Location:". $_SERVER['HTTP_REFERER']);
         exit();

      }

}



// delete Task

if (isset($_GET['delete-task'])) {
    $id = $_GET['delete-task'];

  $query = "delete from tasks where id=$id";

  $result=mysqli_query($con,$query);
  if ($result) {

  $_SESSION['message'] = "Task Deleted!";
  $_SESSION['msgtype'] = "success";

  header("Location:". $_SERVER['HTTP_REFERER']);
         exit();

   } else {

       $_SESSION['message'] = "Cannot Delete Task";
       $_SESSION['msgtype'] = "danger"; 

       header("Location:". $_SERVER['HTTP_REFERER']);
         exit();

      }

}




// delete Task in Tasks

if (isset($_GET['delete-alltask'])) {
    $id = $_GET['delete-alltask'];

  $query = "delete from tasks where id=$id";

  $result=mysqli_query($con,$query);
  if ($result) {

  $_SESSION['message'] = "Task Deleted!";
  $_SESSION['msgtype'] = "success";

  header("Location:". $_SERVER['HTTP_REFERER']);
         exit();

   } else {

       $_SESSION['message'] = "Cannot Delete Task";
       $_SESSION['msgtype'] = "danger"; 

       header("Location:". $_SERVER['HTTP_REFERER']);
         exit();

      }

}


// delete Task in Tasks

if (isset($_GET['deletestask'])) {
    $id = $_GET['deletestask'];

  $query = "delete from tasks where id=$id";

  $result=mysqli_query($con,$query);
  if ($result) {

  $_SESSION['message'] = "Task Deleted!";
  $_SESSION['msgtype'] = "success";

  header("Location: tasks");
         exit();

   } else {

       $_SESSION['message'] = "Cannot Delete Task";
       $_SESSION['msgtype'] = "danger"; 

       header("Location:". $_SERVER['HTTP_REFERER']);
         exit();

      }

}


// delete Task in Tasks

if (isset($_POST['singid'])) {
    $id = $_POST['id'];
    $completed = $_POST['singid'];

        $query = "UPDATE tasks SET task_completed='$completed' WHERE id='$id' LIMIT 1";

        $result=mysqli_query($con,$query);
        if ($result) {

        $_SESSION['message'] = "Task status Updated!";
        $_SESSION['msgtype'] = "success";

        header("Location:". $_SERVER['HTTP_REFERER']);
        exit();

         } else {

             $_SESSION['message'] = "Cannot Update Task";
             $_SESSION['msgtype'] = "danger"; 

             header("Location:". $_SERVER['HTTP_REFERER']);
               exit();

            }


}



if (isset($_POST['updateSingleTask'])) {
  $id=$_POST['id'];
  $title=validInput($_POST['title']);
  $duedate=$_POST['duedate'];
  $skills=$_POST['skills'];
  $assignedto=validInput($_POST['assignedto']);
  $budget=validInput($_POST['budget']);
  $taskdetails=validInput($_POST['taskdetails']);

  $title= mysqli_real_escape_string($con, $title);
  $assignedto= mysqli_real_escape_string($con, $assignedto);
  $budget= mysqli_real_escape_string($con, $budget);
  $taskdetails= mysqli_real_escape_string($con, $taskdetails);
  $dateFormat =  date('Y-m-d H:i:s');
  $taskCompleted = 'No';

  $postedby =  $_SESSION['fullname'];


  $select = "SELECT * FROM logintb WHERE fullname='$assignedto'";
  $selectQuery = mysqli_query($con,$select);

  $row=mysqli_fetch_array($selectQuery);

  $taskImage = $row['profileimage'];

  if ($selectQuery) {

      $query="UPDATE tasks SET title='$title',task_date='$dateFormat',postedby='$postedby',task_details='$taskdetails',task_skill='$skills',task_assignto='$assignedto',task_budget='$budget',task_duedate='$duedate',task_completed='$taskCompleted',task_image='$taskImage' WHERE id=$id";

      $result=mysqli_query($con,$query);

            if ($result) {

            $_SESSION['message'] = "Task Added successfully!";
            $_SESSION['msgtype'] = "success";

            header("Location:". $_SERVER['HTTP_REFERER']);
                   exit();

         } else {

             $_SESSION['message'] = "Cannot Delete Task";
             $_SESSION['msgtype'] = "danger"; 

             header("Location:". $_SERVER['HTTP_REFERER']);
               exit();

            }


  } else {

       $_SESSION['message'] = "There was an Error";
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