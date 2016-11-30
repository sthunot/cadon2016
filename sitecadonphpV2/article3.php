<?php include ("head.php");?>
    <body id="main">
    <div >
      <?php include ("header.php");?>
        <?php include("menu.php"); ?>
        <div class="dateheure">
            <?php
                $date = date("d-M-Y");
                $heure = date("H:i:s");
                echo ("Nous sommes le $date $heure");
            ?>
        </div>

        </div>
        <a href="actualite.php"><i><u><h6><<< RETOUR </h6></u></i></a>
          <div class="cartel">
              <a href="actualite.php#imgactu">
                <h3>Une fois dans la plante</h3><br><br>
                  <p class="actuimg"><img src="images/actuplant.png"></p>
                  <p><h4>Il est admis que la grande majorité de l’absorption
                  du cadmium se fait par le système racinaire via les
                  transporteurs du zinc et du calcium.<br><br>
                  Une fois dans la plante, l’exportation du cadmium
                  vers les parties aériennes est limitée en raison de sa
                  séquestration dans les cellules racinaires (figure 2) :
                  les plantes isolent le cadmium dans un compartiment
                  spécifique appelé vacuole afin qu’il n’interfère
                  pas avec les fonctions vitales de la cellule.<br><br> Cette
                  séquestration met en oeuvre des molécules telles
                  que les phytochélatines qui inactivent le cadmium
                  en se complexant avec lui. Une partie du cadmium
                  est malgré tout transférée aux parties aériennes
                  en raison d’un manque de spécificité des transporteurs
                  impliqués dans le chargement du xylème où
                  circule la sève brute.<br><br>
                  Une fois dans la sève brute, le cadmium gagne
                  les feuilles où il est à nouveau stocké dans les vacuoles
                  et, éventuellement, dans des excroissances
                  épidermiques appelées trichomes (type «poils»).<br><br>
                  Au stade reproducteur, lorsque les réserves de la
                  plante sont mobilisées pour l’élaboration des fruits
                  et des graines, une partie du cadmium migre également
                  vers ces organes, via la sève élaborée c’est à-
                  dire le phloème. <br><br>Un transfert direct de cadmium
                  du xylème vers le phloème aurait également lieu
                  pendant le remplissage du grain.
                </h4><br><br><br>
                <h4>La concentration en cadmium est
                  généralement plus élevée dans les racines
                  que dans les feuilles et les tiges. <br><br>
                  En raison des mécanismes de séquestration, la
                  concentration en cadmium est généralement plus élevée
                  dans les racines que dans les feuilles et les tiges,
                  elles-mêmes plus riches que les fruits et les graines.<br><br>
                  Les légumes feuilles sont donc souvent plus riches en
                  cadmium que les légumes fruits.<br><br> Dans le grain, la répartition
                  du cadmium n’est pas non plus homogène. <br><br>Il s’accumule préférentiellement avec les protéines,
                  à savoir dans l’embryon et la couche à aleurone
                  située sous le tégument.<br><br><br> Les concentrations de
                  cadmium dans l’endosperme (le tissu contenant
                  l’amidon) sont donc souvent plus faibles.
                </h4></p>
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
