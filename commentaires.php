<?php
    // Connexion à la base de données et on vérifie si on est connecté (session ou cookie)
    require_once 'includes/connect.inc.php';
    require_once 'libs/Smarty.class.php';
    $smarty = new Smarty();    
    // Si l'on 
    if (isset($_GET['id_article']) || isset($_POST['commentaire'])) {        
        $id_article = $_GET['id_article'];
        // Si on envoie un commentaire
        if(isset($_POST['commentaire']))
        {   // Récupération des champs
            if (isset($_POST['auteur']))
                $auteur = $_POST['auteur'];
            if (isset($_POST['mail']))
                $mail = $_POST['mail'];
            if (isset($_POST['commentaire']))
                $commentaire = $_POST['commentaire'];
            $date = date("Y") . '-' . date("m") . '-' . date("d") . ' ' . date("H") . ':' . date("i") . ':' . date("s");
            $ajout_commentaire = "INSERT INTO `commentaire`(`id_commentaire`, `id_article`, `auteur`, `mail`, `commentaire`, `date_commentaire`) VALUES ('','$id_article','$auteur','$mail','$commentaire','$date')";
            mysql_query($ajout_commentaire); // Exécution de la requête d'ajout de commentaire
        }
        // Récupération de l'article voulu
        $article = "SELECT id_article, contenu, titre, statut, DATE_FORMAT(date, '%d/%m/%Y à %HH%i') as date FROM article WHERE article.id_article = $id_article";  
        $requete = mysql_query($article);
        $data_article = array();
        while ($ligne = mysql_fetch_array($requete))
        {
            $ligne['contenu'] = nl2br($ligne['contenu']); // A chaque retour chariot, on ajoute un <BR>
            $data_article = $ligne;
        }
        // Récupération des commentaires correspondant à l'article
        $commentaire = "SELECT auteur, mail, commentaire, DATE_FORMAT(date_commentaire, '%d/%m/%Y à %Hh%i') as date FROM commentaire WHERE commentaire.id_article = $id_article ORDER BY date_commentaire DESC";
        $countcommentaire = mysql_query("SELECT COUNT(*) AS nbcommentaire FROM commentaire WHERE commentaire.id_article = $id_article");
        $sql = mysql_query($commentaire);
        $nbcommentaire = mysql_fetch_array($countcommentaire);
        $data_comment = array();
        while ($ligne = mysql_fetch_array($sql)) 
        {
            $ligne['commentaire'] = nl2br($ligne['commentaire']);
            $data_comment[] =  $ligne;
            
        }        
    }
    // Elements de mise en page
    require_once 'includes/header.inc.php';  
    $smarty->assign("state_connect",$state_connect);
    $smarty->assign("nbcommentaire",$nbcommentaire['nbcommentaire']);
    $smarty->assign("data_comment",$data_comment);
    $smarty->assign("data_article",$data_article);
    $smarty->display("template/commentaires.tpl");
    include_once 'includes/menu.inc.php';
    include_once 'includes/footer.inc.php';     
?>
