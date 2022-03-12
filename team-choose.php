<?php
include_once "header.php";
include "dbh.inc.php";

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

<div class="container">
	
	<div class="table">
		<div class="table-header">
			<div class="header__item"><a id="name" class="filter__link" href="#">Name</a></div>
			<div class="header__item"><a id="email" class="filter__link filter__link--number" href="#">Email</a></div>
			<div class="header__item"><a id="pickOne" class="filter__link filter__link--number" href="#">Pick One</a></div>
			<div class="header__item"><a id="pickTwo" class="filter__link filter__link--number" href="#">Pick Two</a></div>
			
		</div>
		<div class="table-content">	
			<div class="table-row">		
				<div class="table-data">Tom</div>
				<div class="table-data">2</div>
				<div class="table-data">0</div>
				<div class="table-data">1</div>
				<div class="table-data">5</div>
			</div>
			<div class="table-row">
				<div class="table-data">Dick</div>
				<div class="table-data">1</div>
				<div class="table-data">1</div>
				<div class="table-data">2</div>
				<div class="table-data">3</div>
			</div>
			<div class="table-row">
				<div class="table-data">Harry</div>
				<div class="table-data">0</div>
				<div class="table-data">2</div>
				<div class="table-data">2</div>
				<div class="table-data">2</div>
			</div>
		</div>	
	</div>
</div>

<?php
  include_once 'footer.php';
?>
