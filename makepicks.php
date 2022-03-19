<?php
  include_once 'header.php';
  
?>

<section class="login-check">
<?php
if(!isset($_SESSION['usersid'])){
  echo "Not logged in : <a href=login.php>Login</a> |
   <a href=signup.php>Signup Here</a></font> ";
   exit;
}else{
  

  }

?>
<link rel="stylesheet" href="css/style.css">
</section>
  <section class="index-intro">
    <style>
      img{
        display: flex;
        margin: auto;
      }
      h1{
        font-size:40px;
        line-height: 50px;
        margin-bottom: -10px;
      }
      </style>
  <?php
  include "dbh.inc.php";
  if (($_SESSION['eliminated'] == 'TRUE'))  {
    echo "<h1> You've Been Eliminated from the 2022 Surviving March Contest</h1>
    <h3>Thanks for playing
      </h3>";
      echo "<h2> Please follow along during the tournament <a href=index.php>here</a></h2>";
    echo "<img src='/img/coachk.jpeg'>";
    exit;
   } else{}
  date_default_timezone_set('America/New_York');
  $id = $_SESSION['usersid'];
  $date_now = new DateTime();
  // DATE OF PICKS TO BE CHANGED
  $date2    = new DateTime("03/19/2022 12:15:00");
  $sql = "SELECT * FROM users WHERE usersid = $id";
  $result = mysqli_query($conn, $sql);

  if ($date_now > $date2) {
    $d=mktime(12, 15, 54, 3, 19, 2022);
 echo "Picks will be locked in for Day 2 at " . date("M-d-Y h:i:a", $d);
     
    $result = mysqli_query($conn,"SELECT * FROM users WHERE usersid = $id");
    
      echo "<table>
      <tr>
      <th>Pick Three</th>
      <th>Pick Four</th>
      </tr>";

      while($row = mysqli_fetch_array($result))
      {
      echo "<tr>";
      echo "<td>" . $row['pickSeven'] . "</td>";
      echo "<td>" . $row['pickEight'] . "</td>";
      echo "</tr>";
      }
      echo "</table>";

      mysqli_close($conn);

          exit;
      }else{
      }
?>

  <h1>Make Your Selections for Day 3</h1>
  </section>
  <?php


  ?>
  
<section>
        <div class="select-picks">
        <h3 style="font-size: x-large;">Do not select the same team twice!</h3>
              <form action="includes/makepicks.inc.php" method="POST">  
              <select name="pickSeven" id="pickSeven">
                <option selected="pickSeven">--Select Team One--</option>
                <?php
                include "dbh.inc.php";
                $sql = "SELECT * FROM teams WHERE daythree = 'TRUE' ORDER BY seed";
                $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_array($result)){
                    echo '<option value="'.$row['team_name'].'">'.$row['seed'].'  '.$row['team_name'].'</option>';
                  }
                ?>
              </select>  
                <select name="pickEight" id="pickEight">
                <option selected="pickEight">--Select Team Two--</option>
              <?php
              include "dbh.inc.php";
              $sql = "SELECT * FROM teams WHERE daythree = 'TRUE' ORDER BY seed";
              $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)){
                  echo '<option value="'.$row['team_name'].'">'.$row['seed'].'  '.$row['team_name'].'</option>';
                }
                ?>
                </select>
                  <button type="submit" name="submit">Submit</button>
            </form>
            
      </div>
      <?php
      if (isset($_GET["error"])) {
      if ($_GET["error"] == "survivorerror") {
        echo "<p>Please Choose Teams You Have Not Chosen Before!</p>";
      }
      else{} }
      ?>
  </section>
  <section>
    <?php
  $result = mysqli_query($conn,"SELECT * FROM users WHERE usersid = $id");
    
    echo "<h3> ALL TEAMS PICKED
    </h3>";
    while($row = mysqli_fetch_array($result))
    {
    echo "<h2 style=font-size:24px;margin-bottom:10px;>";

    echo "<br>" . $row['pickOne'] . "</br>";
    echo "<br>" . $row['pickTwo'] . "</br>";
    echo "<br>" . $row['pickThree'] . "</br>";
    echo "<br>" . $row['pickFour'] . "</br>";
    if (($row["buybackdayone"] == 'TRUE'))  {
      echo "<br>" . $row['pickFive'] . "</br>";
      echo "<br>" . $row['pickSix'] . "</br>"; 
    }else{}}?>
  <div>
  <?php
include "dbh.inc.php";
$picksql = "SELECT pickOne, pickTwo, pickSeven, pickFour, pickFive, pickSix from users WHERE usersid = $id";
$pickresult = mysqli_query($conn, $picksql);
  while ($pickrow = mysqli_fetch_array($pickresult))
  
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
  $("#pickSeven option[value='1 Baylor']").hide(); 
</script>
    </div>        
<?php
include_once 'footer.php';
?>