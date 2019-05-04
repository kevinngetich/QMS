<?php 
    include("config.php");
    session_start();
    if(!isset($_SESSION['staff'])){
        header("location: index.php");
    }
    
    $pending = "Pending";
    $staff_id = $_SESSION['staff'];
    /*$getdepartmentid = "SELECT * FROM staff WHERE staff_id=$staff_id";
    $query1 =  mysqli_query($db, $getdepartmentid);
    while ( $staffdetails[] = mysqli_fetch_object ( $query1 ));
    array_pop ( $staffdetails );
    */

    $sql = "SELECT department_id FROM staff WHERE staff_id = '$staff_id'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $staff_department_id = $row['department_id'];

    $selection = "SELECT * FROM queries WHERE department_id='$staff_department_id' AND status='$pending'";
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
                        <table class="table table-bordered table-hover" id="querytable" name="querytable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Sender</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Attachment</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $resultsqueries as $row ) : ?>
                                        <tr bgcolor="<?php if($row->forwarded == 1){ echo "#D6EAF8"; }?>"><td class="queryid"><?php echo "$row->query_id";?></td>
                                            <td><?php echo "$row->query_title";?></td>
                                            <td class="sender"><?php echo "$row->sender_id";?></td>
                                            <td>
                                            <?php $sql1 = "SELECT type_name FROM query_types WHERE type_id = '$row->type_id'";
                                                $result1 = mysqli_query($db, $sql1);
                                                $typedetails = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                                                $type_name = $typedetails['type_name'];
                                                echo "$type_name";
                                            ?>
                                            </td>
                                            <td><?php echo "$row->query_description";?></td>
                                            <td><a href="download.php" target="_blank">Download FIle<?php $_SESSION['filename']=$row->relevant_document;?></a></td>
                                            <td><form action="" method="get">
                                                    <input type="text" name="queryid" value="<?php echo "$row->query_id";?>" hidden/>
                                                    <input type="text" name="sender" value="<?php echo "$row->sender_id"?>" hidden/>
                                                    <a href="respondtoquery.php?queryid=<?php echo "$row->query_id";?>&sender=<?php echo "$row->sender_id";?>"><img src="images/respond.png" style="width:20px; height:auto;" alt="Respond to This Query"></a>
                                                 </form>
                                            </td>
                                            <td><form action="" method="get">
                                                    <input type="text" name="queryid" value="<?php echo "$row->query_id";?>" hidden/>
                                                    <a href="forwardquery.php?queryid=<?php echo "$row->query_id";?>"><img src="images/forward.png" style="width:20px; height:auto;" alt="Forward This Query"></a>
                                                 </form>
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
        