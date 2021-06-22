declare @date1 date = '01/05/2021', @date2 date = '31/05/2021'

select c.NOM,c.CLIENT_COD, sum(p.MONTANT_HT)  as ca
from client c  inner join declaration_v d
on (d.client2_id=c.CLIENT_ID)
 inner join produit_fa p
on d.courrier_id=p.COURRIER_ID
where (date between cast(@date1 as date) and cast(@date2 as date) )
and client_typ='EC' 
and port='P' 
and payeur_id  <> c.CLIENT_ID
group by c.nom, c.client_cod
order by NOM asc


select c.NOM,c.CLIENT_COD, sum(p.MONTANT_HT)  as ca
from client c  inner join declaration_v d
on (d.client1_id=c.CLIENT_ID)
 inner join produit_fa p
on d.courrier_id=p.COURRIER_ID
where (date between cast(@date1 as date) and cast(@date2 as date) )
and client_typ='EC' 
and port='D' 
and payeur_id  <> c.CLIENT_ID
group by c.nom, c.client_cod
order by NOM asc
