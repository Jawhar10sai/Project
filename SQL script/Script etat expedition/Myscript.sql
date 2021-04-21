use VEXINITIAL
declare @courrier_id numeric(24,0),
				@Feuille_de_chargement varchar(250),
				@Feuille_de_route varchar(250),
				@carnet_de_livraison varchar(250),
				@etat_final int,
				@STATUT varchar(250)
DECLARE COURRIER_CURSOR CURSOR FOR
SELECT top 200  courrier_id  
FROM courrier 
--where courrier_num='C01521577'
order by SAISIE_DAT desc 
	OPEN COURRIER_CURSOR
		FETCH NEXT FROM COURRIER_CURSOR
		INTO @courrier_id

		WHILE @@FETCH_STATUS = 0
			BEGIN 
			set @etat_final=NULL
			SELECT       @etat_final = ETAT_FINAL
			FROM   LIVRAISON
			LEFT OUTER JOIN MANIPULE
			ON LIVRAISON.ENSEMBLE_NUM = MANIPULE.ENSEMBLE_NUM
			INNER JOIN EMPLOYE
			ON MANIPULE.EMPLOYE_ID = EMPLOYE.EMPLOYE_ID
			WHERE  COURRIER_ID = @courrier_id

		/*	select @etat_final=etat_final 
			from  livraison
			LEFT OUTER JOIN MANIPULE ON LIVRAISON.ENSEMBLE_NUM = MANIPULE.ENSEMBLE_NUM
			INNER JOIN EMPLOYE ON MANIPULE.EMPLOYE_ID = EMPLOYE.EMPLOYE_ID
			where courrier_id=@courrier_id*/
				if(@etat_final IS NULL)
					begin
						print ('h')
					end
				else
					begin
						select @STATUT = case @etat_final
															WHEN 0 THEN 'Livrée'
															WHEN 2 THEN 'Retournée'
															WHEN 3 THEN 'Epave'
															else 'NN'
															END
						select @carnet_de_livraison = 	cl.ensemble_num
						from ensemble cl 
						inner join courrier_ensemble ce on cl.ensemble_num=ce.ensemble_num
						where ce.COURRIER_ID=@courrier_id and cl.ENSEMBLE_TYP='CL'
					end
				/*
				select top 10
				@Feuille_de_chargement=isnull(fc.ensemble_num ,'-'),
				@Feuille_de_route = isnull(fr.voyage_num,'-'),
				@carnet_de_livraison=isnull(l.ensemble_num,'-')
				from courrier c
				inner join ensemble cl on cl.ensemble_num=l.ensemble_num
				inner join courrier_ensemble ce on ce.courrier_id=c.courrier_id
				inner join ensemble fc on fc.ENSEMBLE_NUM=ce.ENSEMBLE_NUM
				INNER  JOIN TRANSPORTE_ENSEMBLE te ON     fc.ENSEMBLE_NUM = te.ENSEMBLE_NUM
				INNER  JOIN TRANSPORTE fr ON     te.VOYAGE_NUM = fr.VOYAGE_NUM
				where cl.ENSEMBLE_TYP='CL' 
							and fc.ENSEMBLE_TYP='FC'
							and c.COURRIER_ID=@courrier_id
				order by c.SAISIE_DAT desc*/
				print 'Carnet de livraison : '+@carnet_de_livraison+' , Statut: - '+@STATUT+' , Courrier_id: - '+cast(@courrier_id as varchar)
				FETCH NEXT FROM COURRIER_CURSOR
				INTO @courrier_id
			END
CLOSE COURRIER_CURSOR;
DEALLOCATE COURRIER_CURSOR;

--select * from courrier where courrier_id=5870344

select Distinct ENSEMBLE_ETA  from ENSEMBLE 
--update ENSEMBLE set ENSEMBLE_ETA='O'
where ENSEMBLE_NUM='fc1002006336'

select * from EMPLOYE where MATRICULE='1074'

--select * from utilisateur where EMPLOYE_ID='666'

select top 10 * 
from CAISSE_CENTRALE where JOURNAL_NUM=100200356