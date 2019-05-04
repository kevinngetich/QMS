<?php 
    include("config.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location: index.php");
    }

    if(isset($_POST['addtype'])){
        $type_name = $_POST['typename'];
        $type_description = $_POST['typedescription'];
        //$urgency = $_POST['urgency'];
        
        $sql = "INSERT INTO query_types (type_name, type_description) VALUES ('$type_name', '$type_description')";
        if(mysqli_query($db, $sql)){
            echo '<script type="text/javascript"> window.open("success.php","_self");</script>';
        } else{
            echo '<script type="text/javascript"> alert("Unable To Create New Query Type"); window.open("managequerytypes.php", "_self");';
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
                    <div class="col-lg-1"></div>
                    <div class="col-lg-7">
                        <h1> New Query Category </h1>
                        <hr>
                        <form action="" method="POST" style="   border: 0px solid;
                                                                    padding: 50px 60px;
                                                                    margin-top: vh;
                                                                    -webkit-box-shadow: -4px 5px 28px -2px rgba(0,0,0,0.75);
                                                                    -moz-box-shadow: -4px 5px 28px -2px rgba(0,0,0,0.75);
                                                                    box-shadow: -4px 5px 28px -2px rgba(0,0,0,0.75);"
                                                                                    >
                            <div class="form-group">
                                <label for="typename" class="uniform-text">Type Name</label> 
                                <input type="text" class="form-control" name="typedescription" placeholder="Type Name" />
                            </div>
                            <div class="form-group">
                                <label for="typedescription" class="uniform-text">Description</label>
                                <input type="text" class="form-control" name="typedescription" placeholder="Type Description" />
                            </div>
                            <div class="form-group">
                                <label for="urgency" class="uniform-text">Urgency Factor</label>
                                <input type="text" class="form-control" name="urgency" placeholder="Urgency Ractor" />
                            </div>
                            <button type="submit" name="addtype" value="submit" class="btn btn-block btn-success uniform-text">Add Query Type</button>
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
                    
            </div>

        </body>
    </html>
        