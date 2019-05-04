<?php 
    include("config.php");
    session_start();
    
    if(!isset($_SESSION['user'])) // If session is not set then redirect to Login Page
       {
           header("Location:index.php");  
       }

    $user_id = $_SESSION['user'];

    $selection = "SELECT * FROM responses WHERE recepient_id='$user_id'";
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
                        <table class="table table-striped table-bordered table-hover" id="querytable" name="querytable">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Responder's Name</th>
                                    <th>Response</th>
                                    <th>Attachment</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; $record[] = 0; foreach ( $resultsqueries as $row ) : ?>
                                        <tr><td>
                                            <?php $sql1 = "SELECT query_title FROM queries WHERE query_id = '$row->query_id'";
                                                $result0 = mysqli_query($db, $sql1);
                                                $querydetails = mysqli_fetch_array($result0, MYSQLI_ASSOC);
                                                $query_name = $querydetails['query_title'];
                                                echo "$query_name";
                                            ?>
                                            </td>
                                            <td>
                                            <?php $sql0 = "SELECT username FROM staff WHERE staff_id = '$row->responder_id'";
                                                $result1 = mysqli_query($db, $sql0);
                                                $staffdetails = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                                                $responder_name = $staffdetails['username'];
                                                echo "$responder_name";
                                            ?>
                                            </td>
                                            <td><?php echo "$row->response";?></td>
                                            <td><a href="download.php" target="_blank">Download FIle<?php $_SESSION['filename']=$row->relevant_document;?></a></td>
                                            <td><form action="followup.php?departmentid=&queryid=" method="get">
                                                    <input type="text" name="queryid" value="<?php echo "$row->query_id";?>" hidden/>
                                                    <input type="text" name="departmentid" value="<?php echo "$row->department_id"?>" hidden/>
                                                    <a href="followup.php?queryid=<?php echo "$row->query_id";?>&departmentid=<?php $getdepartment = "SELECT * FROM staff WHERE staff_id = '$row->responder_id'";
                                                    $queryresult = mysqli_query($db, $getdepartment);
                                                    $departmentdetails = mysqli_fetch_array($queryresult, MYSQLI_ASSOC);
                                                    $department_id = $departmentdetails['department_id'];
                                                    echo "$department_id";
                                                    ?>"><img src="images/respond.png" style="width:20px; height:auto;"></a>
                                                 </form>
                                            </td>
                                        </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>     
            </div>
        </body>
    </html><?php 