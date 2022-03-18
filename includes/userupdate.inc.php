<?php
if($_POST['win'] == 'call_this') {

  $id = $GET['usersuid'];
    require_once "dbh.inc.php";
    require_once 'functions.inc.php';
    
  
    
    // If we get to here, it means there are no user errors
  
    // Now we insert the user into the database
 updateUser($conn, $dayonewin, $id);
  
  } else {
    header("index.php");
      exit();
  }
  