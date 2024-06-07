<?php
$sname="";
$uname="root";
$password="";
$db_name="central";
$conn=mysqli_connect($sname,$uname,$password,$db_name);

if(!$conn){
    echo "Connection Failed";
}