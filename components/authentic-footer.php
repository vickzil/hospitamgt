</div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Plugin js-->
        <script src="assets/libs/parsleyjs/parsley.min.js"></script>

        <!-- Validation init js-->
        <script src="assets/js/pages/form-validation.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
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

  });
</script>
        
    </body>

<!-- Mirrored from coderthemes.com/shreyu/preview/pages-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Nov 2019 03:38:46 GMT -->
</html>
