function affDerT(row) {
    var jour = row.debut.slice(8, 10);
    var tab_cor_m = {
        "01" : "Janvier",
        "02" : "Février",
        "03" : "Mars",
        "04" : "Avril",
        "05" : "Mai",
        "06" : "Juin",
        "07" : "Juillet",
        "08" : "Août",
        "09" : "Septembre",
        "10" : "Octobre",
        "11" : "Novembre",
        "12" : "Décembre"
    };
    var mois = row.debut.slice(5, 7);
    mois = tab_cor_m[mois];
    var annee = row.debut.slice(0, 4);
    var ot = formatT(row.decompte);
    var sAA = jour + ' ' + mois + ' ' + annee + ' ' + ot['h'] + ':' + ot['m'] + ':' + ot['s'];
    return sAA;
}