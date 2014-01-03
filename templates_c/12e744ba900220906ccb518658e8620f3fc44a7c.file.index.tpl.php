<?php /* Smarty version Smarty-3.1.15, created on 2014-01-03 15:32:36
         compiled from "template/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21697390952c6ca044682d6-78497643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12e744ba900220906ccb518658e8620f3fc44a7c' => 
    array (
      0 => 'template/index.tpl',
      1 => 1388759489,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21697390952c6ca044682d6-78497643',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total_articles' => 0,
    'recherche' => 0,
    'articles' => 0,
    'data' => 0,
    'state_connect' => 0,
    'i' => 0,
    'nombreDePages' => 0,
    'pageActuelle' => 0,
    'messagesParPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52c6ca04586843_90895944',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52c6ca04586843_90895944')) {function content_52c6ca04586843_90895944($_smarty_tpl) {?><div class="span8">
    <?php if ($_smarty_tpl->tpl_vars['total_articles']->value==0) {?>
        <div class="page-header well">
            <center>
                <?php if (!empty($_smarty_tpl->tpl_vars['recherche']->value)) {?>
                    <b>Aucun élément ne correspond à votre recherche : <font color=red><?php echo $_smarty_tpl->tpl_vars['recherche']->value;?>
</font>.</b>
                    <br><br><a href="index.php">     Retour</a>
                <?php } else { ?>
                    <b>Aucun article publié à ce jour !</b>
                <?php }?>
            </center>
        </div>
    <?php } else { ?>
        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
            <div class="page-header well">
                <center>
                    <h2><?php echo $_smarty_tpl->tpl_vars['data']->value['titre'];?>
</h2>
                </center>
                <p class="justify">
                    <img class="ImgGauche" src = "up_img/<?php echo $_smarty_tpl->tpl_vars['data']->value['id_article'];?>
.jpg" width = "300" height = "225"/>            
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['contenu'];?>

                </p>
                <p>
                    <span class='left'>
                        <?php if (($_smarty_tpl->tpl_vars['state_connect']->value==true)) {?> 
                            <a href="article.php?id_article=<?php echo $_smarty_tpl->tpl_vars['data']->value['id_article'];?>
">Modifier l'article</a>
                            <BR><a href="article.php?del_article=<?php echo $_smarty_tpl->tpl_vars['data']->value['id_article'];?>
">Supprimer l'article</a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['nbcommentaire']>0) {?>
                            <?php if ($_smarty_tpl->tpl_vars['data']->value['nbcommentaire']==1) {?>
                                <BR><a href="commentaires.php?id_article=<?php echo $_smarty_tpl->tpl_vars['data']->value['id_article'];?>
"><i>1 commentaire</i></a>
                            <?php } else { ?>
                                <BR><a href="commentaires.php?id_article=<?php echo $_smarty_tpl->tpl_vars['data']->value['id_article'];?>
"><i><?php echo $_smarty_tpl->tpl_vars['data']->value['nbcommentaire'];?>
 commentaires</i></a>
                            <?php }?>
                        <?php } else { ?>
                            <br><a href="commentaires.php?id_article=<?php echo $_smarty_tpl->tpl_vars['data']->value['id_article'];?>
"><i>Aucun commentaire</i></a>
                        <?php }?>
                    </span>
                    <span class='right'>
                        <i> Publié le : <?php echo $_smarty_tpl->tpl_vars['data']->value['date_article'];?>
</i> 
                    </span>
                </p>        
            </div>            
        <?php } ?>
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
        <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->value = 1;
  if ($_smarty_tpl->tpl_vars['i']->value<=$_smarty_tpl->tpl_vars['nombreDePages']->value) { for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value<=$_smarty_tpl->tpl_vars['nombreDePages']->value; $_smarty_tpl->tpl_vars['i']->value++) {
?>
            <?php if ($_smarty_tpl->tpl_vars['i']->value==$_smarty_tpl->tpl_vars['pageActuelle']->value) {?>
                [ <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 ]
            <?php } else { ?>
                <a href="index.php?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
            <?php }?>
        <?php }} ?>
        <br>
    <?php }?>    
</div>
<script type="text/javascript">
    var nb_options   = document.getElementById('liste').options.length;            
    while(nb_options-- >0) {
        if(document.getElementById('liste').options[nb_options].value == <?php echo $_smarty_tpl->tpl_vars['messagesParPage']->value;?>
) {
            document.getElementById('liste').options[nb_options].selected =true; 
        }
    }	
</script><?php }} ?>
