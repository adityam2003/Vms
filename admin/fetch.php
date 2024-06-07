<?php
$oo = $_POST['oo'];
$oo=stripslashes($oo);
header("Location: $oo ");
        exit();

?>