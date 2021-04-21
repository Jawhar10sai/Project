             SELECT TOP 1 @VOYAGE_NUM = TRANSPORTE.VOYAGE_NUM,
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