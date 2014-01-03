<head>
    <script type="text/javascript" src="js/formulaire.js" ></script>
</head>
<div class="span8">
    <div class="page-header well">    
        <form name="connect" method="POST" enctype="multipart/form-data">       
            <center>
                {if !empty($erreur_connection)} 
                    <B><font color=red>{$erreur_connection}</font></B> <BR>
                    <b> Login<font color="red">*</font> : </b><BR>
                    <input type="text" name="login" value={$login}></input><BR>
                    <b> Password<font color="red">*</font> : </b><BR>            
                    <input type="password" name="pwd" value={$pwd}></input><BR>
                    <b> Rester connecter : </b>            
                    <input type="checkbox" name="cookie" value="ON" /><BR>
                    <input type="submit" value="Se connecter" name="connect" class='btn btn-large' onsubmit=""/>    
                {else}   
                    <b> Login<font color="red">*</font> : </b><BR>
                    <input type="text" name="login" value=""/><span style="display:none; color: red;">Veuillez entrer votre login</span><BR>
                    <b> Password<font color="red">*</font> : </b><BR>            
                    <input type="password" name="pwd" value="" /><span style="display:none; color: red;">Veuillez entrer votre password</span><BR>
                    <b> Rester connecter : </b>        
                    <input type="checkbox" name="cookie" value="ON" /><BR>
                    <input type="submit" value="Se connecter" name="connect" class='btn btn-large' onsubmit=""/>
                {/if} 
            </center>
        </form>
    </div>
</div>










        
