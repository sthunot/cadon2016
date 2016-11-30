<?php include ("head.php");?>

    <body id="main">
        <?php include ("header.php");?>
        <?php include("menu.php");?>
        <div class="dateheure">
            <?php
                $date = date("d-M-Y");
                $heure = date("H:i:s");
                echo ("Nous sommes le $date $heure");
                ?>
        </div>
        <a href="projetdetail.php"><i><u><h6><<< RETOUR </h6></u></i></a>
         <div class="indexactualite">
          <div class="cartel"><br>
              <a href="article1.php">
                  <p class="dangercd"><img src="images/dangerCD.jpg"></p>
                    <p><h3>Les seuils réglementaires : un débat complexe</h3><br><br><br>
                    <h4>Dès 2001, la communauté européenne a réglementé
                    la teneur maximale en cadmium dans certaines
                    denrées alimentaires et matières premières destinées à
                    l’alimentation humaine...</h4></p><br><a href="article1.php"><h5><i><u> Lire la suite >>></u></i></h5></a>

              </a>
          </div><hr><br><br>

          <div class="cartel">
            <h3>Les processus majeurs gouvernant la contamination du grain de blé dur par le cadmium</h3>
              <img class="imgcadmium" src="images/actualite1.png " border="0" width="638" height="336" orgWidth="638" orgHeight="336" usemap="#image-maps-2016-06-22-050450" alt="" />
              <map name="image-maps-2016-06-22-050450" id="ImageMapsCom-image-maps-2016-06-22-050450">
              <area  alt="Dans le sol" title="Dans le sol" href="article2.php" shape="rect" coords="515,52,290,359" style="outline:none;" />
              <area  alt="Dans la plante" title="Dans la plante" href="article3.php" shape="rect" coords="0,8,254,329" style="outline:none;"/>
            </map>
            <i><h5>(Cliquez sur la gauche et la droite de l'image)</h5></i>
          </div><hr><br><br><br>
          <div class="cartel"><br>
              <a href="article4.php">
                  <p class="actuimg"><img src="images/actuseuil.jpg"></p>
                  <p><h3>Réduire la contamination en cadmium ?</h3>
                  <h4>Dans le contexte actuel de durcissement de la réglementation, ces résultats incitent à
                  envisager des stratégies pour limiter le transfert du
                  cadmium vers le grain. Deux leviers d’actions...</h4></p><br><a href="article4.php"><h5><i><u> Lire la suite >>></u></i></h5>
              </a>
          </div><hr><br><br>
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
