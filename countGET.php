<?php
session_start();
require_once 'fonctionAffichage.php';
if(!isset ($_SESSION['visité'])) $_SESSION['visité']=0;
entete("count","StyleCss");
?>
<h1>Bonjour,</h1>
<h2>vous avez visité <?php echo $_SESSION['visité']+=1;?> fois la page</h2>
<a href="countGet.php?visité=<?php echo $_SESSION['visité'];?>">visitez à nouveau cette page !</a>
<?php if($_SESSION['visité']>1000){ echo "<p>felicitation tu es null</p>";}?>