<?php   
    session_start();
    if(!isset($_SESSION['staff'])) // If session is not set then redirect to Login Page
       {
           header("Location:index.php");  
       }
    $_SESSION['usergroup'] = 'staff';
    $_SESSION['home'] = "staffdashboard.php";
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
                    <div class="col-lg-2" id="sidebar">
                    <nav class="navbar bg-dark navbar-dark sidebar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="collapse" href="#queries" role="link" aria-expanded="false" aria-controls="queries">
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
                    <div class="col-lg-5">
                        <div class="card" style="width: 18rem; height: 100%;">
                            <img class="card-img-top" src="images/queries.png" alt="Card image cap">
                            <div class="card-body">
                                
                                <h5 class="card-title text-primary">Student Queries</h5>
                                <p class="card-text">View & respond to student queries</p>
                                <a href="staffqueryview.php" class="btn btn-primary">View Student Queries</a>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-5">
                        <div class="card" style="width: 18rem; height: 100%;">
                            <img class="card-img-top" src="images/replies.png" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Reply History</h5>
                                <p class="card-text">View your query reply history..</p>
                                <a href="staffreplies.php" class="btn btn-primary">View Reply History</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </body>
    </html>