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
  <section class="picks-form">
    <h2>Choose Two Teams for Day One</h2>
    <div class="picks-form-form">
    <form method="post" action="">
    <span>Select Teams</span><br/>
      <input type="checkbox" name='pick[]' value="Baylor"> Baylor <br/>
      <input type="checkbox" name='pick[]' value="Maryland"> Maryland <br/>
      <input type="checkbox" name='pick[]' value="North Carolina"> North carolina <br/>
      <input type="checkbox" name='pick[]' value="Duke"> Duke <br/>
      <input type="checkbox" name='pick[]' value="Nine fifty five"> ten sixteen<br/>

      <input type="submit" value="Submit" name="submit">
</form>
<?php

$id = $_SESSION['usersuid'];

  if(isset($_POST['submit'])){

    if(!empty($_POST['teams'])) {

      $teams = implode(",",$_POST['teams']);

      // Insert and Update record
      $checkEntries = mysqli_query($con,"SELECT * FROM users");
      if(mysqli_num_rows($checkEntries) == 0){
        mysqli_query($con,"INSERT INTO users(pickOne) WHERE usersuid=$id VALUES('".$teams."')");
      }else{
        mysqli_query($con,"UPDATE users WHERE usersuid=$id SET pickOne='".$teams."' ");
      }
 
    }

  }
  ?>
  
  <form method="post" action="">
    <span>Select Teams</span><br/>
    <?php

    $checked_arr = array();

    // Fetch checked values
    $fetchLang = mysqli_query($con,"SELECT * FROM languages");
    if(mysqli_num_rows($fetchLang) > 0){
      $result = mysqli_fetch_assoc($fetchLang);
      $checked_arr = explode(",",$result['language']);
    }

    // Create checkboxes
    $languages_arr = array("PHP","JavaScript","jQuery","AngularJS");
    foreach($languages_arr as $language){

      $checked = "";
      if(in_array($language,$checked_arr)){
        $checked = "checked";
      }
      echo '<input type="checkbox" name="lang[]" Team One="'.$language.'" '.$checked.' > '.$language.' <br/>';
    }
    ?>
 
    <input type="submit" value="Submit" name="submit">
  </form>




























<?php
if(isset($_POST['submit'])){

    if(!empty($_POST['pick'])) {

        foreach($_POST['pick'] as $value){
            echo "value : ".$value.'<br/>';
        }

    }

}
?>

<?php

include_once 'dbh.inc.php';

$sql = "SELECT * FROM teams";
$result = mysqli_query($conn, $sql);
$datas = array();
  if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)){
        $datas[] = $row;
      }

      }

// print_r($datas);
foreach ($datas as $data){
    echo $data["team_name"]." ";

}

?>
  <?php
    // Error messages
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in both selections!</p>";
      }
      else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong!</p>";
      }
      else if ($_GET["error"] == "none") {
        echo "<p>Your selections have been made!</p>";
      }
    }
  ?>
</section>




























<?php
  include_once 'footer.php';
?>