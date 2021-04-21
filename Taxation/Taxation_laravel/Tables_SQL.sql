/*
CREATE TABLE `admin` (
  id_admin
  adminname
  password
  mailadmin
);

CREATE TABLE `adresses` (
  id_adresse
  lib_adresse
  id_client
  id_user
  id_ville
  modifie_le
  supprime_le
  commit_par
);
-- --------------------------------------------------------

CREATE TABLE `agence` (
  AGENCE_COD
  AGENCE_LIB
  AGENCE_ADRESSE
  AGENCE_TEL
  modifie_le
  supprime_le
  commit_par
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE `client` (
  CLIENT_ID
  NOM
  PRENOM
  CIVILITE_COD
  CLIENT_TYP
  IDENTITE_TYP
  IDENTITE_VAL
  ID_FISCALE
  CAPITAL_SOC
  CREATION_DAT
  CLIENT_ETA
  MOTIF_ETA
  SECTEUR_COD
  EMPLOYE_ID
  SAISIE_DAT
  AGENCE_COD
  CLIENT_COD
  commentaire
  mail
  ICE
  CLIENT_ID_client_lve
  telephone
  modifie_le
  supprime_le
  commit_par
);
`clientsnombres` (
CLIENT_ID
NOM
total_declars
total_sous_clients
total_session
);
 `client_lve` (
  CLIENT_ID
  CLIENT_COD
  NOM
  PRENOM
  CIVILITE_COD
  CLIENT_TYP
  IDENTITE_TYP
  IDENTITE_VAL
  ID_FISCALE
  CAPITAL_SOC
  CREATION_DAT
  CLIENT_ETA
  MOTIF_ETA
  SECTEUR_COD
  EMPLOYE_ID
  SAISIE_DAT
  AGENCE_COD
  CLIENT_COD2
  debinterval
  fininterval
  intervalag_deb
  intervalag_fin
  commentaire
  mail
  ICE
  adresse
  ville
  login
  mot_de_passe
  modifie_le
  supprime_le
  commit_par
);

`client_lve_session` (
  AGENCE_COD
  AGENCE_LIB
  REFERENCIEE
  LOGIN
  MOT_D_PASS
  IDENTITE_TYP
  modifie_le
  supprime_le
  commit_par
);

`connexion` (
  id
  id_utilisateur
  date_connexion
  date_deconnexion
);

CREATE TABLE `declaration_v` (
  numero
  date
  facture_id
  colis
  poids
  palettes
  paletteA
  paletteB
  paletteC
  paletteAutre
  Nbre_palettes
  longueur
  hauteur
  largeur
  coef
  valeur
  client1_id
  client2_id
  livraison
  express
  port
  courrier_typ
  courrier_eta
  date_saisie
  userid
  nature
  Espece
  Cheque
  Traite
  Nbre_BL
  BL
  id_adres
  statut
  commentaire
);
CREATE TABLE `panierramasse` (
  numeroCarnet
  declaration
  etat
  motif_annulation
  date_modification
  supprime_le
  commit_par
);

CREATE TABLE `points_relais` (
  id_pr
  lib_pr
  id_ville
  loc_ver
  loc_hor
  modifie_le
  supprime_le
  commit_par
);
CREATE TABLE `ramasse` (
  numeroCarnet
  datedesaisie
  dateramassage
  user_id
  code_ramassage
  modifie_le
  supprime_le
  commit_par
);
CREATE TABLE `reclamation` (
  id_reclamation
  date_reclamation
  idclient
  client
  num_declar
  objet_reclamation
  id_user
  type_utilisateur
  tpy_reclam
  modifie_le
  supprime_le
  commit_par
);

 `ville` (
  VILLE_COD
  AGENCE_COD
  VILLE_LIB
  VILLE_TYP
  DELAI
  ZONE_COD
  modifie_le
  supprime_le
  commit_par
) ;