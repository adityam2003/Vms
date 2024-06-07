<?php

function CheckAccess() {
    $result = (isset($_SESSION['SESS_AUTH_LEVEL']) &&  $_SESSION['SESS_AUTH_LEVEL'] == 'khatta_registration' );
    return $result;
}

if (!CheckAccess()) {
    
     header("Location: ../logout.php");
        exit();
}
