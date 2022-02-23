<?php
include "header.php";
require "dbh.inc.php";

if(isset($_POST['save_select']))
{
    $id = $_SESSION['usersid'];
    $pickone = $_POST['pickOne'];
    $picktwo = $_POST['pickTwo'];
    

    $query = "UPDATE users (pickOne,pickTwo) WHERE usersid = '$id' VALUES ('$pickone','$picktwo')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $message = "Data Updated Successfully!";
    } 
    else
    {
        $message = "Data Not Updated!. Error: " . $sql . "" . mysqli_error($conn);
    }

}
?>