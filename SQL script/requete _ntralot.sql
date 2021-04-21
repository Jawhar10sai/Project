select  declaration_v .*, RETOUR_FONDS.NUM  from declaration_v 
left join RETOUR_FONDS on declaration_v.courrier_id=RETOUR_FONDS.Courrier_id
WHERE code_expediteur='9588'  AND declaration_v . Numero LIKE 'E00%'
AND num NOT LIKE 'ILOT%' 
