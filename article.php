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
    // Restrein l'accès à la page en vérifiant si on est connecté
    include_once 'includes/autorisation.inc.php';
    require_once 'libs/Smarty.class.php';
    $smarty = new Smarty();
    // Si on envoie des données d'ajout ou de modification d'article
    if (isset($_POST['Ajouter']) || isset($_POST['Modifier'])) 
    {
        if (isset($_POST['titre']))
            $titre = $_POST['titre']; // Récupère le titre
        if (isset($_POST['contenu']))
            $contenu = $_POST['contenu']; // Récupère le contenu
        // Si une image est envoyée pour l'article
        if (!empty($_FILES['image']['name']))
        {
            $file = pathinfo($_FILES['image']['name']); // On récupère son nom
            $extension = $file['extension']; // On récupère son extension
            // On vérifie que c'est bien une image
            if ($extension=="jpeg" || $extension=="jpg" || $extension=="gif" || $extension=="png")
                $erreur_image = $_FILES['image']['error']; 
            else
                $erreur_image = "Ce fichier n'est pas une image";
        }
        else
            $erreur_image = "";
        $statut = (isset($_POST['statut'])) ? true : false;
        $date = date("Y") . '-' . date("m") . '-' . date("d") . ' ' . date("H") . ':' . date("i") . ':' . date("s");
        if (empty($erreur_image)) 
        {
            // Si il y a un titre et un contenu à l'article
            if (!empty($titre) && !empty($contenu)) 
            {
                $id_article = $_POST['id'];
                // Si on ajoute un article ($id_article pas posté)
                if (empty($id_article)) 
                {
                    // Ajout de l'article dans la base de données
                    $req = "INSERT INTO `article`(`id_article`, `titre`, `contenu`, `date`, `statut`) VALUES ('','$titre','$contenu','$date','$statut')";                
                    mysql_query($req);
                    $id_article = mysql_insert_id();
                } // Si on modifie un article
                else 
                {
                    // Modification de l'article'
                    $req = "UPDATE `article` SET `id_article`='$id_article',`titre`='$titre',`contenu`='$contenu',`date`='$date',`statut`='$statut' WHERE id_article='$id_article'";
                    mysql_query($req);
                }
                move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) . "/up_img/$id_article.$extension");
                header("Refresh: 1;URL=index.php");
            }
        }
        else
            echo $erreur_image;
    } // Si on supprime un article
    else if (isset($_GET['del_article'])){        
        $id_article = $_GET['del_article'];
        $sql = "DELETE FROM commentaire WHERE id_article = $id_article";
        mysql_query($sql);
        $sql = "DELETE FROM article WHERE article.id_article = $id_article";
        $result = mysql_query($sql);
        // Si la suppression s'est bien passée on supprime l'image correspondant à l'article
        if ($requete)
            suppression_img ("up_img/", $id_article);
        header('Location: index.php');
    } 
    // Sinon génération de l'affichage du formulaire dans le cas ...
    else
    {
        // ... d'une modification d'un article
        if (isset($_GET['id_article'])) {
            $id_article = $_GET['id_article'];
            $sql = "SELECT id_article, contenu, titre, statut FROM article WHERE article.id_article = $id_article";
            $link_img = "up_img/$id_article";
            $requete = mysql_query($sql);
            $article = mysql_fetch_array($requete);
            extract($article);
        }//... d'un ajout d'un article
        else
            $article = array("id_article" => NULL, "titre" => "", "contenu" => "", "date" => "", "statut" => "");    
        // Elements de mise en page
        include_once 'includes/header.inc.php';
        $action_label = (!empty($_GET['id_article'])) ? 'Modifier' : 'Ajouter';
        $smarty->assign("action_label",$action_label);
        $smarty->assign("erreur_image",$erreur_image);
        $article_titre = $article['titre'] ;
        $smarty->assign("article_titre",$article_titre);
        $article_contenu = $article['contenu'] ;
        $smarty->assign("article_contenu",$article_contenu);
        $article_statut = $article['statut'] ;
        $smarty->assign("article_statut",$article_statut);
        $article_id = $article['id_article'] ;
        $smarty->assign("article_id",$article_id);
        if (!empty($link_img))
            $smarty->assign("article_img",$link_img);
        $smarty->display("template/article.tpl");
        include_once 'includes/menu.inc.php'; 
        include_once 'includes/footer.inc.php';
    }
?>