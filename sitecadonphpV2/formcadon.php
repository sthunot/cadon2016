<?php
session_start();
include "bdd.php";
include "head.php";
include "fonctions.php";
$compt = 0;
$index = array('nom', 'prenom','email', 'telephone', 'nom_parcelle', 'projet', 'code_postal', 'commune', 'type_culture', 'site_industriel', 'route_circulation', 'type_sol1', 'type_sol2', 'type_sol3', 'type_sol4', 'type_sol5', 'precedent_n_1', 'precedent_n_2', 'precedent_n_3', 'residus_n_1', 'precedent_semis', 'travail_sol', 'interculture', 'especes', 'date_semis_interculture', 'date_destruction_interculture', 'residus_interculture', 'semis_variete', 'semis_date', 'semis_densite', 'date_floraison', 'semis_certifie', 'nombre_apport_engrais', 'type_fertilisation', 'dose_totale_azote', 'dose_totale_phosphate', 'type', 'apport_1_date', 'apport_1_type_engrais', 'apport_1_dose', 'apport_2_date', 'apport_2_type_engrais', 'apport_2_dose', 'apport_3_date', 'apport_3_type_engrais', 'apport_3_dose', 'apport_4_date', 'apport_4_type_engrais', 'apport_4_dose', 'apport_5_date', 'apport_5_type_engrais', 'apport_5_dose', 'engrais_post_semis', 'engrais_post_semis_date', 'engrais_post_semis_dose', 'engrais_post_semis_type', 'amendement_orga', 'nombre_apport_orga', 'quantite_orga', 'type_orga', 'depuis_10', 'type_orga1', 'annee_orga1', 'type_orga2', 'annee_orga2', 'type_orga3', 'annee_orga3', 'nb_regulateur_croissance', 'verse_parcelle', 'pourcentage_verse', 'irrigation', 'irrigation_materiel', 'irrigation_floraison', 'irrigation_qtite', 'irrigation_nb_tours', 'parcelle_drainee', 'irrigation1_date', 'irrigation1_qtite', 'irrigation2_date', 'irrigation2_qtite', 'irrigation3_date', 'irrigation3_qtite', 'irrigation4_date', 'irrigation4_qtite', 'traitement_semence', 'produit_trait_semence', 'nb_trait_fongicide', 'trait_fusariose', 'fongi1_date', 'fongi1_stade', 'fongi1_produit1', 'fongi1_dose1', 'fongi1_produit2', 'fongi1_dose2', 'fongi1_volume', 'fongi1_maladie_cible', 'fongi2_date', 'fongi2_stade', 'fongi2_produit1', 'fongi2_dose1', 'fongi2_produit2', 'fongi2_dose2', 'fongi2_volume', 'fongi2_maladie_cible', 'fongi3_date', 'fongi3_stade', 'fongi3_produit1', 'fongi3_dose1', 'fongi3_produit2', 'fongi3_dose2', 'fongi3_volume', 'fongi3_maladie_cible', 'fongi4_date', 'fongi4_stade', 'fongi4_produit1', 'fongi4_dose1', 'fongi4_produit2', 'fongi4_dose2', 'fongi4_volume', 'fongi4_maladie_cible', 'herbicide_automne', 'herbicide_hiver', 'qualite_herbicide', 'sympt_maladie_feuille', 'maladie_feuille', 'reconnaissance_maladie_feuille', 'maladie_5ans', 'annee_maladie_5ans', 'symptome_fusariose_epis', 'presence_ergot', 'presence_ergot_5ans', 'cecidomyie_epis', 'traite_insecticide', 'autre_ravageur', 'nom_ravageur', 'adventice_floraison_parcelle', 'nature_adventice_parcelle', 'adventice_floraison', 'nature_adventice', 'fauchage_champ', 'date_recolte', 'retard_recolte_meteo', 'rendement', 'eau_grain_recolte', 'maturite_paille', 'batteuse_marque', 'batteuse_modele', 'batteuse_annee', 'batteuse_type', 'batteuse_largeur_coupe', 'batteuse_diametre_rotor', 'batteuse_proprietaire', 'vitesse_avancement', 'vitesse_rotation_batteur', 'vitesse_rotation_ventilateur', 'commentaire', 'temps_remplissage', 'difficulte_remplissage');
if (isset($_SESSION['login']) && isset($_SESSION['password'])){
  $req = $bdd->prepare("SELECT nom_parcelle FROM parcelle WHERE email=:email");
  $req->bindValue(':email', $_SESSION['login']);
  $req->execute();
  $emails = $req->fetchAll(PDO::FETCH_ASSOC);
  $req->closeCursor();
if(!empty($_GET['parcelle']) && ($_GET['parcelle']!= "newForm")){
  $req = $bdd->prepare("SELECT * FROM parcelle WHERE email=:email AND nom_parcelle=:nom_parcelle");
  $req->bindValue(":nom_parcelle", $_GET['parcelle']);
  $req->bindValue(":email", $_SESSION['login']);
  $req->execute();
  $tableau = $req->fetch(PDO::FETCH_ASSOC);
  $req->closeCursor();
  $req = $bdd->prepare("SELECT nom, prenom, telephone FROM user WHERE email=:email");
  $req->bindValue(":email", $_SESSION['login']);
  $req->execute();
  $tableau = $req->fetch(PDO::FETCH_ASSOC) + $tableau;
  for($i=0;$i<=154;$i++){?>
    <script>
    $(document).ready(function(){
      $("input[name='<?php echo($index[$i]);?>']").val("<?php echo($tableau[$index[$i]]);?>");

    });
    </script><?php
  }
}?>
    <body id="formdatabase">
        <div id="main">
      <?php include ("header.php");?>
        <?php include "menu.php";?>
        <button class="logoutButton"><a href="logout.php">Se déconnecter</a></button>
        <div class="choixForm">
          <button id="newForm">Nouveau Formulaire</button><?php
          for($i=0;$i<count($emails);$i++)
        {
            echo('<button id="'.$emails[$i]["nom_parcelle"].'">Formulaire parcelle : '.$emails[$i]["nom_parcelle"].'</button>');
        }?>
        </div>
           <form  id="myform" name="formulaire" action="traitement.php"<?php if(!empty($_GET['parcelle']))echo("?parcelle=".$_GET['parcelle']); ?> method="post">

               <h2 class="titrenquete">Enquête réseau de parcelles CaDON</h2>
                    <hr/><h3>Exploitation / Agriculteur : </h3><br/>
                    <fieldset>
                      <legend><b>Identité</b></legend>
                      <i><h6 align="right"> ( * Champs obligatoires )</h6></i></p>
                       <p><label for="nom">Nom  : </label>
                       <input id="nom" type="text" name="nom" size="15" required title="entrez votre nom" value=""/> *<br/>
                       <label for="prenom">Prénom : </label>
                       <input id="prenom" type="text" name="prenom" size="15" required value=""/> *<br/>
                       <label for="mail">Email : </label>
                       <input id="mail" type="email" name="email" size="15" required value=""/> *<br/>
                       <label for="tel">Téléphone : </label>
                       <input id="tel" type="tel" name="telephone" size="15" value=""/></p>

                    </fieldset><br/><br/>
                <hr/><h3>Informations relatives à la parcelle</h3><br/>
                    <fieldset>
                      <legend><b>Parcelle</b></legend>
                        <i><h6 align="right"> ( * Champs obligatoires )</h6></i></p>
                        <p><label for="nom_parcelle">Nom de la parcelle : </label>
                       <input id="nom_parcelle" type="text" name="nom_parcelle" required value=""/> *<br/>
                       <label for="projet">Projet : </label>
                       <input id="projet" type="text" name="projet" required value="cadon"  readonly/><br/>
                       <label for="codepostal">Code postal de la parcelle : </label>
                       <input id="codepostal" type="text" name="code_postal" required value=""/> *<br/>
                       <label for="commune">Commune de la parcelle : </label>
                       <input id="commune" type="text" name="commune" required value=""/> *<br/>

                       <label for="type_culture"><h4>Culture : </h4></label>
                       <select id="type_culture" name="type_culture">
                           <option value="Bio" >Biologique</option>
                           <option value="Conventionnel" >Conventionnel</option>
                           <option value="Raisonné" >Raisonné</option>
                           <option value="bletendre" >Blé tendre</option>
                           <option value="bledur" >Blé dur</option>
                           <option value="" selected></option>
                       </select><br/>
                        <label for="site_industriel">La parcelle est-elle à proximité d'un site industriel : </label>
                        <input type="hidden" name="site_industriel" value=""/>
                        <input id="site_industriel" type="radio" name="site_industriel" value="oui"/> oui
                        <input id="site_industriel" type="radio" name="site_industriel" value="non"/> non<br/><br/>
                        <label for="route_circulation">La parcelle est-elle à proximité d'une route à forte circulation : </label>
                        <input type="hidden" name="route_circulation" value="">
                        <input id="route_circulation" type="radio" name="route_circulation" value="oui"/> oui
                        <input id="route_circulation" type="radio" name="route_circulation" value="non"/> non<br/><br/>
                        <label for="type_sol">Type de sol <i>(plusieurs réponses possibles)</i>:</label><br/><br/>
                        <input type="hidden" name="type_sol1" value=""/>
                        <input id="type_sol" type="checkbox" name="type_sol1" value="lim"/> Limoneux&nbsp;&nbsp;&nbsp;
                        <input type="hidden" name="type_sol2" value=""/>
                        <input id="type_sol" type="checkbox" name="type_sol2" value="arg"/> Argileux&nbsp;&nbsp;&nbsp;
                        <input type="hidden" name="type_sol3" value=""/>
                        <input id="type_sol" type="checkbox" name="type_sol3" value="sabl"/> Sableux&nbsp;&nbsp;&nbsp;
                        <input type="hidden" name="type_sol4" value=""/>
                        <input id="type_sol" type="checkbox" name="type_sol4" value="caill"/> Caillouteux&nbsp;&nbsp;&nbsp;
                        <input type="hidden" name="type_sol5" value=""/>
                        <input id="type_sol" type="checkbox" name="type_sol5" value="calc"/> Calcaire
                    </fieldset><br/><br/>
                <hr/><h3>Rotation, gestion des résidus et interculture</h3><br/>
                    <fieldset>
                      <legend><b>Rotations</b></legend><br/>
                       <p><label for="rotation1">Précédent N-1 : </label>
                       <select id="rotation1" name="precedent_n_1">
                           <option value="bletendre1" >Blé tendre</option>
                           <option value="bledur1" >Blé dur</option>
                           <option value="betterave1" >Betterave</option>
                           <option value="colza1" >Colza</option>
                           <option value="maisgrain1" >Maïs grain</option>
                           <option value="maisfourrage1">Maïs fourrage</option>
                           <option value="orge1" >Orge</option>
                           <option value="pois1" >Pois</option>
                           <option value="pommeterre1" >Pomme de terre</option>
                           <option value="tournesol1" >Tournesol</option>
                           <option value="triticale1" >Triticale</option>
                           <option value="" selected></option>
                       </select><br/>
                        <label for="n1">Autre précisez : </label><br>
                        <input id="n1" type="text" name="precedent_n_1" value=""/></p>
                        <br/><br/>
                        <p><label for="rotation2">Précédent N-2 : </label>
                       <select id="rotation2" name="precedent_n_2">
                           <option value="bletendre2" >Blé tendre</option>
                           <option value="bledur2" >Blé dur</option>
                           <option value="betterave2" >Betterave</option>
                           <option value="colza2" >Colza</option>
                           <option value="maisgrain2" >Maïs grain</option>
                           <option value="maisfourrage2">Maïs fourrage</option>
                           <option value="orge2" >Orge</option>
                           <option value="pois2" >Pois</option>
                           <option value="pommeterre2" >Pomme de terre</option>
                           <option value="tournesol2" >Tournesol</option>
                           <option value="triticale2" >Triticale</option>
                           <option value="" selected></option>
                       </select>
                        <label for="n2">Autre précisez :</label><br>
                        <input id="n2" type="text" name="precedent_n_2" value=""/></p>
                        <br/><br/>
                        <p><label for="rotation3">Précédent N-3 : </label>
                       <select id="rotation3" name="precedent_n_3">
                           <option value="bletendre3" >Blé tendre</option>
                           <option value="bledur3" >Blé dur</option>
                           <option value="betterave3" >Betterave</option>
                           <option value="colza3" >Colza</option>
                           <option value="maisgrain3" >Maïs grain</option>
                           <option value="maisfourrage3">Maïs fourrage</option>
                           <option value="orge3" >Orge</option>
                           <option value="pois3" >Pois</option>
                           <option value="pommeterre3" >Pomme de terre</option>
                           <option value="tournesol3" >Tournesol</option>
                           <option value="triticale3" >Triticale</option>
                           <option value="" selected></option>
                       </select><br/>
                            <label for="n3">Autre précisez : </label><br>
                            <input id="n3" type="text" name="precedent_n_3" value=""/></p>
                        </fieldset><br/><br/>
                    <fieldset>
                            <legend><b>Résidus</b></legend><br/>
                            <p><label for="residu"><h4>Gestion des résidus du précédent cultural N-1 (quel que soit le précédent) : </h4></label><br/>
                              <input type="hidden" name="residus_n_1" value="">
                            <input id="residu" type="radio" name="residus_n_1" value="exporte"/> Exportés
                            <input id="residu" type="radio" name="residus_n_1" value="enfoui"/> Enfouis non broyés
                            <input id="residu" type="radio" name="residus_n_1" value="enfouibroye"/> Enfouis broyés
                        <br/><br/>
                            <label for="residu_1">Autre précisez : </label>
                            <input id="residu_1" type="text" name="residus_n_1" value=""/>
                        <br/><br/>
                            <label for="itineraire"><h4>Interventions entre la récolte du précédent et le semis : </h4></label><br/>
                            <input type="hidden" name="precedent_semis" value="">
                            <input id="itineraire" type="radio" name="precedent_semis" value="labour"/> Itinéraire avec labour<br/><br/>
                            <input id="itineraire" type="radio" name="precedent_semis" value="enfoui"/> Itinéraire avec travail du sol mais sans labour<br/><br/>
                            <input id="itineraire" type="radio" name="precedent_semis" value="semis"/> Semis direct (semis sans travail du sol et semoir)<br/><br/>
                        <br/><br/>Nombre de passages d'outils de travail du sol :
                            <input id="travailsol" type="text" name="travail_sol" size="1" value=""/> y compris ceux combinés au semoir.</p>
                    </fieldset><br/><br/>
                    <fieldset>
                            <legend><b>Interculture</b></legend><br/>
                            <p><label for="interculture"><h4>Interculture : </h4></label>
                            <input type="hidden" name="interculture" value="">
                            <input id="interculture" type="radio" name="interculture" value="oui" onclick="activer()" /> Oui
                            <input id="interculture" type="radio" name="interculture" value="non" onclick="desactiver()"/> Non<br/>
                            <label class="desa1" for="espece"> Espèce : </label>
                            <input class="desa1" type="text" name="especes"  value=""/><br/>
                            <label class="desa1" for="datepicker">Date de semis : </label>
                            <input type="hidden" name="date_semis_interculture" value="">
                            <input class="desa1" type="date" name="date_semis_interculture"  value=""/></input><br/>
                            <label class="desa1" for="destruction">Date de destruction : </label>
                            <input type="hidden" name="date_destruction_interculture" value="">
                            <input class="desa1" type="date" name="date_destruction_interculture"  value=""/><br/>
                            <label for="residu_2"><h4>Devenir de l'interculture : </h4></label><br/>
                            <input type="hidden" name="residus_interculture" value="">
                            <input id="residu_2" type="radio" name="residus_interculture" value="broyesurf"/> Broyée et laissée en surface<br/><br/>
                            <input id="residu_2" type="radio" name="residus_interculture" value="partenfouie"/> Partiellement enfouie<br/><br/>
                            <input id="residu_2" type="radio" name="residus_interculture" value="enfouielabour"/> Enfouie par un labour<br/><br/>
                            <input id="residu_2" type="radio" name="residus_interculture" value="recolte"/> Récoltée</p><br/><br/>
                     </fieldset><br/>
                <hr/><h3>Déroulement de la culture</h3><br/>
                    <fieldset>
                        <legend><b>Culture</b></legend>
                        <p><label for="variete"><b>Nom de la variété : </b></label>
                        <input id="variete" type="text" name="semis_variete" value=""/><br/>
                        <label for="datesemis">Date de semis : </label>
                        <input id="datesemis" type="date" name="semis_date" value=""/><br/>
                        <label for="densitesemis">Densité de semis : </label>
                        <input id="densitesemis" type="text" size="3" name="semis_densite" value=""/>en kg/ha<br/>
                        <label for="dateflor">Date de floraison : </label>
                        <input id="dateflor" type="date" name="date_floraison" value=""/><br>
                        <label for="semcertif">Semences certifiées : </label>
                        <input type="hidden" name="semis_certifie" value="">
                        <input id="semcertif" type="radio" name="semis_certifie" value="oui"/> Oui
                        <input id="semcertif" type="radio" name="semis_certifie" value="non"/> Non</p>
                    </fieldset><br/>
                    <fieldset>
                        <legend><b>Fertilisation N. P. K. S</b></legend><br/>
                        <p><label for="ferti">Nombre d'apports d'engrais minéral en cours de culture : </label>
                        <input id="ferti" type="text" size="2" name="nombre_apport_engrais" value=""/><br/><br/>
                        <label for="ferti1">Type de fertilisation : </label>
                        <input type="hidden" name="type_fertilisation" value="">
                        <input id="ferti1" type="radio" name="type_fertilisation" value=""/> Dispersée
                        <input id="ferti1" type="radio" name="type_fertilisation" value=""/> Localisée<br/><br/>
                        <label for="idferti2">Dose totale d'azote minéral en cours de culture : </label>
                        <input id="idferti2" type="text" size="2" name="dose_totale_azote" value=""/> en Kg/ha<br/><br/>
                        <label for="ferti3">Dose totale de phosphate (P2O5) en cours de culture : </label>
                        <input id="ferti3" type="text" size="2" name="dose_totale_phosphate" value=""/> en Kg/ha<br/><br/>
                        <label for="ferti4">Type (MAP, TSP...) : </label>
                        <input id="ferti4" type="text" size="2" name="type" value=""/></p><br/>
                        <fieldset>
                            <legend><b>1er Apport</b></legend>
                            <p><label for="datepandage">Date d'épandage : </label>
                            <input id="datepandage" type="date" name="apport_1_date" value=""/>
                            <label for="typengrais">Type d'engrais : </label>
                            <input id="typengrais" type="text" name="apport_1_type_engrais" value=""/><br/>
                            <label for="dosetotale">Dose totale par apport : </label>
                            <input id="dosetotale" type="text" size="2" name="apport_1_dose" value=""/>en kg/ha</p>
                       </fieldset><br/>
                       <fieldset>
                            <legend><b>2ème Apport</b></legend>
                            <p><label for="datepandage1">Date d'épandage : </label>
                            <input id="datepandage1" type="date" name="apport_2_date" value=""/><br/>
                            <label for="typengrais1">Type d'engrais : </label>
                            <input id="typengrais1" type="text" name="apport_2_type_engrais" value=""/><br/>
                            <label for="dosetotale1">Dose totale par apport : </label>
                            <input id="dosetotale1" type="text" size="2" name="apport_2_dose" value=""/>en kg/ha</p>
                       </fieldset><br/>
                       <fieldset>
                            <legend><b>3ème Apport</b></legend>
                            <p><label for="datepandage2">Date d'épandage : </label>
                            <input id="datepandage2" type="date" name="apport_3_date" value=""/><br/>
                            <label for="typengrais2">Type d'engrais : </label>
                            <input id="typengrais2" type="text" name="apport_3_type_engrais" value=""/><br/>
                            <label for="dosetotale2">Dose totale par apport : </label>
                            <input id="dosetotale2" type="text" size="2" name="apport_3_dose" value=""/>en kg/ha</p>
                       </fieldset><br/>
                       <fieldset>
                            <legend><b>4ème Apport</b></legend>
                            <p><label for="datepandage3">Date d'épandage : </label>
                            <input id="datepandage3" type="date" name="apport_4_date" value=""/><br/>
                            <label for="typengrais3">Type d'engrais : </label>
                            <input id="typengrais3" type="text" name="apport_4_type_engrais" value=""/><br/>
                            <label for="dosetotale3">Dose totale par apport : </label>
                            <input id="dosetotale3" type="text" size="2" name="apport_4_dose" value=""/>en kg/ha</p>
                       </fieldset><br/>
                       <fieldset>
                            <legend><b>5ème Apport</b></legend>
                            <p><label for="datepandage4">Date d'épandage : </label>
                            <input id="datepandage4" type="date" name="apport_5_date" value=""/><br/>
                            <label for="typengrais4">Type d'engrais : </label>
                            <input id="typengrais4" type="text" name="apport_5_type_engrais" value=""/><br/>
                            <label for="dosetotale4">Dose totale par apport : </label>
                            <input id="dosetotale4" type="text" size="2" name="apport_5_dose" value=""/>en kg/ha</p>
                       </fieldset><br/>
                       <fieldset>
                           <legend><b>Apports avant semis (cochez si concerné)</b></legend><br/>
                            <p><label for="apportsemis">Apports P2O5 avant la culture</label>
                            <input type="hidden" name="engrais_post_semis" value="">
                            <input id="apportsemis" type="radio" name="engrais_post_semis" value="p2o5avsemis"/><br/><br/>
                            <label for="apportsemis">Apports P2O5 depuis 5 ans</label>
                            <input id="apportsemis" type="radio" name="engrais_post_semis" value="p2o5_5ans"/><br/><br/>
                            <label for="apportsemis">Apports d'oligoéléments </label>
                            <input id="apportsemis" type="radio" name="engrais_post_semis" value="oligo"/><br/><br/>
                            <label for="apportsemis">Apports de zinc</label>
                            <input id="apportsemis" type="radio" name="engrais_post_semis" value="zinc"/><br/><br/>
                            <label for="dateapport">Date d'apport : </label>
                            <input id="dateapport" type="date" name="engrais_post_semis_date" value=""/><br/><br/>
                            <label for="doseapport">Dose totale par apport : </label>
                            <input id="doseapport" type="text" size="2" name="engrais_post_semis_dose" value=""/> en kg/ha<br/><br/>
                            <label for="apport">Type (MAP, TSP...) : </label>
                            <input id="apport" type="text" size="2" name="engrais_post_semis_type" value=""/></p><br/><br/>
                        </fieldset><br/>
                        </fieldset><br/>
                        <fieldset>
                            <legend><b>Amendements organiques</b></legend><br/>
                            <p><label for="amendorga">En cours de culture : </label>
                            <input type="hidden" name="amendement_orga" value="">
                            <input id="amendorga" type="radio" name="amendement_orga" value="oui" onclick="active()"/> Oui
                            <input id="amendorga" type="radio" name="amendement_orga" value="non" onclick="desactive()" /> Non<br/><br/>
                            <label class="desa2" for="apportorga">Date d'apport : </label>
                            <input type="hidden" name="nombre_apport_orga" value="">
                            <input class="desa2" id="apportorga" type="date" name="nombre_apport_orga"  value="" /><br/><br/>
                            <label class="desa2" for="doseorga">Quantité (en t/ha) : </label>
                            <input type="hidden" name="quantite_orga" value="">
                            <input class="desa2" id="doseorga" type="number" size="2" name="quantite_orga"  value=""/></p><br/><br/>
                           <label for="type_orga">Type : </label>
                        <select id="type_orga" name="type_orga">
                           <option value="fumier">Fumier</option>
                           <option value="lisier">Lisier</option>
                           <option value="compost">Compost</option>
                           <option value="engrvert">Engrais vert</option>
                           <option value="boue">Boues de station d'épuration</option>
                           <option value="" selected></option>
                       </select>
                           <p><label for="autreorga">Autre : </label>
                           <input id="autreorga" type="text" name="type_orga" value=""/><br/><br/>
                           <label for="amendorga10">Depuis 10 ans : </label>
                           <input type="hidden" name="depuis_10" value="">
                           <input id="amendorga10" type="radio" name="depuis_10" value="oui"/> Oui
                           <input id="amendorga10" type="radio" name="depuis_10" value="non"/> Non<br/><br/>
                           <label for="typeorga1"> Type produit 1 : </label>
                           <input id="typeorga1" type="text" size="5" name="type_orga1" value=""/> &nbsp;&nbsp;
                           Années <input id="anneeorga1" type="text" size="5" name="annee_orga1" value=""/><br/>
                           <label for="typeorga2"> Type produit 2 : </label>
                           <input id="typeorga2" type="text" size="5" name="type_orga2" value=""/> &nbsp;&nbsp;
                           Années <input id="anneeorga2" type="text" size="5" name="annee_orga2" value=""/><br/>
                           <label for="typeorga3"> Type produit 3 : </label>
                           <input id="typeorga3" type="text" size="5" name="type_orga3" value=""/> &nbsp;&nbsp;
                           Années <input id="anneeorga3" type="text" size="5" name="annee_orga3" value=""/></p>
                      </fieldset><br/>
                      <fieldset>
                           <legend><b>Régulateurs et verse</b></legend><br/>
                           <p><label for="regulateur">Nombre de régulateurs de croissance : </label>
                           <input id="regulateur" type="text" size="2" name="nb_regulateur_croissance" value=""/><br/><br/>
                           <label for="verse0">Verse sur la parcelle : </label>
                           <input type="hidden" name="verse_parcelle" value="">
                           <input id="verse" type="radio" name="verse_parcelle" value="oui" onclick="actives()" /> Oui
                           <input id="verse" type="radio" name="verse_parcelle" value="non" onclick="desactives()" /> Non<br/><br/>
                           <label class="desa3" for="pourcentverse"> Si oui :  % de la parcelle versée</label>
                           <input type="hidden" name="pourcentage_verse" value="">
                           <input class="desa3" id="pourcentverse" type="text" size="2" name="pourcentage_verse"  value=""/></p><br/><br/>
                      </fieldset><br/>
                      <fieldset>
                           <legend><b>Irrigation</b></legend><br/>
                           <p><label for="irrigation">Parcelle irriguée : </label>
                             <input type="hidden" name="irrigation" value="">
                           <input id="irrigation" type="radio" name="irrigation" value="oui" onclick="activ()" /> Oui
                           <input id="irrigation" type="radio" name="irrigation" value="non" onclick="desactiv()" /> Non<br/><br/>
                           <label class="desa4" for="materielirri">Matériel irrigation : </label>
                           <input type="hidden" name="materielirri" value="">
                        <select class="desa4" id="materielirri" name="irrigation_materiel" >
                           <option value="pivot">Pivot</option>
                           <option value="enrouleur">Enrouleur</option>
                           <option value="integrale">Couverture intégrale</option>
                           <option value="" selected></option>
                        </select></p><br/>
                           <label class="desa4" for="irrigationflo">Irrigation à la floraison :</label>
                           <input type="hidden" name="irrigation_floraison" value="">
                           <p class="desa4"><input class="desa4" id="irrigationflo" type="radio" name="irrigation_floraison" value="oui"/>Oui
                           <input class="desa4" id="irrigationflo" type="radio" name="irrigation_floraison" value="non"/> Non</p>
                           <p class="desa4"><label class="desa4" for="apportirri">Quantité totale : </label>
                           <input type="hidden" name="irrigation_qtite" value="">
                           <input class="desa4" id="apportirri" type="text" size="2" name="irrigation_qtite" value="" /> en mm</p>
                           <label class="desa4" for="tourirri">Nombre de tours d'eau : </label>
                           <input type="hidden" name="irrigation_nb_tours" value="">
                           <input class="desa4" id="tourirri" type="text" size="2" name="irrigation_nb_tours" value="" /><br/><br/>
                           <label class="desa4" for="parceldraine">Parcelle drainée : </label>
                           <input type="hidden" name="parcelle_drainee" value="">
                           <p class="desa4"><input id="parceldraine" type="radio" name="parcelle_drainee" value="oui"/> Oui
                           <input id="parceldraine" type="radio" name="parcelle_drainee" value="non"/> Non </p><br/><br/>
                      <fieldset class="desa4" id="irri1" >
                            <legend><b>1er irrigation</b></legend>
                            <p><label for="dateirri1">Date : </label>
                            <input type="hidden" name="irrigation1_date" value="">
                            <input id="dateirri1" type="date" name="irrigation1_date" value=""/><br/>
                            <label for="qtiteirri1">Quantité : </label>
                            <input type="hidden" name="irrigation1_qtite" value="">
                            <input id="qtiteirri1" type="text" size="2" name="irrigation1_qtite" value=""/> en mm</p>
                       </fieldset><br/>
                       <fieldset class="desa4" id="irri2" >
                            <legend><b>2 ème irrigation</b></legend>
                            <p><label for="dateirri2">Date : </label>
                            <input type="hidden" name="irrigation2_date" value="">
                            <input id="dateirri2" type="date" name="irrigation2_date" value=""/><br/>
                            <label for="qtiteirri2">Quantité : </label>
                            <input type="hidden" name="irrigation2_qtite" value="">
                            <input id="qtiteirri2" type="text" size="2" name="irrigation2_qtite" value=""/> en mm</p>
                       </fieldset><br/>
                       <fieldset class="desa4" id="irri3" >
                            <legend><b>3 ème irrigation</b></legend>
                            <p><label for="dateirri3">Date : </label>
                            <input type="hidden" name="irrigation3_date" value="">
                            <input id="dateirri3" type="date" name="irrigation3_date" value=""/><br/>
                            <label for="qtiteirri3">Quantité : </label>
                            <input type="hidden" name="irrigation3_qtite" value="">
                            <input id="qtiteirri3" type="text" size="2" name="irrigation3_qtite" value=""/> en mm</p>
                       </fieldset><br/>
                       <fieldset class="desa4" id="irri4" >
                            <legend><b>4 ème irrigation</b></legend>
                            <p><label for="dateirri4">Date : </label>
                            <input type="hidden" name="irrigation4_date" value="">
                            <input id="dateirri4" type="date" name="irrigation4_date" value=""/><br/>
                            <label for="qtiteirri4">Quantité : </label>
                            <input type="hidden" name="irrigation4_qtite" value="">
                            <input id="qtiteirri4" type="text" size="2" name="irrigation4_qtite" value=""/> en mm</p>
                       </fieldset><br/>
                       </fieldset><br/>
                       <fieldset>
                           <legend><b>Protection sanitaire sur la parcelle</b></legend><br/>
                           <p><label for="traitsemence">Traitement des semences : </label>
                           <input type="hidden" name="traitement_semence" value="">
                           <input id="traitsemence" type="radio" name="traitement_semence" value="oui" onclick="actif()"/> Oui
                           <input id="traitsemence" type="radio" name="traitement_semence" value="non" onclick="desactif()"/> Non<br/><br/>
                           <label class="desa5" for="prodsemence">Si oui nom du produit : </label>
                           <input type="hidden" name="produit_trait_semence" value="">
                           <input class="desa5" id="prodsemence" type="text" name="produit_trait_semence" value="" /><br/><br/>
                           <label for="traitfongi">Nombre de traitements fongicides en végétation : </label>
                           <input id="traitfongi" type="text" size="2" name="nb_trait_fongicide" value=""/><br/><br/>
                           <label for="traitfusa">Dont spécifiques contre la fusariose des épis : </label>
                           <input type="hidden" name="trait_fusariose" value="">
                           <input id="traitfusa" type="radio" name="trait_fusariose" value="oui"/> Oui
                           <input id="traitfusa" type="radio" name="trait_fusariose" value="non"/> Non<br/><br/></p>
                        <fieldset>
                            <legend><b>1 ère application</b></legend>
                            <p><label for="traitfongi1">Date : </label>
                            <input id="traitfongi1" type="date" name="fongi1_date" value=""/><br/>
                            <label for="stadefongi1">Stade : </label>
                            <input id="stadefongi1" type="text" name="fongi1_stade" value=""/><br/>
                            <label for="prod1fongi1">Produit 1 : </label>
                            <input id="prod1fongi1" type="text" name="fongi1_produit1" value=""/><br/>
                            <label for="dose1fongi1">Dose1 : </label>
                            <input id="dose1fongi1" type="text" name="fongi1_dose1" value=""/> /ha<br/>
                            <label for="prod2fongi1">Produit 2 : </label>
                            <input id="prod2fongi1" type="text" name="fongi1_produit2" value=""/><br/>
                            <label for="dose2fongi1">Dose 2 : </label>
                            <input id="dose2fongi1" type="text" name="fongi1_dose2" value=""/> /ha<br/>
                            <label for="volumefongi1">Volume de bouillie l/ha : </label>
                            <input id="volumefongi1" type="text" name="fongi1_volume" value=""/><br/>
                            <label for="ciblefongi1">Maladie ciblée : </label>
                            <input id="ciblefongi1" type="text" name="fongi1_maladie_cible" value=""/></p>
                       </fieldset><br/>
                       <fieldset>
                            <legend><b>2 ème application</b></legend>
                            <p><label for="traitfongi2">Date : </label>
                            <input id="traitfongi2" type="date" name="fongi2_date" value=""/><br/>
                            <label for="stadefongi2">Stade : </label>
                            <input id="stadefongi2" type="text" name="fongi2_stade" value=""/><br/>
                            <label for="prod1fongi2">Produit 1 : </label>
                            <input id="prod1fongi2" type="text" name="fongi2_produit1" value=""/><br/>
                            <label for="dose1fongi2">Dose 1 : </label>
                            <input id="dose1fongi2" type="text" name="fongi2_dose1" value=""/> /ha<br/>
                            <label for="prod2fongi2">Produit 2 : </label>
                            <input id="prod2fongi2" type="text" name="fongi2_produit2" value=""/><br/>
                            <label for="dose2fongi2">Dose 2 : </label>
                            <input id="dose2fongi2" type="text" name="fongi2_dose2" value=""/> /ha<br/>
                            <label for="volumefongi2">Volume de bouillie l/ha : </label>
                            <input id="volumefongi2" type="text" name="fongi2_volume" value=""/><br/>
                            <label for="ciblefongi2">Maladie ciblée : </label>
                            <input id="ciblefongi2" type="text" name="fongi2_maladie_cible" value=""/></p>
                       </fieldset><br/>
                       <fieldset>
                            <legend><b>3 ème application</b></legend>
                            <p><label for="traitfongi3">Date : </label>
                            <input id="traitfongi3" type="date" name="fongi3_date" value=""/><br/>
                            <label for="stadefongi3">Stade : </label>
                            <input id="stadefongi3" type="text" name="fongi3_stade" value=""/><br/>
                            <label for="prod1fongi3">Produit 1 : </label>
                            <input id="prod1fongi3" type="text" name="fongi3_produit1" value=""/><br/>
                            <label for="dose1fongi3">Dose 1 : </label>
                            <input id="dose1fongi3" type="text" name="fongi3_dose1" value=""/> /ha<br/>
                            <label for="prod2fongi3">Produit 2 : </label>
                            <input id="prod2fongi3" type="text" name="fongi3_produit2" value=""/><br/>
                            <label for="dose2fongi3">Dose 2 : </label>
                            <input id="dose2fongi3" type="text" name="fongi3_dose2" value=""/> /ha<br/>
                            <label for="volumefongi3">Volume de bouillie l/ha : </label>
                            <input id="volumefongi3" type="text" name="fongi3_volume" value=""/><br/>
                            <label for="ciblefongi3">Maladie ciblée : </label>
                            <input id="ciblefongi3" type="text" name="fongi3_maladie_cible" value=""/></p>
                       </fieldset><br/>
                       <fieldset>
                            <legend><b>4 ème application</b></legend>
                            <p><label for="traitfongi4">Date : </label>
                            <input id="traitfongi4" type="date" name="fongi4_date" value=""/><br/>
                            <label for="stadefongi4">Stade : </label>
                            <input id="stadefongi4" type="text" name="fongi4_stade" value=""/><br/>
                            <label for="prod1fongi4">Produit 1 : </label>
                            <input id="prod1fongi4" type="text" name="fongi4_produit1" value=""/><br/>
                            <label for="dose1fongi4">Dose 1 : </label>
                            <input id="dose1fongi4" type="text" name="fongi4_dose1" value=""/> /ha<br/>
                            <label for="prod2fongi4">Produit 2 : </label>
                            <input id="prod2fongi4" type="text" name="fongi4_produit2" value=""/><br/>
                            <label for="dose2fongi4">Dose 2 : </label>
                            <input id="dose2fongi4" type="text" name="fongi4_dose2" value=""/> /ha<br/>
                            <label for="volumefongi4">Volume de bouillie l/ha : </label>
                            <input id="volumefongi4" type="text" name="fongi4_volume" value=""/><br/>
                            <label for="ciblefongi4">Maladie ciblée : </label>
                            <input id="ciblefongi4" type="text" name="fongi4_maladie_cible" value=""/></p>
                       </fieldset><br/>
                       <fieldset>
                            <legend><b>Traitement herbicides anti-graminées (ou mixte)</b></legend><br/>
                            <p><b>Utilisation d'herbicides :</b><br/><br/>
                            <label for="traitherb">Automne : </label>
                            <input type="hidden" name="herbicide_automne" value="">
                            <input id="traitherb" type="radio" name="herbicide_automne" value="oui"/> Oui
                            <input id="traitherb" type="radio" name="herbicide_automne" value="non"/> Non<br/><br/>
                            <label for="traitherb1">Sortie d'hiver : </label>
                            <input type="hidden" name="herbicide_hiver" value="">
                            <input id="traitherb1" type="radio" name="herbicide_hiver" value="oui"/> Oui
                            <input id="traitherb1" type="radio" name="herbicide_hiver" value="non"/> Non<br/><br/>
                            <b>Précisez votre appréciation de votre désherbage anti-graminées (ou mixte) : </b><br/><br/>
                            <input type="hidden" name="qualite_herbicide" value="">
                            <input id="traitherb2" type="radio" name="qualite_herbicide" value="tresatisfai"/> Très satisfait
                            <input id="traitherb2" type="radio" name="qualite_herbicide" value="assesatisfai"/> Assez satisfait
                            <input id="traitherb2" type="radio" name="qualite_herbicide" value="peusatisfai"/> Peu satisfait
                            <input id="traitherb2" type="radio" name="qualite_herbicide" value="pasatisfai"/> Pas satisfait<br/><br/></p>
                       </fieldset><br/>
                       </fieldset><br/>
                <hr/><h3>Observation en culture</h3><center><i>si vous n'avez pas observé vos parcelles, passez à la partie <a href="#recolte"><b><u>RECOLTE</u></b></a></i></center><br/>
                       <fieldset>
                           <legend><b>Symptômes de maladies </b><i>(cochez si observés sur la parcelle)</i></legend><br/>
                            <p><label for="symptfeuille">Symptômes de maladies de feuillage : </label>
                            <input type="hidden" name="sympt_maladie_feuille" value="">
                            <input id="symptfeuille" type="radio" name="sympt_maladie_feuille" value="oui"/> Oui
                            <input id="symptfeuille" type="radio" name="sympt_maladie_feuille" value="non"/> Non <br/><br/>
                             <b>Si oui, lesquelles :</b><br/>
                            <label for="typemaladi">avez-vous reconnues :</label>
                            <input type="hidden" name="maladie_feuille"/>
                            <input id="typemaladi" type="checkbox" name="maladie_feuille" value="pietverse"/> Pietin verse
                            <input id="typemaladi" type="checkbox" name="maladie_feuille" value="rouillejaune"/> Rouille jaune
                            <input id="typemaladi" type="checkbox" name="maladie_feuille" value="rouillebrune"/> Rouille brune
                            <input id="typemaladi" type="checkbox" name="maladie_feuille" value="septoriose"/> Septoriose
                            Autre : <input id="typemaladi" type="text" size="6" name="maladie_feuille" value=""/><br/><br/>
                            <label for="typemaladi1">sont difficiles à contrôler? :</label>
                            <input type="hidden" name="reconnaissance_maladie_feuille" value=""/>
                            <input id="typemaladi1" type="checkbox" name="reconnaissance_maladie_feuille" value="pietverse"/> Pietin verse
                            <input id="typemaladi1" type="checkbox" name="reconnaissance_maladie_feuille" value="rouillejaune"/> Rouille jaune
                            <input id="typemaladi1" type="checkbox" name="reconnaissance_maladie_feuille" value="rouillebrune"/> Rouille brune
                            <input id="typemaladi1" type="checkbox" name="reconnaissance_maladie_feuille" value="septoriose"/> Septoriose
                            Autre : <input id="typemaladi" type="text" size="6" name="reconnaissance_maladie_feuille" value=""/><br/><br/>
                            <label for="attaqumalad">Grosse attaque de maladie(s) dans les 5 années passées : </label>
                            <input type="hidden" name="maladie_5ans" value="">
                            <input id="attaqumalad" type="radio" name="maladie_5ans" value="oui"/> Oui
                            <input id="attaqumalad" type="radio" name="maladie_5ans" value="non"/> Non <br/><br/>
                            <label for="maladiannee">Maladies/Années concernées :</label>
                            <input id="maladiannee" type="text" name="annee_maladie_5ans" value=""/><br/><br/>
                            <label for="symptomfusa">Symptômes de fusariose sur épis sur la parcelle : </label>
                            <input type="hidden" name="symptome_fusariose_epis" value="">
                            <input id="symptomfusa" type="radio" name="symptome_fusariose_epis" value="oui"/> Oui
                            <input id="symptomfusa" type="radio" name="symptome_fusariose_epis" value="non"/> Non <br/><br/>
                            <label for="ergotcult">Présence d'ergot dans la culture : </label>
                            <input type="hidden" name="presence_ergot" value="">
                            <input id="ergotcult" type="radio" name="presence_ergot" value="oui"/> Oui
                            <input id="ergotcult" type="radio" name="presence_ergot" value="non"/> Non&nbsp;&nbsp;
                            au cours des 5 dernières années :
                            <input type="hidden" name="presence_ergot_5ans" value="">
                            <input id="ergotannee" type="radio" name="presence_ergot_5ans" value="oui"/> Oui
                            <input id="ergotannee" type="radio" name="presence_ergot_5ans" value="non"/> Non <br/><br/></p>
                       </fieldset><br/>
                       <fieldset>
                           <legend><b>Ravageurs </b><i>(cochez si observés sur la parcelle)</i></legend><br/>
                            <p><label for="cecidomyie">Présence de cécidomyies sur épis : </label>
                              <input type="hidden" name="cecidomyie_epis" value="">
                            <input id="cecidomyie" type="radio" name="cecidomyie_epis" value="oui"/> Oui
                            <input id="cecidomyie" type="radio" name="cecidomyie_epis" value="non"/> Non&nbsp;&nbsp;
                            si présence, traitement insecticide spécifique : <input type="hidden" name="traite_insecticide" value=""><input id="insecticide" type="radio" name="traite_insecticide" value="oui"/> Oui
                            <input id="insecticide" type="radio" name="traite_insecticide" value="non"/> Non <br/><br/>
                            <label for="autreravageur">Autres ravageurs observés : </label>
                            <input type="hidden" name="autre_ravageur" value="">
                            <input id="autreravageur" type="radio" name="autre_ravageur" value="oui"/> Oui
                            <input id="autreravageur" type="radio" name="autre_ravageur" value="non"/> Non<br/><br/>
                            <label for="ravageur">Lesquels : </label>
                            <input id="ravageur" type="text" name="nom_ravageur" value=""/></p>
                       </fieldset><br/>
                       <fieldset>
                           <legend><b>Adventices </b><i>(cochez si observés sur la parcelle)</i></legend><br/>
                            <p><label for="gramineflo">Infestation de graminées en floraison <u><b>dans la parcelle</b></u> : </label>
                              <input type="hidden" name="adventice_floraison_parcelle" value="">
                            <input id="gramineflo" type="radio" name="adventice_floraison_parcelle" value="oui"/> Oui
                            <input id="gramineflo" type="radio" name="adventice_floraison_parcelle" value="non"/> Non<br/><br/>
                            <label for="naturgramine">Nature graminée :</label>
                            <input type="hidden" name="nature_adventice_parcelle" value=""/>
                            <input id="naturgramine" type="checkbox" name="nature_adventice_parcelle" value="vulpin"/> Vulpin
                            <input id="naturgramine" type="checkbox" name="nature_adventice_parcelle" value="ray_grass"/> Ray-grass
                            <input id="naturgramine" type="checkbox" name="nature_adventice_parcelle" value="fetuque"/> Fétuque
                            <input id="naturgramine" type="checkbox" name="nature_adventice_parcelle" value="chiendent"/> Chiendent
                            <input id="naturgramine" type="checkbox" name="nature_adventice_parcelle" value="dactyle"/> Dactyle&nbsp;
                            Autre : <input id="autregramine" type="text" size="6" name="nature_adventice_parcelle" value=""/><br/><br/>
                            <label for="gramineflo1">Infestation de graminées en floraison <u><b>autour de la parcelle</b></u> : </label>
                            <input type="hidden" name="adventice_floraison" value="">
                            <input id="gramineflo1" type="radio" name="adventice_floraison" value="oui"/> Oui
                            <input id="gramineflo1" type="radio" name="adventice_floraison" value="non"/> Non<br/><br/>
                            <label for="naturgramine1">Nature graminée :</label>
                            <input type="hidden" name="nature_adventice" value=""/>
                            <input id="naturgramine1" type="checkbox" name="nature_adventice" value="vulpin"/> Vulpin
                            <input id="naturgramine1" type="checkbox" name="nature_adventice" value="ray_grass"/> Ray-grass
                            <input id="naturgramine1" type="checkbox" name="nature_adventice" value="fetuque"/> Fétuque
                            <input id="naturgramine1" type="checkbox" name="nature_adventice" value="chiendent"/> Chiendent
                            <input id="naturgramine1" type="checkbox" name="nature_adventice" value="dactyle"/> Dactyle&nbsp;
                            Autre : <input id="autregramine1" type="text" size="6" name="nature_adventice" value=""/><br/><br/>
                            <label for="fauchagebord">Fauchage des bords de champ/bandes enherbées avant montée à floraison : </label>
                            <input type="hidden" name="fauchage_champ" value="">
                            <input id="fauchagebord" type="radio" name="fauchage_champ" value="oui"/> Oui
                            <input id="fauchagebord" type="radio" name="fauchage_champ" value="non"/> Non<br/><br/></p>
                       </fieldset><br/>
                  <hr/><h3 id="recolte">Récolte</h3>
                        <fieldset>
                           <legend><b>Récolte</b></legend><br/>
                            <p><label for="daterecolte">Date de récolte : </label>
                            <input id="daterecolte" type="date" name="date_recolte" value=""/><br/><br/>
                            <label for="meteo">Récolte retardée à cause de la météo : </label>
                            <input type="hidden" name="retard_recolte_meteo" value="">
                            <input id="meteo" type="radio" name="retard_recolte_meteo" value="oui"/> Oui
                            <input id="meteo" type="radio" name="retard_recolte_meteo" value="non"/> Non<br/><br/>
                            <label for="rendement" >Rendement : </label>
                            <input for="rendement" type="text" size="3" name="rendement" value=""/> en q/ha<br/><br/>
                            <label for="graineau" >Teneur du grain en eau à la récolte : </label>
                            <input for="graineau" type="text" size="3" name="eau_grain_recolte" value=""/> en %<br/><br/>
                            <label for="paille">Maturité des pailles :</label>
                            <input type="hidden" name="maturite_paille" value="">
                            <input id="paille" type="radio" name="maturite_paille" value="pailleverte"/> Traces de pailles vertes
                            <input id="paille" type="radio" name="maturite_paille" value="paillesouple"/> Pailles souples ou sèches
                            <input id="paille" type="radio" name="maturite_paille" value="paillebrisan"/> Pailles brisantes<br/><br/></p>
                       </fieldset><br/>
                       <fieldset>
                           <legend><b>La moissonneuse-batteuse</b></legend><br/>
                            <label for="marquemoisson">Marque : </label>
                            <input id="marquemoisson" type="text" size="8" name="batteuse_marque" value=""/><br/><br/>
                            <label for="modelemoisson">Modèle précis : </label>
                            <input id="modelemoisson" type="text" size="8" name="batteuse_modele" value=""/><br/><br/>
                            Année de mise en service : <input id="anneemoisson" type="text" size="8" name="batteuse_annee" value=""/><br/><br/>
                            <p><label for="typemoisson">Type :</label>
                              <input type="hidden" name="batteuse_type" value="">
                            <input id="typemoisson" type="radio" name="batteuse_type" value="conventionnel"/> Conventionnel&nbsp;&nbsp;
                            <input id="typemoisson" type="radio" name="batteuse_type" value="axial"/> Axial&nbsp;&nbsp;
                            <input id="typemoisson" type="radio" name="batteuse_type" value="hybride"/> Hybride<br/><br/>
                            <label for="largeurcoup">Largeur de coupe : </label>
                            <input id="largeurcoup" type="text" size="8" name="batteuse_largeur_coupe" value=""/> en m<br/><br/>
                            <label for="diamrotor">Diamètre du batteur ou rotor(s) : </label>
                            <input id="diamrotor" type="text" size="8" name="batteuse_diametre_rotor" value=""/> en cm<br/><br/>
                            <label for="machine"></label>
                            <input type="hidden" name="batteuse_proprietaire" value="">
                            <input id="machine" type="radio" name="batteuse_proprietaire" value="enpropriete"/> Machine en proprièté&nbsp;&nbsp;
                            <input id="machine" type="radio" name="batteuse_proprietaire" value="encuma"/> Machine en CUMA&nbsp;&nbsp;
                            <input id="machine" type="radio" name="batteuse_proprietaire" value="dentreprise"/> Machine d'entreprise<br/><br/></p>
                       </fieldset><br/>
                       <fieldset>
                           <legend><b>Au cours du chantier</b></legend><br/>
                          <p>
                            <label for="viteavance">Vitesse d'avancement moyenne : </label>
                            <input id="viteavance" type="text" size="8" name="vitesse_avancement" value=""/> en km/h<br/><br/>
                            <label for="vitebatteur">Vitesse de rotation du batteur : </label>
                            <input id="vitebatteur" type="text" size="8" name="vitesse_rotation_batteur" value=""/> en tr/mn;
                            <label for="viteventil">Vitesse de rotation du ventilateur : </label>
                            <input id="viteventil" type="text" size="8" name="vitesse_rotation_ventilateur" value=""/> en tr/mn;<br/><br/>
                            <b>Commentaires sur d'éventuelles difficultés rencontrées (grains cassés, imbattus, grains sales, retour d'ôtons, pertes aux grilles...)<br/> et toutes remarques qui vous sembleraient utiles : </b><br/>
                            <center><textarea id="commentaire" name="commentaire" rows="12" cols="80" value=""></textarea></center><br/>
                         </p>
                       </fieldset><br/>
                       <fieldset>
                            <legend><b>Remarques et observations générales</b></legend><br/>
                        <p>
                            <label for="questionnaire">Temps de remplissage du questionnaire : </label>
                            <input type="hidden" name="temps_remplissage" value="">
                            <input id="questionnaire" type="text" size="4" name="temps_remplissage" value=""/> en mn<br/><br/>
                            <label for="remplissage">Difficulté rencontrée dans le remplissage :</label>
                            <input type="hidden" name="difficulte_remplissage" value="">
                            <input id="remplissage" type="radio" name="difficulte_remplissage" value="faible"/> Faible&nbsp;&nbsp;
                            <input id="remplissage" type="radio" name="difficulte_remplissage" value="moyenne"/> Moyenne&nbsp;&nbsp;
                            <input id="remplissage" type="radio" name="difficulte_remplissage" value="forte"/> Forte<br/><br/>
                        </p>
                       </fieldset><br/>
                            <input name="parcelleChoisie" id="parcelleChoisie" type="hidden" value="">
                            <button type="submit">Envoyer</button>
                            <input type="reset" value="Annuler" />
                </form>

                <div><a id="cRetour" class="cInvisible" href="#haut"></a></div>

       <?php include 'footer.php'; ?>
       <script>//création des boutons parcelles
         $(document).ready(function(){
           $('.choixForm button').on('click', function(){
             var parcelleChoisie = $(this).attr("id");
             document.location.href = "formcadon.php?parcelle="+parcelleChoisie;
           });
           var parcelleChoisie = $('input[name=nom_parcelle]').val();
           $('#parcelleChoisie').val(parcelleChoisie);
         });
       </script>

        <script>//flèche ascenseur retour haut de page
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
            });
            });
            //calendrier input date compatible tous navigateurs
        </script>
          <link rel="stylesheet" href="jqueryui.css">
          <script src="jqueryv1.js"></script>
          <script src="browserPlugin/dist/jquery.browser.js"></script>
          <script>
              $(function() {
                if($.browser.name == "chrome"){}else{
                $('input[type=date]').on('click', function(){
                  $(this).datepicker({
                          showOn: "button",
                          buttonImage: "images/calendar.gif",
                          buttonImageOnly: true,
                          buttonText: "Select date",
                              closeText: 'Fermer',
                              prevText: '&#x3c;Préc',
                              nextText: 'Suiv&#x3e;',
                              currentText: 'Aujourd\'hui',
                              monthNames: ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre'],
                              monthNamesShort: ['Jan','Fev','Mar','Avr','Mai','Jun','Jul','Aou','Sep','Oct','Nov','Dec'],
                              dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
                              dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
                              dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
                              weekHeader: 'Sm',
                              dateFormat: 'mm/dd/yy',
                              firstDay: 1,
                              isRTL: false,
                              showMonthAfterYear: false,
                              yearSuffix: '',
                              minDate: 0,
                              maxDate: '+12M +0D',
                              showButtonPanel: true
                            });
                   $.datepicker.setDefaults($.datepicker.regional['fr']);
                });
                }
              });
          </script>

          <script>
            function activer() {
                      $('.desa1').show();}
            function desactiver(){
                      $('.desa1').hide();}
            function active() {
                      $('.desa2').show();}
            function desactive(){
                      $('.desa2').hide();}
            function actives() {
                      $('.desa3').show();}
            function desactives(){
                      $('.desa3').hide();}
            function activ(){
                      $('.desa4').show();}
            function desactiv(){
                      $('.desa4').hide();}
            function actif(){
                      $('.desa5').show();}
            function desactif(){
                      $('.desa5').hide();}
          </script>
</div>
</body>
</html>
<?php
}else{
  logout();
  header('Location:login.php');
  exit();
}?>
