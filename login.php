<?php
session_start();
include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data){
        $data= trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        return  $data;
    }     
}

$uname=validate($_POST['uname']);
$pass=validate($_POST['password']);

if(empty($uname)){
    header("Location: index.php?error=User Name is required");
    exit();
}
else if(empty($pass)){
    header("Location: index.php?error=Password is required");
    exit();
}

$sql="SELECT * FROM registartion_desk_users WHERE phone_number='$uname' AND password='$pass' ";
$result=mysqli_query($conn,$sql);



if(mysqli_num_rows($result)===1){
    $row=mysqli_fetch_assoc($result);
    if($row['phone_number']===$uname && $row['password']===$pass){
        


        echo "Logged In!";
        
        $_SESSION['user_name']=$row['user_name'];
        $_SESSION['name']=$row['name'];
        $_SESSION['id']=$row['id'];
        $_SESSION['place']=$row['place'];
        $_SESSION['SESS_AUTH_LEVEL']=$row['SESS_AUTH_LEVEL'];
        $_hell=$_SESSION['place'];

        header("Location: $_hell ");
        exit();
    }
    else{
        header("Location: index.php?error=Incorrect User Name or Number");
        exit();
    }
}
else{
    header("Location: index.php?error=Incorrect User Name or Number");
    exit();
}
?>