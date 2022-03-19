<!--Splitting the header and footer into separate documents makes things easier!-->
<?php
error_reporting(0);
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
   <div class="col-sm-8" style=margin-left:auto;margin-right:auto;>
 
 <?php
 $id = ($_SESSION['usersid']);
date_default_timezone_set('America/New_York');
$date_now = new DateTime();
$date2    = new DateTime("03/19/2022 12:15:00.000000");

if ($date_now < $date2) {
   $d=mktime(12, 15, 00, 3, 19, 2022);
echo "Picks will be locked in for Day 3 on " . date("M-d-Y h:i:a", $d);
    
    $result = mysqli_query($conn,"SELECT * FROM users WHERE usersid = $id");
    
      echo "<h3> Day 3 Picks
      </h3>";
      while($row = mysqli_fetch_array($result))
      {
      echo "<h2 style=font-size:24px;margin-bottom:20px;>";

      echo "<br>" . $row['pickSeven'] . "</br>";
      if (($row["buybackdaytwo"] == 'TRUE'))  {
      echo "<br>" . $row['pickEight'] . "</br>";
      echo "<br>" . $row['pickNine'] . "</br>";
    }else{}}
      echo "</h2>";
      
      echo "</table>";
    
      mysqli_close($conn); 
    
?> 
<div class="table-responsive" style=margin-top:20px;display:contents;>
            <table class="table table-bordered" style=font-size:16px;>
             
               <th>Username</th>
               <th>Day 2 Pick One</th>
               <th>Day 2 Pick Two</th>
               <th>Day 2 Pick Three</th>
               <th>Day 2 Pick Four</th>
          </thead>
          <tbody>
        <?php
            if(is_array($fetchData)){      
            $sn=1;
            foreach($fetchData as $data){
          ?>
            <tr>
            <td><?php echo $data['usersuid']??''; ?></td>
            <td><?php echo $data['pickThree']??''; ?></td>
            <td><?php echo $data['pickFour']??''; ?></td>
            <td><?php echo $data['pickFive']??''; ?></td>
            <td><?php echo $data['pickSix']??''; ?></td>
      
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
<?php
          exit;
      }else{
        $result = mysqli_query($conn,"SELECT * FROM users WHERE usersid = $id");
    
      echo "<h3> Day 3 Picks
      </h3>";
      while($row = mysqli_fetch_array($result))
      {
      echo "<h2 style=font-size:24px;margin-bottom:10px;>";

      echo "<br>" . $row['pickSeven'] . "</br>";
      echo "<br>" . $row['pickEight'] . "</br>";
      if (($_SESSION["buybackdaytwo"] == 'TRUE'))  {
        echo "<br>" . $row['pickNine'] . "</br>";
        echo "<br>" . $row['pickTen'] . "</br>"; 
        echo "<br>" . $row['pickEleven'] . "</br>"; 
      }else{
      echo "</h2>";
      }
      echo "</table>";

      mysqli_close($conn); }
?> 
       </div>
          <div class="table-responsive" style=margin-top:20px;display:contents;>
            <table class="table table-bordered" style=margin-left:auto;font-size: small;>
             
               <th>Username</th>
               <th>Day 3 Pick One</th>
               <th>Day 3 Pick Two</th>
               <th>Day 3 Extra One</th>
               <th>Day 3 Extra Two</th>
               <th>Day 3 Extra Three</th>
               
          </thead>
          <tbody>
        <?php
            if(is_array($fetchData)){      
            $sn=1;
            foreach($fetchData as $data){
          ?>
            <tr>
            <td><?php echo $data['usersuid']??''; ?></td>
            <td><?php echo $data['pickSeven']??''; ?></td>
            <td><?php echo $data['pickEight']??''; ?></td>
            <td><?php echo $data['pickNine']??''; ?></td>
            <td><?php echo $data['pickTen']??''; ?></td>
            <td><?php echo $data['pickEleven']??''; ?></td>
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
          
      <?php } ?>
          </tbody>
           </table>
         </div>
      </div>
      </div>
      </div>
    
<?php
  include_once 'footer.php';
?>
