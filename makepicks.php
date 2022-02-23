<?php
  include_once 'header.php';

?>
<section class="login-check">
<?php
if(!isset($_SESSION['useruid'])){
  echo "Not logged in : <a href=login.php>Login</a> |
   <a href=signup.php>Signup Here</a></font> ";
   exit;
}else{
}
?>
</section>
  
  <section class="index-intro">
  <h1>Make Your Selections</h1>
  </section>
          <section class="pick-teams-one">
        <div class="card-header">
            <div class="card-body">
              <form action="code2.php" method="POST">     
                <div class="from-group mb-3">   
                <select name="pickOne" class="form-control">
                <option selected="selected">--Select Team One--</option>
              <?php
              include "dbh.inc.php";
              $sql = "SELECT * FROM teams ";
              $result = mysqli_query($conn, $sql);
            
                while ($row = mysqli_fetch_array($result)){
                  echo '<option value="'.$row['team_name'].'">'.$row['team_name'].'</option>';
                }
                ?>
                </select>
              </div>
                  
            
          </div>
              </div>
              </section>

              <section class="pick-teams-two">
        <div class="card-header">
            <div class="card-body">
              <form action="code2.php" method="POST">     
                <div class="from-group mb-3">   
                <select name="pickTwo" class="form-control">
                <option selected="selected">--Select Team One--</option>
              <?php
              include "dbh.inc.php";
              $sql = "SELECT * FROM teams ";
              $result = mysqli_query($conn, $sql);
            
                while ($row = mysqli_fetch_array($result)){
                  echo '<option value="'.$row['team_name'].'">'.$row['team_name'].'</option>';
                }
                ?>
                </select>
              </div>
                  <button type="submit" name="save_select" class="btn btn-primary">Submit</button>
            </form>
          </div>
              </div>
              </section>


<?php
  include_once 'footer.php';
?>