<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php echo date('Y'); ?> &copy; PHP Hospital. All Rights Reserved. Crafted with <i class='uil uil-heart text-danger font-size-12'></i> By <a href="http://victornwakwue.info" target="_blank" class="text-info">Victor Nwakwue</a>
            </div>
        </div>
    </div>
</footer>


 <!-- Delete Doctor MODAL -->
<div class="modal fade" id="authcodemodal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header py-3 px-4 border-bottom-0 d-block bg-dark">
          <button type="button" class="close text-light" data-dismiss="modal"
          aria-hidden="true">&times;</button>
          <h5 class="modal-title text-light" id="modal-title">Change Authority Code</h5>
      </div>
      <div class="modal-body p-4">
        <form action="add-admin.inc.php" method="POST" class="needs-validation" name="event-form" id="form-event" autocomplete="off" novalidate>
          <p class="font-size-16">To continue, please input your Authority code for verification </p>
          <div class="form-group mt-4">
            <div class="form-group mt-4">
	            <label class="form-control-label">Authority code<span class="form-required text-danger">*</span></label>
	            <input type="text" name="authoritycode" class="form-control form-control-sm" required>
	         </div>
          </div>
          <div class="form-group mt-4">
            <button type="submit" name="adminAuthCode" class="btn mr-1 text-light bg-dark" >Yes</button>
            <button class="btn btn-outline-secondary" data-dismiss="modal">No, thanks</button>  
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-lablledby="logoutModalLable" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light" style="background: #17174a;">
        <h3 class="text-light">Logout</h3>
        <button data-dismiss="modal" class="close text-light" style="color: #fff;">&times;</button>
      </div>
      <div class="modal-body">
        <p>
          <b style="text-transform: capitalize;"><?php echo $user['fullname'];?></b> !! Are you sure you want to logout?
        </p>
        <div class="btn-list">
          <a href="logout.inc.php" class="btn btn-dark" style="background: #17174a;">Yes</a>
          <button class="btn btn-outline-dark" data-dismiss="modal" type="button">No, thanks</button>
        </div>
      </div>
    </div>
  </div>
</div>


 <!-- Add Task MODAL -->
<div class="modal fade" id="taskmodal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header py-3 px-4 border-bottom-0 d-block bg-success">
          <button type="button" class="close text-light" data-dismiss="modal"
          aria-hidden="true" style="color: #fff;">&times;</button>
          <h5 class="modal-title text-light" id="modal-title">Add New Task</h5>
      </div>
      <div class="modal-body p-4">
        <form action="task.inc.php" method="POST" class="needs-validation" name="event-form" id="form-event" novalidate>
            <div class="form-group">
              <label class="form-control-label">Task Titile<span class="form-required text-danger">*</span></label>
              <input type="hidden" name="id" id="id">
              <input type="text" name="title" class="form-control" id="title" placeholder="eg; Make a css menu hover" required>
           </div>
           <div class="row">
             <div class="form-group col-md-6">
                <label class="form-control-label">Task Due Date<span class="form-required text-danger">*</span></label>
                <input type="date" name="duedate" id="duedate" class="form-control" required>
             </div>
             <div class="form-group col-md-6">
                <label class="form-control-label">Task Assigned To<span class="form-required text-danger">*</span></label>
                <select id="assignedto" name="assignedto" class="form-control" required>

                  <?php
                  $userfnmae = $_SESSION['fullname'];
                  // $ot = '82855555';

                  $query="SELECT * FROM logintb WHERE fullname !='$userfnmae' AND authoritycode !='$ot' ";

                  $result=mysqli_query($con,$query);

                  while($row=mysqli_fetch_array($result)) {

                    $fullname=$row['fullname'];
                    $acountdetails=$row['acountdetails'];

                    echo '<option value="'.$fullname.'">'.$fullname. '</option>';
                  } ?>
                </select>
             </div>
           </div>
           <div class="row">
             <div class="form-group col-md-6">
                <label class="form-control-label">Task Budget<span class="form-required text-danger">*</span></label>
                <input type="text" id="budget" name="budget" class="form-control" placeholder="50,000" required>
             </div>
             <div class="form-group col-md-6">
                <label class="form-control-label">Developer Skills<span class="form-required text-danger">*</span></label>
                <input type="text" id="skills" name="skills" value="css" data-role="tagsinput" class="form-control mt-3" required  />
             </div>
             </div>

             <div class="row">
               <div class="form-group col-md-12">
                  <label class="form-control-label">Task Details<span class="form-required text-danger">*</span></label>
                  <textarea rows="7" id="taskdetails" name="taskdetails"class="form-control" placeholder="Here can be the task description" required></textarea>
               </div>
             </div>
          <div class="form-group mt-4 text-right">
            <button type="submit" name="addTask" class="btn btn-success" >
              <span>Send</span> 
              <i class="uil uil-message ml-2"></i> 
            </button>  
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

