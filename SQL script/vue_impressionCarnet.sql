SELECT DISTINCT
    `lve_taxation_test`.`vdeclarations`.*,
    `lve_taxation_test`.`panierramasses`.`numero_Carnet` AS `numeroCarnet`,
    `lve_taxation_test`.`panierramasses`.`declaration` AS `declaration`,
    `lve_taxation_test`.`panierramasses`.`etat` AS `etat`,
    `lve_taxation_test`.`panierramasses`.`updated_at` AS `date_modification`
FROM
    (
        `lve_taxation_test`.`vdeclarations`
    JOIN `lve_taxation_test`.`panierramasses`
    )
WHERE
    `lve_taxation_test`.`vdeclarations`.`numero` = `lve_taxation_test`.`panierramasses`.`declaration`
