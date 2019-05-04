<?php 
    include("config.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location: index.php");
    }

    $getstaff = "SELECT * FROM staff";
    $resultstaff = mysqli_query($db, $getstaff);
    while ( $results[] = mysqli_fetch_object ( $resultstaff ) );
    array_pop ( $results );
    
    if(isset($_POST['newaccount'])){
        header("location: newstaffaccount.php");
    }
        

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Open University QMS</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, intitial-scale=1">
            <link rel="stylesheet" href="css/bootstrap.min.css"/>
            <link rel="stylesheet" href="css/custom.css"/>
            <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </head>
        <body>
            <div class="container-fluid">
                <div class="row-fluid">
                    <nav class="nav navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
                        <a class="navbar-brand" href="#">Open University QMS</a>
                        <ul class="nav navbar-nav ml-auto">
                            <li>
                                <a class="nav-link" href="tutorial.php">Tutorials</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>    
                            </li>    
                        </ul>
                    </nav>
                </div>
                <div class="row" id="mycontent">
                    <div class="col-lg-2">
                    <nav class="navbar bg-dark navbar-dark sidebar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="admindashboard.php">
                                Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profilesettings.php">
                                Settings
                                </a>
                            </li>
                        </ul>
                    </nav>
                    </div>
                    <div class="col-lg-10">
                        <form action="" method="POST">
                            <button class="btn btn-default" name="newaccount" value="submit">New Staff Account</button>
                        </form>
                        <hr>
                        <table class="table table-striped table-bordered table-hover" id="staffdetails" name="staffdetails">
                            <thead>
                                <tr>
                                    <th>Staff ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Department</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $results as $row ) : ?>
                                        <tr name><td><?php echo "$row->staff_id";?></td>
                                            <td><?php echo "$row->firstname";?></td>
                                            <td><?php echo "$row->lastname";?></td>
                                            <td><?php echo "$row->username";?></td>
                                            <td><?php echo "$row->department_id";?></td>
                                            <td><a href="deletestaff.php?staffid=<?php echo "$row->staff_id";?>"><img src="images/delete.png" style="width:20px; height:auto;"></a>
                                            </td>
                                            </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <p id="results"></p>
                    </div>
            </div>

        </body>
    </html>
        