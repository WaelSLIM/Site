<?php
    // On détruit le cookie et la session
    setcookie('cookie', NULL, -1);
    session_start();  
    session_unset();  
    session_destroy();  
    header('Location: index.php');  
    exit(); 
?>
