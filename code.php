<?php
session_start();

include "dbh.inc.php";


 print_r ($_SESSION['usersid']);

if(!isset($_SESSION['usersid'])){
  $id = $_SESSION['usersid'];

  print_r ($_SESSION['usersid']);
}
if(isset($_POST['save_multicheckbox']))
{
{  
  $id = $_SESSION['usersid'];
$checkbox1=$_POST['teamlist'];  
$chk="";
foreach($checkbox1 as $chk1)
   {  
    $cb_val = isset($_POST[$chk]) ? 1 : 2;
    $chk .= $chk1."";  
    $sql = "INSERT INTO users (pickOne, pickTwo, usersid)
	          VALUES (?, ?, ?)
	          ON DUPLICATE KEY UPDATE
            pickOne = VALUES(pickOne),
            pickTwo = VALUES(pickTwo)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("location: ../profile.php?error=stmtfailed");
        exit();
      }
      mysqli_stmt_bind_param($stmt, "sss", $chk, $chk1, $id);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      header("location: ../profile.php?error=none");
      exit();
   }  

?>  






















<?php


    $teamlist = $_POST['teamlist'];
    foreach($teamlist as $teamitems)
    {
      $sql = "INSERT INTO users (pickOne, pickTwo, usersid)
      VALUES (?, ?, ?)
      ON DUPLICATE KEY UPDATE
          pickOne = VALUES(pickOne),
          pickTwo = VALUES(pickTwo)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("location: ../profile.php?error=stmtfailed");
        exit();
      }
      mysqli_stmt_bind_param($stmt, "sss", $pickone, $picktwo, $id);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      header("location: ../profile.php?error=none");
      exit();
    }
  }

    if($query_run)
    {
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: profile.php");
    }
    else
    {
        $_SESSION['status'] = "Not Inserted";
        header("Location: profile.php");
    }
  }
?>