select `cllve`.`NOM` AS `NOM`,
(select count(0) from `taxation_test`.`declaration_v` `de` where `cllve`.`CLIENT_ID` = `de`.`client1_id`) AS `total_declars`,
(select count(0) from `taxation_test`.`client` `cl` where `cllve`.`CLIENT_ID` = `cl`.`CLIENT_ID_client_lve`) AS `total_sous_clients`,
(select count(0) from `taxation_test`.`client_lve_session` `clses` where `cllve`.`CLIENT_ID` = `clses`.`REFERENCIEE`) AS `total_session`
from `taxation_test`.`client_lve` `cllve`


/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

select `lvedbsuivi`.`numbl_datebl`.`id` AS `id`,
`lvedbsuivi`.`numbl_datebl`.`courrier_id` AS `courrier_id`,
`lvedbsuivi`.`numbl_datebl`.`colis` AS `colis`,
`lvedbsuivi`.`numbl_datebl`.`Numero` AS `Numero`,
`lvedbsuivi`.`numbl_datebl`.`Date_BL` AS `Date_BL`,
`lvedbsuivi`.`numbl_datebl`.`Code_expediteur` AS `Code_expediteur`,
`lvedbsuivi`.`numbl_datebl`.`desitinataire` AS `desitinataire`,
`lvedbsuivi`.`numbl_datebl`.`agence` AS `agence`,
`lvedbsuivi`.`numbl_datebl`.`num_BL` AS `num_BL`,
`lvedbsuivi`.`numbl_datebl`.`codeClient` AS `codeClient`
from `lvedbsuivi`.`numbl_datebl`
