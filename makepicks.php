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
  <h1>Make Your Selections</h1>
  </section>

<section class="matchups">
</section>
        <div class="select-picks">
              <form action="includes/makepicks.inc.php" method="POST">     
              <select name="pickOne">
                <option selected="pickOne">--Select Team One--</option>
                <?php
                include "dbh.inc.php";
                $sql = "SELECT * FROM teams WHERE dayone = 'TRUE'";
                $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_array($result)){
                    echo '<option value="'.$row['team_name'].'">'.$row['team_name'].'</option>';
                  }
                ?>
              </select>  
                <select name="pickTwo">
                <option selected="pickTwo">--Select Team Two--</option>
              <?php
              include "dbh.inc.php";
              $sql = "SELECT * FROM teams WHERE dayone = 'TRUE'";
              $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)){
                  echo '<option value="'.$row['team_name'].'">'.$row['team_name'].'</option>';
                }
                ?>
                </select>
                  <button type="submit" name="submit">Submit</button>
            </form>
              </div>
              
     
<?php
  include_once 'footer.php';
?>