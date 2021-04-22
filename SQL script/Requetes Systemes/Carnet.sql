/******************************************************************************************************************************************/
	--Carnet de livraison
/******************************************************************************************************************************************/
----------------------------------------
-- modifier le chauffeur/livreur d'un carnet de livraisons
----------------------------------------

declare @emp_id int
select @emp_id=EMPLOYE_ID from EMPLOYE where MATRICULE='2749'
update manipule set EMPLOYE_ID=@emp_id where manipule.ensemble_num ='CL3002001720'

----------------------------------------
---Rendre un Carnet de livraison en cours
----------------------------------------

declare @cl char(16) ='CL1001709889', @port_typ varchar, @payement_cod varchar, @courrier_id int, @facture_id numeric(16,0)

update ensemble
set ensemble_eta='C'
where ensemble_num=@cl ;


update ce
set destin_typ = 12
from
courrier_ensemble ce,
livraison lv
where
ce.courrier_id = lv.courrier_id and
ce.ensemble_num = lv.ensemble_num and
lv.ensemble_num =@cl
;

delete from livraison
where
	ensemble_num = @cl and
	etat_final =0;


delete from retour_fonds_confirme
where
	courrier_id in (select courrier_id from courrier_ensemble where ensemble_num=@cl) 
	;

update courrier
set courrier_eta = 'E'
where
courrier.courrier_id in (select courrier_id from courrier_ensemble where ensemble_num=@cl) 
and
courrier.courrier_eta in ('L', 'A');

DECLARE curs CURSOR FOR 
select courrier_id,port_typ,payement_cod,facture_id
from courrier
where courrier_id in (select courrier_id from courrier_ensemble where ensemble_num=@cl) 


open curs
FETCH NEXT FROM curs
into @courrier_id,@port_typ,@payement_cod,@facture_id
WHILE @@FETCH_STATUS <> -1
BEGIN
   FETCH NEXT FROM curs
   into @courrier_id,@port_typ,@payement_cod,@facture_id
   if @port_typ='P'
   begin
	delete from courrier_caisse
	where courrier_id = @courrier_id and m_typ <> 'TR'
   end
    if @port_typ='D'
	begin
	delete from courrier_caisse
	where courrier_id = @courrier_id and m_typ <> 'TR'
	end
	if @payement_cod= 'G'
	begin
	delete from regle
	where facture_id = @facture_id
	update facture_souche
	set regle = 'N'
	where facture_id = @facture_id
	end
END

delete from courrier_caisse
where courrier_id in (select courrier_id from courrier_ensemble where ensemble_num=@cl)  and
		m_typ = 'TR';

CLOSE curs
DEALLOCATE curs

/******************************************************************************************************************************************/
	--Carnet de ramassage
/******************************************************************************************************************************************/
---------------------------------------------
--veuillez remplacer le carnet du ramassage du 2216 au 2695: CB1001909111
---------------------------------------------
select TOP 10 * from RAMASSE 
--update ramasse set chauffeur=(select employe_id from EMPLOYE where MATRICULE='2780')
where RAMASSE_NUM in ('CB1002103005')
--AGENCE_COD=500
use VEXINITIAL

CB1002103005 du 2708 au 2780