<?php
require_once('dbh.inc.php');

function update_value()
    {
        
        $Update_ID = $_POST['U_ID'];
        $Update_User =$_POST['U_User'];
        $Update_Email = $_POST['U_Email'];

        $query = "update user_record set UserName='$Update_User', UserEmail='$Update_Email' where ID='$Update_ID '";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            echo ' Your Record Has Been Updated ';
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    ?>