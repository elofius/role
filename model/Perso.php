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

function perso($nom, $image, $vie, $attaque, $defense,$nom2, $image2, $vie2, $attaque2, $defense2){
    $perso = array();
    $perso[$image]["nom"] = $nom;
    $perso[$image]["image"] = $image;
    $perso[$image]["vie"] = $vie;
    $perso[$image]["attaque"] = $attaque;
    $perso[$image]["defense"] = $defense;
    $perso[$image2]["nom"] = $nom2;
    $perso[$image2]["image"] = $image2;
    $perso[$image2]["vie"] = $vie2;
    $perso[$image2]["attaque"] = $attaque2;
    $perso[$image2]["defense"] = $defense2;
    
    return $perso;
}

class personnage{
    private $image;
    private $nom;
    private $vie;
    private $attaque;
    private $defense;
    

    public function __construct($personnage, $nouveau){
        
            $this->image = $personnage['image'];
            $this->nom = $personnage['nom'];
            $this->vie = 100 + rand(0, $personnage['vie']);
            $this->attaque = 50 + rand(0, $personnage['attaque']);
            $this->defense = 10 + rand(0, $personnage['defense']);
    }
    
    public function SetPerso($vie, $attaque, $defense){
        $this->vie = $vie;
        $this->attaque = $attaque;
        $this->defense = $defense;
    }
    public function SetVie($vie)
    {
        $this->vie -= $vie;
    }
    public function GetPerso(){
        echo $this->vie . "<br />";
        echo $this->attaque. "<br />";
        echo $this->defense;
    }
    
    public function GetNom(){
        return $this->nom;
    }
    public function GetVie(){
        return $this->vie;
    }
    public function afficherImage(){
        echo "<div class=\"col-xs-6 col-md-2 text-center\">\r\n";
        echo "  <div class=\"personnage\"><p><a href=\"?perso=".$this->image."&vie=".$this->vie."&attaque=".$this->attaque."&defense=".$this->defense."\">".$this->nom."</a></p><img src=\"contenu/img/".$this->image.".png\" class=\"img-responsive center-block\"/></div>\r\n";
        echo "</div>\r\n";
    }
    public function afficherImageSym()
    {
        echo "<div class=\"col-xs-6 col-md-2 text-center\">\r\n";
        echo "  <div class=\"personnage\"><p><a href=\"?perso=".$this->image."&vie=".$this->vie."&attaque=".$this->attaque."&defense=".$this->defense."\">".$this->nom."</a></p><img src=\"contenu/img/".$this->image.".png\" class=\"img-responsive center-block\" style=\"transform: scaleX(-1);\"/></div>\r\n";
        echo "</div>\r\n";
    }
    public function attaque($mechant){
        $rand = rand(-10, 10);
        $attaque = $this->attaque + $rand;
        $defense = $mechant->defense + rand(-10,10);
        if ($attaque > $defense){
            $vieEnMoins = $attaque - $defense;
        }
        else{
            $vieEnMoins = 1;
        }
        $mechant->SetVie($vieEnMoins);
        echo "<b>".$this->nom ."</b> attaque et inflige <b>".$vieEnMoins."</b> points de dégats!<br />";
    }
}