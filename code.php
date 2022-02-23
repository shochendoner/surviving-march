<?php
include_once 'header.php';

$conn = mysqli_connect("march.mysql.database.azure.com","madwhiteups","Sharks2424!","userregistration");

$id = $_SESSION['usersid'];
if(isset($_POST['save_multicheckbox']))
{
    $teamslist = $_POST['teamslist'];
    foreach($teamslist as $teamitems)
    {
        // echo $branditems."<br>";
        
        $query = "INSERT INTO users (pickOne, pickTwo) WHERE usersid= $id VALUE $teamitems ";
        $query_run = mysqli_query($conn, $query);
    }
    if($query_run)
    {
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Not Inserted";
        header("Location: index.php");
    }
}
?>
