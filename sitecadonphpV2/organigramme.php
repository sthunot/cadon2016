<?php include ("head.php");?>
    <body id="main">
    <div>
        <?php include ("header.php");?>
        <?php include("menu.php");?>
        <div class="dateheure">
            <?php
                $date = date("d-M-Y");
                $heure = date("H:i:s");
                echo ("Nous sommes le $date $heure");
                ?>
        </div>
        <a href="partenaire.php"><i><u><h6><<< RETOUR </h6></u></i></a>
    <div class="organigramindex">
            <h3>Liste du personnel </h3><hr>
            <br><br>

            <div id="orgamycsa"><img class="partenairbando" src="images/mycsa.jpg"></div>
            <img class="partenairbando" src="images/personnelmycsa.png">

            <br><br><br>

            <div id="orgatoxa"><img class="partenairbando" src="images/bandotoxalim.gif"></div>
            <img class="partenairbando" src="images/personneltoxalim.png">

            <br><br><br>

            <div id="orgaispa"><img class="partenairbando" src="images/Bandeau-ispa.jpg"></div>
            <img class="partenairbando" src="images/personnelispa.png">

            <br><br><br>

            <div id="orgaiate"><img class="partenairbando" src="images/bandoiate.png"></div>
            <img class="partenairbando" src="images/personneliate.png">

            <br><br><br><br>

            <div id="orgarvalis"><img class="partenairbando" src="images/bandoarvalis.PNG"></div>
            <img class="partenairbando" src="images/personnelarvalis.png">

    </div>

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
