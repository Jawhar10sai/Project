select c.NOM,c.CLIENT_COD,sum(p.MONTANT_HT) as somme
from declaration_v d inner join courrier_agence ca
on d.courrier_id=ca.courrier_id
inner join client c on d.client1_id=c.CLIENT_ID
inner join produit p on d.courrier_id=p.courrier_id
where 
client_typ='EC' 
and (d.date between cast('01/05/2020' as date) and cast('01/11/2020' as date))
--and ca.agence_cod='100'
--and ca.INTER_TYP='D'
group by c.CLIENT_COD,c.NOM
having sum(p.MONTANT_HT) <=2000
--select top 10 * from declaration_v



select NOM,CLIENT_COD

,ISNULL ((
select sum(p.MONTANT_HT) as somme
from declaration_v d 
inner join courrier_agence ca
on d.courrier_id=ca.courrier_id
inner join produit p on d.courrier_id=p.courrier_id
where (d.date between cast('01/11/2020' as date) and cast('28/02/2021' as date)) and d.client1_id = c.CLIENT_ID
--and ca.agence_cod='100'
and ca.INTER_TYP='D'
and d.port='P'
),0) ca 

from client c 
where client_typ='EC' 
