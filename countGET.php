<?php
require_once 'fonctionAffichage.php';
if(!isset ($_GET['visité'])) $_GET['visité']=0;
entete("count","StyleCss");
?>
<h1>Bonjour,</h1>
<h2>vous avez visité <?php echo $_GET['visité']+=1;?> fois la page</h2>
<a href="countGet.php?visité=<?php echo $_GET['visité'];?>">visitez à nouveau cette page !</a>
<?php if($_GET['visité']>1000){ echo "<p>felicitation tu es une merde</p>";}?>