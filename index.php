<?php
    // Connexion à la base de données et on vérifie si on est connecté (session ou cookie)
    require_once 'includes/connect.inc.php';
    require_once 'libs/Smarty.class.php';
    // Si on modifie le nombre d'articles par page
    if (isset($_POST['choix_nb_article'])) 
        $messagesParPage = $_POST['choix_nb_article'];
    else // Sinon par défaut 2
        $messagesParPage = 2;    
    $smarty=new Smarty();
    $recherche="";
    if (isset($_GET['rechercher'])) // On compte le nombre d'articles dans le cas d'une recherche ou d'affichage normal de l'index
    {
        $recherche = $_GET['rechercher'];
        $nb_article = mysql_query("SELECT COUNT(*) AS total FROM `article` WHERE ((`contenu` LIKE '%$recherche%' OR `titre` LIKE '%$recherche%') AND article.statut = 1)");
    }
    else
        $nb_article = mysql_query('SELECT COUNT(*) AS total FROM `article` WHERE article.statut = 1'); // Nombre total d'articles   
    $donnees_total = mysql_fetch_array($nb_article); // on récupère le retour de la requete
    $total_articles = $donnees_total['total']; //On récupère le total d'articles
    $nombreDePages = ceil($total_articles / $messagesParPage); //on calcule le nombre de page
    if (isset($_GET['page'])) // Si on demande une page précise on récupère ce numéro de page
    {
        $pageActuelle = intval($_GET['page']);
        if ($pageActuelle > $nombreDePages) // Si la valeur de $pageActuelle est plus grande que $nombreDePages...
            $pageActuelle = $nombreDePages;
    }
    else  // Sinon la page par défaut est la page 1 
        $pageActuelle = 1;
    $premierArticle = ($pageActuelle - 1) * $messagesParPage; // On calcul la numéro du premier aticle
    if (isset($_GET['rechercher'])) // Requete selon si on recherche un article ou si on affiche la page d'index normalement
        $articles = "SELECT id_article, contenu, titre, DATE_FORMAT(date, '%d/%m/%Y à %HH%i') as date_article FROM `article` WHERE ((`contenu` LIKE '%$recherche%' OR `titre` LIKE '%$recherche%') AND article.statut = 1) ORDER BY date DESC LIMIT $premierArticle, $messagesParPage";
    else
        $articles = "SELECT id_article, contenu, titre, DATE_FORMAT(date, '%d/%m/%Y à %HH%i') as date_article FROM article WHERE article.statut = 1 ORDER BY date DESC LIMIT $premierArticle, $messagesParPage";
    $liste_articles = mysql_query($articles);
    $articles = array();
    while ($ligne = mysql_fetch_array($liste_articles)) {
        $ligne['contenu'] = nl2br($ligne['contenu']); // met des <br> a chaque retour chariot
        $id = $ligne['id_article'];
        // On compte le nombre de commentaire correspondant à l'article
        $countcommentaire = mysql_query("SELECT COUNT(*) AS nbcommentaire FROM commentaire WHERE commentaire.id_article = $id ");
        $nbcommentaire = mysql_fetch_array($countcommentaire);        
        $ligne['nbcommentaire'] = $nbcommentaire['nbcommentaire'];
        $articles[] = $ligne;
    }    
    // Elements de mise en page
    include_once 'includes/header.inc.php';  
    $smarty->assign("total_articles",$total_articles);    
    $smarty->assign("recherche",$recherche); 
    $smarty->assign("messagesParPage",$messagesParPage); 
    $smarty->assign("state_connect",$state_connect);
    $smarty->assign("articles",$articles);
    $smarty->assign("nombreDePages",$nombreDePages);
    $smarty->assign("pageActuelle",$pageActuelle);
    $smarty->display("template/index.tpl");
    include_once 'includes/menu.inc.php';
    include_once 'includes/footer.inc.php';
?>