<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
       
       if(isset($_POST['username'])) {       
            $myusername = mysqli_real_escape_string($db,$_POST['username']);
            $unhashedpass = mysqli_real_escape_string($db,$_POST['password']);
            $mypassword = md5($unhashedpass);
            $sql = "SELECT userid FROM users WHERE username = '$myusername' and password = '$mypassword'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            
            $count = mysqli_num_rows($result);

            
            if($count == 1) {
                $_SESSION['user']=$row['userid'];
                echo '<script type="text/javascript"> window.open("studentdashboard.php","_self");</script>';

            }else {
                $sql = "SELECT staff_id FROM staff WHERE username = '$myusername' and password = '$mypassword'";
                $result = mysqli_query($db,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                
                $count = mysqli_num_rows($result);

                
                if($count == 1) {
                    $_SESSION['staff']=$row['staff_id'];
                    echo '<script type="text/javascript"> window.open("staffdashboard.php","_self");</script>';
                } else {
                    $adminsql = "SELECT adminid FROM administrators WHERE username = '$myusername' and password = '$mypassword'";
                    $adminresult = mysqli_query($db,$adminsql);
                    $adminrow = mysqli_fetch_array($adminresult,MYSQLI_ASSOC);
                    
                    $count = mysqli_num_rows($adminresult);
                    if($count == 1) {
                    $_SESSION['admin']=$adminrow['adminid'];
                    echo '<script type="text/javascript"> window.open("admindashboard.php","_self");</script>';
                    } else {
                    echo '<script type="text/javascript"> alert("Failed: The Username or Password you entered is incorrect.");</script>';
                    header("location: index.php"); 
                    }
                }
            }
       }
   }
?>


<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Open University QMS</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, intitial-scale=1">
            <link href="http://fonts.googleapis.com/css?family=Corben:bold" rel="stylesheet" type="text/css">
            <link href="http://fonts.googleapis.com/css?   family=Nobile" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="css/bootstrap.min.css"/>
            <link rel="stylesheet" type="text/css" href="css/custom.css"/>
            <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
        </head>
        <body>
            <div class="container-fluid bg">
                
                <div class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
                    <a class="navbar-brand" href="#">Open University QMS</a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="nav-link" href="newuser.php">Register As User</a>
                        </li>
                    </ul>
                </div>
                
                <div class="row">
                    <div class="col-xl-6">
                        <form class="page-content">
                            <p class="display-4"> Welcome to the Open Universtiy QMS</p>
                        </form>
                    </div>
                    <div class="col-xl-4">
                        <form class="form-container" action=" " method="POST">
                            <div class="form-group">
                                <label for="username" class="uniform-text">User Name</label>
                                <input type="text" class="form-control" name="username" placeholder="User Name" />
                            </div>
                            <div class="form-group">
                                <label for="password" class="uniform-text">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" />
                            </div>
                            <button type="submit" value="submit" class="btn btn-block uniform-text">Login</button>
                            <button type="reset" class="btn btn-block uniform-text">Reset</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </body>
    </html>

