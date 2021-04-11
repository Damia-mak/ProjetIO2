<?php
function entete($titre,$css){
echo "<!DOCTYPE>";
echo "<html lang=\"fr\">";
echo "<head>";
echo "<meta charset=\"utf-8\">";
echo "<link rel=\"stylesheet\" href=\"$css?1\">","<title>$titre</title>","</head>";
echo "<body>";
}
function basDePage(){
    echo "</body>";
    echo " </html>";
}
function test(){
    echo "test";
}

?>