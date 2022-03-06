<?php

include "dbh.inc.php";

if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($conn, $_POST['usersEmail']);
	$sql = "SELECT * FROM `users` WHERE usersEmail = '$usersemail'";
	$res = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		echo "Send email to user with password";
	}else{
		echo "User name does not exist in database";
	}
}

?>