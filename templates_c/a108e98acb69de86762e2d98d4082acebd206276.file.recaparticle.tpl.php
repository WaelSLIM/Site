<?php /* Smarty version Smarty-3.1.15, created on 2014-01-03 15:32:52
         compiled from "template/recaparticle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166534322052c6ca141fcae7-41053008%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a108e98acb69de86762e2d98d4082acebd206276' => 
    array (
      0 => 'template/recaparticle.tpl',
      1 => 1388758235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166534322052c6ca141fcae7-41053008',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'articles' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52c6ca142c35e0_60276699',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52c6ca142c35e0_60276699')) {function content_52c6ca142c35e0_60276699($_smarty_tpl) {?><div class="span8">
    <div class="page-header well">
        <center>
            <?php if (empty($_smarty_tpl->tpl_vars['articles']->value)) {?>
                <b>Aucun article enregistré à ce jour !</b>
            <?php } else { ?>
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
                        <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['titre'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['data']->value['date'];?>
</td>
                                <td>
                                    <form id='statut' name="statut" method="POST" action='recaparticle.php?id_article=<?php echo $_smarty_tpl->tpl_vars['data']->value['id_article'];?>
'>
                                        <input type='submit' value='<?php echo $_smarty_tpl->tpl_vars['data']->value['statut'];?>
' name="change_state" style='width: 150px; height: 26px'>
                                    </form>
                                </td>
                                <td>
                                    <form id='statut' name="statut" method="POST" action='commentaires.php?id_article=<?php echo $_smarty_tpl->tpl_vars['data']->value['id_article'];?>
'>
                                        <input type='submit' value='Voir contenu' style='width: 150px; height: 26px'>
                                    </form>
                                </td>
                                <td>
                                    <form id='statut' name="statut" method="POST" action='recaparticle.php?id_article=<?php echo $_smarty_tpl->tpl_vars['data']->value['id_article'];?>
'>
                                        <input type='submit' value='Supprimer' name="del_article" style='width: 150px; height: 26px'>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php }?>
        </center>
    </div>
</div><?php }} ?>
