             SELECT 
					 case ENSEMBLE.ENSEMBLE_ETA
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
					 AND	ENSEMBLE.ENSEMBLE_TYP = 'FC'
					 ORDER BY TRANSPORTE.SAISIE_DAT DESC