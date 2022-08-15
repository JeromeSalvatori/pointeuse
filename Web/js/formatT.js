function formatT(decompte, total = false) {
    decompte = parseInt(decompte);
    decompte = decompte * 1000;
    var d = new Date(decompte);
    var heures;
    if (!total) {
        heures = d.getUTCHours();
    }
    
    var minutes = d.getUTCMinutes();
    if (minutes < 10) {
        minutes = "0" + minutes;
    }
    var secondes = d.getUTCSeconds();
    if (secondes < 10) {
        secondes = "0" + secondes;
    }
    
    if (total) {
        heures = decompte / 1000 - parseInt(minutes) * 60 - parseInt(secondes);
        heures = heures / 3600;
    }
    
    if (heures < 10) {
        heures = "0" + heures;
    }
    
    var o = new Object();
    o['h'] = heures;
    o['m'] = minutes;
    o['s'] = secondes;
    
    return o;
}