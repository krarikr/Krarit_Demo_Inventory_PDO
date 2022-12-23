<?php 

    session_start();
    ob_start();
    header("location: index.php");
    session_destroy();

?>