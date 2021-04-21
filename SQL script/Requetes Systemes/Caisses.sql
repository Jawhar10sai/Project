----------------------------------
--Merci de dégénérer la caisse
--------------------------------

---*******************************************************caisse depenses *****************************************

select * from caisse_depenses
--update caisse_depenses set journal_eta='O'
where JOURNAL_NUM  in ( '500091958')  

---*******************************************************caisse centrale *****************************************

--VEX > Caisse > Caisse centrale > Dégenerer caisse.

----------------------------------
--Merci de Modifier la date de la caisse: 
--------------------------------

---*******************************************************caisse centrale *****************************************

SELECT * FROM CAISSE_CENTRALE 
--update CAISSE_CENTRALE set JOURNAL_DAT='30/11/2020'
where JOURNAL_NUM  in ( '500091895') 

---*******************************************************caisse depenses *****************************************

select * from caisse_depenses
--update  caisse_depenses set journal_dat='26/02/2021' 
where JOURNAL_NUM  in ( '500092068','500092069', '500092067') 

'500092068','500092069', '500092067'
----------------------------------
--Modifier Agence Caisse
--------------------------------
---*******************************************************caisse centrale *****************************************

SELECT * FROM CAISSE_CENTRALE 
--update CAISSE_CENTRALE set agence_cod='500'
where JOURNAL_NUM  in ( '500091895') 

---*******************************************************caisse depenses *****************************************

SELECT * FROM CAISSE_CENTRALE 
--update caisse_depenses set agence_cod='500'
where JOURNAL_NUM  in ( '500091895') 

----------------------------------
--Modification des montant de la rubrique 
------------------------------
select * from CAISSED_MVT_TYPE where MVT_LIB like 'alimentation caisse'
select * from CAISSE_D_DETAIL 
--update CAISSE_D_DETAIL set MONTANT=0,MONTANT_tva=0,MONTANT_ht=0
where JOURNAL_NUM in ('500091895') and MVT_COD='ALIM'


------------------------------------------------------------- Annuler les lignes Caisse

select * from  caisse_c_detail  --where caisse_c_detail.JOURNAL_ID in (select JOURNAL_ID from CAISSE_CENTRALE where JOURNAL_NUM='600200317') 
--update caisse_c_detail set MONTANT=0  ,PIECE=null, MVT_DAT= null ,MODE=null ,banque=null
where  caisse_c_detail.JOURNAL_ID  in  (select JOURNAL_ID from CAISSE_CENTRALE where JOURNAL_NUM ='600210005') and mvt_cod='vtr'



select top 2 * from retour_fonds_confirme where courrier_id=
  select * from courrier where COURRIER_NUM in ('C01433920')

  select * from caisse_centrale where journal_num in('430200168')

  select * from declaration_v where numero in ('c01342530', 'c01342563', 'c01387889','c0140521')

  select @@servername

     

  select * from courrier where courrier_num in ('C01483594')
  --update courrier set courrier_num='C01483594' where courrier_id=5758855

  select * from courrier_caisse where courrier_id in (5642174, 5654740, 5684164,5629795) and m_typ='TR'


  500092068 500092069 500092067 mettre le 26/02/2021


  select top 10 * from user_etiq where user_id=593
  insert into USER_ETIQ values(593,1)
  select top 10 * from employe where MATRICULE='2759'
  select top 10 * from UTILISATEUR where EMPLOYE_ID=12266