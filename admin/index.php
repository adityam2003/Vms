<?php
session_start();
require_once('check.php');
CheckAccess();
 
if(isset($_SESSION['id'])&& isset($_SESSION['user_name'] ) ){
   
    ?>


<!DOCTYPE html>
<html lang="zxx">

<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>visitor managment System</title>
<link rel="icon" href="../img/logo/logo.jpg" type="image/jpg">

<link rel="stylesheet" href="css/bootstrap1.min.css" />

<link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />

<link rel="stylesheet" href="vendors/swiper_slider/css/swiper.min.css" />

<link rel="stylesheet" href="vendors/select2/css/select2.min.css" />

<link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />

<link rel="stylesheet" href="vendors/owl_carousel/css/owl.carousel.css" />

<link rel="stylesheet" href="vendors/gijgo/gijgo.min.css" />

<link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
<link rel="stylesheet" href="vendors/tagsinput/tagsinput.css" />

<link rel="stylesheet" href="vendors/datatable/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="vendors/datatable/css/responsive.dataTables.min.css" />
<link rel="stylesheet" href="vendors/datatable/css/buttons.dataTables.min.css" />

<link rel="stylesheet" href="vendors/text_editor/summernote-bs4.css" />

<link rel="stylesheet" href="vendors/morris/morris.css">

<link rel="stylesheet" href="vendors/material_icon/material-icons.css" />

<link rel="stylesheet" href="css/metisMenu.css">

<link rel="stylesheet" href="css/style1.css" />
<link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">
</head>
<body class="crm_body_bg">




<nav class="sidebar">
<div class="logo d-flex justify-content-between">
<a ><img src="../img/logo/logo.jpg" alt="logo"></a>
<div class="sidebar_close_icon d-lg-none">
<i class="ti-close"></i>
</div>
</div>
<ul id="sidebar_menu">
<li class="side_menu_title">
<span>Dashboard</span>
</li>
<li class="mm-active">
<a class="has-arrow" href="#" aria-expanded="false">

<img src="img/menu-icon/1.svg" alt>
<span>Dashboard</span>
</a>
<ul>
<li><a class="active" href="index.php">Dashboard</a></li>
<!-- <li><a href="manual_search.php">Search_visitor</a></li> -->
</ul>
</li>







</ul>
</nav>


<section class="main_content dashboard_part">

<div class="container-fluid g-0">
<div class="row">
<div class="col-lg-12 p-0">
<div class="header_iner d-flex justify-content-between align-items-center">
<div class="sidebar_icon d-lg-none">
<i class="ti-menu"></i>
</div>
<div class="serach_field-area">
<div class="search_inner">
<h3 id="current-time-now" data-start="<?php echo time() ?>"></h3>

</div>
</div>
<div class="header_right d-flex justify-content-between align-items-center">

<div class="profile_info">
<img src="img/icon/man.svg" alt="user">
<div class="profile_info_iner">
<p>Admin </p>
<h5><?php echo $_SESSION['user_name'] ?></h5>
<div class="profile_info_details">
<!-- <a href="#">My Profile <i class="ti-user"></i></a> -->
<!-- <a href="#">Settings <i class="ti-settings"></i></a> -->
<a href="../logout.php">Log Out <i class="ti-shift-left"></i></a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="main_content_iner ">
<div class="container-fluid p-0">
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="single_element">
<div class="quick_activity">
<div class="row">
<div class="col-12">
<div class="quick_activity_wrap">
<div class="single_quick_activity d-flex">
<div class="icon">
<img src="img/icon/time.png" alt="date">
</div>
<div >
<h3><?php echo date("d/m/y")?></h3>
<p></p>
</div>
</div>
<div class="single_quick_activity d-flex">
<div class="icon">
<img src="img/icon/location.png" alt="location">
</div>
<div >
<h3><span>Admin</span> </h3>
<p></p>
</div>
</div>
<div class="single_quick_activity d-flex">
<div class="icon">
<img src="img/icon/center.png" alt="kendra">
</div>
<div class="count_content">
<h3>1</h3>
<p></p>
</div>
</div>
<div class="single_quick_activity d-flex">
<div class="icon">
<img src="img/icon/day.png" alt="day">
</div>
<div >
<h3><span ><?php echo date("l")?></span></h3> 
<p></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-7">
<div class="white_box QA_section card_height_100">
<div class="white_box_tittle list_header m-0 align-items-center">
<div class="main-title mb-sm-15">
<h3 class="m-0 nowrap">Visitor Log</h3>
</div>
<div class="box_right d-flex lms_block">
<div class="serach_field-area2">
<div class="search_inner">
<!-- <form Active="#">
<div class="search_field">
<input type="text" placeholder="Search here...">
</div>
<button type="submit"> <i class="ti-search"></i> </button>
</form> -->
</div>
</div>
</div>
</div>
<br>
<form  action="fetch.php" method="POST">
<label for="oo">Site </label>
<!-- you can add more sites if you want -->
    <select id="oo" name="oo">
        <option value="khatta/index.php" selected>khatta</option>
        
        <!-- Add more options as needed -->
    </select>
    <button type="submit" class="submit-button">Fetch</button>
</form>
</div>
</div>

<!-- sample space -->



<!-- Sample space -->


<div class="footer_part">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="footer_iner text-center">
    powered by <img width="55px" src="../img/logo/logo.jpg">
</div>
</div>
</div>
</div>
</div>
</section>



<script src="js/jquery1-3.4.1.min.js"></script>

<script src="js/popper1.min.js"></script>

<script src="js/bootstrap1.min.js"></script>

<script src="js/metisMenu.js"></script>

<script src="vendors/count_up/jquery.waypoints.min.js"></script>

<script src="vendors/chartlist/Chart.min.js"></script>

<script src="vendors/count_up/jquery.counterup.min.js"></script>

<script src="vendors/swiper_slider/js/swiper.min.js"></script>

<script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>

<script src="vendors/owl_carousel/js/owl.carousel.min.js"></script>

<script src="vendors/gijgo/gijgo.min.js"></script>

<script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatable/js/buttons.flash.min.js"></script>
<script src="vendors/datatable/js/jszip.min.js"></script>
<script src="vendors/datatable/js/pdfmake.min.js"></script>
<script src="vendors/datatable/js/vfs_fonts.js"></script>
<script src="vendors/datatable/js/buttons.html5.min.js"></script>
<script src="vendors/datatable/js/buttons.print.min.js"></script>
<script src="js/chart.min.js"></script>

<script src="vendors/progressbar/jquery.barfiller.js"></script>

<script src="vendors/tagsinput/tagsinput.js"></script>

<script src="vendors/text_editor/summernote-bs4.js"></script>
<script src="vendors/apex_chart/apexcharts.js"></script>

<script src="js/custom.js"></script>
<script src="vendors/apex_chart/bar_active_1.js"></script>
<script src="vendors/apex_chart/apex_chart_list.js"></script>
<script src="js/timestamp.js"></script>
</body>

</html>
<?php


}
else{
    header("Location: ../index.php");
    exit();
}
?>