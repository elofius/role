<!DOCTYPE html>
<html>
    <head>
        <title>Jeu de Role</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1">

        <link rel="stylesheet" href="contenu/style.css">        

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" />
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <img src="contenu/img/logo.png" class="img-responsive center-block" title="Game Of Throne - Logo" alt="Logo" />
                </div>
                <div class="col-xs-12 text-center">
                    <h2><?= $titrePage ?></h2>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                    <?php
                    $personnages = array();
                    require ('model/Perso.php');
                    $personnage = RecupCSV();
                    //si nouveau Perso
                    if (!isset($_GET['perso'])){
                        foreach ($personnage as $key => $value){
                            $personnages[] = new personnage($personnage[$key]);
                        }
                        foreach ($personnages as $key => $value){
                            $personnages[$key]->afficherImage();
                        }
                    }else{
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
                        echo "  <div ><p>Vs.</p></div>\r\n";
                        echo "</div>\r\n";
                        $combattant2->afficherImage();
                        
                        $nom1 = $combattant1->GetNom();
                        $nom2 = $combattant2->GetNom();
                        
                        $vie1 = $combattant1->GetVie();
                        $vie2 = $combattant2->GetVie();
                        
                        
                       
                    }
                    ?>
            </div>
        </div>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="contenu/script.js"></script>
    </body>
</html>