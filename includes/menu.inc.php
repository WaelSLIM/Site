<?php 
    // On vérifie si on est connecté (session ou cookie) 
    require_once 'includes/connect.inc.php'; 
?>  
<nav class="span4">
    <div class="page-header well">
        <center>
            <h3>Menu</h3>
        </center>
        <ul>
            <li>
                <form name="search" action="index.php" method="GET">
                    <input type="search" name="rechercher" placeholder="Entrez un mot-clé" style="width: 120px; margin-bottom: 0;" >
                    <input type="submit" value="Rechercher" class='btn btn-large'/>            
                </form>
            </li>
            <li>
                <a href="index.php">Accueil</a>
            </li>
            <?php
                if ($state_connect == true) // Si on est connecté possibilité de rédiger un article ou de se déconnecter
                { ?>
                        <li>
                            <a href="recaparticle.php">Gérer articles</a>
                        </li>
                        <li>
                            <a href="article.php">Rédiger un article</a>
                        </li>                    
                        <li>
                            <a href="deconnect.php">Déconnecter</a>
                        </li>
                <?php
                } 
                else // Si non connecté, possibilité de se connecter
                { ?>
                    <li>
                        <a href="connect.php">Se connecter</a>
                    </li>
                <?php 
                } ?>
        </ul>
        <?php 
            if ($state_connect == true)
                echo "<i>Connecté en tant que : <b>".$_SESSION['login']."</b></i>"
        ?>
    </div>
</nav>

