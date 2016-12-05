<?php include ("head.php");?>
    <body id="main">
    <div class="main">
        <?php include ("header.php");?>
        <?php include("menu.php");?>
        <div class="dateheure">
            <?php
                $date = date("d-M-Y");
                $heure = date("H:i:s");
                echo ("Nous sommes le $date $heure");
                ?>
        </div>

        <div class="index">
            <div class="savoirplus">
            <i><h3>En savoir plus ...</h3></i>
              <a href="actualite.php" class="myButton">Le Cadmium</a>
              <a href="projetcadon.php" class="myButton" align="right">Le déoxynivalénol (DON)</a><br><br><br><br>
            </div>
            </div>
        <div>
          <div class="projetindexdetail">
            <h3>Le projet en détail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=images/services.png></h3><hr><br><br>
                    <p><h4>Le projet CaDON se propose de considérer simultanément les deux contaminants, Cd et DON, du champ aux produits de moutures et d’analyser leur toxicité combinée avec un double objectif : <br><br>
&nbsp;&nbsp;&nbsp;> S’assurer que les stratégies agronomiques et les process de mouture préconisés pour limiter les teneurs en un des contaminants ne favorisent pas la contamination par le deuxième.<br><br>
&nbsp;&nbsp;&nbsp;> S’assurer que la co-contamination des produits céréaliers par Cd et DON ne conduit pas à un effet cocktail avec de potentielles synergies entre les effets toxiques liés à chaque contaminant.</h4></p>

<p class="fusariose"><a href="cartel4.php"><img src="images/schemastrategiecadon.png" width=500px heigth=500px></a></p>

<p><h4>Pour atteindre cet objectif trois axes de recherches complémentaires ont été définies, guidées par les lignes directrices suivantes :<br><br>
&nbsp;&nbsp;&nbsp;> Caractériser les évènements de co-contamination et en analyser l’origine, du champ aux produits de mouture,<br><br>
&nbsp;&nbsp;&nbsp;> Décrypter les mécanismes physiologiques et biologiques à l’origine de la co-contamination des grains et produits de mouture,<br><br>
&nbsp;&nbsp;&nbsp;> Evaluer la toxicité combinée du DON et Cd.<br><br>


La connaissance délivrée par le projet CaDON permettra une première évaluation du risque lié à la co-contamination des blés durs par le mélange Cd+DON et fournira les bases pour comprendre l’origine de ce risque, du champ au consommateur. Chaque résultat du projet CaDON sera un élément essentiel pour identifier les actions préventives pour limiter ce risque potentiel.</h4></p><br><br><br><br><br><br>
          </div><br><br>
                <div class="pdp">
                <?php include("footer.php");?>
                </div>
          </div>

            <div><a id="cRetour" class="cInvisible" href="#haut"></a></div>
        <script src="ajax.js"></script>
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
