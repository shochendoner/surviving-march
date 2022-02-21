<?php
include_once header.php;

  $conn = mysqli_connect("march.mysql.database.azure.com","madwhiteups","Sharks2424!","userregistration");

  $id = $_SESSION['useruid'];
if(isset($_POST['save_multicheckbox']))
{
    $teamslist = $_POST['teamslist'];
    foreach($teamslist as $teamitems)
    {
        // echo $branditems."<br>";
        
        $query = "UPDATE users SET pickOne = '$teamitems' WHERE usersuid = '$id'";
        $query_run = mysqli_query($conn, $query);
    }

    if($query_run==true)
    {
        $_SESSION['useruid'] = "Inserted Successfully";
        header("Location: profile.php");
    }
    else
    {
        $_SESSION['useruid'] = "Selections Have Already Been Made for This Day";
        header("Location: profile.php");
    }
}
?>