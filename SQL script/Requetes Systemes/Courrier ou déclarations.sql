--*******************************
---Liberer une Déclaration non livrer 
--*******************************
use vexinitial
declare @numero varchar(30) = 'c01044211', @id numeric(24,0)
select @id=courrier_id from courrier where courrier_num=@numero
update courrier set COURRIER_ETA='E' where courrier_id=@id
update courrier_agence SET INTER_ETA=0 where courrier_id=@id and INTER_TYP='A' 

--****************************
---Enlever une Déclaration d'un Carnet de livraison
-- ou bien annuler la livraison de la déclaration [X] du carnet [X] de la caisse centrale [X]
--****************************
BL
declare @numero varchar(30) = 'c01840656', @cl varchar(30) = 'CL3002100679', @id numeric(24,0)

select @id=courrier_id from courrier where courrier_num=@numero
update courrier set courrier_eta='E' where courrier_id = @id
delete from courrier_ensemble where courrier_id=@id and ensemble_num=@cl
delete from livraison where courrier_id=@id

--****************************
--inserer expédition sur un carnet livraison
--merci d'integrer cette expédition [X] dans le carnet [X]
--****************************

declare @numero varchar(30) = 'C01482869', @cl varchar(30) = 'CL6502001578', @id numeric(24,0)

select @id=courrier_id from courrier where courrier_num=@numero
insert into courrier_ensemble(ensemble_num,courrier_id,AFFICHE_ORD)values(@cl,@id,116)


--****************************
-- merci de me modifier la ville expéditeur a CASA-AIN SEBAA-logistique dans ce declaration et ajouter n° de BL [X] dans cette exp [X] 
--****************************
select top 10 * from ville where VILLE_LIB like '%ain s%'
blk

use vexinitial
declare @courrier_id int,@num_bl varchar(50),@cod_vil varchar(50)
set @num_bl='FV21-004845'
set @cod_vil = 170
select @courrier_id=courrier_id from courrier where  COURRIER_NUM in('C01631289')
update intervient set VILLE_COD=@cod_vil where COURRIER_ID=@courrier_id and INTERVENTION_TYP='de' --( dd Arrivée de départ )--
update [COURRIER_AGENCE] set AGENCE_COD=@cod_vil  where COURRIER_ID=@courrier_id and INTER_TYP='D' --( A Arrivée d départ )
update retour_fonds set num=@num_bl where courrier_id=@courrier_id and fonds_typ='BL'
/*############################################################## Changer le type d'une déclaration ######################################################################*/
select * from courrier
-- C: Course
-- L: Affrètement
-- M: Messagerie
--update courrier set courrier_typ='L' 
 where courrier_num in ('C01624516') 
/*############################################################## Rendre une declaration  en cours ######################################################################*/

declare @cl char(16) ='CL10001800132', @port_typ varchar, @payement_cod varchar, @courrier_id int, @facture_id numeric(16,0)

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
--****************************
-- merci de me modifier [l'expéditeur] ou [le destinataire] a de la declaration suivante: [X] 
--****************************
declare  @numero_dec varchar(250), 
				@client1_dec numeric(24,0), 
				@client2_dec numeric(24,0),
				@client1_code_dec varchar(250),
				@client2_code_dec varchar(250),
				@NOM varchar(250)
set @NOM ='TEST' 
set @numero_dec ='c01472611' 
select @client1_dec= client1_id,
			@client2_dec= client2_id,
			@client1_code_dec= code_expediteur,
			@client2_code_dec=code_destinataire
from declaration_v where numero=@numero_dec
--Modifier l'expediteur
	if(@client1_code_dec IN ('0'))
		--update client set NOM=@NOM where  CLIENT_ID=@client1_dec
	else
		print 'Le client est en compte'
--Modifier le destinataire
	if (@client2_code_dec in ('0'))
		--update client set NOM=@NOM where  CLIENT_ID=@client2_dec
	else
		print 'Le client est en compte'


--****************************
-- merci de me modifier la date des déclarations suivantes: [X,Y,Z]
--****************************
select * from intervient 
--update INTERVIENT set INTERVENTION_DAT='31/03/2021'
where courrier_id in (select courrier_id from courrier where COURRIER_NUM in ('C01835889','C01835890','C01835891')) and INTERVENTION_TYP='DD'
select * from declaration_v where numero  in ('C01663947')

use vexinitial

select * from courrier 
update courrier set SAISIE_DAT='31/12/2020'
where COURRIER_NUM in ('C01663947')
select top 10 * from courrier_fa 
--update courrier_fa set date='30/11/2020'
where courrier_id in (select courrier_id from courrier where COURRIER_NUM in ('C01695008','C01695003','C01695004','C01695005'))
select top 10 * from COURRIER_FACTURE where courrier_id in (select courrier_id from courrier where COURRIER_NUM in ('C01695008','C01695003','C01695004','C01695005'))

select * from declaration_v where numero in ('c01714017')


select top 10 * from ADRESSE where client_id=5863691
update adresse set ADRESSE_LIB='Anassi' where client_id=5863691
select * from client where client_id=5863691
update client set NOM='OUBELKHEIR' where client_id=5863691


-------------------------------------------Annulation transport de caisse- annuler  FT trans de la declaration--------------------------------------------------
select * from courrier_caisse  where COURRIER_ID in (select courrier_id from courrier where courrier_num in ('C0C01437927'))

declare @courrier_id int
declare @facture_id int
declare @COURRIER_NUM varchar(16)
set @COURRIER_NUM='C0C01437927'

select @courrier_id=courrier_id,
@facture_id=facture_id 
from COURRIER
where COURRIER_NUM=@COURRIER_NUM

delete from courrier_caisse where M_TYP='TR' and courrier_id=@courrier_id

delete from  regle
where facture_id=@facture_id

select * from courrier_caisse where M_TYP='TR' and courrier_id=@courrier_id

-------------------------------------------   --------------------------------------------------
use VEXINITIAL

update courrier set COURRIER_TYP='M' Where COURRIER_NUM in ('C01726440','C01726446')