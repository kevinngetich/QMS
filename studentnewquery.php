<?php 
    include("config.php");
    session_start();

    if(!isset($_SESSION['user'])){
        header("location: index.php");
    }
    $user_id = $_SESSION['user'];
    $selection1 = "SELECT * FROM departments";
    $selection2 = "SELECT * FROM query_types";
    $query1 = mysqli_query($db, $selection1);
    $query2 = mysqli_query($db, $selection2);
    while ( $resultsdeparment[] = mysqli_fetch_object ( $query1 ) );
    while ( $resultsquerytypes[] = mysqli_fetch_object ( $query2 ) );
    array_pop ( $resultsdeparment );
    array_pop ( $resultsquerytypes );

    if(isset($_POST['querytitle'])) {
        $query_title = mysqli_real_escape_string($db, $_POST['querytitle']);
        $type_id = mysqli_real_escape_string($db, $_POST['querytype']);
        $department_id = mysqli_real_escape_string($db, $_POST['department']);
        $query_description = mysqli_real_escape_string($db, $_POST['querydescription']);
        $attachment = mysqli_real_escape_string($db, $_POST['attachdocument']);

        // attempt insert query execution
        $sql = "INSERT INTO queries (query_title, type_id, department_id, sender_id, query_description, relevant_document) VALUES ('$query_title', '$type_id', '$department_id', $user_id, '$query_description', '$attachment')";
        if(mysqli_query($db, $sql)){
            echo '<script type="text/javascript"> window.open("success.php","_self");</script>';
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }
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
                        <h3>Query Entry Form    
                        <br>
                        <hr>
                        </h3> 
                        <form class="form-container-2" action="" method="POST">
                            <div class="form-group">
                                <label for="querytitle" class="uniform-text">Query Title</label>
                                <input type="text" class="form-control" name="querytitle" placeholder="Query Title" />
                            </div>
                            <div class="form-group">
                                <label for="querytype" class="uniform-text">Type of Query</label>
                                <select class="form-control" name="querytype">
                                    <option value="" selected hidden>Select a Query Category From the List Below</option>
                                     <?php foreach ( $resultsquerytypes as $option ) : ?>
                                          <option value="<?php echo $option->type_id; ?>"><?php echo $option->type_name; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="department" class="uniform-text">Target Department</label>
                                <select class="form-control" name="department">
                                    <option value="" selected hidden>Choose a Department from the List Below</option>
                                     <?php foreach ( $resultsdeparment as $option ) : ?>
                                          <option value="<?php echo $option->department_id; ?>"><?php echo $option->department_name; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="querydescription" class="uniform-text">Query Description</label>
                                <textarea class="form-control rounded-0" id="querydescription" name="querydescription" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="attachdocument">Attach Relevant Document</label>
                                <input type="file" class="form-control-file" id="attachdocument" name="attachdocument">
                            </div>
                            <button type="submit" value="submit" class="btn btn-block btn-success uniform-text">Submit Query</button>
                        </form>
                        
                    </div>                
                </div>
        </body>
    </html>