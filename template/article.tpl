<head>
    <script type="text/javascript" src="js/formulaire.js" ></script>
</head>
<div class="span8">     
    <div class="page-header well">
        <center>
            <u>
                <h3>{$action_label} un article</H3>
            </u>
        </center>
        <form id="creation_article" method="POST" enctype="multipart/form-data">
            <b> Titre : </b><BR>
            <input type="text" name="titre" value="{$article_titre}" /><span style="display:none; color: red;">Veuillez entrer un titre</span><BR>
            <b> Texte : </b><BR>
            <textarea id='name' name="contenu" style='width: 100%; height:150px;'>{$article_contenu}</textarea><span style="display:none; color: red;">Veuillez entrer un texte pour l'article</span><BR>
            <b> Image : </b>
            {if $article_img!=null}
                <BR><img src="{$article_img}" height="100" width="100"/>
            {/if}
            <br><input type="file" name="image" value="" /><BR>
            <b> Publié : </b><BR>
            <input type="checkbox" name="statut" value="{$article_statut}"{if $article_statut==1}checked{else}{/if}   /><BR>   
            <input type="hidden" name="id" value={$article_id}  ><BR>         
            <input type="submit" value={$action_label}  name={$action_label} class='btn btn-large btn-primary' onsubmit=""/>
        </form>
    </div>
</div>
   