<?php
include_once "header.php";
?>
<body>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Fetch data from database in PHP MySQL</h4>
                    </div>
                    <div class="card-body">
                        <form action="team-choose.php" method="POST">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Seed</th>
                                    <th>Team Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include('dbh.inc.php');

                                    $query = "SELECT * FROM teams"; 
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0) //Atleast 1 record is there or not
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                                <tr>
                                                    <td><?= $row['seed'] ?></td>
                                                    <td><?= $row['team_name'] ?></td>
                                                    <td>
                                                        <a href="team-choose.php?id=<?=$row['seed']?>" class="btn btn-success">Select Team</a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan="4">No Record Found</td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>