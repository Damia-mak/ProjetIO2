<?php
function sauvegarde(){
$_SESSION['prenom']=$_POST['prenom'];
$_SESSION['passwd']=$_POST['passwd'];
$_SESSION['passwd1']=$_POST['passwd1'];
$_SESSION['gender']=$_POST['gender'];
$_SESSION['email']=$_POST['email'];
$_SESSION['date']=$_POST['date'];
}

?>