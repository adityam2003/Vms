<?php
 $servername="";
 $username="root";
 $password="";
 $databse="central";
// create connection
$conn=new mysqli($servername,$username,$password,$databse);

if(!$conn){
    echo "Connection Failed";
}