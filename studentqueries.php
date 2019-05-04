<?php 
    include("config.php");
    session_start();
    
    if(!isset($_SESSION['user'])) // If session is not set then redirect to Login Page
       {
           header("Location:index.php");  
       }
    
    $user_id = $_SESSION['user'];
    $selection = "SELECT * FROM queries WHERE sender_id=$user_id";
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
                                <a class="nav-link" href="studentdashboard.php">
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
                        <table class="table table-bordered table-hover" id="querytable" name="querytable">
                            <thead>
                                <tr>
                                    <th>Query ID</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>FIle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $resultsqueries as $row ) : ?>
                                        <tr bgcolor="<?php if($row->status == "Cleared"){ echo "#58D68D";}else{ echo "#F1948A";}?>"><td><?php echo "$row->query_id"?></td>
                                            <td><?php echo "$row->query_title"?></td>
                                            <td><?php echo "$row->type_id"?></td>
                                            <td><?php echo "$row->query_description"?></td>
                                            <td><a href="download.php" target="_blank">Download FIle<?php $_SESSION['filename']=$row->relevant_document?></a>
                                            </td>
                                            </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                
            </div>
        </body>
    </html>