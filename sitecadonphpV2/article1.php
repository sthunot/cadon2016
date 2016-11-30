<?php include ("head.php");?>
    <body id="main">

        <div>
           <?php include ("header.php");?>

            <?php include("menu.php"); ?>

        <div class="dateheure">
            <?php
                $date = date("d-M-Y");
                $heure = date("H:i:s");
                echo ("Nous sommes le $date $heure");
            ?>
        </div>
            <a href="actualite.php"><i><u><h6><<< RETOUR </h6></u></i></a>
                <div class="cartel">
                    <a href="actualite.php">
                            <h3>Les seuils réglementaires : un débat complexe</h3><br><br>
                                <p class="actuimg"><img src="images/dangerCD.jpg"></p>
                              <p><h4>Dès 2001, la communauté européenne a réglementé
                              la teneur maximale en cadmium dans certaines
                              denrées alimentaires et matières premières destinées à
                              l’alimentation humaine (CE 1881/2006) et animale (CE
                              87/2005). Pour le blé dur, la teneur seuil est de 0,2 mg/
                              kg de grain commercialisé.<br><br>
                              Mais depuis quatre ans, ce seuil fait débat au sein de
                              l’Union européenne et de la France. En janvier 2009,
                              l’Efsa (agence européenne de sécurité sanitaire des
                              aliments) publie un avis selon lequel « les céréales
                              comptent parmi les aliments qui contribuent le
                              plus à l’exposition au cadmium du fait de leur forte
                              consommation ». <br><br>L’agence évoque ainsi la possibilité
                              d’une sur-exposition de certaines populations, telles que
                              les enfants et les végétariens. Deux ans plus tard, un
                              nouvel avis est publié. <br>Il confirme l’abaissement de la
                              dose hebdomadaire tolérable à 2,5 μg/kg (contre 7 μg/kg
                              admis auparavant). Or, l’exposition des consommateurs
                              est très proche de cette valeur de référence. Fort de ces
                              résultats, la commission européenne décide de réviser
                              les seuils en vigueur sur céréales.<br><br> Les discussions sont
                              vives entre les États membres. En effet, un seuil abaissé à
                              0,1 mg/kg pourrait engendrer des déclassements de lots
                              conséquents pour les fi lières, surtout en blé dur.<br><br>
                              En mai 2011, la Commission propose un seuil à 0,1 mg/
                              kg sur céréales, à l’exception du blé dur, dont la limite
                              serait fi xée à 0,15 mg/kg.<br>
                              Une marche arrière motivée par l’expertise
                              issue des travaux d’enquêtes
                              Conjointement à ces discussions, l’étude de l’alimentation
                              totale (EAT) en France publiée par l’Anses (Agence
                              nationale de sécurité sanitaire de l’alimentation, de
                              l’environnement et du travail) montre que le risque
                              représenté par les céréales sur leur contribution dans
                              les apports en cadmium ne peut être écarté, confi rmant
                              ainsi les conclusions de l’Efsa.<br><br> Toutefois, après une étude
                              plus poussée, l’Anses publie en novembre 2011 un avis
                              indiquant que l’abaissement des limites en cadmium
                              n’aura aucun impact sur l’exposition du consommateur.<br>
                              Sur ces bases, la commission européenne propose en
                              janvier 2012 un abaissement des seuils en deux temps
                              pour le blé dur, à 0,175 mg/kg sur trois ans puis à
                              0,15 mg/kg. Mais, la commission fait marche arrière en
                              mai, avec l’abandon du projet d’abaissement des seuils
                              réglementaires pour une recommandation dont le contenu
                              n’est à ce jour pas connu.<br><br>
                              En l’espace de trois ans, le discours est passé
                              d’une volonté d’abaissement par deux des limites
                              réglementaires à une simple recommandation. <br><br>Cette
                              situation révèle la complexité de légiférer sur des limites
                              réglementaires pour les contaminants et surtout, l’intérêt
                              des avis des experts pour une législation cohérente.</h4></p><br><br><br>
                        </a>
                </div>
              <!--<div><iframe class="pdf" src="images/Cadmium%20Ble%20dur%20Perspectives%20agricoles%20dec%202013_VF.pdf"></iframe> </div>-->


            <div><a id="cRetour" class="cInvisible" href="#haut"></a></div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                var duration = 500;
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 100) {
                    // Si un défillement de 100 pixels ou plus.
                    // Ajoute le bouton
                    $('#cRetour').addClass('cVisible');
                } else if($(this).scroll() < 100) {
                // Sinon enlève le bouton
                $('#cRetour').addClass('cInvisible');
                }
            });

  $('#cRetour').click(function(event) {
    // Un clic provoque le retour en haut animé.
    event.preventDefault();
    $('html, body').animate({scrollTop: 0}, duration);
    return false;
  })
});
</script>
        </div>
    </body>

</html>
