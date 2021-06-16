use VEXINITIAL
declare @courrier_id numeric, @date Datetime, @facture_typ varchar(20),@count_factures int
set @date = '2021-01-01' 
DECLARE dec_ant CURSOR FOR
select
d.courrier_id 
from declaration_v d inner join facture f
on d.facture_id = f.FACTURE_ID
 where d.date_saisie<@date
 and f.facture_dat>=cast(@date as date)
 and f.facture_typ='fa' 

 open dec_ant
 FETCH NEXT FROM dec_ant INTO  @courrier_id
 WHILE @@FETCH_STATUS > -1
BEGIN
select @count_factures=count(*) from facture where facture_id in (
	select distinct facture_id from courrier_facture_v vf where vf.courrier_id =@courrier_id
	)
	and  facture_dat< cast(@date as date)
if(@count_factures<=0)
print @courrier_id
else
begin
select top 1 @facture_typ= facture_typ from facture where facture_id in (
	select distinct facture_id from courrier_facture_v vf where vf.courrier_id =@courrier_id
	)
	and  facture_dat< cast(@date as date)
	order by FACTURE_DAT desc
	if(@facture_typ = 'AV')
		print @courrier_id
end
FETCH NEXT FROM dec_ant INTO @courrier_id
END
CLOSE dec_ant;
DEALLOCATE dec_ant;
GO
