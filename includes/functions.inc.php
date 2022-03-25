<?php
// Check for empty input signup
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
	$result;
	if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check invalid username
function invalidUid($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function usersEmailExists($conn, $email) {
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $email, $email);
	mysqli_stmt_execute($stmt);

	// "Get result" returns the results from a prepared statement
	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}	




// Check invalid email
function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function duplicateTeamsDayOne($pickThree, $pickFour) {
	$result;
	if ($pickThree !== $pickFour) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function duplicateTeamsDayTwo($pickThree, $pickFour) {
	$result;
	if ($pickThree !== $pickFour) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function duplicateTeamsDayThree($pickSeven, $pickEight) {
	$result;
	if ($pickSeven !== $pickEight) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function duplicateTeamsDayTwoFourPicks($pickSeven, $pickEight, $pickNine, $pickTen, $pickEleven) {
	$result;
	if ($pickThree !== $pickFour) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}





// Check if passwords matches
function pwdMatch($pwd, $pwdrepeat) {
	$result;
	if ($pwd !== $pwdrepeat) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

function picksExist($conn, $id, $pickSeven, $pickEight) {
  $sql = "SELECT * FROM users WHERE usersUid = $id AND pickOne = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../makepicks.php?error=survivorerror");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "sss", $pickSeven, $pickEight);
	mysqli_stmt_execute($stmt);

	// "Get result" returns the results from a prepared statement
	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}



// Check if username is in database, if so then return data
function uidExists($conn, $username) {
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $username);
	mysqli_stmt_execute($stmt);

	// "Get result" returns the results from a prepared statement
	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}	

// Insert new user into database
function createUser($conn, $name, $email, $username, $pwd) {
  $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../signup.php?error=none");
	exit();
}



// Check for empty input login
function emptyInputLogin($username, $pwd) {
	$result;
	if (empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Log user into website
function loginUser($conn, $username, $pwd) {
	$uidExists = uidExists($conn, $username);

	if ($uidExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $uidExists["usersPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);

	if ($checkPwd === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	elseif ($checkPwd === true) {
		session_start();
		$_SESSION["usersid"] = $uidExists["usersid"];
		$_SESSION["useruid"] = $uidExists["usersUid"];
		$_SESSION["usersName"] = $uidExists["usersName"];
		$_SESSION["buybackdaythree"] = $uidExists["buybackdaytwo"];
		$_SESSION["eliminated"] = $uidExists["eliminated"];
		header("location: ../index.php?error=none");
		exit();
	}

}
function makePicks($conn, $daysix, $id) {
	$sql = "INSERT INTO users (daysix, usersid)
	VALUES (?, ?)
	ON DUPLICATE KEY UPDATE
			daysix = VALUES(daysix)";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../makepicks.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss", $daysix, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../index.php");
	exit();
}

function makePicksDayTwoExtraTwo($conn, $pickThree, $pickFour, $pickFive, $pickSix, $id) {
	$sql = "INSERT INTO users (pickThree, pickFour, pickFive, pickSix, usersid)
	VALUES (?, ?, ?, ?, ?)
	ON DUPLICATE KEY UPDATE
			pickThree = VALUES(pickThree),
			pickFour = VALUES(pickFour),
			pickFive = VALUES(pickFive),
			pickSix = VALUES(pickSix)";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../makepicks2.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssss", $pickThree, $pickFour, $pickFive, $pickSix, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../index.php");
	exit();
}

function makePicksDayFourExtraFive($conn, $dayfour_pickone, $dayfour_extraone, $dayfour_extratwo, $dayfour_extrathree, $dayfour_extrafour, $dayfour_extrafive, $id) {
	$sql = "INSERT INTO users (dayfour_pickone, dayfour_extraone, dayfour_extratwo, dayfour_extrathree, dayfour_extrafour, dayfour_extrafive, usersid)
	VALUES (?, ?, ?, ?, ?, ?, ?)
	ON DUPLICATE KEY UPDATE
	dayfour_pickone = VALUES(dayfour_pickone),
	dayfour_extraone = VALUES(dayfour_extraone),
	dayfour_extratwo = VALUES(dayfour_extratwo),
	dayfour_extrathree = VALUES(dayfour_extrathree),
	dayfour_extrafour = VALUES(dayfour_extrafour),
	dayfour_extrafive = VALUES(dayfour_extrafive)";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../makepicks2.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "sssssss", $dayfour_pickone, $dayfour_extraone, $dayfour_extratwo, $dayfour_extrathree, $dayfour_extrafour, $dayfour_extrafive, $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../index.php");
	exit();
}

?>

