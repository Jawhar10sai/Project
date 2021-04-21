USE [VEXINITIAL]
GO

/****** Object:  StoredProcedure [dbo].[ps_mise_a_jours_etat_expedition]    Script Date: 27/11/2020 17:18:50 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO






CREATE PROCEDURE [dbo].[ps_mise_a_jours_etat_expedition]
AS
BEGIN
DECLARE @ETAT_FIN SMALLINT,
      @COLIS_LV SMALLINT,
       @COURRIER_ID NUMERIC(24,0),
       @DATE_SAISIE DATETIME,
       @DESTINATAIRE VARCHAR(60),
       @AGDEPART VARCHAR(50),
       @AGARRIVE VARCHAR(50),
       @AGARRIVE2 VARCHAR(50),
       @LIEU VARCHAR(50),
       @STATUS VARCHAR(50),
       @STATUS_LIV VARCHAR(50),
       @DESTIN_TYP SMALLINT,
       @ENSEMBLE_NUM CHAR(60),
       @NOM_LIVREUR VARCHAR(100),
       @MATRICULE CHAR(10),
       @VOYAGE_NUM CHAR(16),
       @ENSEMBLE_ETA CHAR(1),
       @TEL  VARCHAR(100),
       @DATED VARCHAR(10),
       @DATEF VARCHAR(10),
       @VOYAGE_DAT DATETIME,
       @ARRIVE_DAT DATETIME,
       @dat datetime,
       @courrier_id_tmp NUMERIC(24,0)


DECLARE @TSQL nvarchar(4000)
DECLARE @OPENQUERY nvarchar(4000)
DECLARE @LinkedServer nvarchar(4000)

declare @courrier_tmp_id  nvarchar(4000)
declare @Agence_tmp  nvarchar(4000)
declare @Numero_tmp  nvarchar(4000)
declare @Code1_tmp  nvarchar(4000)
declare @Expediteur_tmp  nvarchar(4000)
declare @Code2_tmp  nvarchar(4000)
declare @destinataire_tmp  nvarchar(4000)
declare @adresse1_tmp  nvarchar(4000)
declare @adresse2_tmp  nvarchar(4000)
declare @Ville1_tmp  nvarchar(4000)
declare @Ville2_tmp  nvarchar(4000)
declare @Port_tmp  nvarchar(2)
declare @Colis_tmp  nvarchar(4000)
declare @Poids_tmp  nvarchar(4000)
declare @type_tmp  nvarchar(2)
declare @Montant_ttc_tmp  nvarchar(4000)
declare @Espece_tmp  nvarchar(4000)
declare @Cheque_tmp  nvarchar(4000)
declare @Traite_tmp  nvarchar(4000)
declare @bl_tmp  nvarchar(4000)
declare @num_tmp  nvarchar(4000)
declare @date_livraison_tmp nvarchar(4000)
declare @statut_tmp  nvarchar(4000)
declare @statut_liv_tmp  nvarchar(4000)
declare @Motif_tmp  nvarchar(4000)


declare @table_insert_tmp table(COURRIER_ID NUMERIC(24,0),STATUS VARCHAR(50),STATUS_LIV VARCHAR(50))



SET @DATED=CONVERT(VARCHAR(10), DATEADD(MONTH,-1,GETDATE()) , 103 )
SET @DATEF=CONVERT(VARCHAR(10),GETDATE(), 103 )
DECLARE COURRIER_CURSOR CURSOR FOR
SELECT  courrier.courrier_id  FROM events_etat_expedition join courrier on courrier.courrier_id= events_etat_expedition.courrier_id
and courrier.courrier_typ='M'
group by  courrier.courrier_id
------------------
------------ table events qui s'aliment avec les trigers dans les table (intervient,COURRIER,  LIVRAISON,COURRIER_ENSEMBLE,TRANSPORTE_ENSEMBLE,TRANSPORTE)
----------------
OPEN COURRIER_CURSOR
FETCH NEXT FROM COURRIER_CURSOR
INTO @COURRIER_ID

WHILE @@FETCH_STATUS = 0
BEGIN

SET @ETAT_FIN=NULL
SET @ENSEMBLE_NUM=NULL
SET @VOYAGE_NUM=NULL
SELECT       @COURRIER_ID = COURRIER_ID,
       @AGDEPART = A1.AGENCE_LIB,
       @AGARRIVE = A2.AGENCE_LIB,
       @DESTINATAIRE = DESTINATAIRE,
       @DATE_SAISIE = DATE_SAISIE
FROM   DECLARATION_V
INNER  JOIN VILLE V1 ON V1.VILLE_COD = DECLARATION_V.VILLE1_COD
INNER  JOIN VILLE V2 ON V2.VILLE_COD = DECLARATION_V.VILLE2_COD
INNER JOIN AGENCE A1 ON V1.AGENCE_COD = A1.AGENCE_COD
INNER JOIN AGENCE A2 ON V2.AGENCE_COD = A2.AGENCE_COD
WHERE COURRIER_ID = @COURRIER_ID

SELECT       @ETAT_FIN = ETAT_FINAL,
       @COLIS_LV = ISNULL(COLIS,0),
       @MATRICULE=EMPLOYE.MATRICULE,
       @dat = etat_dat,
       @NOM_LIVREUR = EMPLOYE.NOM + ' ' + EMPLOYE.PRENOM,
       @TEL = ISNULL('TEL1: ' + EMPLOYE.TELEPHONE1,'') + ISNULL(' TEL2: ' + EMPLOYE.GSM,'')
FROM   LIVRAISON
LEFT OUTER JOIN MANIPULE
ON LIVRAISON.ENSEMBLE_NUM = MANIPULE.ENSEMBLE_NUM
INNER JOIN EMPLOYE
ON MANIPULE.EMPLOYE_ID = EMPLOYE.EMPLOYE_ID
WHERE  COURRIER_ID = @COURRIER_ID
IF (@ETAT_FIN IS NOT NULL)
BEGIN
       SELECT  @STATUS =
              CASE @ETAT_FIN
             WHEN 0 THEN 'Livrée'
             WHEN 2 THEN 'Retournée'
             WHEN 3 THEN 'Epave'
             WHEN 4 THEN (CASE WHEN @COLIS_LV = 0 THEN 'Avarie' ELSE 'Livraison Partielle(' + CONVERT(VARCHAR(5), @COLIS_LV + ')')END)
      END,
	   @STATUS_LIV =
          CASE @ETAT_FIN
              WHEN 0 THEN 'Livrée'
              WHEN 2 THEN 'Retournée'
		 END
       if (@ETAT_FIN is not null)
             begin
             set @DATE_SAISIE = convert(datetime, floor(convert (float, @dat)))
             end
       SELECT  @LIEU =
              CASE @ETAT_FIN
             WHEN 0 THEN @DESTINATAIRE
             WHEN 2 THEN @AGDEPART
             WHEN 3 THEN @AGDEPART
             WHEN 4 THEN (CASE WHEN @COLIS_LV = 0 THEN @AGDEPART ELSE @AGARRIVE END)END
END
ELSE
BEGIN
      SET @STATUS_LIV ='En cours'          
       SELECT TOP 1 @ENSEMBLE_NUM = ENSEMBLE.ENSEMBLE_NUM,
                    @DESTIN_TYP = ISNULL(COURRIER_ENSEMBLE.DESTIN_TYP,-1),
                    @MATRICULE = EMPLOYE.MATRICULE,
                    @dat = ensemble.ensemble_dat,
                    @NOM_LIVREUR = EMPLOYE.NOM + ' ' + EMPLOYE.PRENOM,
                    @TEL = ISNULL('TEL1: ' + EMPLOYE.TELEPHONE1,'') + ISNULL(' TEL2: ' + EMPLOYE.GSM,'')
       FROM         COURRIER_ENSEMBLE
       INNER JOIN   ENSEMBLE
       ON           COURRIER_ENSEMBLE.ENSEMBLE_NUM = ENSEMBLE.ENSEMBLE_NUM
       INNER JOIN   AGENCE
       ON           ENSEMBLE.AGENCE_COD = AGENCE.AGENCE_COD
       INNER JOIN   MANIPULE
       ON           MANIPULE.ENSEMBLE_NUM = ENSEMBLE.ENSEMBLE_NUM
       INNER JOIN   EMPLOYE
       ON           MANIPULE.EMPLOYE_ID = EMPLOYE.EMPLOYE_ID
       WHERE        COURRIER_ENSEMBLE.COURRIER_ID = @COURRIER_ID AND
                    ENSEMBLE.ENSEMBLE_TYP = 'CL'
       ORDER BY     ENSEMBLE.ENSEMBLE_DAT DESC

       IF (@ENSEMBLE_NUM IS NOT NULL )

       BEGIN
             SELECT   @STATUS =
             CASE @DESTIN_TYP
             WHEN 1 THEN 'à Relivrée'
             WHEN -1 THEN 'Chargé'
             WHEN 0 THEN 'livrée'  ELSE 'à Relivrée' END
       set @DATE_SAISIE = convert(datetime, floor(convert (float, @dat)))
             SELECT   @LIEU =
             CASE @DESTIN_TYP
             WHEN 1 THEN @AGARRIVE
             WHEN -1 THEN 'En Route'
             WHEN 0 THEN @DESTINATAIRE  ELSE @AGARRIVE
             END
        END
       ELSE
       BEGIN
             SELECT       TOP 1 @VOYAGE_NUM = TRANSPORTE.VOYAGE_NUM,
                    @VOYAGE_DAT = TRANSPORTE.SAISIE_DAT,
                    @ARRIVE_DAT = TRANSPORTE.ARRIVE_DAT,
                    @ENSEMBLE_ETA = ENSEMBLE.ENSEMBLE_ETA,
                    @AGARRIVE2 = AGENCE.AGENCE_LIB

             FROM   COURRIER_ENSEMBLE
             INNER JOIN ENSEMBLE
             ON     ENSEMBLE.ENSEMBLE_NUM = COURRIER_ENSEMBLE.ENSEMBLE_NUM
             INNER  JOIN TRANSPORTE_ENSEMBLE
             ON     ENSEMBLE.ENSEMBLE_NUM = TRANSPORTE_ENSEMBLE.ENSEMBLE_NUM
             INNER  JOIN TRANSPORTE
             ON     TRANSPORTE_ENSEMBLE.VOYAGE_NUM = TRANSPORTE.VOYAGE_NUM
             INNER  JOIN AGENCE
             ON     AGENCE.AGENCE_COD = ENSEMBLE.AGENCE2_COD
             WHERE  COURRIER_ENSEMBLE.COURRIER_ID = @COURRIER_ID AND
                    ENSEMBLE.ENSEMBLE_TYP = 'FC'
             ORDER BY TRANSPORTE.SAISIE_DAT DESC


             IF (@VOYAGE_NUM IS NOT NULL)
             BEGIN
                    IF (@AGARRIVE <> @AGARRIVE2)
                    BEGIN
                           SELECT @STATUS = CASE @ENSEMBLE_ETA WHEN 'V' THEN 'Arrivée : Agence Transit La Voie Express' ELSE 'En Route' END
                           SELECT @LIEU = CASE @ENSEMBLE_ETA WHEN 'V' THEN @AGARRIVE2 ELSE 'En Route vers : ' + @AGARRIVE2 END
                           set @DATE_SAISIE = convert(datetime, floor(convert (float, @VOYAGE_DAT)))
                    END
                    ELSE
                    BEGIN
                           SELECT @STATUS = CASE @ENSEMBLE_ETA WHEN 'V' THEN 'Arrivée : Agence de Destination La Voie Express' ELSE 'En Route vers ' + @AGARRIVE END
                           SELECT @LIEU = CASE @ENSEMBLE_ETA WHEN 'V' THEN @AGARRIVE ELSE 'En Route vers : ' + @AGARRIVE END
                           if(@arrive_dat is not null)
                                  set @DATE_SAISIE =convert(datetime, floor(convert (float, @arrive_dat)))
                           else
                                  set @DATE_SAISIE = convert(datetime, floor(convert (float, @VOYAGE_DAT)))
                    END
             END
             ELSE
             BEGIN
                    SELECT       TOP 1 @VOYAGE_NUM = ENSEMBLE.ENSEMBLE_NUM,
                           @ENSEMBLE_ETA = ENSEMBLE.ENSEMBLE_ETA,
                           @AGDEPART = AGENCE.AGENCE_LIB     ,
                           @dat = ensemble_dat
                    FROM   COURRIER_ENSEMBLE
                    INNER JOIN ENSEMBLE
                    ON     ENSEMBLE.ENSEMBLE_NUM = COURRIER_ENSEMBLE.ENSEMBLE_NUM
                    INNER  JOIN   AGENCE
                    ON     AGENCE.AGENCE_COD = ENSEMBLE.AGENCE_COD
                    WHERE  COURRIER_ENSEMBLE.COURRIER_ID = @COURRIER_ID AND
                           ENSEMBLE.ENSEMBLE_TYP = 'FC'  AND
                           ENSEMBLE.ENSEMBLE_NUM NOT IN ( SELECT TRANSPORTE_ENSEMBLE.ENSEMBLE_NUM FROM TRANSPORTE_ENSEMBLE)
                    ORDER BY ENSEMBLE.ENSEMBLE_DAT DESC

                    IF (@VOYAGE_NUM IS NOT NULL)
                    BEGIN
                           SELECT @STATUS = CASE @ENSEMBLE_ETA WHEN 'O' THEN 'En Cours de Chargement dans un Camion' ELSE '.' END
                           SELECT @LIEU = CASE @ENSEMBLE_ETA WHEN 'O' THEN @AGDEPART ELSE '.' END
                    END
                    ELSE
                    BEGIN
                           SET @STATUS = 'Expedition Encore dans l''''agence de depart'
                           SET @LIEU = @AGDEPART
                    END
                    set @DATE_SAISIE =  convert(datetime, floor(convert (float, @dat)))
             END

       END
END
-------*******************************************************
-------*******************************************************

SET @LinkedServer = 'SVWEBEXT'
SET @OPENQUERY = 'SELECT courrier_id FROM OPENQUERY('+ @LinkedServer + ','''
SET @TSQL = 'SELECT courrier_id FROM lvedbexp.etat_expedition  WHERE courrier_id='+ cast(       @COURRIER_ID as varchar)+' '')'

CREATE TABLE #EventId (courrier_id      nvarchar(50))

insert into #EventId
   EXEC  (@OPENQUERY+@TSQL )


set @courrier_id_tmp=0

select @courrier_id_tmp=isnull(courrier_id ,0) from #EventId

drop table #EventId
if @courrier_id_tmp<>@COURRIER_ID
       begin
--print 'insert'

insert into @table_insert_tmp VALUES(@COURRIER_ID,@STATUS,@STATUS_LIV)
       delete  FROM events_etat_expedition where COURRIER_ID=@COURRIER_ID

  end
else
begin
                           -- print 'update'
                           SELECT
                           @courrier_tmp_id=  declaration_v.courrier_id,
                           @Agence_tmp= LTRIM(RTRIM( agence.agence_lib )),
                           @Numero_tmp=  LTRIM(RTRIM(declaration_v.numero)),
                           @Code1_tmp=          LTRIM(RTRIM( declaration_v.code_expediteur )),
                           @Expediteur_tmp=      LTRIM(RTRIM(     declaration_v.expediteur )),
                           @Code2_tmp=          LTRIM(RTRIM( declaration_v.code_destinataire )),
                           @destinataire_tmp=      LTRIM(RTRIM(     declaration_v.destinataire )),
                           @adresse1_tmp=    LTRIM(RTRIM( ADRESSE1.ADRESSE_LIB  )),
                           @adresse2_tmp=LTRIM(RTRIM(  ADRESSE2.ADRESSE_LIB  )),
                           @Ville1_tmp= LTRIM(RTRIM(ville_a.ville_lib )),
                           @Ville2_tmp=  LTRIM(RTRIM(      ville_b.ville_lib )),
                           @Port_tmp=     LTRIM(RTRIM(     declaration_v.port )),
                           @Colis_tmp=   LTRIM(RTRIM(   declaration_v.colis )),
                           @Poids_tmp=    LTRIM(RTRIM(         declaration_v.poids )),
                           @type_tmp=     LTRIM(RTRIM(   declaration_v.courrier_typ )),
                           @Montant_ttc_tmp=  LTRIM(RTRIM(    courrier_montants_v.montant_ttc )),
                           @Espece_tmp=      LTRIM(RTRIM(  courrier_retour_fonds_v.espece )),
                           @Cheque_tmp=      LTRIM(RTRIM(     courrier_retour_fonds_v.cheque )),
                           @Traite_tmp=     LTRIM(RTRIM(     courrier_retour_fonds_v.traite )),
                           @bl_tmp=    LTRIM(RTRIM( courrier_retour_fonds_v.bl  )),
                           @num_tmp=      LTRIM(RTRIM(     courrier_retour_fonds_v.num  )),
                           @date_livraison_tmp= LTRIM(RTRIM(     cast(l.ETAT_DAT as datetime)    )),
                           @statut_tmp= LTRIM(RTRIM( @STATUS)),
                           @statut_liv_tmp= LTRIM(RTRIM( @STATUS_LIV)),
                           @Motif_tmp= LTRIM(RTRIM((select top 1 MOTIF_LIB from courrier_ensemble left join [MOTIF_NONLIVRE] on [MOTIF_NONLIVRE].MOTIF_COD=courrier_ensemble.motif_cod left join ensemble on ensemble.ensemble_num = courrier_ensemble.ensemble_num where courrier_ensemble.courrier_id = declaration_v.courrier_id  and  ensemble.ensemble_typ = 'CL' AND MOTIF_LIB IS NOT NULL order by ENSEMBLE_DAT desc)))

                           FROM  agence ,
                           courrier_agence ,
                           declaration_v
                           join ADRESSE ADRESSE1 on declaration_v.adresse1_id=ADRESSE1.adresse_id
                           join ADRESSE ADRESSE2 on declaration_v.adresse2_id=ADRESSE2.adresse_id
                           left join courrier_montants_v on declaration_v.courrier_id = courrier_montants_v.courrier_id ,
                           ville ville_a ,
                           ville ville_b ,
                           courrier_retour_fonds_v left outer join LIVRAISON l on l.COURRIER_ID = courrier_retour_fonds_v.COURRIER_ID   left outer join
                           (select courrier_id,max(BORDEREAU_DAT) as BORDEREAU_DAT,max(b.BORDEREAU_NUM)as BORDEREAU_NUM
                           from COURRIER_BORDEREAU cb inner join BORDEREAU b on b.BORDEREAU_NUM = cb.BORDEREAU_NUM where b.BORDEREAU_TYP='CR' group by courrier_id)b
                             on b.COURRIER_ID = courrier_retour_fonds_v.COURRIER_ID
                           WHERE ( agence.agence_cod = courrier_agence.agence_cod )
                           and          ( courrier_agence.courrier_id = declaration_v.courrier_id ) and
                           ( declaration_v.ville1_cod = ville_a.ville_cod ) and
                                  declaration_v.ville2_cod = ville_b.ville_cod  and
                             declaration_v.courrier_id = courrier_retour_fonds_v.courrier_id   and            courrier_agence.inter_typ = 'D'
                             and declaration_v.courrier_id=@COURRIER_ID

                           SET @LinkedServer = 'SVWEBEXT'
                           SET @OPENQUERY = 'UPDATE OPENQUERY('+ @LinkedServer + ','''
                           SET @TSQL = 'SELECT  courrier_id, Agence, Numero, Code1, Expediteur, Code2, destinataire, adresse1, adresse2, Ville1, Ville2, Port, Colis, Poids, type, Montant_ttc, Espece, Cheque, Traite, bl, num, date_livraison, statut, statut_suivis, Motif
                           FROM  lvedbexp.etat_expedition   where COURRIER_id ='''''+isnull(@courrier_tmp_id,'')+''''' '') SET
                           Agence  ='''+isnull(@Agence_tmp,'')+''' ,
                           Numero  ='''+isnull(@Numero_tmp,'')+''' ,
                           Code1  ='''+isnull(@Code1_tmp,'')+''' ,
                           Expediteur  ='''+isnull(REPLACE(@Expediteur_tmp, '''', ''''''),'')+''' ,
                           Code2  ='''+isnull(@Code2_tmp,'')+''' ,
                           destinataire  ='''+isnull(REPLACE(@destinataire_tmp, '''', ''''''),'')+''' ,
                           adresse1  ='''+isnull(REPLACE(@adresse1_tmp, '''', ''''''),'')+''' ,
                           adresse2  ='''+isnull(REPLACE(@adresse2_tmp, '''', ''''''),'')+''' ,
                           Ville1  ='''+isnull(REPLACE(@Ville1_tmp, '''', ''''''),'')+''' ,
                           Ville2  ='''+isnull(REPLACE(@Ville2_tmp, '''', ''''''),'')+''' ,
                           Port  ='''+isnull(@Port_tmp,'')+''' ,
                           Colis  ='''+isnull(@Colis_tmp,'')+''' ,
                           Poids  ='''+isnull(@Poids_tmp,'')+''' ,
                           type  ='''+isnull(@type_tmp,'')+''' ,
                           Montant_ttc  ='''+isnull(@Montant_ttc_tmp,0)+''' ,
                           Espece  ='''+isnull(@Espece_tmp,0)+''' ,
                           Cheque  ='''+isnull(@Cheque_tmp,0)+''' ,
                           Traite  ='''+isnull(@Traite_tmp,0)+''' ,
                           bl  ='''+isnull(@bl_tmp,'0')+''' ,
                           num  ='''+isnull(REPLACE(@num_tmp, '''', ''''''),'')+''' ,'

                           if @date_livraison_tmp is not null
                           SET @TSQL =@TSQL+'date_livraison  ='''+isnull(@date_livraison_tmp,'')+''' ,'
                           SET @TSQL =@TSQL+'statut_suivis  ='''+isnull(@STATUS_LIV,'')+''' ,'
						   SET @TSQL =@TSQL+'statut  ='''+isnull(@STATUS,'')+''' ,
                           Motif  ='''+isnull(@Motif_tmp,'')+'''  ; '

                                  -- print @OPENQUERY+@TSQL

BEGIN TRY


       exec (@OPENQUERY+@TSQL)

       delete  FROM events_etat_expedition where COURRIER_ID=@COURRIER_ID

END TRY
BEGIN CATCH
    SELECT
                           ERROR_NUMBER() AS ErrorNumber
                       ,ERROR_MESSAGE() AS ErrorMessage,@COURRIER_ID as COURRIER_ID;
END CATCH;

                                                            set @courrier_tmp_id=null
                                                            set @Agence_tmp=null
                                                            set @Numero_tmp=null
                                                            set @Code1_tmp=null
                                                            set @Expediteur_tmp=null
                                                            set @Code2_tmp=null
                                                            set @destinataire_tmp=null
                                                            set @adresse1_tmp=null
                                                            set @adresse2_tmp=null
                                                            set @Ville1_tmp=null
                                                            set @Ville2_tmp=null
                                                            set @Port_tmp=null
                                                            set @Colis_tmp=null
                                                            set @Poids_tmp=null
                                                            set @type_tmp=null
                                                            set @Montant_ttc_tmp=null
                                                            set @Espece_tmp=null
                                                            set @Cheque_tmp=null
                                                            set @Traite_tmp=null
                                                            set @bl_tmp=null
                                                            set @num_tmp=null
                                                            set @date_livraison_tmp=null
															set @statut_tmp=null
                                                            set @statut_liv_tmp=null
                                                            set @Motif_tmp=null

end

-------*******************************************************
-------*******************************************************
/*-----*/

FETCH NEXT FROM COURRIER_CURSOR
INTO @COURRIER_ID
END
CLOSE COURRIER_CURSOR;
DEALLOCATE COURRIER_CURSOR;


     INSERT INTO OPENQUERY(SVWEBEXT, 'SELECT `Agence`, `courrier_id`, `Numero`, `Date`, `Code1`, `Expediteur`, `Code2`, `destinataire`, `adresse1`, `adresse2`, `Ville1`, `Ville2`, `Port`, `Colis`, `Poids`, `type`, `Montant_ttc`, `Espece`, `Cheque`, `Traite`, `bl`, `Recu`, `date_recu`, `num`, `date_bordereau`, `date_livraison`, `Delais_Cible`, `Ecart`, `Depassement`, `Ecart2`, `service`, `BORDEREAU_NUM`, `livraison`, `ramasseur`, `FC_date1`, `FC_date2`, `date_caisse`, `statut`, `statut_suivis`, `FC_date_arrive`, `Motif`, `Taxateur` FROM lvedbexp.etat_expedition')
                                  SELECT	agence.agence_lib as 'Agence',
											declaration_v.courrier_id,
                                            declaration_v.numero as 'Numero',
                                            cast(declaration_v.date as date) as 'Date',
                                            declaration_v.code_expediteur as 'Code1',
                                            declaration_v.expediteur as 'Expediteur',
                                            declaration_v.code_destinataire as 'Code2',
                                            declaration_v.destinataire as 'destinataire',
                                            ADRESSE1.ADRESSE_LIB ADRESSE1,
                                            ADRESSE2.ADRESSE_LIB ADRESSE2,
                                            ville_a.ville_lib as 'Ville1',
                                            ville_b.ville_lib as 'Ville2',
                                            declaration_v.port as 'Port',
                                            declaration_v.colis as 'Colis',
                                            declaration_v.poids as 'Poids',
                                            declaration_v.courrier_typ as 'type',
                                            courrier_montants_v.montant_ttc as 'Montant_ttc',
                                            isnull( courrier_retour_fonds_v.espece ,0)as 'Espece',
                                            isnull( courrier_retour_fonds_v.cheque,0) as 'Cheque',
                                            isnull(courrier_retour_fonds_v.traite,0) as 'Traite',
                                            isnull(courrier_retour_fonds_v.bl,0) as 'bl',
                                            courrier_retour_fonds_v.recu_num as 'Recu',
                                            cast(( select RECU_DAT  from  RETOUR_FONDS_CONFIRME where COURRIER_ID= declaration_v.courrier_id) as date) as 'date_recu',
                                            courrier_retour_fonds_v.num as 'num' ,
                                            cast(b.BORDEREAU_DAT as date) as 'date_bordereau',
                                            cast(l.ETAT_DAT as datetime)  as 'date_livraison' ,
                                            ville_b.DELAI as 'Delais_Cible',
                                            DATEDIFF(day,cast(declaration_v.date as date), cast(l.ETAT_DAT as date)) as 'Ecart',
                                            DATEDIFF(day,cast(declaration_v.date as date), cast(l.ETAT_DAT as date)) -  ville_b.DELAI as 'Depassement'  ,
                                            DATEDIFF(day,cast(l.ETAT_DAT as date), cast(b.BORDEREAU_DAT as date)) as 'Ecart2',
                                            case service when 0 then 'NON' else 'OUI' end as 'service', b.BORDEREAU_NUM,declaration_v.livraison,
											(SELECT     top 1       EMPLOYE.MATRICULE +' ' + NOM +' '+PRENOM
                                                 FROM  COURRIER_ENSEMBLE INNER JOIN
                                               ENSEMBLE ON COURRIER_ENSEMBLE.ENSEMBLE_NUM = ENSEMBLE.ENSEMBLE_NUM INNER JOIN
                                               MANIPULE ON ENSEMBLE.ENSEMBLE_NUM = MANIPULE.ENSEMBLE_NUM INNER JOIN
                                               EMPLOYE ON MANIPULE.EMPLOYE_ID = EMPLOYE.EMPLOYE_ID LEFT OUTER JOIN
                                               VEHICULE ON MANIPULE.VEHICULE_NUM = VEHICULE.VEHICULE_NUM
                                  WHERE        (ENSEMBLE.ENSEMBLE_TYP IN ('CB', 'CG')) AND (COURRIER_ENSEMBLE.COURRIER_ID = declaration_v.courrier_id) ) as  ramasseur
                                  ,(  SELECT TOP 1  ENSEMBLE_DAT
                                                         FROM fc_ENSEMBLE_v fc join declaration_v d on fc.courrier_id=d.courrier_id
                                                         WHERE  d.courrier_id=declaration_v.courrier_id
                                                            ORDER BY fc. ENSEMBLE_DAT ASC  ) as FC_date1
                                  ,(  SELECT TOP 1  ENSEMBLE_DAT
                                                         FROM fc_ENSEMBLE_v fc join declaration_v d on fc.courrier_id=d.courrier_id
                                                         WHERE  d.courrier_id=declaration_v.courrier_id
                                                            ORDER BY fc. ENSEMBLE_DAT DESC ) as FC_date2
                                  ,( select caisse_centrale.JOURNAL_DAT 'date caisse' from  declaration_v d
                                               left join courrier_caisse cc on d.courrier_id=cc.courrier_id and cc.m_typ='AR'
                                               left join caisse_centrale   on cc.journal_id = caisse_centrale.journal_id and cc.m_typ='AR'
                                               where  d.courrier_id=declaration_v.courrier_id) as date_caisse,
                                               insert_tmp.STATUS AS 'statut',insert_tmp.STATUS_LIV AS 'statut_suivis',
                                  (  SELECT TOP 1  arrive_valid
                                                         FROM fc_ENSEMBLE_v fc
                                                         WHERE  fc.courrier_id=declaration_v.courrier_id
                                                            ORDER BY fc. arrive_valid desc ) as FC_date_arrive,
                                                            (select top 1 MOTIF_LIB from courrier_ensemble
                                  left join [MOTIF_NONLIVRE] on [MOTIF_NONLIVRE].MOTIF_COD=courrier_ensemble.motif_cod
                                  left join ensemble on ensemble.ensemble_num = courrier_ensemble.ensemble_num
                                  where courrier_ensemble.courrier_id = declaration_v.courrier_id
                                  and  ensemble.ensemble_typ = 'CL' AND MOTIF_LIB IS NOT NULL
                                  order by ENSEMBLE_DAT desc
                                  ) as Motif,(
                                  SELECT              EMPLOYE.MATRICULE +' ' + NOM +' '+PRENOM
                                  FROM                dec_hist_v
                                  left join     utilisateur on dec_hist_v.user_id = utilisateur.user_id
                                  left join employe on utilisateur.EMPLOYE_ID = employe.EMPLOYE_ID
                                  WHERE          ( dec_hist_v.courrier_id = declaration_v.courrier_id  )  AND  action_typ='I') as Taxateur

                                  FROM  agence ,
                                  courrier_agence ,
                                  declaration_v
join @table_insert_tmp insert_tmp on declaration_v.courrier_id=insert_tmp.courrier_id

                                  join ADRESSE ADRESSE1 on declaration_v.adresse1_id=ADRESSE1.adresse_id
                                  join ADRESSE ADRESSE2 on declaration_v.adresse2_id=ADRESSE2.adresse_id


                                  left join courrier_montants_v on declaration_v.courrier_id = courrier_montants_v.courrier_id ,
                                  ville ville_a ,
                                  ville ville_b ,
                                  courrier_retour_fonds_v left outer join LIVRAISON l on l.COURRIER_ID = courrier_retour_fonds_v.COURRIER_ID   left outer join
                                  (select courrier_id,max(BORDEREAU_DAT) as BORDEREAU_DAT,max(b.BORDEREAU_NUM)as BORDEREAU_NUM
                                  from COURRIER_BORDEREAU cb inner join BORDEREAU b on b.BORDEREAU_NUM = cb.BORDEREAU_NUM where b.BORDEREAU_TYP='CR' group by courrier_id)b
                                    on b.COURRIER_ID = courrier_retour_fonds_v.COURRIER_ID
                                  WHERE declaration_v.courrier_typ='M'  and ( agence.agence_cod = courrier_agence.agence_cod )
                                  and          ( courrier_agence.courrier_id = declaration_v.courrier_id ) and
                                  ( declaration_v.ville1_cod = ville_a.ville_cod ) and
                                        declaration_v.ville2_cod = ville_b.ville_cod  and
                                    declaration_v.courrier_id = courrier_retour_fonds_v.courrier_id   and            courrier_agence.inter_typ = 'D'
                                  and  declaration_v.courrier_id =insert_tmp.COURRIER_ID



END


--GO


GO


