<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gestion</title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="lib/vendor/bootstrap-4.5.0-dist/css/bootstrap.css"><!-- liens à changer quand template invoqué depuis répertoire web -->
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
                            <li><a href="index.php?page=chrono">Chrono</a></li>
                            <li><a href="index.php?page=login&task=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-12" id="affichage-gestion">
                    <div class="row" id="alert-sup">
                        <div class="col-xl-10 offset-xl-1 alert alert-success alrtcust">
                            Entrée supprimée avec succès !
                        </div>
                    </div>
                    <div class="row" id="alert-supm">
                        <div class="col-xl-10 offset-xl-1 alert alert-success alrtcust">
                            Entrées supprimées avec succès !
                        </div>
                    </div>
                    <div class="row" id="alert-mod">
                        <div class="col-xl-10 offset-xl-1 alert alert-success alrtcust">
                            Entrée modifiée avec succès !
                        </div>
                    </div>
                    <div class="row" id="alert-mods">
                        <div class="col-xl-10 offset-xl-1 alert alert-success alrtcust">
                            Entrées modifiées avec succès !
                        </div>
                    </div>
                    <div class="row" id="alert-new">
                        <div class="col-xl-10 offset-xl-1 alert alert-success alrtcust">
                            Entrée ajoutée avec succès !
                        </div>
                    </div><div class="row" id="alert-modlimit">
                        <div class="col-xl-10 offset-xl-1 alert alert-danger alrtcust">
                            Sélectionner 5 entrées maximum à modifier !
                        </div>
                    </div>
                    <div class="row" id="raffn">
                        <div class="col-sm-10 offset-sm-1 col-12" >
                            <div class="text-center"><h2>Gestion dernières entrées</h2></div>
                            <div class="text-center"><h2>Résultat sélection par date</h2></div>
                            <div class="text-center"><h2>Total dates sélectionnées : <span id="h2total"></span></h2></div>
                            <form id="formentries" class="formentries" method="post">
                                <table id="tabaffn">
                                    <tr>
                                        <th>Sélectionner</th>
                                        <th>Heure/date de Début</th>
                                        <th>Heure/date de fin</th>
                                        <th>Durée</th>
                                    </tr>
                                   <!--<tr>
                                        <td><input type="checkbox" name="select-entry[]" value="10"></td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0 heures 0 minutes 0 secondes</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="select-entry[]" value="9"></td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0 heures 0 minutes 0 secondes</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="select-entry[]" value="8"></td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0 heures 0 minutes 0 secondes</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="select-entry[]" value="7"></td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0 heures 0 minutes 0 secondes</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="select-entry[]" value="6"></td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0 heures 0 minutes 0 secondes</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="select-entry[]" value="5"></td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0 heures 0 minutes 0 secondes</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="select-entry[]" value="4"></td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0 heures 0 minutes 0 secondes</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="select-entry[]" value="3"></td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0 heures 0 minutes 0 secondes</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="select-entry[]" value="2"></td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0 heures 0 minutes 0 secondes</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="select-entry[]" value="1"></td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0000-00-00 00:00:00</td>
                                        <td>0 heures 0 minutes 0 secondes</td>
                                    </tr>-->
                                </table>
                                <input type="checkbox" id="select-all">
                                <label for="select-all">Sélectionner tout</label>

                                <input type="submit" id="modifier-sub" value="Modifier" class="float-right"><!-- à valider en js, une seule case cochée -->
                                <input type="submit" id="sup-sub" value="Supprimer" class="float-right" data-toggle="modal" data-target="#supModal">
                                <input type="submit" id="total-sub" name="total" value="Calcul total" class="float-right">
                            </form>
                            <div id="lselection">Lignes sélectionnées : <span id="ldebut">1</span>-<span id="lfin">10</span> <span id="sep-ssel">| </span></div> <!-- à modifier dynamiquement avec données selectRows et nextRows -->
                            <form method="post" id="fSelectRows"><!-- à cacher si lignes sélectionnées par date -->
                                <label for="selectRows">Lignes à afficher :</label>
                                <select id="selectRows" name="selectRows">
                                    <option disabled selected value>--</option>
                                    <option value="1">1</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                                <input type="hidden" name="selectRowsOff" id="selectRowsOff" value="0"><!-- 0 par défaut -->
                            </form><br>
                            <form method="post" id="fPrevRows"><!-- classe d-none à rajouter plus tard, sera caché par défaut puis révélé avec removeclass quand lignes suivantes sélectionnées -->
                                <label for="prevRows">Lignes précédentes :</label>
                                <select id="prevRows" name="prevRows">
                                    <option disabled selected value>--</option>
                                    <option value="1">1</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                                <input type="hidden" name="prevRowsOff" id="prevRowsOff" value="0"><!-- calqué sur valeur de selectRowsOff -->
                            </form>
                            <form method="post" id="fNextRows">
                                <label for="nextRows">Lignes suivantes :</label>
                                <select id="nextRows" name="nextRows">
                                    <option disabled selected value>--</option>
                                    <option value="1">1</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                                <input type="hidden" name="nextRowsOff" id="nextRowsOff" value="10"><!-- par défaut 10 puisque 10 premières lignes affichées de base -->
                            </form> <span id="sep-np">|</span><br id="br-np">
                            <form method="post" class="d-none" id="fpreml">
                                <input type="hidden" name="preml">
                            </form>
                            <button class="btn btn-light" id="bprem">
                                <span class="contenu-b">Premières</span>
                            </button>
                            <form method="post" class="d-none" id="fderl">
                                <input type="hidden" name="derl">
                            </form>
                            <button class="btn btn-light" id="bder">
                                <span class="contenu-b">Dernières</span>
                            </button>
                        </div>
                    </div>
                    <div class="row" id="raffmod-new"><!-- double emploi mod ou ne selon données get et post -->
                        <div class="col-xl-10 offset-xl-1" >
                            <div class="text-center" id="hne"><h2>Nouvelle entrée</h2></div>
                            <div class="text-center" id="hme"><h2>Modification entrées</h2></div>
                            <form method="post" id="form-modnew">
                                <div class="form-group">
                                    <input type="hidden" name="idEntree" id="idEntree" value="0"><!-- 0 si nouvelle entrée sinon val attribuée dynamiquement -->
                                </div>
                                <div class="form-group">
                                    <label for="dateMod">Date de début:</label>
                                    <input type="date" class="form-control" id="dateMod" name="dateMod" required><!-- rajout [] à name si modif plus attribution dynamique de value -->
                                </div>
                                <div class="form-group">
                                    <label for="timeMod">Temps Heure + Minutes de début :</label>
                                    <input type="time" class="form-control" id="timeMod" name="timeMod" required>
                                </div>
                                <div class="form-group">
                                    <label for="secMod">Secondes début :</label>
                                    <input type="number" class="form-control" id="secMod" name="secMod" min="0" max="59" required>
                                </div>
                                <div class="form-group">
                                    <label for="dateModfin">Date de fin :</label>
                                    <input type="date" class="form-control" id="dateModfin" name="dateModfin" required>
                                </div>
                                <div class="form-group">
                                    <label for="timeModfin">Temps Heure + Minutes de fin:</label>
                                    <input type="time" class="form-control" id="timeModfin" name="timeModfin" required>
                                </div>
                                <div class="form-group">
                                    <label for="secModfin">Secondes fin :</label>
                                    <input type="number" class="form-control" id="secModfin" name="secModfin" min="0" max="59" required>
                                </div>
                                <button type="button" class="btn btn-light cust-btn" id="bconf-modif" data-toggle="modal" data-target="#confModModal">Confirmer modification</button><!-- cacher l'un ou l'autre bouton selon données get et post -->
                                <button type="submit" class="btn btn-light cust-btn" name="conf-newE">Enregistrer nouvelle entrée</button>
                            </form>
                        </div>
                    </div>
                    <div class="row" id="raffsld">
                        <div class="col-xl-10 offset-xl-1" >
                            <div class="text-center"><h2>Sélection par date</h2></div>
                            <form method="post" id="form-sld" action="index.php?page=gestion">
                                <div class="form-group">
                                    <input type="date" class="form-control" name="date-select[]" required>
                                </div>
                                <button class="btn btn-light" id="add-dsl">
                                    <span class="contenu-b"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                                      <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                                    </svg></span>
                                </button>
                                <button type="submit" class="btn btn-light">Sélectionner</button>
                                <!-- inputs à rajouter dynamiquement en jquery pour sélection multiple ? -->
                            </form>
                            <div class="text-center"><h2>Sélection de date à date</h2></div>
                            <form method="post" id="form-sldr" action="index.php?page=gestion">
                                <div class="form-group">
                                    <label for="dslrd">Date de début :</label>
                                    <input type="date" class="form-control" name="dslrd" id="dslrd" required>
                                </div>
                                <div class="form-group">
                                    <label for="dslrf">Date de fin :</label>
                                    <input type="date" class="form-control" name="dslrf" id="dslrf" required>
                                </div>
                                <button type="submit" class="btn btn-light">Sélectionner intervalle</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-12 text-center sidebox">
                    <div class="sideboxnest">
                        <h2 class="tngeschro">Menu gestion</h2>
                        <ul class="navgeschro">
                            <li><a href="index.php?page=gestion" id="select-mod">Afficher et modifier</a></li>
                            <li><a href="index.php?page=gestion&opt=newE" id="new-entry">Nouvelle Entrée</a></li>
                            <li><a href="index.php?page=gestion&opt=SBD" id="searchByDate">Chercher par date</a></li>
                        </ul>
                    </div>
                </div>
                <div class="modal fade" id="supModal" tabindex="-1" role="dialog" aria-labelledby="supModalBody">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body" id="supModalBody">
                                Valider la suppression ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="supmanb">Annuler</button>
                                <button type="button" class="btn btn-light" id="bval-sup">Valider</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="confModModal" tabindex="-1" role="dialog" aria-labelledby="confModModalBody">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body" id="confModModalBody">
                                Valider la modification ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cfmanb">Annuler</button>
                                <button type="button" class="btn btn-light" id="bval-cm">Valider</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/formatT.js"></script>
        <script type="text/javascript">
            $(function() {
                var i;
                var n;
                var data = <?php echo json_encode($data); ?>;
                
                $("div[id^='alert']").hide();
                $("#raffn div[class='text-center']:nth-child(2), #raffn div[class='text-center']:nth-child(3)").hide();
                
                $('#raffn, #raffmod-new, #raffsld').hide();
                if ('noSlrows' in data) {
                    $('fSelectRows').hide();
                }
                if ('noNext' in data) {
                    $('#fNextRows').hide();
                }
                if ('noPrev' in data) {
                    $('#fPrevRows').hide();
                }
                if (!('noNext' in data) && !('noPrev' in data) && $(window).width() >= 598) {
                    $('#sep-np').css("display", "initial");
                }
                
                //construit tr à insérer dans le tableau affichage et gestion quand l'une ou l'autre condition est remplie
                function getTrToAppend(id, debut, fin, duree) {
                    
                    /*var d = new Date(duree);
                    var heures = d.getUTCHours();
                    var min = d.getUTCMinutes();
                    var sec = d.getUTCSeconds();*/
                    
                    var ot = formatT(duree);
                    
                    /*var tr = '<tr><td><input type="checkbox" name="select-entry[]" value="'+id+'"></td><td>'+debut+'</td><td>'+fin+'</td><td>'+heures+' heures '+min+' minutes '+sec+' secondes</td></tr>';*/
                    
                    var tr = '<tr><td><input type="checkbox" name="select-entry[]" value="'+id+'"></td><td>'+debut+'</td><td>'+fin+'</td><td>'+ot['h']+' heures '+ot['m']+' minutes '+ot['s']+' secondes</td></tr>';
                    
                    return tr;
                }
                
                function iterateOnDO(datO) {
                    Object.keys(datO).forEach(function(k) {
                        tr = getTrToAppend(datO[k].id, datO[k].debut, datO[k].fin, datO[k].decompte);
                        $('#tabaffn').append(tr);
                    });
                }
                
                function prepSAfN() {
                    $('#selectRowsOff').val(data.offsetSH);
                    $('#prevRowsOff').val(data.offsetSH);
                    $('#nextRowsOff').val(data.offsetNH);
                    ld = parseInt(data.offsetSH) + 1;
                    lf = ld + parseInt(data.nbSlc) - 1;
                    $('#ldebut').text(ld);
                    $('#lfin').text(lf);
                    $('#raffn').show();
                }
                
                //commenté temporairement à cause de data comme au-dessus
                var tr;
                var ld;
                var lf;
                if ('ligne_modif' in data) {
                    $('#raffmod-new').show();
                    $('#hne').hide();
                    $("button[name='conf-newE']").hide();
                    //var cl = Object.keys(data.ligne_modif).length;
                    var fg;
                    var nm;
                    var id_e;
                    var date;
                    var time;
                    var sec;
                    //if (cl > 1) {
                    if (Array.isArray(data['ligne_modif'])) {
                        //console.log(':(')
                        var cl = data['ligne_modif'].length;
                        var gr_entree = $("#form-modnew .form-group");
                        //console.log($('<div>').append($(gr_entree).clone()).remove().html());
                        gr_entree = $('<div>').append($(gr_entree).clone()).remove().html();
                        var ind;
                        var nval;
                        var nest;
                        var nested;
                        var iid;
                        for (i = 1; i <= cl; i++) { //insère nouveau groupe de champs pour chaque entrée sélectionnée, et change les valeurs dynamiquement
                            if (i < cl) {
                                //console.log(i);
                                //$('<hr>').insertAfter($("#form-modnew .form-group").last());
                        
                                //console.log(i);
                                $('<hr class="hrmod">' + gr_entree).insertAfter($("#form-modnew .form-group").last());
                            }
                            ind = i * 7;
                            //nest = $("#form-modnew .form-group").slice(ind, ind + 7);
                            nest = $("#form-modnew .form-group").slice(ind -7 , ind);
                            nested = $('input', nest);
                            nested.prop("id", function(it, val) {
                                //nval = val.slice(0, -1);
                                iid = i - 1;
                                //nval += iid;
                                //return nval;
                                val += iid;
                                return val;
                            });
                        }
                        
                        //var id_i;
                        //var r_fetch;
                        fg = $("#form-modnew .form-group input");
                        i = 0;
                        ind = 1
                        fg.each(function(index, inp) {
                            nm = $(inp).attr("name");
                            //id_i = $(inp).attr("id");
                            $(inp).prop("name", nm + '[]'); //transforme l'attribut name en tableau en cas de sélection multiple pour modif
                            //r_fetch = parseInt(id_i.slice(-1));
                            if ($(inp).attr("type") == "hidden") {
                                id_e = data['ligne_modif'][i].id;
                                $(inp).val(id_e);
                            } else if (nm == "dateMod") {
                                date = data['ligne_modif'][i].debut;
                                $(inp).val(date.slice(0, 10));
                            } else if (nm == "timeMod") {
                                time = data['ligne_modif'][i].debut;
                                $(inp).val(time.slice(11, 16));
                            } else if (nm == "secMod") {
                                sec = data['ligne_modif'][i].debut;
                                $(inp).val(sec.slice(17));
                            } else if (nm == "dateModfin") {
                                date = data['ligne_modif'][i].fin;
                                $(inp).val(date.slice(0, 10));
                            } else if (nm == "timeModfin") {
                                time = data['ligne_modif'][i].fin;
                                $(inp).val(time.slice(11, 16));
                            } else if (nm == "secModfin") {
                                sec = data['ligne_modif'][i].fin;
                                $(inp).val(sec.slice(17));
                            }
                            ind++;
                            if (ind > 7) {
                                ind = 1;
                                i++;
                            }
                        });
                    } else {
                        fg = $("#form-modnew .form-group input");
                        //console.log(fg);
                        fg.each(function(index, inp) {
                            nm = $(inp).attr("name");
                            //console.log(nm);
                            if (nm == "idEntree") {
                                //console.log(nm);
                                id_e = data['ligne_modif'].id;
                                $(inp).val(id_e);
                            } else if (nm == "dateMod") {
                                //console.log(nm);
                                date = data['ligne_modif'].debut;
                                $(inp).val(date.slice(0, 10));
                            } else if (nm == "timeMod") {
                                //console.log(nm);
                                time = data['ligne_modif'].debut;
                                $(inp).val(time.slice(11, 16));
                            } else if (nm == "secMod") {
                                //console.log(nm);
                                sec = data['ligne_modif'].debut;
                                $(inp).val(sec.slice(17));
                            } else if (nm == "dateModfin") {
                                //console.log(nm);
                                date = data['ligne_modif'].fin;
                                $(inp).val(date.slice(0, 10));
                            } else if (nm == "timeModfin") {
                                //console.log(nm);
                                time = data['ligne_modif'].fin;
                                $(inp).val(time.slice(11, 16));
                            } else if (nm == "secModfin") {
                                //console.log(nm);
                                sec = data['ligne_modif'].fin;
                                $(inp).val(sec.slice(17));
                            }
                        });
                    }
                } else if ('aff-newE' in data) {
                    $('#raffmod-new').show();
                    $('#form-modnew').attr('action', 'index.php?page=gestion');
                    $('#hme').hide();
                    $("button[name='conf-modif']").hide();
                } else if ('aff-SBD' in data) {
                     $('#raffsld').show();
                } else if ('selectedRows' in data) {
                    /*Object.keys(data.selectedRows).forEach(function(k) {
                        tr = getTrToAppend(data.selectedRows[k].id, data.selectedRows[k].debut, data.selectedRows[k].fin, data.selectedRows[k].decompte);
                        $('#tabaffn').append(tr);
                    });*/
                    iterateOnDO(data.selectedRows);
                    if (data.offsetSH > 0) {
                        $('#fPrevRows').removeClass('d-none'); //s'il y a matière à faire précédent on affiche le menu déroulant qui va avec
                    }
                    /*$('#selectRowsOff').val(data.offsetSH);
                    $('#prevRowsOff').val(data.offsetSH);
                    $('#nextRowsOff').val(data.offsetNH);
                    ld = parseInt(data.offsetSH) + 1;
                    lf = ld + parseInt(data.nbSlc) - 1;
                    $('#ldebut').text(ld);
                    $('#lfin').text(lf);
                    $('#raffn').show();*/
                    prepSAfN();
                } else if ('rowsPrev' in data) {
                    iterateOnDO(data.rowsPrev);
                    prepSAfN();
                } else if ('rowsNext' in data) {
                    /*Object.keys(data.rowsNext).forEach(function(k) {
                        tr = getTrToAppend(data.rowsNext[k].id, data.rowsNext[k].debut, data.rowsNext[k].fin, data.rowsNext[k].decompte);
                        $('#tabaffn').append(tr);
                    });*/
                    iterateOnDO(data.rowsNext);
                    $('#fPrevRows').removeClass('d-none');
                    $('#selectRowsOff').val(data.offsetSH);
                    $('#prevRowsOff').val(data.offsetSH);
                    $('#nextRowsOff').val(data.offsetNH);
                    ld = parseInt(data.offsetSH) + 1;
                    lf = ld + parseInt(data.nbSlc) - 1;
                    $('#ldebut').text(ld);
                    $('#lfin').text(lf);
                    $('#raffn').show();
                } else if ('lignes_sld' in data || 'rowsDR' in data) {
                    if ('lignes_sld' in data) {
                        iterateOnDO(data.lignes_sld);
                    } else if ('rowsDR' in data) {
                        iterateOnDO(data.rowsDR);
                    }
                    
                    $('#raffn').show();
                    $("#raffn div[class='text-center']:nth-child(1)").hide();
                    $("#raffn div[class='text-center']:nth-child(2)").show();
                    $('#lselection, #fSelectRows, #fPrevRows, #fNextRows, #sep-np, #bprem, #bder').hide();
                    $('#raffsld').show();
                } else if ('rowsTot' in data) {
                    iterateOnDO(data.rowsTot);
                    $('#raffn').show();
                    $("#raffn div[class='text-center']:nth-child(1)").hide();
                    $("#raffn div[class='text-center']:nth-child(2)").hide();
                    $("#raffn div[class='text-center']:nth-child(3)").show();
                    var total = formatT(data['totDec'], true);
                    $('#h2total').text(total['h'] + ' heures ' + total['m'] + ' minutes ' + total['s'] + ' secondes.');
                    $('#lselection, #fSelectRows, #fPrevRows, #fNextRows, #sep-np, #bprem, #bder').hide();
                } else if ('rowsLast' in data) {
                    var rl = Object.keys(data.rowsLast).reverse();
                    rl.forEach(function(k) {
                        tr = getTrToAppend(data.rowsLast[k].id, data.rowsLast[k].debut, data.rowsLast[k].fin, data.rowsLast[k].decompte);
                        $('#tabaffn').append(tr);
                    });
                    $('#fPrevRows').removeClass('d-none');
                    $('#selectRowsOff').val(data.offsetSH);
                    $('#prevRowsOff').val(data.offsetSH);
                    ld = parseInt(data.offsetSH) + 1;
                    lf = ld + parseInt(data.nbSlc) - 1;
                    $('#ldebut').text(ld);
                    $('#lfin').text(lf);
                    $('#raffn').show();
                } else if ('rowsNorm in data') {
                    /*Object.keys(data.rowsNorm).forEach(function(k) {
                         tr = getTrToAppend(data.rowsNorm[k].id, data.rowsNorm[k].debut, data.rowsNorm[k].fin, data.rowsNorm[k].decompte);
                        $('#tabaffn').append(tr);
                    });*/
                    iterateOnDO(data.rowsNorm);
                    /*ld = parseInt(data.offsetSH) + 1;
                    lf = ld + parseInt(data.nbSlc);
                    $('#ldebut').text(ld);
                    $('#lfin').text(lf);*/
                    $('#raffn').show();
                    
                    
                    if ('supprime' in data) {
                        $('#alert-sup, #raffn').show();
                    } else if ('supprimem' in data) {
                        $('#alert-supm, #raffn').show();
                    } else if ('modifie' in data) {
                        $('#alert-mod, #raffn').show();
                    } else if ('modifies' in data) {
                        $('#alert-mods, #raffn').show();
                    } else if ('new-ins' in data) {
                        $('#alert-new, #raffn').show();
                    }
                }
                //-----------------------------------------------------------------------
                
                
                $("#select-all").click(function() {
                    if ($(this).prop('checked')) {
                        $("input:checkbox").prop('checked', true);
                    } else {
                        $("input:checkbox").prop('checked', false);
                    }
                });
                
                $("#selectRows").change(function() {
                    $("#fSelectRows").submit();
                });
                $("#nextRows").change(function() {
                    $("#fNextRows").submit();
                });
                $("#prevRows").change(function() {
                    $("#fPrevRows").submit();
                });
                
                $('#bprem').click(function() {
                    $('#fpreml').submit();
                });
                
                $('#bder').click(function() {
                    $('#fderl').submit();
                });
                
                $("#modifier-sub").click(function(event) {
                    event.preventDefault();
                    n = $("input[name='select-entry[]']:checked").length;
                    if (n <= 5) {
                        $("#formentries").prepend('<input type="hidden" name="modifier">');
                        $("#formentries").submit();
                    } else {
                        $('#alert-modlimit').show();
                    }
                });
                
                $("#sup-sub").click(function(event) {
                    event.preventDefault();
                });
                
                $('#bval-sup').click(function(event) {
                    $('#formentries').prepend('<input type="hidden" name="supprimer">');
                    $('#formentries').submit();
                });
                
                $('#bval-cm').click(function(event) {
                    $('#form-modnew').prepend('<input type="hidden" name="conf-modif">');
                    $('#form-modnew').submit();
                })
                
                var fgr;
                $("#add-dsl").click(function(event) {
                    event.preventDefault();
                    fgr = '<div class="form-group" style="display:none;"><input type="date" class="form-control" name="date-select[]"></div>';
                    $("#form-sld .form-group").last().after(fgr);
                    $("#form-sld .form-group").last().slideToggle();
                });
                
                
            });
        </script>
    </body>
</html>