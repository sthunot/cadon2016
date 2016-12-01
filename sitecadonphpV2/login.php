<?php
session_start();
include('bdd.php');
if(!empty($_POST['login']) && !empty($_POST['password'])){
              $requete = $bdd->query("SELECT email, password FROM user");
              $datalogin = $requete->fetchAll(PDO::FETCH_ASSOC);
              foreach ($datalogin as $element) {
                $password = sha1($_POST['password']);
                if($_POST['login']==$element['email'] && $element['password']==$password){
                  $_SESSION['login']=$_POST['login'];
                  $_SESSION['password']=$_POST['password'];
                  header('Location:formcadon.php');
                  exit();
                }
              }
              ?>
              <script type="text/javascript">
                alert('Mauvais identifiants');
              </script><?php
    }
    ?>
<!DOCTYPE html>
    <?php include ("head.php");?>
    <body id="siteaccueil">
        <div id="main">
        <?php include ("header.php");?>
        <?php include("menu.php"); ?>
        <div class="dateheure">
            <?php
                $date = date("d-M-Y");
                $heure = date("H:i:s");
                echo ("Nous sommes le $date $heure");
            ?>
        </div>
                <h3>Ce que vous trouverez une fois sur le formulaire Enquête au champ :</h3>
                <h4>Un formulaire vierge de l'enquête.<br>


                </h4>
        <form id="myformlogin" name="login_data_base" action="" method="post">
               <h3 class="titrelogin">Veuillez vous identifier pour accéder à l'enquête au champ</h3><br/>
               <div class=identite>
                 <fieldset class="fieldlogin">
                   <legend>Identifiez-vous</legend><br/><br/><br/>
                   <label for="login">Identifiant (Email)</label>
                   <input id="login" type="text" name="login" required title="Entrez votre adresse email" value=""/>*<br/><br/>
                   <label for="password">Mot de passe</label>
                   <input id="password" type="password" name="password" required value=""/>*<br/><br/>
                   <label for="envoyer"></label>
                   <input id="envoyer" type="submit" name="envoyer" value="Envoyer" />
                   <input type="reset" value="Annuler" />
                 </fielset>
                 </div>
        </form>

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
    <?php include("footer.php");?>
</html>
