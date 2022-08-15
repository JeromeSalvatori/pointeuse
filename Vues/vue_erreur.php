<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oups !</title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
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
                <div class="col-xl-8 offset-xl-2 text-center">
                    <img src="images/danger.png" alt="danger" id="danger">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center" id="div-err">
                    Désolé mais ça ne va pas le faire. Une erreur s'est produite avec le message suivant : <span id="msg-err"></span>.
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function() {
                var data = <?php echo json_encode($data); ?>;
                
                $('#msg-err').text(data.erreur);
            });
        </script>
    </body>
</html>