<?php
  include_once 'header.php';
?>
<section class="index-intro">
  <h1>Make Your Selections</h1>
</section>

<section class="picks-form">
  <h2>Choose Two Teams for Day One</h2>
  <div class="picks-form-form">
  <form action="includes/makepicks.inc.php" method="post">
  <form method="post" action="">
    <span>Select Teams</span><br/>
    <?php

    $checked_arr = array();

    // Fetch checked values
    $fetchLang = mysqli_query($con,"SELECT * FROM dayoneteams");
    if(mysqli_num_rows($fetchTeams) > 0){
      $result = mysqli_fetch_assoc($fetchTeams);
      $checked_arr = explode(",",$result['dayoneteams']);
    }

    // Create checkboxes
    $dayoneteams_arr = array("Baylor","Duke","North Carolina","Michigan State","Yale","Maryland");
    foreach($dayoneteams_arr as $dayoneteams){

      $checked = "";
      if(in_array($dayoneteams,$checked_arr)){
        $checked = "checked";
      }
      echo '<input type="checkbox" name="lang[]" value="'.$dayoneteams.'" '.$checked.' > '.$dayoneteams.' <br/>';
    }
    ?>
 
    <input type="submit" value="Submit" name="submit">
  </form>


















  

  <?php
    // Error messages
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in both selections!</p>";
      }
      else if ($_GET["error"] == "invaliduid") {
        echo "<p>Choose a proper username!</p>";
      }
      else if ($_GET["error"] == "invalidemail") {
        echo "<p>Choose a proper email!</p>";
      }
      else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Passwords doesn't match!</p>";
      }
      else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong!</p>";
      }
      else if ($_GET["error"] == "usernametaken") {
        echo "<p>Username already taken!</p>";
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