<?php 
    include("config.php");
    session_start();
    
    if(isset($_POST['addaccount'])){
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $user_name = $_POST['username'];
        $password = $_POST['password'];

        // attempt insert query execution
        $sql = "INSERT INTO users (firstname, lastname, username, password) VALUES ('$first_name', '$last_name', '$user_name', '$password')";
        if(mysqli_query($db, $sql)){
            $_SESSION['newuser'] = "newuser";
            echo '<script type="text/javascript"> window.open("success.php","_self");</script>';
        } else{
            echo '<script type="text/javascript"> alert("Unable To Create New User Account"); window.open("managestaffaccounts.php", "_self");';
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
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Login</a>    
                            </li>    
                        </ul>
                    </nav>
                </div>
                <div class="row" id="mycontent">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-7">
                        
                        <form action="" method="POST" style="   border: 0px solid;
                                                                    padding: 50px 60px;
                                                                    margin-top: vh;
                                                                    -webkit-box-shadow: -4px 5px 28px -2px rgba(0,0,0,0.75);
                                                                    -moz-box-shadow: -4px 5px 28px -2px rgba(0,0,0,0.75);
                                                                    box-shadow: -4px 5px 28px -2px rgba(0,0,0,0.75);"
                                                                                    >
                            <div class="form-group">
                                <label for="firstname" class="uniform-text">First Name</label> 
                                <input type="text" class="form-control" name="firstname" placeholder="First Name" />
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="uniform-text">Last Name</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name" />
                            </div>
                            <div class="form-group">
                                <label for="username" class="uniform-text">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="User Name" />
                            </div>
                            <div class="form-group">
                                <label for="password" class="uniform-text">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" />
                            </div>
                            <button type="submit" name="addaccount" value="submit" class="btn btn-block btn-success uniform-text">Create Your Account</button>
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
                    
            </div>

        </body>
    </html>
        