<?php 
require_once 'fonctionAffichage.php';

session_start();
menu();
?>
<div class="deconnexion"> 
        <h1> Déconnexion : </h1>
        <form action="deconnexion.php" method="post">
        <input type="hidden" name="deco" value="1">
        <input type="submit" value="Deconnexion">
        </form>
    </div> 
<?php
if(isset($_POST['deco'])){
    $_SESSION = array();
    unset($_SESSION['user']);
    session_destroy();
    header("location: /IO_Projet/connexion.php");
}
basDePage();
?>