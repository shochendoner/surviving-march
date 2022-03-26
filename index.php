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
<div class="container" style="font-size:12px;text-align: -webkit-center;">

 <div class="row" style="display:contents">
   <div class="col-sm-8" style=margin-left:auto;margin-right:auto;>
 
 <?php
 $id = ($_SESSION['usersid']);
date_default_timezone_set('America/New_York');
$date_now = new DateTime();
$date2    = new DateTime("03/26/2022 18:00:00.000000");

if ($date_now < $date2) {
   $d=mktime(18, 00, 00, 3, 2, 2022);
echo "Picks will be locked in for Day 6 on " . date("M-d-Y h:i:a", $d);
    
    $result = mysqli_query($conn,"SELECT * FROM users WHERE usersid = $id");
    
      echo "<h3> Day 7 Pick
      </h3>";
      while($row = mysqli_fetch_array($result))
      {
      echo "<h2 style=font-size:24px;margin-bottom:20px;>";

      echo "<br>" . $row['dayseven'] . "</br>";
      
    }
      echo "</h2>";
      
      echo "</table>";
    
      mysqli_close($conn); 
    
?> 
<div class="table-responsive" style=font-size:small;margin-top:20px;display:contents;>
            <table class="table table-bordered" style=margin-left:auto;font-size: small;>
             
            <th>Username</th>
               <th>Team One</th>
               <th>Team Two</th>
               <th>Team Three</th>
               <th>Team Four</th>
               <th>Team Five</th>
               <th>Team Six</th>
               <th>Team Seven</th>
               <th>Team Eight</th>
               <th>Team Nine</th>
               <th>Team Ten</th>
               
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
            <td><?php echo $data['pickThree']??''; ?></td>
            <td><?php echo $data['pickFour']??''; ?></td>
            <td><?php echo $data['dayfour_pickOne']??''; ?></td>
              <td><?php echo $data['pickFive']??''; ?></td>
              <td><?php echo $data['pickSix']??''; ?></td>
              <td><?php echo $data['pickSeven']??''; ?></td>
              <td><?php echo $data['dayfive_pickOne']??''; ?></td>
              <td><?php echo $data['daysix']??''; ?></td>
              
            
            <?php } ?>
           </tr>
           <?php
            $sn++;}else{ ?>
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
    
      echo "<h3> Day 7 Pick
      </h3>";
      while($row = mysqli_fetch_array($result))
      {
      echo "<h2 style=font-size:24px;margin-bottom:10px;>";

      echo "<br>" . $row['dayseven'] . "</br>";
      {
      echo "</h2>";
      }
      echo "</table>";

      mysqli_close($conn); }
?> 

  
       </div>
          <div class="table-responsive" style=margin-top:20px;display:contents;>
            <table class="table table-bordered" style=margin-right:auto;margin-left:auto;font-size: small;>
             
               <th>Username</th>
               <th>Team One</th>
               <th>Team Two</th>
               <th>Team Three</th>
               <th>Team Four</th>
               <th>Team Five</th>
               <th>Team Six</th>
               <th>Team Seven</th>
               <th>Team Eight</th>
               <th>Team Nine</th>
               <th>Team Ten</th>
               <th>Team Eleven</th>
               
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
            <td><?php echo $data['pickThree']??''; ?></td>
            <td><?php echo $data['pickFour']??''; ?></td>
            <td><?php echo $data['dayfour_pickOne']??''; ?></td>
              <td><?php echo $data['pickFive']??''; ?></td>
              <td><?php echo $data['pickSix']??''; ?></td>
              <td><?php echo $data['pickSeven']??''; ?></td>
              <td><?php echo $data['dayfive_pickOne']??''; ?></td>
              <td><?php echo $data['daysix']??''; ?></td>
              <td><?php echo $data['dayseven']??''; ?></td>


            
            <?php } ?>
           </tr>
           <?php
            $sn++;}else{ ?>
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
