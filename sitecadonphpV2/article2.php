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
              <a href="actualite.php#imgactu">
                <h3>Le sol : un système accumulateur de cadmium</h3><br><br>
                  <p class="actuimg"><img src="images/actusol.png"></p>
                  <p><h4>Les sources d’apports de cadmium au sol sont
                  diverses. Les engrais phosphatés et les produits
                  résiduaires organiques (déjections animales, boues
                  et composts) sont les deux sources principales,
                  respectivement 54 % et 30 % des apports totaux sur
                  parcelles agricoles.<br><br> Les retombées atmosphériques,
                  naturelles et anthropiques, représenteraient 14 % de
                  ces apports.<br><br>
                  Seuls quelques pourcents du fl ux annuel de
                  cadmium à la surface du sol sont lessivés vers les
                  horizons profonds ou la nappe. Le sol accumule
                  donc les métaux en général et le cadmium en
                  particulier.</h4></p><br><br><br>

              </a>
                <a href="actualite.php">
                <h3>L’absorption racinaire limitée</h3><br><br>
                    <p><h4>La majorité du cadmium présent dans les grains
                    de céréales provient du sol. Cependant, de nombreuses
                    études ont montré qu’il n’est pas possible
                    de prédire la concentration en cadmium dans les
                    végétaux à partir de la seule concentration en métal
                    dans le sol.<br><br>
                    Cet élément est présent dans le sol dans différentes
                    phases solides : inclus en impuretés dans les fragments
                    de roches et les minéraux constitutifs du sol,
                    fixé sur le complexe argilo-humique, etc.<br><br> Or, le cadmium
                    est prélevé par les racines dans la solution du
                    sol, sous une forme ionique. Pour qu’il soit « phytodisponible
                    » (absorbable par les racines), il faut donc
                    qu’il passe d’abord dans la solution du sol (figure 2).<br><br>
                    Suivant sa localisation initiale dans la phase solide
                    et en fonction de divers facteurs physico-chimiques
                    du sol, ce passage sera plus ou moins important.
                    Ainsi, plus la teneur en matière organique et le pH
                    du sol sont élevés, plus la rétention du cadmium par
                    la phase solide est forte et moins il aura tendance à
                    passer en solution.<br><br>
                    Mais une fois dans la solution, la forme ionique absorbée
                    par les racines dépend en outre de sa complexation
                    avec la matière organique soluble. Pour
                    une même teneur totale, différents sols peuvent
                    donc présenter des phytodisponibilités très variables.
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
