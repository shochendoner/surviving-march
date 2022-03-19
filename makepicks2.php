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
  <?php
  include "dbh.inc.php";
  date_default_timezone_set('America/New_York');
  $id = $_SESSION['usersid'];
  $date_now = new DateTime();
  // DATE OF PICKS TO BE CHANGED
  $date2    = new DateTime("03/19/2022 12:15:00");
  $sql = "SELECT * FROM users WHERE usersid = $id";
  $result = mysqli_query($conn, $sql);

  if ($date_now > $date2) {
    $d=mktime(12, 15, 00, 3, 19, 2022);
 echo "Picks will be locked in for Day 3 at " . date("M-d-Y h:i:a", $d);
     
    $result = mysqli_query($conn,"SELECT * FROM users WHERE usersid = $id");
    
      echo "<table>
      <tr>
      <th>Pick One</th>
      <th>Pick Two</th>
      </tr>";

      while($row = mysqli_fetch_array($result))
      {
      echo "<tr>";
      echo "<td>" . $row['pickSeven'] . "</td>";
      echo "<td>" . $row['pickEight'] . "</td>";
      echo "<td>" . $row['pickNine'] . "</td>";
      echo "<td>" . $row['pickTen'] . "</td>";
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
<section>
        <div class="select-picks">
        <h3 style="font-size: x-large;">Do not select the same team twice!</h3>
              <form action="includes/makepicks2.inc.php" method="POST">  
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
                <select name="pickNine" id="pickNine">
                <option selected="pickNine">--Select Extra One--</option>
              <?php
              include "dbh.inc.php";
              $sql = "SELECT * FROM teams WHERE daythree = 'TRUE' ORDER BY seed";
              $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)){
                  echo '<option value="'.$row['team_name'].'">'.$row['seed'].'  '.$row['team_name'].'</option>';
                }
                ?>
                </select>
                <select name="pickTen" id="pickTen">
                <option selected="pickTen">--Select Extra Two--</option>
              <?php
              include "dbh.inc.php";
              $sql = "SELECT * FROM teams WHERE daythree = 'TRUE' ORDER BY seed";
              $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)){
                  echo '<option value="'.$row['team_name'].'">'.$row['seed'].'  '.$row['team_name'].'</option>';
                }
                ?>
                </select>
                <select name="pickTen" id="pickTen">
                <option selected="pickTen">--Select Extra Three--</option>
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
  
          
<?php
include_once 'footer.php';
?>