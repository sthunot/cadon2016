<?php
session_start();
include "bdd.php";
include "fonctions.php";
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$donnees = array();
$index = array('nom_parcelle', 'projet', 'code_postal', 'commune', 'type_culture', 'site_industriel', 'route_circulation', 'type_sol1', 'type_sol2', 'type_sol3', 'type_sol4', 'type_sol5', 'precedent_n_1', 'precedent_n_2', 'precedent_n_3', 'residus_n_1', 'precedent_semis', 'travail_sol', 'interculture', 'especes', 'date_semis_interculture', 'date_destruction_interculture', 'residus_interculture', 'semis_variete', 'semis_date', 'semis_densite', 'date_floraison', 'semis_certifie', 'nombre_apport_engrais', 'type_fertilisation', 'dose_totale_azote', 'dose_totale_phosphate', 'type', 'apport_1_date', 'apport_1_type_engrais', 'apport_1_dose', 'apport_2_date', 'apport_2_type_engrais', 'apport_2_dose', 'apport_3_date', 'apport_3_type_engrais', 'apport_3_dose', 'apport_4_date', 'apport_4_type_engrais', 'apport_4_dose', 'apport_5_date', 'apport_5_type_engrais', 'apport_5_dose', 'engrais_post_semis', 'engrais_post_semis_date', 'engrais_post_semis_dose', 'engrais_post_semis_type', 'amendement_orga', 'nombre_apport_orga', 'quantite_orga', 'type_orga', 'depuis_10', 'type_orga1', 'annee_orga1', 'type_orga2', 'annee_orga2', 'type_orga3', 'annee_orga3', 'nb_regulateur_croissance', 'verse_parcelle', 'pourcentage_verse', 'irrigation', 'irrigation_materiel', 'irrigation_floraison', 'irrigation_qtite', 'irrigation_nb_tours', 'parcelle_drainee', 'irrigation1_date', 'irrigation1_qtite', 'irrigation2_date', 'irrigation2_qtite', 'irrigation3_date', 'irrigation3_qtite', 'irrigation4_date', 'irrigation4_qtite', 'traitement_semence', 'produit_trait_semence', 'nb_trait_fongicide', 'trait_fusariose', 'fongi1_date', 'fongi1_stade', 'fongi1_produit1', 'fongi1_dose1', 'fongi1_produit2', 'fongi1_dose2', 'fongi1_volume', 'fongi1_maladie_cible', 'fongi2_date', 'fongi2_stade', 'fongi2_produit1', 'fongi2_dose1', 'fongi2_produit2', 'fongi2_dose2', 'fongi2_volume', 'fongi2_maladie_cible', 'fongi3_date', 'fongi3_stade', 'fongi3_produit1', 'fongi3_dose1', 'fongi3_produit2', 'fongi3_dose2', 'fongi3_volume', 'fongi3_maladie_cible', 'fongi4_date', 'fongi4_stade', 'fongi4_produit1', 'fongi4_dose1', 'fongi4_produit2', 'fongi4_dose2', 'fongi4_volume', 'fongi4_maladie_cible', 'herbicide_automne', 'herbicide_hiver', 'qualite_herbicide', 'sympt_maladie_feuille', 'maladie_feuille', 'reconnaissance_maladie_feuille', 'maladie_5ans', 'annee_maladie_5ans', 'symptome_fusariose_epis', 'presence_ergot', 'presence_ergot_5ans', 'cecidomyie_epis', 'traite_insecticide', 'autre_ravageur', 'nom_ravageur', 'adventice_floraison_parcelle', 'nature_adventice_parcelle', 'adventice_floraison', 'nature_adventice', 'fauchage_champ', 'date_recolte', 'retard_recolte_meteo', 'rendement', 'eau_grain_recolte', 'maturite_paille', 'batteuse_marque', 'batteuse_modele', 'batteuse_annee', 'batteuse_type', 'batteuse_largeur_coupe', 'batteuse_diametre_rotor', 'batteuse_proprietaire', 'vitesse_avancement', 'vitesse_rotation_batteur', 'vitesse_rotation_ventilateur', 'commentaire', 'temps_remplissage', 'difficulte_remplissage', 'email');
if(isset($_POST['parcelleChoisie']) && !empty($_POST['parcelleChoisie'])){
  try{
    $req = $bdd->prepare("UPDATE parcelle SET nom_parcelle = :nom_parcelle, projet = :projet, code_postal = :code_postal, commune = :commune, type_culture = :type_culture, site_industriel = :site_industriel, route_circulation = :route_circulation, type_sol1 = :type_sol1, type_sol2 = :type_sol2, type_sol3 = :type_sol3, type_sol4 = :type_sol4, type_sol5 = :type_sol5, precedent_n_1 = :precedent_n_1, precedent_n_2 = :precedent_n_2, precedent_n_3 = :precedent_n_3, residus_n_1 = :residus_n_1, precedent_semis = :precedent_semis, travail_sol = :travail_sol, interculture = :interculture, especes = :especes, date_semis_interculture = :date_semis_interculture, date_destruction_interculture = :date_destruction_interculture, residus_interculture = :residus_interculture, semis_variete = :semis_variete, semis_date = :semis_date, semis_densite = :semis_densite, date_floraison = :date_floraison, semis_certifie = :semis_certifie, nombre_apport_engrais = :nombre_apport_engrais, type_fertilisation = :type_fertilisation, dose_totale_azote = :dose_totale_azote, dose_totale_phosphate = :dose_totale_phosphate, type = :type, apport_1_date = :apport_1_date, apport_1_type_engrais = :apport_1_type_engrais, apport_1_dose = :apport_1_dose, apport_2_date = :apport_2_date, apport_2_type_engrais = :apport_2_type_engrais, apport_2_dose = :apport_2_dose, apport_3_date = :apport_3_date, apport_3_type_engrais = :apport_3_type_engrais, apport_3_dose = :apport_3_dose, apport_4_date = :apport_4_date, apport_4_type_engrais = :apport_4_type_engrais, apport_4_dose = :apport_4_dose, apport_5_date = :apport_5_date, apport_5_type_engrais = :apport_5_type_engrais, apport_5_dose = :apport_5_dose, engrais_post_semis = :engrais_post_semis, engrais_post_semis_date = :engrais_post_semis_date, engrais_post_semis_dose = :engrais_post_semis_dose, engrais_post_semis_type = :engrais_post_semis_type, amendement_orga = :amendement_orga, nombre_apport_orga = :nombre_apport_orga, quantite_orga = :quantite_orga, type_orga = :type_orga, depuis_10 = :depuis_10, type_orga1 = :type_orga1, annee_orga1 = :annee_orga1, type_orga2 = :type_orga2, annee_orga2 = :annee_orga2, type_orga3 = :type_orga3, annee_orga3 = :annee_orga3, nb_regulateur_croissance = :nb_regulateur_croissance, verse_parcelle = :verse_parcelle, pourcentage_verse = :pourcentage_verse, irrigation = :irrigation, irrigation_materiel = :irrigation_materiel, irrigation_floraison = :irrigation_floraison, irrigation_qtite = :irrigation_qtite, irrigation_nb_tours = :irrigation_nb_tours, parcelle_drainee = :parcelle_drainee, irrigation1_date = :irrigation1_date, irrigation1_qtite = :irrigation1_qtite, irrigation2_date = :irrigation2_date, irrigation2_qtite = :irrigation2_qtite, irrigation3_date = :irrigation3_date, irrigation3_qtite = :irrigation3_qtite, irrigation4_date = :irrigation4_date, irrigation4_qtite = :irrigation4_qtite, traitement_semence = :traitement_semence, produit_trait_semence = :produit_trait_semence, nb_trait_fongicide = :nb_trait_fongicide, trait_fusariose = :trait_fusariose, fongi1_date = :fongi1_date, fongi1_stade = :fongi1_stade, fongi1_produit1 = :fongi1_produit1, fongi1_dose1 = :fongi1_dose1, fongi1_produit2 = :fongi1_produit2, fongi1_dose2 = :fongi1_dose2, fongi1_volume = :fongi1_volume, fongi1_maladie_cible = :fongi1_maladie_cible, fongi2_date = :fongi2_date, fongi2_stade = :fongi2_stade, fongi2_produit1 = :fongi2_produit1, fongi2_dose1 = :fongi2_dose1, fongi2_produit2 = :fongi2_produit2, fongi2_dose2 = :fongi2_dose2, fongi2_volume = :fongi2_volume, fongi2_maladie_cible = :fongi2_maladie_cible, fongi3_date = :fongi3_date, fongi3_stade = :fongi3_stade, fongi3_produit1 = :fongi3_produit1, fongi3_dose1 = :fongi3_dose1, fongi3_produit2 = :fongi3_produit2, fongi3_dose2 = :fongi3_dose2, fongi3_volume = :fongi3_volume, fongi3_maladie_cible = :fongi3_maladie_cible, fongi4_date = :fongi4_date, fongi4_stade = :fongi4_stade, fongi4_produit1 = :fongi4_produit1, fongi4_dose1 = :fongi4_dose1, fongi4_produit2 = :fongi4_produit2, fongi4_dose2 = :fongi4_dose2, fongi4_volume = :fongi4_volume, fongi4_maladie_cible = :fongi4_maladie_cible, herbicide_automne = :herbicide_automne, herbicide_hiver = :herbicide_hiver, qualite_herbicide = :qualite_herbicide, sympt_maladie_feuille = :sympt_maladie_feuille, maladie_feuille = :maladie_feuille, reconnaissance_maladie_feuille = :reconnaissance_maladie_feuille, maladie_5ans = :maladie_5ans, annee_maladie_5ans = :annee_maladie_5ans, symptome_fusariose_epis = :symptome_fusariose_epis, presence_ergot = :presence_ergot, presence_ergot_5ans = :presence_ergot_5ans, cecidomyie_epis = :cecidomyie_epis, traite_insecticide = :traite_insecticide, autre_ravageur = :autre_ravageur, nom_ravageur = :nom_ravageur, adventice_floraison_parcelle = :adventice_floraison_parcelle, nature_adventice_parcelle = :nature_adventice_parcelle, adventice_floraison = :adventice_floraison, nature_adventice = :nature_adventice, fauchage_champ = :fauchage_champ, date_recolte = :date_recolte, retard_recolte_meteo = :retard_recolte_meteo, rendement = :rendement, eau_grain_recolte = :eau_grain_recolte, maturite_paille = :maturite_paille, batteuse_marque = :batteuse_marque, batteuse_modele = :batteuse_modele, batteuse_annee = :batteuse_annee, batteuse_type = :batteuse_type, batteuse_largeur_coupe = :batteuse_largeur_coupe, batteuse_diametre_rotor = :batteuse_diametre_rotor, batteuse_proprietaire = :batteuse_proprietaire, vitesse_avancement = :vitesse_avancement,vitesse_rotation_batteur = :vitesse_rotation_batteur, vitesse_rotation_ventilateur = :vitesse_rotation_ventilateur, commentaire = :commentaire, temps_remplissage = :temps_remplissage, difficulte_remplissage = :difficulte_remplissage, email = :email WHERE nom_parcelle = :nom_parcelle AND email = :email");
    for($i=0;$i<=154;$i++){
      $req->bindValue(":".$index[$i],$_POST["$index[$i]"]);
    }
    $req->bindValue(":nom_parcelle", $_POST['parcelleChoisie']);
    $req->bindValue(":email", $_SESSION['login']);
    $req->execute();
    $req->closeCursor();

    $req = $bdd->prepare("UPDATE user SET nom = :nom, prenom = :prenom, telephone = :telephone WHERE email = :email");
    $req->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'telephone' => $telephone,
                    'email' => $_SESSION['login']));
    $req->closeCursor();

   }
  catch (PDOException $e)
      {
          die('erreur : '.$e->getMessage());

      }

  header("Location: retourformulaire.php");
  exit();
}else{
  try{
    $req = $bdd->prepare("INSERT INTO parcelle(nom_parcelle, projet, code_postal, commune, type_culture, site_industriel, route_circulation, type_sol1, type_sol2, type_sol3, type_sol4, type_sol5, precedent_n_1, precedent_n_2, precedent_n_3, residus_n_1, precedent_semis, travail_sol, interculture, especes, date_semis_interculture, date_destruction_interculture, residus_interculture, semis_variete, semis_date, semis_densite, date_floraison, semis_certifie, nombre_apport_engrais, type_fertilisation, dose_totale_azote, dose_totale_phosphate, type, apport_1_date, apport_1_type_engrais, apport_1_dose, apport_2_date, apport_2_type_engrais, apport_2_dose, apport_3_date, apport_3_type_engrais, apport_3_dose, apport_4_date, apport_4_type_engrais, apport_4_dose, apport_5_date, apport_5_type_engrais, apport_5_dose, engrais_post_semis, engrais_post_semis_date, engrais_post_semis_dose, engrais_post_semis_type, amendement_orga, nombre_apport_orga, quantite_orga, type_orga, depuis_10, type_orga1, annee_orga1, type_orga2, annee_orga2, type_orga3, annee_orga3, nb_regulateur_croissance, verse_parcelle, pourcentage_verse, irrigation, irrigation_materiel, irrigation_floraison, irrigation_qtite, irrigation_nb_tours, parcelle_drainee, irrigation1_date, irrigation1_qtite, irrigation2_date, irrigation2_qtite, irrigation3_date, irrigation3_qtite, irrigation4_date, irrigation4_qtite, traitement_semence, produit_trait_semence, nb_trait_fongicide, trait_fusariose, fongi1_date, fongi1_stade, fongi1_produit1, fongi1_dose1, fongi1_produit2, fongi1_dose2, fongi1_volume, fongi1_maladie_cible, fongi2_date, fongi2_stade, fongi2_produit1, fongi2_dose1, fongi2_produit2, fongi2_dose2, fongi2_volume, fongi2_maladie_cible, fongi3_date, fongi3_stade, fongi3_produit1, fongi3_dose1, fongi3_produit2, fongi3_dose2, fongi3_volume, fongi3_maladie_cible, fongi4_date, fongi4_stade, fongi4_produit1, fongi4_dose1, fongi4_produit2, fongi4_dose2, fongi4_volume, fongi4_maladie_cible, herbicide_automne, herbicide_hiver, qualite_herbicide, sympt_maladie_feuille, maladie_feuille, reconnaissance_maladie_feuille, maladie_5ans, annee_maladie_5ans, symptome_fusariose_epis, presence_ergot, presence_ergot_5ans, cecidomyie_epis, traite_insecticide, autre_ravageur, nom_ravageur, adventice_floraison_parcelle, nature_adventice_parcelle, adventice_floraison, nature_adventice, fauchage_champ, date_recolte, retard_recolte_meteo, rendement, eau_grain_recolte, maturite_paille, batteuse_marque, batteuse_modele, batteuse_annee, batteuse_type, batteuse_largeur_coupe, batteuse_diametre_rotor, batteuse_proprietaire, vitesse_avancement, vitesse_rotation_batteur, vitesse_rotation_ventilateur, commentaire, temps_remplissage, difficulte_remplissage, email) VALUES(:nom_parcelle, :projet, :code_postal, :commune, :type_culture, :site_industriel, :route_circulation, :type_sol1, :type_sol2, :type_sol3, :type_sol4, :type_sol5, :precedent_n_1, :precedent_n_2, :precedent_n_3, :residus_n_1, :precedent_semis, :travail_sol, :interculture, :especes, :date_semis_interculture, :date_destruction_interculture, :residus_interculture, :semis_variete, :semis_date, :semis_densite, :date_floraison, :semis_certifie, :nombre_apport_engrais, :type_fertilisation, :dose_totale_azote, :dose_totale_phosphate, :type, :apport_1_date, :apport_1_type_engrais, :apport_1_dose, :apport_2_date, :apport_2_type_engrais, :apport_2_dose, :apport_3_date, :apport_3_type_engrais, :apport_3_dose, :apport_4_date, :apport_4_type_engrais, :apport_4_dose, :apport_5_date, :apport_5_type_engrais, :apport_5_dose, :engrais_post_semis, :engrais_post_semis_date, :engrais_post_semis_dose, :engrais_post_semis_type, :amendement_orga, :nombre_apport_orga, :quantite_orga, :type_orga, :depuis_10, :type_orga1, :annee_orga1, :type_orga2, :annee_orga2, :type_orga3, :annee_orga3, :nb_regulateur_croissance, :verse_parcelle, :pourcentage_verse, :irrigation, :irrigation_materiel, :irrigation_floraison, :irrigation_qtite, :irrigation_nb_tours, :parcelle_drainee, :irrigation1_date, :irrigation1_qtite, :irrigation2_date, :irrigation2_qtite, :irrigation3_date, :irrigation3_qtite, :irrigation4_date, :irrigation4_qtite, :traitement_semence, :produit_trait_semence, :nb_trait_fongicide, :trait_fusariose, :fongi1_date, :fongi1_stade, :fongi1_produit1, :fongi1_dose1, :fongi1_produit2, :fongi1_dose2, :fongi1_volume, :fongi1_maladie_cible, :fongi2_date, :fongi2_stade, :fongi2_produit1, :fongi2_dose1, :fongi2_produit2, :fongi2_dose2, :fongi2_volume, :fongi2_maladie_cible, :fongi3_date, :fongi3_stade, :fongi3_produit1, :fongi3_dose1, :fongi3_produit2, :fongi3_dose2, :fongi3_volume, :fongi3_maladie_cible, :fongi4_date, :fongi4_stade, :fongi4_produit1, :fongi4_dose1, :fongi4_produit2, :fongi4_dose2, :fongi4_volume, :fongi4_maladie_cible, :herbicide_automne, :herbicide_hiver, :qualite_herbicide, :sympt_maladie_feuille, :maladie_feuille, :reconnaissance_maladie_feuille, :maladie_5ans, :annee_maladie_5ans, :symptome_fusariose_epis, :presence_ergot, :presence_ergot_5ans, :cecidomyie_epis, :traite_insecticide, :autre_ravageur, :nom_ravageur, :adventice_floraison_parcelle, :nature_adventice_parcelle, :adventice_floraison, :nature_adventice, :fauchage_champ, :date_recolte, :retard_recolte_meteo, :rendement, :eau_grain_recolte, :maturite_paille, :batteuse_marque, :batteuse_modele, :batteuse_annee, :batteuse_type, :batteuse_largeur_coupe, :batteuse_diametre_rotor, :batteuse_proprietaire, :vitesse_avancement, :vitesse_rotation_batteur, :vitesse_rotation_ventilateur, :commentaire, :temps_remplissage, :difficulte_remplissage, :email)");
    for($i=0;$i<=154;$i++){
      $donnees = $donnees + array($index[$i] => $_POST[''.$index[$i].'']);
    }
    $req->execute($donnees);
    $req->closeCursor();

    $req = $bdd->prepare("UPDATE user SET nom = :nom, prenom = :prenom, telephone = :telephone WHERE email = :email");
    $req->execute(array(
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'telephone' => $telephone,
                    'email' => $_SESSION['login']));
    $req->closeCursor();

   }
  catch (PDOException $e)
      {
          die('erreur : '.$e->getMessage());

      }

  header("Location: retourformulaire.php");
  exit();
  }
}
?>