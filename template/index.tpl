<div class="span8">
    {if $total_articles == 0}
        <div class="page-header well">
            <center>
                {if !empty($recherche)}
                    <b>Aucun élément ne correspond à votre recherche : <font color=red>{$recherche}</font>.</b>
                    <br><br><a href="index.php">     Retour</a>
                {else}
                    <b>Aucun article publié à ce jour !</b>
                {/if}
            </center>
        </div>
    {else}
        {foreach from=$articles item=data}
            <div class="page-header well">
                <center>
                    <h2>{$data['titre']}</h2>
                </center>
                <p class="justify">
                    <img class="ImgGauche" src = "up_img/{$data['id_article']}.jpg" width = "300" height = "225"/>            
                    {$data['contenu']}
                </p>
                <p>
                    <span class='left'>
                        {if ($state_connect == true)} 
                            <a href="article.php?id_article={$data['id_article']}">Modifier l'article</a>
                            <BR><a href="article.php?del_article={$data['id_article']}">Supprimer l'article</a>
                        {/if}
                        {if $data['nbcommentaire'] > 0}
                            {if $data['nbcommentaire'] == 1}
                                <BR><a href="commentaires.php?id_article={$data['id_article']}"><i>1 commentaire</i></a>
                            {else}
                                <BR><a href="commentaires.php?id_article={$data['id_article']}"><i>{$data['nbcommentaire']} commentaires</i></a>
                            {/if}
                        {else}
                            <br><a href="commentaires.php?id_article={$data['id_article']}"><i>Aucun commentaire</i></a>
                        {/if}
                    </span>
                    <span class='right'>
                        <i> Publié le : {$data['date_article']}</i> 
                    </span>
                </p>        
            </div>            
        {/foreach}
        <form action="index.php" method="POST" >
            <select id="liste" name="choix_nb_article" onchange="this.form.submit()" style="width: auto;height: auto">
                <option id="1" value="1">1 article par page</option>
                <option id="2" value="2">2 articles par page</option>
                <option id="3" value="3">3 articles par page</option>
                <option id="4" value="4">4 articles par page</option>
                <option id="5" value="5">5 articles par page</option>
                <option id="10" value="10">10 articles par page</option>
                <option id="20" value="20">20 articles par page</option>
            </select>
        </form>
        <p align="center">Page :    
        {for $i = 1; $i <= $nombreDePages; $i++}
            {if $i == $pageActuelle }
                [ {$i} ]
            {else}
                <a href="index.php?page={$i}">{$i}</a>
            {/if}
        {/for}
        <br>
    {/if}    
</div>
<script type="text/javascript">
    var nb_options   = document.getElementById('liste').options.length;            
    while(nb_options-- >0) {
        if(document.getElementById('liste').options[nb_options].value == {$messagesParPage}) {
            document.getElementById('liste').options[nb_options].selected =true; 
        }
    }	
</script>