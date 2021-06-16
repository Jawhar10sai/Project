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
where f.FACTURE_TYP='FA' and d.courrier_id in ('courrier_id')
