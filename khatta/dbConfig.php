<?php  
$dbHost     = "";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "central";  
  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
}
