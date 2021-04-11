<meta charset="utf-8" />
<?php echo "<title>". $title . "</title>";   ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Victor" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<!-- App favicon -->
<link rel="icon" href="assets/images/favicon.png" type="image/png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- plugins -->
<link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

<!-- App css -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
<!-- plugin css -->
<link href="assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="assets/libs/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<style>
@import url('https://fonts.googleapis.com/css?family=Rakkas|Kumar+One|Akronim|Sail|Kotta+One|Yeseva+One|Questrial|Vollkorn|Titillium+Web|Roboto+Condensed|Slabo+27px');

.alert_div {
position: absolute;
right: 10px;
top: 80px;
width: 500px;
-webkit-font-family: 'Vollkorn', sans-serif;
font-family: 'Vollkorn', sans-serif;
}

.hidden-table {
display: none!important;
}

#btn-loading,
#eye_hide,
#eye_c_hide,
#eye_n_hide {
display: none;
}

.file_btn {
display: none;
}

.my-profile img{
width: 160px!important;
height: 140px!important;
}

#active-icon {
width: 15px;
height: 1px;
border-radius: 100%;
display: inline;
}

.about-img img {
width: 200px;
height: 200px;
float: left;
margin: 0 1em 1em 0;
border: 3px solid #555;
-webkit-filter:grayscale(1%) contrast(100%);
filter: grayscale(50%) contrast(150%) brightness(80%);
}

.aboutdeveloper {
  font-size: 15px!important;
}

.text-ront, p ,
.form-group{
-webkit-font-family: 'Roboto Condensed', sans-serif;
font-family: 'Roboto Condensed', sans-serif;
}

#text-logo,
.text-fonti,
.page-title,
.email-container h5,
.page-title h4 {
-webkit-font-family: 'Kotta One', sans-serif;
font-family: 'Kotta One', sans-serif;
}


.page-title h4 {
font-weight: bold;
}

#mobile_profile_top h4, 
#mobile_profile_top h5, {
-webkit-font-family: 'Kotta One', sans-serif;
font-family: 'Kotta One', sans-serif;
}

.content {
margin-bottom: 70px!important;
}

@media screen and (max-width: 580px) {

#mobile_profile_top {
margin-top: 40px;
}

ol.breadcrumb {
display: none!important;
}

.alert_div {
position: absolute;
right: 6px;
top: 80px;
width: 70%;

}

.about-img img {
  width: 140px;
  height: 140px;
  margin: 0 1em 1em 0;
}

.my-profile img{
width: 180px!important;
height: 180px!important;
}

.aboutdeveloper {
  font-size: 14px!important;
}

.footer {
  font-size: 13px!important;
}

}

@media screen and (max-width: 320px){

.about-img img {
  width: 220px;
  height: auto;
  margin: 0 auto 1em;
  float: none;
  display: block;
}


}

</style>

<?php  

if ($GLOBALS['title']) {
$title = $GLOBALS['title'];
}
else {
$GLOBALS['title'] = "Welcome to 5Mtelecom Portal";
}

?>