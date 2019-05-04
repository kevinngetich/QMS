   <?php 
    include("config.php");
    session_start();
    if(!isset($_SESSION['staff'])){
        header("location: index.php");
    }

    $forwarder_id = $_SESSION['staff'];
    $queryid = $_GET['queryid'];
    $recepientid = $_GET['sender']; 
    $recepient = $recepientid;

    $selection1 = "SELECT * FROM departments";
    $query1 = mysqli_query($db, $selection1);
    while ( $resultsdeparment[] = mysqli_fetch_object ( $query1 ) );
    array_pop ( $resultsdeparment );
    
    if(isset($_POST['forwardquery'])) {
        $remarks = $_POST['remarks'];
        $department_id = $_POST['department'];
        
        $sql = "UPDATE queries SET department_id='$department_id', remarks='$remarks', forwarded=1, forwarderid='$forwarder_id' WHERE query_id='$queryid'";
        //echo '<script type="text/javascript"> alert("Couldnt respond to the Query");</script>';
        if(mysqli_query($db, $sql)){
            echo '<script type="text/javascript">window.open("success.php", "_self");</script>';
        } else{
            echo '<script type="text/javascript"> window.open("error.php","_self");</script>';
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
                        <h3>Forward Query Form 
                        <br>
                        <hr>
                        </h3> 
                        <form class="form-container-2" action=" " method="POST">
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
                                <label for="remarks" class="uniform-text">Remarks</label>
                                <textarea class="form-control rounded-0" id="remarks" name="remarks" rows="10"></textarea>
                            </div>
                            <button type="submit" name="forwardquery" value="submit" class="btn btn-block btn-success uniform-text">Forward Query</button>
                        </form>
                    </div>                
                </div>
        </body>
    </html>