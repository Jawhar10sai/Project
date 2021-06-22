/******************************************************************/

declare  @date1 datetime
declare  @date2 datetime
declare  @typ varchar 
 
 set @date1='1-1-2021'
set @date2='31-5-2021'
--set @typ='L'
select client.CLIENT_COD,CLIENT.NOM ,client.client_typ,f.facture_typ,f.FACTURE_NUM,
  sum (f.facture_ht) ht ,  sum (f.facture_tva) tva ,AGENCE_LIB, fs.COURRIER_TYP
-- SUM(f.facture_ht) as CA_HT
--f.facture_id,f.facture_ind,f.facture_ht,f.facture_tva,fs.COURRIER_TYP 
from  facture f inner join FACTURE_SOUCHE fs on f.FACTURE_ID = fs.FACTURE_ID
join client on client.CLIENT_ID=fs.CLIENT_ID
left join AGENCE on  CLIENT.agence_cod=AGENCE.agence_cod
where  cast(f.facture_dat as DATE) between @date1 and @date2  AND 
client.CLIENT_TYP='EC'
--AND fs.COURRIER_TYP in ('L','G')
group by  client.CLIENT_COD,CLIENT.NOM ,client.client_typ,f.facture_typ,AGENCE_LIB,f.FACTURE_NUM, fs.COURRIER_TYP

/***************************************************************************************************************/
declare  @date1 datetime
declare  @date2 datetime
set @date1='1-1-2020'
set @date2='31-5-2021'
select 
dv.numero as 'numero de déclaration',
dv.date as 'Date de déclaration',
f.facture_num as 'Numero de facture',
f.facture_dat as 'Date de facture',
mv.montant_ht,
mv.montant_ttc,
dv.courrier_typ,
dv.code_expediteur,
dv.expediteur,
dv.code_destinataire,
dv.destinataire
from declaration_v dv inner join facture f on dv.facture_id=f.facture_id
inner join  courrier_montants_v mv on mv.courrier_id =dv.courrier_id
where dv.facture_id is not null and cast(f.facture_dat as DATE) between @date1 and @date2

