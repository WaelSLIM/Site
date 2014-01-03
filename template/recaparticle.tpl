<div class="span8">
    <div class="page-header well">
        <center>
            {if empty($articles)}
                <b>Aucun article enregistré à ce jour !</b>
            {else}
                <table border="1">
                    <thead>
                        <tr>
                            <th>Titre de l'article</th>
                            <th>Date de création</th>
                            <th>Passer l'article en ...</th>
                            <th>-------------</th>
                            <th>-------------</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$articles item=data}
                            <tr>
                                <td>{$data['titre']}</td>
                                <td>{$data['date']}</td>
                                <td>
                                    <form id='statut' name="statut" method="POST" action='recaparticle.php?id_article={$data['id_article']}'>
                                        <input type='submit' value='{$data['statut']}' name="change_state" style='width: 150px; height: 26px'>
                                    </form>
                                </td>
                                <td>
                                    <form id='statut' name="statut" method="POST" action='commentaires.php?id_article={$data['id_article']}'>
                                        <input type='submit' value='Voir contenu' style='width: 150px; height: 26px'>
                                    </form>
                                </td>
                                <td>
                                    <form id='statut' name="statut" method="POST" action='recaparticle.php?id_article={$data['id_article']}'>
                                        <input type='submit' value='Supprimer' name="del_article" style='width: 150px; height: 26px'>
                                    </form>
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            {/if}
        </center>
    </div>
</div>