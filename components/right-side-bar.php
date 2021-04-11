
<?php  

$userid = $_SESSION['acountdetails'];

$ThemeSelect="SELECT * FROM logintb WHERE acountdetails='$userid'";

$QueryTheme = mysqli_query($con,$ThemeSelect); 

$FetchUserTheme = mysqli_fetch_array($QueryTheme);

$userThemeSelect = $FetchUserTheme['theme'];

$darkTheme = 'left-side-menu-dark';

$condensedTheme = 'left-side-menu-condensed boxed-layout';



?>
<div class="right-bar">
    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i data-feather="x-circle"></i>
        </a>
        <h5 class="m-0">Customization</h5>
    </div>


    <div class="slimscroll-menu">

        <h5 class="font-size-16 pl-3 mt-4 font-weight-bold">Choose Theme</h5>
        <div class="p-3">
            <form action="theme.inc.php" method="POST">
                <h6>Default <?php 
                if ($userThemeSelect !== $condensedTheme && $userThemeSelect !== $darkTheme) { 

                echo "<b class='text-success'>Current Theme</b>";  } 
                    ?></h6>
                <button type="submit" name="DefaultTheme">
                    <img src="assets/images/layouts/vertical.jpg" alt="vertical" class="img-thumbnail demo-img" />
                </button>
            </form>
        </div>

        <div class="px-3 py-1">
            <form action="theme.inc.php" method="POST">
                <h6>Dark Side Nav <?php 
                if ($userThemeSelect == $darkTheme) { 

                echo "<b class='text-success'>Current Theme</b>";  } 
                    ?> 
                </h6>
                <button type="submit" name="DarkSideTheme">
                    <img src="assets/images/layouts/vertical-dark-sidebar.jpg" alt="dark sidenav" class="img-thumbnail demo-img" />
                </button>
            </form>
        </div>

        <div class="px-3 py-1">
            <form action="theme.inc.php" method="POST">
                <h6>Condensed Side Nav <?php 
                if ($userThemeSelect == $condensedTheme) { 

                echo "<b class='text-success'>Current Theme</b>";  } 
                    ?></h6>
                <button type="submit" name="CondensedSideNav">
                    <img src="assets/images/layouts/vertical-condensed.jpg" alt="condensed" class="img-thumbnail demo-img" />
                </button>
            </form>
        </div>
    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>