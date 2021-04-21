       SELECT TOP 1 ENSEMBLE.ENSEMBLE_NUM,
                    --ISNULL(COURRIER_ENSEMBLE.DESTIN_TYP,-1),
					COURRIER_ENSEMBLE.DESTIN_TYP,
					ENSEMBLE.ENSEMBLE_ETA,
                    --EMPLOYE.MATRICULE,
                     ensemble.ensemble_dat
                    --EMPLOYE.NOM + ' ' + EMPLOYE.PRENOM,
                    --ISNULL('TEL1: ' + EMPLOYE.TELEPHONE1,'') + ISNULL(' TEL2: ' + EMPLOYE.GSM,'')
       FROM         COURRIER_ENSEMBLE
       INNER JOIN   ENSEMBLE
       ON           COURRIER_ENSEMBLE.ENSEMBLE_NUM = ENSEMBLE.ENSEMBLE_NUM
       --INNER JOIN   AGENCE
       --ON           ENSEMBLE.AGENCE_COD = AGENCE.AGENCE_COD
       --INNER JOIN   MANIPULE
       --ON           MANIPULE.ENSEMBLE_NUM = ENSEMBLE.ENSEMBLE_NUM
       --INNER JOIN   EMPLOYE
       --ON           MANIPULE.EMPLOYE_ID = EMPLOYE.EMPLOYE_ID
       WHERE        COURRIER_ENSEMBLE.COURRIER_ID in (select courrier_id from courrier where COURRIER_NUM in ('C01521577')) AND
                    ENSEMBLE.ENSEMBLE_TYP = 'CL'
       ORDER BY     ENSEMBLE.ENSEMBLE_DAT DESC

	   --use vexinitial

	   select distinct DESTIN_TYP	   from COURRIER_ENSEMBLE 
	   --where COURRIER_ENSEMBLE.DESTIN_TYP is not null 
	   --ORDER BY     ENSEMBLE.ENSEMBLE_DAT DESC

	   
	  

	   select * from courrier where courrier_id in 
	   ( select top 10 courrier_id   from COURRIER_ENSEMBLE 
	   where COURRIER_ENSEMBLE.DESTIN_TYP IS NULL)

	   	   select * from courrier_ensemble where courrier_id in (select courrier_id from courrier where courrier_num='C01521577')