
<?php
session_start();
require_once('check.php');
CheckAccess();
 
if(isset($_SESSION['id'])&& isset($_SESSION['user_name'] ) ){
   
    ?>


<?php 
// Include the database configuration file  
require_once 'dbConfig.php'; 
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){
   $id =$_POST["id"]; 
   $phone =$_POST["phone_number"]; 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $db->query("INSERT into khatta_timestamp (img,id) VALUES ('$imgContent','$id')"); 
             
            if($insert){ 
                
                header("Location: home2.php?phone_number=$phone");
                exit();                // $statusMsg = "Done.";
            }else{ 
                header("Location: home.php?error=File upload failed, please try again.&&phone_number=$phone");
                exit();
                // $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            header("Location: home.php?error=Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.&&phone_number=$phone");    
                        exit();
            // $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        header("Location: home.php?error=Please select an image file to upload.&&phone_number=$phone");
                        exit();
        // $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>

<?php


}
else{
    header("Location: ../index.php");
    exit();
}
?>