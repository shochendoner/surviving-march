<?php

if (isset($_POST["submit"])) {

  // First we get the form data from the URL
  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["uid"];
  $pickone = $_POST["pickOne"];
  $picktwo = $_POST["pickTwo"];

  // Then we run a bunch of error handlers to catch any user mistakes we can (you can add more than I did)
  // These functions can be found in functions.inc.php

  require_once "dbh.inc.php";
  require_once 'functions.inc.php';

  // Left inputs empty
  // We set the functions "!== false" since "=== true" has a risk of giving us the wrong outcome
  if (wrongPicksEntry($pickone, $picktwo) !== false) {
    header("location: ../signup.php?error=emptyinput");
		exit();
  }
  // If we get to here, it means there are no user errors

  // Now we insert the user into the database
  makePicks($conn, $pickone, $picktwo);

} else {
	header("location: ../makepicks.php");
    exit();
}
?>