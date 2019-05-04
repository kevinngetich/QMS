   <?php 
    include("config.php");
    session_start();
    if(!isset($_SESSION['staff'])){
        header("location: index.php");
    }

    $responder_id = $_SESSION['staff'];
    $queryid = $_GET['queryid'];
    $recepientid = $_GET['sender']; 
    $recepient = $recepientid;
    $cleared = "Cleared";

    if(isset($_POST['submitquery'])) {
        $response = mysqli_real_escape_string($db, $_POST['response']);
        $attachment = mysqli_real_escape_string($db, $_POST['attachdocument']);
        

        // attempt insert query execution
        $sql = "INSERT INTO responses (query_id, responder_id, recepient_id, response, relevant_document) VALUES ('$queryid', '$responder_id', '$recepient', '$response', '$attachment')";
        //echo '<script type="text/javascript"> alert("Couldnt respond to the Query");</script>';
        $markcleared = "UPDATE queries SET status='$cleared' WHERE query_id='$queryid'";
        //echo '<script type="text/javascript"> alert("Couldnt respond to the Query");</script>';

        if(mysqli_query($db, $sql) && mysqli_query($db, $markcleared)){
            //echo "Records added successfully.";
            unset($_SESSION['queryid']);
            unset($_SESSION['sender']);
            echo '<script type="text/javascript">window.open("success.php", "_self");</script>';
        } else{
            //echo '<script type="text/javascript"> alert("Couldnt respond to the Query");</script>';
            
            echo '<script type="text/javascript"> window.open("error.php","_self");</script>';
            //echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
            //header("location: error.php");            
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
                        <h3>Query Response Form  
                        <br>
                        <hr>
                        </h3> 
                        <form class="form-container-2" action=" " method="POST">
                            <div class="form-group">
                                <label for="queryid" class="uniform-text">Query ID</label>
                                <input type="text" name="queryid" class="form-control" value="<?php echo $queryid;?>" disabled/>
                            </div>
                            <div class="form-group">
                                <label for="receptient" class="uniform-text">Recepient</label>
                                <input type="text" name="sendto" class="form-control" value="<?php echo $recepient;?>" disabled />
                            </div>
                            <div class="form-group">
                                <label for="response" class="uniform-text">Response</label>
                                <textarea class="form-control rounded-0" id="queryresponse" name="response" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="attachdocument">Attach Relevant Document</label>
                                <input type="file" class="form-control-file" id="attachdocument" name="attachdocument">
                            </div>
                            <button type="submit" name="submitquery" value="submit" class="btn btn-block btn-success uniform-text">Submit Response</button>
                        </form>
                    </div>                
                </div>
        </body>
    </html>