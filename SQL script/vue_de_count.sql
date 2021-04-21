SELECT
    `cllve`.`name` AS `NOM`,
    (
    SELECT
        COUNT(0)
    FROM
        `lve_taxation_test`.`declarations` `de`
    WHERE
        `cllve`.`id` = `de`.`user_id`
) AS `total_declars`,
(
    SELECT
        COUNT(0)
    FROM
        `lve_taxation_test`.`clients` `cl`
    WHERE
        `cllve`.`id` = `cl`.`user_id`
) AS `total_sous_clients`,
(
    SELECT
        COUNT(0)
    FROM
        `lve_taxation_test`.`client_lve_sessions` `clses`
    WHERE
        `cllve`.`id` = `clses`.`user_id`
) AS `total_session`
FROM
    `lve_taxation_test`.`users` `cllve`
