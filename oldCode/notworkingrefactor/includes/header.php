<!-- output buffering start -->
<?php ob_start(); ?>
<?php session_start(); ?>
<!-- include database connections -->
<?php include "db.php"; ?>
<?php include "functions.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping List</title>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Roboto:400,500" rel="stylesheet">
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
    <div class="wrapper">