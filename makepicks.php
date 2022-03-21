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
  $date2    = new DateTime("03/24/2022 19:00:00");
  $sql = "SELECT * FROM users WHERE usersid = $id";
  $result = mysqli_query($conn, $sql);

  if ($date_now > $date2) {
    $d=mktime(19, 00, 00, 3, 24, 2022);
 echo "Picks will be locked in for Day 5 at " . date("M-d-Y h:i:a", $d);
     
    $result = mysqli_query($conn,"SELECT * FROM users WHERE usersid = $id");
    
      echo "<table>
      <tr>
      <th>Pick Day 5</th>
      </tr>";

      while($row = mysqli_fetch_array($result))
      {
      echo "<tr>";
      echo "<td>" . $row['dayfive_pickOne'] . "</td>";
      echo "</tr>";
      }
      echo "</table>";

      mysqli_close($conn);

          exit;
      }else{
      }
?>

  <h1>Make Your Selections for Day 5</h1>
  </section>
  <?php


  ?>
  
<section>
        <div class="select-picks">
        <h3 style="font-size: x-large;">Do not select the same team twice!</h3>
              <form action="includes/makepicks.inc.php" method="POST">  
              <select name="dayfive_pickOne" id="dayfive_pickOne">
                <option selected="dayfive_pickOne">--Select Team One--</option>
                <?php
                include "dbh.inc.php";
                $sql = "SELECT * FROM teams WHERE dayfive = 'TRUE' ORDER BY seed";
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
    echo "<br>" . $row['pickFive'] . "</br>";
    echo "<br>" . $row['pickSix'] . "</br>"; 
    echo "<br>" . $row['pickSeven'] . "</br>"; 
    echo "<br>" . $row['dayfour_pickOne'] . "</br>"; 
    }?>
        
<?php
include_once 'footer.php';
?>