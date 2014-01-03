<?php
    // Démarre une session
    session_start();
    $host = "sql.free.fr";
    $user = "toto";
    $pass = "123456";
    $base = "toto";
    // On se connecte à la base de données
    mysql_connect("$host","$user","$pass") or die ("Impossible de se connecter : ".  mysql_error()); 
    mysql_select_db("$base");    
    if (isset($_COOKIE['cookie'])) // si il y a le cookie correspondant au site
    {
        // On vérifie si la valeur du cookie correspond à un cookie dans la BDD
        // Cela évite que l'on crée un cookie manuellement pour avoir accès à l'administration
        $cookie=$_COOKIE['cookie'];
        $requete = "SELECT * FROM login WHERE cookie='$cookie'";
        $result = mysql_query($requete);
        $reponse = mysql_fetch_array($result);
        extract($reponse);
        if ($reponse['cookie'] == $cookie)
            $state_connect = true;      // Si ok on est connecté
        else
            $state_connect = false;     // Si nok statut déconnecté
    }
    elseif (isset($_SESSION['login']) && isset($_SESSION['pwd'])) // Si on n'est pas connecté par cookie mais par session
        $state_connect = true;  // on est connecté
    else
        $state_connect = false;
?>
