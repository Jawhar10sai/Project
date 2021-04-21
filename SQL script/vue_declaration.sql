SELECT
    `lve_taxation_test`.`declarations`.`numero` AS `numero`,
    `lve_taxation_test`.`declarations`.`facture_id` AS `facture_id`,
    `lve_taxation_test`.`declarations`.`created_at` AS `creation_date`,
    `lve_taxation_test`.`declarations`.`colis` AS `colis`,
    `lve_taxation_test`.`declarations`.`poids` AS `poids`,
    `lve_taxation_test`.`declarations`.`palettes` AS `palettes`,
    `lve_taxation_test`.`declarations`.`paletteA` AS `paletteA`,
    `lve_taxation_test`.`declarations`.`paletteB` AS `paletteB`,
    `lve_taxation_test`.`declarations`.`paletteC` AS `paletteC`,
    `lve_taxation_test`.`declarations`.`paletteAutre` AS `paletteAutre`,
    `lve_taxation_test`.`declarations`.`Nbre_palettes` AS `Nbre_palettes`,
    `lve_taxation_test`.`declarations`.`longueur` AS `longueur`,
    `lve_taxation_test`.`declarations`.`hauteur` AS `hauteur`,
    `lve_taxation_test`.`declarations`.`largeur` AS `largeur`,
    `lve_taxation_test`.`declarations`.`coef` AS `coef`,
    `lve_taxation_test`.`declarations`.`valeur` AS `valeur`,
    `lve_taxation_test`.`declarations`.`livraison` AS `livraison`,
    `lve_taxation_test`.`declarations`.`express` AS `express`,
    `lve_taxation_test`.`declarations`.`port` AS `port`,
    `lve_taxation_test`.`declarations`.`courrier_typ` AS `courrier_typ`,
    `lve_taxation_test`.`declarations`.`courrier_eta` AS `courrier_eta`,
    `lve_taxation_test`.`declarations`.`nature` AS `nature`,
    `lve_taxation_test`.`declarations`.`Espece` AS `Espece`,
    `lve_taxation_test`.`declarations`.`Cheque` AS `Cheque`,
    `lve_taxation_test`.`declarations`.`Traite` AS `Traite`,
    `lve_taxation_test`.`declarations`.`BL` AS `BL`,
    `lve_taxation_test`.`declarations`.`id_adres` AS `id_adres`,
    `lve_taxation_test`.`declarations`.`statut` AS `statut`,
    `lve_taxation_test`.`declarations`.`commentaire` AS `commentaire`,
    `lve_taxation_test`.`users`.`id` AS `user_ID`,
    `lve_taxation_test`.`users`.`NOM` AS `Nom_expediteur`,
    `lve_taxation_test`.`users`.`PRENOM` AS `Prenom_expediteur`,
    `lve_taxation_test`.`users`.`CLIENT_COD` AS `Code_expediteur`,
    `lve_taxation_test`.`users`.`telephone` AS `telephone_expediteur`,
    `lve_taxation_test`.`users`.`ville` AS `ville_expediteur`,
    `lve_taxation_test`.`users`.`adresse` AS `Adresse_expediteur`,
    `lve_taxation_test`.`clients`.`CLIENT_ID` AS `CLIENT_ID`,
    `lve_taxation_test`.`clients`.`NOM` AS `Nom_destinataire`,
    `lve_taxation_test`.`clients`.`PRENOM` AS `Prenom_destinataire`,
    `lve_taxation_test`.`clients`.`CLIENT_COD` AS `code_destinataire`,
    `lve_taxation_test`.`clients`.`telephone` AS `telephone_destinataire`,
    `lve_taxation_test`.`villes`.`VILLE_LIB` AS `ville_destinataire`,
    `lve_taxation_test`.`adresses`.`lib_adresse` AS `Adresse_destinataire`
FROM
    (
        (
          (
            (
                `lve_taxation_test`.`declarations`
            JOIN `lve_taxation_test`.`clients`
            )
            JOIN `lve_taxation_test`.`users`
          )
        JOIN `lve_taxation_test`.`villes`
        )
    JOIN `lve_taxation_test`.`adresses`
    )
WHERE
    `lve_taxation_test`.`declarations`.`user_id` = `lve_taxation_test`.`clients`.`user_id`
     AND `lve_taxation_test`.`villes`.`VILLE_COD` = `lve_taxation_test`.`adresses`.`id_ville`
    AND `lve_taxation_test`.`declarations`.`client2_id` = `lve_taxation_test`.`clients`.`CLIENT_ID`
    AND `lve_taxation_test`.`adresses`.`id_client` IN(
    SELECT
        `lve_taxation_test`.`declarations`.`client2_id`
    FROM
        (
            `lve_taxation_test`.`declarations`
        JOIN `lve_taxation_test`.`clients`
        )
    WHERE
        `lve_taxation_test`.`declarations`.`client2_id` = `lve_taxation_test`.`clients`.`CLIENT_ID`
) AND `lve_taxation_test`.`adresses`.`id_adresse` = `lve_taxation_test`.`declarations`.`id_adres`
AND `lve_taxation_test`.`users`.`id`=`lve_taxation_test`.`clients`.`user_id`
AND `lve_taxation_test`.`users`.`id`=`lve_taxation_test`.`declarations`.`user_id`
AND `lve_taxation_test`.`users`.`id`=`lve_taxation_test`.`adresses`.`id_user`
