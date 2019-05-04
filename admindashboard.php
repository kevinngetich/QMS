<?php 
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location: index.php");
    }
    $_SESSION['usergroup'] = 'admin';
    $_SESSION['home'] = "admindashboard.php";
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
                                <a class="nav-link active" href="admindashboard.php">
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
                    
                    <div class="col-lg-3">
                        <div class="card" style="width: 18rem; height: 100%">
                            <img class="card-img-top image" src="images/accounts.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Manage Staff Member Accounts</h5>
                                <p class="card-text"><dl>Review Staff Member account details. Add, Remove.</dl></p>
                                <a href="managestaffaccounts.php" class="btn btn-primary">Staff-Member Accounts</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-3">
                        <div class="card-block" style="width: 18rem; height: 100%">
                            <img class="card-img-top image" src="images/categories.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Manage Query Type Information</h5>
                                <p class="card-text"><dl>View and Edit Quety type information.</dl></p>
                                <a href="managequerytypes.php" class="btn btn-primary">Query Types</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </body>
    </html>