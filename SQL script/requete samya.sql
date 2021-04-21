select
d.numero as numero_déclaration ,
d.date as date_déclaration ,
f.facture_num as numero_facture ,
f.facture_dat,
d.code_expediteur,
d.expediteur,
d.code_destinataire ,
d.destinataire,
case when d.courrier_typ='M'
then 'Messagerie'
else 'Affrètemnt' end as courrier_typ, 
mv.montant_ht,
mv.montant_ttc
from declaration_v d inner join facture f
on d.facture_id = f.FACTURE_ID
inner join  courrier_montants_v mv on mv.courrier_id =d.courrier_id
 where d.date_saisie<'2021-01-01' 
 and f.facture_dat>='2021-01-01'
 and f.facture_typ='fa' 
 and(
 select count(*) from facture where facture_id in (
	select distinct facture_id from courrier_facture_v vf where vf.courrier_id =d.courrier_id
	)
	and facture_dat>='2021-01-01'
 )<=3
-- and(select count(*) from facture where facture_id in (select distinct facture_id from courrier_facture_v vf where vf.courrier_id =d.courrier_id))<=2
-- and (d.courrier_id )
  order by d.date_saisie


  select top 10 * from courrier_facture_v

  select top 10 * from declaration_v

  select * from facture where facture_id=1244946 --facture_num=15020000775
  select * from facture_souche where facture_num=15020000775
  select count(distinct facture_id) from courrier_facture_v where courrier_id =740262
  select * from declaration_v where numero='2074754'

  select count(*) from facture where facture_id in (select distinct facture_id from courrier_facture_v vf where vf.courrier_id =740262)

  select * from courrier_montants_v where courrier_id =740262

  select count(distinct facture_id) from courrier_facture_v vf where vf.courrier_id =d.courrier_id

  select
d.numero as numero_déclaration ,
d.date as date_déclaration ,
f.facture_num as numero_facture ,
f.facture_dat,
d.code_expediteur,
d.expediteur,
d.code_destinataire ,
d.destinataire,
case when d.courrier_typ='M'
then 'Messagerie'
else 'Affrètemnt' end as courrier_typ
from declaration_v d inner join facture f
on d.facture_id = f.FACTURE_ID
 where d.date_saisie<'2021-01-01' 
 and f.facture_dat>='2021-01-01'
 and f.facture_typ='fa' 
  and(
 select count(*) from facture where facture_id in (
	select distinct facture_id from courrier_facture_v vf where vf.courrier_id =d.courrier_id
	)
	and facture_dat>=cast('2021-01-01' as date) and facture_dat<= cast('2021-03-31' as date)
 )<=3

