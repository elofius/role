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

                    foreach ($personnage as $key => $value){
                        $personnages[] = new personnage($personnage[$key]);
                    }
                    //$personnages[] = new personnage($personnage['luke']);
                    //$personnages[] = new personnage($personnage['leia']);
                    foreach ($personnages as $key => $value){
                        $personnages[$key]->afficherImage();
                    }
                    ?>
            </div>
        </div>

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="script.js"></script>
        <script>
            var k = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65],
            n = 0;
            $(document).keydown(function (e) {
                if (e.keyCode === k[n++]) {
                    if (n === k.length) {
                        alert ('Hodor? HODDOOOOOOOOOOOOOOOOR!');
                        n = 0;
                        return false;
                    }
                }
                else {
                    n = 0;
                }
            });
        </script>
    </body>
</html>