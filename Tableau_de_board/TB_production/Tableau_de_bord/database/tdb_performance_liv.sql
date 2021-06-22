/*
*les elements de la table tdb_performance_liv:
*/
SELECT `mat`,
`agence`,
`nom`,
`lib_ville`,
`date_generation`,
`dateedition`,
`nbrcolis`,
`nbrpos`,
`total`,
`nonlivre`,
`nonlivrelivreur`,
`CAS10`,
`CAS12`,
`CAS14`,
`CAS16`,
`CAS18`,
`CAS20`,
`CAS22`,
`CAS23`
FROM  `tdb_performance_liv` WHERE 1

/*
*la source de la table:
*/
ALTER ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tdb_performance_liv`
 AS select `utilisateurs`.`matricule` AS `mat`,
 `utilisateurs`.`agence` AS `agence`,
 `utilisateurs`.`nom` AS `nom`,
 `ville`.`lib_ville` AS `lib_ville`,
 `cl`.`date_generation` AS `date_generation`,
 `cl`.`dateedition` AS `dateedition`,
 sum(`expedition`.`colis`) AS `nbrcolis`,
 count(distinct `expedition`.`destinataire`) AS `nbrpos`,
 count(`expedition`.`id`) AS `total`,
 sum((case when (`expedition`.`livraisoncode` <> 1) then 1 else 0 end)) AS `nonlivre`,
 sum((case when ((`expedition`.`motif` = 58) and (`expedition`.`livraisoncode` <> 1)) then 1 when (`expedition`.`livraisoncode` in (3,0)) then 1 else 0 end)) AS `nonlivrelivreur`,
 sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1000) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS10`,
 sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1200) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS12`,
 sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1400) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS14`,
 sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1600) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS16`,
 sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 1800) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS18`,
 sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 2000) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS20`,
 sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') < 2200) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS22`,
 sum((case when ((date_format(`expedition`.`livraisondate`,'%k%i') <= 2359) and (`expedition`.`motif` <> 58) and (`expedition`.`livraisoncode` in (1,2))) then 1 else 0 end)) AS `CAS23`
  from (
                (
                  (`expedition` join `cl`
                    on(
                            (`cl`.`numerocl` = `expedition`.`numerocl`)
                          )
                  )
                   join `utilisateurs`
                    on(
                            (`cl`.`matricule` = `utilisateurs`.`matricule`)
                          )
                ) join `ville`
                  on(
                          (`utilisateurs`.`agence` = `ville`.`code_ville`)
                        )
              )
 group by `utilisateurs`.`matricule`,
 `utilisateurs`.`agence`,
 `utilisateurs`.`nom`,
 `ville`.`lib_ville`,
 `cl`.`date_generation`,
 `cl`.`dateedition`
/*
*Requete de selection
*/
select  *,(cas23/total) as global from tdb_performance_liv where 1=1 
AND agence =100
AND  cast(dateEdition as date)=”date aujourd'hui”
ORDER BY global DESC

i+=1
                    nTotal+=sd.total
                    nOnlivrelivreur+=sd.nonlivrelivreur
                    ngloballivrer+=sd.cas23
