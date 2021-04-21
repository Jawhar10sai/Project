USE [VEXINITIAL]
GO

/****** Object:  StoredProcedure [dbo].[ps_mise_a_jours_etat_expedition]    Script Date: 22/10/2020 16:32:21 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO




CREATE PROCEDURE [dbo].[ps_mise_a_jours_etat_expedition]
AS
BEGIN
  DECLARE @ETAT_FIN smallint,
          @COLIS_LV smallint,
          @COURRIER_ID numeric(24, 0),
          @DATE_SAISIE datetime,
          @DESTINATAIRE varchar(60),
          @AGDEPART varchar(50),
          @AGARRIVE varchar(50),
          @AGARRIVE2 varchar(50),
          @LIEU varchar(50),
          @STATUS varchar(50),
          @DESTIN_TYP smallint,
          @ENSEMBLE_NUM char(60),
          @NOM_LIVREUR varchar(100),
          @MATRICULE char(10),
          @VOYAGE_NUM char(16),
          @ENSEMBLE_ETA char(1),
          @TEL varchar(100),
          @DATED varchar(10),
          @DATEF varchar(10),
          @VOYAGE_DAT datetime,
          @ARRIVE_DAT datetime,
          @dat datetime,
          @courrier_id_tmp numeric(24, 0),
          @TSQL nvarchar(4000),
          @OPENQUERY nvarchar(4000),
          @LinkedServer nvarchar(4000),
          @courrier_tmp_id nvarchar(4000),
          @Agence_tmp nvarchar(4000),
          @Numero_tmp nvarchar(4000),
          @Code1_tmp nvarchar(4000),
          @Expediteur_tmp nvarchar(4000),
          @Code2_tmp nvarchar(4000),
          @destinataire_tmp nvarchar(4000),
          @adresse1_tmp nvarchar(4000),
          @adresse2_tmp nvarchar(4000),
          @Ville1_tmp nvarchar(4000),
          @Ville2_tmp nvarchar(4000),
          @Port_tmp nvarchar(2),
          @Colis_tmp nvarchar(4000),
          @Poids_tmp nvarchar(4000),
          @type_tmp nvarchar(2),
          @Montant_ttc_tmp nvarchar(4000),
          @Espece_tmp nvarchar(4000),
          @Cheque_tmp nvarchar(4000),
          @Traite_tmp nvarchar(4000),
          @bl_tmp nvarchar(4000),
          @num_tmp nvarchar(4000),
          @date_livraison_tmp nvarchar(4000),
          @statut_tmp nvarchar(4000),
          @Motif_tmp nvarchar(4000),
          @table_insert_tmp TABLE (
            COURRIER_ID numeric(24, 0),
            STATUS varchar(50)
          )

  SET @DATED = CONVERT(varchar(10), DATEADD(MONTH, -1, GETDATE()), 103)
  SET @DATEF = CONVERT(varchar(10), GETDATE(), 103)

  --SET @DATED=CONVERT(VARCHAR(10), DATEADD(DAY,-5,GETDATE()) , 103 )
  --SET @DATEF=CONVERT(VARCHAR(10),GETDATE(), 103 )

  --SET @DATED='01/01/2020 00:00:00'
  --SET @DATEF='31/01/2020 23:59:59'
  DECLARE COURRIER_CURSOR CURSOR FOR

  --SELECT  COURRIER_ID  FROM events_etat_expedition group by COURRIER_ID
  SELECT
    courrier.courrier_id
  FROM events_etat_expedition
  JOIN courrier
    ON courrier.courrier_id = events_etat_expedition.courrier_id
    AND courrier.courrier_typ = 'M'
  GROUP BY courrier.courrier_id
  ------------------
  ------------ table events qui s'aliment avec les trigers dans les table (intervient,COURRIER,  LIVRAISON,COURRIER_ENSEMBLE,TRANSPORTE_ENSEMBLE,TRANSPORTE)
  ----------------
  OPEN COURRIER_CURSOR
  FETCH NEXT FROM COURRIER_CURSOR
  INTO @COURRIER_ID

  WHILE @@FETCH_STATUS = 0
  BEGIN
    /*-----*/

    /*
    SET @COURRIER_ID = (SELECT  TOP 1 COURRIER_ID  FROM COURRIER WHERE COURRIER_NUM like '%[957][957][957]' + @COURRIER_NUM ORDER BY len(COURRIER_NUM) DESC)
    IF (@COURRIER_ID IS NULL)
    SET @COURRIER_ID = (SELECT COURRIER_ID  FROM COURRIER WHERE COURRIER_NUM = @COURRIER_NUM )
    */

    SET @ETAT_FIN = NULL
    SET @ENSEMBLE_NUM = NULL
    SET @VOYAGE_NUM = NULL
    SELECT
      @COURRIER_ID = COURRIER_ID,
      @AGDEPART = A1.AGENCE_LIB,
      @AGARRIVE = A2.AGENCE_LIB,
      @DESTINATAIRE = DESTINATAIRE,
      @DATE_SAISIE = DATE_SAISIE
    FROM DECLARATION_V
    INNER JOIN VILLE V1
      ON V1.VILLE_COD = DECLARATION_V.VILLE1_COD
    INNER JOIN VILLE V2
      ON V2.VILLE_COD = DECLARATION_V.VILLE2_COD
    INNER JOIN AGENCE A1
      ON V1.AGENCE_COD = A1.AGENCE_COD
    INNER JOIN AGENCE A2
      ON V2.AGENCE_COD = A2.AGENCE_COD
    WHERE COURRIER_ID = @COURRIER_ID

    SELECT
      @ETAT_FIN = ETAT_FINAL,
      @COLIS_LV = ISNULL(COLIS, 0),
      @MATRICULE = EMPLOYE.MATRICULE, 
      @dat = etat_dat,
      @NOM_LIVREUR = EMPLOYE.NOM + ' ' + EMPLOYE.PRENOM,
      @TEL = ISNULL('TEL1: ' + EMPLOYE.TELEPHONE1, '') + ISNULL(' TEL2: ' + EMPLOYE.GSM, '')
    FROM LIVRAISON
    LEFT OUTER JOIN MANIPULE
      ON LIVRAISON.ENSEMBLE_NUM = MANIPULE.ENSEMBLE_NUM
    INNER JOIN EMPLOYE
      ON MANIPULE.EMPLOYE_ID = EMPLOYE.EMPLOYE_ID
    WHERE COURRIER_ID = @COURRIER_ID
    IF (@ETAT_FIN IS NOT NULL)
    BEGIN
      SELECT
        @STATUS =
                 CASE @ETAT_FIN
                   WHEN 0 THEN 'Livrée'
                   WHEN 2 THEN 'Retournée'
                   WHEN 3 THEN 'Epave'
                   WHEN 4 THEN (CASE
                       WHEN @COLIS_LV = 0 THEN 'Avarie'
                       ELSE 'Livraison Partielle(' + CONVERT(varchar(5), @COLIS_LV + ')')
                     END)
                 END
      IF (@ETAT_FIN IS NOT NULL)
      BEGIN
        SET @DATE_SAISIE = CONVERT(datetime, FLOOR(CONVERT(float, @dat)))
      END
      SELECT
        @LIEU =
               CASE @ETAT_FIN
                 WHEN 0 THEN @DESTINATAIRE
                 WHEN 2 THEN @AGDEPART
                 WHEN 3 THEN @AGDEPART
                 WHEN 4 THEN (CASE
                     WHEN @COLIS_LV = 0 THEN @AGDEPART
                     ELSE @AGARRIVE
                   END)
               END
    END
    ELSE
    BEGIN
      SELECT TOP 1
        @ENSEMBLE_NUM = ENSEMBLE.ENSEMBLE_NUM,
        @DESTIN_TYP = ISNULL(COURRIER_ENSEMBLE.DESTIN_TYP, -1),
        @MATRICULE = EMPLOYE.MATRICULE,
        @dat = ensemble.ensemble_dat,
        @NOM_LIVREUR = EMPLOYE.NOM + ' ' + EMPLOYE.PRENOM,
        @TEL = ISNULL('TEL1: ' + EMPLOYE.TELEPHONE1, '') + ISNULL(' TEL2: ' + EMPLOYE.GSM, '')
      FROM COURRIER_ENSEMBLE
      INNER JOIN ENSEMBLE
        ON COURRIER_ENSEMBLE.ENSEMBLE_NUM = ENSEMBLE.ENSEMBLE_NUM
      INNER JOIN AGENCE
        ON ENSEMBLE.AGENCE_COD = AGENCE.AGENCE_COD
      INNER JOIN MANIPULE
        ON MANIPULE.ENSEMBLE_NUM = ENSEMBLE.ENSEMBLE_NUM
      INNER JOIN EMPLOYE
        ON MANIPULE.EMPLOYE_ID = EMPLOYE.EMPLOYE_ID
      WHERE COURRIER_ENSEMBLE.COURRIER_ID = @COURRIER_ID
      AND ENSEMBLE.ENSEMBLE_TYP = 'CL'
      ORDER BY ENSEMBLE.ENSEMBLE_DAT DESC

      IF (@ENSEMBLE_NUM IS NOT NULL)

      BEGIN
        SELECT
          @STATUS =
                   CASE @DESTIN_TYP
                     WHEN 1 THEN 'à Relivrée'
                     WHEN -1 THEN 'Chargé'
                     WHEN 0 THEN 'livrée'
                     ELSE 'à Relivrée'
                   END
        SET @DATE_SAISIE = CONVERT(datetime, FLOOR(CONVERT(float, @dat)))
        SELECT
          @LIEU =
                 CASE @DESTIN_TYP
                   WHEN 1 THEN @AGARRIVE
                   WHEN -1 THEN 'En Route'
                   WHEN 0 THEN @DESTINATAIRE
                   ELSE @AGARRIVE
                 END
      END
      ELSE
      BEGIN
        SELECT TOP 1
          @VOYAGE_NUM = TRANSPORTE.VOYAGE_NUM,
          @VOYAGE_DAT = TRANSPORTE.SAISIE_DAT,
          @ARRIVE_DAT = TRANSPORTE.ARRIVE_DAT,
          @ENSEMBLE_ETA = ENSEMBLE.ENSEMBLE_ETA,
          @AGARRIVE2 = AGENCE.AGENCE_LIB

        FROM COURRIER_ENSEMBLE
        INNER JOIN ENSEMBLE
          ON ENSEMBLE.ENSEMBLE_NUM = COURRIER_ENSEMBLE.ENSEMBLE_NUM
        INNER JOIN TRANSPORTE_ENSEMBLE
          ON ENSEMBLE.ENSEMBLE_NUM = TRANSPORTE_ENSEMBLE.ENSEMBLE_NUM
        INNER JOIN TRANSPORTE
          ON TRANSPORTE_ENSEMBLE.VOYAGE_NUM = TRANSPORTE.VOYAGE_NUM
        INNER JOIN AGENCE
          ON AGENCE.AGENCE_COD = ENSEMBLE.AGENCE2_COD
        WHERE COURRIER_ENSEMBLE.COURRIER_ID = @COURRIER_ID
        AND ENSEMBLE.ENSEMBLE_TYP = 'FC'
        ORDER BY TRANSPORTE.SAISIE_DAT DESC


        IF (@VOYAGE_NUM IS NOT NULL)
        BEGIN
          IF (@AGARRIVE <> @AGARRIVE2)
          BEGIN
            SELECT
              @STATUS =
                       CASE @ENSEMBLE_ETA
                         WHEN 'V' THEN 'Arrivée : Agence Transit La Voie Express'
                         ELSE 'En Route'
                       END
            SELECT
              @LIEU =
                     CASE @ENSEMBLE_ETA
                       WHEN 'V' THEN @AGARRIVE2
                       ELSE 'En Route vers : ' + @AGARRIVE2
                     END
            SET @DATE_SAISIE = CONVERT(datetime, FLOOR(CONVERT(float, @VOYAGE_DAT)))
          END
          ELSE
          BEGIN
            SELECT
              @STATUS =
                       CASE @ENSEMBLE_ETA
                         WHEN 'V' THEN 'Arrivée : Agence de Destination La Voie Express'
                         ELSE 'En Route vers ' + @AGARRIVE
                       END
            SELECT
              @LIEU =
                     CASE @ENSEMBLE_ETA
                       WHEN 'V' THEN @AGARRIVE
                       ELSE 'En Route vers : ' + @AGARRIVE
                     END
            IF (@arrive_dat IS NOT NULL)
              SET @DATE_SAISIE = CONVERT(datetime, FLOOR(CONVERT(float, @arrive_dat)))
            ELSE
              SET @DATE_SAISIE = CONVERT(datetime, FLOOR(CONVERT(float, @VOYAGE_DAT)))
          END
        END
        ELSE
        BEGIN
          SELECT TOP 1
            @VOYAGE_NUM = ENSEMBLE.ENSEMBLE_NUM,
            @ENSEMBLE_ETA = ENSEMBLE.ENSEMBLE_ETA,
            @AGDEPART = AGENCE.AGENCE_LIB,
            @dat = ensemble_dat
          FROM COURRIER_ENSEMBLE
          INNER JOIN ENSEMBLE
            ON ENSEMBLE.ENSEMBLE_NUM = COURRIER_ENSEMBLE.ENSEMBLE_NUM
          INNER JOIN AGENCE
            ON AGENCE.AGENCE_COD = ENSEMBLE.AGENCE_COD
          WHERE COURRIER_ENSEMBLE.COURRIER_ID = @COURRIER_ID
          AND ENSEMBLE.ENSEMBLE_TYP = 'FC'
          AND ENSEMBLE.ENSEMBLE_NUM NOT IN (SELECT
            TRANSPORTE_ENSEMBLE.ENSEMBLE_NUM
          FROM TRANSPORTE_ENSEMBLE)
          ORDER BY ENSEMBLE.ENSEMBLE_DAT DESC

          IF (@VOYAGE_NUM IS NOT NULL)
          BEGIN
            SELECT
              @STATUS =
                       CASE @ENSEMBLE_ETA
                         WHEN 'O' THEN 'En Cours de Chargement dans un Camion'
                         ELSE '.'
                       END
            SELECT
              @LIEU =
                     CASE @ENSEMBLE_ETA
                       WHEN 'O' THEN @AGDEPART
                       ELSE '.'
                     END
          END
          ELSE
          BEGIN
            SET @STATUS = 'Expedition Encore dans l''''agence de depart'
            SET @LIEU = @AGDEPART
          END
          SET @DATE_SAISIE = CONVERT(datetime, FLOOR(CONVERT(float, @dat)))
        END

      END
    END
    -------*******************************************************
    -------*******************************************************


    SET @LinkedServer = 'SVWEBEXT'
    SET @OPENQUERY = 'SELECT courrier_id FROM OPENQUERY(' + @LinkedServer + ','''
    SET @TSQL = 'SELECT courrier_id FROM lvedbexp.etat_expedition  WHERE courrier_id=' + CAST(@COURRIER_ID AS varchar) + ' '')'

    CREATE TABLE #EventId (
      courrier_id nvarchar(50)
    )

    INSERT INTO #EventId
    EXEC (@OPENQUERY + @TSQL)


    SET @courrier_id_tmp = 0

    SELECT
      @courrier_id_tmp = ISNULL(courrier_id, 0)
    FROM #EventId

    DROP TABLE #EventId
    IF @courrier_id_tmp <> @COURRIER_ID
    BEGIN
      PRINT 'insert'

      INSERT INTO @table_insert_tmp
        VALUES (@COURRIER_ID, @STATUS)
      DELETE FROM events_etat_expedition
      WHERE COURRIER_ID = @COURRIER_ID
    END
    ELSE
    BEGIN

      PRINT 'update'
      SELECT
        @courrier_tmp_id = declaration_v.courrier_id,
        @Agence_tmp = LTRIM(RTRIM(agence.agence_lib)),
        @Numero_tmp = LTRIM(RTRIM(declaration_v.numero)),
        @Code1_tmp = LTRIM(RTRIM(declaration_v.code_expediteur)),
        @Expediteur_tmp = LTRIM(RTRIM(declaration_v.expediteur)),
        @Code2_tmp = LTRIM(RTRIM(declaration_v.code_destinataire)),
        @destinataire_tmp = LTRIM(RTRIM(declaration_v.destinataire)),
        @adresse1_tmp = LTRIM(RTRIM(ADRESSE1.ADRESSE_LIB)),
        @adresse2_tmp = LTRIM(RTRIM(ADRESSE2.ADRESSE_LIB)),
        @Ville1_tmp = LTRIM(RTRIM(ville_a.ville_lib)),
        @Ville2_tmp = LTRIM(RTRIM(ville_b.ville_lib)),
        @Port_tmp = LTRIM(RTRIM(declaration_v.port)),
        @Colis_tmp = LTRIM(RTRIM(declaration_v.colis)),
        @Poids_tmp = LTRIM(RTRIM(declaration_v.poids)),
        @type_tmp = LTRIM(RTRIM(declaration_v.courrier_typ)),
        @Montant_ttc_tmp = LTRIM(RTRIM(courrier_montants_v.montant_ttc)),
        @Espece_tmp = LTRIM(RTRIM(courrier_retour_fonds_v.espece)),
        @Cheque_tmp = LTRIM(RTRIM(courrier_retour_fonds_v.cheque)),
        @Traite_tmp = LTRIM(RTRIM(courrier_retour_fonds_v.traite)),
        @bl_tmp = LTRIM(RTRIM(courrier_retour_fonds_v.bl)),
        @num_tmp = LTRIM(RTRIM(courrier_retour_fonds_v.num)),
        @date_livraison_tmp = LTRIM(RTRIM(CAST(l.ETAT_DAT AS datetime))),
        @statut_tmp = LTRIM(RTRIM(@STATUS)),
        @Motif_tmp = LTRIM(RTRIM((SELECT TOP 1
          MOTIF_LIB
        FROM courrier_ensemble
        LEFT JOIN [MOTIF_NONLIVRE]
          ON [MOTIF_NONLIVRE].MOTIF_COD = courrier_ensemble.motif_cod
        LEFT JOIN ensemble
          ON ensemble.ensemble_num = courrier_ensemble.ensemble_num
        WHERE courrier_ensemble.courrier_id = declaration_v.courrier_id
        AND ensemble.ensemble_typ = 'CL'
        AND MOTIF_LIB IS NOT NULL
        ORDER BY ENSEMBLE_DAT DESC)
        ))

      FROM agence,
           courrier_agence,
           declaration_v
           JOIN ADRESSE ADRESSE1
             ON declaration_v.adresse1_id = ADRESSE1.adresse_id
           JOIN ADRESSE ADRESSE2
             ON declaration_v.adresse2_id = ADRESSE2.adresse_id
           LEFT JOIN courrier_montants_v
             ON declaration_v.courrier_id = courrier_montants_v.courrier_id,
           ville ville_a,
           ville ville_b,
           courrier_retour_fonds_v
           LEFT OUTER JOIN LIVRAISON l
             ON l.COURRIER_ID = courrier_retour_fonds_v.COURRIER_ID
           LEFT OUTER JOIN (SELECT
             courrier_id,
             MAX(BORDEREAU_DAT) AS BORDEREAU_DAT,
             MAX(b.BORDEREAU_NUM) AS BORDEREAU_NUM
           FROM COURRIER_BORDEREAU cb
           INNER JOIN BORDEREAU b
             ON b.BORDEREAU_NUM = cb.BORDEREAU_NUM
           WHERE b.BORDEREAU_TYP = 'CR'
           GROUP BY courrier_id) b
             ON b.COURRIER_ID = courrier_retour_fonds_v.COURRIER_ID
      WHERE (agence.agence_cod = courrier_agence.agence_cod)
      AND (courrier_agence.courrier_id = declaration_v.courrier_id)
      AND (declaration_v.ville1_cod = ville_a.ville_cod)
      AND declaration_v.ville2_cod = ville_b.ville_cod
      AND declaration_v.courrier_id = courrier_retour_fonds_v.courrier_id
      AND courrier_agence.inter_typ = 'D'
      AND declaration_v.courrier_id = @COURRIER_ID


      --select @courrier_tmp_id as courrier_id, @Agence_tmp as Agence, @Numero_tmp as Numero, @Code1_tmp as Code1, @Expediteur_tmp as Expediteur, @Code2_tmp as Code2, @destinataire_tmp as destinataire, @adresse1_tmp as adresse1, @adresse2_tmp as adresse2, @Ville1_tmp as Ville1, @Ville2_tmp as Ville2, @Port_tmp as Port, @Colis_tmp as Colis, @Poids_tmp as Poids, @type_tmp as type, @Montant_ttc_tmp as Montant_ttc, @Espece_tmp as Espece, @Cheque_tmp as Cheque, @Traite_tmp as Traite, @bl_tmp as bl, @num_tmp as num, @date_livraison_tmp as date_livraison, @statut_tmp as statut, @Motif_tmp as Motif

      SET @LinkedServer = 'SVWEBEXT'
      SET @OPENQUERY = 'UPDATE OPENQUERY(' + @LinkedServer + ','''
      SET @TSQL = 'SELECT  courrier_id, Agence, Numero, Code1, Expediteur, Code2, destinataire, adresse1, adresse2, Ville1, Ville2, Port, Colis, Poids, type, Montant_ttc, Espece, Cheque, Traite, bl, num, date_livraison, statut, Motif
				 FROM  lvedbexp.etat_expedition   where COURRIER_id =''''' + ISNULL(@courrier_tmp_id, '') + ''''' '') SET
				Agence  =''' + ISNULL(@Agence_tmp, '') + ''' ,
				Numero  =''' + ISNULL(@Numero_tmp, '') + ''' ,
				Code1  =''' + ISNULL(@Code1_tmp, '') + ''' ,
				Expediteur  =''' + ISNULL(REPLACE(@Expediteur_tmp, '''', ''''''), '') + ''' ,
				Code2  =''' + ISNULL(@Code2_tmp, '') + ''' ,
				destinataire  =''' + ISNULL(REPLACE(@destinataire_tmp, '''', ''''''), '') + ''' ,
				adresse1  =''' + ISNULL(REPLACE(@adresse1_tmp, '''', ''''''), '') + ''' ,
				adresse2  =''' + ISNULL(REPLACE(@adresse2_tmp, '''', ''''''), '') + ''' ,
				Ville1  =''' + ISNULL(REPLACE(@Ville1_tmp, '''', ''''''), '') + ''' ,
				Ville2  =''' + ISNULL(REPLACE(@Ville2_tmp, '''', ''''''), '') + ''' ,
				Port  =''' + ISNULL(@Port_tmp, '') + ''' ,
				Colis  =''' + ISNULL(@Colis_tmp, '') + ''' ,
				Poids  =''' + ISNULL(@Poids_tmp, '') + ''' ,
				type  =''' + ISNULL(@type_tmp, '') + ''' ,
				Montant_ttc  =''' + ISNULL(@Montant_ttc_tmp, 0) + ''' ,
				Espece  =''' + ISNULL(@Espece_tmp, 0) + ''' ,
				Cheque  =''' + ISNULL(@Cheque_tmp, 0) + ''' ,
				Traite  =''' + ISNULL(@Traite_tmp, 0) + ''' ,
				bl  =''' + ISNULL(@bl_tmp, '0') + ''' ,
				num  =''' + ISNULL(REPLACE(@num_tmp, '''', ''''''), '') + ''' ,'

      IF @date_livraison_tmp IS NOT NULL
        SET @TSQL = @TSQL + 'date_livraison  =''' + ISNULL(@date_livraison_tmp, '') + ''' ,'

      SET @TSQL = @TSQL + 'statut  =''' + ISNULL(@STATUS, '') + ''' ,
				Motif  =''' + ISNULL(@Motif_tmp, '') + '''  ; '

      PRINT @OPENQUERY + @TSQL

    BEGIN TRY


      EXEC (@OPENQUERY + @TSQL)

      DELETE FROM events_etat_expedition
      WHERE COURRIER_ID = @COURRIER_ID

    END TRY
    BEGIN CATCH
      SELECT
        ERROR_NUMBER() AS ErrorNumber,
        ERROR_MESSAGE() AS ErrorMessage,
        @COURRIER_ID AS COURRIER_ID;
    END CATCH;
      SET @courrier_tmp_id = NULL
      SET @Agence_tmp = NULL
      SET @Numero_tmp = NULL
      SET @Code1_tmp = NULL
      SET @Expediteur_tmp = NULL
      SET @Code2_tmp = NULL
      SET @destinataire_tmp = NULL
      SET @adresse1_tmp = NULL
      SET @adresse2_tmp = NULL
      SET @Ville1_tmp = NULL
      SET @Ville2_tmp = NULL
      SET @Port_tmp = NULL
      SET @Colis_tmp = NULL
      SET @Poids_tmp = NULL
      SET @type_tmp = NULL
      SET @Montant_ttc_tmp = NULL
      SET @Espece_tmp = NULL
      SET @Cheque_tmp = NULL
      SET @Traite_tmp = NULL
      SET @bl_tmp = NULL
      SET @num_tmp = NULL
      SET @date_livraison_tmp = NULL
      SET @statut_tmp = NULL
      SET @Motif_tmp = NULL

    END
    -------*******************************************************
    -------*******************************************************
    /*-----*/

    FETCH NEXT FROM COURRIER_CURSOR
    INTO @COURRIER_ID
  END
  CLOSE COURRIER_CURSOR;
  DEALLOCATE COURRIER_CURSOR;

  INSERT INTO OPENQUERY(SVWEBEXT, 'SELECT * FROM lvedbexp.etat_expedition')
    SELECT
      agence.agence_lib AS 'Agence',
      declaration_v.courrier_id,
      declaration_v.numero AS 'Numero',
      CAST(declaration_v.date AS date) AS 'Date',
      declaration_v.code_expediteur AS 'Code1',
      declaration_v.expediteur AS 'Expediteur',
      declaration_v.code_destinataire AS 'Code2',
      declaration_v.destinataire AS 'destinataire',
      ADRESSE1.ADRESSE_LIB ADRESSE1,
      ADRESSE2.ADRESSE_LIB ADRESSE2,
      ville_a.ville_lib AS 'Ville1',
      ville_b.ville_lib AS 'Ville2',
      declaration_v.port AS 'Port',
      declaration_v.colis AS 'Colis',
      declaration_v.poids AS 'Poids',
      declaration_v.courrier_typ AS 'type',
      courrier_montants_v.montant_ttc AS 'Montant_ttc',
      ISNULL(courrier_retour_fonds_v.espece, 0) AS 'Espece',
      ISNULL(courrier_retour_fonds_v.cheque, 0) AS 'Cheque',
      ISNULL(courrier_retour_fonds_v.traite, 0) AS 'Traite',
      ISNULL(courrier_retour_fonds_v.bl, 0) AS 'bl',
      courrier_retour_fonds_v.recu_num AS 'Recu',
      CAST((SELECT
        RECU_DAT
      FROM RETOUR_FONDS_CONFIRME
      WHERE COURRIER_ID = declaration_v.courrier_id)
      AS date) AS 'date_recu',
      courrier_retour_fonds_v.num AS 'num',
      CAST(b.BORDEREAU_DAT AS date) AS 'date_bordereau',
      CAST(l.ETAT_DAT AS datetime) AS 'date_livraison',
      ville_b.DELAI AS 'Delais_Cible',
      DATEDIFF(DAY, CAST(declaration_v.date AS date), CAST(l.ETAT_DAT AS date)) AS 'Ecart',
      DATEDIFF(DAY, CAST(declaration_v.date AS date), CAST(l.ETAT_DAT AS date)) - ville_b.DELAI AS 'Depassement',
      DATEDIFF(DAY, CAST(l.ETAT_DAT AS date), CAST(b.BORDEREAU_DAT AS date)) AS 'Ecart2',
      CASE service
        WHEN 0 THEN 'NON'
        ELSE 'OUI'
      END AS 'service',
      b.BORDEREAU_NUM,
      declaration_v.livraison,
      (SELECT TOP 1
        EMPLOYE.MATRICULE + ' ' + NOM + ' ' + PRENOM
      FROM COURRIER_ENSEMBLE
      INNER JOIN ENSEMBLE
        ON COURRIER_ENSEMBLE.ENSEMBLE_NUM = ENSEMBLE.ENSEMBLE_NUM
      INNER JOIN MANIPULE
        ON ENSEMBLE.ENSEMBLE_NUM = MANIPULE.ENSEMBLE_NUM
      INNER JOIN EMPLOYE
        ON MANIPULE.EMPLOYE_ID = EMPLOYE.EMPLOYE_ID
      LEFT OUTER JOIN VEHICULE
        ON MANIPULE.VEHICULE_NUM = VEHICULE.VEHICULE_NUM
      WHERE (ENSEMBLE.ENSEMBLE_TYP IN ('CB', 'CG'))
      AND (COURRIER_ENSEMBLE.COURRIER_ID = declaration_v.courrier_id))
      AS ramasseur,
      (SELECT TOP 1
        ENSEMBLE_DAT
      FROM fc_ENSEMBLE_v fc
      JOIN declaration_v d
        ON fc.courrier_id = d.courrier_id
      WHERE d.courrier_id = declaration_v.courrier_id
      ORDER BY fc.ENSEMBLE_DAT ASC)
      AS FC_date1,
      (SELECT TOP 1
        ENSEMBLE_DAT
      FROM fc_ENSEMBLE_v fc
      JOIN declaration_v d
        ON fc.courrier_id = d.courrier_id
      WHERE d.courrier_id = declaration_v.courrier_id
      ORDER BY fc.ENSEMBLE_DAT DESC)
      AS FC_date2,
      (SELECT
        caisse_centrale.JOURNAL_DAT 'date caisse'
      FROM declaration_v d
      LEFT JOIN courrier_caisse cc
        ON d.courrier_id = cc.courrier_id
        AND cc.m_typ = 'AR'
      LEFT JOIN caisse_centrale
        ON cc.journal_id = caisse_centrale.journal_id
        AND cc.m_typ = 'AR'
      WHERE d.courrier_id = declaration_v.courrier_id)
      AS date_caisse,
      insert_tmp.STATUS AS 'statut',
      (SELECT TOP 1
        arrive_valid
      FROM fc_ENSEMBLE_v fc
      WHERE fc.courrier_id = declaration_v.courrier_id
      ORDER BY fc.arrive_valid DESC)
      AS FC_date_arrive,
      (SELECT TOP 1
        MOTIF_LIB
      FROM courrier_ensemble
      LEFT JOIN [MOTIF_NONLIVRE]
        ON [MOTIF_NONLIVRE].MOTIF_COD = courrier_ensemble.motif_cod
      LEFT JOIN ensemble
        ON ensemble.ensemble_num = courrier_ensemble.ensemble_num
      WHERE courrier_ensemble.courrier_id = declaration_v.courrier_id
      AND ensemble.ensemble_typ = 'CL'
      AND MOTIF_LIB IS NOT NULL
      ORDER BY ENSEMBLE_DAT DESC)
      AS Motif,
      (SELECT
        EMPLOYE.MATRICULE + ' ' + NOM + ' ' + PRENOM
      FROM dec_hist_v
      LEFT JOIN utilisateur
        ON dec_hist_v.user_id = utilisateur.user_id
      LEFT JOIN employe
        ON utilisateur.EMPLOYE_ID = employe.EMPLOYE_ID
      WHERE (dec_hist_v.courrier_id = declaration_v.courrier_id)
      AND action_typ = 'I')
      AS Taxateur

    FROM agence,
         courrier_agence,
         declaration_v
         JOIN @table_insert_tmp insert_tmp
           ON declaration_v.courrier_id = insert_tmp.courrier_id

         JOIN ADRESSE ADRESSE1
           ON declaration_v.adresse1_id = ADRESSE1.adresse_id
         JOIN ADRESSE ADRESSE2
           ON declaration_v.adresse2_id = ADRESSE2.adresse_id


         LEFT JOIN courrier_montants_v
           ON declaration_v.courrier_id = courrier_montants_v.courrier_id,
         ville ville_a,
         ville ville_b,
         courrier_retour_fonds_v
         LEFT OUTER JOIN LIVRAISON l
           ON l.COURRIER_ID = courrier_retour_fonds_v.COURRIER_ID
         LEFT OUTER JOIN (SELECT
           courrier_id,
           MAX(BORDEREAU_DAT) AS BORDEREAU_DAT,
           MAX(b.BORDEREAU_NUM) AS BORDEREAU_NUM
         FROM COURRIER_BORDEREAU cb
         INNER JOIN BORDEREAU b
           ON b.BORDEREAU_NUM = cb.BORDEREAU_NUM
         WHERE b.BORDEREAU_TYP = 'CR'
         GROUP BY courrier_id) b
           ON b.COURRIER_ID = courrier_retour_fonds_v.COURRIER_ID
    WHERE declaration_v.courrier_typ = 'M'
    AND (agence.agence_cod = courrier_agence.agence_cod)
    AND (courrier_agence.courrier_id = declaration_v.courrier_id)
    AND (declaration_v.ville1_cod = ville_a.ville_cod)
    AND declaration_v.ville2_cod = ville_b.ville_cod
    AND declaration_v.courrier_id = courrier_retour_fonds_v.courrier_id
    AND courrier_agence.inter_typ = 'D'
    AND declaration_v.courrier_id = insert_tmp.COURRIER_ID



END


--GO



GO



/*---------------------------------------------------------------------------------*/
SELECT
	COMMANDES.OPE_ALPHA1 as 'declaration',
	COMMANDES.OPE_STAT,
	COMMANDES.OPE_KEYU as OPE_KEYU,
	coalesce(COMMANDES.OPE_NOOE,0) as OPE_NOOE,
	COMMANDES.OPE_REDO as BL,
	COMMANDES.OPE_CRDA as OPE_CRDA,
	COMMANDES.TIE_NOM as TIE_NOM,
	COMMANDES.OPE_CIPR as OPE_CIPR,
	DESTINATAIRES.TIE_VIL as TIE_VIL,
	COMMANDES.OPE_CCLI as OPE_CCLI
FROM OPE_DAT COMMANDES
	 INNER JOIN TIE_PAR DESTINATAIRES
	 ON COMMANDES.TIE_CODE = DESTINATAIRES.TIE_CODE
	 AND COMMANDES.ACT_CODE = DESTINATAIRES.ACT_CODE
where COMMANDES.OPE_CCLI='INT' AND OPE_ALPHA1 IS NOT NULL
/*_____________________________________________________________________*/
select * from [VEXINITIAL].[dbo].[COURRIER]
WHERE courrier_id in(
select courrier_id from [VEXINITIAL].[dbo].[RETOUR_FONDS]
where  num IN ('ILOT 5063',
'ILOT 5065',
'ILOT 5067',
'ILOT 5100',
'ILOT 5102',
'ILOT 5104',
'ILOT 5106',
'ILOT 5110',
'ILOT 5114',
'ILOT 5116',
'ILOT 5119',
'ILOT 5121',
'ILOT 5123',
'ILOT 5125',
'ILOT 5134',
'ILOT 5136',
'ILOT 5138',
'ILOT 5140',
'ILOT 5142',
'ILOT 5144',
'ILOT 5146',
'ILOT 5149',
'ILOT 5155',
'ILOT 5157',
'ILOT 5159',
'ILOT 5161',
'ILOT 5163',
'ILOT 5165',
'ILOT 5167',
'ILOT 5156-1',
'ILOT 5158-1',
'ILOT 5160-1',
'ILOT 5162-1',
'ILOT 5169',
'ILOT 5171',
'ILOT 5173',
'ILOT 5175',
'ILOT 5177',
'ILOT 5179',
'ILOT 5198',
'ILOT 5200',
'ILOT 5108',
'ILOT 5113',
'ILOT 5150',
'ILOT 5152',
'ILOT 5201',
'ILOT 5203',
'ILOT 5001',
'ILOT 5003',
'ILOT 5005',
'ILOT 5007',
'ILOT 5009',
'ILOT 5011',
'ILOT 5013',
'ILOT 5015',
'ILOT 5017',
'ILOT 5019',
'ILOT 5021',
'ILOT 5023',
'ILOT 5025',
'ILOT 5027',
'ILOT 5029',
'ILOT 5031',
'ILOT 5033',
'ILOT 5035',
'ILOT 5037',
'ILOT 5039',
'ILOT 5041',
'ILOT 5043',
'ILOT 5045',
'ILOT 5064',
'ILOT 5066',
'ILOT 5099',
'ILOT 5101',
'ILOT 5103',
'ILOT 5105',
'ILOT 5109',
'ILOT 5111',
'ILOT 5115',
'ILOT 5117',
'ILOT 5120',
'ILOT 5122',
'ILOT 5124',
'ILOT 5133',
'ILOT 5135',
'ILOT 5137',
'ILOT 5139',
'ILOT 5141',
'ILOT 5143',
'ILOT 5145',
'ILOT 5148',
'ILOT 5154',
'ILOT 5156',
'ILOT 5158',
'ILOT 5160',
'ILOT 5162',
'ILOT 5164',
'ILOT 5166',
'ILOT 5155-1',
'ILOT 5157-1',
'ILOT 5159-1',
'ILOT 5161-1',
'ILOT 5168',
'ILOT 5170',
'ILOT 5172',
'ILOT 5174',
'ILOT 5176',
'ILOT 5178',
'ILOT 5197',
'ILOT 5199',
'ILOT 5107',
'ILOT 5112',
'ILOT 5147',
'ILOT 5151',
'ILOT 5153',
'ILOT 5202',
'ILOT 5000',
'ILOT 5002',
'ILOT 5004',
'ILOT 5006',
'ILOT 5008',
'ILOT 5010',
'ILOT 5012',
'ILOT 5014',
'ILOT 5016',
'ILOT 5018',
'ILOT 5020',
'ILOT 5022',
'ILOT 5024',
'ILOT 5026',
'ILOT 5028',
'ILOT 5030',
'ILOT 5032',
'ILOT 5034',
'ILOT 5036',
'ILOT 5038',
'ILOT 5040',
'ILOT 5042',
'ILOT 5044',
'ILOT 5046',
'ILOT 5047',
'ILOT 5049',
'ILOT 5051',
'ILOT 5053',
'ILOT 5055',
'ILOT 5057',
'ILOT 5059',
'ILOT 5061',
'ILOT 5069',
'ILOT 5071',
'ILOT 5073',
'ILOT 5075',
'ILOT 5077',
'ILOT 5078',
'ILOT 5080',
'ILOT 5082',
'ILOT 5084',
'ILOT 5086',
'ILOT 5088',
'ILOT 5090',
'ILOT 5092',
'ILOT 5094',
'ILOT 5096',
'ILOT 5098',
'ILOT 5126',
'ILOT 5128',
'ILOT 5130',
'ILOT 5132',
'ILOT 5205',
'ILOT 5207',
'ILOT 5209',
'ILOT 5211',
'ILOT 5213',
'ILOT 5215',
'ILOT 5217',
'ILOT 5219',
'ILOT 5221',
'ILOT 5223',
'ILOT 5048',
'ILOT 5050',
'ILOT 5052',
'ILOT 5054',
'ILOT 5056',
'ILOT 5058',
'ILOT 5060',
'ILOT 5062',
'ILOT 5070',
'ILOT 5072',
'ILOT 5074',
'ILOT 5076',
'ILOT 5068',
'ILOT 5079',
'ILOT 5081',
'ILOT 5083',
'ILOT 5085',
'ILOT 5087',
'ILOT 5089',
'ILOT 5091',
'ILOT 5093',
'ILOT 5095',
'ILOT 5097',
'ILOT 5118',
'ILOT 5127',
'ILOT 5129',
'ILOT 5131',
'ILOT 5204',
'ILOT 5206',
'ILOT 5208',
'ILOT 5210',
'ILOT 5212',
'ILOT 5214',
'ILOT 5216',
'ILOT 5218',
'ILOT 5220',
'ILOT 5222')
)
