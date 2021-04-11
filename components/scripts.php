<!-- Vendor js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="assets/js/vendor.min.js"></script>

  <!-- optional plugins -->
  <script src="assets/libs/moment/moment.min.js"></script>
  <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
  <script src="assets/libs/flatpickr/flatpickr.min.js"></script>

  <!-- datatable js -->
  <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
  <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>
  
  <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
  <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
  <script src="assets/libs/datatables/buttons.html5.min.js"></script>
  <script src="assets/libs/datatables/buttons.flash.min.js"></script>
  <script src="assets/libs/datatables/buttons.print.min.js"></script>
  <script src="assets/libs/datatables/dataTables.keyTable.min.js"></script>
  <script src="assets/libs/datatables/dataTables.select.min.js"></script>
  <!-- Datatables init -->
  <script src="assets/js/pages/datatables.init.js"></script>
  <!-- App js -->
  <script src="assets/js/app.min.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="assets/js/tag.js"></script>
<!-- Datatables init -->
          <!-- page js -->
<script src="assets/js/pages/dashboard.init.js"></script>
<script>
  
  $(document).ready(function(){

    $('#btn-not-loading').click(function(){
      $(this).hide()
      $('#btn-loading').show();
    });

    // Show password

    $('#show_password').on('click', function(){

      var passwordField = $('#password');
      var passwordFieldType = passwordField.attr('type');

      if (passwordFieldType == 'password') {

         passwordField.attr('type', 'text');
         $('#eye_hide').show();
         $('#eye_show').hide();

      } else {

         passwordField.attr('type', 'password');
         $('#eye_hide').hide();
         $('#eye_show').show();
      }
      



    });
    


    // Show password

    $('#show_cpassword').on('click', function(){

      var passwordField = $('#cpassword');
      var passwordFieldType = passwordField.attr('type');

      if (passwordFieldType == 'password') {

         passwordField.attr('type', 'text');

         $('#eye_c_hide').show();
         $('#eye_c_show').hide();

      } else {

         passwordField.attr('type', 'password');

         $('#eye_c_hide').hide();
         $('#eye_c_show').show();
      }
      



    });


    $('.deleteadmin').click(function() {

            $('#deleteadmin-modal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#docId').val(data[0]);
            $('.docName').text(data[1]);

        });

    $('.editdoc').click(function() {

            $('#editpat-modal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#patId').val(data[0]);
            $('#fname').val(data[1]);
            $('#femail').val(data[2]);
            $('#contact').val(data[3]);
            $('#address').val(data[4]);
            $('#available').val(data[5]);
            $('#specialty').val(data[6]);
            $('#days').val(data[7]);

        });

         $('.deletedoc').click(function() {

            $('#deletedoc-modal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#docId').val(data[0]);
            $('.docName').text(data[1]);

        });

      $('.editpat').click(function() {

            $('#editpat-modal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#patId').val(data[0]);
            $('#fname').val(data[1]);
            $('#femail').val(data[2]);
            $('#contact').val(data[3]);
            $('#address').val(data[4]);
            $('#doctor').val(data[5]);

        });

        $('.deletePat').click(function() {

            $('#deletepat-modal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#docId').val(data[0]);
            $('.docName').text(data[1]);

        });

        // Show New password

    $('#show_npassword').on('click', function(){

      var passwordField = $('#npassword');
      var passwordFieldType = passwordField.attr('type');

      if (passwordFieldType == 'password') {

         passwordField.attr('type', 'text');

         $('#eye_n_hide').show();
         $('#eye_n_show').hide();

      } else {

         passwordField.attr('type', 'password');

         $('#eye_n_hide').hide();
         $('#eye_n_show').show();
      }
      



    });

  });
</script>

<script>

   const fileBtn = document.querySelector('.file_btn');
   const formImage = document.querySelector('#form_image');

  function triggerClick() {

    document.querySelector('#file_input').click();


  }

  function displayImage(e) {
    if (e.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
      }

      reader.readAsDataURL(e.files[0]);
      formImage.submit();
    }
  }
</script>

<?php 
if (isset($_SESSION['message'])) : ?>
<div class="alert_div">
<div class=" alert alert-<?PHP echo $_SESSION['msgtype']; ?> alert-dismissible text-center">
<button data-dismiss="alert" class="close text-light">&times;</button>

 <?php echo $_SESSION['message'];

  unset($_SESSION['message']);

  ?>
</div>
</div>

<?php endif ?>