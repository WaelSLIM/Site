<?php
    function suppression_img($dossier_img, $id_article)
    {
        //On ouvre le répertoire contenant les images
        $repertoire = opendir($dossier_img);
        // On va parcourir tout les fichiers du répertoire
        while (false !== ($fichier = readdir($repertoire)))
        {
            $chemin = ($dossier_img.$fichier);//Récupère le chemin absolu de chaque fichier
            $info_chemin = pathinfo("$chemin");
            // $fichier[0]=>0nom du fichier, $fichier[1]=>extension du fichier
            $fichier = explode(".",$info_chemin['basename']);
            // Si le nom du fichier correspond à l'id article
            if ($fichier[0] == "$id_article")
                unlink($chemin); // On supprime ce fichier
        }
        closedir($dossier_img); // On ferme le répertoire
    }
?>
<?php
    // Connexion à la base de données et on vérifie si on est connecté (session ou cookie)
    require_once 'includes/connect.inc.php';
    require_once 'libs/Smarty.class.php';       
    $smarty=new Smarty();
    // Si on veut changer un statut 
    if (isset($_POST['change_state']) && $_GET['id_article'])
    {        
        $statut_voulu = $_POST['change_state'];
        $id_article = $_GET['id_article'];
        // Si on veut le publier on passera le statut à 1
        if (strcmp($statut_voulu, "Publier") == 0)
            $change_state = "UPDATE  `article` SET  `statut` =  '1' WHERE `id_article` = $id_article";
        else // Sinon on passera le statut à 0
            $change_state = "UPDATE  `article` SET  `statut` =  '0' WHERE `id_article` = $id_article";
        mysql_query($change_state);
    }   // Si on veut supprimer un article
    else if (isset ($_POST['del_article']) && $_GET['id_article'])
    {
        $id_article = $_GET['id_article'];
        $del_commentaire = "DELETE FROM commentaire WHERE id_article = $id_article";
        mysql_query($del_commentaire);
        $del_article = "DELETE FROM article WHERE id_article = $id_article";
        $reponse = mysql_query($del_article);
        // Si la suppression s'est bien passée on supprime l'image correspondant à l'article
        if ($reponse)
            suppression_img ("up_img/", $id_article);
    }
    // On récupère tout les articles 
    $articles = "SELECT `id_article`,`titre`,`statut`, DATE_FORMAT(`date`, '%d/%m/%Y à %HH%i') as date FROM `article` ORDER BY statut";
    $articles = mysql_query($articles);
    $liste_articles = array();
    while ($ligne = mysql_fetch_array($articles)) {
        $ligne['statut'] = ($ligne['statut']) ? 'Non publier' : 'Publier'; // Si statut vaut 0 "Non publier"
        $liste_articles[] = $ligne;
    }
    // Elements de mise en page
    include_once 'includes/header.inc.php';      
    $smarty->assign("articles",$liste_articles);
    $smarty->display("template/recaparticle.tpl");    
    include_once 'includes/menu.inc.php';
    include_once 'includes/footer.inc.php';
?>

