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
                    <h3>Réduire la contamination en cadmium des grains ?</h3><br><br>
                    <p class="actuimg"><img src="images/actuseuil.jpg"></p>
                      <p><h4>Dans le contexte actuel de durcissement de la réglementation, ces résultats incitent à
                      envisager des stratégies pour limiter le transfert du
                      cadmium vers le grain. <br>Deux leviers d’actions sont
                      possibles : intervenir sur la physiologie de la plante
                      mais aussi sur la phytodisponibilité du cadmium du
                      sol. <br>Il faut ainsi caractériser le potentiel d’accumulation
                      des variétés actuelles, travailler la sélection
                      génétique pour obtenir des variétés peu accumulatrices
                      tout en conservant les qualités de productivité
                      et de valeur d’usage. <br>En effet, chez les céréales et
                      les oléagineux, l’accumulation de cadmium dans
                      le grain varie significativement entre variétés, d’un
                      facteur 2 à 5 suivant l’espèce. <br>Chez le blé dur et le
                      riz, cette variabilité d’accumulation ne provient pas
                      d’une différence de prélèvement racinaire mais
                      d’une variabilité d’allocation de cadmium au grain.<br>
                      Les processus incriminés seraient, selon le cas, la
                      séquestration racinaire, le chargement dans le xylème
                      et/ou le transfert xylème-phloème.<br>
                      Chez le blé dur, la découverte d’une région chromosomique
                      étroitement associée à la faible accumulation
                      de cadmium dans le grain a permis aux
                      Canadiens d’obtenir des variétés nettement moins
                      accumulatrices telles que Strongfield ou Brigade.<br><br>
                      Les interventions culturales doivent quant à elles
                      viser en priorité le maintien du pH du sol au-dessus
                      de 6,5 par chaulage, en évitant les intrants acidifiants
                      (engrais ammoniacaux par exemple). <br>Il est
                      recommandé de surveiller le niveau de contamination
                      cadmiée des intrants : produits résiduaires,
                      engrais phosphatés, produits phytosanitaires.<br>
                      L’analyse de terre permet d’identifier les sols très
                      riches en cadmium, acides, pauvres en matière
                      organique et de texture légère (faible capacité
                      d’échange cationique dite CEC). Ces facteurs favorisent
                      la mobilité de l’élément. Même si leur teneur
                      en cadmium est souvent parmi les plus élevées,
                      les sols carbonatés présentent généralement une
                      faible phytodisponibilité.<br><br>
                      Il faut enfin limiter l’apport de sels en raisonnant
                      précisément la fertilisation. Le passage du cadmium
                      en solution est en effet favorisé par les cations
                      qui se sorbent à sa place sur la phase solide.
                  </h4></p><br><br><br>
                  </a>
        </div>
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
