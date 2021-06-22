.--
--************* Suppression de ramassage *************
--
use RAMEX
declare @numero varchar(30) = '20DEC1426'
declare @id numeric(19,0)
select @id =num_ram from Ramassage where code_ram=@numero
delete from compte_ramassage where num_ram =@id
delete from Ramassage where code_ram=@numero
select * from compte_ramassage where num_ram =@id
  /**/
  declare  @date1 datetime
declare  @date2 datetime
declare  @typ varchar 
 
 set @date1='1-1-2020'
set @date2='31-1-2020'
set @typ='M'
select client.CLIENT_COD,CLIENT.NOM ,client.client_typ,f.facture_typ,
  sum (f.facture_ht) ht ,  sum (f.facture_tva) tva ,AGENCE_LIB, f.facture_num,dv.numero
-- SUM(f.facture_ht) as CA_HT
--f.facture_id,f.facture_ind,f.facture_ht,f.facture_tva,fs.COURRIER_TYP 
from  facture f inner join FACTURE_SOUCHE fs on f.FACTURE_ID = fs.FACTURE_ID
join client on client.CLIENT_ID=fs.CLIENT_ID
left join AGENCE on  CLIENT.agence_cod=AGENCE.agence_cod
left join declaration_v dv on f.FACTURE_ID=dv.FACTURE_ID
where  cast(f.facture_dat as DATE) between @date1 and @date2 AND fs.COURRIER_TYP =@typ
group by  client.CLIENT_COD,CLIENT.NOM ,client.client_typ,f.facture_typ,AGENCE_LIB,f.facture_num,dv.numero

select * from declaration_v dv where dv.date='31/12/2019' and livraison='G'


/*############################################################## Création d'un compte Ramex ######################################################################*/

select * from compte where nom like '%SANAA ZAKI%'
select * from menu_compte where id_compte=24
select * from menu_compte where id_compte=6
select * from privilege_compte where id_compte=6


--update menu_compte set etat=1 where id_compte=6 and id_menu in (6,7)

select * from courrier_ensemble where courrier_id in (select courrier_id from courrier where courrier_num in ('C01455337'))

select * from ensemble where ensemble_num in ('FC1002004704','FC1102000222','FC1002004364','FC2102000202')

/*############################################################## Numeros de bordereau des facture ######################################################################*/
select f.facture_num,b.bordereau_num,facture_typ
from facture_bordereau b
inner join facture f on f.facture_id=b.facture_id
--select * from facture
 where facture_num in 
 --('15020005671')
('15016002548', '15016003195', '15016003196', '15016003833', '15016003834', '15016004556', '15016004557', '15016005231', '15016005864', '15017000529', '15017001760')
 use VEXINITIAL

 '15016002548', '15016003195', '15016003196', '15016003833', '15016003834', '15016004556', '15016004557', '15016005231', '15016005864', '15017000529', '15017001760'

  