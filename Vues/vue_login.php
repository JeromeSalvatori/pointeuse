<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="lib/vendor/bootstrap-4.5.0-dist/css/bootstrap.css"><!-- liens à changer quand template invoqué depuis répertoire web -->
        <link rel="stylesheet" href="style/style.css">
        <script src="lib/vendor/jquery/jquery-3.5.1.js"></script>
        <script src="lib/vendor/popper/popper.min.js"></script>
        <script src="lib/vendor/bootstrap-4.5.0-dist/js/bootstrap.js"></script>
    </head>
    <body class="body-lv">
        <div class="container-fluid">
            <header class="row">
                <div class="col-12 text-center" id="titre"><h1>Le temps c'est de l'argent</h1></div>
            </header>
            <div class="row">
                <div class="offset-xl-4 col-xl-4 offset-lg-3 col-lg-6 offset-md-2 col-md-8 offset-sm-1 col-sm-10">
                    <div class="d-none alert alert-danger" id="alert-log">Nom d'utilisateur ou mot de passe invalide !</div>
                </div>
            </div>
            <div class="row">
                <div class="offset-xl-4 col-xl-4 offset-lg-3 col-lg-6 offset-md-2 col-md-8 offset-sm-1 col-sm-10">
                    <div class="d-none alert alert-success" id="alert-logout">Utilisateur déconnecté !</div>
                </div>
            </div>
            <div class="row">
                <div class="offset-xl-4 col-xl-4 offset-lg-3 col-lg-6 offset-md-2 col-md-8 offset-sm-1 col-sm-10">
                    <form method="post" id="form-login">
                        <div class="text-center">
                            <h2>Page de login</h2>
                            <hr>
                        </div>
                        <div class="form-group">
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="mdp">Mot de passe</label>
                            <input type="password" class="form-control" id="mdp" name="mdp">
                        </div>
                        <button type="submit" class="btn btn-secondary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function() {
                var data = <?php echo json_encode($data); ?>;
                if (data.loggedStatus) {
                    window.location.replace('/');
                } else {
                    if ('login_failed' in data) {
                        $('#alert-log').removeClass('d-none');
                        $('#form-login').css('margin-top', '1rem');
                    } else if ('logged_out' in data) {
                        $('#form-login').hide();
                        $('#alert-logout').removeClass('d-none');
                        setTimeout(function() {
                            window.location.href = '/';
                        }, 2000);
                    }
                }
            });
        </script>
    </body>