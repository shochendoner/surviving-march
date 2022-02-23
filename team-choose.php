<?php
    include_once 'header.php';
    include_once 'dbh.inc.php';

    if(isset($_POST['update_buttton']))
    {    
        $id = $_SESSION['usersid'];
        $pickOne = $_POST['pickOne'];
        $pickTwo = $_POST['pickTwo'];
        

        $query = " UPDATE users SET pickOne='$pickone', picktwo='$picktwo', WHERE usersid='$id' ";
        $result = mysqli_query($conn, $query); 
        if($result)
        {
            $message = "Data Updated Successfully!";
        } 
        else
        {
            $message = "Data Not Updated!. Error: " . $sql . "" . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit & Update data into database in PHP MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    
    <div class="container mt-5">
        
        <?php if(isset($message)) { echo "$message"; } ?>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Edit & Update data into database in PHP MySQL</h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['usersid']))
                        {
                            $id = $_GET['usersid'];
                            $query = " SELECT * FROM users WHERE usersid='$id' LIMIT 1";
                            $result = mysqli_query($conn, $query);

                            if(mysqli_num_rows($result) > 0)
                            {
                                $row = mysqli_fetch_array($result);
                                ?>

                                <form action="" method="POST">

                                    <input type="hidden" name="student_id" value="<?=$row['usersid'];?>" >
                                    <div class="mb-3">
                                        <label>Full Name</label>
                                        <input type="text" name="fullname" value="<?=$row['seed'];?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Course</label>
                                        <input type="text" name="course" value="<?=$row['team_name'];?>" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email ID</label>
                                        <input type="email" name="email" value="<?=$row['email'];?>" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <hr/>
                                        <button type="submit" name="update_buttton" class="btn btn-primary">Update Data</button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Record Found</h4>";
                            }
                        }
                        else
                        {
                            echo "<h4>No ID Found</h4>";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>