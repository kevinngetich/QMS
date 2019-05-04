<?php
    session_start();
    $home = $_SESSION['home'];
    header("location: $home");
?>