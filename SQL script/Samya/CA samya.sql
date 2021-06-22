-- CA Commercial

select c.NOM,c.CLIENT_COD,sum(p.MONTANT_HT) as somme
from declaration_v d inner join courrier_agence ca
on d.courrier_id=ca.courrier_id
inner join client c on d.client1_id=c.CLIENT_ID
inner join produit p on d.courrier_id=p.courrier_id
where 
client_typ='EC' 
and
(d.date between cast('01/01/2021' as date) and cast('31/05/2021' as date))
--and ca.agence_cod='100'
--and ca.INTER_TYP='D'
group by c.CLIENT_COD,c.NOM
having sum(p.MONTANT_HT) <=0


-- CA Facturé

select NOM,CLIENT_COD
,ISNULL ((
select sum(p.MONTANT_HT) as somme
from declaration_v d 
inner join produit_fa p on d.courrier_id=p.courrier_id
where (d.date between cast('01/01/2021' as date) and cast('31/05/2021' as date)) 
and d.payeur_id = c.CLIENT_ID
and d.port='P'
),0) ca 
from client c 
where client_typ='EC'
order by NOM asc






select NOM,CLIENT_COD
,
(
select sum(p.MONTANT_HT)
from declaration_v d inner join produit_fa p
on d.courrier_id=p.COURRIER_ID
where 
(date between cast('01/01/2021' as date) and cast('31/05/2021' as date) )
and d.payeur_id =c.client_id
) as ca
/*ISNULL ((
select  sum(p.MONTANT_HT) from declaration_v d
inner join produit_fa p on d.courrier_id=p.courrier_id
where (d.date between cast('01/01/2021' as date) and cast('31/05/2021' as date))
and  d.payeur_id = c.CLIENT_ID and d.port='D'
),0) ca */
from client c 
where client_typ='EC'  
order by NOM asc

select d.* ,p.MONTANT_HT
from declaration_v d inner join produit_fa p
on d.courrier_id=p.COURRIER_ID
where 
(date between cast('01/01/2021' as date) and cast('31/05/2021' as date) )
and d.payeur_id in (select distinct(client_id) from client where CLIENT_TYP='EC')



select c.NOM,c.CLIENT_COD, sum(p.MONTANT_HT)  as ca
from client c  inner join declaration_v d
on d.payeur_id=c.CLIENT_ID
 inner join produit_fa p
on d.courrier_id=p.COURRIER_ID
where (date between cast('01/01/2021' as date) and cast('31/05/2021' as date) )
and client_typ='EC' and d.port='P'
group by c.nom, c.client_cod
order by NOM asc
