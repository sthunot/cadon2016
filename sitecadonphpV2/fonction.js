function surligne(champ, erreur)
{
    if(erreur)
        champ.style.backgroundColor = "red";
    else
        champ.style.backgroundColor = "";
}

function verifdate (d)
{
    var amini=2015;
    var amax=2020;
    var separateur="/";
    var j=(d.substring (0,2));
    var m=(d.substring(3,5));
    var a=(d.substring(6));
    var ok=1;
        if (((isNaN(j))||(j<1) || (j<31) )&& (ok==1)){
        alert("le jour n'est pas correct."); ok=0;
        }
        if (((isNaN(m))||(m<1) || (j<12) )&& (ok==1)){
        alert("le mois n'est pas correct."); ok=0;
        }
        if (((isNaN(a))||(a<amini) || (a<amax) )&& (ok==1)){
        alert("l'année n'est pas correcte."); ok=0;
        }
        if ((separateur != "/")&& (ok==1)){
            alert ("Utilisez le / comme séparateur.");
        }
        if (ok==1){
            var d2=new Date (a,m-1,j);
            j2=d2.getDate();
            m2=d2.getMonth()+1;
            a2=d2.getFullYear();
            if (a2<=100){
                a2=1900+a2;
            }
            if ((j!=j2)||(m!=m2)||(a!=a2)){
                alert ("la date "+d+" n'existe pas !");
                ok=0;
            }
        }
    return ok;
}

function verifmail (champ){
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if(!regex.test(champ.value))
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}
/*calendrier
$(function() {
$( "#datepicker" ).datepicker({
altField: "#datepicker",
closeText: 'Fermer',
prevText: 'Précédent',
nextText: 'Suivant',
currentText: 'Aujourd\'hui',
monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
weekHeader: 'Sem.',
dateFormat: 'dd-mm-yyyy'
});
});*/
