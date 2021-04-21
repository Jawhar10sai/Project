select * from(
select NOM,CLIENT_COD

,ISNULL ((
select sum(p.MONTANT_HT)
from declaration_v d 
inner join courrier_agence ca
on d.courrier_id=ca.courrier_id
inner join produit_fa p on d.courrier_id=p.courrier_id
where (d.date between cast('01/06/2020' as date) and cast('31/10/2020' as date)) and d.client1_id = c.CLIENT_ID
--and ca.agence_cod='100'
--and ca.INTER_TYP='D'
),0) ca 

from client c 
where client_typ='EC' 
)a 
where	a.ca <=2000