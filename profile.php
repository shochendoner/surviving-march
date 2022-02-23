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
                    <div class="card-header">
                        <h4>How to Get Multiple Values from DB in Checkbox in php</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                        <?php
                  $conn = mysqli_connect("march.mysql.database.azure.com","madwhiteups","Sharks2424!","userregistration");


                            $teams_query = "SELECT * FROM teams";
                            $query_run = mysqli_query($conn, $teams_query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $teams)
                                {
                                    ?>
                                    <input type="checkbox" name="teamslist[]" value="<?= $teams['team_name']; ?>" /> <?= $teams['team_name']; ?> <br/>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "No Record Found";
                            }
                        ?>
                            <div class="form-group mt-3">
                                <button name="save_multicheckbox" class="btn btn-primary">Select Two Teams</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>