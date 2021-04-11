<head>

<?php  

if ($GLOBALS['titlehead']) {
$titleHead = $GLOBALS['titlehead'];
}
else {
$GLOBALS['titlehead'] = "Welcome to MB Hospital Portal";
}

?>
    <meta charset="utf-8" />
    <?php echo "<title>". $titleHead . "</title>";   ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Victor Nwakwue" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <!-- App favicon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/png">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

<style>
@import url('https://fonts.googleapis.com/css?family=Rakkas|Kumar+One|Akronim|Sail|Kotta+One|Yeseva+One|Questrial|Vollkorn|Titillium+Web|Roboto+Condensed|Slabo+27px');


#btn-loading,
#eye_hide,
#eye_c_hide {
display: none;
}

#text-logo {
-webkit-font-family: 'Kotta One', sans-serif;
font-family: 'Kotta One', sans-serif;
}

@media screen and (max-width: 580px) {

body {
    background: #fff!important;
}

.col-md-6.card {
    box-shadow: none!important;
}

}

</style>
    </head>
    <body class="authentication-bg">
        
        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 card" style="background: #fff; box-shadow: 0 1px 2px #aaa;">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-12 p-5">
                                        <div class="mx-auto mb-5">
                                            <a href="./">
                                                <h3 class="d-inline align-middle ml-1" id="text-logo" style="font-family: 'Kotta One', sans-serif;">Hospital MGT</h3>
                                            </a>

                                            <?php 
                                              if (isset($_SESSION['message'])) : ?>
                                                <div class=" alert alert-<?PHP echo $_SESSION['msgtype']; ?> mt-4 alert-dismissible text-center ">
                                                  <button data-dismiss="alert" class="close"><i data-feather="x"></i></button>
                                                   <?php echo $_SESSION['message'];

                                                    unset($_SESSION['message']);

                                                    ?>
                                                </div>

                                              <?php endif ?>
                                        </div>