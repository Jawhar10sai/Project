       declare @ENSEMBLE_NUM varchar(50),@DESTIN_TYP int,@COURRIER_ID int
	   Select @COURRIER_ID=COURRIER_ID FROM COURRIER where courrier_num in ('E00004731')
	   SELECT TOP 1 ENSEMBLE.ENSEMBLE_NUM,
                     ISNULL(COURRIER_ENSEMBLE.DESTIN_TYP,(
					SELECT case ENSEMBLE.ENSEMBLE_ETA
						 when 'V' then 1
						 when 'C' then 2
						 else -1
					 end
					 FROM   COURRIER_ENSEMBLE
					 INNER JOIN ENSEMBLE
					 ON     ENSEMBLE.ENSEMBLE_NUM = COURRIER_ENSEMBLE.ENSEMBLE_NUM
					 INNER  JOIN TRANSPORTE_ENSEMBLE
					 ON     ENSEMBLE.ENSEMBLE_NUM = TRANSPORTE_ENSEMBLE.ENSEMBLE_NUM
					 INNER  JOIN TRANSPORTE
					 ON     TRANSPORTE_ENSEMBLE.VOYAGE_NUM = TRANSPORTE.VOYAGE_NUM
					 INNER  JOIN AGENCE
					 ON     AGENCE.AGENCE_COD = ENSEMBLE.AGENCE2_COD
					 WHERE  COURRIER_ENSEMBLE.COURRIER_ID=@COURRIER_ID
					 AND	ENSEMBLE.ENSEMBLE_TYP = 'FC'))  as disttype
                    --@MATRICULE = EMPLOYE.MATRICULE,
                    --@dat = ensemble.ensemble_dat,
                    --@NOM_LIVREUR = EMPLOYE.NOM + ' ' + EMPLOYE.PRENOM,
                    --@TEL = ISNULL('TEL1: ' + EMPLOYE.TELEPHONE1,'') + ISNULL(' TEL2: ' + EMPLOYE.GSM,'')
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