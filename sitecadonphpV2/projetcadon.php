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
        <a href="projetdetail.php"><i><u><h6><<< RETOUR </h6></u></i></a>
        <div class="indexcartel">
            <i><h3>En savoir plus ...</h3></i>
            <p class="cartel1"><a href="cartel1.php"><img class="imgcartel" src="images/cartel1.png"/></p><br><br>
            <p><h4>Facteurs influençant la présence des mycotoxines</h4></p></a>
            <br><br><br><br>
            <p class="cartel1"><a href="cartel2.php"><img class="imgcartel" src="images/cartel2.png"/></p><br><br>
            <p><h4>Pourquoi les champignons produisent-ils des toxines ?</h4></p></a>
            <br><br><br><br>
            <p class="cartel1"><a href="cartel3.php"><img class="imgcartel" src="images/cartel3.png"/></p>
            <p><h4>Mycotoxines du gène à la toxine</h4></p></a>
        </div>
          <div class="projetcadon"><br>
                <h3>Le DON&nbsp;&nbsp;<img class="imgdon" src=images/question.png></h3>

                  <h4>Le déoxynivalénol (DON) appartient à l'un des plus grands groupes de mycotoxines, à savoir les         Trichothécènes de type B. Ces mycotoxines sont produites par des moisissures appartenant au genre         Fusarium.<br> Les espèces de Fusarium, responsables de la contamination des récoltes céréalières, sont   essentiellement Fusarium graminearum et Fusarium culmorum.<br>
                    Ces deux espèces fongiques infectent les épis des céréales au moment de la floraison et produisent leurs mycotoxines au cours des étapes de remplissage des grains.<br> Toutes les récoltes céréalières et le maïs sont concernés, le blé dur étant cependant une des espèces végétales les plus sensibles. Les conditions climatiques et en particulier les épisodes pluvieux autour de la floraison sont déterminants dans les niveaux d’infection fongique et de contamination en DON.<br> Plusieurs leviers agronomiques peuvent limiter les symptômes fongiques ainsi que les quantités de toxines accumulées dans les grains à la récolte.
                    Le DON est une molécule très stable, qui n’est que très partiellement détruite par les process agroalimentaires et se retrouve dans les produits finis. Il est ainsi indispensable d’agir en amont des récoltes pour limiter l’exposition des consommateurs à cette toxine.</h4><hr><br><br>
                    <h3>Devenir du DON après exposition par voie orale :</h3><br>
                      <p class="cartel1"><img src=images/men.png></p><p><h4>En Europe, l'exposition au DON est estimée, selon les groupes de population,
                      entre 0,22 et 1,02 µg / kg de poids corporel / jour en lien essentiellement avec la consommation de pain.</p><br><br><br>
                      <p class="cartel1"><img src=images/pig.png></p><p><h4>L'absorption du DON chez les animaux monogastriques ou chez l’homme
                      se fait préférentiellement dans le jéjunum. La concentration maximale dans le sérum est atteinte rapidement (environ 4h).</h4></p><hr><br><br>

                        <h3>Comment le DON peut affecter la santé? :</h3><br>
                        <p class="cartel1"><img src=images/men.png></p><p><h4>Il est très difficile d’évaluer précisément l’impact du DON sur la santé humaine. Les trichothécènes (famille de mycotoxines à laquelle appartient le DON) ont été incriminés dans des graves mycotoxicoses associées à la consommation de blés moisis en Russie pendant la seconde guerre mondiale.<br> Ces mycotoxicoses ont été désignées sous le terme d’Aleucie Toxique Alimentaire.<br> Les mesures publiques de contrôle sanitaire instaurées dans de nombreux pays ont permis de limiter la survenue de ces mycotoxicoses aiguës. Le DON serait, quant à lui, impliqué dans des épisodes de gastro-entérite survenues plus récemment en Chine et Inde, provoquant des douleurs abdominales et des diarrhées, des maux de tête, des étourdissements et de la fièvre.</h4></p><br><br><br>
                        <p class="cartel1"><img src=images/pig.png></p><p><h4>L’exposition à de fortes doses de DON affecte les organes dans lesquels la prolifération cellulaire
                        est intense (moelle osseuse, ganglions lymphatiques, rate, thymus et muqueuse intestinale).<br> Elle entraîne des effets similaires à ceux observés lors d’exposition
                        à des rayonnements ionisants : détresse abdominale, salivation importante, malaise, diarrhée, vomissements, leucocytose et hémorragie gastro-intestinale.<br>
                        Le DON affecte la réponse immunitaire et entraîne, à forte dose, une immunosuppression liée à l’apoptose des cellules. <br>A plus faible dose, au contraire,
                        la réponse immunitaire peut être stimulée suite à la surexpression de gènes impliqués dans la réponse inflammatoire.<br>
                        Le DON possède par ailleurs des propriétés émétiques et anorexigènes : les vomissements apparaissent à des doses élevées (supérieures à 12 mg DON /kg d’aliment)
                        et sont à l’origine de la dénomination de vomitoxine parfois donnée au DON.<br> A des doses plus faibles que celles qui provoquent les vomissements,
                        le DON entraîne une diminution de la consommation alimentaire et du gain de poids et on observe d’importantes différences entre espèces.<br>
                        Les volailles, les souris et les bovins sont plus tolérants que les porcs qui refusent tout ou partie de l’aliment dès 1 à 2 mg de DON/kg d’aliment.<br>
                        L’altération du métabolisme de la sérotonine, l’effet de certaines cytokines sur le cerveau et l’activation de l’oncogène c-Fos, qui peut directement
                        agir sur les centres anorexigènes du cerveau, contribuent à la diminution de la prise alimentaire.<br>
                        Le DON diminue la fonction de barrière de l'intestin et il induit localement une réponse inflammatoire.</h4></p><hr><br><br><br>

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
        <?php include("footer.php");?>
    </body>

</html>
