<?php

include('../db/connect.php');
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>