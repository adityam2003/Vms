<?php
session_start();
require_once('../check.php');
CheckAccess();
if(isset($_SESSION['id'])&& isset($_SESSION['user_name'])){
    ?>

<?php
require_once '../dbcon.php'; 

$name="";

$phone_number="";
$aadhaar="";
$timestamp="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    // GET METHD; SHOW THE DATA OF CLIENT
    if(!isset($_GET["id"])){
        header("location: index.php");
        exit;
    }

    $id=$_GET["id"];
    // read the ROW OF SELECTED CLIENT FROM DATABASE
    $sql="SELECT * FROM registration WHERE id=$id ";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();

    if(!$row){
        header("location: index.php");
        exit;
    }

    $name=$row["name"];
  
    $phone_number=$row["phone_number"];
    $aadhaar=$row["Village_name"];
    

  
 
  
  
}else{
    // POST METD: uPDATE THE DATA OF THE CLIENT
   
    $name=$_POST["name"];
  
    $phone_number=$_POST["phone_number"];
    $aadhaar=$_POST["Village_name"];

    do{
        if(empty($name)|| empty($aadhaar)){
            $errorMessage="All fields are Required";
            break;
        }

        
        $sql="UPDATE nek_02 SET name = '$name', Village_name='$aadhaar' WHERE phone_number = '$phone_number'";
        
        $result = $conn->query($sql);

        if(!$result){
            $errorMessage="Invalid query:" . $conn->error;
            break;
        }

        $successMessage="Client updated correctly";
        header("location: index.php");
        exit;

    }while(false);
}

?>




<!DOCTYPE html>
<html lang="zxx">

<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<title>Visitor Managment System</title>
<link rel="icon" href="../../img/logo/logo.jpg" type="image/jpg">

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
<link rel="stylesheet" href="css/table.css">
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
    <li><a href="../index.php">Admin_panel</a></li>
<li><a  href="index.php">Dashboard</a></li>
<li><a  href="entry.php">Entry_List</a></li>
<li><a  class="active" href="manual_search.php">Search_visitor</a></li>


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
<a href="../../logout.php">Log Out <i class="ti-shift-left"></i></a>
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
            
    <div class="white_box mb_30">

    <div class="box_header ">
    <div class="main-title">
    <h3 class="mb-0">Registered Data</h3>
    </div>
    </div>
<div style="overflow-x:auto;">
  <table>
    
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Image</th>
      <th>Registration_Time</th>
      <th>Phone_number</th>
      <th>Village_name</th>
      <th>Registration_Center</th>

    </tr>
    <?php
              require_once '../dbcon.php'; 
                    //  read all row from database table
                $sql= "SELECT * FROM registration where id='$id'";

                 $result=$conn->query($sql);
                 if(!$result){
                        die("Invalid query: " . $conn->error);
                    }

                while($row= $result->fetch_assoc()){
                    $id=$row['id'];
                    echo " 
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>"
                    ?>
                   <td>  <img style="width: 150px;" src="data:image/jpg;charset=utf8;base64,<?php echo  base64_encode($row['img']);?>   " /></td>
                   <?php 
                   echo "
                    
                    <td>$row[timestamp]</td>
                    <td>$row[phone_number]</td>
                    <td>$row[Village_name]</td>
                    <td>$row[site]</td>
                    
                    
                   
                    
                   
                    
                </tr>
                    ";

                }
                ?>
   
  </table>
</div>
  </div>
    </div>
    </div>
    </div>
</div>


<div class="footer_part">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="footer_iner text-center">
    powered by <img width="55px" src="../../img/logo/logo.jpg">
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
<script src="js/timestamp.js"></script>
<script src="js/custom.js"></script>
</body>

</html>

<?php


}
else{
    header("Location: ../index.php");
    exit();
}
?>