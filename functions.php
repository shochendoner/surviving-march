<?php
function updateUser($conn, $dayonewin, $id) {
	$sql = "INSERT INTO users (dayonewin, usersid)
	VALUES (?, ?)
	ON DUPLICATE KEY UPDATE
			dayonewin = VALUES(dayonewin)";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../admin-page.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss", $dayonewin, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../admin-page.php");
	exit();
}
function get_record()
    {
        global $con;
        $UserID = $_POST['UserID'];
        $query = "select * from user_record where ID='$UserID'";
        $result = mysqli_query($con,$query);

        while($row=mysqli_fetch_assoc($result))
        {
            $User_data = "";
            $User_data[0]=$row['ID'];
            $User_data[1]=$row['UserName'];
            $User_data[2]=$row['UserEmail'];
        }
        echo json_encode($User_data);
    }

		function display_record()
    {
        $value = "";
        $value = '<table class="table table-bordered">
                    <tr>
                        <td> User ID </td>
                        <td> User Email</td>
                        <td> Pick One </td>
                        <td> Pick Two</td>
                        <td> Pick Three</td>
                        <td> Pick Four</td>
                        <td> Loss </td>
                    </tr>';
        $query = "select * from user_record ";
        $result = mysqli_query($conn,$query);
        
        while($row=mysqli_fetch_assoc($result))
        {
            $value.= ' <tr>
                            <td> '.$row['usersid'].' </td>
                            <td> '.$row['UsersEmail'].'</td>
                            <td> '.$row['pickOne'].'</td>
                            <td> '.$row['pickTwo'].'</td>
                            <td> '.$row['pickThree'].'</td>
                            <td> '.$row['pickFour'].'</td>
                            <td> <button class="btn btn-success" id="btn_edit" data-id='.$row['ID'].'><span class="fa fa-edit"></span></button> </td>
                            <td> <button class="btn btn-danger" id="btn_delete" data-id1='.$row['ID'].'><span class="fa fa-trash"></span></button> </td>
                        </tr>';
        }
        $value.='</table>';
        echo json_encode(['status'=>'success','html'=>$value]);
    }

		function update_value()
    {
        global $con;
        $Update_ID = $_POST['U_ID'];
        $Update_User =$_POST['U_User'];
        $Update_Email = $_POST['U_Email'];

        $query = "update user_record set UserName='$Update_User', UserEmail='$Update_Email' where ID='$Update_ID '";
        $result = mysqli_query($con,$query);
        if($result)
        {
            echo ' Your Record Has Been Updated ';
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }

		function delete_record()
    {
        global $con;
        $Del_Id = $_POST['Del_ID'];
        $query = "delete from user_record where ID='$Del_Id' ";
        $result = mysqli_query($con,$query);

        if($result)
        {
            echo ' Your Record Has Been Delete ';
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    ?>