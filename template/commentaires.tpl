<head>
    <script type="text/javascript" src="js/formulaire.js" ></script>
    <script type="text/javascript" src="js/afficher_cacher.js" ></script>
</head>
<div class="span8">
    <div class="page-header well">
        <center>
            <h2>{$data_article['titre']}</h2>
        </center>
        <p class="justify">
            <img class="ImgGauche" src = "up_img/{$data_article['id_article']}.jpg" width = "300" height = "225"/>            
            {$data_article['contenu']}
        </p>
        <p>
            <span class='left'>
                {if ($state_connect == true)} 
                    <BR><a href="article.php?id_article={$data_article['id_article']}">Modifier l'article</a>
                    <BR><a href="article.php?del_article={$data_article['id_article']}">Supprimer l'article</a>
                {/if}
            </span>
            <span class="right">
                <i> Publié le : {$data_article['date']}</i>
            </span>
        </p>
    </div>  
    <div class="page-header well comment">
        <center>
            {if $nbcommentaire > 0}
                {if $nbcommentaire == 1}
                    <b>Il y a 1 commentaire pour cet article</b><BR><BR>
                {else}
                    <b>Il y a {$nbcommentaire} commentaires pour cet article</b><BR><BR>
                {/if}
            {else}
                <b>Il n'y a pas de commentaire pour cet article</b><BR><BR>
            {/if}
        </center>
        {if !empty($data_comment)}
            {foreach from=$data_comment item=data}
                {if $data['mail']!=null}
                    <i># Ecrit par <a href="mailto:{$data['mail']}">{$data['auteur']}</a> le {$data['date']} : </i>  <BR>  
                {else}
                    <i># Ecrit par {$data['auteur']} le {$data['date']} : </i>  <BR>                      
                {/if}
                <p class="marge"><b>{$data['commentaire']}</b></p>                
            {/foreach}
        {else}
            <b>Aucun commentaire pour cet article</b><BR>
        {/if}
    </div>
    <div class="page-header well comment">
        <center>
            <b>LAISSER UN COMMENTAIRE</b>
        </center>
        <form id="add_commentaire" name="commentaire" method="POST" enctype="multipart/form-data">  
            <b> Auteur : </b><BR>
            <input type="text" name="auteur" value=""/><span style="display:none; color: red;">Veuillez entrer votre nom</span><BR>
            <b> E-mail : </b><BR>
            <input type="text" name="mail" value=""/><span style="display:none; color: red;">Veuillez entrer votre e-mail</span><BR>
            <b> Commentaire : </b><BR>       
            <textarea name="commentaire" value="" style='width: 100%; height:150px;'/></textarea><span style="display:none; color: red;">Veuillez entrer votre commentaire</span><BR>
            <input type="submit" value="Envoyer" name="button_commentaire" class='btn btn-large' onsubmit=""/>
        </form>
    </div>
</div>