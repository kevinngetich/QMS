   <?php 
    include("config.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location: index.php");
    }

    $staffid = $_GET['staffid'];
    if(isset($staffid)){
        //var_dump($staffid);
    
        $deletestaff = "DELETE FROM staff WHERE staff_id='$staffid'";
        if(mysqli_query($db,$deletestaff)){
            echo '<script type="text/javascript">window.open("success.php", "_self");</script>';
        }
        else{
            var_dump(mysqli_error($db));
        }
        
    }
    
?>
