<?php /* Smarty version Smarty-3.1.15, created on 2014-01-03 15:32:53
         compiled from "template/article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94417883952c6ca15691584-13015203%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '235541ce9162c1e9232a451836a37fb553481383' => 
    array (
      0 => 'template/article.tpl',
      1 => 1388759492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94417883952c6ca15691584-13015203',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action_label' => 0,
    'article_titre' => 0,
    'article_contenu' => 0,
    'article_img' => 0,
    'article_statut' => 0,
    'article_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52c6ca157afd81_58737128',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52c6ca157afd81_58737128')) {function content_52c6ca157afd81_58737128($_smarty_tpl) {?><head>
    <script type="text/javascript" src="js/formulaire.js" ></script>
</head>
<div class="span8">     
    <div class="page-header well">
        <center>
            <u>
                <h3><?php echo $_smarty_tpl->tpl_vars['action_label']->value;?>
 un article</H3>
            </u>
        </center>
        <form id="creation_article" method="POST" enctype="multipart/form-data">
            <b> Titre : </b><BR>
            <input type="text" name="titre" value="<?php echo $_smarty_tpl->tpl_vars['article_titre']->value;?>
" /><span style="display:none; color: red;">Veuillez entrer un titre</span><BR>
            <b> Texte : </b><BR>
            <textarea id='name' name="contenu" style='width: 100%; height:150px;'><?php echo $_smarty_tpl->tpl_vars['article_contenu']->value;?>
</textarea><span style="display:none; color: red;">Veuillez entrer un texte pour l'article</span><BR>
            <b> Image : </b>
            <?php if ($_smarty_tpl->tpl_vars['article_img']->value!=null) {?>
                <BR><img src="<?php echo $_smarty_tpl->tpl_vars['article_img']->value;?>
" height="100" width="100"/>
            <?php }?>
            <br><input type="file" name="image" value="" /><BR>
            <b> Publié : </b><BR>
            <input type="checkbox" name="statut" value="<?php echo $_smarty_tpl->tpl_vars['article_statut']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['article_statut']->value==1) {?>checked<?php } else { ?><?php }?>   /><BR>   
            <input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['article_id']->value;?>
  ><BR>         
            <input type="submit" value=<?php echo $_smarty_tpl->tpl_vars['action_label']->value;?>
  name=<?php echo $_smarty_tpl->tpl_vars['action_label']->value;?>
 class='btn btn-large btn-primary' onsubmit=""/>
        </form>
    </div>
</div>
   <?php }} ?>
