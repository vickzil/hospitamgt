<?php

session_start();

include 'db';

// select id from doctb table and display

function display_docs_id()
{
  global $con;
  $query="SELECT id FROM doctb ORDER BY id";
  $result=mysqli_query($con,$query);

  $row=mysqli_num_rows($result);

  echo '<h2 class="mb-0">'.$row.'</h2>';
}


// select id from appointmenttb table and display

function display_patient_id()
{
  global $con;
  $query="SELECT id FROM appointmenttb ORDER BY id";
  $result=mysqli_query($con,$query);

  $row=mysqli_num_rows($result);

  echo '<h2 class="mb-0">'.$row.'</h2>';
}


function display_specialty_id()
{
  global $con;
  $query="SELECT id FROM specialty ORDER BY id";
  $result=mysqli_query($con,$query);

  $row=mysqli_num_rows($result);

  echo '<h2 class="mb-0">'.$row.'</h2>';
}


function display_users_id()
{
  global $con;
  $query="SELECT id FROM logintb ORDER BY id";
  $result=mysqli_query($con,$query);

  $row=mysqli_num_rows($result);

  echo '<h2 class="mb-0">'.$row.'</h2>';
}


function display_users()
{
  global $con;
  $query="SELECT * FROM logintb";

  $result=mysqli_query($con,$query);

  while($row=mysqli_fetch_array($result)) {

    echo '<tr>

       <td>'.$row['fullname'].'</td>
       <td>'.$row['username'].'</td>
       <td>'.$row['email'].'</td>
       <td>
         <a class="text-danger" href="patient-details.php?deleteuser='.$row['id'].'">
          <i class="fa fa-trash-o"></i>
        </a>
       </td>

    </tr>';
  }

}


// Get Tasks and display

function getTasks() {
  global $con;

  $query="select * from tasks";
  $result=mysqli_query($con,$query);

  while($row=mysqli_fetch_array($result)) {


    echo '

        <div class="row mt-3">
        <div class="col-lg-6">
                <span class="font-weight-bold">
                     '. $row['title'] . ' <a class="text-danger pull-right ml-3" href="index.php?delete-task='.$row['id'].'">
                    <i data-feather="trash" class="icon-dual icon-xs"></i>
                  </a>
                  </span>
                <p class="font-size-13 text-muted">Due on '.$row['task_date'].'</p>
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


function validInput($data) {

  $data = htmlspecialchars($data);
  $data = stripcslashes($data);
  $data = trim($data);

  return $data;

}


