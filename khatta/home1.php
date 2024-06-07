<?php
session_start();
require_once('check.php');
CheckAccess();
 
if(isset($_SESSION['id'])&& isset($_SESSION['user_name'] ) ){
   
    ?>

<?php
 require_once 'dbcon.php'; 

$id="";
$pp="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    // GET METHD; SHOW THE DATA OF CLIENT
    if(!isset($_GET["phone_number"])){
        header("location: register.php");
        exit;
    }

    $pp=$_GET["phone_number"];
}
    ?>

<!-- ORDER BY id DESC -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Visitor Management System</title>
     <link rel="icon" href="../img/logo/logo.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/check-in.css">
    <link rel="stylesheet" href="css/form.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="login-form">
        <form>
        <?php if(isset($_GET['error'])) { ?>
          <p class="error"> <?php echo $_GET['error']; ?> </p>
        <?php } ?>
        
        <?php 
  
  require_once 'dbConfig.php'; 
   
  
  $result = $db->query("SELECT id,img,phone_number,name,village_name FROM registration where phone_number='$pp'"); 
  ?>
  
  
  <?php if($result->num_rows > 0){  ?> 
      <div class="gallery"> 
          <?php while($row = $result->fetch_assoc()){ 
            $id=$row['id'];
            ?> 
             <input type="hidden" name="id" value="<?php echo $id; ?>">
              
          
            <div class="text-center mb-5">
                <img src="img/logo/logo.png" style="width: 185px;" alt="logo">
            </div>
            <label>Phone_number</label>
            <div class="form-group">
                
                <input type="text" name="phone_number" class="form-control" placeholder="<?php echo $row['phone_number'];?>" disabled required="required">
            </div>
            <label>Name</label>
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="<?php echo $row['name'];?>" disabled required="required">
            </div>

            <label>Village_name</label>
            <div class="form-group">
                <input type="text" name="villagename" class="form-control" placeholder="<?php echo $row['village_name'];?>" disabled required="required">
            </div>
            <label>Photo</label>
            <div class="text-center mb-5">
            <img  name="image" style="width: 150px;" src="data:image/jpg;charset=utf8;base64,<?php echo  base64_encode($row['img']);?>   " />
                
            </div>
            
            <div class="form-group">
            <a class="button button1" href="index.php">Home</a> 
                    </div>
            <?php } ?> 
          
      </div> 
  <?php }else{ ?> 
      <p class="status error">Image(s) not found...</p> 
  <?php } ?>
            
           
  
                <h6>Powered By</h6><img width="70px" src="img/logo/logo.jpg" alt="">
           
            
        </form>
    </div>
</body>
</html>

<?php


}
else{
    header("Location: ../index.php");
    exit();
}
?>