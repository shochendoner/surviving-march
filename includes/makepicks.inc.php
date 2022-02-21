<?php

require_once "dbh.inc.php";

$id = $_SESSION['usersuid'];

if (isset($_POST["submit"])) {

  if(!empty($_POST['pick'])) {

    $picks = implode(",",$_POST['pick']);

    // Insert and Update record
    $checkEntries = mysqli_query($con,"SELECT * FROM users");
    if(mysqli_num_rows($checkEntries) == 0){
      mysqli_query($con,"INSERT INTO users (pickOne, pickTwo) WHERE usersuid=$id VALUES('".$picks."')");
    }else{
      mysqli_query($con,"UPDATE users (pickOne, pickTwo) WHERE usersuid=$id SET pickOne='".$picks."' ");
      header("location: ../makepicks.php");
    exit();
    }

  }

}
?>