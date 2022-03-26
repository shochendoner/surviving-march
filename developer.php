<?php
include_once 'header.php';

?>
<section class=index-intro>
<?php
include "dbh.inc.php";
$db= $conn;
$tableName="users";
$columns= ['usersuid', 'buybackdayone', 'pickOne', 'pickTwo', 'pickThree', 'pickFour', 'pickFive', 'pickSix', 'pickSeven', 'dayfour_pickOne', 'dayfive_pickOne', 'daysix', 'dayseven'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{

$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." WHERE users.eliminated!=('TRUE')";
$result = $db->query($query);

if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}
?>