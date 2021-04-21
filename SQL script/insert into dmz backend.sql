  use vexinitial
  Declare @numero varchar(250),
  @LinkedServer nvarchar(4000),
  @TSQL nvarchar(4000),
  @OPENQUERY nvarchar(4000),
  @rowcnt INT,@STATUS varchar(250)-- @declaration varchar(250),@destinataire varchar(250),@adresse nvarchar(4000),
  SET @LinkedServer = 'SVWEBEXT'

  DECLARE DECLARATION_CURSOR CURSOR FOR
  SELECT   COMMANDES.OPE_ALPHA1 as 'declaration'
	FROM [SpeedLVE_Production]..OPE_DAT COMMANDES
	where COMMANDES.OPE_CCLI='INT' AND OPE_ALPHA1<> ''
  ------------------
  ------------ table events qui s'aliment avec les trigers dans les table (intervient,COURRIER,  LIVRAISON,COURRIER_ENSEMBLE,TRANSPORTE_ENSEMBLE,TRANSPORTE)
  ----------------
  OPEN DECLARATION_CURSOR
	  FETCH NEXT FROM DECLARATION_CURSOR
	  INTO @numero
	  WHILE @@FETCH_STATUS = 0
	  BEGIN 
		SET @OPENQUERY = 'SELECT courrier_id FROM OPENQUERY(' + @LinkedServer + ','''
		SET @TSQL = 'SELECT courrier_id FROM lvedbexp.etat_expedition_speed  WHERE Numero=''''' + CAST(@numero AS varchar) + ''''' '')'
		--print (@OPENQUERY + @TSQL)
		EXEC (@OPENQUERY + @TSQL)
		SELECT @rowcnt = @@ROWCOUNT
		if not exists (select * from [VEXINITIAL].[dbo].[COURRIER] where courrier_num=CAST(@numero AS varchar))
			begin
				if (@rowcnt>0)
				/* Si le numero de déclaration existe dans la base speed de DMZ on change le statut */
					begin
							SELECT @STATUS = CASE OPE_STAT
												WHEN '010' THEN 'En saisie'
												WHEN '020' THEN 'En preparation'
												   WHEN '030' THEN 'En preparation'
												   WHEN '040' THEN 'En preparation'
												   ELSE 'Préparée' 
												 END
							FROM [SpeedLVE_Production]..OPE_DAT COMMANDES
								 INNER JOIN [SpeedLVE_Production]..TIE_PAR DESTINATAIRES 
								 ON COMMANDES.TIE_CODE = DESTINATAIRES.TIE_CODE 
								 AND COMMANDES.ACT_CODE = DESTINATAIRES.ACT_CODE
							where 
							OPE_ALPHA1 =CAST(@numero AS varchar)

							  SET @OPENQUERY = 'UPDATE OPENQUERY(' + @LinkedServer + ','''
							  SET @TSQL = 'SELECT  statut
										 FROM  lvedbexp.etat_expedition_speed   where Numero =''''' + ISNULL(@numero, '') + ''''' '') SET
										statut  =''' + ISNULL(@STATUS, '') + ''' ;'
								EXEC (@OPENQUERY + @TSQL)	
					end
				else
					begin
						--print 'insert into DMZ'+@numero		
					Begin try				
						INSERT INTO OPENQUERY(SVWEBEXT, 'SELECT Numero,statut,destinataire,adresse2,Ville2,num FROM lvedbexp.etat_expedition_speed')
						SELECT 
							COMMANDES.OPE_ALPHA1,
							COMMANDES.OPE_STAT,
							DESTINATAIRES.TIE_CODE+' - '+DESTINATAIRES.TIE_NOM,
							DESTINATAIRES.TIE_AD1,
							DESTINATAIRES.TIE_VIL,
							COMMANDES.OPE_REDO
						FROM [SpeedLVE_Production]..OPE_DAT COMMANDES
							 INNER JOIN [SpeedLVE_Production]..TIE_PAR DESTINATAIRES 
							 ON COMMANDES.TIE_CODE = DESTINATAIRES.TIE_CODE 
							 AND COMMANDES.ACT_CODE = DESTINATAIRES.ACT_CODE
						where OPE_ALPHA1 =@numero AND COMMANDES.OPE_CCLI='INT'
					END TRY
					BEGIN CATCH
					  SELECT
						ERROR_NUMBER() AS ErrorNumber,
						ERROR_MESSAGE() AS ErrorMessage,
						@numero;
					END CATCH;
					end					
			end
		else
			if (@rowcnt>0)
				/* Si le numero de déclaration existe dans la base speed de DMZ et dans la base VEX  on supprime la ligne du DMZ */
				begin
					SET @OPENQUERY = 'delete OPENQUERY(' + @LinkedServer + ','''
					SET @TSQL = 'SELECT Numero FROM lvedbexp.etat_expedition_speed  WHERE Numero=''''' + CAST(@numero AS varchar) + ''''' '')'
					EXEC (@OPENQUERY + @TSQL)
				end
		FETCH NEXT FROM DECLARATION_CURSOR
		INTO @numero
	  END
  CLOSE DECLARATION_CURSOR;
  DEALLOCATE DECLARATION_CURSOR;



  /*
   Declare @numero varchar(250),@LinkedServer nvarchar(4000),@TSQL nvarchar(4000),@OPENQUERY nvarchar(4000),@rowcnt INT
  SET @LinkedServer = 'SVWEBEXT'

   set @numero=''

SET @LinkedServer = 'SVWEBEXT'
SET @OPENQUERY = 'SELECT courrier_id FROM OPENQUERY('+ @LinkedServer + ','''
SET @TSQL = 'SELECT courrier_id FROM lvedbexp.etat_expedition  limit 5  '')' 
  

		print (@OPENQUERY + @TSQL)
		EXEC (@OPENQUERY + @TSQL)

		 
		SELECT @rowcnt = @@ROWCOUNT
		print @rowcnt*/


/*##############################################################################################################*/
SELECT 
	COMMANDES.OPE_ALPHA1 as 'declaration',
	COMMANDES.OPE_STAT,
	COMMANDES.OPE_KEYU as OPE_KEYU,
	coalesce(COMMANDES.OPE_NOOE,0) as OPE_NOOE,
	COMMANDES.OPE_REDO as BL,
	COMMANDES.OPE_CRDA as OPE_CRDA,
	COMMANDES.TIE_NOM as TIE_NOM,
	DESTINATAIRES.TIE_VIL as TIE_VIL,
	DESTINATAIRES.TIE_CODE as TIE_CODE,
	DESTINATAIRES.TIE_AD1 as TIE_AD1,
	COMMANDES.OPE_CCLI as OPE_CCLI ,
	DESTINATAIRES.TIE_CODE+' - '+DESTINATAIRES.TIE_NOM as code_client
FROM [SpeedLVE_Production]..OPE_DAT COMMANDES
	 INNER JOIN [SpeedLVE_Production]..TIE_PAR DESTINATAIRES 
	 ON COMMANDES.TIE_CODE = DESTINATAIRES.TIE_CODE 
	 AND COMMANDES.ACT_CODE = DESTINATAIRES.ACT_CODE
where 
OPE_ALPHA1 in ('E00003030','E00003021')
--COMMANDES.OPE_CCLI='INT' AND OPE_ALPHA1<> '' and COMMANDES.OPE_STAT in('010','020','030')
--AND OPE_ALPHA1= ''
--select * from courrier where courrier_num in ('E00003021')