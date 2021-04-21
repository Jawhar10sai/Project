CREATE PROCEDURE   [dbo].[mise_a_jour_DMZ]
as

DECLARE   @date_cl  DATETIME
DECLARE   @etat_livraison  INT
DECLARE   @numero varchar(50)
DECLARE   @ENSEMBLE_NUM varchar(50)
DECLARE @TSQL nvarchar(4000)
DECLARE @OPENQUERY nvarchar(4000)
DECLARE @LinkedServer nvarchar(4000)

DECLARE db_cursorr CURSOR FOR
  select numero,ETAT_FINAL,ENSEMBLE_NUM, ETAT_DAT from declaration_v
  LEFT OUTER JOIN
  dbo.LIVRAISON AS l ON L.COURRIER_ID=dbo.declaration_v.courrier_id
  where -- code_expediteur =14714
   ETAT_FINAL=0
  and cast (ETAT_DAT as date) = convert(varchar(25),getdate(),103)
  --  and ETAT_DAT between '01/07/2019 00:00:00' and '10/07/2019 23:59:59'

OPEN db_cursorr
FETCH NEXT FROM db_cursorr INTO  @numero,@etat_livraison,@ENSEMBLE_NUM, @date_cl
 WHILE @@FETCH_STATUS > -1
BEGIN
SET @LinkedServer = 'SVWEBEXT'
SET @OPENQUERY = 'UPDATE OPENQUERY('+ @LinkedServer + ','''
SET @TSQL = 'SELECT  numero,livraisoncode, livraisondate FROM lvedbmobile.expedition WHERE    numero ='''''+@numero+''''' and numerocl='''''+@ENSEMBLE_NUM+''''' and livraisondate=null '') SET livraisoncode=''1'',livraisondate ='''+CONVERT(VARCHAR(20), @date_cl, 120)+''' ; '

EXEC (@OPENQUERY+@TSQL)
 FETCH NEXT FROM db_cursorr INTO @numero,@etat_livraison,@ENSEMBLE_NUM, @date_cl
END
CLOSE db_cursorr;
DEALLOCATE db_cursorr;
GO
