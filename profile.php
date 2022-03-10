<?php

include_once "header.php";
include("includes/dbh.inc.php");
?>

<section class="index-intro">
<?php
if(!isset($_SESSION['usersid'])){
   echo "Not logged in : <a href=login.php>Login</a> |
    <a href=signup.php>Signup Here</a></font> ";
    exit;
 }else{
 }
 if ($_SESSION["usersEmail"] = "shochendoner@gmail.com") {
    echo "<a href=admin-page.php>Admin Page</a>";
 }
 else {}
$sql = "SELECT usersEmail, pickOne, pickTwo FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> Email: ". $row["usersEmail"]. " Pick One: ". $row["pickOne"]. " " . $row["pickTwo"] . "<br>";
    }
} else {
    echo "0 results";
}
?>
</section>

<?php
  include_once 'footer.php';
?>
