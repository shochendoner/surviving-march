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
  $date2    = new DateTime("03/18/2022 12:15:00");
  $sql = "SELECT * FROM users WHERE usersid = $id";
  $result = mysqli_query($conn, $sql);

  if ($date_now > $date2) {
    $d=mktime(12, 15, 00, 3, 18, 2022);
 echo "Picks will be locked in for Day 1 at " . date("M-d-Y h:i:a", $d);
     
    $result = mysqli_query($conn,"SELECT * FROM users WHERE usersid = $id");
    
      echo "<table>
      <tr>
      <th>Pick One</th>
      <th>Pick Two</th>
      </tr>";

      while($row = mysqli_fetch_array($result))
      {
      echo "<tr>";
      echo "<td>" . $row['pickThree'] . "</td>";
      echo "<td>" . $row['pickFour'] . "</td>";
      echo "</tr>";
      }
      echo "</table>";

      mysqli_close($conn);

          exit;
      }else{
      }
?>

  <h1>Make Your Selections for Day 1</h1>
  </section>
<section>
        <div class="select-picks">
        <h3 style="font-size: x-large;">Do not select the same team twice!</h3>
              <form action="includes/makepicks2.inc.php" method="POST">  
              <select name="pickThree" id="pickThree">
                <option selected="pickThree">--Select Team One--</option>
                <?php
                include "dbh.inc.php";
                $sql = "SELECT * FROM teams WHERE dayone = 'FALSE' ORDER BY seed";
                $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_array($result)){
                    echo '<option value="'.$row['team_name'].'">'.$row['seed'].'  '.$row['team_name'].'</option>';
                  }
                ?>
              </select>  
                <select name="pickFour" id="pickFour">
                <option selected="pickFour">--Select Team Two--</option>
              <?php
              include "dbh.inc.php";
              $sql = "SELECT * FROM teams WHERE dayone = 'FALSE' ORDER BY seed";
              $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)){
                  echo '<option value="'.$row['team_name'].'">'.$row['seed'].'  '.$row['team_name'].'</option>';
                }
                ?>
                </select>
                <select name="pickFive" id="pick">
                <option selected="pickFive">--Select Team Three--</option>
              <?php
              include "dbh.inc.php";
              $sql = "SELECT * FROM teams WHERE dayone = 'FALSE' ORDER BY seed";
              $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)){
                  echo '<option value="'.$row['team_name'].'">'.$row['seed'].'  '.$row['team_name'].'</option>';
                }
                ?>
                </select>
                <select name="pickSix" id="pickSix">
                <option selected="pickSix">--Select Team Four--</option>
              <?php
              include "dbh.inc.php";
              $sql = "SELECT * FROM teams WHERE dayone = 'FALSE' ORDER BY seed";
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
  
          
<?php
include_once 'footer.php';
?>