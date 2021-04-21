
----------------------------------------
---  dégénéré le BORDEREAU  
----------------------------------------
update transporte set employe_id=(select employe_id from EMPLOYE where MATRICULE='2611')

--select * from transporte
where voyage_num in ('1002101214','2002100060')

SELECT * FROM BORDEREAU b where b. BORDEREAU_NUM in ('56107')

C

--update BORDEREAU set BORDEREAU_ETA='O' where  BORDEREAU_NUM in ('61226')
----------------------------------------
----------------------------------------

select p.* from 
--update p set p.montant_ht=0 , montant_tax=0 from 
courrier c join produit p on c.COURRIER_ID=p.courrier_id and p.PRODUIT_COD in ('RELA','RELB','RELC') where c.COURRIER_NUM='C00111158'

-------------------------------
select * update COURRIER set FACTURE_ID=862935 where courrier_num='B00962109'--4022411
select * from facture where facture_num='' -- 862935

select * from COURRIER where facture_id=862935

select * from ETATS where GRP_ETAT_ID=44
----dégénérer la caisse centrale sur VEX
select * from CAISSE_CENTRALE where JOURNAL_NUM in ('700200260')
--update CAISSE_CENTRALE set JOURNAL_ETA='O',VALID1_DAT=null where JOURNAL_NUM in ('700190086')
--update CAISSE_CENTRALE set JOURNAL_ETA='V' where JOURNAL_NUM in ('700190086')
 --update CAISSE_CENTRALE set JOURNAL_DAT='01/10/2017' where JOURNAL_NUM in ('600190001')

merci bien de rectifie la date de voyages de ces expéditions : - B00710467 - B00801471 - B00746181 - B00649451 - B00710475 - B00710457

---------------------------------------------------
-- changement de date de voyage "fiche de route" pour avoire un traget 
--on virifier dabord dans vex avec le n declaration   
---------------------------------------------------
select top 10 * from ensemble
--update ensemble set ENSEMBLE_DAT='01/07/2020 19:13:24:907'

where ensemble_num in ('FC1002100737')
where ensemble_num in ('1002100697')


select top 10 * from livraison where ensemble_num ='FC1002100737'

select * from courrier where courrier_num='C00596307'

--update courrier_ensemble set COURRIER_id=4870239    where ensemble_num='FC1001901229'
select * from courrier where COURRIER_ID='4991653'

-------------------------------------------------------------
select * from utilisateur 
	select top 10 * from ensemble
--update ensemble set ENSEMBLE_DAT='15/11/2016 19:15:31:513'
where ensemble_num='FC1001901229' 
select * from ensemble
 select USER_LOGIN from utilisateur where USER_LOGIN like '%m.zaari%' -- and VEROU='o'
 
 select * from VEXINITIAL..COMPTEUR_AGENCE  where COMPTEUR_CD='PE' and AGENCE_COD='100'

 update p set compteur=24187 from VEXINITIAL..COMPTEUR_AGENCE  p where COMPTEUR_CD='PE' and AGENCE_COD='100'

 select max(p.pes_id) from VEXINITIAL..pesees p
 select max(p.pes_id) from VEXINITIAL..pesees_detail p

-------------------------------------------------------------
------------------------------------------------------------------
select * from LIVRAISON 

 select * from COURRIER_AGENCE 
 --where COURRIER_AGENCE.COURRIER_ID in (select COURRIER_id from  COURRIER where COURRIER_NUM='B00656473') and INTER_TYP='A'
--3955057	NULL	2	2017-05-25 18:04:39.450	NULL	NULL	999B00969269    	999             	NULL	NULL	NULL	0
--delete fromlivraison
where
courrier_id =3955057

select * from courrier
--update courrier_ensemble set destin_typ=1
where courrier_id=3955057 and ensemble_num= null ;

update ce set courrier_id = c.courrier_id
select c2.courrier_id , c.courrier_id
from
courrier c,
courrier c2,
courrier_ensemble ce
where
c2.courrier_id = ce.courrier_id and
c.courrier_id = 3955057 and
c2.courrier_num = '999B00969269' and
ensemble_num like 'FC%'

--COURRIER_ID	COURRIER_NUM	FACTURE_ID	NATURE_COD	VALEUR_DECLAREE	POIDS	ENCOMBREMENT_COEF	COLIS_NB	PALETTES	VILLE_DESTINATION	livraison_cod	Expedition_cod	Port_typ	Payement_cod	COURRIER_TYP	COURRIER_ETA	VEHICULE_TYP	SERVICE	RETOUR	COMPLEMENT	SAISIE_DAT	DEV_USER_ID	FORFAIT	TARIF_BASE	RET_PALETTES	VOLUME	COURRIER_ID	INTER_TYP	AGENCE_COD	INTER_ETA	ENTREE_DAT	SORTIE_DAT
--3587089	B0274321        	743469	20	0,00	2.000	0.00	1	0	0   	G	S	P	C	M	K	NULL	0	0	NULL	2016-06-10 17:48:23.107	195	0	0	0	NULL	3587089	A	700 	0	NULL	NULL
--3587089	B0274321        	743469	20	0,00	2.000	0.00	1	0	0   	G	S	P	C	M	K	NULL	0	0	NULL	2016-06-10 17:48:23.107	195	0	0	0	NULL	3587089	D	600 	1	NULL	NULL
--COURRIER_ID	COURRIER_NUM	FACTURE_ID	NATURE_COD	VALEUR_DECLAREE	POIDS	ENCOMBREMENT_COEF	COLIS_NB	PALETTES	VILLE_DESTINATION	livraison_cod	Expedition_cod	Port_typ	Payement_cod	COURRIER_TYP	COURRIER_ETA	VEHICULE_TYP	SERVICE	RETOUR	COMPLEMENT	SAISIE_DAT	DEV_USER_ID	FORFAIT	TARIF_BASE	RET_PALETTES	VOLUME	COURRIER_ID	INTER_TYP	AGENCE_COD	INTER_ETA	ENTREE_DAT	SORTIE_DAT
--3592849	B0266273        	743469		0,00	2.000	0.00	1	0	0   	G	S	P	C	M	K	NULL	0	0	NULL	2016-06-16 16:59:27.057	370	0	0	0	NULL	3592849	A	700 	0	NULL	NULL
--3592849	B0266273        	743469		0,00	2.000	0.00	1	0	0   	G	S	P	C	M	K	NULL	0	0	NULL	2016-06-16 16:59:27.057	370	0	0	0	NULL	3592849	D	600 	1	NULL	NULL
----------------------------------
----------------------------------
select * from LIVRAISON where COURRIER_ID in (
select COURRIER_ETA from courrier where COURRIER_NUM  in (
'B00737965',
'B00776453',
'B00751697',
'B00751698',
'B00751686',
'B00751689',
'B00751692',
'B00751688',
'B00751694',
'B00751696',
'B00751695',
'B00751699',
'B00751690',
'B00751691',
'B00751687')
--M
--update courrier set COURRIER_ETA='E' where  COURRIER_NUM in (
'B00737965',
'B00776453',
'B00751697',
'B00751698',
'B00751686',
'B00751689',
'B00751692',
'B00751688',
'B00751694',
'B00751696',
'B00751695',
'B00751699',
'B00751690',
'B00751691',
'B00751687')
 
--update LIVRAISON set ETAT_FINAL=2 where COURRIER_ID in (select COURRIER_ID from courrier where COURRIER_NUM='b00731473')
-----
-- Ecart entre le débit et le crédit pour l'export des factures d'octobre : Débit = 10 310 562.67 Crédit = 10 310 562.75
-- sur vex comptabilité > export vers comptabilité il se trouve qu'il ya un ecare entre debit et crédit 
--la solution execute le scripte "Correction_Ecart_facture.sql" .
---------------------------------
-------------------------------------------
---Enlever une Déclaration d'un Bordereau CR " non pas cel du facture "
--------------------------------------------b00582217 de ce bordereau 49393 merci d'enlever cette b00644512 de ce bordereau 51609
merci de en levé les expéditions N C00197862 .C00178479 C00265664 dons le bord 56107

declare @numero varchar(30) = 'c01132358'
declare @bordereau numeric(18,0)=63312
declare @id numeric(24,0)

select @id=courrier_id from courrier
where courrier_num=@numero

delete from courrier_bordereau
where bordereau_num=@bordereau and courrier_id=@id

update  retour_fonds_confirme set bordereau_num=null,CONFIRMATION_DAT=null where courrier_id=@id 
--------------------------------------
--- Pour que puis ajouter un Bordereau à une déclaration 
--------------------------------------
select top 1 * from COURRIER
update COURRIER set COURRIER_ETA='A' where COURRIER_NUM='b00654724'


--------------------------------------
---Modifier Chauffeur Feuille fiche de Route
--------------------------------------
select * from transporte
--update transporte set employe_id = (select employe_id from employe where matricule='2615')
where voyage_num in ('1002100697')

2558 au lieu 2552 FR 1002004551

select * from agence where agence_cod=220

 1227 au lieu de code 1272
  2555 au lieu 2552 feuille de route 6501900024
--------------------------------------
---Modifier Agence Feuille de Route
--------------------------------------
select * from transporte
--update transporte set agence_valid='100' where voyage_num in('5501900055')
--SET agence_terminus='100'
where voyage_num in('1001905367')
(204956 ligne(s) affectée(s))
select * from ville where ville_lib like '%ke%'
                                  --agence terminus
select*  from  ensemble where ENSEMBLE_NUM='FC1001905626  '  
update ensemble set AGENCE2_COD=650 where ENSEMBLE_NUM='FC1001905626  '   
-----------------------
---annuler transport
----------------------- et c00586971
C01091726 de la caisse300190269
declare @courrier_id int
declare @facture_id int
declare @COURRIER_NUM varchar(16)
set @COURRIER_NUM='C01091726'

select @courrier_id=courrier_id,
@facture_id=facture_id 
from COURRIER
where COURRIER_NUM=@COURRIER_NUM



delete from courrier_caisse where M_TYP='TR' and courrier_id=@courrier_id

delete from  regle
where facture_id=@facture_id



select top 10*from courrier_caisse where courrier_id=4767541
select top 10* from regle where facture_id=1125700

----

COURRIER_ID	M_TYP	JOURNAL_ID
4767541	AR	114409
4767541	TR	145142
REGLEMENT_NUM	FACTURE_ID	REGLEMENT_DAT	REGLEMENT_MT	VERS_NUM	ENSEMBLE_NUM	SAISIE_DAT	USER_ID	EMPLOYE_ID	AGENCE_COD	LETTRAGE
913585	1125700	2019-02-21 10:43:09.977	104,139	NULL	CR3001900111    	2019-02-21 10:43:09.977	203	NULL	NULL	NULL

---ajouter 17 cb100705=cb1001705

---*******************----
---Déletrage des factures---délétrer les versements

72518 - 72919 - 74415 - 76685

declare @vers_num numeric(16,0)
declare @date_cloture varchar(10)

set @vers_num=79477  

select @date_cloture=convert(varchar(10),date_cloture) from client_versement
where vers_num =@vers_num

if @date_cloture is null
begin

update facture_souche set regle = 'N'--non litree si il est 'o' letree
from
facture_souche fs,
regle rg
where 
rg.facture_id = fs.facture_id and
rg.vers_num=@vers_num/* in   (77844,77849,77866,77850,77851,77817,77836,77843,77859,77822,77823,77813,77815,77816,77872,77827,77831,77862,77814,77864,77834,77838,77839,77840,77871,77819,77830,77825,77867,77812,77837,77860,77821,77841,77842,77855,77856,77863,77852,77832,77833,77828,77845,77868,77869,77861,77818,77824,77847
 )*/

update client_versement set lettre = 'N' 
where vers_num=@vers_num /*in (77844,77849,77866,77850,77851,77817,77836,77843,77859,77822,77823,77813,77815,77816,77872,77827,77831,77862,77814,77864,77834,77838,77839,77840,77871,77819,77830,77825,77867,77812,77837,77860,77821,77841,77842,77855,77856,77863,77852,77832,77833,77828,77845,77868,77869,77861,77818,77824,77847
 ) */

delete regle where vers_num =@vers_num
/*in (77844,77849,77866,77850,77851,77817,77836,77843,77859,77822,77823,77813,77815,77816,77872,77827,77831,77862,77814,77864,77834,77838,77839,77840,77871,77819,77830,77825,77867,77812,77837,77860,77821,77841,77842,77855,77856,77863,77852,77832,77833,77828,77845,77868,77869,77861,77818,77824,77847
 )*/

end
else
print 'Versement cloturé'
---------------------------------------------------------------------------------------------
select * from  regle where vers_num = 79660
REGLEMENT_NUM	FACTURE_ID	REGLEMENT_DAT	REGLEMENT_MT	VERS_NUM	ENSEMBLE_NUM	SAISIE_DAT	USER_ID	EMPLOYE_ID	AGENCE_COD	LETTRAGE
794036	993017	2018-06-07 00:00:00.000	152646,00	76539	NULL	2018-06-07 09:07:20.543	48	NULL	NULL	NULL
----------------------client du reglement 
select * from client_versement
 --update  client_versement set Date_Cloture='27/08/2018' where vers_num =79660
 --update  client_versement set CLIENT_ID='790953' where vers_num =79722
 --update  client_versement set MONTANT=34813.21 where vers_num =79760
where vers_num =79760  

34183,21
34813.21 
select top 10* from client where CLIENT_COD='4687'




--------------------------------
--- 507506 lire 30/04/2017 au lieu du 10/05/2017 changement de date de cheque pour test l'impression sans retape tout les champs  


declare @Cheque_num char(16) ='57088'
update  Cheque set Impression_dat=null where Cheque_id in 
(select Cheque_id from Cheque where Cheque_num=@Cheque_num)
select * from Cheque where Cheque_id='57088'


----- pour annule le cheque aller dans l'administration de l'application 

-----------*++++++++++++ relation n declaration avec le pointeur 
Bonjour, merci d’affecter le code de pointeur : C00010177 code 2144 C00010176 code 2144 crdlt
select top 10 * from COURRIER where COURRIER_num='C00010176'
select * from COURRIER_ENSEMBLE where COURRIER_ID=4059344 4059346

select top 10 * from  ENSEMBLE where  ensemble_num='CG6001709477'
select * from agence 
select top 100 * from CONTROLE where  ensemble_num='CG6001709477'
update  CONTROLE set EMPLOYE_ID=(select EMPLOYE_ID from EMPLOYE where MATRICULE= '2144' ) where  ensemble_num='CG6001709476'
or ensemble_num='fc10016129' or     
ensemble_num='FC10016146'   or   
ensemble_num='FC10016511'     or
ensemble_num='FC10016512'      or
ensemble_num='G100182639'      

--------------*++++++++++++++++++++++
-- prière de supprimer la FC ci dessus, elle a été validée en double.
--les déclaration dans ongle voyage avec une ville de départ sans vile arrive


select *  from  COURRIER_ENSEMBLE where ensemble_num='CB1001608571'
select * from  ENSEMBLE where ensemble_num='CB1001608571'

--delete  from  COURRIER_ENSEMBLE where ensemble_num='FC1001605050'
--delete from  ENSEMBLE where ensemble_num='FC1001605050'
---*********************************

---------------------------------------------------
--Extraction sur fichier Excel le nombre d'expédition par agence pour le mois d'Octobre 2016
----------------------------------------------------
 select * from ETATS where GRP_ETAT_ID=7

select a.AGENCE_LIB ,count(de.courrier_id) as "NBR d'expidition"
from
declaration_v de 

inner join   ville v on v.VILLE_COD=de.ville1_cod
inner join   AGENCE a on a.AGENCE_COD=v.AGENCE_COD
  where cast(de.[date] as date) between '01/12/2016' and '31/12/2016'  group by a.AGENCE_LIB

  ------------------------------------------
  ------------------------------------------

  ------------------------------------------
  ---les tarif 14 ROQUETTE N° de déclarations saisies entre le 01/01/2015 et le 31/10/2016 au
  -- tarif 14 avec   ville 1 et destination + code client payeur
  ------------------------------------------

  select c.numero,

             convert(varchar,c.date_saisie,103) as date_declaration,
             case c.payement  when 'G' then 'NON' when 'C' then 'OUI' end as declaration_en_compte ,
             m.montant_ht as prix_ht,
			 c.expediteur,
			 c.destinataire,
             c.colis,
             c.poids,
			 v1.VILLE_LIB as expedition ,
			 v2.VILLE_LIB as destination,
             case clt.client_typ  when 'PA' then 'Passager' when 'EC' then 'En Compte' end as type_client,
             clt.client_cod,
             clt.nom as client

from ville v1,ville v2 , client_tarif ct inner join client clt on ct.client_id=clt.client_id 
inner join declaration_v c on clt.client_id = c.payeur_id
inner join courrier_montants_v m on c.courrier_id = m.courrier_id
where v1.VILLE_COD=c.ville1_cod and c.ville2_cod=v2.VILLE_COD and  tarif_num='14' and c.courrier_typ='M' and cast(c.date_saisie as date) between  '01/01/2020' and '30/09/2020' and ct.courrier_typ='M'
order by 2 

  ------------------------------------------
  ------------------------------------------
  
  ------------------------------------------
  ---Besoin du nombre total des expéditions messagerie des mois septembre et octobre 2016
  ------------------------------------------

  select count(de.courrier_id) as "NBR d'expidition"  from declaration_v   de
  where 
  cast(de.[date] as date) between '01/09/2016' and '30/09/2016' and  de.courrier_typ='M'
  
  ------------------------------------------
  ------------------------------------------
  
--------------------------
-----update balance agée 
----------------------------
select * from update  client set commentaire='à provisionner' where CLIENT_COD in (
select CODE_CLIENT from update    BA_DETAIL set RESPONSABLE='à provisionner'  where SOLDE_ÉCHU<=200 and RESPONSABLE='Ancien')

---------------------------------------
-------------------------------------------

---------------------------------------
----- insertion d'un nouveau compte bancaire 
-------------------------------------------

 select * from compte_banq
 --insert into compte_banq values (6,'CDM FT 2','CDM FT ain Sebaa','CDM',null,null,null,null,null,null,null,'BQ CM2','51410049') 

---------------------------------------
-------------------------------------------

  SELECT  0 as 'inclus',
           logistique_rubrique.id as 'courrier_id',
           logistique_rubrique.code as 'numero',
           logistique_rubrique.libelle as 'libelle',
           logistique_rubrique.tva as 'taux_tva',
           null as 'quantite0',
           null as 'prix_ht0',
           null as 'remise0',
           logistique_prestation_detail.id as 'id',
           logistique_prestation_detail.ev_id as 'ev_id',
           logistique_prestation_detail.rub_id as 'rub_id',
           logistique_prestation_detail.quantite as 'quantite',
           logistique_prestation_detail.prix_ht as 'prix_ht',
           logistique_prestation_detail.prix_tva as 'prix_tva',
           logistique_prestation_detail.remise as 'remise'    
        FROM logistique_rubrique ,
           logistique_prestation_detail     
        WHERE ( logistique_rubrique.id = logistique_prestation_detail.rub_id ) and 
		         ( ( logistique_rubrique.libelle like 'Sto%') )  

select top 10 * from  courrier_montants_v

select AGENCE_COD from EMPLOYE where EMPLOYE_ID in (
select USER_ID from utilisateur where FULL_NAME like 'AMRI')

select top 10 * from UTILISATEUR_AGENCE where USER_ID in (
select * from update utilisateur set AGENCE_COD=100 where FULL_NAME like 'AMRI')

select * from   utilisateur   where FULL_NAME like 'AMRI'

select   distinct libelle from logistique_rubrique where libelle like 'Sto%'  

 
select top 10 * from  COURRIER where COURRIER_ID in ('3628744')


select top 10 * from  ENSEMBLE where ensemble_eta='c' order by ensemble_dat desc
select top 10 * from agence

select top 10 * from VEHICULE   
select top 10 * from TRANSPORTE
select top 10 * from chauffeur

select   *     from   COURRIER_VEHICULE  


select * from VEHICULE where vehicule_num='800'
select top 10 * from COURRIER  where COURRIER_num='b123' 
select top 10 *     from COURRIER_ENSEMBLE where COURRIER_id='3273235'     
select top 10 * from ENSEMBLE where ENSEMBLE_NUM='FCA104098'
  

  select
COURRIER_VEHICULE.ensemble_num,
COURRIER_VEHICULE.VEHICULE_NUM 
from
COURRIER_VEHICULE,
courrier_ensemble
where
COURRIER_VEHICULE.ensemble_num = courrier_ensemble.ensemble_num and

COURRIER_ENSEMBLE.COURRIER_id = '3273235'    

update courrier_vehicule set VEHICULE_NUM='800' where ENSEMBLE_NUM='CG1501602803'
select * from COURRIER_ENSEMBLE where ENSEMBLE_NUM in (select c.ENSEMBLE_NUM from 
CONTROLE c inner join EMPLOI e on c.EMPLOYE_ID=e.EMPLOYE_ID 
inner join UTILISATEUR u on u.EMPLOYE_ID=e.EMPLOYE_ID 
  ) 
select    *   from courrier_vehicule where TRACTEUR_NUM
 select top 10 * from remorque

 select   * from tarif  courrier where COURRIER_id=694585

 select top 10  * from utilisateur  where FULL_NAME like '%hicham%'    employe_id=11950 
 
 select * from agence_desr_v
 --update employe set AGENCE_COD=220
  where   MATRICULE='2441'

 select top 10 * from UTILISATEUR where agence_cod =200


 select * from UTILISATEUR_AGENCE where user_id=434


 select * from agence_desr_v
 where agence2_cod='220'

 select * from agence
 where agence_cod='300'


 select * from declaration_v c inner join ville v on c.ville2_cod=v.VILLE_COD
 where agence_cod='220' and date_saisie>='16/11/2016'


 select * from COURRIER_AGENCE
 where courrier_id=3745140

  



select * from declaration_v
where numero='B00964519'
3957309
select c.courrier_id
from courrier_ensemble ce, courrier c
where
c.courrier_id = ce.courrier_id and
c.port_typ = 'D' and
c.payement_cod = 'G' and
ce.ensemble_num = 'CL6501700652'

select * from COURRIER_AGENCE
where courrier_id in(
select ca.courrier_id from COURRIER_AGENCE ca inner join declaration_v c on c.courrier_id=ca.COURRIER_ID
where agence_cod='220' and INTER_TYP='A' and ca.INTER_ETA is null and c.date_saisie>='16/11/2016'
) and inter_typ='D'

select * from  COURRIER_VEHICULE [dbo].[COURRIER_VEHICULE]UTILISATEUR where FULL_NAME like 'admin'
execute dbo.ps_pre_compteclo
 
 ----.declaration affretement 
 -- ajouter le vehicule remorque et tracteur 
 
 SELECT 	DEC.NUMERO AS 'N_DECLARATION',
			DEC.DATE_SAISIE AS 'DATE_DECLARATION',
			D.VILLE_LIB AS 'VILLE_DEPART',
			A.VILLE_LIB AS 'VILLE_ARRIVEE',
			EMP.NOM + ' ' + EMP.PRENOM AS 'RAMASSEUR',
			EE.ENSEMBLE_NUM AS 'N_CARNET_LIVRAISON',
			convert(datetime, floor(convert (float, EE.ENSEMBLE_DAT))) AS 'DATE_CARNET_LIVRAISON'
			, cv.VEHICULE_NUM as 'Code_Remorque',
			cv.TRACTEUR_NUM as 'Code_Tracteur'
FROM 		
DECLARATION_V DEC
INNER 	JOIN VILLE D 
ON			D.VILLE_COD = DEC.VILLE1_COD
INNER 	JOIN VILLE A 
ON			A.VILLE_COD = DEC.VILLE2_COD
INNER		JOIN COURRIER_ENSEMBLE CE
ON 		DEC.COURRIER_ID = CE.COURRIER_ID  
left outer join COURRIER_VEHICULE cv on cv.ensemble_num=ce.ENSEMBLE_NUM
INNER		JOIN ENSEMBLE E
ON			CE.ENSEMBLE_NUM = E.ENSEMBLE_NUM AND E.ENSEMBLE_TYP IN ('CB', 'CG')
INNER		JOIN MANIPULE M
ON 		M.ENSEMBLE_NUM = E.ENSEMBLE_NUM
INNER		JOIN EMPLOYE EMP
ON 		EMP.EMPLOYE_ID = M.EMPLOYE_ID
LEFT 		JOIN (
			SELECT CEE.COURRIER_ID, ENSEMBLE.ENSEMBLE_NUM, ENSEMBLE.ENSEMBLE_DAT
			FROM COURRIER_ENSEMBLE CEE INNER JOIN ENSEMBLE 
			ON CEE.ENSEMBLE_NUM = ENSEMBLE.ENSEMBLE_NUM
			WHERE ENSEMBLE.ENSEMBLE_TYP = 'CL') EE
ON 		EE.COURRIER_ID = DEC.COURRIER_ID
WHERE		DEC.DATE_SAISIE BETWEEN '12/11/2016' AND '15/11/2016' AND
			DEC.COURRIER_TYP = 'L'  

			select * from COURRIER c join COURRIER_ENSEMBLE ce on c.courrier_id=ce.courrier_id
			join MANIPULE m on m.ENSEMBLE_NUM=ce.ENSEMBLE_NUM
			where c.courrier_num='B00744035' and manipulation_typ='RA'
 ----

  ---Donner accès à Mrs Boussedra bouchaib, hicham aitlhaj; el fenne mostapha , akiki abdelghani ; rafik ilyas et ben abdillah Nabil .
  --balance agée

  SELECT UTILISATEUR.USER_ID, UTILISATEUR.USER_LOGIN FROM UTILISATEUR INNER JOIN BA_DROITS
ON UTILISATEUR.USER_ID = BA_DROITS.USER_ID AND BA_DROITS.droit_id=1

   select * from BA_USER_RESPONSABLE where user_id=17
   select * from BA_DROITS where user_id=17
   --update BA_DROITS set valeur =1 where user_id=17 and droit_id=1
   --insert into BA_USER_RESPONSABLE values (17,'boussedra')
   insert into BA_DROITS values(393,1,1),(393,2,0),(393,3,0),(393,4,0),(393,5,0),(393,6,0)
   select * from UTILISATEUR u
   inner join EMPLOYE e on e.EMPLOYE_ID=u.EMPLOYE_ID 
    where  
	USER_LOGIN like '%z.alaoui%' 
	 select * from DROITS where user_id=414 order by MENU_ID desc
	--update UTILISATEUR set USER_PASSWD='a' where USER_ID=27
	select * from EMPLOYE where  nom like '%fen%'
   select * from UTILISATEUR u where EMPLOYE_ID in (select EMPLOYE_ID from EMPLOYE where MATRICULE= '2441') 
   update UTILISATEUR set AGENCE_COD=220 where EMPLOYE_ID=728
select * from EMPLOYE where DIRECTION_COD='03'
	--update  EMPLOYE set AGENCE_COD=800 where EMPLOYE_ID=11776  nom like '%baaz%' or PRENOM like '%mostapha'
	
select * from agence where AGENCE_COD=350
--salam, merci d'acitiviez la session de mr salah eddine el baz d'ait melloul ,et chenge la session de mr oumghar yassine d'ait melloul a l'agence laayoune
	------------------------------------------------------------------------
	--delete from DROITS where USER_ID =62
	--insert into DROITS
	--select * from VEXINITIALTEST.dbo.DROITS where USER_ID =62 and ACCES='O'
	--update DROITS set  ACCES='N' where  USER_ID =62 and MENU_ID in (
	--select MENU_ID from   VEXINITIALTEST.dbo.DROITS where USER_ID =62 and ACCES='N'  )

	--select 
	--(select * from  DROITS where USER_ID =62 and ACCES='N'  )
	
	--(select * from   VEXINITIALTEST.dbo.DROITS where USER_ID =62 and ACCES='N'  )
	--except
	--(select * from  VEXINITIALTEST.dbo.DROITS where USER_ID =62 and ACCES='N' and MENU_ID=97 ) 

select * from secteur where SECTEUR_LIB like'%tam%'
SECTEUR_COD=70005
select * from  est_attache where SECTEUR_COD =6005
insert into est_attache values (11912,60013,'R')
delete from est_attache where employe_id=11912
Select employe_id From est_attache  Where attache_typ = 'C'  )  and SORTIE_DAT is null
select * from agence where AGENCE_COD=200 800 705

select top 10 * from TRANSPORTE_ENSEMBLE
--update  transporte set  agence_valid=220
where VOYAGE_NUM='1001903929' 
select * from employe where matricule ='2558'
select * from employe where employe_id in (11912)

select top 10* from transporte
--update  transporte set  EMPLOYE_ID=12065 where VOYAGE_NUM='1001903929' 

--pour qu'on puisse valider les déclarations ,merci de changer l'agence valid, soit larache au lieu de casa pour les FR ci après :
-- - 1001605673 - 1001605628 - 2001600283 - 1001605660
--------------------------------
---merci de changer l'agence valid pour les FC ci aprés pour qu'on puisse les valider sur l'agence larache : 
-- FC1001605894 - FC1001605900 -FC2001600292   - FC2001600294  - FC1001605852 - FC1001605870 - FC1001605916 le besoin est urgent

select top 10 * from ENSEMBLE COURRIER_AGENCE

 

select  ce.COURRIER_ID ,e.agence_valid from COURRIER_ENSEMBLE ce inner join COURRIER c on c.COURRIER_ID=ce.COURRIER_ID 
inner join ENSEMBLE e on e.ENSEMBLE_NUM=ce.ENSEMBLE_NUM
inner join COURRIER_AGENCE ca on c.COURRIER_ID=ca.COURRIER_ID 
inner join TRANSPORTE_ENSEMBLE te on te.ENSEMBLE_NUM=ce.ENSEMBLE_NUM
inner join TRANSPORTE t on t.VOYAGE_NUM=te.VOYAGE_NUM
where ce.ENSEMBLE_NUM='FC1001605894' and ca.INTER_TYP='D'


select * from ENSEMBLE
--update ENSEMBLE set agence_valid=220
  where  ENSEMBLE_NUM in ('CG1101608461')

select * from courrier_retour_fonds_v where COURRIER_ID=3779424 

select * from declaration_v where numero='B00760797'
select * from ville where VILLE_LIB like '%bous%' AGENCE_COD=220

update ville set AGENCE_COD=220 where  VILLE_LIB like '%ouazz%'

select top 10* from ADRESSE   where ADRESSE_LIB like '%36 RUE DE L''ECRIVAIN AIN BORJA' CLIENT_COD='567' CLIENT_ID=4002066
select top 1* from client   where nom like '%NEUTRAL%'
select top 1* from courrier  where     COURRIER_NUM='B00489008'
select top 10* from client  where nom like '%concatec%'  numero='B00675601'

 -------------------------------------------------------------
---- update facture de declaration 
 -------------------------------------------------------------
 bonjour merci de résoudre le prob de dec N° B00821680 taxé à 50 dh à l¿édition de facture il remonte 81.16 dh
 -- Bonjour merci de régler le prob de déc B00877472 ; Le montant taxé (1075.52)n'est celui qui figure au facture (983.84) slts
 
 select top 10 * from produit where courrier_id=5809701
 select * from courrier where courrier_num in ('C01582572')

 --insert into produit(COURRIER_ID,PRODUIT_COD,MONTANT_HT,MONTANT_TAX) values(5809701,'TR',0,0)

	select * from produit where COURRIER_ID=   4101836 and PRODUIT_COD='PA'
	
	--delete from  produit where COURRIER_ID=   3881122 and PRODUIT_COD='PA'

	update produit set montant_tax=620 where  COURRIER_ID=   4101836 and PRODUIT_COD='PA'

	select top 1* from courrier_fa where  numero='B00963609' 
	--update courrier_fa set client2_id=3998747 where  COURRIER_ID=3751170

	select * from facture_souche
	--update facture_souche set CLIENT_ID=3998747
	 where FACTURE_ID=803182 --10016006912
	   

	 select * from client 
	 where nom In ('UNIMAGRI','MAGHREB CABLES')
	-- update client set nom='FANDY'
	  where CLIENT_id=3713516
	 
	 884870	1	10017010682	FA	2017-08-19 12:18:50.090	85,60	11,984	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL
	select top 10  * from facture
	--update facture  set   facture_tva=3.68,facture_ht=26.32
	 where  --FACTURE_NUM='15017002516'
	 FACTURE_ID=884870

select * from PRODUIT_FA where FACTURE_ID=884870 and produit_cod='TR'
	-- update PRODUIT_FA set  Montant_tax=3.68,montant_ht=26.32 where  FACTURE_ID=884870 and produit_cod='TR'
	
	--delete from PRODUIT_FA where FACTURE_ID=803182  and PRODUIT_COD='PA'
	 ---*/************************************

	 bonjour, merci de modifier lexpediteur de la declaration B00742751 mettre Soremar code 11427. cdt

select it.*,d.* from 
declaration_v d join INTERVIENT it on it.courrier_id=d.courrier_id 
Where d.numero = 'C01278868' AND it.INTERVENTION_TYP='DE'

update it set it.client_id=1844964 from 
declaration_v d join INTERVIENT it on it.courrier_id=d.courrier_id 
where it.INTERVENTION_TYP='DE' and d.numero='C01278868'


select * from FACTURE_SOUCHE where FACTURE_NUM='41017002465'
update FACTURE_SOUCHE set CLIENT_ID=2810593 where FACTURE_NUM='41017002465'

---***********************************************

 select * from produit_fa

--update produit_fa set montant_ht=770.43 ,MONTANT_TAX= 107.86
	 where produit_fa.facture_id=821415 and   PRODUIT_COD='P2'


	 select * from 
	 insert into produit_fa values(3922273,	821415,	1,	'P2' , 	'-27.33'	,'3.8',	'14.00')


select * from produit_fa where produit_fa.facture_id=793016 and   PRODUIT_COD='TR'


select * from taxes

	select top 10* from courrier_fa
	--update facture  set  FACTURE_HT=70.19 ,facture_tva=9.83
	 where COURRIER_ID=3783110
	 --733767	1	10016006912	FA	2016-05-31 09:16:01.600	125,41	17,5574	NULL	NULL	N	NULL	2016-06-27 11:34:41.690	NULL	NULL	NULL	NULL
 -------------------------------------------------------------
 -- change le n
 -------------------------------------------------------------
 --------------------------------merci de modifier le destinataire de dec n B00723927 à MARINA WEAR SPORT

 select t.*,cli.CLIENT_COD from  courrier c inner join INTERVIENT t on t.COURRIER_ID=c.COURRIER_ID
 join client cli on cli.CLIENT_ID=t.CLIENT_ID  where c.COURRIER_NUM='999C00212898' and t.INTERVENTION_TYP='DD' --4044089
 
  select * from INTERVIENT it join client c on c.client_id=it.client_id
  --update INTERVIENT set  ADRESSE_ID=235289--CLIENT_ID=3730943--  
  where INTERVENTION_TYP='DD' and COURRIER_ID in (
 SELECT  COURRIER_ID from courrier where COURRIER_NUM='999C00212898' ) 

 select * from client-- where nom LIKE 'sanidis%'
 update client set nom='SANDIS'
 where CLIENT_ID=5683210
 select * from client where nom like 'MARINA WEAR SPORT'
 select * from ADRESSE 
 --update client set nom='FANDY MAROC'
  where CLIENT_ID=415830

  --4002066-2443990
  -- pour crée une nouvelle agence il faux ajouter dans les tables( Agence ,  site_informatique,) et dans la fenetre de vex 'feuille de chargement '
  -- plus la fectation pour tout les responsable 
 -------------------------------------------------------------
 -------------------------------------------------------------
 -----------------------------------------------------
 --modification des taxes d'un declaration 
 ----------------------------------------------------- 
 select  *  from PRODUIT  where COURRIER_id  in (select courrier_id from courrier where courrier_num='B00658951') 
 --update   PRODUIT set MONTANT_HT=0, montant_tax=0 where not PRODUIT_COD='TR' and COURRIER_id  in (select courrier_id from courrier where courrier_num='B00658951') 

 -----------------------------------------------------
 ----------------------------------------------------- 

 select  e.* from COURRIER c inner join COURRIER_ENSEMBLE  ce on ce.COURRIER_ID=c.COURRIER_ID
 inner join ENSEMBLE e on e.ENSEMBLE_NUM= ce.ENSEMBLE_NUM where c.COURRIER_NUM='B00746570'  
 select * from  site_informatique where site_nom like '%larache%' agence where AGENCE_COD=150
 select * from agence
 --insert into site_informatique values(21,'LAAYOUNE',370,19)
 SELECT courrier_num, courrier_caisse.m_typ as 'type',
           caisse_centrale.journal_num as 'caisse_num',
           caisse_centrale.journal_dat as 'caisse_dat',
           agence.agence_lib as 'agence'    
        FROM courrier_caisse ,
           caisse_centrale ,
           agence     ,courrier
        WHERE courrier.COURRIER_ID=courrier_caisse.courrier_id and ( courrier_caisse.journal_id = caisse_centrale.journal_id ) and         
 ( caisse_centrale.agence_cod = agence.agence_cod ) and         
 ( ( courrier_caisse.courrier_id=3747172  ) ) 
  
 SELECT  COURRIER_ID from courrier where COURRIER_NUM='B00711915' 
 SELECT top 1  * from Courrier_caisse 
 SELECT top 1  * from CAISSE_CENTRALE
 SELECT top 1  * from  courrier_caisse where COURRIER_ID=3747172

   SELECT top 100  * from COMPTEUR_AGENCE_SAVE where AGENCE_COD=220


    insert into courrier_caisse  (courrier_id, m_typ, journal_id)  select  courrier.courrier_id, 'AR', 27529  from  
	courrier,  ensemble e,  courrier_livre_v lv  
	where  lv.ensemble_num = e.ensemble_num and  courrier.courrier_id = lv.courrier_id and  e.agence_cod ='150' 
	and  courrier.courrier_id not in  (select courrier_id from courrier_caisse where m_typ = 'AR' ) 

 select * from   
select cli.client_id, cli.client_cod, cli.nom, year (f.facture_dat) * 100 + month (f.facture_dat) as mois, sum (f.facture_ht) as ht from client cli, facture_souche f0, facture f where cli.client_id = f0.client_id and f0.facture_id = f.facture_id and f0.facture_typ = '1' and f.facture_typ = 'FA' and cli.client_typ = 'EC' and f.facture_dat between '01/01/2016' and '01/10/2016'
 group by cli.client_id, cli.client_cod, cli.nom, year (f.facture_dat) * 100 + month (f.facture_dat)

select top 10 * from tarif_client_v where client_id in (select client_id from client where  CLIENT_COD= 8291)
select top 10 * from tarif_taxes_v where tarif_num=16 and client_id in (select client_id from client where  CLIENT_COD= 8291)
select top 100 * from voyage_valide_tabl_bord_v  taxes_constantes where TARIF_NUM=16 and COURRIER_TYP='M'
update tarif set TYPE=3 where type=1 and TARIF_NUM=18

select top 100 * from tarif  where TARIF_NUM=18
 --insert into tarif values (18,1,'M',3,'14/12/2016','14/12/2016','14/12/2016')
 select * from 
[dbo].[TARIF_TRANCHE]where TARIF_NUM=18


insert into [TARIF_TRANCHE] values (18,1,)
[dbo].[TARIF_MESS_TRANCHE] 
[dbo].[TARIF_AGENCE]
select * from [TARIF_TRANCHE] 
insert into [TARIF_TRANCHE] values (18,	1	,	0	)
insert into [TARIF_TRANCHE] values (18,	2	,	06	)
insert into [TARIF_TRANCHE] values (18,	3	,	11	)
insert into [TARIF_TRANCHE] values (18,	4	,	16	)
insert into [TARIF_TRANCHE] values (18,	5	,	21	)
insert into [TARIF_TRANCHE] values (18,	6	,	26	)
insert into [TARIF_TRANCHE] values (18,	7	,	31	)
insert into [TARIF_TRANCHE] values (18,	8	,	36	)
insert into [TARIF_TRANCHE] values (18,	9	,	41	)
insert into [TARIF_TRANCHE] values (18,	10	,	46	)
insert into [TARIF_TRANCHE] values (18,	11	,	51	)
insert into [TARIF_TRANCHE] values (18,	12	,	61	)
insert into [TARIF_TRANCHE] values (18,	13	,	71	)
insert into [TARIF_TRANCHE] values (18,	14	,	81	)
insert into [TARIF_TRANCHE] values (18,	15	,	101	)
insert into [TARIF_TRANCHE] values (18,	16	,	126	)
insert into [TARIF_TRANCHE] values (18,	17	,	151	)
insert into [TARIF_TRANCHE] values (18,	18	,	176	)
insert into [TARIF_TRANCHE] values (18,	19	,	201	)
insert into [TARIF_TRANCHE] values (18,	20	,	251	)
insert into [TARIF_TRANCHE] values (18,	21	,	301	)
insert into [TARIF_TRANCHE] values (18,	22	,	351	)
insert into [TARIF_TRANCHE] values (18,	23	,	401	)
insert into [TARIF_TRANCHE] values (18,	24	,	451	)
insert into [TARIF_TRANCHE] values (18,	25	,	501	)
insert into [TARIF_TRANCHE] values (18,	26	,	551	)
insert into [TARIF_TRANCHE] values (18,	27	,	601	)
insert into [TARIF_TRANCHE] values (18,	28	,	651	)
insert into [TARIF_TRANCHE] values (18,	29	,	701	)
insert into [TARIF_TRANCHE] values (18,	30	,	751	)
insert into [TARIF_TRANCHE] values (18,	31	,	801	)
insert into [TARIF_TRANCHE] values (18,	32	,	851	)
insert into [TARIF_TRANCHE] values (18,	33	,	901	)
insert into [TARIF_TRANCHE] values (18,	34	,	951	)
insert into [TARIF_TRANCHE] values (18,	35	,	1000	)
insert into [TARIF_TRANCHE] values (18,	36	,	1250	)
insert into [TARIF_TRANCHE] values (18,	37	,	1500	)
insert into [TARIF_TRANCHE] values (18,	38	,	1750	)
insert into [TARIF_TRANCHE] values (18,	39	,	2000	)
insert into [TARIF_TRANCHE] values (18,	40	,	2250	)
select * from ville where VILLE_LIB like '%beni%'
SELECT  0 as 'inclus',
           pre_facture_v.client_id ,
           pre_facture_v.client_cod as 'client_cod',
           pre_facture_v.nom as 'nom',
           cli_fadr.secteur_cod ,
           agence.agence_lib ,
           pre_facli.ttc ,
           count(pre_facture_v.courrier_id) as 'courrier_nb',
           sum(pre_fa_prd.montant_ht) as 'total_ht',
           sum(pre_fa_prd.montant_tva) as 'total_tva',
           sum (pre_fa_prd.montant_ttc) as 'total_ttc',
           pre_facture_v.courrier_typ as 'courrier_typ',
           dbo.f_rabais (pre_facture_v.client_id,
 pre_facture_v.courrier_typ,
 sum (pre_fa_prd.montant_ht)) as taux_remise    
        FROM pre_facture_v ,
           pre_fa_prd ,
           cli_fadr ,
           agence ,
           pre_facli     
        WHERE ( pre_facture_v.courrier_id = pre_fa_prd.courrier_id ) and          ( pre_facture_v.courrier_typ = pre_fa_prd.courrier_typ ) 
		and          ( pre_facture_v.client_id = cli_fadr.client_id ) and          ( cli_fadr.agence_cod = agence.agence_cod )
		 and          ( pre_facture_v.client_id = pre_facli.client_id ) 
		 and          ( ( pre_facture_v.saisie_dat between '01/01/2015' and '01/10/2016' ) ) 
        GROUP BY pre_facture_v.client_id ,
           pre_facture_v.client_cod ,
           pre_facture_v.nom ,
           pre_facture_v.courrier_typ ,
           cli_fadr.secteur_cod ,
           agence.agence_lib ,
           pre_facli.ttc  ORDER BY agence.agence_lib          ASC,
           cli_fadr.secteur_cod          ASC,
           pre_facture_v.client_id          ASC,
           11         DESC  


select top 10 * from    ETATS where ETAT_ID=26   ETAT_NOM like '%d_ca_affrt_typ_detail%' or ETAT_IMPRIME like '%d_pre%'


SELECT      numero, code_expediteur, expediteur, montant_ht, ca.vehicule_typ, 
                      date_saisie,  veh_typ, 
                      fr, LV, vehicule_num, employe_id, 
                      MATRICULE, NOM, PRENOM,code_destinataire,
					  destinataire, depart, arrivee,Port_typ,
					   a1.AGENCE_LIB as 'région depart',
					    a2.AGENCE_LIB as 'région arrivee'
from
CA_AFF_GLOBAL_Union3 ca inner JOIN courrier c on ca.numero=c.COURRIER_NUM
join courrier_agence coag1 on coag1.COURRIER_ID=c.COURRIER_ID
join courrier_agence coag2 on coag2.COURRIER_ID=c.COURRIER_ID
join agence a1 on a1.agence_cod=coag1.AGENCE_COD
join agence a2 on a2.agence_cod=coag2.AGENCE_COD 
where 
coag1.inter_typ='D' and coag2.inter_typ='A' and 
ca.date_saisie between '01/11/2016' and '15/11/2016'

 case coag1.inter_typ
					   when 'A' then a1.AGENCE_LIB as 'depart' 
					   ELSE   a2.AGENCE_LIB as 'arr' 
					  end

select *
from courrier_agence where COURRIER_ID in (select courrier_id from courrier where courrier_num='b00598171')
select top 10   *,g.AGENCE_LIB from UTILISATEUR u inner join agence g on u.AGENCE_COD=g.AGENCE_COD where EMPLOYE_ID in (select EMPLOYE_ID from EMPLOYE where MATRICULE='2421')
select *    from  ville  


select l.*
from
livraison l join ensemble e on e.ENSEMBLE_NUM=l.ENSEMBLE_NUM
where
courrier_id  in (select courrier_id from courrier where courrier_num='B00805210')
select * from livraison where COURRIER_ID in (select courrier_id from courrier where courrier_num='B00805210')
select * from COURRIER_AGENCE
--update COURRIER_AGENCE set INTER_ETA=0 --1
 where  COURRIER_ID in (select courrier_id from courrier where courrier_num='B00805210') and INTER_TYP='A'
 select * from UTILISATEUR u join EMPLOYE e on e.EMPLOYE_ID=u.EMPLOYE_ID where e.MATRICULE='764' 
 --insert USER_ETIQ values(180,1)
 --delete USER_ETIQ where user_id=180
 select * from USER_ETIQ where user_id=180

 

select * from  GROUPES_ETATS where ETAT_IMPRIME like '%dw_tarif%'
insert into livraison(courrier_id,ENSEMBLE_NUM,ETAT_FINAL,ETAT_DAT) values(3643373,'CL3501600984',0,'06/12/2016')
select * from COURRIER_AGENCE where COURRIER_ID in(
select courrier_id from courrier where courrier_num='b00582217')
update COURRIER_AGENCE set AGENCE_COD=500 where COURRIER_ID=3637242 and INTER_TYP='D'

select * from declaration_v 
--
update courrier set COURRIER_ETA='A'
where courrier_num='b00582217' 

select top  10 INTER_TYP,* from COURRIER_AGENCE c join agence a on a.AGENCE_COD = c.Expedition_cod

select  count(*),a.AGENCE_LIB,d.courrier_typ from declaration_v d 
join COURRIER_AGENCE ca on ca.COURRIER_ID=d.courrier_id   
join agence a on a.AGENCE_COD =ca.AGENCE_COD  
---départ INTER_TYP='D'
where  INTER_TYP='D' and  cast(d.[date] as date) between '01/12/2016' and '31/12/2016' group by  a.AGENCE_LIB,d.courrier_typ order by 1 desc


select      * from   COURRIER_AGENCE 
--update COURRIER_AGENCE set INTER_ETA=0
 where INTER_TYP='A' and  COURRIER_id  in (select courrier_id from courrier where courrier_num='B00777704')

 
-- INTER_ETA=1  'B00777704')
 --a 220 null 
 -- D 350  1 
 SELECT  0 as 'inclus',
           declaration_v.courrier_id as 'courrier_id',
           declaration_v.numero as 'numero',
           declaration_v.date as 'date',
           declaration_v.colis as 'colis',
           declaration_v.expediteur as 'expediteur',
           declaration_v.destinataire as 'destinataire',
           declaration_v.port as 'port',
           declaration_v.payement as 'payement',
           declaration_v.palettes as 'palettes_th',
           0 as 'palettes_reel',
           courrier_retour_fonds_v.espece as 'espece',
           courrier_retour_fonds_v.cheque as 'cheque',
           courrier_retour_fonds_v.traite as 'traite',
           courrier_retour_fonds_v.bl as 'bl',
           0 as 'ttc_du',
           0 as affiche_ord    
FROM 		  courrier_agence ,
           declaration_v ,
           courrier_retour_fonds_v ,
           client     
--WHERE ( courrier_agence.courrier_id = declaration_v.courrier_id ) and          
--( declaration_v.courrier_id = courrier_retour_fonds_v.courrier_id ) and   
-- declaration_v.courrier_id   in (select courrier_id from courrier where courrier_num='B00731327') and        
--( declaration_v.client2_id = client.client_id )   and ( courrier_agence.agence_cod = '220' )
-- and  ( inter_typ = 'A' ) and ( inter_eta = '0' ) and ( courrier_eta = 'E' ) 


  
WHERE ( courrier_agence.courrier_id = declaration_v.courrier_id ) and          
( declaration_v.courrier_id = courrier_retour_fonds_v.courrier_id ) and     
 declaration_v.courrier_id   in (select courrier_id from courrier where courrier_num='B00731327') and       
( declaration_v.client2_id = client.client_id )   and  inter_typ = 'A' and      
 declaration_v.courrier_id in  (  select *  from  courrier_ensemble  where  courrier_ensemble.ensemble_num ='CL2201600006' ) 


select*
from 
dev_param_colonnes c, 
dev_parametrage p,
dev_param_user u
where 
c.table_id = p.table_id And
u.table_id = p.table_id And
u.col_id = c.col_id And
p.table_name = :table_name And
u.user_id = :log_user.user_id;




select * from UTILISATEUR

 select * from dev_param_user
 --update RETOUR_FONDS set montant=2150.69 --Fonds_Typ='CH'
 where Courrier_id in (select courrier_id from courrier where COURRIER_NUM='B00728526' )


 SELECT  consommation_calcule_consommation_etat.vehicule_num ,
           consommation_calcule_consommation_etat.marque ,
           consommation_calcule_consommation_etat.type_marque ,
           sum (consommation_calcule_consommation_etat.litrage) as 'litrage',
           sum (consommation_calcule_consommation_etat.montant) as 'montant',
           min(consommation_calcule_consommation_etat.compteur) as 'min_compteur',
           max(consommation_calcule_consommation_etat.compteur) as 'max_compteur',
           min(consommation_calcule_consommation_etat.premier) as 'premier',
           consommation_calcule_consommation_etat.agence_cod ,
           consommation_calcule_consommation_etat.agence_lib ,
           consommation_calcule_consommation_etat.agence_cod as 'agence'    
        FROM consommation_calcule_consommation_etat      
        WHERE ( consommation_calcule_consommation_etat.date_bon between '01/11/2016' and '30/11/2016' )  
        GROUP BY consommation_calcule_consommation_etat.vehicule_num ,
           consommation_calcule_consommation_etat.marque ,
           consommation_calcule_consommation_etat.type_marque ,
           consommation_calcule_consommation_etat.acquis_typ ,
           consommation_calcule_consommation_etat.agence_cod ,
           consommation_calcule_consommation_etat.agence_lib   




  SELECT   
           sum (consommation_calcule_consommation_etat.litrage) as 'litrage',
           sum (consommation_calcule_consommation_etat.montant) as 'montant',
           min(consommation_calcule_consommation_etat.compteur) as 'min_compteur',
           max(consommation_calcule_consommation_etat.compteur) as 'max_compteur',
		  

           min(consommation_calcule_consommation_etat.premier) as 'premier', 
           consommation_calcule_consommation_etat.agence_lib      
        FROM consommation_calcule_consommation_etat      
        WHERE ( consommation_calcule_consommation_etat.date_bon between '01/01/2016' and '30/01/2016' )  
        GROUP BY 

           consommation_calcule_consommation_etat.agence_lib 


		    max_compteur - min_compteur  
		  select  *   delete from TARIF_TRANCHE where tarif_num=18



		  select top 10 * from groupes_etats where GRP_ETAT_ID=46 ---Tableau de Bord Entretien
select top 10 * from ETATS where GRP_ETAT_ID=46 --dw_graphe_kilometrage


SELECT annee, mois,
convert(numeric(10, 2), sum( ecart) ) Total,agence
from
(
 SELECT year(bon.date_bon) annee, 
month(bon.date_bon) mois
,  max( bon.compteur) - min( bon.compteur)  as ecart,bon.agence
         FROM bon,   
         consultation_marques  
   WHERE ( bon.vehicule_num = consultation_marques.VEHICULE_NUM ) and  
         ( ( bon.date_bon between '01/01/2015' and '15/01/2016' ) )   
GROUP BY year(bon.date_bon), 
month(bon.date_bon),
bon.vehicule_num,bon.agence
) a
group by annee , 
mois, agence


select top 10 * from CAISSE_DEPENSES where JOURNAL_DAT between '15/12/2016' and '19/12/2016' and AGENCE_COD=100 -- JOURNAL_NUM='100160597'

select top 10 * from FACTURE where FACTURE_NUM='10016013865'
--update FACTURE set FACTURE_HT=3.5 , FACTURE_TVA=25
where FACTURE_NUM='10016013865'

select * from Etats where grp_etat_id =3 

SELECT  1 as inclus,
           declaration_v.courrier_id as 'courrier_id',
           agence.agence_lib as 'Agence',
           declaration_v.numero as 'Numero',
           declaration_v.date as 'Date',
           declaration_v.code_expediteur as 'Code1',
           declaration_v.expediteur as 'Expediteur',
           declaration_v.code_destinataire as 'Code2',
           declaration_v.destinataire as 'destinataire',
           declaration_v.colis as 'Colis',
           courrier_montants_v.montant_ttc as 'Montant_ttc',
           courrier_employe_v.employe as 'Ramasseur'    
        FROM agence ,
           courrier_agence ,
           declaration_v ,
           courrier_montants_v ,
           courrier_employe_v     
        WHERE ( agence.agence_cod = courrier_agence.agence_cod ) 
		and          ( courrier_agence.courrier_id = declaration_v.courrier_id ) 
		and          ( declaration_v.courrier_id = courrier_montants_v.courrier_id ) 
		and          ( declaration_v.courrier_id = courrier_employe_v.courrier_id )
		 and          ( ( declaration_v.date_saisie between '12/12/2016' and '15/12/2016' ) 
		 and          ( courrier_agence.agence_cod = 200 ) And          ( courrier_agence.inter_typ = 'D' )
		  And          ( declaration_v.port = 'P' ) and          ( declaration_v.payement = 'G' ) 
		  and          ( declaration_v.service = '0' ) and          ( declaration_v.courrier_id 
		  not in (  SELECT courrier_caisse.courrier_id      FROM courrier_caisse      WHERE ( courrier_caisse.m_typ = 'TR' )  )) and
		  ( courrier_employe_v.manipulation_typ = 'RA' ) and    
		    ( declaration_v.complement is null ) )  
			and declaration_v.courrier_id not in (  SELECT courrier_retour_v.courrier_id      FROM courrier_retour_v   ) and courrier_montants_v.montant_ttc>0  

			 

select * from  UTILISATEUR  where USER_LOGIN like '%asmaa%'-- USER_ID='11911'
 COURRIER_AGENCE where COURRIER_ID in (select courrier_id from courrier where COURRIER_NUM='B0312397')

 select * from ETATS where grp_etat_id=3
 ---------------------------------------------------
 select top 10 Payement_cod from courrier where courrier_num='B00761078' 
 select *  from client  where CLIENT_COD=10152       
--update COURRIER set Payement_cod='G' where  courrier_num='B00761078' 

 
------------------------------------------------------------


 


select * from ville 
--update ville set AGENCE_COD=410
where ville_lib like '%targui%'
select * from agence where AGENCE_LIB like '%nador'
 
 select payement,* from declaration_v where numero='B00761084'
 
 select * from [dbo].[TARIF_AGENCE]
 select * from [dbo].[TARIF_BASE]
 select * from [dbo].[TARIF_COURSE]
 select * from [dbo].[TARIF_COURSE_CLIENT]
 select * from [dbo].[TARIF_LOGI_CLIENT]
 select * from [dbo].[TARIF_MESS_CLIENT]
 select * from [dbo].[TARIF_MESS_COLIS]
 select * from [dbo].[TARIF_MESS_FORFAIT]
 select * from [dbo].[TARIF_MESS_TRAN_VOLUME]
 select * from [dbo].[TARIF_MESS_TRANCHE]
 select * from [dbo].[TARIF_MESS_UNITE]
 select * from [dbo].[TARIF_MESSAGERIE]
 select * from [dbo].[TARIF_TRANCHE]
 select * from [dbo].[tarif_pal]
 select * from [dbo].[TARIF_PALETTES]
 select * from [dbo].[TARIF_PALETTES_CLIENT]
 select * from [dbo].[TARIF_TMP]
 select * from [dbo].[TARIF_TRANCHE_VOLUME]
 select * from [dbo].[TAXES]
 select * from [dbo].[TAXES_CONST_CLIENT]
 select * from [dbo].[TAXES_CONSTANTES]
 select * from [dbo].[TAXES_CONSTANTES_SAVE] 

----------------------------------------------------------------

slec

----------------------------------------------------------------
----------------------------------------------------------------
--toutes les expéditions et arrivages (Livrées) du compte DBM (code client :3591) en 2016 .
--NUM-EXP	DATE		DESTINATAIRE	VILLE1	VILLE2	COLIS	STATUT (livré)
--1111111	01/02/2016	DBM				FES		CASA	1		LIVRE

----------------------------------------------------------------
select d.numero as 'NUM-EXP',d.date_saisie,d.destinataire ,d.expediteur
 ,v1.VILLE_LIB as 'ville 1',v2.VILLE_LIB  as 'ville 2' ,d.colis,'STATUT (livré)'
from declaration_v d join LIVRAISON l on l.COURRIER_ID=d.courrier_id 
join VILLE v1 on d.ville1_cod =v1.VILLE_COD
join VILLE v2 on d.ville2_cod=v2.VILLE_COD
where  l.ETAT_FINAL=0 and 
   year(d.date_saisie)=2016 and 
( d.client1_id=3591 or d.client2_id=3591 ) 

select * from client where CLIENT_ID=3591
 ------------------------------------------------------------------------------------
 --besoin CA des comptes ''en compte oui '' paramétré au tarif 10 sur les factures des trois derniers mois
 ------------------------------------------------------------------------------------


 select  cl.client_id,cl.NOM  ,   sum(f.FACTURE_HT)  

 from CLIENT_TARIF ct 
 join client cl on cl.CLIENT_ID=ct.CLIENT_ID
 join facture_souche f0 on cl.client_id = f0.client_id 
 join facture f on f0.facture_id = f.facture_id 
 
 where TARIF_NUM=10 and f0.COURRIER_TYP='M' and ct.COURRIER_TYP='M' and cl.CLIENT_TYP='EC' and CAST( f.FACTURE_DAT as date) between '01/11/2016' and '30/11/2016'
 group by cl.client_id, cl.NOM 
 
  
  



 select sum(montant_ht) as ca,  sum(poids) as poids,count(courrier_id) as nbr,STDEV (poids) as e_poids,STDEV (courrier_id) as e_dec from (
select c.courrier_id,c.poids, t.montant_ht, case when c.port='G' then c.client1_id else c.client2_id end as payeur_id 
from	declaration_v c inner join courrier_tr_v t on t.courrier_id = c.courrier_id
						inner join ville v on v.ville_cod = c.ville1_cod and v.agence_cod='100'
where	c.courrier_typ='M' and year(c.date_saisie)=2015
)ta	
where payeur_id not in(select client_id from client_forfait)

 select c.numero,
             convert(varchar,c.date_saisie,103) as date_declaration,
             case c.payement  when 'G' then 'NON' when 'C' then 'OUI' end as declaration_en_compte ,
             m.montant_ht as prix_ht,
             c.colis,
             c.poids,
             case clt.client_typ  when 'PA' then 'Passager' when 'EC' then 'En Compte' end as type_client,
             clt.client_cod,
             clt.nom as client
from client_tarif ct inner join client clt on ct.client_id=clt.client_id inner join declaration_v c on clt.client_id = c.payeur_id
inner join courrier_montants_v m on c.courrier_id = m.courrier_id
where tarif_num='14' and c.courrier_typ='M' and cast(c.date_saisie as date) between  '01/08/2016' and '11/11/2016' and ct.courrier_typ='M'
order by 2

----------------------------------------------------------------
----------------------------------------------------------------
-- modifier date versements N° 70271 au 16/11/16 et 72070 au 25/11/2016
--modifier date de versement des versements N° 55877 et 55879 au 01/04/2017
select * from CLIENT_VERSEMENT where VERS_NUM=70265   
update CLIENT_VERSEMENT set vers_dat='01/04/2017' where VERS_NUM=55879 
--55877	2017-02-01 00:00:00.000	2260355	129016,96	TRA	WAFA  		2013-06-01 00:00:00.000	O	NULL	NULL	NULL	NULL	NULL	48	NULL	NULL	NULL	1083	NULL
--55879	2017-02-01 00:00:00.000	2260355	149402,35	TRA	WAFA  		2013-05-10 00:00:00.000	N	NULL	NULL	NULL	NULL	NULL	48	NULL	NULL	NULL	1083	NULL


----------------------------------------------------------------
----------------------------------------------------------------
----------------------------------------------------------------
--CACA
----------------------------------------------------------------

SELECT client_id, year( courrier.saisie_dat) ,
          
          sum( produit_v.montant_ht    ) as 'CA'
        FROM intervient ,
           courrier ,
           produit_v     
        WHERE ( courrier.courrier_id = intervient.courrier_id ) 
		and          ( courrier.courrier_id = produit_v.courrier_id ) 
		and          ( ( datediff (year, courrier.saisie_dat, getdate () )=1 ) 
		and          ( intervient.client_id in (select client_id from client where CLIENT_COD=9566 )) ) 
		 group by year( courrier.saisie_dat),client_id
		 
----------------------------------------------------------------
----------------------------------------------------------------
select  top 10 cli.CLIENT_ID,
cli.NOM,ct.prix_ht,ct.TAXES_NUM   from client_tarif ct join client cli on cli.CLIENT_ID=ct.CLIENT_ID 

where TARIF_NUM=10 and COURRIER_TYP='M' and cli.CLIENT_TYP='EC'
order by cli.CLIENT_ID

----------------------------------------------------------------
---Les  comptes en compte oui avec code client bénéficiant du tarif forfaitaire N° 10 avec Mt du forfait et exonérations accordées
----------------------------------------------------------------


SELECT    cli.CLIENT_COD as 'code client ',
cli.NOM as 'Client',ct.prix_ht as 'Forfait',ct.TAXES_NUM as 'Taxes',(SELECT  sum( produit_v.montant_ht    ) as 'CA'
        FROM intervient ,
           courrier ,
           produit_v     
        WHERE ( courrier.courrier_id = intervient.courrier_id ) 
		and          ( courrier.courrier_id = produit_v.courrier_id ) 
		and          ( ( datediff (year, courrier.saisie_dat, getdate () ) =2 ) 
		and          ( intervient.client_id =cli.CLIENT_ID) ) 
		 group by year( courrier.saisie_dat)
		 ) as '2014' ,(SELECT  sum( produit_v.montant_ht    ) as 'CA'
        FROM intervient ,
           courrier ,
           produit_v     
        WHERE ( courrier.courrier_id = intervient.courrier_id ) 
		and          ( courrier.courrier_id = produit_v.courrier_id ) 
		and          ( ( datediff (year, courrier.saisie_dat, getdate () ) =1 ) 
		and          ( intervient.client_id =cli.CLIENT_ID) )  
		 group by year( courrier.saisie_dat)
		 ) as '2015' ,
		 (SELECT  sum( produit_v.montant_ht    ) as 'CA'
        FROM intervient ,
           courrier ,
           produit_v     
        WHERE ( courrier.courrier_id = intervient.courrier_id ) 
		and          ( courrier.courrier_id = produit_v.courrier_id ) 
		and          ( ( datediff (year, courrier.saisie_dat, getdate () ) =0 ) 
		and          ( intervient.client_id =cli.CLIENT_ID) ) 
		 group by year( courrier.saisie_dat)
		 ) as '2016'
		 
		 
		  from client_tarif ct join client cli on cli.CLIENT_ID=ct.CLIENT_ID 

where TARIF_NUM=10 and COURRIER_TYP='M' and cli.CLIENT_TYP='EC' 
 
order by cli.CLIENT_ID 
----------------------------------------------------------------
Bonjour, Merci de modifier le numéro des avoirs cités ci-dessous, en les mettant au 31/12/2016, et en respectant la dernière numérotation des avoirs : 
- Avoir n°15017000135 - Avoir n°15017000136 - Avoir n°15017000137 - Avoir n°15017000138 - Avoir n°15017000139 - Avoir n°15017000140 -
------------------------------------------------------------------
éaffecter lavoir N° 15016002612 à la facture N° 15016005216 au lieu de la facture 15016001292


--affecter lavoir N° 15016002611 sur la facture N° 15016003679 au lieu de la facture N° 15016002584
--éaffecter lavoir N° 15016002612 à la facture N° 15016005216 au lieu de la facture 15016001292
		
select * from FACTURE_SOUCHE fs join FACTURE f on f.FACTURE_ID=fs.FACTURE_ID where f.FACTURE_NUM='15019000061' and f.FACTURE_TYP='AV'
--update FACTURE_SOUCHE set FACTURE_NUM ='15016005216' where FACTURE_ID=712778
ssss
--730122	2	15016002611	AV	2016-11-16 16:17:17.117	-6578,95	-921,053	NULL	NULL	N	1	2016-12-23 17:41:41.923	NULL	NULL	NULL	NULL
--730918	1	15016002611	FA	2016-05-18 20:28:34.590	71,19	9,9666	NULL	NULL	N	NULL	2016-06-27 11:34:41.690	NULL	NULL	NULL	NULL
--742362	1	15016003679	FA	2016-06-15 00:00:00.000	9032,89	1264,6046	NULL	NULL	N	9	2016-07-22 17:36:51.807	NULL	NULL	NULL	NULL
--730122	1	15016002584	FA	2016-04-30 00:00:00.000	12461,802	1744,6522	NULL	NULL	N	2	2016-05-25 14:37:30.337	NULL	NULL	NULL	NULL
select top 10 * from facture where --FACTURE_ID=730122 
--FACTURE_NUM like '150160%' order by FACTURE_NUM desc --15016007957
FACTURE_NUM like '15016007960' order by FACTURE_NUM desc --15016007956


--730122	2	15016002611	AV	2016-11-16 16:17:17.117	-6578,95	-921,053	NULL	NULL	N	1	2016-12-23 17:41:41.923	NULL	NULL	NULL	NULL
select top 10 * from facture
--update facture set FACTURE_HT=-700,FACTURE_TVA=-140
where FACTURE_NUM in (15019004373,15019004369) and FACTURE_TYP='FA'

 
select * from COMPTEUR_AGENCE where AGENCE_COD=150 and COMPTEUR_CD='AV'
----------------------------------------------------------------
----------------------------------------------------------------
----------------------------------------------------------------
-- tarif par client 
----------------------------------------------------------------
SELECT  client_tarif.client_id ,
           client_tarif.courrier_typ ,
           client_tarif.tarif_typ ,
           client_tarif.tarif_num ,
           client_tarif.prix_ht ,-- le forfait 
           client_tarif.classes_nb ,
           courrier_typ as 'type',
           client_tarif.taxes_num ,
           client_tarif.taxes_typ ,
           client_tarif.tarif_base ,
           client_tarif.toute_dest ,
           0 as b1,
           0 as b2,
           client_tarif.poids_colis,
				client_tarif.kg_supp     
        FROM client_tarif      
        WHERE ( client_tarif.client_id = 17 )   
----------------------------------------------------------------
-- change la date du voyage 
------------------------------------------------------------------
--select * from   VEXINITIAL.dbo .COMPTEUR_AGENCE
--  where agence_cod=150

--update VEXINITIAL.dbo .
--COMPTEUR_AGENCE set COMPTEUR2= 2921  where  agence_cod=150 and COMPTEUR_CD='AV'
--select  top 10* from facture order by 5 desc 74427

 merci bien de rectifie la date de voyages de ces expéditions : -   -  - B00746181 -  - B00710475 - B00710457
 merci bien de rectifie la date de voyages de ces expéditions en souffrance: 
 --                B01078075
 
 select e.* from ensemble  e join COURRIER_ENSEMBLE  ce on e.ENSEMBLE_NUM=ce.ENSEMBLE_NUM join   courrier c on c.courrier_id=ce.courrier_id where e.ENSEMBLE_TYP='FC' and  c. courrier_id in (select  courrier_id from declaration_v
 where numero='C00011225')       

select  * from ensemble
--update ensemble set ensemble_dat='31/10/2017 19:42:13.723'
where ensemble_num = 'FC1001705819'  

select * from VEXINITIALBACKUP2 s_code etats where etats.grp_etat_id=16

select  * from courrier where courrier_num='B00816057'
B00760798 -  

FC1101600432  20/12/ jad
FC1001606466  20/12/2016 20:39:56 casa
B00760797 
FC1101600432 rabat 
FC1001606466 casa
----------------------------------------------------------------
----------------------------------------------------------------
 

  SELECT c1.client_id,c1.client_cod,c1.nom,

(select count (*) from declaration_v d where  c1.client_id=d.client1_id) as 'Total Expéditions'

    FROM  client c1  join exonere_taxe ex on c1.client_id=ex.client_id 
join declaration_v d on c1.client_id=d.client1_id
join  client c2   on c2.client_id=d.client2_id
join client_parametres cp on c2.client_id=cp.client_id
where surtaxe = 1 and  ex.produit_cod='LGS' and d.date_saisie between '01/01/2017' and '01/02/2017'
group by c1.client_id,c1.client_cod,c1.nom
order by 4 asc

--select  top 10 cli.CLIENT_ID,
--cli.NOM,ct.prix_ht,ct.TAXES_NUM 
--INTO #temp10
--  from client_tarif ct join client cli on cli.CLIENT_ID=ct.CLIENT_ID 

--where TARIF_NUM=10 and COURRIER_TYP='M' and cli.CLIENT_TYP='EC'
--order by cli.CLIENT_ID


--declare @index int
--declare @count int

--select @count = count(*) from #temp10
--set @index = 1

--declare @CLIENT_ID int
--declare @NOM varchar
--declare @prix_ht decimal
--declare @TAXES_NUM int 

-- WHILE EXISTS (SELECT * FROM #Temp10)
--  BEGIN 
  
--  select  top 1 @CLIENT_ID=CLIENT_ID  ,
--  @NOM=NOM  ,
--  @prix_ht=prix_ht  ,
--  @TAXES_NUM=TAXES_NUM   
--  from #temp10 

--print  @CLIENT_ID;

--  -- do your logic here

--  set @index= @index + 1
--end

--drop table #temp10




 


--------------------------------------------------
select l.COURRIER_ID from LIVRAISON l join COURRIER c on c.COURRIER_ID=l.COURRIER_ID  where l.ENSEMBLE_NUM='CL1001610921'-- l join ENSEMBLE e on l.en

select  * from courrier_caisse co_c  --join CAISSE_CENTRALE ca_c on ca_c.JOURNAL_ID=co_c.JOURNAL_ID 
 where COURRIER_ID in (select l.COURRIER_ID from LIVRAISON l join COURRIER c on c.COURRIER_ID=l.COURRIER_ID  where l.ENSEMBLE_NUM='CL1001610934')-- (select courrier_id from COURRIER where courrier_num='B0165944')

select * from CAISSE_CENTRALE where journal_id=3773020
select * from CAISSE_CENTRALE where journal_id=3772529
select * from CAISSE_CENTRALE where journal_id=34171
select * from agence where AGENCE_COD=350

select *
--delete  from LIVRAISON where COURRIER_ID in (select  courrier_id from courrier where COURRIER_NUM='B00731473')

--3775659	CL1101600526    	2	2016-12-20 19:50:32.407	NULL	NULL	999B00731473    	NULL	NULL	NULL	NULL	NULL
etats where grp_etat_id=38


select top 10 * from 
Exoneration

select top 10 * from 
taxes_constantes_v


tarif where TARIF_NUM=10 

 
 select *   from   privilege_compte

select d.ville1_cod,d.ville2_cod,* 

from courrier_agence cg
join agence ag on cg.AGENCE_COD=ag.AGENCE_COD
join declaration_v d on d.COURRIER_ID=cg.COURRIER_ID

 where d.numero='b0312397'

 select count (*) from declaration_v where year(date_saisie)=2016

 -- select l'agence d'une ville de depart 
 select g.agence_cod from AGENCE g
 join declaration_v d on d.ville1_cod=g.AGENCE_COD 
 --where 
 insert into utilisateur 
select user_id, GROUP_ID, USER_LOGIN, FULL_NAME, E_MAIL, USER_PASSWD, VEROU, PASSWD_EXPIRE, DATE_EXPIRE, DATE_CREATE, ID_CREATE, AGENCE_COD, USER_COMMENT, EMPLOYE_ID

 
 from UTILISATEUR where user_login like '%h.bentahri%'
 --452	13	h.bentahri                    	NULL		hb065970242                   	N	O	2017-01-28 00:00:00.000	2016-10-28 00:00:00.000	1	200 		11932
 
 select   * from EMPLOYE where  MATRICULE='2451'-- prenom like '%RADOUANE%'

 update UTILISATEUR set USER_PASSWD='11111111111111111' ,user_login='h.bentahri' where user_login like '%h.bentahri%' and USER_ID=457

 select * from DROITS where USER_ID=457
 insert into  DROITS
 select MENU_id, 457,ACCes from DROITS where USER_ID=452

 select top 10 *  from delete from  UTILISATEUR  where USER_ID='457' user_login like '%h.bentahri%'


 select * from employe where EMPLOYE_ID=11932
USER_ID, GROUP_ID, USER_LOGIN, FULL_NAME, E_MAIL, USER_PASSWD, VEROU, PASSWD_EXPIRE, DATE_EXPIRE, DATE_CREATE, ID_CREATE, AGENCE_COD, USER_COMMENT, EMPLOYE_ID
452	13	h.bentahri                    	NULL		hb065970242                   	N	O	2017-01-28 00:00:00.000	2016-10-28 00:00:00.000	1	200 		11932

--- les livraision des GMS

select   d.destinataire,(SELECT  sum( produit_v.montant_ht    ) as 'CA'
        FROM intervient ,
           courrier ,
           produit_v     
        WHERE ( courrier.courrier_id = intervient.courrier_id ) 
		and          ( courrier.courrier_id = produit_v.courrier_id ) 
		and          ( ( datediff (year, courrier.saisie_dat, getdate () ) =2 ) 
		and          ( intervient.client_id =cli.CLIENT_ID) ) 
		 group by year( courrier.saisie_dat)
		 ) as '2014' ,(SELECT  sum( produit_v.montant_ht    ) as 'CA'
        FROM intervient ,
           courrier ,
           produit_v     
        WHERE ( courrier.courrier_id = intervient.courrier_id ) 
		and          ( courrier.courrier_id = produit_v.courrier_id ) 
		and          ( ( datediff (year, courrier.saisie_dat, getdate () ) =1 ) 
		and          ( intervient.client_id =cli.CLIENT_ID) )  
		 group by year( courrier.saisie_dat)
		 ) as '2015' ,
		 (SELECT  sum( produit_v.montant_ht    ) as 'CA'
        FROM intervient ,
           courrier ,
           produit_v     
        WHERE ( courrier.courrier_id = intervient.courrier_id ) 
		and          ( courrier.courrier_id = produit_v.courrier_id ) 
		and          ( ( datediff (year, courrier.saisie_dat, getdate () ) =0 ) 
		and          ( intervient.client_id =d.code_destinataire) ) 
		 group by year( courrier.saisie_dat)
		 ) as '2016'
		  from declaration_v d
join LIVRAISON l on l. COURRIER_ID= d.courrier_id 
	where lower(d.destinataire) in('Acima','marjane','digibay','carrefour','bricoma','aswak assalam','biougnache','kitea','m.bricolage'
,'maxi lv','cosmos','maxi lv') 

 and 
l.etat_final=0  
group by d.destinataire

---------------------------
select top 10* from courrier d left join facture f on f.facture_id=d.facture_id 

SELECT  
          sum( isnull (produit.montant_ht, 0))+
          sum( isnull (produit.montant_tax, 0)) as 'montant_tax' 
        FROM  
           produit      
        WHERE     ( ( produit.courrier_id = 305222  ) )  


select rtrim(Ltrim(d.destinataire)), count(distinct(numero)) as 'Nombre de declaration' , year(d.date_saisie) as 'DATE',
sum(d.colis) 'Colis',sum(d.poids) as 'poids' ,sum( isnull (p.montant_ht, 0))+ sum( isnull (p.montant_tax, 0)) as 'montant' ,
ag.AGENCE_LIB as 'Agence'
 from    declaration_v d 
 join produit p on p.COURRIER_ID=d.courrier_id
 join AGENCE ag on d.ville2_cod=ag.agence_cod
join LIVRAISON l on l. COURRIER_ID= d.COURRIER_ID 
	where (lower(d.destinataire) like 'acima%' 
	or lower(d.destinataire) like 'marj%'
	 or lower(d.destinataire) like 'digi%'
	 or lower(d.destinataire) like '%carref%'
	 or lower(d.destinataire) like 'bricoma%'
	-- or lower(d.destinataire) like '%aswak assalam%'
	 or lower(d.destinataire) like 'aswak%'
	 or lower(d.destinataire) like 'bioug%'
	 or lower(d.destinataire) like 'kit%'
	 or lower(d.destinataire) like '%bricolage%'
	 or lower(d.destinataire) like '%maxi%'
	 or lower(d.destinataire) like '%cosmos%'
	  )

 and 
l.etat_final=0 and  ( datediff (year, d.date_saisie, getdate () ) between 0 and 2 ) 
group by d.destinataire   ,year(d.date_saisie),ag.AGENCE_LIB
order by d.destinataire   



---------------------------------------------------


select d.destinataire,  d.numero  'declaration' , year(d.date_saisie) as 'DATE',
d.colis 'Colis',d.poids as 'poids' ,sum(isnull (p.montant_ht, 0) + isnull (p.montant_tax, 0)) as 'tax' ,
ag.AGENCE_LIB as 'Agence'
 from    declaration_v d 
 join produit p on p.COURRIER_ID=d.courrier_id
 join AGENCE ag on d.ville2_cod=ag.agence_cod
join LIVRAISON l on l. COURRIER_ID= d.COURRIER_ID 
join client cli on d.code_destinataire=cli.CLIENT_ID 
	where
  d.destinataire  like 'marj%' and  year(d.date_saisie)=2016   and ag.AGENCE_LIB='RABAT'
   and 
l.etat_final=0 and  ( datediff (year, d.date_saisie, getdate () ) between 0 and 2 )
and    COURRIER_TYP='M' and cli.CLIENT_TYP='PA' 
  
group by numero,d.destinataire,year(d.date_saisie),d.colis,d.poids,ag.AGENCE_LIB
---------------------------------------------
SELECT	taxes.produit_lib as 'taxe',
      	sum(isnull (produit.montant_ht, 0)) as 'montant_ht',
        	sum(isnull (produit.montant_tax, 0)) as 'montant_tax',
			sum(isnull (produit.montant_ht + produit.montant_tax, 0))as 'montant_ttc',
			count(courrier.courrier_id) as 'Nbr_Dec',
			(select count(declaration_v.courrier_id) 
	 		from declaration_v, courrier_agence, client 
	 		where date_saisie between'01/01/2016' and '31/12/2016' and (declaration_v.courrier_typ= 'M') and
     	 	declaration_v.courrier_id= courrier_agence.courrier_id and 
         courrier_agence.inter_typ='D' /*and 
         courrier_agence.agence_cod= 600*/ and declaration_v.client1_id = client.client_id /*and
		client.client_typ like '%PA%'*/) as 'Total_Expeditions'
FROM 		taxes ,
         produit ,
         declaration_v courrier, 
			courrier_agence,
		   client     
WHERE ( taxes.produit_cod = produit.produit_cod ) and          
		( courrier.courrier_id = produit.courrier_id ) and  
		(courrier.courrier_typ= 'M') and
      ( ( courrier.date_saisie between'01/01/2016' and '31/12/2016' ) ) and 
		(courrier.courrier_id= courrier_agence.courrier_id and 
		courrier_agence.inter_typ='D' /*and 
		courrier_agence.agence_cod like '%600%' */) and courrier.client1_id = client.client_id /*and
		client.client_typ like '%PA%'*/
group by  taxes.produit_lib
order by taxe desc

select top 20 * from employe order by 1 desc where  user_login like '%tahri%'
select * from employe where employe_id=11932
-------------------------------------------------
 
SELECT * from client where nom like in ('%marjane%', '%electro%')
SELECT    cli.CLIENT_COD as 'code client ',
cli.NOM as 'Client',ct.prix_ht as 'Forfait',ct.TAXES_NUM as 'Taxes',(SELECT  sum( produit_v.montant_ht    ) as 'CA'
        FROM intervient ,
           courrier ,
           produit_v     
        WHERE ( courrier.courrier_id = intervient.courrier_id ) 
		and          ( courrier.courrier_id = produit_v.courrier_id ) 
		and          ( ( datediff (year, courrier.saisie_dat, getdate () ) =2 ) 
		and          ( intervient.client_id =cli.CLIENT_ID) ) 
		 group by year( courrier.saisie_dat)
		 ) as '2014' ,(SELECT  sum( produit_v.montant_ht    ) as 'CA'
        FROM intervient ,
           courrier ,
           produit_v     
        WHERE ( courrier.courrier_id = intervient.courrier_id ) 
		and          ( courrier.courrier_id = produit_v.courrier_id ) 
		and          ( ( datediff (year, courrier.saisie_dat, getdate () ) =1 ) 
		and          ( intervient.client_id =cli.CLIENT_ID) )  
		 group by year( courrier.saisie_dat)
		 ) as '2015' ,
		 (SELECT  sum( produit_v.montant_ht    ) as 'CA'
        FROM intervient ,
           courrier ,
           produit_v     
        WHERE ( courrier.courrier_id = intervient.courrier_id ) 
		and          ( courrier.courrier_id = produit_v.courrier_id ) 
		and          ( ( datediff (year, courrier.saisie_dat, getdate () ) =0 ) 
		and          ( intervient.client_id =cli.CLIENT_ID) ) 
		 group by year( courrier.saisie_dat)
		 ) as '2016'
		 
		 
		  from client_tarif ct join client cli on cli.CLIENT_ID=ct.CLIENT_ID 

where TARIF_NUM=10 and COURRIER_TYP='M' and cli.CLIENT_TYP='EC' 
 
order by cli.CLIENT_ID 


SELECT  facture_a.facture_id ,
           facture_a.facture_ind ,
           facture_a.facture_num ,
           facture_a.facture_typ ,
           facture_a.facture_dat ,
           facture_a.facture_ht ,
           facture_a.facture_tva ,
           facture_a.regle ,
           facture_souche.facture_num as 'souche_num',
           facture_souche.facture_dat as 'souche_dat',
           facture_souche.courrier_typ as 'f_typ',
           client.client_id as 'client_id',
           client.client_cod as 'client_cod',
           client.nom as 'nom',
           (select max (facture_dat) 
        from facture 
        where facture_typ = 'AV') as 'max_dat',
           facture_b.facture_ht as 'souche_ht',
           facture_b.facture_tva as 'souche_tva',
           0.0000 as 'facture_solde',
           0 - facture_a.facture_ht as 'ht_abs',
           year (facture_a.facture_dat) as 'annee'    FROM facture facture_a ,
           facture_souche ,
           client ,
           facture facture_b     WHERE ( facture_a.facture_id = facture_souche.facture_id ) 
		   and          ( facture_souche.client_id = client.client_id ) 
		   and          ( facture_souche.facture_id = facture_b.facture_id ) 
		   and          ( ( facture_a.facture_id = :id_facture ) 
		   and          ( facture_a.facture_ind = :ind_facture )
		    And          ( facture_a.facture_typ = 'AV' ) 
			And          ( facture_b.facture_typ = 'FA' ) )  

			  select * from CAISSE_CENTRALE where JOURNAL_NUM='100281'
			  update CAISSE_CENTRALE set agence_cod=800 where JOURNAL_NUM='800160182' --800
			  select * from COURRIER where COURRIER_NUM='B00525265' 
			  
			 select
ensemble.ensemble_num,
ensemble.ensemble_dat,
ensemble.agence_cod,
ensemble.ensemble_eta 
from
ensemble
where
ensemble_num ='cr3501600948' ---800

update 
ensemble set AGENCE_COD=350 --800
where
ensemble_num ='cr3501600948'
select * from CAISSE_CENTRALE where agence_cod=350 and VALID2_DAT between '01/01/2017' and '04/01/2017'

select * from CAISSE_CENTRALE where JOURNAL_ID=34358

select * from courrier_caisse where courrier_caisse.COURRIER_ID in (select COURRIER_ID  from COURRIER where  COURRIER_NUM='B00824603' ) and m_typ='TR'

delete from courrier_caisse where courrier_caisse.COURRIER_ID in (select COURRIER_ID  from COURRIER where  COURRIER_NUM='B00824603' ) and m_typ='TR'
--3788662	TR	34358
insert into courrier_caisse values(3788662	,'TR',	34358)

 
SELECT  courrier_caisse.m_typ as 'type',
           caisse_centrale.journal_num as 'caisse_num',
           caisse_centrale.journal_dat as 'caisse_dat',
           agence.agence_lib as 'agence'    
        FROM courrier_caisse ,
           caisse_centrale ,
           agence     
        WHERE ( courrier_caisse.journal_id = caisse_centrale.journal_id ) and  
		        ( caisse_centrale.agence_cod = agence.agence_cod ) and     
		     ( ( courrier_caisse.courrier_id  in (select COURRIER_ID  from COURRIER where  COURRIER_NUM='B00824603' ) ) )  

			 

			 select top 10 * from
			 UTILISATEUR where USER_LOGIN like '%KALAKHI%'
			  Cheque where Cheque.Cheque_num in ('57083','57082','57084','57085','57086','57087','57088','57089','57090','57091')


 
 select * from facture where-- FACTURE_DAT between '30/12/2016' and '01/01/2017'
  FACTURE_NUM like '15016002928%' and FACTURE_TYP='AV' order by FACTURE_DAT desc
 select * from COMPTEUR_AGENCE where AGENCE_COD=150

 select * from facture 
 --update facture set FACTURE_NUM='15016002930' , facture_dat='31/12/2016' --
 where FACTURE_NUM ='15016002928'
 --742430	2	15017000095	AV	2017-01-16 12:06:01.247	-3885,96	-544,0344	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL
 --748805	2	15017000096	AV	2017-01-16 12:07:06.187	-3115,78	-436,2092	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL
 --761735	2	15017000097	AV	2017-01-16 12:14:33.543	-2638,42	-369,3788	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL


insert into TARIF_MESS_TRANCHE 
select 19,agence_cod,ville_cod,prix_ht,tranche_id from TARIF_MESS_TRANCHE where TARIF_NUM=16

select * from tarif where tarif_num in(18,19,16)
update tarif set tarif_base=3 where tarif_num=19

insert into taxes_constantes
SELECT 19 'tarif_num',	COURRIER_TYP	,TARIF_BASE,	VEHICULE_TYP,	PRODUIT_COD,	MIN_VAL,	MAX_VAL,	FACTEUR,	B,	VARIABLE,	MAX_VAL2,	FACTEUR2

--taxes_constantes.tarif_num ,   
--         taxes_constantes.courrier_typ ,   
--         taxes_constantes.produit_cod ,   
--         taxes_constantes.produit_cod ,   
--         taxes_constantes.min_val ,   
--         taxes_constantes.max_val ,   
--         taxes_constantes.facteur ,   
--         taxes_constantes.b ,   
--         taxes_constantes.max_val2 ,   
--         taxes_constantes.facteur2 ,   
--         taxes_constantes.variable ,   
          
--         taxes_constantes.vehicule_typ,   
--         taxes_constantes.tarif_base  
    FROM taxes_constantes  
   WHERE ( taxes_constantes.tarif_num = 16 ) AND  
         ( taxes_constantes.courrier_typ = 'M' )
		 
		  --AND  
    --     ( taxes_constantes.vehicule_typ = :vehicule ) AND  
    --     ( taxes_constantes.tarif_base = :base )  


	select * from utilisateur where USER_LOGIN like 'hmidouch%'
	select top 10 * from produit 
	 


	cette caisse est déjà validée :contient les CL suivants:8001700027-28-31-32-33-34 et 
	CR8001700004;avoir valider la caisse 800170009;mais lorsque je viens de valider les nouveaux CL;
	ils sont validés sur la même caisse800170006 qui est déjà validée le 14/1/17

	
--demande de modification des dates versement numero : 55877-55879 a la date du 01/02/2017

select * from CLIENT_VERSEMENT where VERS_NUM='55877' --2016-12-01 00:00:00.000

select * from CLIENT_VERSEMENT where VERS_NUM='55879' --2016-12-01 00:00:00.000

update  CLIENT_VERSEMENT
set VERS_DAT='01/02/2017'

 where VERS_NUM in ('55877','55879')

 Besoin état des exonérations par client paramétrées au tarif_num 11-12-13-15-16 :
  code client / raison sociale / exonérations par rubrique.
  select top 10 * from menu
  client_tarif
  client

  select * from taxes
  --requete 
  select  c.CLIENT_COD,c.NOM,t.PRODUIT_LIB,ct.TARIF_NUM from 
 exonere_taxe ex right join  CLIENT_TARIF ct on ct.Client_id=ex.Client_id 
 right join CLIENT c  on  ex.Client_id=c.CLIENT_ID
  left join TAXES t on t.PRODUIT_COD=ex.Produit_cod
   where ct.TARIF_NUM   in (11,12,13,15,16) and ct.COURRIER_TYP='M' 
 order by c.NOM 

 


  -- in (11,12,13,15,16) and ct.COURRIER_TYP='M' and ex.COURRIER_TYP='M' order by c.NOM


 --select top 5 * from   
--exonere_taxe xt  
-- where Client_id in (select client_cod from client where client_id=3454)

select * from USER_ETIQ where USER_ETIQ.user_id=


select * from hist_declaration_GMS

insert into hist_declaration_GMS values
((:ancienttc),(: anciendestinataire),getdate(),:str_dec.id, :nouv_ttc_tmp,:user_id_tmp);

select USER_ID from UTILISATEUR where EMPLOYE_ID in (select EMPLOYE_ID from EMPLOYE where MATRICULE ='2451')
insert into  dev_param_user
select  457,TABLE_ID,COL_ID,U_VISIBLE,U_ORDER from    dev_param_user where USER_ID=454 order by 1 desc
 select * from dev_param_user where USER_ID=457
select * from [hist_declaration_GMS] where   id=190
--update [hist_declaration_GMS] set  Ancien_ttc=nouv_ttc
  where Ancien_ttc=720 and id=190
  delete [hist_declaration_GMS] where id =12
  select * from [hist_declaration_GMS] where courrier_id in (select courrier_id from COURRIER where COURRIER_NUM='B00817885')
--ALTER TABLE [hist_declaration_GMS]
--ALTER COLUMN ancien_destinataire numeric(16)

 SELECT declaration_v.numero,   
         declaration_v.poids,   
         declaration_v.colis,   
         hist_declaration_GMS.Ancien_ttc,   
         hist_declaration_GMS.nouv_ttc,   
         UTILISATEUR.USER_LOGIN,   
         CLIENT.NOM  
    FROM declaration_v,   
         hist_declaration_GMS left join client on   hist_declaration_GMS.Ancien_destinataire = CLIENT.CLIENT_ID 
		 ,   
         UTILISATEUR
            
   WHERE ( declaration_v.courrier_id = hist_declaration_GMS.courrier_id ) and  
         ( hist_declaration_GMS.users_id = UTILISATEUR.USER_ID )-- and  
      --   ( hist_declaration_GMS.Ancien_destinataire = CLIENT.CLIENT_ID )  
 date_inser between dat1 and date2


select *  from COURRIER_VEHICULE


--delete  COURRIER_VEHICULE where VEHICULE_NUM='14'
--delete from courrier


select top 3 c.numero as 'numéro',c.date_saisie as 'date',c.expediteur as 'expéditeur',
c.destinataire as 'destinataire',c.ville1_cod as 'ville 1',c.ville2_cod as 'ville 2',
p.MONTANT_HT as 'Montant HT',rtf.COURRIER_ID as 'Numéro BL',
 fb.bordereau_num as 'Numéro Bordereau', c.facture_id
 from declaration_v c left join FACTURE f 
on c.FACTURE_ID=f.FACTURE_ID
join produit p on p.COURRIER_ID=c.COURRIER_ID join facture_bordereau fb 
on fb.facture_id=c.FACTURE_ID join RETOUR_FONDS_FA rtf on rtf.FACTURE_ID=c.FACTURE_ID


where c.date_saisie between '01/01/2016' and '31/12/2016'  

 
and  c.facture_id is null

select top 5 f.*  from declaration_v d left join FACTURE f
on f.FACTURE_ID=d.facture_id
 

   SELECT c.client_id,c.client_cod,c.nom,

(select count (*) from declaration_v d where  c.client_id=d.client2_id) as 'Total Expéditions'

    FROM client c  join exonere_taxe ex on c.client_id=ex.client_id 
join declaration_v d on c.client_id=d.client2_id
where  ex.produit_cod='LGS' and d.date_saisie between :date1 and :date2
group by c.client_id,c.client_cod,c.nom

select * from UTILISATEUR where USER_LOGIN like 'asmaa'
select client_id  from exonere_taxe where produit_cod='LGS' group by client_id





  SELECT d.client1_id,d.code_expediteur,d.expediteur,

(select count (*) from declaration_v d2 where  d.client1_id=d2.client1_id) as 'Total Expéditions'

    FROM  declaration_v d
join  exonere_taxe ex on d.client1_id=ex.client_id 
 
join client_parametres cp on d.client2_id=cp.client_id

where surtaxe = 1 and  ex.produit_cod='LGS' and d.date_saisie between '01/01/2017' and '30/01/2017'
group by d.client1_id,d.code_expediteur,d.expediteur
order by 4 desc   
------------------------------------------------------------
-----
select * from TARIF_MESS_TRANCHE where TARIF_NUM=16
------------------------------------------------------------
----- les declaration taxe  gms 10934
--besoin des N° déclarations 2015 et 2016 taxées avec la taxe GMS avec 
--les codes clients date, expéditeur destinataire tarification de l'expéditeur. en 2 fichiers séparés. 
------------------------------------------------------------
select top 10 * from CLIENT_TARIF

SELECT courrier.numero,
           isnull (produit.montant_ht, 0) as 'montant_ht',
            courrier.code_expediteur,courrier.date_saisie,courrier.expediteur,courrier.destinataire,isnull(ct.TARIF_NUM,'') 
        FROM taxes ,
           produit ,
           declaration_v courrier   left join  CLIENT_TARIF ct on courrier.code_expediteur= ct.CLIENT_ID 
      
	    WHERE  
		( taxes.produit_cod = produit.produit_cod ) and  
                ( courrier.courrier_id = produit.courrier_id ) and     
                  
taxes.produit_cod='LGS'and ct.COURRIER_TYP='M' and 
courrier.date_saisie  between '01/02/2017' and '07/02/2017'
        ORDER BY 1       ASC  


		
		
SELECT  courrier.numero,
           isnull (produit.montant_ht, 0) as 'montant_ht'
             
        FROM taxes ,
           produit ,
           declaration_v courrier   
      join hist_declaration_GMS hd on courrier.courrier_id = hd.courrier_id 
	    WHERE  
		( taxes.produit_cod = produit.produit_cod ) and  
                ( courrier.courrier_id = produit.courrier_id ) and     
                  
taxes.produit_cod='LGS'and  
hd.date_insert  between '01/02/2017' and '07/02/2017'
        ORDER BY 1       ASC  

		select * ,(SELECT   
           isnull (produit.montant_ht, 0) as 'montant_ht'
             
        FROM taxes ,
           produit ,
           declaration_v courrier   
       
	    WHERE  
		( taxes.produit_cod = produit.produit_cod ) and   courrier.courrier_id = hd2.courrier_id and 
                ( courrier.courrier_id = produit.courrier_id ) and     
                  
taxes.produit_cod='LGS' )
		 from hist_declaration_GMS hd2 where hd2.date_insert between '01/02/2017' and '07/02/2017' order by 8
------------------------------------------------------------
---merci de m'envoyer toutes les déclarations datant du 01/01/16 au 31/12/16 qu'i n'ont pas un N° de facture. le fichier
-- doit contenir 
--: N° déc; date; expéditeur; destinataire;ville1; ville2; montant ht; N° BL; n° bordereau
-------------------------------------------------------------
 select cf.facture_id,courrier.numero,courrier.date,courrier.expediteur,courrier.destinataire,
 v1.VILLE_LIB as 'ville 1',v2.VILLE_LIB as 'ville 2'
 , STUFF((
    SELECT ', ' + courrier_retour_fonds_v.num  
    FROM courrier_retour_fonds_v 
    WHERE courrier_retour_fonds_v.courrier_id = courrier.courrier_id
    FOR XML PATH (''))
  ,1,2,'') as 'N° BL'

    , STUFF((
    SELECT ', ' + cast( bordereau_num as varchar) 
    FROM COURRIER_BORDEREAU 
    WHERE courrier_id = courrier.courrier_id
    FOR XML PATH (''))
  ,1,2,'')  as  'n° bordereau'
  ,dm.montant_ht as 'Montant HT'
  from declaration_v courrier  
		left join courrier_fa cf on cf.courrier_id=courrier.COURRIER_ID 
		join courrier_montants_v dm on dm.courrier_id=courrier.courrier_id
		join VILLE v1 on courrier.ville1_cod=v1.VILLE_COD
		join VILLE v2 on courrier.ville1_cod=v2.VILLE_COD
--left join FACTURE f on f.FACTURE_ID=cf.facture_id
where cf.facture_id is null and 

courrier.date_saisie between '01/01/2016' and  '31/12/2016'

select * from USER_ETIQ where user_id=1
select * from UTILISATEUR where EMPLOYE_ID in (select EMPLOYE_ID from EMPLOYE where MATRICULE='999')

 select * from  ramex.dbo.[Ramassage] 
 --update  ramex.dbo.[Ramassage] set [Ramassage].etat_ram='2'
  where code_ram='17fev1453'

select Montant from 
--update retour_fonds set Montant='3511.20'
   retour_fonds   where   fonds_typ='CH'and   courrier_id in (select courrier_id from COURRIER  where courrier_num='C00641904' )

---- merci de voir la possibilité de nous extraire sur un fichier EXCEL tout les numéros de bordereaux (des BL & CR) au nom de KARA DISTRIBUTION du 2015 & 2016.

select * from client where NOM like '%KARA DISTRIBUTION%'

select distinct courrier.numero,courrier.destinataire, courrier.expediteur,
   STUFF((
    SELECT ', ' + courrier_retour_fonds_v.num  
    FROM courrier_retour_fonds_v 
    WHERE courrier_retour_fonds_v.courrier_id = courrier.courrier_id
    FOR XML PATH (''))
  ,1,2,'') as BL

    , STUFF((
    SELECT ', ' + cast( bordereau_num as varchar) 
    FROM COURRIER_BORDEREAU 
    WHERE courrier_id = courrier.courrier_id
    FOR XML PATH (''))
  ,1,2,'')  as  'n° bordereau' 
  from declaration_v courrier      
--left join FACTURE f on f.FACTURE_ID=cf.facture_id
where 
(courrier.destinataire like '%KARA DISTRIBUTION%' or courrier.expediteur like '%KARA DISTRIBUTION%' ) and 
year (courrier.date_saisie )=2016


 
 --------------------------------------------------------------------------------------
 --------------------------------------------------------------------------------------
 --- annuler l'annulation du cheque
 --------------------------------------------------------------------------------------

select * from  cheque where Cheque_num='57152' --id 60238
select * from  courrier_chq_annule where CHEQUE_ID=60238
select * from courrier where courrier_id in  
(2878991,
2963928,
2972767,
3007960,
3035425,
3054832,
3079612,
3086486,
3175593,
3231170,
3235995,
3264564,
3267345,
3314214,
3325274,
3331112,
3351102,
3378803,
3380174,
3384656,
3387787)
-----------------------
declare @cheque_id integer=60238

--select * from  courrier_chq_annule where CHEQUE_ID=@cheque_id
--select * from  courrier_cheque where CHEQUE_ID=@cheque_id

update courrier_cheque
set cheque_id = @cheque_id
where courrier_id in  
(2878991,
2963928,
2972767,
3007960,
3035425,
3054832,
3079612,
3086486,
3175593,
3231170,
3235995,
3264564,
3267345,
3314214,
3325274,
3331112,
3351102,
3378803,
3380174,
3384656,
3387787)


update c
set courrier_eta = 'P' 
from
courrier c,
courrier_cheque cch
where
c.courrier_id = cch.courrier_id and
cheque_id =  @cheque_id; 
 
 
update cheque
set
annulation_dat = null,
annule_user_id = null
where
cheque_id =  @cheque_id;


delete  from courrier_chq_annule where CHEQUE_ID=  @cheque_id
 --------------------------------------------------------------------------------------
 ---etat asma talal 
 --------------------------------------------------------------------------------------
 select * from UTILISATEUR 
select distinct numero ,date_saisie ,expediteur,destinataire,dm.montant_ht,v1.VILLE_LIB as 'ville expediteur' ,v2.VILLE_LIB as 'ville destinataire'
,
e.NOM,e.PRENOM
--,e.NOM,e.PRENOM
,
 STUFF((
    SELECT ', ' + courrier_retour_fonds_v.num  
    FROM courrier_retour_fonds_v 
    WHERE courrier_retour_fonds_v.courrier_id = d.courrier_id
    FOR XML PATH (''))
  ,1,2,'') as BL

from declaration_v d join courrier_montants_v dm on dm.courrier_id=d.courrier_id 
join courrier_ensemble ce on d.COURRIER_ID=ce.COURRIER_ID 
left  join  COURRIER_VEHICULE cv on cv.ENSEMBLE_NUM=ce.ENSEMBLE_NUM
join VILLE v1 on d.ville1_cod=v1.VILLE_COD
join VILLE v2	on d.ville2_cod=v2.VILLE_COD
  --join manipule m on m.ENSEMBLE_NUM=cv.ENSEMBLE_NUM
  join ramasseur_courrier_v rm on rm.COURRIER_ID=d.courrier_id
left join controle c on c.ENSEMBLE_NUM=cv.ENSEMBLE_NUM
--left join EMPLOYE e on e.EMPLOYE_ID=m.EMPLOYE_ID
join EMPLOYE e on e.EMPLOYE_ID=rm.EMPLOYE_ID
where d.courrier_typ='L' and d.date_saisie between '01/01/2017' and '20/02/2017' order by 1


 --------------------------------------------------------------------------------------
 --------------------------------------------------------------------------------------
 --merci de changer le port de cette expédition B00739292 port payé au lieu de port du l'expéditeur en compte oui N° 12979.
select * from Courrier where courrier_num='B00739292'
--update courrier set port_typ='P' where courrier_num='B00739292'
select * from prime_varemploye where var_cod='35'


insert into prime_variable values('34','Prime taxation GMS',0,0)

insert into prime_variable values('35','Prime livraison GMS',0,0)

select client_id from client c
select client_id from client c -- where c.client_id 
except
(   
select client_id from gms_exonere ) 

select client_id from client c  where c.client_id not in
 
(   
select client_id from gms_exonere ) 


SELECT  declaration_v.client1_id,
		  client.client_cod,
           declaration_v.courrier_id as 'courrier_id',
           declaration_v.numero as 'numero',
           declaration_v.date as 'date',
           declaration_v.colis as 'colis',
           declaration_v.expediteur as 'expediteur',
           declaration_v.destinataire as 'destinataire',
           pre_cheque_v.montant as 'espece',
           courrier_retour_fonds_v.recu_num as 'num_recu',
           courrier_retour_fonds_v.recu_dat as 'date_recu'
        FROM declaration_v ,
           pre_cheque_v ,
           courrier_retour_fonds_v,
		  client
        WHERE ( declaration_v.courrier_id = pre_cheque_v.courrier_id)
		and ( declaration_v.courrier_id = courrier_retour_fonds_v.courrier_id)
		and declaration_v.client1_id=client.client_id 
		select * from banque
		insert into  banque values ('TGR','TRESORERIE GENERALE DU ROYAUME',0,null,null)
	--	merci d'ajouter la banque TRESORERIE GENERALE DU ROYAUME sur vex.

		select * from UTILISATEUR u --join EMPLOYE e on  u.EMPLOYE_ID=e.EMPLOYE_ID 
		where   USER_LOGIN like '%k.ENEZARI%'-- or  USER_LOGIN like '%hmidouch%' or  USER_LOGIN like '%takourt%'  -- 73
		select * from USER_ETIQ where user_id=73
		select * from agence where agence_cod=110
		select * from ville where VILLE_LIB like '%midelt%'ddd

		

		merci de retourne le chèque n 57463 sur la table impression chèque

		select top 10 * from cheque where cheque_num='57463'
		update cheque set Impression_dat=null where cheque_num='57463'


		select * from imp_recu_v where recu=5

		merci de bien vouloir changer les affectation des VHC suivants: 
		270:rabat au lieu de casa 
		2340:rabat au lieu de el jadida 
		362:rabat au lieu de casa
		 2300:larache au lieu de taza 
		 2337:taza au lieu de casa 
		 298:casa au lieu de el jadida 
		 2315:el jadida au lieu de casa
		select * from agence

		select vehicule_num,AGENCE_COD from vehicule 
		--update vehicule  set AGENCE_COD=110 
		where vehicule_num in ('270',
'2340',
'362',
'2300',
'2337',
'298',
'2315')



		select * from etats where etats.GRP_ETAT_ID=18


		select top 10 * from TRANSPORTE 
		--update TRANSPORTE set ARRIVE_DAT='19/02/2017'
		where VOYAGE_NUM='1001700927'


		select 
	MONTANT_HT
			from produit p where p.Courrier_id='' and PRODUIT_COD='TR'

		select  MONTANT_HT
	 
			from produit p where p.Courrier_id in (  select COURRIER_ID from COURRIER where COURRIER_NUM='100') and PRODUIT_COD='TR';


			select top 10 * from COURRIER_AGENCE 
			--update UTILISATEUR set PASSWD_EXPIRE='O' ,DATE_EXPIRE='25/02/2017 11:00:00' where verou='N'
			 where USER_ID=11911 and verou='N'

---------------------------------------------------------
		--select * from 	( select   d.numero,d.code_expediteur,d.expediteur,a.AGENCE_LIB, d.poids,sum(pf.MONTANT_HT) as 'MONTANT HT' ,d.poids-sum(pf.MONTANT_HT) as 'calc' 	
		--	 from declaration_v d join produit_fa pf on pf.COURRIER_ID=d.courrier_id 
		--	 join COURRIER_AGENCE ca on d.courrier_id=ca.COURRIER_ID and ca.INTER_TYP='D'
		--	 join AGENCE a on a.AGENCE_COD=ca.AGENCE_COD
		--	 where (d.date_saisie) between '01/01/2017' and '21/02/2017' and d.courrier_typ='M'  
		--	 group by d.numero,d.poids,d.code_expediteur,d.expediteur,a.AGENCE_LIB )b
		--	where 	
		--	  b.poids>(b.[MONTANT HT]) order by 7 desc
		--	 ----------------------------------------------
--select *	from ( select  d.code_expediteur as code_expediteur ,d.expediteur as expediteur, sum(d.poids)  as poids,sum(cm.MONTANT_HT) as 'MONTANT HT'  
			
		--	 from declaration_v d join courrier_montants_v cm on cm.COURRIER_ID=d.courrier_id 
		 
		--	 where (d.date_saisie) between '01/01/2017' and '21/02/2017' and d.courrier_typ='M'   group by d.client1_id,d.code_expediteur ,d.expediteur
		--	  ) b
			
		--	  where 
		--	 b.poids>(b.[MONTANT HT]) order by 3 desc
			 -------------------
			 	--select *	from ( 
				select  AGENCE_LIB, sum(d.poids)  as poids,sum(cm.MONTANT_HT) as 'MONTANT HT'  --a.AGENCE_LIB,ville1_cod,  
			
			 from declaration_v d join courrier_montants_v cm on cm.COURRIER_ID=d.courrier_id 
		 join ville v on V.VILLE_COD=d.ville1_cod
			 join COURRIER_AGENCE ca on d.courrier_id=ca.COURRIER_ID and ca.INTER_TYP='D'
			 join AGENCE a on a.AGENCE_COD=v.AGENCE_COD-- and d.ville1_cod=701
			 where (d.date_saisie) between  '01/01/2016' and '31/12/2016' and d.courrier_typ='M'  and (d.poids) >(cm.MONTANT_HT)  group by a.AGENCE_COD,a.AGENCE_LIB
			 
			--) b 
			--  where 
			-- b.poids>(b.[MONTANT HT]) order by 1 desc


 select  d.numero,d.code_expediteur,d.expediteur,a.AGENCE_LIB, d.poids, (cm.MONTANT_HT) as 'MONTANT HT' ,d.poids- (cm.MONTANT_HT) as 'calc' 
			
			 from declaration_v d join courrier_montants_v cm on cm.COURRIER_ID=d.courrier_id 
		 join ville v on V.VILLE_COD=d.ville1_cod
			 join COURRIER_AGENCE ca on d.courrier_id=ca.COURRIER_ID and ca.INTER_TYP='D'
			 join AGENCE a on a.AGENCE_COD=v.AGENCE_COD 
			 where (d.date_saisie) between  '01/01/2016' and '31/12/2016' and d.courrier_typ='M'  and (d.poids) >(cm.MONTANT_HT)  group by d.numero,d.code_expediteur,d.expediteur,a.AGENCE_LIB, d.poids,(cm.MONTANT_HT)
			 



 select   d.code_expediteur,d.expediteur,  sum(d.poids) as poids,sum(cm.MONTANT_HT) as 'MONTANT HT' --,d.poids-sum(cm.MONTANT_HT) as 'calc'
			
			 from declaration_v d join courrier_montants_v cm on cm.COURRIER_ID=d.courrier_id 
		 join ville v on V.VILLE_COD=d.ville1_cod
			 join COURRIER_AGENCE ca on d.courrier_id=ca.COURRIER_ID and ca.INTER_TYP='D'
			 join AGENCE a on a.AGENCE_COD=v.AGENCE_COD 
			 where (d.date_saisie) between '01/01/2016' and '31/12/2016' and d.courrier_typ='M'  and (d.poids) >(cm.MONTANT_HT)  
			 group by   d.code_expediteur,d.expediteur--, a.AGENCE_LIB--, d.poids,(cm.MONTANT_HT)
			
--------------- f route 

   SELECT   TRANSPORTE.VOYAGE_NUM  ,
	 TRANSPORTE.VEHICULE_NUM, 
           AGENCE_depart.AGENCE_LIB as 'depart' 
		   ,agence_terminus.AGENCE_LIB as 'arriver',TRANSPORTE.VOYAGE_DAT,
		 --  ,consultation_distance_ville.DISTANCE
		-- agence_terminus.AGENCE_COD,
		-- AGENCE_depart.AGENCE_COD,
		  (select DISTANCE from consultation_distance_ville where AGENCE_depart.AGENCE_COD= consultation_distance_ville.agence_depart
		   and  agence_terminus.AGENCE_COD = consultation_distance_ville.agence_arriver and VILLE_LIB=agence_terminus.AGENCE_LIB ) as 'd'
        FROM TRANSPORTE 
,AGENCE AGENCE_terminus ,  
 AGENCE AGENCE_depart
		      --, consultation_distance_ville 
 
   WHERE  --AGENCE_depart.AGENCE_COD= consultation_distance_ville.agence_depart and  agence_terminus.AGENCE_COD = consultation_distance_ville.agence_arriver and      
		     ( TRANSPORTE.agence_terminus = AGENCE_terminus.AGENCE_COD ) 
			 
			 and          ( TRANSPORTE.AGENCE_COD = AGENCE_depart.AGENCE_COD ) and  TRANSPORTE.VOYAGE_NUM like'100%'and          
			       ( ( TRANSPORTE.VOYAGE_DAT between '01/02/2017' and '28/02/2017' )             )  
order by 1


-------------------------------------

select * from UTILISATEUR where USER_LOGIN='alaoui'

select * from consultation_station_par_station


drop table   [dbo].[pesees_montant]
select * from AGENCE where AGENCE_COD=700 


select ca.* from COURRIER c join COURRIER_AGENCE ca on c.COURRIER_ID=ca.COURRIER_ID where c.COURRIER_NUM='B488848' and ca.inter_typ='A'
select * from COURRIER_AGENCE
--update COURRIER_AGENCE set AGENCE_COD=700--700
 where COURRIER_id=3560288 and inter_typ='A'
 
 select * from COURRIER_AGENCE
--update COURRIER_AGENCE set AGENCE_COD=210--210
 where COURRIER_id=3772638 and inter_typ='A'


 SELECT * FROM COMPTEUR WHERE compteur_cd='PE'
 --insert into compteur values ('PE',100)

 
 select * from PRODUIT 
 --update PRODUIT set MONTANT_HT=2499.39
 where courrier_id in (select p.COURRIER_ID from COURRIER c join PRODUIT p on p.COURRIER_ID=c.COURRIER_ID  and c.COURRIER_NUM='b00659021')


 select * from CAISSE_CENTRALE  where JOURNAL_NUM='700170043' 

select * from caisse_c_detail 
			--delete from caisse_c_detail 
			-- update caisse_c_detail set banque=null , MODE=null
			where journal_id = 35061 and mvt_cod='VCR'
			--35061	VCR 	0,001	59397	1	2017-02-28 00:00:00.000	ESP	NULL	NULL	6
			--insert into caisse_c_detail values(35061,	'VCR', 	0,	null,	1	,null,	null	,NULL,	NULL,	null)

 ---merci d'annuler la ligne FT de la caisse 600170053 pièce n° 90450
 --35172	VTR 	0,01	90450	1	2017-03-02 00:00:00.000	ESP	NULL	NULL	4
 --34921	VTR 	20857,72	90119	1	2017-02-13 00:00:00.000	ESP	NULL	NULL	3
select * from caisse_c_detail 
			--delete from caisse_c_detail 
			--update caisse_c_detail set MONTANT='20857.72',	PIECE=90119,	MVT_DAT='13/02/2017',	MODE='ESP',	date_cloture=null,	date_export=null,	banque=3
			where journal_id in (select journal_id from CAISSE_CENTRALE  where JOURNAL_NUM='300190269' )
			 and mvt_cod='VTR'
select * from courrier_caisse where COURRIER_ID in (select COURRIER_ID from COURRIER where COURRIER_NUM='C01091726')

		 update VEXINITIALBACKUP2.dbo. utilisateur set   user_passwd='a'    where user_id=1
		 select * from courrier where courrier_num='B00869278' 
		 C01091726 de la caisse300190269

select * from COURRIER_AGENCE ca where ca.INTER_TYP='A' and  ca.courrier_id in (select COURRIER_id from courrier where courrier_num='B00869278') --3866334	A	600 	1	NULL	NULL
update COURRIER_AGENCE set INTER_ETA=0 where INTER_TYP='A' and COURRIER_id=3866334 --1
select * from LIVRAISON where courrier_id =3866334


select * from utilisateur
  where  USER_LOGIN like '%s.el%' 455 
insert into dev_param_user

select 455,	TABLE_ID,	COL_ID,	U_VISIBLE,	U_ORDER from   dev_param_user where user_id=1



select * from Cheque where Cheque_num='57087'
60173	57087           	2016-11-04 09:59:05.940	48672,00	3396833	BLYFLEX	BMCI    	S	2016-11-04 13:58:50.083	NULL	2016-11-23 10:01:34.213	28	2017-01-13 11:17:04.240	NULL	150 	0
60173	57087           	2016-11-04 09:59:05.940	48672,00	3396833	BLYFLEX	BMCI    	S	2016-11-04 13:58:50.083	NULL	2016-11-23 10:01:34.213	28	2017-01-13 11:17:04.240	NULL	150 	0

  SELECT  0 as 'inclus',           declaration_v.courrier_id as 'courrier_id',           declaration_v.numero as 'numero',           declaration_v.date as 'date',           declaration_v.colis as 'colis',       
      declaration_v.expediteur as 'expediteur',           declaration_v.destinataire as 'destinataire',           pre_cheque_v.montant as 'espece',           courrier_retour_fonds_v.recu_num as 'num_recu',   
	          courrier_retour_fonds_v.recu_dat as 'date_recu'  
			    FROM declaration_v ,           pre_cheque_v ,           courrier_retour_fonds_v   
    WHERE ( declaration_v.courrier_id = pre_cheque_v.courrier_id ) and          ( declaration_v.courrier_id = courrier_retour_fonds_v.courrier_id )    and  declaration_v.client1_id = 3396833 
	select *
  FROM         VEXINITIALBACKUP2.dbo.  pre_cheque_v 
  where pre_cheque_v.courrier_id in (3508205)
   B00882340 mettre 

select * from courrier
--update courrier set SAISIE_DAT='14/02/2017'
 where courrier_num='B00729041'

 select * from COURRIER_AGENCE 
 --update COURRIER_AGENCE set INTER_ETA=1 --1
 where COURRIER_ID=3864945 and INTER_TYP='A'
 select * from 
  select  * from LIVRAISON where COURRIER_ID =3864945

	select * from client where client_cod='12358'
	select * from VEXINITIALBACKUP2.dbo. client where client_cod='12358'
	select * from utilisateur where user_login like '%BOUHMIDA%'
	select * from manipule  where MANIPULE.ENSEMBLE_NUM='1001701137'

	select * from transporte
	--	update transporte set KM_ARRIVE= '677927' 
 where voyage_num='1001701137'

 select * from EMPLOYE where nom  like '%abo%' --2459      
 select * from UTILISATEUR where EMPLOYE_ID=11968
 s

 
print DATEDIFF(hour,convert (date,'2017-02-07 00:00:00.000'),convert (date,'2017-02-09 00:00:00.000'))


select top 10* from produit
--COURRIER_ID	PRODUIT_COD	MONTANT_HT	MONTANT_TAX	TVA
--3880749	TR  	190,00	26,60	14.00
--3850800	TR  	228,62	32,0068	14.00
--update PRODUIT set MONTANT_HT=136.2968 ,MONTANT_TAX=19.082
where PRODUIT_COD='immo'  and  COURRIER_ID in (select courrier_id from courrier where courrier_num='B00542146')

FACTURE_ID	FACTURE_IND	FACTURE_NUM	FACTURE_TYP	FACTURE_DAT	FACTURE_HT	FACTURE_TVA	NON_IMP	RABAIS_TAU	REGLE	IMPRESSION_NB	DATE_CLOTURE	DATE_IMPORTATION	USER_ID	indice	CA_Num
802462	1	20017001188	FA	2017-03-09 09:11:04.340	310,00	43,40	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL
--795902	1	20017000757	FA	2017-02-14 08:42:20.143	288,623	40,4072	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL
select * from FACTURE
--update FACTURE set FACTURE_HT=196.2968 ,FACTURE_TVA=27.48
 where FACTURE_NUM='20017000757'

 select * from PRODUIT_FA fb
 --update PRODUIT_FA  set  MONTANT_HT=136.2968,MONTANT_TAX=19.082
  where  facture_id ='795902' and PRODUIT_COD='TR'



 COURRIER_ID	FACTURE_ID	FACTURE_IND	PRODUIT_COD	MONTANT_HT	MONTANT_TAX	TVA
3880749	802462	1	TAV 	120,00	16,80	14.00
3850800	795902	1	TR  	228,62	32,0068	NULL




select * from CAISSE_CENTRALE where JOURNAL_NUM='600170062'
select * from CAISSE_D_DETAIL cd where cd.  
500090810 mettre le 31/01/2019 au lieu de 06/02/2019
--Merci de modifier la date de la dépense 100236 lire 28/02/2017 au lieu de 2016
-- 500090702 500090701 500090703 500090699
select * from CAISSE_DEPENSES 
--update CAISSE_DEPENSES set JOURNAL_DAT='31/01/2019'
 where JOURNAL_NUM in('500090810')

 2018-12-01 00:00:00.000
2018-12-01 00:00:00.000
2018-12-04 00:00:00.000
2018-12-04 00:00:00.000

COURRIER_ID	M_TYP	JOURNAL_ID
3828337	TR	45392

REGLEMENT_NUM	FACTURE_ID	REGLEMENT_DAT	REGLEMENT_MT	VERS_NUM	ENSEMBLE_NUM	SAISIE_DAT	USER_ID	EMPLOYE_ID	AGENCE_COD	LETTRAGE
633292	813732	2017-03-14 15:13:41.217	205,20	NULL	CR6001700045    	2017-03-14 15:13:41.217	103	NULL	NULL	NULL

VERS_NUM	VERS_DAT	CLIENT_ID	MONTANT	MODE	BANQUE_COD	PIECE	ECHEANCE	LETTRE	DATE_BANQUE	REMISE_NUM	REMISE_DAT	BANQUE_CD	IMPAYE	USER_ID	facture_id	Date_Cloture	Date_Export	agent_id	responsable_id
70265	2016-12-23 00:00:00.000	1673249	6000,00	TRA	WAFA  		2017-04-30 00:00:00.000	O	2017-02-15 00:00:00.000	2	2016-12-23 00:00:00.000	BP        	O	36	NULL	2017-01-23 13:52:22.760	NULL	1083	1083

--select *  delete  from CLIENT_VERSEMENT where VERS_NUM=70265 

select * from ville where VILLE_LIB like '%berch%'

select * from DISTANCIER where AGENCE_COD=
--update DISTANCIER set DISTANCE=761   where AGENCE_COD=230 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('OUJDA'))	
--update DISTANCIER set DISTANCE=380   where AGENCE_COD=230 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('CASABLANCA'))	
--update DISTANCIER set DISTANCE=292   where AGENCE_COD=230 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('RABAT'))	
--update DISTANCIER set DISTANCE=618   where AGENCE_COD=230 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('MARRAKECH'))	

--update DISTANCIER set DISTANCE=468 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('AGADIR'))
--update DISTANCIER set DISTANCE=463 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('AIT MELLOUL'))
--update DISTANCIER set DISTANCE=225 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('BENI MELLAL'))
--update DISTANCIER set DISTANCE=108 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('EL JADIDA'))
--update DISTANCIER set DISTANCE=294 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('FES'))
--update DISTANCIER set DISTANCE=141 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('KENITRA'))
--update DISTANCIER set DISTANCE=1089 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('LAAYOUNE'))
--update DISTANCIER set DISTANCE=259 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('LARACHE'))
--update DISTANCIER set DISTANCE=244 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('MARRAKECH'))
--update DISTANCIER set DISTANCE=238 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('MEKNES'))
--update DISTANCIER set DISTANCE=598 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('NADOR'))
--update DISTANCIER set DISTANCE=614 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('oujda'))
--update DISTANCIER set DISTANCE=87 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('RABAT'))
--update DISTANCIER set DISTANCE=243 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('SAFI'))
--update DISTANCIER set DISTANCE=338 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('TANGER'))
--update DISTANCIER set DISTANCE=380 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('TANGER MED'))
--update DISTANCIER set DISTANCE=397 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('TAZA'))
--update DISTANCIER set DISTANCE=365 where AGENCE_COD=100 and VILLE_COD in (select VILLE_COD from ville where ville_LIB in ('TETOUAN'))



select 
 MATRICULE , CHASSIS_NUM , dossier , Marque, type_marque, 
 CARBURANT_LIB, valeur , CONSOMMATION , puissance, tonnage ,
 freq_assurance, FREQ_PERMIS, FREQ_VT, pre_as , pre_pc, pre_vt,
 AGENCE_LIB , assurance_date ,type_affectation ,ACQUIS_TYP , ECHEANCE_DAT,
 CIRCULATION_DAT,compteur , AGENCE_COD, PERMIS_DAT , VT_DAT,date_acquisition,
 date_vente,dossier_organisme,organisme,chauffeur
 

from consultation_global_veh

select * from utilisateur where EMPLOYE_ID=11911

select * from VEXINITIALBACKUP2.dbo. EMPLOYE order by 1 desc

delete from VEXINITIALBACKUP2.dbo. EMPLOYE where employe_id in (11975
,11974,
11973,11972)

 where  MATRICULE='2465' nom  like '%AZZAGNUNI%'


 select * from BddPaieGrhLaVoieExpress.dbo. p_employe_paie0



2465 AZZAGNUNI  RACHID 


--merci de modifer toutes declarations BSH au nom du ramsseur ILA 893 et les changer au nom de RACHIK 116 à partr de la date du 20/2/2017
 select EMPLOYE_ID,MATRICULE,NOM from EMPLOYE where MATRICULE='893' or  MATRICULE='116'

16	116       	RACHIK
485	893       	ILA


 select * from ETATS e where e.GRP_ETAT_ID=2

-- update MANIPULE set EMPLOYE_ID=16 
  where MANIPULE.ENSEMBLE_NUM in (

SELECT  MANIPULE.ENSEMBLE_NUM 
--,
--	d.*, 
--			EMPLOYE.NOM, 
--			EMPLOYE.PRENOM, 
--			EMPLOYE.MATRICULE

FROM            
			COURRIER_ENSEMBLE
			join declaration_v d on d.courrier_id=COURRIER_ENSEMBLE.COURRIER_ID 
			 INNER JOIN
         ENSEMBLE ON COURRIER_ENSEMBLE.ENSEMBLE_NUM = ENSEMBLE.ENSEMBLE_NUM INNER JOIN
         MANIPULE ON ENSEMBLE.ENSEMBLE_NUM = MANIPULE.ENSEMBLE_NUM INNER JOIN
         EMPLOYE ON MANIPULE.EMPLOYE_ID = EMPLOYE.EMPLOYE_ID 

WHERE        (ENSEMBLE.ENSEMBLE_TYP IN ('CB', 'CG')) and  
 d.date_saisie between '20/02/2017' and '22/03/2017' and MANIPULE.EMPLOYE_ID=485
 and d.code_expediteur=9616 and d.courrier_typ='M'
  );



  SELECT  regle_client_v.numero_versement as 'numero',
           regle_client_v.date_versement as 'date',
           regle_client_v.code_client as 'Code_Client',
           regle_client_v.client as 'Client',
           regle_client_v.montant as 'Montant',
           regle_client_v.mode as 'Mode',
           regle_client_v.piece as 'piece',
           regle_client_v.echeance as 'echeance',
           regle_client_v.utilisateur as 'utilisateur',
           agence.agence_lib as 'agence'    
        FROM regle_client_v ,
           cli_radr ,
           agence     
        WHERE ( regle_client_v.client_id = cli_radr.client_id ) and        

		  ( cli_radr.agence_cod = agence.agence_cod ) and          ( ( regle_client_v.Date_Versement between :date1 and :date2 ) and   
		         ( cli_radr.agence_cod = :agence ) )  


			 
select   a.AGENCE_LIB as Agence,
e.NOM+' ' +e.PRENOM as Utilisateur,

c.COURRIER_NUM ,
 (dhm1.action_dat),
dhi.code_expediteur as code_expediteur_initial
,dhi.expediteur as  expediteur_initial ,
dhi.code_destinataire as code_destinataire_initial
,dhi.destinataire as  destinataire_initial ,
 round(dhi.montant_ht,2) as montant_initial, 
 round(dhm1.montant_ht,2) as montant_modif, 
 
 (round( dhi.montant_ht,2)-round(dhm1.montant_ht,2)) as Ecart

 ,case when dhi.montant_ht<>0 then (round( dhi.montant_ht,2)-round(dhm1.montant_ht,2))/round(dhi.montant_ht,2) else 0 end as 'Pourcentage'
from  dec_hist_v dhi  join
(select * from 	dec_hist_v dhm where    dhm.action_typ='M' ) as  dhm1 on dhm1.courrier_id=dhi.courrier_id and dhi.courrier_typ='L'
join  UTILISATEUR u on u.USER_ID=dhm1.user_id
join EMPLOYE e on e.EMPLOYE_ID=u.EMPLOYE_ID
join AGENCE a on a.AGENCE_COD=u.AGENCE_COD
join COURRIER c on  dhi.courrier_id=c.COURRIER_ID
where dhi.action_dat between  '01/02/2017' and '05/02/2017' and dhi.action_typ='I'  and round(dhm1.montant_ht,2)<round(dhi.montant_ht,2) 
 order by ecart desc

       
       
	   select * from COURRIER_AGENCE
	  -- update  COURRIER_AGENCE set INTER_ETA=1  where INTER_TYP='A' and 
	    courrier_id in  (select courrier_id from courrier where courrier_num='B00549717')




		
select * from utilisateur u where u.USER_LOGIN  like 's.talal'


select   * from droits where menu_id=456 and acces='O'
 and
 USER_ID=431

 update droits set acces='N' where  menu_id=456 

update droits set acces='O' where menu_id=456 
 and
 USER_ID=431

 select * from CLIENT_VERSEMENT where VERS_NUM=71490

 update CLIENT_VERSEMENT set vers_dat='30/03/2017' where  VERS_NUM=71490

  modifier date du versement N° 7149 au 30/03/2017



  ---
  
--bonjour, merci de saisir le code client 10678 pour la declaration B00901025. cdt

  select c from courrier c where c.courrier_num='B00901025'
  
  select * from
  update  [dbo].[INTERVIENT]  set client_id=2519300 where  COURRIER_ID=3906259 and INTERVENTION_TYP='DE'

  select * from client where client_cod='10678'


  ---Bonjour merci de régler le prob de déc B00877472 ; Le montant taxé (1075.52)n'est celui qui figure au facture (983.84) slts

  
merci de relivrer les deux déclaration suivants dans le carnet cl3001700672 b06936. a1333301.

bonsoir veuillez svp faire relivrer cette déc C00504705 de carnet de livraison cl1001900374 erreur de frappe . cordialement

select *   from  COURRIER_AGENCE   where   courrier_id in (select courrier_id from COURRIER where COURRIER_NUM='C00504705' ) and INTER_TYP='A'

update COURRIER_AGENCE set INTER_ETA=0 where  INTER_TYP='A' and COURRIER_ID in (select courrier_id from COURRIER where COURRIER_NUM='C00504705')

select * from LIVRAISON where COURRIER_ID in (select courrier_id from COURRIER where COURRIER_NUM='C00504705')

select * from ENSEMBLE where ENSEMBLE_NUM='cl3001700672'   

select *     from COURRIER_ENSEMBLE where    ENSEMBLE_NUM='cl1001900374'   and  courrier_id in (4777372)
--DELETE FROM COURRIER_ENSEMBLE  where ENSEMBLE_NUM='cl1001900374 '  AND COURRIER_ID=4777372
ENSEMBLE_NUM	COURRIER_ID	DESTIN_TYP	MOTIF_COD	RELIV_DAT	AFFICHE_ORD	PALETTES
cl3001700672    	3925471	NULL	NULL	NULL	30	NULL
cl3001700672    	3927012	NULL	NULL	NULL	29	NULL

SELECT  courrier_ensemble.destin_typ ,
           declaration_v.courrier_id as 'courrier_id',
           declaration_v.numero as 'numero',
           declaration_v.date as 'date',
           declaration_v.colis as 'colis',
           declaration_v.poids as 'poids',
           declaration_v.expediteur as 'expediteur',
           declaration_v.destinataire as 'destinataire',
           declaration_v.port as 'port',
           declaration_v.payement as 'payement',
           courrier_retour_fonds_v.espece as 'espece',
           courrier_retour_fonds_v.cheque as 'cheque',
           courrier_retour_fonds_v.traite as 'traite',
           courrier_retour_fonds_v.bl as 'bl',
           courrier_ensemble.affiche_ord as 'affiche_ord',
           1 as 'regle',
           case when port='D' and payement='G' then decmtfacture_v.montant_ht + decmtfacture_v.montant_tva else 0 end as 'ttc_du',
           courrier_ensemble.courrier_id ,
           courrier_ensemble.ensemble_num ,
           courrier_ensemble.motif_cod ,
           courrier_ensemble.reliv_dat ,
           courrier_ensemble.palettes as 'palettes_reel',
           courrier_ensemble.palettes as 'palettes_ret'    
        FROM courrier_ensemble ,
           declaration_v ,
           courrier_retour_fonds_v ,
           decmtfacture_v     
        WHERE ( courrier_ensemble.courrier_id = declaration_v.courrier_id ) and          ( declaration_v.courrier_id = courrier_retour_fonds_v.courrier_id ) and        
		  ( courrier_retour_fonds_v.courrier_id = decmtfacture_v.courrier_id ) and          ( ( courrier_ensemble.ensemble_num = 'cl3001700672' ) )  

		  Merci de modifier l  agence de la caisse 503520 lire oujda au lieu de ouarzazate
		  
		  select * from AGENCE where AGENCE_LIB like   '%ou%' or AGENCE_LIB like 'oujda' 705 400
		  
		  select * from CAISSE_DEPENSES where JOURNAL_NUM in  ('503520')   ---('100170003','100170005','100170021','100170029','800170020')
		  update CAISSE_DEPENSES set AGENCE_COD=400 where  JOURNAL_NUM in  ('503520')
		  
		  update 
		   CAISSE_CENTRALE  set date_cloture='18/04/2017 15:25' where JOURNAL_NUM in  ('100170023')  ---100170004','100170005','100170021','100170029','800170020')


		   select * from update TRANSPORTE  set KM_DEPART='404200'  where VOYAGE_NUM='1001701682' 

		   update declaration_v set code_expediteur='11753' where numero='B00928628'

		   select * from COURRIER_HIST where cou

		   select * from declaration_v where numero='B00925889'

		   select * from client where client_id=2926121
		   select * from cheque where  Cheque_num='57605' 
		   update cheque set impression_dat=null   where  Cheque_num='57605' 


		   select * from   CAISSE_DEPENSES  where JOURNAL_NUM='501517' 


		   select * from LIVRAISON l where l.COURRIER_ID=3909228
		   CL1101700182    	3909228	NULL	NULL	NULL	21	NULL

		   select * from utilisateur where USER_LOGIN like '%coudou%'

		  -- select * from 
		   -- delete from COURRIER_ENSEMBLE where COURRIER_ID=3909228 and ENSEMBLE_NUM='CL1101700182' 
		      
		    select * from ENSEMBLE where ENSEMBLE_NUM='CL1101700182'

			select * from ETATS e where e.GRP_ETAT_ID=19 


			select * from  COURRIER where COURRIER_NUM='B00928628' 

			select * from    INTERVIENT   where COURRIER_ID=3938982 and client_id =       2926121 

		--	update  INTERVIENT  set client_id =1639 where COURRIER_ID=3938982 and client_id =  2926121       


			select * from client where client_cod ='1639'        4178068 



			
			insert into [vexdbsen].dbo.situation
			select   *  from  [vexdbsen].dbo.situation

			select   *  from [vexdbsentest].dbo. employe where matricule in ('1','4')

create vues BA_DETAILS
			select * ,( SELECT count(*) FROM BA_DETAIL_FACT
WHERE parent_cod = BA_DETAIL.parent_cod AND CLIENT_COD =BA_DETAIL.code_client ) as nb_facture 

    from BA_DETAIL    


	select * from secteur


	select *
	  delete 
		from est_attache
		where
		secteur_cod ='02' and
		attache_typ = 'C' and EMPLOYE_ID=89;


		select * from ville where ville_lib like 'MOHAMMEDIA'   
SELECT * FROM CAISSE_CENTRALE 
where JOURNAL_NUM  in ('10017004','10017005','100170020','100170021','100170023','100170043','100170044'   )




select 
 caisse_valid_v.caisse_regule as 'ajouter'    
        FROM  caisse_valid_v 
		where JOURNAL_NUM='210170041'

 --merci d'enlever le régule entre la caisse 430170042 et 430170048
 410170179 et 410170167
 300170209 et 300170205

 merci denlever le régule des caisses 600170242 et 600170243
 350170283 -350170275

 550170172 et 550170184
 300170267 pièce 60630
 
--merci de dégénérer la caisse 600180223 et dannuler le régule entre la caisse 600180222 et 600180223
--merci d'annuler le régule entre la caisse 430190046 et 430190055



select * from  caisse_c_detail  where caisse_c_detail.JOURNAL_ID in (select JOURNAL_ID from CAISSE_CENTRALE where JOURNAL_NUM='800190179') and mvt_cod='RCRD' RCRD RCRA--and PIECE='430170048'
 
  update caisse_c_detail set PIECE=null ,MONTANT=0 ,MVT_DAT=NULL,mode=NULL,banque=NULL   where  PIECE='800190179' and mvt_cod='RCRa'

  in  (select JOURNAL_ID from CAISSE_CENTRALE where JOURNAL_NUM='800190176') and mvt_cod='RCRD'

 update caisse_c_detail set PIECE=null ,MONTANT=0 ,MVT_DAT=NULL,mode=NULL,banque=NULL   where  caisse_c_detail.JOURNAL_ID 
  in  (select JOURNAL_ID from CAISSE_CENTRALE where JOURNAL_NUM='800190179') and mvt_cod='RCRA'

select * from employe where nom like '%OUISROUTEN%'

select * from UTILISATEUR where EMPLOYE_ID=11946



select  EMPLOYE_ID from EMPLOYE where MATRICULE='1483'

	select e.NOM,e.PRENOM from COURRIER c join COURRIER_ENSEMBLE ce on c.courrier_id=ce.courrier_id
			join MANIPULE m on m.ENSEMBLE_NUM=ce.ENSEMBLE_NUM
			join employe e on e.EMPLOYE_ID=m.EMPLOYE_ID
			where c.courrier_num in ('B00817242') and manipulation_typ='RA'


update m set m.EMPLOYE_ID=1075 from COURRIER c join COURRIER_ENSEMBLE ce on c.courrier_id=ce.courrier_id
			join MANIPULE m on m.ENSEMBLE_NUM=ce.ENSEMBLE_NUM
			join employe e on e.EMPLOYE_ID=m.EMPLOYE_ID
			where  c.courrier_num in ('B00817242' ) and manipulation_typ='RA'




select * 
---update   Cheque set impression_dat=null where cheque_num='57835'



select * from ville where ville_lib like '%SKHIRAT%'

update COURRIER set   courrier_eta ='7' 	where
						courrier.courrier_id=4067932 in ('C00010942')
						'B00955854',
						'B00828100',
						'B01046398',
						'b01026036',
						'999b01000501',
						'B00967732',
						'B01086071')

insert into LIVRAISON 
   select courrier_id,'CL1001708510',4,'21/09/2017',	NULL,	NULL	,NULL,     	NULL,	NULL	,NULL,	NULL,	NULL from COURRIER where
						courrier.courrier_num in (
						'B00955854',
						'B00828100',
						'B01046398',
						'b01026036',
						'999b01000501',
						'B00967732',
						'B01086071')

						COURRIER_ID	ENSEMBLE_NUM	ETAT_FINAL	ETAT_DAT	TYPE1	TYPE2	NUMERO2	NUMERO3	DESCRIPTION	DOSSIER	COMPLEMENT	COLIS
548383	CL1003098       	4	2003-11-14 14:15:56.683	NULL	NULL	55599903541     	NULL	NULL	NULL	NULL	NULL

						select top 10 * from LIVRAISON where  courrier_id=4068365
						
						select * from 
						update ENSEMBLE  set ensemble_eta='O' where ENSEMBLE_num='CL1001708510'



						select * from ville where ville_lib like '%rabat%'
						select * from AGENCE where agence_cod='500'


						select * from DISTANCIER d where d.AGENCE_COD=102 and d.VILLE_COD=230

						select * from INTERVILLES i where  i.ville1_cod=230 and ville2_cod=700

						
select    max( intv.distance) from INTERVILLES intv where intv.ville1_cod=102 and intv.ville2_cod=230 -- or  (intv.ville2_cod=102 and intv.ville1_cod=230) 

						
update ensemble
set ensemble_eta = 'O'  
where ensemble_num = 'CL1001709000'

select ce.* from ENSEMBLE e join COURRIER_ENSEMBLE ce on e.ENSEMBLE_NUM=ce.ENSEMBLE_NUM where ce.ensemble_num = 'CL1001709000'

 update ce set  ce.DESTIN_TYP=null from  ENSEMBLE e join COURRIER_ENSEMBLE ce on e.ENSEMBLE_NUM=ce.ENSEMBLE_NUM where ce.ensemble_num = 'CL1001709000'

--select * delete from LIVRAISON where COURRIER_id in (select COURRIER_id from COURRIER where COURRIER_NUM='999B00983304')



update COURRIER set   courrier_eta =8 	where
						courrier.courrier_id=4078279

select * from livraison where COURRIER_id=4062895
					insert into livraison
						(
							courrier_id,
							ensemble_num,
							etat_final,
							etat_dat,
							numero2
						)
						values
						(4062895,
						'CL1001709000'
						,3,
						getdate()
						,'777999999B01009258')
						bonjour, merci de modifier le code camion relatif a la feuille de route 1001704907 mettre 375 au lieu de 364. cdt
						select * from --bonjour, merci de modifier le code camion relatif a la feuille de route 1001704990 mettre 381 au lieu de 375. cdt
						--update transporte set vehicule_num='381'
					 	 where VOYAGE_NUM='1001704990'
						  




						 update CAISSE_DEPENSES set JOURNAL_ETA='O' where journal_num in (22153 , 101696)

						 select * from courrier where courrier_num='C00148228'
						 select * from COURRIER_ENSEMBLE where courrier_id=4208383 and ENSEMBLE_NUM='CL1001712291'
						 999999b01070701 établie dans le CL1001712291 

						 update  COURRIER_ENSEMBLE set DESTIN_TYP=4 where courrier_id=4135783 and ENSEMBLE_NUM='CL1001711816'

						 select * from 
						 update LIVRAISON set ETAT_FINAL=4 where courrier_id=4135783



						 select * delete from COURRIER_BORDEREAU where BORDEREAU_NUM='54180'

						 --54180	2017-10-31 14:53:12.307	600 	89	CR	O	0
						 select *  delete  from  BORDEREAU where BORDEREAU_NUM='54180'


						 select * from update PRODUIT set MONTANT_HT=0 where COURRIER_ID=4222883 and PRODUIT_COD='RELA'



						-- delete from   courrier where courrier_num in ('555999C00021150', '555999B00920238')


--merci de enlevé les expd c00127240 dans le bord n 57118

-- delete from retour_fonds_confirme where  COURRIER_id in (select COURRIER_id from COURRIER where COURRIER_NUM='c00127240')


--**********************
-- Changement de chauffeur de feuille de route
--**********************
select * from Transporte 
--update Transporte set EMPLOYE_ID=(select employe_id from EMPLOYE where MATRICULE='1975')
--update Transporte set agence_terminus=150
where voyage_num='4102100081' 

select * from ensemble
--update ensemble set AGENCE2_COD=150
where ensemble_num='FC5002100277'




