ALTER ALGORITHM=UNDEFINED DEFINER=`lve`@`localhost` SQL SECURITY DEFINER VIEW `expedition_tracking_v` AS
 select `expedition`.`id` AS `id`,
 `expedition`.`courrierid` AS `courrierid`,
convert(`expedition`.`numero` using utf8) AS `numero`,
str_to_date(`expedition`.`datesaisie`,
'%d/%m/%Y') AS `datedesaisie`,
`expedition`.`colis` AS `colis`,
`expedition`.`poids` AS `poids`,
`expedition`.`palettes` AS `palettes`,
`expedition`.`valeur` AS `valeur`,
convert(`expedition`.`expediteur` using utf8) AS `expediteur`,
convert(`expedition`.`destinataire` using utf8) AS `destinataire`,
`expedition`.`code_expediteur` AS `code_expediteur`,
`expedition`.`code_destinataire` AS `code_destinataire`,
convert(`expedition`.`ville1` using utf8) AS `ville1`,
convert(`expedition`.`ville2` using utf8) AS `ville2`,
convert(`expedition`.`adresse1` using utf8) AS `adresse1`,
convert(`expedition`.`adresse2` using utf8) AS `adresse2`,
convert(`expedition`.`port` using utf8) AS `port`,
convert(`expedition`.`payement` using utf8) AS `payement`,
`expedition`.`ttc` AS `ttc`,
`expedition`.`espece` AS `espece`,
`expedition`.`cheque` AS `cheque`,
`expedition`.`traite` AS `traite`,
`expedition`.`bl` AS `bl`,
`expedition`.`ttcrecup` AS `ttcrecup`,
`expedition`.`especerecup` AS `especerecup`,
`expedition`.`chequerecup` AS `chequerecup`,
`expedition`.`traiterecup` AS `traiterecup`,
`expedition`.`blrecup` AS `blrecup`,
`expedition`.`bonconsignation` AS `bonconsignation`,
CASE WHEN `expedition`.`livraisoncode` = 0
     THEN 'En attente'
     WHEN `expedition`.`livraisoncode` = 1
     THEN 'Livrée'
     WHEN `expedition`.`livraisoncode` = 2
     THEN 'Retour'
     WHEN `expedition`.`livraisoncode` = 3
     THEN 'Annulée'
     ELSE 'A relivrée'    END AS `Statut_Livraison` ,

`expedition`.`livraisondate` AS `livraisondate`,
`expedition`.`motif` AS `motif`,
convert(`expedition`.`numerocl` using utf8) AS `numerocl`,
convert(`expedition`.`lattitude` using utf8) AS `lattitude`,
convert(`expedition`.`longitude` using utf8) AS `longitude`
from `expedition`
