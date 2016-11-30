<?php
	if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['message']))
	{
		$header="MIME-Version: 1.0\r\n";
		$header.='From:"INRA.fr"< a voir>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';
		$message='
      		<html>
      			<body>
      				<div align="center">
      					<img src="images/bannierepurecadon.png"/>
      					<br />
      					<u>Nom de l\'expéditeur :</u>'.$_POST['nom'].'<br />
      					<u>Mail de l\'expéditeur :</u>'.$_POST['email'].'<br />
      					<br />
                        '.nl2br($_POST['interet']).'
      					'.nl2br($_POST['message']).'
      					<br />
      				</div>
      			</body>
      		</html>
      		';
		mail("stephane.thunot@inra.fr", "CONTACT - Monsite.com", $message, $header);
		$msg="Votre message a bien été envoyé !";
	}
?>
<?php include ("head.php");?>
    <body>
        <div id="main">
			<?php include ("header.php");?>
        <?php include("menu.php");?>
				<div class="dateheure">
            <?php
                $date = date("d-M-Y");
                $heure = date("H:i:s");
                echo ("Nous sommes le $date $heure");
            ?>
        </div>
    <form class="formcontact" name="formulaire" action="contactcadon.php" method="post">
            <h3 class="titrecontact">Pour de plus amples renseignements contactez-nous</h3><br /><br />
        <fieldset class="fieldcontact"><br /><br />
            <legend><b>Contact</b></legend>
                   <input id="prenom" type="text" name="prenom"  value="" placeholder="Votre prénom"/><br/><br/>
                   <input id="nom" type="text" name="nom"  value="" placeholder="Votre nom" /><br/><br/>
                   <input id="email" type="email" name="email" value="" placeholder="Votre email" /><br/><br/>
               <label for="interet">Quel type de renseignement recherchez vous ?</label><br/><br/>
                   <input type="radio" name="interet" value="contrat" /> Renseignement sur le contrat
          			   <input type="radio" name="interet" value="formulaire" /> Renseignement sur le formulaire<br/><br/>
                   <textarea id="commentaire" class="message" name="message" rows="12" cols="80" placeholder="Votre message"></textarea>
        </fieldset><br/><br/>
               <input type="submit" value="Envoyer" />
               <input type="reset" value="Annuler" />
        </form>
                <?php
            		if(isset($msg))
            		{
            			echo $msg;
            		}else
									{
										$msg="Tous les champs doivent être complétés !";
									}
            		?>
                <?php include("footer.php");?>
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
