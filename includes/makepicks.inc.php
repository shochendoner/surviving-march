<?php
session_start();
if(!isset($_SESSION['usersid'])){
$id = $_SESSION['usersid'];
}else{
if (isset($_POST["submit"])) {

  // First we get the form data from the URL
  $pickOne = $_POST["pickOne"];
  $pickTwo = $_POST["pickTwo"];
  $id = $_SESSION['usersid'];

  // Then we run a bunch of error handlers to catch any user mistakes we can (you can add more than I did)
  // These functions can be found in functions.inc.php

  require_once "dbh.inc.php";
  require_once 'functions.inc.php';
  
  if (duplicateTeamsDayOne($pickOne, $pickTwo) !== true) {
    header("location: ../makepicks.php?error=duplicateteams");
		exit();
  }
  
  // If we get to here, it means there are no user errors

  // Now we insert the user into the database
  makePicks($conn, $pickOne, $pickTwo, $id);

} else {
	header("index.php");
    exit();
}
}
