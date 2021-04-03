<!doctype html>
<html lang="en">
<?php

include('../db/connect.php');
ob_start();
if(!isset($_SESSION['id'])){
    header("location: login/login.php");
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kazipal Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="./assets/css/main.css" rel="stylesheet">
    <link href="./assets/css/all.min.css" rel="stylesheet">
    <link href="./assets/css/fontawesome.css" rel="stylesheet">
    <link href="./assets/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/pe-icon-7-stroke.css">
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include("./assets/includes/header.php");?>
        <!-- <?php include("./assets/includes/ui_settings.php");?> -->
                
        <div class="app-main">
            <?php include("./assets/includes/sidemenu.php");?>
                <div class="app-main__outer">