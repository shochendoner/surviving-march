<?php
session_start();
if(!isset($_SESSION['usersid'])){
$id = $_SESSION['usersid'];
}else{
if (isset($_POST["submit"])) {

  // First we get the form data from the URL
  $dayfour_pickone = $_POST["dayfour_pickone"];
  $dayfour_extraone = $_POST["dayfour_extraone"];
  $dayfour_extratwo = $_POST["dayfour_extratwo"];
  $dayfour_extrathree = $_POST["dayfour_extrathree"];
  $dayfour_extrafour = $_POST['dayfour_extrafour'];
  $dayfour_extrafive = $_POST['dayfour_extrafive'];
  $id = $_SESSION['usersid'];

  // Then we run a bunch of error handlers to catch any user mistakes we can (you can add more than I did)
  // These functions can be found in functions.inc.php

  require_once "dbh.inc.php";
  require_once 'functions.inc.php';
  
  
  // If we get to here, it means there are no user errors

  // Now we insert the user into the database
  makePicksDayFourExtraFive($conn, $dayfour_pickone, $dayfour_extraone, $dayfour_extratwo, $dayfour_extrathree, $dayfour_extrafour, $dayfour_extrafive, $id);

} else {
	header("index.php");
    exit();
}
}
