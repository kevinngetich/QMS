<?php 
    include("config.php");
    session_start();


    if(isset($_SESSION['user'])){
        $userid = $_SESSION['user'];
        $getdetails = "SELECT * FROM users WHERE userid=$userid";
        $details = mysqli_query($db, $getdetails);
        $userdetails = mysqli_fetch_array($details, MYSQLI_ASSOC);
        
        if(isset($_POST['update'])) {
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $user_name = $_POST['username'];
        $password = $_POST['password'];
        $hashedpass = md5($password);
            
        $sql = "UPDATE users SET firstname='$first_name', lastname='$last_name', username='$user_name', password='$hashedpass' WHERE userid='$userid'";
        $result = mysqli_query($db,$sql);
        //$count = mysqli_num_rows($result);

        if($result){
            echo '<script type="text/javascript"> window.open("success.php","_self");</script>';
        } else{
            echo '<script type="text/javascript"> alert("Update Unsuccessful"); window.open("profilesettings.php","_self");</script>';
        }
        }
    }
    else if(isset($_SESSION['staff'])){
        $userid = $_SESSION['staff'];
        $getdetails = "SELECT * FROM staff WHERE staff_id=$userid";
        $details = mysqli_query($db, $getdetails);
        $userdetails = mysqli_fetch_array($details, MYSQLI_ASSOC);
        
        if(isset($_POST['update'])) {
        $first_name = mysqli_real_escape_string($db, $_POST['firstname']);
        $last_name = mysqli_real_escape_string($db, $_POST['lastname']);
        $user_name = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $hashedpass = md5($password);
            
        $sql = "UPDATE staff SET firstname='$first_name', lastname='$last_name', username='$user_name', password='$hashedpass' WHERE staff_id='$userid'";
        $result = mysqli_query($db,$sql);
        //$count = mysqli_num_rows($result);

        if($result){
            echo '<script type="text/javascript"> window.open("success.php","_self");</script>';
        } else{
            echo '<script type="text/javascript"> alert("Update Unsuccessful"); window.open("profilesettings.php","_self");</script>';
        }
        }

    }
    else if(isset($_SESSION['admin'])){
        $userid = $_SESSION['admin'];
        $getdetails = "SELECT * FROM administrators WHERE adminid=$userid";
        $details = mysqli_query($db, $getdetails);
        $userdetails = mysqli_fetch_array($details, MYSQLI_ASSOC);
        
        if(isset($_POST['update'])) {
        $first_name = mysqli_real_escape_string($db, $_POST['firstname']);
        $last_name = mysqli_real_escape_string($db, $_POST['lastname']);
        $user_name = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $hashedpass = md5($password);
            
        $sql = "UPDATE administrators SET firstname='$first_name', lastname='$last_name', username='$user_name', password='$hashedpass' WHERE adminid='$userid'";
        $result = mysqli_query($db,$sql);
        //$count = mysqli_num_rows($result);

        if($result){
            //var_dump($hashedpass);
            echo '<script type="text/javascript"> window.open("success.php","_self");</script>';
        } else{
            echo '<script type="text/javascript"> alert("Update Unsuccessful"); window.open("profilesettings.php","_self");</script>';
        }
        }

    }
    else{
        header("location: index.php");
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
                                <a class="nav-link" href="redirect.php">
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
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-5">
                        <p class="display-4" align="center">Profile Details</p>
                        
                            <form action="" method="POST" style="   border: 0px solid;
                                                                    padding: 50px 60px;
                                                                    margin-top: vh;
                                                                    -webkit-box-shadow: -4px 5px 28px -2px rgba(0,0,0,0.75);
                                                                    -moz-box-shadow: -4px 5px 28px -2px rgba(0,0,0,0.75);
                                                                    box-shadow: -4px 5px 28px -2px rgba(0,0,0,0.75);"
                                                                                    >
                            <div class="form-group">
                                <label for="firstname" class="uniform-text">First Name</label>
                                <input type="text" class="form-control" name="firstname" placeholder="<?php echo $userdetails['firstname'];?>" />
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="uniform-text">Last Name</label>
                                <input type="text" class="form-control" name="lastname" placeholder="<?php echo $userdetails['lastname'];?>" />
                            </div>
                            <div class="form-group">
                                <label for="username" class="uniform-text">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="<?php echo $userdetails['username'];?>" />
                            </div>
                            <div class="form-group">
                                <label for="password" class="uniform-text">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="***********" />
                            </div>
                            <button type="submit" name="update" value="submit" class="btn btn-block btn-success uniform-text">Update</button>
                        </form>
                    </div>           
                    
                </div>
                
        </body>
    </html>