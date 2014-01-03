<?php
    // on vérifie si on est connecté (session ou cookie)
    require_once 'includes/connect.inc.php';
    // Si pas connecté on renvoie vers la page de connexion
    if (!$state_connect) 
    { 
        header ('Location: connect.php'); 
        exit();  
    } 
?>