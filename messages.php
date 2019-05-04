<?php 
    include("config.php");
    session_start();

    if(isset($_SESSION['user'])){
        $searchid = $_SESSION['user'];
    }
    else if(isset($_SESSION['staff'])){
        $searchid = $_SESSION['staff'];
    }
    else if(isset($_SESSION['admin'])){
        $searchid = $_SESSION['admin'];
    }
    else{
        header("location: index.php");
    }
    $retreive =  "SELECT * FROM messages WHERE recepient_id='$searchid' OR sender_id='$searchid'";
    $messages = mysqli_query($db, $retreive);    
    while ( $resultmessages[] = mysqli_fetch_object ( $messages ) );
    array_pop ( $resultmessages );

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
                                <a class="nav-link" href="#responses">
                                Settings
                                </a>
                            </li>
                        </ul>
                    </nav>
                    </div>
                    <div class="col-lg-2">
                        <hi><button class="btn btn-default">New Message</button></hi>
                        <br>
                        <hr>
                        <table class="table table-striped table-bordered table-hover" id="messagetable" name="messagetable">
                            <thead>
                                <tr>
                                    <th>Query ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ( $resultmessages as $row ) : ?>
                                        <tr>
                                            <td>
                                                <?php
                                                    if ($row->sender_id == $searchid){
                                                        $checkifstaff = "SELECT username FROM staff WHERE staff_id = '$row->recepient_id'";
                                                        $checkifuser = "SELECT username FROM users WHERE userid = '$row->recepient_id'";
                                                        $checkifadmin = "SELECT username FROM administrators WHERE adminid = '$row->recepient_id'";
                                                        $fetchstaffname = mysqli_query($db, $checkifstaff);
                                                        $fetchusername = mysqli_query($db, $checkifuser);
                                                        $fetchadminname = mysqli_query($db, $checkifadmin);
                                                        $staffdetails = mysqli_fetch_array($fetchstaffname, MYSQLI_ASSOC);
                                                        $userdetails = mysqli_fetch_array($fetchusername, MYSQLI_ASSOC);
                                                        $admindetails = mysqli_fetch_array($fetchadminname, MYSQLI_ASSOC);
                                                        $staff_name = $staffdetails['username'];
                                                        $user_name = $userdetails['username'];
                                                        $admin_name = $admindetails['username'];
                                                        if(strlen($staff_name) != 0){
                                                            echo "$staff_name";
                                                        } else if(strlen($user_name) != 0){
                                                            echo "$user_name";
                                                        } else if(strlen(admin_name) != 0){
                                                            echo "$admin_name";
                                                        } else {
                                                            echo "Unknown User";
                                                        }

                                                    }else if($row->recepient_id == $searchid){
                                                        $checkifstaff = "SELECT username FROM staff WHERE staff_id = '$row->sender_id'";
                                                        $checkifuser = "SELECT username FROM users WHERE userid = '$row->sender_id'";
                                                        $checkifadmin = "SELECT username FROM administrators WHERE adminid = '$row->sender_id'";
                                                        $fetchstaffname = mysqli_query($db, $checkifstaff);
                                                        $fetchusername = mysqli_query($db, $checkifuser);
                                                        $fetchadminname = mysqli_query($db, $checkifadmin);
                                                        $staffdetails = mysqli_fetch_array($fetchstaffname, MYSQLI_ASSOC);
                                                        $userdetails = mysqli_fetch_array($fetchusername, MYSQLI_ASSOC);
                                                        $admindetails = mysqli_fetch_array($fetchadminname, MYSQLI_ASSOC);
                                                        $staff_name = $staffdetails['username'];
                                                        $user_name = $userdetails['username'];
                                                        $admin_name = $admindetails['username'];
                                                        if(strlen($staff_name) != 0){
                                                            echo "$staff_name";
                                                        } else if(strlen($user_name != 0)){
                                                            echo "$user_name";
                                                        } else if(strlen(admin_name) != 0){
                                                            echo "$admin_name";
                                                        } else {
                                                            echo "Unknown User";
                                                        }

                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>          
                </div>
                
        </body>
    </html>