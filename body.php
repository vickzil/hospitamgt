<?php  

$userid = $_SESSION['acountdetails'];

$themeSelect="SELECT * FROM logintb WHERE acountdetails='$userid'";

$themeQuery = mysqli_query($con,$themeSelect); 

$userFetch = mysqli_fetch_array($themeQuery);

$userTheme = $userFetch['theme'];

$darkTheme = 'left-side-menu-dark';

$condensedTheme = 'left-side-menu-condensed boxed-layout';

?>
