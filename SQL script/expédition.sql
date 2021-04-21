
select v.* from client cl , cli_radr v where cl.client_id =v.client_id and client_cod ='14051' and v.agence_cod in ( select agence_cod from utilisateur_agence where utilisateur_agence.user_id =1 ) 
merci de saisir le code 7365 pour la déclaration c00365694

Merci de modifier le nom expediteur PROTEC  au lieu dePROTECO de la declaration C00613172
c00867684 c00867681
 1001027 mettre C01001027
select top 10* from declaration_v where numero in ('e00501736') 
select top 10* from declaration_v where numero in ('c01049165 ') 
 select top 10*from COURRIER WHERE COURRIER_NUM='C01012581' 
 C01012581 (erroné) PAR C00968651 
 --update COURRIER set COURRIER_NUM ='C00968651'  where  COURRIER_ID=5258771
 --update COURRIER set VALEUR_DECLAREE=36883  where  COURRIER_ID=56456456456

SELECT * FROM AGENCE 

select top 10 * from client  where NOM like '%C.A.P.C.I%'

 -----------------------------client modifier

 select  top 10* from  client where CLIENT_COD=14726    
 select  top 10* from  client where NOM LIKE '%issam boulakhrif%'            
  select  top 10* from  client where client_id in (5397555)
  --update client set nom= 'MR4191 - ABDARRINE ABDARRINE SOUHEIL'  where client_id in (5398033)
 select top 10 * from intervient where COURRIER_ID in('5096744') and INTERVENTION_TYP='DE'
  update intervient set INTERVENTION_DAT='28/01/2019'  where  COURRIER_ID=4271209
  select * from declaration_v where numero like ('%c01161483%') 

    select * from declaration_v where expediteur like ('%systemes mesures%')


 --update intervient set client_id=5033100 where COURRIER_ID in('5096744') and INTERVENTION_TYP='De'
  
 ------------------------------------------ville modifier------------------------------------------------------
 C01135053 merci de changer la destination de cette expédition el jadida au lieu de casa.
 SELECT top 10* FROM VILLE WHERE
 VILLE_LIB LIKE '%el j%'
 select * from courrier c
 --update intervient set VILLE_COD=110    where COURRIER_ID in('5336113') and INTERVENTION_TYP='DD'
 SELECT TOP 10*  FROM  intervient  where COURRIER_ID in('5048563') and INTERVENTION_TYP='DD'
 
 --update [COURRIER_AGENCE] set AGENCE_COD= 110  where COURRIER_ID in (5336113) and INTER_TYP='a'
 SELECT * FROM [dbo].[COURRIER_AGENCE] WHERE --INTER_TYP='D' and  
 COURRIER_ID in (5048563)

select  top 10* from courrier where  COURRIER_NUM in('C01135053')

---Enlever une Déclaration d'un Bordereau CR " non pas cel du facture "
--------------------------------------------b00582217 de ce bordereau 49393 merci d'enlever cette b00644512 de ce bordereau 51609

declare @numero varchar(30) = 'c01132358'
declare @bordereau numeric(18,0)=63312
declare @id numeric(24,0)

select @id=courrier_id from courrier
where courrier_num=@numero

delete from courrier_bordereau
where bordereau_num=@bordereau and courrier_id=@id

update  retour_fonds_confirme set bordereau_num=null,CONFIRMATION_DAT=null where courrier_id=@id 
-----------------------------------------------------en gare domicile-----------------------------------

select * from declaration_v where numero LIKE 'cjhjk'
select top 10  * from courrier 
update courrier set livraison_cod='G' where  COURRIER_NUM ='54564sdf' --G engare D domicile
-----------------------------------------999 déclaration double----------------------------------------
999999999C01003961
999999999C01003962
c00991328

select * from declaration_v where numero LIKE '%999c00991328%'
--delete from courrier where  courrier_id =('5245558' )
courrier_id	numero	date	facture_id	colis	poids	palettes	coef	valeur	client1_id	code_expediteur	expediteur	client2_id	code_destinataire	destinataire	ville1_cod	ville2_cod	adresse1_id	adresse2_id	livraison	express	port	payement	courrier_typ	vehicule_typ	service	courrier_eta	date_saisie	complement	userid	client_eta	nature	retour	payeur_id
5245453	999999999C010039	2019-12-03 00:00:00.000	NULL	1	2.000	0	0.00	0,00	5301736	0       	AGZ	1457649	7452    	UFC	607 	500 	3733502	573037	D	S	D	C	M	NULL	0	E	2019-12-03 00:00:00.000	NULL	370	0		2	1457649
5245558	999999999c010039	2019-12-03 00:00:00.000	NULL	1	2.000	0	0.00	0,00	5301740	0       	GENA CONFECTION	1457649	7452    	UFC	601 	500 	3733506	573037	D	S	D	C	M	NULL	0	E	2019-12-03 00:00:00.000	NULL	370	0		2	1457649
----------------------------------------------souk

--clienid 3401715 C00349287 C00349289 C00349300 C00574802
--

--
--

select  top 10* from intervient where  COURRIER_ID in('4906093') and  INTERVENTION_TYP='DE'
--update intervient set ville_cod=170 where COURRIER_ID in('4906093') and INTERVENTION_TYP='DE'
--update intervient set CLIENT_ID=1476452 where COURRIER_ID in('4589220','4592496','4733255','4684310') and INTERVENTION_TYP='DE'
select top 10 * from COURRIER_AGENCE  where COURRIER_ID in('5037988') 
--update COURRIER_AGENCE set agence_cod=170 where COURRIER_ID in('5037988') and INTER_TYP='D'
select top 10 * from ville where VILLE_lib like '%casa%'

select * from agence
-------------------------------- expédition--RAMASSEUR
--ramasseur--------------------------------------------

veuillez remplacer ces deux numéros du 2468 au 2344 : C00860033 + C00860034
--update MANIPULE set employe_id=(select employe_id from  employe where matricule='1483' ) where ensemble_num='CG6001814032' 
select *
--update m1 set m1.employe_id=(select employe_id from  employe where matricule='2217' ) from MANIPULE m1 inner join
 [COURRIER_ENSEMBLE] on [COURRIER_ENSEMBLE].ensemble_num=m1.ensemble_num
inner join [COURRIER] on [COURRIER].COURRIER_ID=[COURRIER_ENSEMBLE].COURRIER_ID
where   MANIPULATION_TYP='RA' and COURRIER_num in('C01091402'),'c00944727')

select * from courrier where COURRIER_num='C01248897' 
du 2217 au 2694 C01091402
select * from MANIPULE where ensemble_num='CG6001814032       ' 
select top 10* from [COURRIER_ENSEMBLE] where COURRIER_ID =5256968

delete from  MANIPULE where ensemble_num='CG60019HJJJHJJJ06524    ' and  EMPLOYE_ID=11750
--------------------------------Pointeur expédition--------------------------
select top 10 * from [dbo].[CONTROLE] where  ENSEMBLE_NUM='CG1002015346' and matricule=2457
insert into [CONTROLE] values (406,'CG5001907319','','PR')
--delete from [dbo].[CONTROLE] where  ENSEMBLE_NUM='CG6501701890' and matricule=2457
select top 10 * from courrier  where courrier_num='B00851452'
select top 10* from employe where  nom like '%HARROUCH%'matricule='2236'  
update employe set sortie_dat=null where employe_id=659
select top 10* from  MANIPULE   where ensemble_num='CG1002015346' and employe_id= 11790
select top 10* from [dbo].[COURRIER_ENSEMBLE]  where ensemble_num='CG1002015346 ' and COURRIER_ID=
5317207
--delete from  MANIPULE   where ensemble_num='CG10015111151' and employe_id= 11790
------------------------------------------ramasseur-----------------------------------------------------------
 update   MANIPULE set   MANIPULE.employe_id=(select employe_id from  employe where matricule='178' )
 from
      declaration_v  inner join 
			COURRIER_ENSEMBLE on declaration_v.COURRIER_id = COURRIER_ENSEMBLE.COURRIER_id INNER JOIN
         ENSEMBLE ON COURRIER_ENSEMBLE.ENSEMBLE_NUM = ENSEMBLE.ENSEMBLE_NUM INNER JOIN
         MANIPULE ON ENSEMBLE.ENSEMBLE_NUM = MANIPULE.ENSEMBLE_NUM   where expediteur like '%STORTIS%' 

-----------------------

----------------------------------------------------------ramasseur carnet ramassage du 699 au 1249.
select * from RAMASSE 
--update ramasse set chauffeur=(select employe_id from EMPLOYE where MATRICULE='2697 ') where RAMASSE_NUM='CB1002000571 '
        
where RAMASSE_NUM in  ('CB1002000571')
    select * from EMPLOYE where MATRICULE='1933'
	veuillez remplacer le carnet du ramassage : CB1001909364 du 2164 au 2682

	veuillez remplacer le carnet du ramassage : CB100200057 DU 1933 AU 2697. Le carnet : cb1002000562 du 2164 au 1933.
------------------------------
-----------------------------------------pointeur                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
select top 10 * from COURRIER where COURRIER_num='e00501736'
select * from COURRIER_ENSEMBLE where COURRIER_ID=4059344

select top 10 * from  ENSEMBLE where  ensemble_num='CG10019238978'
select * from agence 
select top 100 * from CONTROLE where  ensemble_num='CG10019238978'
update  CONTROLE set EMPLOYE_ID=(select EMPLOYE_ID from EMPLOYE where MATRICULE= '2273' ) where  ensemble_num='564654'
-------------------------------------------------

EMPLOYE_ID	VEHICULE_NUM	ENSEMBLE_NUM	MANIPULATION_DAT	MANIPULATION_TYP
11966	                	CG6501701890    	2017-03-08 16:44:19.510	RA
SELECT	ENSEMBLE.ENSEMBLE_NUM, 
			ENSEMBLE.ENSEMBLE_DAT, 
			MANIPULE.MANIPULATION_DAT, 
			EMPLOYE.NOM, 
			EMPLOYE.PRENOM, 
			EMPLOYE.MATRICULE, 
			VEHICULE.VEHICULE_NUM, 
         VEHICULE.MATRICULE

FROM            
			COURRIER_ENSEMBLE INNER JOIN
         ENSEMBLE ON COURRIER_ENSEMBLE.ENSEMBLE_NUM = ENSEMBLE.ENSEMBLE_NUM INNER JOIN
         MANIPULE ON ENSEMBLE.ENSEMBLE_NUM = MANIPULE.ENSEMBLE_NUM INNER JOIN
         EMPLOYE ON MANIPULE.EMPLOYE_ID = EMPLOYE.EMPLOYE_ID LEFT OUTER JOIN
         VEHICULE ON MANIPULE.VEHICULE_NUM = VEHICULE.VEHICULE_NUM
WHERE        (ENSEMBLE.ENSEMBLE_TYP IN ('CB', 'CG')) AND (COURRIER_ENSEMBLE.COURRIER_ID = 4747983) 
------------------------------------annulée la livraison expédition 
 declare @numero varchar(30) = 'c00991328'
declare @cl varchar(30) = 'CL3501700183'
declare @id numeric(24,0)
select @id=courrier_id from courrier
where courrier_num=@numero

select top 10* from courrier_ensemble where courrier_id = @id
select top 10* from livraison where courrier_id = @id

--update courrier_ensemble set DESTIN_TYP=12 where ENSEMBLE_NUM ='CL1001811942' and courrier_id =@id

--delete from livraison where courrier_id=@id



COURRIER_ID	ENSEMBLE_NUM	ETAT_FINAL	ETAT_DAT	TYPE1	TYPE2	NUMERO2	NUMERO3	DESCRIPTION	DOSSIER	COMPLEMENT	COLIS
5211972	NULL	2	2019-11-13 08:05:18.720	NULL	NULL	999C00991328    	999             	NULL	NULL	NULL	0
--------------------------------------------------ville date-------------------------------------------------------------------------
select top 10* from ensemble where ENSEMBLE_NUM in ('FC1001902861')
update ensemble set ENSEMBLE_DAT   ='04/01/2019 23:44' where ENSEMBLE_NUM = ('FC1001900035')

--------------------------------------------------Feuille de route chauffeur fr -----------------------------------------------------

	 select top 10* from  TRANSPORTE where 	   VOYAGE_NUM like '%4102000062 %'
	 update  TRANSPORTE set EMPLOYE_ID=( select EMPLOYE_ID from employe  where MATRICULE='1975') where 	   VOYAGE_NUM='4102000062'


	  update  TRANSPORTE set KM_DEPART=317085 where 	   VOYAGE_NUM='1001902991'
	 select * from employe  where MATRICULE='1686'
	 
	 select top 10* from employe  where employe_id='12065 '
	 merci de changer le code ch 306 au lieu 2651 fr 1002000213
	 merci de rendre la feuille de route n° 4102000062 , au nom de zidar driss code (1975) , au lieu de idrisi ali 1516. motif : erreur de saisie merci
---------------------------Modifier Agence Feuille de Route------------------------------------------------------------------------------
select * from transporte
--update transporte set agence_terminus='650' where voyage_num in('1001905492 ')

where voyage_num in('1001905492 ')

select * from ville where ville_lib like '%ke%'
                                  --agence terminus sur vex
select*  from  ensemble where ENSEMBLE_NUM='FC1001905756       '  
update ensemble set AGENCE2_COD=650 where ENSEMBLE_NUM='FC1001905756'   
-------------------------------------changer type expédition-----------------------
L AFFR
A
C COUR
M MESSAG
select DISTINCT TOP 10 COURRIER_TYP from courrier where courrier_num='C00401052 ' 
select top 10 * from courrier where courrier_num in ('c00991328 ') 
update courrier set COURRIER_TYP='L'  where COURRIER_ID=4757132
select * from employe where matricule ='2585'

select * from utilisateur where employe_id =11686
select * from employe where employe_id =11686
select * from utilisateur where user_id =1
-----------------------------------------re calculer facture---------------------------------
select * from facture where FACTURE_NUM='15010004081 '1095585
select * from facture where FACTURE_ID=1095585



update encombrement_courrier set enc=0 from COURRIER c join encombrement_courrier  where FACTURE_id=1063799

select encombrement_courrier.* from encombrement_courrier  
left join COURRIER c  on  c.courrier_id=encombrement_courrier.courrier_id 
 where  c.FACTURE_id= (select FACTURE_ID from facture where FACTURE_NUM='15019000061' and facture_typ='FA')


select  * from COURRIER where facture_id =1063799

select top 10* from  encombrement_courrier where courrier_id=



select * from PRODUIT into tmp_produit_encombrement_courrier 
delete produit 
ps_taxation


merci de re-calculer les factures ci-dessous sans encombrement : - 15018006335 - 15018006973 - 15018006333 - 15018006971
--------------------------------------------intégrer une déclaration sur la facture 


	select top 10* from facture where FACTURE_NUM='15019006180 '
	select top 10* from declaration_v where numero= 'C00684394'
		select * from PRODUIT_FA where FACTURE_ID=1198973
		select * from produit where COURRIER_ID=   5076384 
			select * from courrier where COURRIER_ID=   5075625 

	--insert into PRODUIT_FA values 	(5076384,1177988,	1,'TR'  	,1800,	252,	14)

   --update facture set FACTURE_HT=231227,FACTURE_TVA=32371.78 where FACTURE_ID=1198973 and FACTURE_TYP='FA'
   	
	--update courrier set FACTURE_ID=1177988 where COURRIER_ID=   5076384 

	--update PRODUIT_FA set MONTANT_HT=231227,MONTANT_TAX=32371.78 where COURRIER_ID=   5075625 and FACTURE_ID=11989455454573




-----------------------------------------------------droit-utilisateur-chercher client
select * from [dbo].[UTILISATEUR]
select * from employe where nom like '%AZ%'
12199	2692      	AZZEDINE	MOHAMED
select * from utilisateur where employe_id = 12199
select * from [dbo].[DEV_PARAM_USER] wherE USER_ID= 549
select * from [DEV_PARAM_USER2]
drop table [DEV_PARAM_USER2]
insert into [DEV_PARAM_USER2]  select * from [dbo].[DEV_PARAM_USER] wherE USER_ID=457 

--update [DEV_PARAM_USER2] set USER_ID=511 wherE USER_ID=457 

insert into [DEV_PARAM_USER]  select (select USER_ID from utilisateur wherE USER_ID= 551 ),TABLE_ID,COL_ID,	U_VISIBLE,	U_ORDER  from [dbo].[DEV_PARAM_USER] wherE USER_ID=1 

select * from [DEV_PARAM_USER] where USER_ID= 36
insert into [VEXINITIAL].[dbo].site_gasoil  select * from [VEXINITIALTEST1].[dbo].site_gasoil

------------------------------------------droit recherche client agence------------------------------------------------------

select * from [dbo].[UTILISATEUR] where user_id=551
select * from [dbo].[UTILISATEUR_AGENCE] where user_id=1
insert into [UTILISATEUR_AGENCE] values (519,100)
select * from agence  
insert into [UTILISATEUR_AGENCE] select (select USER_ID from utilisateur wherE USER_ID= 551 ), agence_cod from [UTILISATEUR_AGENCE] wherE USER_ID= 1
----------------------------------

----------------------------------------------------------

-------------------------------avoir date-----numéro
N°15019000259 AV N°15019000260 AV N°15019000261 geste commercial au lieu de erreur de taxation
--suite a une erreur de saisie :annuler l'avoir N° 15019001081 sur la acture N° 15019001202
select * from facture where FACTURE_NUM in ('15019007316') and facture_typ='fa'
select * from facture where FACTURE_NUM in ('15019002129  ') and facture_typ='av'
 
 select top 10* from FACTURE_SOUCHE where FACTURE_NUM in ('15019002129 ') and facture_typ='av'
 
 select top 10* from FACTURE_SOUCHE where  FACTURE_NUM in ('15019007316') and facture_typ='fa'


 update facture set FACTURE_DAT ='30/10/2019 00:00:00' where  FACTURE_NUM in ('15019006929 ') and facture_typ='fa'

 select * from facture where  FACTURE_ID=1208216
 AFFECTER LES AVOIRS N° 15019002128 ET 15019002129 à la facture N° 15019007316

 update facture set FACTURE_ID=1208216 /*,FACTURE_IND=3*/ where  FACTURE_NUM in ('15019002129  ') and facture_typ='Av'
  --delete from facture where FACTURE_NUM in('15019001349') and facture_typ='Av'

  select * from facture where month ( date_cloture )=6  --and day( date_cloture )=15  
  and 
   year ( date_cloture )=2019 and  facture_typ='Av'



    select * from facture where month ( FACTURE_DAT )=10 -- and day( date_cloture )=15
	 and  year ( date_cloture )=2019 and  facture_typ='AV'

	

	--update facture set DATE_CLOTURE='19-11-2019 13:43:50.550' where   FACTURE_NUM in   ('15019006929 ')and facture_typ='AV'


('15019001023 ',
 '15019001027 ',
 '15019001024 ',
 '15019001026 ',
 '15019001025 ',
 '15019001028')
 


  		 select distinct month ( date_cloture ) from facture where year ( facture_dat ) =year ( '1-6-2019 0:0:0.000' ) 
		 and month ( facture_dat ) =month ( '1-6-2019 0:0:0.000' ) and date_cloture is not null 


 ----------------------------------------

delete from facture where FACTURE_NUM in ('15019001081') and facture_typ='AV'


FACTURE_ID	FACTURE_IND	FACTURE_NUM	FACTURE_TYP	FACTURE_DAT	FACTURE_HT	FACTURE_TVA	NON_IMP	RABAIS_TAU	REGLE	IMPRESSION_NB	DATE_CLOTURE	DATE_IMPORTATION	USER_ID	indice	CA_Num
1136147	2	15019000521	AV	2019-04-08 17:15:58.967	-8400,00	-1176,00	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL
2019-01-10 17:15:55.760

--update facture set FACTURE_DAT='07/05/2019'  where FACTURE_NUM in('15019002544','15019002546') and facture_typ='FA'
--update facture set FACTURE_ID='991982' where FACTURE_NUM='15018000935' and facture_typ='AV'
15/11/2016 19:15:31:513
--'avoir n°15019000729 (client HORTI SUD) par: -HT =3393,68 -TVA=475,11 -TTC=3868,80


--annuler l'avoir N° 15019000872 sur facture N° 15019002538
--L'intégration du CA MAI n'est pas encore effectué merci de modifier le montant de l'avoir N° 15019000889 comme 
suit : HT=	-902,27 TAV 14% = -126.31 TTC = - 1028.58 à ne pas oublier la date de clôture

update facture set FACTURE_HT=-902.27,FACTURE_TVA=-126.31 where FACTURE_NUM='15019000889' and facture_typ='AV'
--select *from facture where FACTURE_NUM='15019000889' and facture_typ='AV' and cast(FACTURE_DAT,year)=2018
delete from facture where FACTURE_NUM='15020000250' and facture_typ='AV' 
select max(FACTURE_NUM) from facture where facture_typ='AV' and cast(FACTURE_DAT as year)=2018

select top 1000* from facture where facture_typ='AV'  order by FACTURE_DAT desc  and      cast(FACTURE_DAT as year)=2018

select *from facture where FACTURE_NUM in('15018004798 ' ) and facture_typ='fa'
select * from facture where FACTURE_NUM='15020000250' and facture_typ='AV'
FACTURE_ID	FACTURE_IND	FACTURE_NUM	FACTURE_TYP	FACTURE_DAT	FACTURE_HT	FACTURE_TVA	NON_IMP	RABAIS_TAU	REGLE	IMPRESSION_NB	DATE_CLOTURE	DATE_IMPORTATION	USER_ID	indice	CA_Num
1224565	3	15020000250	AV	2020-01-23 20:11:06.190	-252,63	-35,3682	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL
select * from facture where FACTURE_ID=1019918 

update facture set FACTURE_ID='1019918' where FACTURE_NUM='15018001511' and facture_typ='AV'


1019918

select * from facture where FACTURE_NUM in  
('15019001023',
'15019001027',
'15019001024',
'15019001026',
'15019001025',
'15019001028') and facture_typ='AV'

update facture set FACTURE_DAT ='31/05/2019'  where FACTURE_NUM  in
('15019001023',
'15019001027',
'15019001024',
'15019001026',
'15019001025',
'15019001028') and facture_typ='AV'

FACTURE_NUM	FACTURE_TYP	FACTURE_DAT	FACTURE_HT
15019001057	AV	2019-05-31 18:28:32.650	-19515,6588
15019001054	AV	2019-06-11 16:01:17.460	-426,491
15019001055	AV	2019-05-31 18:28:32.650	-13749,6751
15019001056	AV	2019-05-31 18:28:32.650	-10078,18

 --update facture set FACTURE_NUM='15018001993' where FACTURE_NUM='15019000061' and facture_typ='AV' and FACTURE_ID =1096540
 --update COMPTEUR_AGENCE set COMPTEUR2='1994' where  AGENCE_COD=150  and COMPTEUR_CD='AV' 
select * from COMPTEUR_AGENCE where AGENCE_COD=150 and COMPTEUR_CD='AV'
15018001906
---------------------------------------avoir modifier motif
--bonjour, merci de changer le motif d'avoir N°15019000382 (client BSH) par le motif Erreur de facturation
select * from [dbo].[motif]
 15019001186 et 15019001187 
  select top 10* from validation_facture where avoir_num=15019001187       15019000421 15019000422
   --update  validation_facture set id_motif=6 where id=(select id from validation_facture where avoir_num=15019001186)

   changer motif de l'avoir N° 15019001118 comme suit : prestation non effectuée au lieu de geste commercial // et changer le motif de l'avoir N°15019002406 par '' pour refacturer ""
------------------------------------------------------caisse depenses caisse dépense

bonjour, merci de modifer la date des caisses depense suivantes 500091031 500091032 500091035 mettre le 29/06/2019
bonjour, merci de modifier la date des caisses depenses suivantes: ('200190094'), '500090917', '500090918' ,'500090914', '500090912' ,'500090911', '500090913' ,'500090910' ,'500090909', '500090966') mettre le 30/04/2019 et degenerer la caisse depense 500090966
--------------------------------pour degenere la caisse depenses 
 500091327 mettre le 01/02/2020 au lieu de 03/01/2020
select * from caisse_depenses
bonjour, merci de modifier la date de la caisse depense 500091392 mettre le 31/01/2020
--update caisse_depenses set journal_eta='O' where journal_num in ( '500091163')
--update  caisse_depenses set journal_dat='01/02/2020' where journal_num in  ('500091327') ,'500091117') ,'500091030'), '500090917', '500090918' ,'500090914', '500090912' ,'500090911', '500090913' ,'500090910' ,'500090909', '500090966')  ('500090965') ( '500090887','500090886')
where journal_num LIKE ('120190288%'), '500090917', '500090918' ,'500090914', '500090912' ,'500090911', '500090913' ,'500090910' ,'500090909', '500090966') ( '500090965')
bonjour, merci de modifier la date des caisses depense suivantes: 500091116 500091117 mettre le 31/08/2019

bonjour, merci de modifier la date de la caisse depense 500090971 mettre le 01/06/2019 au lieu de 20/05/2019 merci

300190115 300190117
-----------------------------N° de bordereau des factures suivantes-----------------------------

select bordereau_num, FACTURE_NUM from facture inner join facture_bordereau on facture_bordereau.facture_id=facture.FACTURE_ID
 where FACTURE_NUM in (15017006265 ,15017006266 ,15017007004, 15017007015 ,15018003773, 15018003774, 15018003802, 15018003856 ,15018003866, 15018005820 ,15018005821, 15018005864)

 select top 10 * from  facture_bordereau
 select top 10* from facture
 --------------------------------------Déletrage des factures---délétrer les versements
 délettrer en urgence e versement N° 79477 ; nous venons de recevoir le lettrage ce matin client OCPM
 dé lettrer le versement N° 70303
 70565 et 70889 et 71440
 select * from client_versement
where vers_num =83913 
merci de delettrer le reglement 83253 et 83254
83178  83255  82907 71903  81905 81723
82070 
82025 

81304 

81441 81379 81280 81087
 73564 80818 67407 67407 71440 
 70889 70565 57125 79132 80466 
 79157 79156 79492 80274 80243 
 80103 79731 80067 63770 79778
 78611 75387 75387 75387 76685
72518 - 72919 - 74415 - 76685
 70565 et 70889 et 71440
----delete from client_versement where vers_num = 564564564564564  

VERS_NUM	VERS_DAT	CLIENT_ID	MONTANT	MODE	BANQUE_COD	PIECE	ECHEANCE	LETTRE	DATE_BANQUE	REMISE_NUM	REMISE_DAT	BANQUE_CD	IMPAYE	USER_ID	facture_id	Date_Cloture	Date_Export	agent_id	responsable_id
80274	2019-04-03 00:00:00.000	4039441	1492,70	TRA	WAFA  	2798307	2019-03-31 00:00:00.000	N	NULL	NULL	NULL	NULL	NULL	36	NULL	NULL	NULL	13	11935
--/////////////////
80557 80558
s : 78035 74414 71345

 règlement N° 71561 
THERMOPLAST :  règlement N° 78458 /78260 / 79420

declare @vers_num numeric(16,0)
declare @date_cloture varchar(10)

set @vers_num=78458                  

select @date_cloture=convert(varchar(10),date_cloture) from client_versement
where vers_num =@vers_num

--if @date_cloture is null
--begin

update facture_souche set regle = 'N'--non litree si il est 'o' letree
from 
facture_souche fs,
regle rg
where 
rg.facture_id = fs.facture_id and
rg.vers_num=@vers_num
update client_versement set lettre = 'N' 
where vers_num=@vers_num 

delete regle where vers_num =@vers_num


end
else
print 'Versement cloturé'


-------------------------libérer facture
select  top 10 * from facture_souche where FACTURE_NUM= '15010004081 '
update facture_souche set regle = 'N'where FACTURE_NUM= '15010004081 '

select top 10 * from regle where FACTURE_ID=
1176531

select * from utilisateur 
-------------------------------------- si 'Versement cloturé'
declare @vers_num numeric(16,0)
declare @date_cloture varchar(10)

set @vers_num=80505  

select @date_cloture=convert(varchar(10),date_cloture) from client_versement
where vers_num =@vers_num

--if @date_cloture is null
--begin

update facture_souche set regle = 'N'--non litree si il est 'o' letree
from
facture_souche fs,
regle rg
where 
rg.facture_id = fs.facture_id and
rg.vers_num=@vers_num
update client_versement set lettre = 'N' 
where vers_num=@vers_num 

delete regle where vers_num =@vers_num
--------------------------------------------historique expédition
SELECT  		dec_hist_v.action_typ ,	dec_hist_v.action_dat , 	utilisateur.user_login ,	dec_hist_v.colis ,	dec_hist_v.poids,dec_hist_v.port,dec_hist_v.montant_ht,dec_hist_v.espece,dec_hist_v.cheque,dec_hist_v.traite,dec_hist_v.bl	
FROM 			dec_hist_v      
left join 	 utilisateur on dec_hist_v.user_id = utilisateur.user_id 
left join employe on utilisateur.EMPLOYE_ID = employe.EMPLOYE_ID 
WHERE          ( dec_hist_v.courrier_id = 5323418 )  

select * from dec_hist_v where dec_hist_v.courrier_id = 5097050

select  top 10* from courrier where COURRIER_NUM='E00501436 '



--delete courrier where COURRIER_ID=
5196206
				UPDATE 	  courrier SET POIDS=2350 where courrier_id=5134081 

					  select top 10 * from courrier_hist2 where courrier_id=5243622     
					    select * from courrier_hist2 where userid=549  and action_dat ='18-03-2019'
					  select top 10* from utilisateur where USER_LOGIN like 'm.bou%'
					 -- delete from courrier_hist2  where courrier_id in (select  courrier_id from courrier where COURRIER_NUM in('E00501442','E00501434') )        and userid=549
		
					  SELECT TOP 10 * FROM FACTURE WHERE FACTURE_ID=5134081
---------------------------------------------------------------- ICE client


							SELECT top 10* FROM CLIENT WHERe CLIENT_ID =2870444	  
					C01010106 000096648000095
								SELECT top 10* FROM CLIENT WHERe CLIENT_COD='10233' 
								SELECT TOP 10* FROM [dbo].[FACTURE_SOUCHE]  WHERE FACTURE_NUM='10019009365'
 5266749
 5266749
		--merci d'integrer ICE sur les qutre recepicer 002260154000094 C00815629 C00815628 C00815630 C00815631
	
							update CLIENT set  ice='000096648000095' where CLIENT_ID=2870444	

									update CLIENT set  nom='HEENA FASHION MOROCCO' where CLIENT_ID=5266749

									SELECT  TOP 10* FROM FACTURE WHERE FACTURE_NUM =60019002517
							SELECT  * FROM FACTURE f 
							join FACTURE_SOUCHE f0 on f0.facture_id=f.facture_id WHERE f.FACTURE_NUM=60019002517

								select * from declaration_v where numero in ('C01010106'),'C00815628','C00815630','C00815631')


								merci de modifier les reglement suivant a la date du 29/11/2019 83324-83334-83319-83331-83336-83335-
								83333-83332-83328-83329-83330-83320-83318-83327-83321-83322-83323-83325-83317-83326- 
								et modifier le reglement 83319 mettre : 10914.18 au lieu de 10914.81 dhs
					
----------------------------------------------------client du reglement 

select * from client_versement
 --update  client_versement set Date_Cloture=null where vers_num =83724
 --update  client_versement set CLIENT_ID=(select CLIENT_ID from client where CLIENT_COD='4789') where vers_num =84026
 --update  client_versement set PIECE='brd1572048' where vers_num =79826
 --update  client_versement set ECHEANCEhhj='13/07/2019'  where vers_num in  ('81431')
 --update  client_versement set MODE='TR' where vers_num =83724
  --update client_versement set BANQUE_COD='CIH' where vers_num =82310
  --update  client_versement set MONTANT=3237.37 where vers_num =83681   
   --update  client_versement set VERS_DAT='31/01/2020' where   VERS_DAT='03/02/2020' 
   --update  client_versement set DATE_BANQUE='29/01/2020' where vers_num in ('8375456424')
  --update  client_versement set ECHEANCE='31/12/2019' where vers_num in ('83724')
  -- 83178 et modifier le code 4789 a la place de 14262
where   vers_num in ('83399')
merci de modifier le reglement 84636 . mettre le code 14433 au lieu de 11433.
--nous avons remarqué que vous n'avez pas chagé la date des virements 84024 et 84028 du 13/01/2020 au 13/12/2019.
merci de modifier le reglement 84026 mettre le code client 4789 au lieu de 5174.
merci de modifier le reglement 94026 . mettre le code client 4789 au lieu de 5174
VERS_NUM	VERS_DAT	CLIENT_ID	MONTANT	MODE	BANQUE_COD	PIECE	ECHEANCE	LETTRE	DATE_BANQUE	REMISE_NUM	REMISE_DAT	BANQUE_CD	IMPAYE	USER_ID	facture_id	Date_Cloture	Date_Export	agent_id	responsable_id
83694	2019-12-24 00:00:00.000	4573245	30000,00	VIR	CDM   		NULL	N	NULL	NULL	NULL	NULL	NULL	538	NULL	NULL	NULL	12100	12100
merci de delettrer et modifier le reglement 83681. mettre 3237.37 au lieu de 3273.37.
VERS_NUM	VERS_DAT	CLIENT_ID	MONTANT	MODE	BANQUE_COD	PIECE	ECHEANCE	LETTRE	DATE_BANQUE	REMISE_NUM	REMISE_DAT	BANQUE_CD	IMPAYE	USER_ID	facture_id	Date_Cloture	Date_Export	agent_id	responsable_id
83836	2019-12-30 00:00:00.000	4107006	404243,43	VIR	CDM   		NULL	N	NULL	NULL	NULL	NULL	NULL	538	NULL	NULL	NULL	12143	12143
VERS_NUM	VERS_DAT	CLIENT_ID	MONTANT	MODE	BANQUE_COD	PIECE	ECHEANCE	LETTRE	DATE_BANQUE	REMISE_NUM	REMISE_DAT	BANQUE_CD	IMPAYE	USER_ID	facture_id	Date_Cloture	Date_Export	agent_id	responsable_id
83823	2019-12-30 00:00:00.000	3587507	3000,00	TRA	BMCE  	ELC 7211178	2019-12-30 00:00:00.000	O	NULL	NULL	NULL	NULL	NULL	535	NULL	NULL	NULL	66	66
select distinct MODE
from client_versement 
VERS_NUM	VERS_DAT	CLIENT_ID	MONTANT	MODE	BANQUE_COD	PIECE	ECHEANCE	LETTRE	DATE_BANQUE	REMISE_NUM	REMISE_DAT	BANQUE_CD	IMPAYE	USER_ID	facture_id	Date_Cloture	Date_Export	agent_id	responsable_id
83456	2019-12-10 00:00:00.000	1431827	3274,98	CHQ	BMCE  	3681311	NULL	O	NULL	NULL	NULL	NULL	NULL	538	NULL	NULL	NULL	13	12187
83457	2019-12-10 00:00:00.000	4236000	7418,93	CHQ	BMCE  	3681311	NULL	N	NULL	NULL	NULL	NULL	NULL	538	NULL	NULL	NULL	13	12187
merci de modifier le reglement 83381 mettre 15082.22 dhs au lieu de 8182,10 dhs
 04/10/2019
merci de modifier le reglement 81306 mettre le code client 13907 au lieu de 13097
merci de modifier les reglement suivant a la date du 31/05/2019 81111-81112-81113
select * from [dbo].[BANQUE]
insert into [BANQUE] values ('CIX','CaixaBank',0,null,null)
merci de modifier le reglement 80906 mettre 1306.40 dhs au lieu de 1306.10 dhs
VERS_NUM	VERS_DAT	CLIENT_ID	MONTANT	MODE	BANQUE_COD	PIECE	ECHEANCE	LETTRE	DATE_BANQUE	REMISE_NUM	REMISE_DAT	BANQUE_CD	IMPAYE	USER_ID	facture_id	Date_Cloture	Date_Export	agent_id	responsable_id
83384	2019-12-04 00:00:00.000	3406	197085,48	VIR	CDM   		NULL	O	NULL	NULL	NULL	NULL	NULL	36	NULL	NULL	NULL	12143	12143
--DELETE FROM client_versement WHERE VERS_NUM=83854   83456','83457 
   
VERS_NUM	VERS_DAT	CLIENT_ID	MONTANT	MODE	BANQUE_COD	PIECE	ECHEANCE	LETTRE	DATE_BANQUE	REMISE_NUM	REMISE_DAT	BANQUE_CD	IMPAYE	USER_ID	facture_id	Date_Cloture	Date_Export	agent_id	responsable_id
81231	2019-06-18 00:00:00.000	3051224	2263,50	CHQ	BMCE  	4434890	NULL	O	NULL	NULL	NULL	NULL	NULL	36	NULL	NULL	NULL	778	11747
select CLIENT_ID from client where CLIENT_COD='12692'
select top 10* from client where CLIENT_ID in ('3406','2918719')
2494060
delete from client_versement where vers_num =82025 
insert into client_versement values (79778	,'27/02/2019',	1184048,	37597.94,	'TRA',	'WAFA'  ,	'2647459',	'10/04/2019',	'O',	NULL,	NULL	,NULL	,NULL,	NULL	,36	,NULL,	NULL,	NULL,	1107,	1107)
VERS_NUM	VERS_DAT	CLIENT_ID	MONTANT	MODE	BANQUE_COD	PIECE	ECHEANCE	LETTRE	DATE_BANQUE	REMISE_NUM	REMISE_DAT	BANQUE_CD	IMPAYE	USER_ID	facture_id	Date_Cloture	Date_Export	agent_id	responsable_id
79778	,'2019-02-27 00:00:00.000',	1184048,	37597,94,	TRA	WAFA  ,	2647459,	'2019-04-10 00:00:00.000',	'O',	NULL,	NULL	,NULL	,NULL,	NULL	,36	,NULL,	NULL,	NULL,	1107,	1107
-------------------------------------------------------Modifier client expéditeur ET déstinataire
select top 10* from declaration_v where numero ='C00689699'
select top 10 * from client where CLIENT_COD=12686
select top 10 * from  intervient where COURRIER_ID=4843407 and intervention_typ = 'DE'
 
--update intervient set  CLIENT_ID=3735496 where COURRIER_ID=4843407 and intervention_typ = 'DE'
-------------------------------------------------------------------------------------------------------			
--------------------------------------------pour degenere la caisse dépenses 
select * from caisse_depenses
--update caisse_depenses set journal_eta='O' where journal_num in ('500091268  ')
--update  caisse_depenses set journal_dat='30/11/2019' where journal_num in ( '500091268 ')
where journal_num in ( '120190288  ')
500090842 500090839 500090841 mettre le 28/02/2019 au lieu du mois 03/2019
500090835 et 500090836
-------------------------------------------------feuille de tournée----affectation ramasseur------------------------------------------
select * from secteur where agence_cod like'%100%'
SECTEUR_COD=70005
select * from  est_attache where SECTEUR_COD like '%100%'
select * from  est_attache where EMPLOYE_ID=11960
insert into est_attache values (12053,'20011','C')
delete from est_attache where employe_id=12053 and SECTEUR_COD='454545454554'
select  *from employe where  employe_id=1279
select  *from employe where  employe_id=12053
update employe set AGENCE_COD=200 where  employe_id=12053

Select employe_id From est_attache  Where attache_typ = 'C'  )  and SORTIE_DAT is null
select * from agence where AGENCE_COD=200 800 705

select top 10 * from TRANSPORTE_ENSEMBLE
--update  transporte set  agence_valid=220

where VOYAGE_NUM='6002000056' 
select * from employe where matricule ='2636'
select * from employe where employe_id in (11912)	 
merci de modifier le code de chauffeur par 2380 au lieu 1759.dans le feuille de route numéro:6002000056
----------------------------------------sectour commercial-----------------------------------
  select * from secteur where agence_cod like'%100%'
	  	 insert into est_attache values (89,'12','C')
		 12   06   
select top 10  * from est_attache  where EMPLOYE_ID=89
  Select distinct convert(char, secteur.secteur_cod), secteur_lib From secteur 
  inner join est_attache on est_attache.secteur_cod = secteur.secteur_cod  
  Where  attache_typ = 'C' 
and secteur.secteur_cod  in (Select secteur_cod From secteur Where secteur.agence_cod ='100') 
  and employe_id = 89 Order by 2

   delete FROM est_attache
   where EMPLOYE_ID=89 and SECTEUR_COD='44'

  SELECT * FROM est_attache
    left join employe on employe.employe_id = est_attache.employe_id   WHERE secteur_cod=44
select  * from employe where nom like '%bouh%'
--------------------------------------------------------------------------------------------
select top 10 * from FACTURE where FACTURE_TYP='AV' and FACTURE_NUM='15019000307'
FACTURE_ID	FACTURE_IND	FACTURE_NUM	FACTURE_TYP	FACTURE_DAT	FACTURE_HT	FACTURE_TVA	NON_IMP	RABAIS_TAU	REGLE	IMPRESSION_NB	DATE_CLOTURE	DATE_IMPORTATION	USER_ID	indice	CA_Num
1097421	2	15019000307	AV	2019-02-28 08:46:33.490	-6043,47	-846,0858	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL
--delete from FACTURE where FACTURE_TYP='AV' and FACTURE_NUM='15019000307'
-------------------------------------------caisse centrale annulé la pièce-------------------------------------------------------			  
select * from  caisse_c_detail  where caisse_c_detail.JOURNAL_ID in (select JOURNAL_ID from CAISSE_CENTRALE where JOURNAL_NUM='120190288') and mvt_cod='PD' RCRD RCRA--and PIECE='430170048'
 

 select * from  caisse_c_detail  where caisse_c_detail.JOURNAL_ID in (select JOURNAL_ID from CAISSE_CENTRALE where JOURNAL_NUM  like '300%') and MVT_DAT > '18/04/2019' and MONTANT=7000


 --update caisse_c_detail set MONTANT=0  ,PIECE=null, MVT_DAT= null ,MODE=null where  caisse_c_detail.JOURNAL_ID  in  (select JOURNAL_ID from CAISSE_CENTRALE where JOURNAL_NUM='600190118') and mvt_cod='VTR'
 

  select * from caisse_c_detail where  journal_id=146228

  --delete from caisse_c_detail where  journal_id=146228
select * from [dbo].[COMPTEUR_AGENCE] where  AGENCE_COD=120

update [COMPTEUR_AGENCE] set COMPTEUR=105 where  AGENCE_COD=
120 and COMPTEUR_CD='CA'  
  select * from CAISSE_CENTRALE where JOURNAL_NUM='300190178'
  --delete from CAISSE_CENTRALE where JOURNAL_NUM='120190107'
  ------------------------------------merci d'annuler le régule entre la caisse 430190046 et 430190055



select * from  caisse_c_detail  where caisse_c_detail.JOURNAL_ID in (select JOURNAL_ID from CAISSE_CENTRALE where JOURNAL_NUM='800190179') and mvt_cod='RCRD' RCRD RCRA--and PIECE='430170048'
 
  update caisse_c_detail set PIECE=null ,MONTANT=0 ,MVT_DAT=NULL,mode=NULL,banque=NULL   where  PIECE='800190179' and mvt_cod='RCRa'

  in  (select JOURNAL_ID from CAISSE_CENTRALE where JOURNAL_NUM='800190176') and mvt_cod='RCRD'

 update caisse_c_detail set PIECE=null ,MONTANT=0 ,MVT_DAT=NULL,mode=NULL,banque=NULL   where  caisse_c_detail.JOURNAL_ID 
  in  (select JOURNAL_ID from CAISSE_CENTRALE where JOURNAL_NUM='800190179') and mvt_cod='RCRD'

  JOURNAL_ID	MVT_COD	MONTANT	PIECE	MVT_LIGNE	MVT_DAT	MODE	date_cloture	date_export	banque
147508	VTR 	154,46	104545	1	2019-08-07 00:00:00.000	ESP	NULL	NULL	130
  
  --
-------------------------------------------Annulation transport de caisse-d'annuler les FT de la declaration--------------------------------------------------

select * from courrier  where COURRIER_NUM='c00941082  '
c01031904 et c01031901
declare @courrier_id int
declare @facture_id int
declare @COURRIER_NUM varchar(16)
set @COURRIER_NUM='c00471334  '

select @courrier_id=courrier_id,
@facture_id=facture_id 
from COURRIER
where COURRIER_NUM=@COURRIER_NUM

delete from courrier_caisse where M_TYP='TR' and courrier_id=@courrier_id

delete from  regle
where facture_id=@facture_id

select * from courrier_caisse where M_TYP='TR' and courrier_id=5034765
-----------------------------------------------------------------------------------------------------------------------------------------------


declare @cl varchar(30) = 'cl6002000247 '


select * from courrier_caisse where courrier_id in (select courrier_id from courrier_ensemble where ensemble_num=@cl)

select * from CAISSE_CENTRALE where JOURNAL_ID=
170145
select * from courrier_caisse where JOURNAL_ID=170145
select * from COURRIER where COURRIER_ID=5320713

cl6002000243
cl6002000247
cl6002000248
cl6002000249
cl6002000250
cl6002000251
cl6002000252
cl6002000253
cl6002000255
cl6002000256
cl6002000257

--bonjour, merci d'affecter les carnets suivants dans une noveau caisse centrale cl6002000243/247/248/249/ 250/251/252/253/255/256/257. 

-------------------------------------------Merci d'annuler la ligne de transport de la caisse 220170020 

  select * from  caisse_c_detail  where caisse_c_detail.JOURNAL_ID in (select JOURNAL_ID from CAISSE_CENTRALE where JOURNAL_NUM='650190232') and mvt_cod='VTR' RCRD RCRA--and PIECE='430170048'
			select top 10* from caisse_c_detail 


			update caisse_c_detail set MONTANT=0,PIECE=null,mvt_dat=null,mode=null,banque=null where caisse_c_detail.JOURNAL_ID in (select JOURNAL_ID from CAISSE_CENTRALE where JOURNAL_NUM='300190117') and mvt_cod='VCR'
			146454	VCR 	600,00	62877	1	2019-05-21 00:00:00.000	ESP	NULL	NULL	131
			--delete from caisse_c_detail where journal_id = 145527 and mvt_cod='RCRA' And PIECE='300190048'
			300190048
-300190050
-300190060
----------------------------------
	SELECT * FROM 	caisse_d_detail WHERE caisse_d_detail.journal_num = 500091022
	UPDATE caisse_d_detail SET montant_ht =null

	WHERE caisse_d_detail.journal_num = 500091022 and  MVT_COD='an'
----------------------------------
insert into caisse_c_detail (JOURNAL_ID,MVT_COD,MONTANT,MVT_LIGNE) values (145336,	'RCRA',	0.00,		1)

JOURNAL_ID	MVT_COD	MONTANT	PIECE	MVT_LIGNE	MVT_DAT	MODE	date_cloture	date_export	banque
145332	RCRD	0,00	NULL	1	NULL	NULL	NULL	NULL	NULL

----------------------------------------------contre remboursement-retour fonds- BL--------------------------------------------------------
select  top 10 * from courrier where   COURRIER_NUM ='C01047854 ' 
select top 10 * from courrier_retour_fonds_v where COURRIER_ID=5082067
select  top 10* from RETOUR_FONDS  where COURRIER_ID=5276731
select  top 10* from  RETOUR_FONDS_CONFIRME where COURRIER_ID=5082067
--delete from RETOUR_FONDS where courrier_id =5082067
--delete from RETOUR_FONDS_CONFIRME where courrier_id =5082067
select  * from produit where courrier_id =5082067
--update RETOUR_FONDS set Montant=10000  where COURRIER_ID=5276731
--update RETOUR_FONDS set num='FV19-011401'  where COURRIER_ID=5181175 and fonds_typ='BL'

insert into RETOUR_FONDS  (Courrier_id,	Fonds_Typ	,Montant	,NUM	) values(5058842,'BL',1,'20190158')

--UPDATE courrier SET poids=100 WHERE COURRIER_ID =4970991
		-- delete from produit where courrier_id =5058842
	   -- EXECute [dbo].[ps_taxation] 5058842,0;
-----------------------------------------------------------------------retour+service------------------------------------


select   a1.agence_lib as agence_depart , a2.agence_lib as agence_arriver,dv.client1_id,dv.code_expediteur,dv.expediteur,dv.client2_id,dv.code_destinataire,dv.destinataire, numero,cmv.montant_ht from declaration_v  dv 

inner join livraison l on l.courrier_id=dv.courrier_id

inner join ville v1 on dv.ville1_cod=v1.ville_cod

inner join agence a1 on a1.agence_cod=v1.agence_cod 

inner join ville v2 on dv.ville2_cod=v2.ville_cod

inner join agence a2 on a2.agence_cod=v2.agence_cod 

inner join courrier_montants_v cmv on cmv.courrier_id=dv.courrier_id

where  facture_id is null and   l.etat_final='2' --retour

and month(dv.date)='12'and year (dv.date)='2019'

--------------------------------------------------------------------------------

select a1.agence_lib as agence_depart , a2.agence_lib as agence_arriver,dv.client1_id,dv.code_expediteur,dv.expediteur,dv.client2_id,dv.code_destinataire,dv.destinataire, numero,cmv.montant_ht from declaration_v  dv 


inner join ville v1 on dv.ville1_cod=v1.ville_cod

inner join agence a1 on a1.agence_cod=v1.agence_cod 

inner join ville v2 on dv.ville2_cod=v2.ville_cod

inner join agence a2 on a2.agence_cod=v2.agence_cod 

inner join courrier_montants_v cmv on cmv.courrier_id=dv.courrier_id


where  facture_id is null  and SERVICE='1' 

and month(dv.date)='12'and year (dv.date)='2019'

-----------------------------------------------------Annuler feuille de charegement
select  * from courrier_ensemble

where ensemble_num='fc5002000141 '


-----------------------------------------------------feuille de charegement
select  * from courrier_ensemble
--update ensemble set ENSEMBLE_DAT='15/11/2016 19:15:31:513'
where ensemble_num='fc5002000141 '
select * from ensemble where ENSEMBLE_NUM= 

update courrier_ensemble set COURRIER_id=4870239    where ensemble_num='FC1001901229'
select * from courrier where courrier_num='c00612010'
select * from courrier where courrier_id=5343035
	 
-------------------------------------Annulation transport------------------------------
declare @courrier_id int
declare @facture_id int
declare @COURRIER_NUM varchar(16)
set @COURRIER_NUM='C00728778'

select @courrier_id=courrier_id,
@facture_id=facture_id 
from COURRIER
where COURRIER_NUM=@COURRIER_NUM

delete from courrier_caisse where M_TYP='TR' and courrier_id=@courrier_id

delete from  regle
where facture_id=@facture_id
------------------------
---FAIRE UNE CAISSE A BASE DES CARNET SUIVANT : CL 5501700506/ 5501700508 / 5501700509 / 5501700510
 --- cl8001700844   -845   -846     
 
select * 
from courrier_caisse
where 
courrier_id in
(select c.courrier_id
from
declaration_v c
inner join courrier_ensemble ce on c.courrier_id = ce.COURRIER_ID  
where 
ce.ENSEMBLE_NUM = 'CR3501900078'
) 


select *
from
CAISSE_CENTRALE ca
where journal_id in(145083)

  select * 
from courrier_caisse
where journal_id = 145083  and courrier_id=4843154 and m_typ='CR'


--delete  
from courrier_caisse
where  journal_id = 113590 
----------------------------------------confirmation des laivraison------------------------

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
        WHERE ( courrier_ensemble.courrier_id = declaration_v.courrier_id ) 
                     AND ( declaration_v.courrier_id = courrier_retour_fonds_v.courrier_id ) 
               and ( courrier_retour_fonds_v.courrier_id = decmtfacture_v.courrier_id )
              and ( ( courrier_ensemble.ensemble_num = 'CL1701900228' ) )


 --insert into produit values (4854608,	'TR'  ,	0.0,	0.0,	NULL)


 ----------------------------------------------------date déclaration---------------------------------------
 select top 10* from declaration_v where numero in ('E00000211',
'E00000212',
'E00000213',
'E00000048')
 


 select top 10 * from courrier  where COURRIER_NUM='B006829679'
 select top 10 * from intervient where courrier_id=4018479 and intervention_typ='DE' 
 update  intervient set INTERVENTION_DAT ='13-06-2019 00:00:00.000'  where courrier_id=4018479 and intervention_typ='DE' 

 -------------------------------------------------------motif avoir facturation-----------------------------------
  select * from motif
		--  insert into motif values ('Erreur de facturation ')
--------------------------------------------------------facture modifie---------------------------------------
select top 10* from facture where FACTURE_NUM='15019001304'

update facture set  FACTURE_HT=17307.87719 ,FACTURE_TVA =2423.102 where FACTURE_NUM='15019001304'
--MODIFIER le montant de la facture N° 15019001304 comme suit : HT 17307,87719 TV 14% 2423.102 TTC 19730.98

 FACTURE_ID	FACTURE_IND	FACTURE_NUM	FACTURE_TYP	FACTURE_DAT	FACTURE_HT	FACTURE_TVA	NON_IMP	RABAIS_TAU	REGLE	IMPRESSION_NB	DATE_CLOTURE	DATE_IMPORTATION	USER_ID	indice	CA_Num
1131862	2	15019000423	AV	2019-03-21 12:49:01.523	-2799,99	-391,9986	NULL	NULL	N	6	2019-04-06 13:40:42.427	NULL	NULL	NULL	NULL
FACTURE_ID	FACTURE_IND	FACTURE_NUM	FACTURE_TYP	FACTURE_DAT	FACTURE_HT	FACTURE_TVA	NON_IMP	RABAIS_TAU	REGLE	IMPRESSION_NB	DATE_CLOTURE	DATE_IMPORTATION	USER_ID	indice	CA_Num
1132422	1	15019001304	FA	2019-03-22 00:00:00.000	18349,8114	2569,3084	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL
---------------------------------------------------------Avoir Date------------------------------------------------------------
update facture set DATE_CLOTURE='15/06/2019' where FACTURE_NUM
IN
('15019001023',
'15019001027',
'15019001024',
'15019001026',
'15019001025',
'15019001028') AND FACTURE_TYP='AV'
----------------------------------------------------------modifier avoir tva 20% et 14%------------------------------------------------
 Bonjour ; 

Merci de modifier l’avoir N° 15020000193  comme suit ; 


HT 	6 985,00
TVA 20%	1 397,00
TTC	8 382,00

 SELECT top 100* FROM PRODUIT_AV where FACTURE_ID= 1202404 
 select * from FACTURE  WHERE FACTURE_NUM  ='15020000390  ' and FACTURE_ID=1202404 and FACTURE_TYP='AV'

insert into PRODUIT_AV--14%
SELECT FACTURE_ID,FACTURE_IND,-712.49,-99.75,14  FROM FACTURE  WHERE FACTURE_NUM  ='1502000036456456490' and FACTURE_ID= 1202404 
insert into PRODUIT_AV--20%
SELECT FACTURE_ID,FACTURE_IND,-23.24,-4.65 ,20  FROM FACTURE  WHERE FACTURE_NUM  ='15020000390' and FACTURE_ID= 1202404 
update FACTURE set FACTURE_HT=-23.24,	FACTURE_TVA =-4.65 WHERE FACTURE_NUM  ='15020000390' and FACTURE_ID= 1202404 and FACTURE_TYP='AV'
 ht 	TAUX 	MT TVA 
14 243,77	14%	1 994,13
10 135,94	20%	2 027,19
		
24 379,71		4 021,32
	AVOIT TTC  	28 401,03
	 
 SELECT top 100* FROM PRODUIT_AV where FACTURE_ID= 1172995 

 select * from FACTURE  WHERE --FACTURE_NUM  ='15019002642  ' and
  FACTURE_ID=1172995 and FACTURE_TYP='AV'

insert into PRODUIT_AV--14%
SELECT FACTURE_ID,FACTURE_IND,-796.95,-111.57,14  FROM FACTURE  WHERE FACTURE_NUM  ='15019002642' and FACTURE_ID= 1172995 
insert into PRODUIT_AV--20%
SELECT FACTURE_ID,FACTURE_IND,-395.00,-79.00 ,20  FROM FACTURE  WHERE FACTURE_NUM  ='15019002642' and FACTURE_ID= 1172995 
update FACTURE set FACTURE_HT=-1191.95,	FACTURE_TVA =-190.57 WHERE FACTURE_NUM  ='15019002642' and FACTURE_ID= 1172995 and FACTURE_TYP='AV'

---------------------------------------------modifier avoir facture riad-----------------------------------------------------------------

15019000890	21/05/2019	-461,5176	-64,61	-526,13
15019000889	21/05/2019	-1870,341	-261,85	-2 132,19
15019000891	21/05/2019	-95,6346	-13,39	-109,02
------------------------------
Prière de réaffecter l’avoir N°  15019001627 à la facture N° 15019007641 

--modfifier le montant de l'avoir N° 15019001579 comme suit HT 1052.631 TVA 14% = 147,368 TTC= 1200
FACTURE_ID	FACTURE_IND	FACTURE_NUM	FACTURE_TYP	FACTURE_DAT	FACTURE_HT	FACTURE_TVA	NON_IMP	RABAIS_TAU	REGLE	IMPRESSION_NB	DATE_CLOTURE	DATE_IMPORTATION	USER_ID	indice	CA_Num
1151889	2	15019001579	AV	2019-09-12 08:34:09.727	-2491,23	-348,7722	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL
select top 10 * from [dbo].[FACTURE] where FACTURE_NUM='15019001627 'and FACTURE_TYP='AV'
update [dbo].[FACTURE] set FACTURE_HT=-1052.631, FACTURE_TVA=-147.368 where FACTURE_NUM='15019001579'and FACTURE_TYP='AV'
update [dbo].[FACTURE] set FACTURE_HT=-1870.341, FACTURE_TVA=-261.85 where FACTURE_NUM='15019000889'and FACTURE_TYP='AV'

update [dbo].[FACTURE] set FACTURE_HT=-95.6346, FACTURE_TVA=-13.39 where FACTURE_NUM='15019000891'and FACTURE_TYP='AV'


1210453
select top 10 * from [dbo].[FACTURE] where FACTURE_ID=1172995 and FACTURE_TYP='AV'

update [dbo].[FACTURE] set FACTURE_ID=1172995, FACTURE_IND=2 where  FACTURE_NUM='15019002642' and FACTURE_TYP='AV'
select top 10* from [dbo].[COURRIER_FACTURE] where  FACTURE_ID=1132146 FACTURE_ID
2121 COURRIER_ID =4894377
select  top 10* from declaration_v where numero ='C00640787'
select  top 10* from [dbo].[Courrier_caisse]  where COURRIER_ID =4894377
select  top 10* from [dbo].[CAISSE_CENTRALE] where JOURNAL_ID=145577
C00640787
1132146

10019002677
--delete from [dbo].[FACTURE] where FACTURE_NUM='15019003215'and FACTURE_TYP='AV'

FACTURE_ID	FACTURE_IND	FACTURE_NUM	FACTURE_TYP	FACTURE_DAT	FACTURE_HT	FACTURE_TVA	NON_IMP	RABAIS_TAU	REGLE	IMPRESSION_NB	DATE_CLOTURE	DATE_IMPORTATION	USER_ID	indice	CA_Num
1097606	2	15019000352	AV	2019-03-12 08:50:03.520	-5648,90	-790,846	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL
FACTURE_ID	FACTURE_IND	FACTURE_NUM	FACTURE_TYP	FACTURE_DAT	FACTURE_HT	FACTURE_TVA	NON_IMP	RABAIS_TAU	REGLE	IMPRESSION_NB	DATE_CLOTURE	DATE_IMPORTATION	USER_ID	indice	CA_Num
1097607	2	15019000353	AV	2019-03-12 08:50:55.460	-5648,90	-790,846	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL
FACTURE_ID	FACTURE_IND	FACTURE_NUM	FACTURE_TYP	FACTURE_DAT	FACTURE_HT	FACTURE_TVA	NON_IMP	RABAIS_TAU	REGLE	IMPRESSION_NB	DATE_CLOTURE	DATE_IMPORTATION	USER_ID	indice	CA_Num
1096942	2	15019000351	AV	2019-03-12 08:49:28.740	-5648,90	-790,846	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL
FACTURE_ID	FACTURE_IND	FACTURE_NUM	FACTURE_TYP	FACTURE_DAT	FACTURE_HT	FACTURE_TVA	NON_IMP	RABAIS_TAU	REGLE	IMPRESSION_NB	DATE_CLOTURE	DATE_IMPORTATION	USER_ID	indice	CA_Num
1051569	2	15019000350	AV	2019-03-12 08:47:55.097	-5648,90	-790,846	NULL	NULL	N	NULL	NULL	NULL	NULL	NULL	NULL
---------------------------------------------Enlevé Déclaration sur BORDEREAU-----------------
select  * from [dbo].[COURRIER_BORDEREAU] where  BORDEREAU_NUM=59754 

select  * from courrier where courrier_num in ('')
--delete from [COURRIER_BORDEREAU] where courrier_id in (4872241,
4872233,
4872239, 
4876918)
-----------------------------------------------------primes chauffeur----------------------------------------------------
select top 10 * from [dbo].[TRANSPORTE] where EMPLOYE_ID=772 and VOYAGE_DAT   between '01/02/2019 00:00:00' and '28/02/2019 23:59:59'
select  *from employe where matricule ='2616'
select  *from employe where nom like  '%dada%'
--update [TRANSPORTE] set EMPLOYE_ID=12123 where EMPLOYE_ID=772 and VOYAGE_DAT  between '01/02/2019 00:00:00' and '28/02/2019 23:59:59'
-----------------------------------------------insert ville----------------------------------------------------
select *from agence



select * from ville where ville_lib like 'ou%'
select * from ville where ville_COD like '427%'
select * from ville where AGENCE_cod like '400%'
insert into ville values (427,400,'OUJDA AR',1,5,'C')

-----------------------------------------------déclaration montant null-------------------------------------------------------
select top 10 *from produit where COURRIER_ID= 4854608

		 select top 10* from  courrier_ensemble where COURRIER_ID= 4854608
		 select * from courrier where courrier_num ='C00760123 '
	 insert into produit values (4854608,	'TR'  ,	0.0,	0.0,	NULL)

----------------------------------------------------compteur chèque------------------------------------------------------------------
  SELECT 0 as 'Inclus',   
         cheque_v.cheque_id as 'id',   
         cheque_v.numero_cheque as 'numero',   
         cheque_v.date_cheque as 'date',   
         cheque_v.code_client as 'code',   
         cheque_v.client as 'client',   
         cheque_v.montant as 'montant',   
         cheque_v.banque_cod  
    FROM cheque_v  
   WHERE ( cheque_v.date_impression is null ) AND  
         ( cheque_v.date_annulation is null )   

	select * from 	 [dbo].[COMPTEUR] where  compteur_cd='CDM'
	update  [COMPTEUR] set compteur=3000004 where compteur_cd='CDM'

update Cheque set Cheque_num    ='3000003'  where Cheque_id=45646546546

3000406

-------------------------------------------------------imoression chèque---------------------------------------------------------
select * from dbo.Cheque  where Cheque_num like '3000959%'
--update  Cheque set Impression_dat  =null where Cheque_id in (564564564564654)
'15/01/2020 11:00'

SELECT TOP 10* FROM [dbo].[COURRIER_CHEQUE]   where Cheque_id in (92141)

-
---------------------------------------------------------distance ville-----------------------------
select * from INTERVILLES
left join ville v1 on INTERVILLES.ville1_cod=v1.VILLE_COD
left join ville v2 on INTERVILLES.ville2_cod=v2.VILLE_COD
where distance >-1
----------------------------------------------------------annuler chèque-------------------------------
		select cheque_id from cheque where cheque_num in ('3000224')
		select distinct ch.cheque_id from cheque ch , courrier_cheque cc , courrier_agence ca where ch.cheque_id =cc.cheque_id and cc.courrier_id =ca.courrier_id 
		and inter_typ ='D' and ch.cheque_id =92127 and ca.agence_cod in ( select agence_cod from utilisateur_agence where utilisateur_agence.user_id =1 ) 
		select champs_id , nom , maj from lib_champs where ecran_id =0 

		update cheque set annulation_dat =getdate ( ) , annule_user_id =1 where cheque_id =92127
		update cheque set impression_dat =getdate ( ) where cheque_id =92127 and impression_dat is null 
		insert into courrier_chq_annule ( courrier_id , cheque_id ) select courrier_id , cheque_id from courrier_cheque where cheque_id =92127
		update c set courrier_eta ='A' from courrier c , courrier_cheque cch where c.courrier_id =cch.courrier_id and cheque_id =92127 
		update courrier_cheque set cheque_id =null where cheque_id =92127 
----------------------------------------------------------voyage feuille changer chauffeur-------------
		select  top 10 * from transporte where VOYAGE_NUM in ('6002000056')
					update transporte set EMPLOYE_ID=(select EMPLOYE_ID from EMPLOYE where MATRICULE='2380') where VOYAGE_NUM in ('6002000056')

----------------------------------------------------------voyage nfeuille----------------------------------------
SELECT  courrier_ensemble.ensemble_num as 'NFeuille',
           ensemble.ensemble_dat as 'Date_Feuille',
           agence_a.agence_lib as 'agence_depart',
           agence_b.agence_lib as 'agence_arrive',
           transporte.voyage_num as 'N_Voyage',
           employe.matricule as 'matricule',
           employe.nom + ' ' + employe.prenom as 'Chaufeur',
           (select AGENCE_LIB 
        from agence 
        where agence.AGENCE_COD = ensemble.agence_valid) as 'AgenceValid'    FROM courrier_ensemble ,
           ensemble ,
           agence agence_a ,
           agence agence_b ,
           transporte_ensemble ,
           transporte ,
           employe     WHERE ( ensemble.ensemble_num = courrier_ensemble.ensemble_num ) and         
		    ( ensemble.agence_cod = agence_a.agence_cod ) and          ( ensemble.agence2_cod = agence_b.agence_cod ) and        
			  ( transporte_ensemble.ensemble_num = ensemble.ensemble_num ) and          ( transporte.voyage_num = transporte_ensemble.voyage_num ) and      
			      ( transporte.employe_id = employe.employe_id ) and          ( ( courrier_ensemble.courrier_id = 5334372 ) and        
				    ( ensemble.ensemble_typ = 'FC' ) )    UNION    SELECT courrier_ensemble.ensemble_num as 'NFeuille',
           ensemble.ensemble_dat as 'Date_Feuille',
           agence_a.agence_lib as 'agence_depart',
           agence_b.agence_lib as 'agence_arrive',
           Null as 'N_Voyage',
           Null as 'matricule',
           Null as 'Chaufeur',
           ensemble.agence_valid as 'AgenceValid'     FROM courrier_ensemble ,
           ensemble ,
           agence agence_a ,
           agence agence_b     WHERE ( ensemble.ensemble_num = courrier_ensemble.ensemble_num ) and        
		     ( ensemble.agence_cod = agence_a.agence_cod ) and          ( ensemble.agence2_cod = agence_b.agence_cod ) and     
			      ( ( courrier_ensemble.courrier_id = 5334372 ) and          ( ensemble.ensemble_num not in (  SELECT transporte_ensemble.ensemble_num   
				     FROM transporte_ensemble   )) and                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
		            ( ensemble.ensemble_typ = 'FC' ) )  
					 FC 1001906414 et la FR 1001906124 de la declaration C01106224
					 merci de changer le code ch 306 au lieu 2651 fr 1002000213
					select top 10 * from declaration_v where numero ='C01170047 '

					select top 10 * from ensemble where ENSEMBLE_NUM ='FC6002000051    '
					select  top 10 * from transporte where VOYAGE_NUM in ('6002000056')
					select * from courrier_ensemble where COURRIER_ID=1816002
					select top 10 * from TRANSPORTE_ENSEMBLE where VOYAGE_NUM  in ('1001906414    ')

					delete from TRANSPORTE_ENSEMBLE where  ENSEMBLE_NUM='1002000613      '    
					delete from courrier_ensemble where COURRIER_ID=5334407 and ENSEMBLE_NUM='FC3002000073          '

FC1002000629
FC3002000073    
					SELECT * FROM courrier_ensemble WHERE  courrier_ensemble.courrier_id = 5334407 
	delete from transporte where VOYAGE_NUM in ('1001905461'),'3501900512','3501900515')

					update ensemble set  AGENCE2_COD=650 where ENSEMBLE_NUM ='fc1001906166 '
FC1001205729     FC3501900755    FC1001906117    
					-----------------------
					SELECT  agence_type.inter_lib as 'inter_typ',
           agence.agence_lib as 'agence',
           agence_type.inter_ord as inter_ord    
        FROM courrier_agence ,
           agence ,
           agence_type     
        WHERE ( courrier_agence.agence_cod = agence.agence_cod ) and       
		   ( courrier_agence.inter_typ = agence_type.inter_typ ) and     
		        ( ( courrier_agence.courrier_id =  4859905) ) 
        ORDER BY 3         ASC  

		select  top 10* from courrier_agence where courrier_id =  4859905
		update courrier_agence set AGENCE_COD=100 where   courrier_id =  4859905 and INTER_TYP='T'
------------------------------------------------ TYPE VEHICULE  ----------------------------
		 
 select * from  [dbo].[VEHICULE_TYPE]

 insert into [dbo].[VEHICULE_TYPE] values ('I8','IMMO 14T')

 update [VEHICULE_TYPE] set VEHICULE_TYP_LIB='IMMO 14T' where VEHICULE_TYP='I14'

 rajouter les trois types de camions suivants sur écran taxation affretemenet comme suit : immo 25t / immo 14t / immo 8t


 ----------------------------merci annuler la confirmation du bordereau --------------------------

  select  top 10 * from bordereau where  bordereau.bordereau_num in ('61221')
 update  bordereau set BORDEREAU_ETA='O' where    bordereau.bordereau_num in ('61221') ,  '60309')
 -----------------------------------------------------le droit de recherche---------------------------------------------

 select * from  [dbo].[DEV_PARAM_USER] where USER_ID=512
 512
 451
 select * from employe where NOM like 'az%' 
  select * from  utilisateur where
 EMPLOYE_ID=
71


select * from agence 
	 UPDATE utilisateur SET AGENCE_COD =200 WHERE  user_id=99
  --------------------------------------------erreur pesses------------------------------------------------------
SELECT *FROM courrier where courrier_num='C01126254'
		 --UPDATE courrier SET poids=32 WHERE COURRIER_ID =4979006
		 --delete from produit where courrier_id =4979006
	  --   EXECute [dbo].[ps_taxation] 4979006,0;
		select * from  produit where courrier_id =4979006
		select * from employe where matricule='2564'
		--------------pour annuler historique----------------------------------
	 delete FROM 	pesees where pes_id =90240
	   delete FROM 	pesees_detail WHERE COURRIER_ID='5210650'
	SELECT *FROM pesees_detail WHERE COURRIER_ID='5210650'
	SELECT * FROM pesees where pes_id =90240
--------------------------------------------historique Suppression ramassage-------------------------------------------------------

select top 100 login	,nom,commentaire,type_act,a.date_act,code_ram from
[Action] a LEFT JOIN [Connexion] x on a.num_cnx=x.num_cnx
left join [Compte] c on c.id_compte=x.id_compte
where
a.type_act ='Suppression'
order by date_act desc

-------------------------------------liste client--------------------------------------------------------------------

							select CLIENT_COD,NOM,ice,agence_lib from client 
							 left join agence on agence.agence_cod = client.AGENCE_COD 
							  where   CLIENT_TYP='EC' order by NOM
---------------------------------------------------------------------------------------------------------------------
-----------------------------------------CA Client----------------------------------------------------


							
							select CLIENT_COD,NOM,ice,agence_lib,
							 sum( courrier_montants_v.montant_ht ) as 'Total Montant_ttc'
							 from client 
							 left join agence on agence.agence_cod = client.AGENCE_COD 
							  left join  declaration_v    on declaration_v.payeur_id =client.CLIENT_ID
							  left join courrier_montants_v on  declaration_v.courrier_id = courrier_montants_v.courrier_id 
							 
							  where   CLIENT_TYP='EC' 
							  and 
							  declaration_v.date_saisie between '1-01-2019' and '26-06-2019'

							 	group by  CLIENT_COD,NOM,ice,agence_lib
								order by  sum( courrier_montants_v.montant_ht ) desc
-----------------------------------------------------declaration frais transport 0--------------------------------------------------------------------
				
				select  * from declaration_v
				 left join courrier_montants_v on  declaration_v.courrier_id = courrier_montants_v.courrier_id 
				 inner join livraison l on l.courrier_id=declaration_v.courrier_id

				  where 
				  declaration_v.courrier_typ='M'   
				  AND   courrier_montants_v.montant_ht=0
				  and  l.etat_final<>'2' 
				  and declaration_v.SERVICE <>'1' 
				  and declaration_v.retour=0

				and   (year (date_saisie)=2019 or year (date_saisie)=2018)
-------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------format ettiquitte
update [USER_ETIQ] set typ=1
 where   user_id=515
 -------------------------------------------------facture
 SELECT * FROM FACTURE f left join FACTURE a on f.facture_id=a.facture_id  and f.facture_typ='FA' and a.facture_typ='AV' 
 WHERE f.FACTURE_NUM='15020000762' 
 15020000763 et  15020000762 
select * from [dbo].[facture_bordereau_v] WHERE FACTURE_NUM='15019005378'
1177988
select top 10* from declaration_v  where  numero ='C01013813 ' 
select top 10* from  produit_fa where COURRIER_ID=5076384
select * from  produit_fa where FACTURE_ID=
1177988

select * from facture where FACTURE_NUM='15020000762' 

select  * from courrier where COURRIER_ID=5076384

--delete from  produit_fa where COURRIER_ID=5076384
--update FACTURE set FACTURE_TVA=0 where FACTURE_ID=1244452 and FACTURE_TYP='FA'
--update courrier set FACTURE_ID=null where COURRIER_ID=5076384
---------------------------------------------statut motif déclaration non facturée
select * from [dbo].[STATUT_COURRIER]

select * from [dbo].[MOTIF_COURRIER]
SELECT * FROM 
[dbo].[COURRIER_STATUT_MOTIF]

insert into [dbo].[MOTIF_COURRIER] values (13,'En validation client')


insert into [dbo].[COURRIER_STATUT_MOTIF] values((select courrier_id from courrier where COURRIER_NUM='C054540508305'),8,6,getdate())

----------------------------------------
--------------------------------------------------  dégénéré le BORDEREAU  
----------------------------------------

SELECT * FROM BORDEREAU b where b. BORDEREAU_NUM in ('62778')

 62780 .62778
--update BORDEREAU set BORDEREAU_ETA='O' where  BORDEREAU_NUM in ('62778')

---------------------------------------consommation véhicule------------------------------
select * from MARQUE_VEHICULE

--update MARQUE_VEHICULE set CONSOMMATION=29 where COD_MARQUE=50 and CONSOMMATION=30

select   e1.CONSOMMATION,e2.CONSOMMATION

--update e1 set CONSOMMATION=e2.CONSOMMATION
 from vexinitial.dbo.MARQUE_VEHICULE e1 
 inner join vexinitialrecette.dbo.MARQUE_VEHICULE e2 on e1.compteur =e2.compteur

  where e1.CONSOMMATION<>e2.CONSOMMATION
  --------------------------------------------------------- change la date du voyage 

--select * from   VEXINITIAL.dbo .COMPTEUR_AGENCE
--  where agence_cod=150

--update VEXINITIAL.dbo .
--COMPTEUR_AGENCE set COMPTEUR2= 2921  where  agence_cod=150 and COMPTEUR_CD='AV'
--select  top 10* from facture order by 5 desc 74427

 --                B01078075
 
 --merci de rectifier l'heure de voyage de ces expéditions C00451758 kenitra - casa > casa - tanger C00903678 rabat - casa > casa - taza

 select e.* from ensemble  e join COURRIER_ENSEMBLE  ce on e.ENSEMBLE_NUM=ce.ENSEMBLE_NUM join   courrier c on c.courrier_id=ce.courrier_id where e.ENSEMBLE_TYP='FC' and  c. courrier_id in (select  courrier_id from declaration_v
 where numero='C00903678   ')       

select  * from ensemble
--update ensemble set ensemble_dat='23/10/2019 21:52:24.907' where ensemble_num = 'FC1001905288        '  


select  * from courrier where courrier_num='B00816057'

----------------------------------------------------------------annulation ramasage-------------------------
use ramex
select * from [dbo].[Compte][dbo].[Connexion]

select * from [dbo].[Ramassage] where code_ram in ('20FEV1387') 

select * from [dbo].[Motif_Annulation]
select * from  [dbo].[Etat]
delete from  [dbo].[Ramassage] where code_ram in ('20jan1246  ') 
  update  [Ramassage] set etat_ram=4,motif_annulation=1  where code_ram ='20FEV1387'
   20jan1495 : enveloppe non disponible
  --------------------------------------------------------------réclamation-------------------------------------------
  use reclamation
  use vexinitial
  select * from [dbo].[UTILISATEUR] where  FULL_NAME like '%el baz%' 
select * from [dbo].[UTILISATEUR] where  FULL_NAME like '%oush%' 

select * from [dbo].employe where  matricule in ( '1755','2567' )

update [UTILISATEUR] set sav=0 where USER_ID=11948

--------------------------------------client agence
select adresse.adresse_id , adresse.adresse_lib , adresse.postal_cod , adresse.ville_cod from adresse , est_proprietaire 
where est_proprietaire.adresse_id =adresse.adresse_id and est_proprietaire.propriete_typ ='SG' and est_proprietaire.client_id =5285765 
--update adresse set VILLE_COD=100 where  adresse_id=170000506713
------------------------------------------------------------------
facture_souche
regle non
--------------------------------------Motif non Livrée-------------------------------------
select * from  [dbo].[MOTIF_NONLIVRE]


insert into [MOTIF_NONLIVRE] values(19,null,'Client en inventaire')
---------------------------------------déclaration modifier
select [COURRIER_HIST2].*,courrier.COURRIER_NUM from [dbo].[COURRIER_HIST2]
left join  courrier on courrier.courrier_id=[COURRIER_HIST2].courrier_id
where numero in ( 'W01008765')
-------------------------------------------------------------------

