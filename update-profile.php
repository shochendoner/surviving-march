<?php
  include_once 'header.php';
  include 'dbh.inc.php';
?>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>

<script>
$(document).ready(function () {
    $('.select-picks :checkbox').change(function () {
    var $cs=$(this).closest('.select-picks').find(':checkbox:checked');
    if ($cs.length > 2) {
        this.checked=false;
    }
    });
});
</script>
<div class="select-picks">
<form action="includes/makepicks.inc.php" method="POST">
            
            <?php
            include "dbh.inc.php";
            $sql = "SELECT * FROM teams WHERE dayone = 'TRUE'";
            $res = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($res)){
    echo "<input type='checkbox' id='pickOne' name='Teams[]' value='".$row['team_name']."'>"
    .$row['team_name'];
}
?>          
            <?php
            include "dbh.inc.php";
            $sql = "SELECT * FROM teams WHERE dayone = 'TRUE'";
            $res = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($res)){
              echo "<input type='checkbox' id='pickTwo' name='Teams[]' value='".$row['team_name']."'>"
    .$row['team_name'];
}
?> 
<input type="submit">

<button type="submit" name="submit">Submit</button>
</form>

</div>







