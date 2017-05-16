<?php
$titrePage = "Sélectionnez votre personnage";

ob_start();
$personnages = array();
require ('model/Perso.php');
$personnage = RecupCSV();

foreach ($personnage as $key => $value){
    $personnages[] = new personnage($personnage[$key]);
    }
    foreach ($personnages as $key => $value){
        $personnages[$key]->afficherImage();
}
$contenu = ob_get_clean();

require ('vue/gabarit.php');
