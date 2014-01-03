<?php /* Smarty version Smarty-3.1.15, created on 2014-01-03 15:32:39
         compiled from "template/connect.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39486163852c6ca07254432-16069212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5b45e2a3ffdd2c6cb956f50325aa2b4bcbdb110' => 
    array (
      0 => 'template/connect.tpl',
      1 => 1388759490,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39486163852c6ca07254432-16069212',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'erreur_connection' => 0,
    'login' => 0,
    'pwd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52c6ca072f1644_97151418',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52c6ca072f1644_97151418')) {function content_52c6ca072f1644_97151418($_smarty_tpl) {?><head>
    <script type="text/javascript" src="js/formulaire.js" ></script>
</head>
<div class="span8">
    <div class="page-header well">    
        <form name="connect" method="POST" enctype="multipart/form-data">       
            <center>
                <?php if (!empty($_smarty_tpl->tpl_vars['erreur_connection']->value)) {?> 
                    <B><font color=red><?php echo $_smarty_tpl->tpl_vars['erreur_connection']->value;?>
</font></B> <BR>
                    <b> Login<font color="red">*</font> : </b><BR>
                    <input type="text" name="login" value=<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
></input><BR>
                    <b> Password<font color="red">*</font> : </b><BR>            
                    <input type="password" name="pwd" value=<?php echo $_smarty_tpl->tpl_vars['pwd']->value;?>
></input><BR>
                    <b> Rester connecter : </b>            
                    <input type="checkbox" name="cookie" value="ON" /><BR>
                    <input type="submit" value="Se connecter" name="connect" class='btn btn-large' onsubmit=""/>    
                <?php } else { ?>   
                    <b> Login<font color="red">*</font> : </b><BR>
                    <input type="text" name="login" value=""/><span style="display:none; color: red;">Veuillez entrer votre login</span><BR>
                    <b> Password<font color="red">*</font> : </b><BR>            
                    <input type="password" name="pwd" value="" /><span style="display:none; color: red;">Veuillez entrer votre password</span><BR>
                    <b> Rester connecter : </b>        
                    <input type="checkbox" name="cookie" value="ON" /><BR>
                    <input type="submit" value="Se connecter" name="connect" class='btn btn-large' onsubmit=""/>
                <?php }?> 
            </center>
        </form>
    </div>
</div>










        
<?php }} ?>
