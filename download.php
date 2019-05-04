<?php
session_start();
$filename = $_SESSION['filename'];
header("Content-Disposition: attachment; filename=$filename");
ob_clean();
flush();
echo $file;
?>