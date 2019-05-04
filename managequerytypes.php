<?php 
    include("config.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location: index.php");
    }

    $gettypes = "SELECT * FROM query_types";
    $resulttypes = mysqli_query($db, $gettypes);
    while ( $results[] = mysqli_fetch_object ( $resulttypes ) );
    array_pop ( $results );
    
    if(isset($_POST['addtype'])){
        header("location: newquerytype.php");
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
                            <button class="btn btn-default" name="addtype" value="submit">New Query Category</button>
                        </form>
                        <hr>
                        <table class="table table-striped table-bordered table-hover" id="staffdetails" name="staffdetails">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type Name</th>
                                    <th>Description</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $results as $row ) : ?>
                                        <tr><td><?php echo "$row->type_id";?></td>
                                            <td><?php echo "$row->type_name";?></td>
                                            <td><?php echo "$row->type_description";?></td>
                                            <td><a href="deletetype.php?typeid=<?php echo "$row->type_id";?>"><img src="images/delete.png" style="width:20px; height:auto;"></a>
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
        