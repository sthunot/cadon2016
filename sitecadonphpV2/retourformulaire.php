<?php include ("head.php");
include("fonctions.php");?>
    <body id="siteaccueil">
      <?php include ("header.php");?>
        <?php include("menu.php");?>

        <div class="dateheure">
            <?php
                $date = date("d-M-Y");
                $heure = date("H:i:s");
                echo ("Nous sommes le $date $heure");
            ?>
        </div>
        <center><h3>Merci pour votre participation</h3><img src="images/logoble.png"></center>
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
    </body>
</html>
