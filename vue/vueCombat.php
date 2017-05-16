<?php
$titrePage = "Let the battle begin!";
ob_start();
$personnages = array();
require ('model/Perso.php');
$personnage = RecupCSV();

foreach ($personnage as $key => $value){
    if ($key == $_GET['perso'])
    {
    $combattant1 = new personnage($personnage[$key]);
    }
}
echo "<div class=\"col-xs-6 col-md-2 text-center\">\r\n";
echo "  <div ></div>\r\n";
echo "</div>\r\n";
$combattant1->SetPerso($_GET['vie'], $_GET['attaque'], $_GET['defense']);
$hasard = array_rand($personnage);
$combattant2 = new personnage($personnage[$hasard]);
$combattant1->afficherImage();
echo "<div class=\"col-xs-6 col-md-4 text-center\">\r\n";
echo "  <div ><img src=\"contenu/img/vs.png\" /></div>\r\n";
echo "</div>\r\n";
$combattant2->afficherImageSym();

$nom1 = $combattant1->GetNom();
$nom2 = $combattant2->GetNom();

$vie1 = $combattant1->GetVie();
$vie2 = $combattant2->GetVie();

$contenu = ob_get_clean();

ob_start();
?>
<center>
<?php
 echo "$nom1 débute avec $vie1 points de vie.<br />$nom2 débute avec $vie2 points de vie<br />";
 $attaque = 1;
 while (($vie1 > 0 && $vie2 > 0)){
     if ($attaque == 1)
     {
         $combattant1->attaque($combattant2);
         $attaque = 2;
         $vie2 = $combattant2->GetVie();
     }else
     {
         $combattant2->attaque($combattant1);
         $attaque = 1;
         $vie1 = $combattant1->GetVie();
     }
 }
 if ($vie1 <0 ){
     echo "$nom1 est mort!";
 }else
 {
     echo "$nom2 est mort!";
 }
  ?>
</center>
<?php

$bas = ob_get_clean();
require ('vue/gabarit.php');