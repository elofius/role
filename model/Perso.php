<?php

$personnage = array();
//arya
$personnage['arya']['image'] = "aryastark";
$personnage['arya']['nom'] = "Arya Stark";
//brienne
$personnage['brienne']['image'] = "briennedetorth";
$personnage['brienne']['nom'] = "Brienne de Torth";
//daenerys
$personnage['daenerys']['image'] = "daenerystargaryen";
$personnage['daenerys']['nom'] = "Daenerys Targaryen";
//joffrey
$personnage['joffrey']['image'] = "joffreybaratheon";
$personnage['joffrey']['nom'] = "Joffrey Baratheon";
//jon
$personnage['jon']['image'] = "jonsnow";
$personnage['jon']['nom'] = "Jon Snow";
//lelimier
$personnage['lelimier']['image'] = "lelimier";
$personnage['lelimier']['nom'] = "Le Limier";
//marcheur
$personnage['marcheur']['image'] = "marcheurblanc";
$personnage['marcheur']['nom'] = "Le Marcheur Blanc";
//ned
$personnage['ned']['image'] = "nedstark";
$personnage['ned']['nom'] = "Ned Stark";
//robert
$personnage['robert']['image'] = "robertbaratheon";
$personnage['robert']['nom'] = "Robert Baratheon";
//theon
$personnage['theon']['image'] = "theongreyjoy";
$personnage['theon']['nom'] = "Theon Greyjoy";
//tyrion
$personnage['tyrion']['image'] = "tyrionlannister";
$personnage['tyrion']['nom'] = "Tyrion Lannister";
//yara
$personnage['yara']['image'] = "yaragreyjoy";
$personnage['yara']['nom'] = "Yara Greyjoy";

class personnage{
    private $image;
    private $nom;

    public function __construct($personnage){
        $this->image = $personnage['image'];
        $this->nom = $personnage['nom'];
    }

    public function afficherImage(){
        echo "<div class=\"col-xs-6 col-md-2 text-center\">\r\n";
        echo "  <div class=\"personnage\"><p>".$this->nom."</p><img src=\"contenu/img/".$this->image.".png\" class=\"img-responsive center-block\"/></div>\r\n";
        echo "</div>\r\n";
    }
}