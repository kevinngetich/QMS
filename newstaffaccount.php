<?php 
    include("config.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location: index.php");
    }

    if(isset($_POST['addaccount'])){
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $user_name = $_POST['username'];
        $department_id = $_POST['department'];
        $password = $_POST['password'];

        // attempt insert query execution
        $sql = "INSERT INTO staff (firstname, lastname, username, department_id, password) VALUES ('$first_name', '$last_name', '$user_name', '$department_id', '$password')";
        if(mysqli_query($db, $sql)){
            echo '<script type="text/javascript"> window.open("success.php","_self");</script>';
        } else{
            echo '<script type="text/javascript"> alert("Unable To Create New User Account"); window.open("managestaffaccounts.php", "_self");';
        }
    }        
    $selection1 = "SELECT * FROM departments";
    $query1 = mysqli_query($db, $selection1);
    while ( $resultsdeparment[] = mysqli_fetch_object ( $query1 ) );
    array_pop ( $resultsdeparment );
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
                        <h1> New Staff Account </h1>
                        <hr>
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
                                <label for="department" class="uniform-text">Department</label>
                                <select class="form-control" name="department">
                                    <option value="" selected hidden>Choose a Department from the List Below</option>
                                     <?php foreach ( $resultsdeparment as $option ) : ?>
                                          <option value="<?php echo $option->department_id; ?>"><?php echo $option->department_name; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password" class="uniform-text">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" />
                            </div>
                            <button type="submit" name="addaccount" value="submit" class="btn btn-block btn-success uniform-text">Create Staff Account</button>
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
                    
            </div>

        </body>
    </html>
        