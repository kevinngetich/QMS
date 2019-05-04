   <?php 
    include("config.php");
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location: index.php");
    }

    $type_id = $_GET['typeid'];
    if(isset($typeid)){
        $deletetype = "DELETE FROM query_types WHERE type_id='$typeid'";
        $result = mysqli_query($db,$deletetype);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if(count == 1){
            header("location: success.php");
        }
        else{
            var_dump(mysqli_error($db));
        }   
    }
    
?>
