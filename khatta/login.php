<?php
session_start();
include "db_conn.php";

if(isset($_POST['uname']) ) {
    function validate($data){
        $data= trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        return  $data;
    }     
}

$uname=validate($_POST['uname']);


if(empty($uname)){
    header("Location: index.php?error=Phone_number  is required");
    exit();
}

function validatePhoneNumber($phoneNumber) {
    if (ctype_digit($phoneNumber) && strlen($phoneNumber) == 10) {
        return true; // Valid phone number
    } else {
        header("Location: index.php?error=Phone_number should be 10 digit ");
        exit();
    }
}

$phoneNumber = "$uname"; // Replace with the user's input

if (validatePhoneNumber($phoneNumber)) {
    echo "Valid phone number: $phoneNumber";
} else {
    header("Location: index.php?error=Phone_number should be 10 digit ");
    exit();
}



$sql="SELECT * FROM registration WHERE phone_number='$uname'";
$result=mysqli_query($conn,$sql);



if(mysqli_num_rows($result)===1){
    $row=mysqli_fetch_assoc($result);
    if($row['phone_number']===$uname){
        


        echo "Logged In!";
        
        $_SESSION['phone_number']=$row['phone_number'];
        $_SESSION['name']=$row['name'];
        $_SESSION['id']=$row['id'];


       

        header("Location: home.php?phone_number=$row[phone_number] ");
        exit();
    }
    else{
        header("Location: register.php?phone_number=$uname");
        exit();
    }
}
else{
    header("Location: register.php?phone_number=$uname");
    exit();
}
?>