<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Page d'accueil</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="lib/vendor/bootstrap-4.5.0-dist/css/bootstrap.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="lib/vendor/jquery/jquery-3.5.1.js"></script>
        <script src="lib/vendor/popper/popper.min.js"></script>
        <script src="lib/vendor/bootstrap-4.5.0-dist/js/bootstrap.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <header class="row">
                <div class="col-12 text-center" id="titre"><h1>Le temps c'est de l'argent</h1></div>
            </header>
            <div class="row">
                <div class="sidebox col-xl-3 col-md-4 text-center">
                    <div class="sideboxnest">
                        <h2>Navigation</h2>
                        <ul id="navul">
                            <li><a href="index.php?page=chrono">Chrono</a></li>
                            <li><a href="index.php?page=gestion">Gestion</a></li>
                            <li><a href="index.php?page=login&task=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-md-4 text-center" id="cparti">
                    <a href="index.php?page=chrono"><img src="images/watch.png" alt="horloge" id="horloge">
                    <p id="cpartitxt">C'est parti !</p></a>
                </div>
                <div class="col-xl-3 col-md-4 text-center sidebox">
                    <div class="sideboxnest">
                        <h2>Derniers temps enregistrés</h2>
                        <ul id="uldt">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/formatT.js"></script>
        <script type="text/javascript" src="js/affDerT.js"></script>
        <script type="text/javascript">
            $(function() {
                var data = <?php echo json_encode($data); ?>;
                var li;
                Object.keys(data.dernieres_entrees).forEach(function(k) {
                    li = '<li>' + affDerT(data.dernieres_entrees[k]) + '</li>';
                    $('#uldt').append(li);
                });
            });
        </script>
    </body>
</html>