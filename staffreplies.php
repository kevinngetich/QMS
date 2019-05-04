<?php 
    include("config.php");
    session_start();
    if(!isset($_SESSION['staff'])){
        header("location: index.php");
    }

    $staff_id = $_SESSION['staff'];

    $selection = "SELECT * FROM responses WHERE responder_id='$staff_id'";
    $query = mysqli_query($db, $selection);
    while ( $resultsqueries[] = mysqli_fetch_object ( $query ) );
    array_pop ( $resultsqueries );
        
    


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
                                <a class="nav-link" href="staffdashboard.php">
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
                        <table class="table table-striped table-bordered table-hover" id="querytable" name="querytable">
                            <thead>
                                <tr>
                                    <th>Query ID</th>
                                    <th>Title</th>
                                    <th>Recepient ID</th>
                                    <th>Title</th>
                                    <th>Response</th>
                                    <th>Attachment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; $record[] = 0; foreach ( $resultsqueries as $row ) : ?>
                                        <tr name><td class="queryid"><?php echo "$row->query_id";?></td>
                                            <td>
                                                <?php 
                                                    $statement1 = "SELECT query_title FROM queries WHERE query_id = '$row->query_id'";
                                                    $result1 = mysqli_query($db, $statement1);
                                                    $querydetails = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                                                    $query_title = $querydetails['query_title'];
                                                    echo "$query_title";
                                                ?>
                                            </td>
                                            <td class="sender"><?php echo "$row->recepient_id";?></td>
                                            <td>
                                                <?php 
                                                    $statement2 = "SELECT username FROM users WHERE userid = '$row->recepient_id'";
                                                    $fetchuser = mysqli_query($db, $statement2);
                                                    $userdetails = mysqli_fetch_array($fetchuser, MYSQLI_ASSOC);
                                                    $user_name = $userdetails['username'];
                                                    echo "$user_name";
                                                ?>
                                            </td>
                                            <td><?php echo "$row->response";?></td>
                                            <td><a href="download.php" target="_blank">Download FIle<?php $_SESSION['filename']=$row->relevant_document;?></a></td>
                                            </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <p id="results"></p>
                    </div>     
            </div>

        </body>
    </html>
        