<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Chronomètre</title>
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
                <div class="sidebox col-xl-3 col-12 text-center">
                    <div class="sideboxnest">
                        <h2 class="tngeschro">Navigation</h2>
                        <ul id="navul" class="navgeschro">
                            <li><a href="index.php?page=accueil">Accueil</a></li>
                            <li><a href="index.php?page=gestion">Gestion</a></li>
                            <li><a href="index.php?page=login&task=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-12" id="affichage">
                    <div class="row">
                        <div class="col-12 text-center" id="chrono">00:00:00</div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2 text-center" id="boutons">
                            <button type="button" class="btn btn-light chrobtn" id="start">Démarrer</button>
                            <button type="button" class="btn btn-light chrobtn" id="stop">Arrêter</button>
                            <button type="button" class="btn btn-light chrobtn" data-toggle="modal" data-target="#resetModal">Reset</button>
                            <form action="index.php?page=chrono" method="post" id="fenvoi">
                                <input type="hidden" id="icached" name="debut">
                                <input type="hidden" id="icachef" name="fin">
                                <input type="hidden" id="icachet" name="temps">
                                <button type="button" class="btn btn-light chrobtn" data-toggle="modal" data-target="#sendModal">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-12 text-center sidebox">
                    <div class="sideboxnest">
                        <h2 class="tngeschro">Derniers temps enregistrés</h2>
                        <ul id="uldt_chro">
                        </ul>
                    </div>
                </div>
            </div>
            
            
            <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModalBody">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body" id="resetModalBody">
                            Remettre à zéro ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="button" class="btn btn-light" id="reset" data-dismiss="modal">Valider</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="sendModalBody">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body" id="sendModalBody">
                            <span id="smbd">Valider l'enregistrement ?</span>
                            <span id="smba1">Arrêter le chrono avant d'enregistrer !</span>
                            <span id="smba2">Pas de temps à enregistrer !</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="smanb">Annuler</button>
                            <button type="button" class="btn btn-light" id="submit-chrono">Valider</button>
                            <button type="button" class="btn btn-light" id="smokb" data-dismiss="modal">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="warningModalBody">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body" id="warningModalBody">
                            Remettre à zéro ou enregistrer avant de relancer un chrono !
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/formatT.js"></script>
        <script type="text/javascript" src="js/affDerT.js"></script>
        <script type="text/javascript">
         $(function() {
             var setTm=0;
             var tmStart=0;
             var tmNow=0;
             var tmInterv=0;
             var forbidStart=false;
             $('#smba1, #smbd, #smanb, #submit-chrono').hide();
             
             function affTime(tm){ //affichage du compteur
               var vH = tm.getUTCHours();
               var vMin=tm.getUTCMinutes();
               var vSec=tm.getUTCSeconds();
               if (vH < 10) {
                   vH = "0" + vH;
               }
               if (vMin<10){
                  vMin="0"+vMin;
               }
               if (vSec<10){
                  vSec="0"+vSec;
               }
                 var affichage = vH+":"+vMin+":"+vSec;
               $("#chrono").html(affichage);
             }
             function fChrono(){
                   tmNow=new Date();
                   Interv=tmNow-tmStart;
                   tmInterv=new Date(Interv);
                   affTime(tmInterv);
                }
             function fStart(){
                   fStop();
                   if (tmInterv==0) {
                      tmStart=new Date();
                      $('#icached').val(Date.now());
                      $('#smba2').hide();
                   } else { //si on repart après un clic sur Stop
                      tmNow=new Date();
                      Pause=tmNow-tmInterv;
                      tmStart=new Date(Pause);
                      $('#smbd, #smanb, #submit-chrono').hide();
                      $('#smokb').show();
                   }
                   setTm=setInterval(fChrono,10); //lancement du chrono tous les centièmes de secondes
                    $('#smba1').show();
                    forbidStart = true;
                }
             var temps;
             function fStop(){
               clearInterval(setTm);
               if (tmInterv > 0) {
                   $('#icachef').val(Date.now());
                   temps = $('#icachef').val() - $('#icached').val();
                   $('#icachet').val(temps);
                   $('#smba1, #smokb').hide();
                   $('#smbd, #smanb, #submit-chrono').show();
               }
            }
             function fReset(){ 
               fStop();
                 if(tmInterv > 0) {
                     $('#smbd, #smanb, #submit-chrono').hide();
                     $('#smba2, #smokb').show();
                 }
               tmStart=0;
               tmInterv=0;
               $("#chrono").html("00:00:00");
               $('#icached').val('');
               $('#icachef').val('');
               $("#icachet").val('0');
                 $('#start').removeAttr('data-toggle');
                 $('#start').removeAttr('data-target');
                 forbidStart= false;
            }
             
             function submitChrono() {
                 $("#fenvoi").submit();
             }
             
             $("#start").click(function(event) {
                 if (!forbidStart) {
                     fStart();
                 } else {
                     $('#start').attr('data-toggle', 'modal');
                    $('#start').attr('data-target', '#warningModal');
                 }
             })
             $("#stop").click(fStop);
             $("#reset").click(fReset);
             $("#submit-chrono").click(submitChrono);
             
             var data = <?php echo json_encode($data); ?>;
            var li;
             Object.keys(data.dernieres_entrees).forEach(function(k) {
                    li = '<li>' + affDerT(data.dernieres_entrees[k]) + '</li>';
                    $('#uldt_chro').append(li);
            });
         });
        </script>
    </body>
</html>