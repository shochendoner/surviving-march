<?php
  include_once 'header.php';
?>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<section class="login-check">
<?php
if(!isset($_SESSION['usersid'])){
  echo "Not logged in : <a href=login.php>Login</a> |
   <a href=signup.php>Signup Here</a></font> ";
   exit;
}else{
}
?>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
</section>
  <section class="index-intro">
  <h1>Make Your Selections</h1>
  </section>
        <div class="select" style="width:200px;">
              <form action="includes/makepicks.inc.php" method="POST">     
              <select class="select1" name="pickOne" class="form-control">
                
                <option selected="selected">--Select Team One--</option>
                <?php
                include "dbh.inc.php";
                
                $sql = "SELECT * FROM teams WHERE dayone = 'TRUE'";
                $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_array($result)){
                    echo '<option value="'.$row['team_name'].'">'.$row['team_name'].'</option>';
                  }
                ?>
                
              </select>  
                <select name="pickTwo" class="form-control">
                <option selected="selected2">--Select Team Two--</option>
              <?php
              include "dbh.inc.php";
              
              $sql = "SELECT * FROM teams WHERE dayone = 'TRUE'";
              $result = mysqli_query($conn, $sql);
            
                while ($row = mysqli_fetch_array($result)){
                  echo '<option value="'.$row['team_name'].'">'.$row['team_name'].'</option>';
                }
                ?>
                </select>
              
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
              </div>

      <script>
      $(document).ready(function () {
  $("select").change(function () {
    $("option[value=" + $(this).val() + "]").attr("disabled", "disabled");
  });
});
</script>
<?php
  include_once 'footer.php';
?>