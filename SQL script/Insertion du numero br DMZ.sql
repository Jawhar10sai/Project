DECLARE   @date_cl  DATETIME
DECLARE   @etat_livraison  INT  
declare @courrier_id_tmp nvarchar(50) , @courrier_id  nvarchar(50) , @Numero     nvarchar(50),@colis       nvarchar(50) ,@Date_BL     nvarchar(50),@Code_expediteur     nvarchar(50),@desitinataire       nvarchar(50),@agence nvarchar(50)
,@num_BL     nvarchar(50),@codeClient nvarchar(50)

DECLARE   @ENSEMBLE_NUM varchar(50) 
DECLARE @TSQL nvarchar(4000)
DECLARE @OPENQUERY nvarchar(4000)
DECLARE @LinkedServer nvarchar(4000)



declare @TSQLw nvarchar(4000),@result nvarchar(4000)

      
DECLARE db_cursorr_s CURSOR FOR

   --select numero, C2.OPE_STAT as 'Statut commande' ,ENSEMBLE_NUM,C2.OPE_CRDA

SELECT    v.courrier_id, v.numero,  v.colis,
v.date AS Date_BL, v.code_expediteur, v.destinataire, v1.VILLE_LIB AS agence, isnull(rf.NUM,'') AS num_BL, v.client1_id AS codeClient
FROM            dbo.declaration_v AS v INNER JOIN
                         dbo.RETOUR_FONDS AS rf ON rf.Courrier_id = v.courrier_id INNER JOIN
                         dbo.VILLE AS v1 ON v1.VILLE_COD = v.ville2_cod
WHERE        (rf.Fonds_Typ = 'BL') AND v.code_expediteur='9588'  and year(v.date)=2020
--and v.courrier_id=5626849
--and v.courrier_id in (5628319,5628291)
order by v.date desc


OPEN db_cursorr_s
FETCH NEXT FROM db_cursorr_s INTO  @courrier_id , @Numero  ,@colis ,@Date_BL  ,@Code_expediteur       ,@desitinataire     ,@agence     ,@num_BL     ,@codeClient  
 WHILE @@FETCH_STATUS > -1
BEGIN    

	--SET @LinkedServer = 'SVWEBEXT'
	--SET @OPENQUERY = 'UPDATE OPENQUERY('+ @LinkedServer + ','''
	--SET @TSQL = 'SELECT  numero,livraisoncode, livraisondate,numerocl FROM lvedbmobile.expedition WHERE    numero ='''''+@numero+''''' and numerocl is null '') SET livraisoncode='''''+@etat_livraison+''''' ,livraisondate ='''+FORMAT (@date_cl, 'yyyy-dd-MM hh:mm:ss') +''' ; ' 
	--EXEC (@OPENQUERY+@TSQL) 

	SET @LinkedServer = 'SVWEBEXT'
	SET @OPENQUERY = 'SELECT * FROM OPENQUERY('+ @LinkedServer + ','''
	SET @TSQL = 'SELECT * FROM lvedbsuivi.numbl_datebl  WHERE courrier_id='+@courrier_id+' '')' 
  
	CREATE TABLE #EventId (id int ,courrier_id     nvarchar(50) , Numero      nvarchar(50),colis       nvarchar(50) ,Date_BL      nvarchar(50),Code_expediteur      nvarchar(50),desitinataire       nvarchar(50),agence nvarchar(50)
	,num_BL      nvarchar(50),codeClient nvarchar(50))
	insert into #EventId 
	EXEC  (@OPENQUERY+@TSQL )  
	set @courrier_id_tmp=0
	select @courrier_id_tmp=isnull(courrier_id ,0) from #EventId
	 if @courrier_id_tmp<>@courrier_id
		begin
			print @courrier_id+'insert'
			INSERT
				OPENQUERY (SVWEBEXT, 'SELECT courrier_id,Numero,colis,Date_BL,Code_expediteur,desitinataire,agence,num_BL,codeClient FROM  lvedbsuivi.numbl_datebl') 
				VALUES (@courrier_id , @Numero    ,@colis ,@Date_BL  ,@Code_expediteur   ,@desitinataire       ,@agence     ,@num_BL,@codeClient );  
		end 
		drop table #EventId
		FETCH NEXT FROM db_cursorr_s INTO  @courrier_id , @Numero  ,@colis ,@Date_BL  ,@Code_expediteur       ,@desitinataire     ,@agence     ,@num_BL     ,@codeClient  
END
CLOSE db_cursorr_s;
DEALLOCATE db_cursorr_s;



GO
