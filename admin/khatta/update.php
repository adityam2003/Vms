<?php
session_start();
require_once('../check.php');
CheckAccess();
if(isset($_SESSION['id'])&& isset($_SESSION['user_name'])){
    ?>


<?php

require_once '../dbcon.php'; 

if(isset($_POST['uname'])) {
    function validate($data){
        $data= trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        return  $data;
    }     
}

$uname=validate($_POST['uname']);


if(empty($uname)){
    header("Location: manual_search.php?error=Phone Number is required");
    exit();
}


$sql="SELECT * FROM registration WHERE phone_number='$uname'";
$result=mysqli_query($conn,$sql);



if(mysqli_num_rows($result)===1){
    $row=mysqli_fetch_assoc($result);
    if($row['phone_number']===$uname ){
        


        
        $_SESSION['phone_number']=$row['phone_number'];

        

        header("Location: profile1.php?phone_number=$uname");
        exit();
    }
    else{
        header("Location: manual_search.php?error=Incorrect  Number OR not in database");
        exit();
    }
}
else{
    header("Location: manual_search.php?error=Incorrect Number OR not in database");
    exit();
}
?>

<?php


}
else{
    header("Location: ../index.php");
    exit();
}
?>