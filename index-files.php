<?php

require 'dbconfig.php';

// select id from doctb table and display

function display_docs_id()
{
  global $con;
  $query="SELECT id FROM doctb ORDER BY id";
  $result=mysqli_query($con,$query);

  $row=mysqli_num_rows($result);

  echo '<h2 class="mb-0 text-primary">'.$row.'</h2>';
}



// select id from appointmenttb table and display

function display_patient_id()
{
  global $con;
  $query="SELECT id FROM appointmenttb ORDER BY id";
  $result=mysqli_query($con,$query);

  $row=mysqli_num_rows($result);

  echo '<h2 class="mb-0 text-success">'.$row.'</h2>';
}


function display_specialty_id()
{
  global $con;
  $query="SELECT id FROM specialty ORDER BY id";
  $result=mysqli_query($con,$query);

  $row=mysqli_num_rows($result);

  echo '<h2 class="mb-0 text-danger">'.$row.'</h2>';
}


function display_users_id()
{
  global $con;
  $ot = '82855555';
  $query="SELECT * FROM logintb WHERE authoritycode !='$ot'";
  $result=mysqli_query($con,$query);

  $row=mysqli_num_rows($result);

  echo '<h2 class="mb-0 text-warning">'.$row.'</h2>';
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

// select email info from Appointment table and display

function email_info()
{

  global $con;
  $query=" select * from appointmenttb";
  $result=mysqli_query($con,$query);
  while($row=mysqli_fetch_array($result))
  {
    $fullname=$row['fullname'];
    $email=$row['email'];
    echo '<option value="'.$email.'">'.$fullname. '</option>';
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


// Get Tasks and display

function getTasks() {
  global $con;

  $query="select * from tasks";
  $result=mysqli_query($con,$query);

  while($row=mysqli_fetch_array($result)) {


    echo '

        <div class="col-md-6 mt-3">
                <span class="font-weight-bold" data-placement="left" title="Delete this Task">
                     '. $row['title'] . ' <a class="text-danger pull-right ml-3" href="task.inc.php?delete-task='.$row['id'].'">
                    <i data-feather="trash-2" class="icon-dual icon-xs text-danger"></i>
                  </a>
                  </span>
                <p class="font-size-13 text-muted">Posted on <i data-feather="calendar" class="icon-dual icon-xs text-info font-size-10"></i> '.$row['task_date'].' <b class"ml-4"> By </b>  '.$row['postedby'].'</p>
            </div>


    ';
  }
}



// Get All Tasks and display

function getAllTasks() {
  global $con;

  $query="select * from tasks";
  $result=mysqli_query($con,$query);

  while($row=mysqli_fetch_array($result)) {


    echo '

        <div class="col-md-6 mt-3">
                <span class="font-weight-bold" data-placement="left" title="Delete this Task">
                     '. $row['title'] . ' <a class="text-danger pull-right ml-3" href="task.inc.php?delete-alltask='.$row['id'].'" >
                    <i data-feather="trash" class="icon-dual icon-xs text-danger"></i>
                  </a>
                  </span>
                <p class="font-size-13 text-muted">Posted on <i data-feather="calendar" class="icon-dual icon-xs text-info font-size-10"></i> '.$row['task_date']. '  <b class"ml-4"> By </b> '.$row['postedby'].'</p>
            </div>


    ';
  }
}



function validInput($data) {

  $data = htmlspecialchars($data);
  $data = stripcslashes($data);
  $data = trim($data);

  return $data;

}


