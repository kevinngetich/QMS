<?php 
    include("config.php");
    session_start();

    if(isset($_SESSION['user'])){
        echo '<script lang="JavaScript">
                    window.setTimeout(function(){

                    // Move to a new location or you can do something else
                    
                    window.location.href = "studentdashboard.php";

                    }, 2500);
                </script>';
    }
    else if(isset($_SESSION['staff'])){
        echo '<script lang="JavaScript">
                    window.setTimeout(function(){

                    // Move to a new location or you can do something else
                    
                    window.location.href = "staffqueryview.php";

                    }, 2500);
                </script>';
    }
    else if(isset($_SESSION['admin'])){
        echo '<script lang="JavaScript">
                    window.setTimeout(function(){

                    // Move to a new location or you can do something else
                    
                    window.location.href = "admindashboard.php";

                    }, 2500);
                </script>';
    }
    else if(isset($_SESSION['newuser'])){
        echo '<script lang="JavaScript">
                    window.setTimeout(function(){

                    // Move to a new location or you can do something else
                    
                    window.location.href = "index.php";

                    }, 2500);
                </script>';
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
                    <div class="col-lg-8">
                            <img src="images/spin.gif" style="padding-top: 150px;"/>
                    </div>           
                    
                </div>
                
        </body>
    </html>