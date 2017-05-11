<?php
//Lecture du CSV et enregistrement dans un tableau
function RecupCSV()
{
    $fichier = 'contenu/personnages.csv';
    $perso = array();
    $csv = new SplFileObject($fichier);
    $csv->setFlags(SplFileObject::READ_CSV);
    $csv->setCsvControl(';');
    
    foreach ($csv as $ligne){
       $perso[$ligne[1]]["nom"] = $ligne[0];
       $perso[$ligne[1]]["image"] = $ligne[1];
       $perso[$ligne[1]]["vie"] = $ligne[2];
       $perso[$ligne[1]]["attaque"] = $ligne[3];
       $perso[$ligne[1]]["defense"] = $ligne[4];
    }
    return $perso;
}

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