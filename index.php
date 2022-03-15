<!--Splitting the header and footer into separate documents makes things easier!-->
<?php
include_once "header.php";
include("includes/dbh.inc.php");
include("developer.php");
?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<section class="index-intro">
  <h1>Surviving March</h1>
  <p>Brought to you by the "Pockets Aint Empty Podcast"!</p>
</section>
<section class="login-check">
<style>
  ul {
    margin-top: auto;
    margin-bottom: auto;
  }
.login-check p {
justify-content: center;
}

  .login-check h3 {
  padding-top: 20px;
}
.login-check {
  padding-top: 10px;
}
.login-check h3 {
  padding-bottom: 15px;
}
</style>
<?php
if(!isset($_SESSION['usersid'])){
  echo "Please Login To Play! : <a href=login.php>Login</a> |
   <a href=signup.php>Signup Here</a></font> ";
   echo "<h3>IMPORTANT: This game has no monetary reward associated with it and is simply for entertainment purposes.</h3>";
   exit;
}else{ 
}
?>

<style>
  h2{
    margin-top: -20px;
  }
.login-check p {
justify-content: center;
}

  .login-check h3 {
  padding-top: 10px;
}

.login-check {
  padding-bottom: 20px;
}

</style>
<link rel="stylesheet" href="css/style.css">

</section>
<div class="container" style="text-align: -webkit-center;">
 <div class="row" style="display:contents">
   <div class="col-sm-8">
 
 <?php
 $id = ($_SESSION['usersid']);
date_default_timezone_set('America/New_York');
$date_now = new DateTime();
  // DATE OF PICKS TO BE CHANGED
$date2    = new DateTime("03/17/2022 12:30:00.000000");
/* change for day 2  */
if ($date_now < $date2) {
   $d=mktime(12, 15, 54, 3, 17, 2022);
echo "Picks will be locked in for Day 1 on " . date("M-d-Y h:i:a", $d);
    
    $result = mysqli_query($conn,"SELECT * FROM users WHERE usersid = $id");
    
      echo "<h3> Day 1 Picks
      </h3>";
/* change for day 2  */
      while($row = mysqli_fetch_array($result))
      {
      
      echo "<br>" . $row['pickOne'] . "</br>";
      echo "<td>" . $row['pickTwo'] . "</td>";
      
      }
      echo "</table>";

      mysqli_close($conn);

          exit;
      }else{}
      $result = mysqli_query($conn,"SELECT * FROM users WHERE usersid = $id");
    
      echo "<h3> Day 1 Picks
      </h3>";
/* change for day 2  */
      while($row = mysqli_fetch_array($result))
      {
      echo "<h2>";
      echo "<br>" . $row['pickOne'] . "</br>";
      echo "<td>" . $row['pickTwo'] . "</td>";
      echo "</h2>";
      }
      echo "</table>";
          echo $deleteMsg??''; ?>
          <div class="table-responsive">
            <table class="table table-bordered">
             
               <th>Email</th>
               <th>Day 1 Pick One</th>
               <th>Day 1 Pick Two</th>
               
          </thead>
          <tbody>
        <?php
            if(is_array($fetchData)){      
            $sn=1;
            foreach($fetchData as $data){
          ?>
            <tr>
            <td><?php echo $data['usersuid']??''; ?></td>
            <td><?php echo $data['pickOne']??''; ?></td>
            <td><?php echo $data['pickTwo']??''; ?></td>
           </tr>
           <?php
            $sn++;}}else{ ?>
            <tr>
              <td colspan="8">
          <?php echo $fetchData; ?>
        </td>
          <tr>
          <?php
          }?>
          
      
          </tbody>
           </table>
         </div>
      </div>
      </div>
      </div>
         
<?php
  include_once 'footer.php';
?>
