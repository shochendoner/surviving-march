<?php
include("developer.php");
include_once 'header.php';
?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
body {
  background-color: #333333;
}
.wrapper {
  width: 900px;
  margin: 0 auto;
}
nav {
  width: 100%;
  height: 60px;
  background-color: #dd7926;

}

nav .wrapper {
  height: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #dd7926;
  text-align: center;
}

nav img {
  width: 60px;
}

nav ul {
}

nav ul li {
  list-style: none;
  float: left;
}

nav ul li a {
  font-family: "Roboto", sans-serif;
  font-weight: 500;
  font-size: 16px;
  color: #ffffff;
  text-decoration: none;
  padding: 0 16px;
  text-transform: uppercase;
}

nav ul li a:hover {
  color: #fff;
}
nav
</style>
<section class="index-intro">
<?php
$id = ($_SESSION['usersid']);
if(!isset($_SESSION['usersid'])){
   echo "Not logged in : <a href=login.php>Login</a> |
    <a href=signup.php>Signup Here</a></font> ";
    exit;
 }else{
 }
 
 ?>
 </section>
 <section class=view-your-picks>
 <?php
date_default_timezone_set('America/New_York');
$date_now = new DateTime();
  // change for day 2 // 
$date2    = new DateTime("03/14/2022 19:30:00.000000");
// change for day 2 // 
if ($date_now < $date2) {
  $d=mktime(12, 15, 54, 3, 17, 2022);
echo "Picks will be locked in for Day 1 on " . date("M-d-Y h:i:a", $d);
   
    $result = mysqli_query($conn,"SELECT * FROM users WHERE usersid = $id");
    // change for day 2 // 
      echo "<h3> Day 1 Picks
      </h3>";
// change for day 2 // 
      while($row = mysqli_fetch_array($result))
      {
      echo "<h2>";
      echo "<br>" . $row['pickOne'] . "</br>";
      echo "<td>" . $row['pickTwo'] . "</td>";
      echo "</h2>";
      }
      echo "</table>";

      }else{

      }
      ?>
      </section>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
    <?php
    $result = mysqli_query($conn,"SELECT * FROM users WHERE usersid = $id");
    // change for day 2 // 
    echo "<h3> Day 1 Picks
      </h3>";

      while($row = mysqli_fetch_array($result))
      {
      echo "<h2>";
      echo "<br>" . $row['pickOne'] . "</br>";
      echo "<td>" . $row['pickTwo'] . "</td>";
      echo "</h2>";
      }
      echo "</table>"; 
      ?>
    
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
      <td><?php echo $data['usersEmail']??''; ?></td>
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
