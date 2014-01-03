<?php
    // Connexion à la base de données et on vérifie si on est connecté (session ou cookie)
    require_once 'includes/connect.inc.php';
    require_once 'libs/Smarty.class.php';
    $smarty = new Smarty();
    $erreur_connection="";
    // Si on tente de se connecter
    if (isset($_POST['connect'])) 
    {   // On vérifie si les champs sont bien postés
        if ((!empty($_POST['login'])) && !empty($_POST['pwd'])) {
            $login = $_POST['login']; // Récupération login
            $pwd = $_POST['pwd']; // Récupération mot de passe
            // On recherche si il y a une correspondance dans la BDD
            $search_login = "SELECT * FROM login WHERE user='$login' AND pwd=PASSWORD('$pwd')";
            $result = mysql_query($search_login) or die('Erreur connexion');
            $reponse = mysql_fetch_array($result);
            // Si un résultat nous est retourné => on peut démarrer une session ou cookie
            if (!empty($reponse)) {
                extract($reponse);
                // On crée la session
                session_start();
                $_SESSION['login'] = $login;
		$_SESSION['pwd'] = $pwd;
                // Si l'utilisateur à choisi "Rester connecter"
                if (isset($_POST['cookie'])) {
                    // on crée un cookie
                    $temps = 15 * 60;
                    $cookie = md5($reponse['user'] . time());
                    $user = $reponse['user'];
                    setcookie("cookie", $cookie, time() + $temps);
                    $requete = "UPDATE login SET cookie='$cookie' WHERE user='$user'";
                    mysql_query($requete);
                } else 
                {
                    $requete = "UPDATE login SET session='0' WHERE user='$login'";
                    mysql_query($requete);
                }
                $erreur_connection = "";
                header('Location: index.php'); // Redirection vers la page index
                exit();
            } else // Seulement quand JS sera désactivé chez le client
                $erreur_connection = "Vérifiez les informations saisies ! ";
        } else 
            $erreur_connection = "Veuillez saisir un login et un mot de passe ! ";
    } 
    // Elements de mise en page
    include_once 'includes/header.inc.php';
    $smarty->assign("erreur_connection", $erreur_connection);
    if (isset($_POST['connect']))
    {
        $smarty->assign("login", $_POST['login']);
        $smarty->assign("pwd", $_POST['pwd']);
    }
    $smarty->display("template/connect.tpl");
    include_once 'includes/menu.inc.php';
    include_once 'includes/footer.inc.php';
?>